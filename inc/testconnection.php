<?php

try {
	$db = new PDO("mysql:host=localhost;dbname=test;port=3306","root","root");
	$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
	echo "CONNECTED!!!";
} catch (Exception $e){
  echo "Unable to connect";
  // echo $e->getMessage();
  exit;
}
