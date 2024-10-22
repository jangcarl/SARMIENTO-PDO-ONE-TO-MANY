<?php 

require_once 'dbConfig.php'; 
require_once 'models.php';

// Handle Employee Insertion insertOrderBtn
if (isset($_POST['insertOrderBtn'])) {
	$query = insertCustomer($pdo, $_POST['fullname'], $_POST['contact_number'], $_POST['date_joined']);

	if ($query) {
		header("Location: ../index.php");
	} else {
		echo "Insertion failed";
	}
}

// Handle Employee Update
if (isset($_POST['editEmployeeBtn'])) {
	$query = updateEmployee($pdo, $_POST['fullname'], $_POST['contact_number'], $_POST['date_joined'], $_GET['customer_id']);

	if ($query) {
		header("Location: ../index.php");
	} else {
		echo "Edit failed";
	}
}

// Handle Employee Deletion
if (isset($_POST['deleteEmployeeBtn'])) {
	$query = deleteEmployee($pdo, $_GET['customer_id']);

	if ($query) {
		header("Location: ../index.php");
	} else {
		echo "Deletion failed";
	}
}

// Handle New Order Insertion
if (isset($_POST['insertNewOrderBtn'])) {
	$query = insertOrder($pdo, $_POST['order_details'], $_POST['order_date'], $_GET['customer_id']);

	if ($query) {
		header("Location: ../viewOrder.php?customer_id=" . $_GET['customer_id']);
	} else {
		echo "Insertion failed";
	}
}

// Handle Order Update
if (isset($_POST['editOrderBtn'])) {
	$query = updateOrder($pdo, $_POST['order_details'], $_POST['order_date'], $_GET['order_id']);

	if ($query) {
		header("Location: ../viewOrder.php?customer_id=" . $_GET['customer_id']);
	} else {
		echo "Update failed";
	}
}

// Handle Order Deletion
if (isset($_POST['deleteOrderBtn'])) {
	$query = deleteOrder($pdo, $_GET['order_id']);

	if ($query) {
		header("Location: ../viewOrder.php?customer_id=" . $_GET['customer_id']);
	} else {
		echo "Deletion failed";
	}
}

?>
