<?php
namespace DomainChecker\DomainZone;
/**
 * .com domain zone definition
 * 
 * @package MelifaroDomainChecker
 * @author Iakov Mishchenko <mail@iakov.net>
 */
class ComDomainZone extends DomainZone
{
    public function getFreeMessage()
    {
        return 'No match for';
    }

    public function getName()
    {
        return '.com';
    }

    public function getValidDomainPattern()
    {
        return '/^([a-z\d](-*[a-z\d])*)(\.([a-z\d](-*[a-z\d])*))*$/';
    }
}
