<?php

//create a user
function add_user($id,$firstName,$lastName,$userName,$dept,$status) {
	include("testconnection.php");
	
	try {
	   	
    	$sql = "INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `dept`, `admin`) VALUES (:id,:firstName,:lastName,:userName,:dept,:status";
		$addUser = $db->prepare($sql);
		$addUser->bindVALUE(':id',$id);
		$addUser->bindVALUE(':firstName',$firstName);
		$addUser->bindVALUE(':lastName',$lastName);
		$addUser->bindVALUE(':userName',$userName);
		$addUser->bindVALUE(':dept',$dept);
		$addUser->bindVALUE(':status',$status);
		$addUser->execute();
	    // 	$results->execute();
			// var_dump($dept);
	} catch (Exception $e) {
		echo "Addition to database failed";
	}
}

//Built in Queries

function all_users($users) {
	include("connection.php");
	try {
		$sql = "SELECT last_name, first_name, username, dept, admin";
		$results = $db->prepare(
			$sql."
			FROM users 
			WHERE admin= :admin");
		$results->bindVALUE(':admin',$users);
		$results->execute();
	} catch (Exception $e) {
		echo "BAD QUERY";
	}

	return $results->fetchAll();
}


function by_dept($dept,$deptstate) {
	include("connection.php");
	try {
		$sql = "SELECT last_name, first_name, username, dept, admin FROM users";
		$results = $db->prepare(
			$sql." 
			WHERE dept = :dept
			AND admin = :deptstate");
		$results->bindVALUE(":dept",$dept);
		$results->bindVALUE(":deptstate",$deptstate);
		$results->execute();
	} catch (Exception $e) {
		echo "BAD QUERY";
	}

	return $results->fetchAll();
}

//Last Name Search
function search_name($search,$status) {
	include("connection.php");
	
	try {
		$sql = "SELECT last_name, first_name, username, dept, admin FROM users"; 
		$results = $db->prepare(
			$sql."
			WHERE admin = :status
			AND last_name LIKE :name");
		$results->bindVALUE(":status",$status);
		$results->bindVALUE(":name","%".$search."%");
		$results->execute();

	} catch (Exception $e) {
        echo "BAD QUERY";
	}

	return ($results->fetchAll());
}

//Results

function display_results($client) {
	$output = "<ul><li>Name: "
	.$client["last_name"].", ".$client["first_name"]."</br>"
	."Username: ".$client["username"]."</br>"
	."Department: ".$client["dept"]
	."</ul></li>";
	
	return $output;
}
