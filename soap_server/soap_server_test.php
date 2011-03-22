<?php
// Pull in the NuSOAP code
// Create the client instance

// TODO Set the paht of wsdl
$wsdl = "http://localhost/drupal/drupal-6.5/services/soap?wsdl";
// N.B: allow anonymous user to access services.
$client = new SoapClient($wsdl, 
  array(
    'compression' => SOAP_COMPRESSION_ACCEPT | SOAP_COMPRESSION_GZIP,
  )
);
// Set this variable TRUE if we enable use session on services settings.
DEFINE('USE_SESSION', FALSE);
$user = NULL;

$client->debug_flag=true;
//  $client->proxyhost = 'localhost';
//  $client->proxyport = 8080;
//  print_r($client);
// Call the SOAP method

// Set method parameters
/*
 * node.load params are 
 *  1- nid => int
 *  2- fields => array (optional)
 *  Let we call methos twice with & without fields 
 *  then we have $param1 & $param2
 */
if (USE_SESSION) {
  $param['sessid'] = '1234534534dfsf';
}
$param['username'] = 'user';
$param['password'] = 'password';
echo 'Call user.login with optional params <br> 
  ---------------------------------------------------------------';
$user = $client->__soapCall('user.login', $param); 
echo '<pre>';print_r($user);echo '</pre>';
//set $fields this is an optional arg
$fields = array('nid', 'title', 'type');
//  $fields = array('title');
$key = '42b61dd05eb2cea16614a4270ce7cbd6';

if (USE_SESSION) {
  $param1['sessid'] = $user[0]->value;
  $param2['sessid'] = $user[0]->value;
}
// Set $nid = nid you want to load it.
$param1['nid'] = $nid; //Set nid
$param2['nid'] = $nid;
$param2['fields'] = $fields;

//To load node information (avoid access denied).
// Set USE_SESSION to be TRUE
// Login with account that have a permission to load the node.

// First case
echo 'Call node.load without optional params <br> 
  ------------------------------------------------------------------';
//  $result = $client->call('node.load', $key, $param1); 
$result = $client->__soapCall('node.get', $param1);
echo '<pre>';print_r($result);echo '</pre>';

// Second caseccess denied.
echo 'Call node.load with optional params <br> 
  ---------------------------------------------------------------';
$result = $client->__soapCall('node.get', $param2); 
echo '<pre>';print_r($result);echo '</pre>';


