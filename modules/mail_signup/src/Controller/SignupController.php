<?php
/**
 * @file
 * Allows for mailing list signup through API
 */

namespace Drupal\mail_signup\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class SignupController extends ControllerBase {

  private $mailchimpInstance = 'us14';
  private $listUniqueId = 'f20d3e728f';
  private $mailchimpApiKey = 'f297066db959b78278cc1e91135b06a4';
  private $url = 'https://us14.api.mailchimp.com/3.0/lists/f20d3e728f/members/';

  public function post(Request $request)
  {
    if (0 === strpos($request->headers->get('Content-Type'), 'application/json'))
    {
      $data = json_decode($request->getContent(), TRUE);
      $request->request->replace(is_array($data) ? $data : []);
      $email = $data['email'];
    }

    $json = json_encode([
      'email_address' => $email,
      'status' => 'subscribed'
    ]);

    $ch = curl_init('https://us14.api.mailchimp.com/3.0/lists/f20d3e728f/members/');

    curl_setopt($ch, CURLOPT_USERPWD, 'user:' . 'f297066db959b78278cc1e91135b06a4');
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $json);

    $result = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    $response['method'] = 'POST';

    return new JsonResponse($response);
  }
}
 ?>
