<?php  

function insertCustomer($pdo, $fullname, $contact_number, $date_joined) {
	$sql = "INSERT INTO customers (fullname, contact_number, date_joined) VALUES(?,?,?)";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$fullname, $contact_number, $date_joined]);
	
	return $executeQuery; // Directly return the result
}

function updateEmployee($pdo, $fullname, $contact_number, $date_joined, $customer_id) {
	$sql = "UPDATE customers
				SET fullname = ?,
					contact_number = ?,
					date_joined = ?
				WHERE customer_id = ?";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$fullname, $contact_number, $date_joined, $customer_id]);
	
	return $executeQuery; // Directly return the result
}

function deleteEmployee($pdo, $customer_id) {
	$sql = "DELETE FROM orders WHERE customer_id = ?";
	$deleteStmt = $pdo->prepare($sql);
	$executeDeleteQuery = $deleteStmt->execute([$customer_id]);

	if ($executeDeleteQuery) {
		$sql = "DELETE FROM customers WHERE customer_id = ?";
		$stmt = $pdo->prepare($sql);
		$executeQuery = $stmt->execute([$customer_id]);

		if ($executeQuery) {
			return true; // Directly return the result
		}
		
	} 
}

function getAllCustomers($pdo) {
	$sql = "SELECT * FROM customers";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute();

	return $executeQuery ? $stmt->fetchAll() : []; // Return all customers or empty array
}

function getAllOrders($pdo) {
    $sql = "SELECT * FROM orders";
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute();

    if ($executeQuery) {
        return $stmt->fetchAll();
    }
    return []; 
}

function getEmployeeByID($pdo, $customer_id) {
	$sql = "SELECT * FROM customers WHERE customer_id = ?";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$customer_id]);

	if ($executeQuery) {
		return $stmt->fetch();
	}

}

function getOrdersByEmployee($pdo, $customer_id) {
	$sql = "SELECT 
				orders.order_id AS order_id,
				orders.order_details AS order_details,
				orders.order_date AS order_date
			FROM orders
			WHERE orders.customer_id = ?";

	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$customer_id]);
	return $executeQuery ? $stmt->fetchAll() : []; // Return all orders or empty array
}

function insertOrder($pdo, $order_details, $order_date, $customer_id) {
	$sql = "INSERT INTO orders (order_details, order_date, customer_id) VALUES (?,?,?)";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$order_details, $order_date, $customer_id]);
	return $executeQuery; // Directly return the result
}

function getOrderByID($pdo, $order_id) {
	$sql = "SELECT 
				orders.order_id AS order_id,
				orders.order_details AS order_details,
				orders.order_date AS order_date
			FROM orders
			JOIN customers ON orders.customer_id = customers.customer_id
			WHERE orders.order_id = ?";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$order_id]);

	if ($executeQuery) {
		return $stmt->fetch();
	}
}

function updateOrder($pdo, $order_details, $order_date, $order_id) {
	$sql = "UPDATE orders
			SET order_details = ?,
				order_date = ?
			WHERE order_id = ?";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$order_details, $order_date, $order_id]);

	if ($executeQuery) {
		return true;
	}
	return $executeQuery; // Directly return the result
}

function deleteOrder($pdo, $order_id) {
	$sql = "DELETE FROM orders WHERE order_id = ?";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$order_id]);
	
	if ($executeQuery) {
		return true;
	}

}

function getAllInfoByEmployeeID($pdo, $customer_id) {
	$sql = "SELECT * FROM customers WHERE customer_id = ?";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$customer_id]);
	return $executeQuery ? $stmt->fetch() : null; // Return employee info or null
}



?>
