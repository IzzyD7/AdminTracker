<?php

try {
	$db = new PDO("mysql:host=localhost;dbname=admin_rights;port=3306","admin_rights","admin");
	$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (Exception $e){
  echo "Unable to connect";
  // echo $e->getMessage();
  exit;
}
