<?php

/**
 * Implementation of hook_user_default_permissions().
 */
function soaptestfeature_user_default_permissions() {
  $permissions = array();

  // Exported permission: access soap services
  $permissions['access soap services'] = array(
    'name' => 'access soap services',
    'roles' => array(
      '0' => 'API',
    ),
  );

  return $permissions;
}
