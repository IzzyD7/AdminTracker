<?php

//create a user
function add_user($firstName,$lastName,$userName,$dept,$status) {
	
	include("connection.php"); 	
	
	try {
    	$sql = "INSERT INTO users(first_name, last_name, username, dept, admin) VALUES (:firstName, :lastName, :userName, :dept, :status)";
		$addUser = $db->prepare($sql);
		$addUser->bindParam(":firstName", $firstName);
		$addUser->bindParam(":lastName", $lastName);
		$addUser->bindParam(":userName", $userName);
		$addUser->bindParam(":dept", $dept);
		$addUser->bindParam(":status", $status);
		if ($addUser->execute()) {
			return "done";
		} else {
			return $addUser->errorInfo();
		}
	} catch (Exception $e) {
		return "Addition to database failed: ".$e.getMessage();
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
		$results->bindParam(":dept",$dept);
		$results->bindParam(":deptstate",$deptstate);
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
