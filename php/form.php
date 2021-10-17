<?php

/**
 * @file
 * Contains form.php file.
 */

// Set floor cookie.
$floors = $_REQUEST['floors'];
setcookie('floors', $floors, time() + (86400 * 30), '/');

// Redirect to homepage.
$base_url = base_url();
header("Location: $base_url");

/**
 * Gets base URL.
 */
function base_url() {
  $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') || $_SERVER['SERVER_PORT'] == 443 ? 'https://' : 'http://';
  $host = $_SERVER['SERVER_NAME'];
  $base_url = "{$protocol}{$host}";

  return $base_url;
}
