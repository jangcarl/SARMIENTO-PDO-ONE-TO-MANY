<?php require_once 'core/dbConfig.php'; ?>
<?php require_once 'core/models.php'; ?>
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
		.container {
			border: 2px solid #d9534f;
			background-color: #fbeee0;
			padding: 20px;
			border-radius: 10px;
			box-shadow: 0 2px 10px rgba(217, 83, 79, 0.5);
		}
		.inputInner {
			padding: 20px;
			text-align: left;
		}
		.deleteBtn input[type="submit"] {
			background-color: #d9534f;
			color: white;
			border: none;
			padding: 10px 20px;
			font-size: 16px;
			border-radius: 5px;
			cursor: pointer;
		}
		.deleteBtn input[type="submit"]:hover {
			background-color: #c9302c;
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
	<title>Delete Menu Item</title>
	<link rel="stylesheet" href="styles.css">
</head>
<body>
	<a href="viewOrder.php?customer_id=<?php echo $_GET['customer_id']; ?>">Back</a>
	<div class="inputMain">
		<h1>Delete this Menu Item?</h1>
		<div class="inputInner">
			<?php $getOrderByID = getOrderByID($pdo, $_GET['order_id']); ?>
			<div class="container">
				<h3><b>Order Name:</b> <?php echo $getOrderByID['order_details']; ?></h3>
				<h3><b>Date Joined</b> <?php echo $getOrderByID['order_date']; ?></h3>
			</div>
			<div class="deleteBtn" style="margin: 20px; text-align: center;">
				<form action="core/handleForms.php?order_id=<?php echo $_GET['order_id']; ?>&customer_id=<?php echo $_GET['customer_id']; ?>" method="POST">
					<input type="submit" name="deleteOrderBtn" value="Delete">
				</form>
			</div>
		</div>
	</div>
</body>
</html>
