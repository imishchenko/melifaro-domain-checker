<?php
namespace Melifaro\DomainChecker\DomainZone;
/**
 * .org domain zone definition
 * 
 * @package MelifaroDomainChecker
 * @author Iakov Mishchenko <mail@iakov.net>
 */
class OrgDomainZone extends DomainZone
{
    public function getFreeMessage()
    {
        return 'No match for';
    }

    public function getName()
    {
        return '.org';
    }

    public function getValidDomainPattern()
    {
        return '/^([a-z\d](-*[a-z\d])*)(\.([a-z\d](-*[a-z\d])*))*$/';
    }
}