# Etagging Bundle For Symfony

### Installation
```
composer require adsazad/symfony-etagging
```

# Usage
etagResponse() function will work on any symfony response.

```php
// Add at the top of class
use Adsazad\SymfonyEtaggingBundle\Util\EtaggingInterface;
```
```php
// Your action
public function myaction(Request $request, EtaggingInterface $etag){
  $response = $this->render('mypage.twig',['parameters'=>'p1']);

// Return Etag Response
  return $etag->etagResponse($response);
}
```

### Add Custom Headers
Add This before Etag Response
```php
// Add Costum Headers
  $ets->addCustom($key, $value);
```

 ## Set Max Age
 ```php
 // Set Max Age In Seconds (Default 1 Day)
  $ets->setMaxAge(60*60*24); // 1 Day
    
// Set Max Age In Seconds (Default 1 Day)
  $ets->setSharedMax(60*60*24); // 10 Hours
```

