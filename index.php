<?php BOB WAS HERE
include('database.php'); // Include the class
$dataBase = new DB; // Create new DB object
?>

<form method="POST" action="index.php">
    Email <input type="text" name="email" /><br />
    Text <input type="text" name="text" /><br />
    <input type="submit" value="submit" />
</form>
<?

$text = $_POST['text'];
$email = $_POST['email'];

if(filter_var($email, FILTER_VALIDATE_EMAIL)){
    $sqlInsert = "INSERT INTO posts (`text`, `email`) VALUES('$text', '$email')"; // Basic SQL INSERT statment
} else {
    echo "EMAIL NOT VALID. FAIL!<br />";
}

$dataBase->runQuery($sqlInsert); // This will run the SQL statement above and will throw an exception if the SQL statement is bad.



$sqlSelect = "SELECT id, text, email, timestamp FROM posts"; // Basic SQL SELECT Statment

$data = $dataBase->getQuery($sqlSelect); // This will run the SQL statment and return and associative array.

foreach($data as $d)
{
	echo $d["text"]." ".$d["email"]."!<br />"; // This will output "This is a test!"
}


?>
