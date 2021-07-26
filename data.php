<?php 
	require 'DbConnect.php';



	function loadSelect1() {
		$db = new DbConnect;
		$conn = $db->connect();

		$stmt = $conn->prepare("SELECT * FROM addbus");
		$stmt->execute();
		$select1 = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $select1;
	}

	function loadSelect2() {
		$db = new DbConnect;
		$conn = $db->connect();

		$stmt = $conn->prepare("SELECT * FROM addbus");
		$stmt->execute();
		$select2 = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $select2;
	}
	

 ?>