SOAP Server
===========
The SOAP Server module allows a Drupal site to access services using the same
callback code.

$Id: README.txt,v 1.2.2.1.2.1 2008/10/26 16:24:20 melsawy Exp $


Requirements to call services via SOAP Server
---------------------------------------------
 1) Enable clean URLs from Drupal site configrations
   
 2) Install the NuSOAP library so that it ends up like the following:
     soap_server/nusoap/
     soap_server/nusoap/nusoap.txt
     soap_server/nusoap/lib
     soap_server/nusoap/lib/nusoap.php
     
 3) Allow anonymous user to access services module from access control
 
 4) Remove key or session requeriments from service configuration


How to create client to soap server
-----------------------------------
This is a simple client to call node.load from node services and user.login.


soap_server_test.php
<?php
  // Pull in the NuSOAP code
  // Create the client instance
  // TODO Set the paht of wsdl
  $wsdl = "http://localhost/drupal/services/soap?wsdl";
  $client = new soapClient($wsdl);

  // Call the SOAP method
  // Set method parameters
  /*
   * node.load params are 
   *  1- nid => int
   *  2- fields => array (optional)
   *  Let we call methos twice with & without fields 
   *  then we have $param1 & $param2
   */
  //set $fields this is an optional arg
  $fields = array('nid', 'title', 'type');
  $param1 = array(
    'nid'=> 3, //Set nid
  );
  $param2 = array(
    'nid'=> 3, 
    'fields' => $fields
  );
  $param3 = array(
    'username'=> 'user', 
    'password' => 'password'
  );

  // First case
  echo 'Call node.load without optional params <br> 
        ------------------------------------------------------------------';
  $result = $client->__soapCall('node.load', $param1); 
  echo '<pre>';print_r($result);echo '</pre>';
  // Second case
  echo 'Call node.load with optional params <br> 
        ---------------------------------------------------------------';
  $result = $client->__soapCall('node.load', $param2); 
  echo '<pre>';print_r($result);echo '</pre>';

  // Third case
  echo 'Call user.login with optional params <br> 
        ---------------------------------------------------------------';
  $result = $client->__soapCall('user.login', $param3); 
  echo '<pre>';print_r($result);echo '</pre>';  // 2: user.login
 
