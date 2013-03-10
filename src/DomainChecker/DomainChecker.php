<?php
namespace DomainChecker;

use DomainChecker\DomainZone\DomainZone;

/**
 * 
 * @package MelifaroDomainChecker
 * @author Iakov Mishchenko <mail@iakov.net>
 */
class DomainChecker
{
    
    /**
     * Expected name
     * 
     * @var String 
     */
    private $name;
    
    /**
     * Domain zones
     * 
     * @var Array 
     */
    private $zones;
    
    /**
     * Constructor
     * 
     * @param String $name
     * @param Array $zones
     */
    public function __construct($name = null, $zones = null)
    {
        $this->name = $name;
        $this->zones = $zones;
    }
    
    /**
     * Get expected domain name
     * 
     * @return String
     */
    public function getName()
    {
        return $this->name;
    }
    
    /**
     * Set expected domain name
     * 
     * @param String $name
     * @return \Melifaro\DomainChecker\DomainChecker
     */
    public function setName($name)
    {
        $this->name = $name;
        
        return $this;
    }
    
    /**
     * Get domain zones
     * 
     * @return Array
     */
    private function getZones()
    {
        return $this->zones;
    }
    
    /**
     * Set domain zones
     * 
     * @param Array $zones
     * @return \Melifaro\DomainChecker\DomainChecker
     */
    public function setZones($zones)
    {
        $this->zones = $zones;
        
        return $this;
    }
    
    /**
     * Check tha domain is not registred
     * 
     * @throws \InvalidArgumentException
     * @return Array
     */
    public function checkDomain()
    {
        if (null === $this->name || null === $this->zones) {
           
            throw new \InvalidArgumentException('Name or at least one zone is not set');
        }
        
        $return = array();
        
        foreach ($this->zones as $zoneName) {
            
            $zone = DomainZone::factory($zoneName);

            if (true === $this->nameIsValid($zone)) {
                
                if (true === $this->isNotRegistred($zone)) {
                    $return[$zoneName] = true;
                }
                else {
                    $return[$zoneName] = false;
                }
            }
            else {
                $return[$zoneName] = 'Domain name is not valid';
            }
        }
        
        return $return;
    }
    
    /**
     * Validate domain name
     * 
     * @param \Melifaro\DomainChecker\DomainZone\DomainZone $zone
     * @return Boolean
     */
    private function nameIsValid(\Melifaro\DomainChecker\DomainZone\DomainZone $zone)
    {
        return (boolean) preg_match($zone->getValidDomainPattern(), $this->getName());
    }
    
    /**
     * Check is not registred
     * 
     * @param \Melifaro\DomainChecker\DomainZone\DomainZone $zone
     * @return Boolean
     */
    private function isNotRegistred($zone)
    {
        $output = '';
        exec('whois ' . $this->getName() . $zone->getName(), $output);
        $output = implode('', $output);

        if (false === stristr($output, $zone->getFreeMessage())) {
            
            return false;
        }
        
        return true;
    }
    
}
