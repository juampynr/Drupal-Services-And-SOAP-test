<?php

/**
 * Implementation of hook_strongarm().
 */
function soaptestfeature_strongarm() {
  $export = array();
  $strongarm = new stdClass;
  $strongarm->disabled = FALSE; /* Edit this to true to make a default strongarm disabled initially */
  $strongarm->api_version = 1;
  $strongarm->name = 'services_auth_module';
  $strongarm->value = 'services_keyauth';

  $export['services_auth_module'] = $strongarm;
  $strongarm = new stdClass;
  $strongarm->disabled = FALSE; /* Edit this to true to make a default strongarm disabled initially */
  $strongarm->api_version = 1;
  $strongarm->name = 'services_use_key';
  $strongarm->value = 0;

  $export['services_use_key'] = $strongarm;
  $strongarm = new stdClass;
  $strongarm->disabled = FALSE; /* Edit this to true to make a default strongarm disabled initially */
  $strongarm->api_version = 1;
  $strongarm->name = 'services_use_sessid';
  $strongarm->value = 1;

  $export['services_use_sessid'] = $strongarm;
  return $export;
}
