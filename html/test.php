<html>
<head></head>
<body>

<h1>Min att-göra-lista</h1>

<!-- FORMULÄR -->
<form method="POST" action="">
	<label for="todo-name">Att göra:</label><br>
	<input type="text" name="todo-name"><br><br>
	<label for="todo-day">Veckodag:<br></label>
	<input type="text" name="todo-day"><br><br>
	<input type="submit" value="Lägg till syssla">
</form>

<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL | E_STRICT);

$connection = new mysqli("db", "user", "password", "my_database");

if ($connection -> connect_error) {
    die("Connection failed: " . $connection -> connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $todo_name = htmlspecialchars($_POST["todo-name"]); 
    $todo_day = htmlspecialchars($_POST["todo-day"]);
    
    echo "<h1>Mina sysslor</h1>";
    echo "Jag ska $todo_name på $todo_day.<br><br>";
    
    $sql = "INSERT INTO to_do_list (name, day) VALUES ('$todo_name', '$todo_day')";
    
    if (mysqli_query($connection, $sql)) {
        echo "Ny syssla har lagts till i tabellen!";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($connection);
    }
  
}

$connection -> close();

?>

</body>
</html>