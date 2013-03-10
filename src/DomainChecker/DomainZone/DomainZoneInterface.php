<?php
namespace Melifaro\DomainChecker\DomainZone;

/**
 * Interface to all domain zones
 * 
 * @package 
 * @author Iakov Mishchenko <mail@iakov.net>
 */
interface DomainZoneInterface
{
    public function getName();
    
    public function getFreeMessage();
    
    public function getValidDomainPattern();
    
}
