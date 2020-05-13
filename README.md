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
  // For short term
  return $etag->etagResponse($response, $request);
  // For long term
  return $etag->etagResponse($response, $request, true);
}
```


