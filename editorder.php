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
			margin: 50px auto;
			padding: 20px;
			border-radius: 10px;
			width: 80%;
			max-width: 600px;
			box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
		}
		.inputEditInner {
			background-color: #faf0e6;
			padding: 20px;
			border-radius: 10px;
			box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
			margin: 20px auto;
			text-align: left;
			width: 100%;
		}
		input[type="text"], input[type="date"], input[type="number"] {
			width: 100%;
			padding: 10px;
			margin: 10px 0;
			border: 1px solid #d2691e;
			border-radius: 5px;
			box-sizing: border-box;
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
		a {
			color: #d2691e;
			text-decoration: none;
			margin: 10px;
		}
		a:hover {
			color: #c85a17;
		}
	</style>
	<title>Edit Menu Item</title>
	<link rel="stylesheet" href="styles.css">
</head>
<body>
	<a href="viewOrder.php?customer_id=<?php echo $_GET['customer_id']; ?>">Back</a>
	<div class="inputMain">
		<h1>Edit Menu Item</h1>
		<?php $getOrderByID = getOrderByID($pdo, $_GET['order_id']); ?>
		<form action="core/handleForms.php?order_id=<?php echo $_GET['order_id']; ?> &customer_id=<?php echo $_GET['customer_id']; ?>" method="POST">
			<div class="inputEditInner">
				<p>
					<label for="item_name">Item Name</label> 
					<input type="text" name="order_details" value="<?php echo $getOrderByID['order_details']; ?>" required>
				</p>
				<p>
					<label for="item_price">Date</label> 
					<input type="date" name="order_date" value="<?php echo $getOrderByID['order_date']; ?>" step="0.01" required>
				</p>`
			</div>
			<p>
				<input type="submit" class="submit-btn" name="editOrderBtn" value="Update Item">
			</p>
		</form>
	</div>
</body>
</html>
