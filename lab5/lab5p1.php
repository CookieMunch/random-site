<!DOCTYPE html>
<html>
<head>
	<title> LAB 05 Part 1 </title>
	<meta charset="UTF-8">
	<meta name="description" content="CPS530 lab5 part 1">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

	<?php
	session_start();
	if (isset($_SESSION['views']))
	$_SESSION['views']++;
	else {
		$_SESSION['views'] = 1;
	}

	function test_int($num) {
		if ($num >= 3 && $num <= 12)
		return $num;
		else
		return 0;
	}

	$row = test_int($_POST['row']);
	$col = test_int($_POST['col']);
	?>


	<div class="container text-center">
		<h2> Choose the table dimensions (3x3 to 12x12)</h2>
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
			<div class="input-group">
				<input type="text" name="row" class="form-control" placeholder="0">
				<span class="input-group-addon">x</span>
				<input type="text" name="col" class="form-control" placeholder="0">
			</div>
			<br>
			<input class="btn btn-default" type="submit">
			<input class="btn btn-info" type="reset">
		</form>
	</div>
	<br>

	<div class="container text-center">
		<?php
		if ($row > 0 && $col > 0)
		{
			print "The $row by $col multiplication table:";
			echo '<table class="table text-left">';
			echo '<tr> <th>X</th>';

			for ($i = 1; $i <= $col; $i++)
			{
				echo '<th>' . $i . '</th>';
			}
			echo '</tr>';
			for ($i = 1; $i <= $row; $i++){
				print "<tr>\n";
				echo '<th>' . $i . '</th>';
				for ($j = 1; $j <= $col ; $j++){
					print "<td>" . $i * $j . "</td>";
				}
				print "</tr>\n";
			}
			print "</table>";
		}
		elseif ($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			echo 'INVALID INPUT';
		}
		?>
	</div>

	<div class="container text-center">
		<div class="alert alert-info lead">
			You have visited this page: <?php echo $_SESSION['views']; ?> times in this session.
		</div>
	</div>


</body>
</html>
