<?php

/**
 * Implementation of hook_user_default_roles().
 */
function soaptestfeature_user_default_roles() {
  $roles = array();

  // Exported role: API
  $roles['API'] = array(
    'name' => 'API',
  );

  return $roles;
}
