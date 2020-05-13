# Etagging Bundle For Symfony

# Usage
etagResponse() function will work on any symfony response.

```php
// Add at the top of class
use Adsazad\SymfonyEtaggingBundle\Service\EtaggingInterface;
```
```php

// Your action
public function myaction(Request $request, EtaggingInterface $etag){

  $response = $this->render('mypage.twig',['parameters'=>'p1']);

// Add Costum Headers
  $ets->addCustom($key, $value);
  
// Set Max Age In Seconds (Default 1 Day)
  $ets->setMaxAge(60*60*24); // 1 Day

// Set Shared Max Age In Second (Default 1 Day)
  $ets->setSharedMax(60*60*10) // 10 Hours
  

// Return Etag Response
  return $etag->etagResponse($response);
}
```


