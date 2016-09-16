<?php
header('Content-Type: application/json');

$link = mysql_connect('yourserveraddress', 'username', 'password') or die("Could not connect ");

# lets grab some random facts...

mysql_select_db("databasename");
header('Content-Type: application/json');
$query = 'SELECT fact_text FROM facts ORDER BY rand() LIMIT 1';

$result = mysql_query($query) or die("Query failed");

$line = mysql_fetch_assoc($result);

$out = array(
	"fact" => $line["fact_text"]
);

print $_GET["callback"].json_encode($out);

# had to remove the paranthesis and semicolon to get the other script to like this.