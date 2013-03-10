Melifaro Domain Checker
=======================
Author: Iakov Mishchenko <mail@iakov.net>  
Version: 0.1  

Example of usage
----------------
```php
...
use Melifaro\DomainChecker\DomainChecker
...

public function myAction()
{
    $domainChecker = new DomainChecker('mydomain', array('.com', '.net', '.org'));
    
    //Optionally you can set name and zone via setter
    
    $domainChecker = new DomainChecker();
    $domainChecker->setName('myDomain');
    $domainChecker->setZones(array('.com', '.net', '.org'));

    $result = $domainChecker->checkDomain();
}
```
Adding new domain zones
-----------------------

Basically you can add your domain zone by creating new class under ```\Melifaro\DomainChecker\DomainZone\``` namespace.
It should extend DomainZone base class and look like follows
```php
namespace Melifaro\DomainChecker\DomainZone;
/**
 * .my domain zone definition
 * 
 * @package MelifaroDomainChecker
 * @author Iakov Mishchenko <mail@iakov.net>
 */
class MyDomainZone extends DomainZone
{
    // Whois result
    public function getFreeMessage()
    {
        return 'No entries were found';
    }

    // Domain zone name
    public function getName()
    {
        return '.my';
    }
    
    //Valid domain name RegExp pattern
    public function getValidDomainPattern()
    {
        return '/^([a-z\d](-*[a-z\d])*)(\.([a-z\d](-*[a-z\d])*))*$/';
    }
}

```

Plans
----- 
Add availability to hook domain zone definitions which are outside ```Melifaro``` namespace
