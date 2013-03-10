<?php
namespace Melifaro\DomainChecker\DomainZone;
/**
 * .net domain zone definition
 * 
 * @package MelifaroDomainChecker
 * @author Iakov Mishchenko <mail@iakov.net>
 */
class NetDomainZone extends DomainZone
{
    public function getFreeMessage()
    {
        return 'No match for';
    }

    public function getName()
    {
        return '.net';
    }

    public function getValidDomainPattern()
    {
        return '/^([a-z\d](-*[a-z\d])*)(\.([a-z\d](-*[a-z\d])*))*$/';
    }
}