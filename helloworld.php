<html> 
	<head> 
	<title>PHP Test</title>
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1"/>
	</head>

<body> 
	<h1>PHP Test</h1>
		<p><b>An Example of PHP in Action</b></p>
		<?php echo "The Current Date and Time is: <br />"; 
		echo date("g:i A l, F j Y.");?> </p>
		<h2>MySQL Information</h2>
		<?php
    $link = mysql_connect("db", "root", "my-secret-pw")
        or die("Could not connect: " . mysql_error());
    print ("Connected successfully");
		echo "<br />";
		$set = mysql_query('SHOW DATABASES;');
		$dbs = array();
		while ($db = mysql_fetch_row($set))
		{
   		$dbs[] = $db[0];
		}
		echo implode('<br/>', $dbs);
		# Run a query to retrieve the mysql version and print it out
		$result = mysql_query("SELECT version()");
		$row = mysql_fetch_row($result);
		echo "MySQL version: " . $row[0];
    mysql_close($link);
		?>
	<h2>PHP Information</h2> 
		<p> <?php phpinfo(); ?> </p> 
	</body> 
</html>
