<?php
/*
 * Tests Drupal's SOAP web services
 */ 

$wsdl = "http://test.localhost/services/soap?wsdl";
$options = array(
  'cache_wsdl' => 0,
);

$client = new SoapClient($wsdl, $options);

$response = $client->__soapCall('system.connect', array());
$session_id = $response[0]->value;


$response = $client->__soapCall('user.login', array($session_id, 'test_user', 'test'));
$session_id = $response[0]->value;

if ($session_id) {
  print $client->__soapCall('soaptest.greet', array($session_id, 'Hey SOAP server!'));
}
else {
 print 'Could not authenticate user';
}
print "\n";
