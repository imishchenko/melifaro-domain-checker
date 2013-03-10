<?php
namespace Melifaro\DomainChecker\DomainZone;

/**
 * Abstract class containing only factory
 *
 * @author Iakov Mishchenko <mail@iakov.net>
 */
abstract  class DomainZone implements DomainZoneInterface
{
    /**
     * Returns an instance of DomainZone
     * 
     * @param String $zone
     * @return \Melifaro\DomainChecker\DomainZone\DomzinZoneInterface
     * @throws UnsupportedDomainZoneException
     */
    public static function factory($zone)
    {
        $className = '';
        
        $zoneParts = explode('.', $zone);
        
        foreach ($zoneParts as $part)
        {
            $className .= ucfirst($part);
        }
        
        $className = __NAMESPACE__.'\\'.$className.'DomainZone';
        if(class_exists($className)) {
            
            return new $className;
        }
        else {
            
            throw new UnsupportedDomainZoneException('This zone is not supported');
        }
    }
}