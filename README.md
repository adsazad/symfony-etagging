# Etagging Bundle For Symfony

# Usage
etagResponse() function will work on any symfony response.
<pre>
// Add at the top of the class
```php
use Adsazad\SymfonyEtaggingBundle\Service\EtaggingInterface;
```
// Your action
public function myaction(Request $request, EtaggingInterface $etag){
  $response = $this->render('mypage.twig',['parameters'=>'p1']);
  // For short term
  return $etag->etagResponse($response, $request);
  // For long term
  return $etag->etagResponse($response, $request, true);
}
</pre>
