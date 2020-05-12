# Etagging Bundle For Symfony

# Usage
etagResponse() function will work on any symfony response.
<pre>
// Add at the top of the class
use Adsazad\SymfonyEtaggingBundle\Service\EtaggingInterface;

// Your action
public function myaction(Request $request, EtaggingInterface $etag){
  $response = $this->render('mypage.twig',['parameters'=>'p1']);
  return $etag->etagResponse($response, $request);
}
</pre>
