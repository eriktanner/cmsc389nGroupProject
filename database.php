<?php

function epochToDate($date) {
  return date("Y-m-d H:i:s", substr($date, 0, 10));
}


function connectDatabase() {
  $host = "localhost";
  $user = "admin";
  $password = "EoqNS14knT98sak6";
  $database = "marketplace";
  $db_connection = new mysqli($host, $user, $password, $database);
  if ($db_connection->connect_error) {
      die("Connection failed: " . $db_connection->connect_error);
      return NULL;
  }
  return $db_connection;
}
?>
