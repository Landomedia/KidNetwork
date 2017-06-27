<!DOCTYPE html>
<html>
<body>
<?php
$method = $_POST["method"];
$paypal = $_POST["paypal"];
$name = $_POST["name"];
$email = $_POST["email"];
$instagram = $_POST["instagram"];
$count = $_POST["count"];
$school = $_POST["school"];
$state = $_POST["state"];
echo "$state";
$db = new SQLite3('userinfo.db');
$db->exec(" CREATE TABLE IF NOT EXISTS users (method TEXT NOT NULL,paypal TEXT,
name TEXT NOT NULL,email TEXT NOT NULL, instagram TEXT NOT NULL, count INTEGER NOT NULL,
 school TEXT NOT NULL, state TEXT NOT NULL)");
$db->exec("INSERT INTO users"."(method, paypal, name, email, instagram, count, school, state)"." VALUES
('$method', '$paypal', '$name', '$email', '$instagram', $count, '$school', '$state');");
$db->close();
?>
</body>
</html>
