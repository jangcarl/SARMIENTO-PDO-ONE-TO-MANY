<?php require_once 'core/dbConfig.php'; ?>
<?php require_once 'core/models.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<style>
		/* Updated fonts and styles for a café feel */
		body {
			font-family: 'Courier New', Courier, monospace;
			background-color: #f4f1ea;
			color: #333;
			margin: 0;
			padding: 0;
		}
		h1 {
			font-family: 'Georgia', serif;
			color: #8b4513; /* Dark brown café theme */
		}
		.inputForm {
			background-color: #fff8e1;
			text-align: center;
			margin: 50px auto;
			padding: 20px;
			border-radius: 10px;
			width: 80%;
			max-width: 600px;
			box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
		}
		.cafeForms {
			margin: 50px auto;
			padding: 20px;
			border-radius: 15px;
			background-color: #ffe4b5; /* Soft café color */
			box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
			width: 80%;
			max-width: 1000px;
			display: flex;
			flex-wrap: wrap;
			justify-content: center;
			align-items: center;
		}
		.container {
			width: 220px;
			margin: 15px;
			padding: 15px;
			background-color: #fff;
			border: 1px solid #d2691e; /* Café-themed color */
			border-radius: 10px;
			box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);
			text-align: center;
		}
		.inputInner {
			background-color: #faf0e6;
			padding: 20px;
			border-radius: 10px;
			box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
			text-align: left;
			margin: 20px 0;
		}
		input[type="text"], input[type="date"] {
			width: 100%;
			padding: 10px;
			margin: 10px 0;
			border: 1px solid #d2691e;
			border-radius: 5px;
			box-sizing: border-box;
			font-family: 'Courier New', Courier, monospace;
		}
		.submit-btn {
			background-color: #d2691e;
			color: white;
			border: none;
			padding: 10px 20px;
			font-size: 16px;
			border-radius: 5px;
			cursor: pointer;
		}
		.submit-btn:hover {
			background-color: #c85a17;
		}
	</style>
	<title>Café Business System</title>
	<link rel="stylesheet" href="styles.css">
</head>
<body>
	<div class="inputForm">
		<h1>Café Customer Registration</h1>
		<p>Enter the customer's details below.</p>
		<form action="core/handleForms.php" method="POST">
			<div class="inputInner">
				<p>
					<label for="customer_name">Customer Name</label> 
					<input type="text" name="fullname" required>
				</p>
				<p>
					<label for="order_details">Contact Number</label> 
					<input type="text" name="contact_number" placeholder="e.g., Latte, Croissant" required>
				</p>
				<p>
					<label for="order_date">Order Date</label> 
					<input type="date" name="date_joined" required>
				</p>
			</div>
			<p>
				<input type="submit" class="submit-btn" name="insertOrderBtn" value="Submit Order">
			</p>
		</form>
	</div>

	<hr style="width: 90%;">

	<h1 style="text-align: center; margin-top: 50px;">Order Records</h1>
	<div class="cafeForms">
		<?php $getAllCustomers = getAllCustomers($pdo); ?>
		<?php foreach ($getAllCustomers as $row) { ?>
			<div class="container">
				<p><b>Customer Name:</b> <?php echo $row['fullname']; ?></p>
				<p><b>Contact Number:</b> <?php echo $row['contact_number']; ?></p>
				<p><b>Order Date:</b> <?php echo $row['date_joined']; ?></p>
				<div class="editAndDelete">
					<a href="viewOrder.php?customer_id=<?php echo $row['customer_id']; ?>">View Order</a> |
					<a href="editwebdev.php?customer_id=<?php echo $row['customer_id']; ?>">Edit</a> |
					<a href="deletewebdev.php?customer_id=<?php echo $row['customer_id']; ?>">Delete</a>
				</div>
			</div> 
		<?php } ?>
	</div>
</body>
</html>
