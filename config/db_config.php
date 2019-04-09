<?php

define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASS','');
define('DB_NAME','db_spksaw');

$koneksi = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if ($koneksi->connect_error) {
  die("Connection failed: " . $koneksi->connect_error);
}
?>
