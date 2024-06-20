<?php
$password = 'azerty';
$hashed_password = password_hash($password, PASSWORD_DEFAULT);
echo $hashed_password;
?>

<br>
<br>

<?php
$password = 'qwerty';
$hashed_password = password_hash($password, PASSWORD_DEFAULT);
echo $hashed_password;

//$2y$10$t2a0mJDOhTju4n9BoXeKUuXnAMH7HduNz8083mmZa457YJeGD.xVS      "azerty"

//$2y$10$YcAzO4ZwMq2Z3hvCg6ZXHu1RhLFQXFuTOKElzV9EhIhdyTOYCddFK      "qwerty"

?>

