<?php require_once 'core/models.php'; ?>
<?php require_once 'core/dbConfig.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<style>
		body {
			font-family: 'Courier New', Courier, monospace;
			background-color: #f4f1ea;
			margin: 0;
			padding: 0;
		}
		.inputMain {
			background-color: #fff8e1;
			text-align: center; 
			margin: 75px auto;
			padding: 20px;
			border-radius: 10px;
			width: 80%;
			max-width: 600px;
			box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
		}
		.inputInner {
			background-color: white;
			width: 80%;
  			margin: 0 auto;
			text-align: left;
		}
		input[type="text"], input[type="number"] {
			width: 100%; 
			box-sizing: border-box;
			padding: 10px;
			margin: 5px 0;
			border: 1px solid #ccc;
			border-radius: 5px;
		}
		table {
			width: 100%;
			border-collapse: collapse;
			margin: 20px 0;
		}
		th, td {
			border: 1px solid #ccc;
			padding: 10px;
			text-align: center;
		}
		th {
			background-color: #d9534f;
			color: white;
		}
		.bookInfoTable {
			margin: 0 auto;
		}
		.bookTableInner {
			border-radius: 10px;
			box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
		}
		.addBookBtn {
			background-color: #d9534f;
			color: white;
			border: none;
			padding: 10px 20px;
			font-size: 16px;
			border-radius: 5px;
			cursor: pointer;
			margin-top: 10px;
		}
		.addBookBtn:hover {
			background-color: #c9302c;
		}
		a {
			color: #d2691e;
			text-decoration: none;
			margin: 0 10px;
		}
		a:hover {
			color: #c85a17;
		}
	</style>
	<title>View Projects</title>
	<link rel="stylesheet" href="styles.css">
</head>
<body>
	<a href="index.php" style="margin: 0px 10px 0px 10px">Back</a>
	<div class="inputMain">
		<div class="inputInner">
			<?php $getAllInfoByEmployeeID = getAllInfoByEmployeeID($pdo, $_GET['customer_id']); ?>
			<h1 style="text-align: center;">Employee's Orders</h1>
			<h3>Name: <?php echo $getAllInfoByEmployeeID['fullname']; ?></h3>
		
			<form action="core/handleForms.php?customer_id=<?php echo $_GET['customer_id']; ?>" method="POST">
				<p>
					<label for="title">Order Detail</label> 
					<input type="text" name="order_details" required>
				</p>
				<p>
					<label for="author">Order Date</label> 
					<input type="date" name="order_date" required>
				</p>
				<p>
					<input type="submit" class="addBookBtn" name="insertNewOrderBtn" value="Add Order">
				</p>
			</form>	
		</div>
		<hr style="width: 90%;">
		<h1 style="text-align: center; margin: 50px 0px 20px 0px;">Order Information</h1>
		<div class="bookInfoTable">
			<div class="bookTableInner">
				<table>
					<tr>
						<th>Order ID</th>
						<th>Order Detail</th>
						<th>Order Date</th>
						<th>Action</th>
					</tr>
					<?php $getOrdersByEmployee = getOrdersByEmployee($pdo, $_GET['customer_id']); ?>
					<?php foreach ($getOrdersByEmployee as $row) { ?>
					<tr>
						<td><?php echo $row['order_id']; ?></td>	  	
						<td><?php echo $row['order_details']; ?></td>	  	
						<td><?php echo $row['order_date']; ?></td>
						<td>
							<a href="editorder.php?order_id=<?php echo $row['order_id']; ?>&customer_id=<?php echo $_GET['customer_id']; ?>">Edit</a>
							<a href="deleteorder.php?order_id=<?php echo $row['order_id']; ?>&customer_id=<?php echo $_GET['customer_id']; ?>">Delete</a>
						</td>	  	
					</tr>
					<?php } ?>
				</table>
			</div>
		</div>
	</div>
</body>
</html>
