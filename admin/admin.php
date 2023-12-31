<?php
require_once '../admin/connekt.php';

session_start();

$name = isset($_POST["login"]) ? $_POST["login"] : "";
$password = isset($_POST["password"]) ? $_POST["password"] : "";

$sql = $mysqli->prepare("SELECT id, login FROM user WHERE login = ? AND password = ?");
$sql->bind_param("ss", $name, $password);
$sql->execute();
$result = $sql->get_result();
$row = $result->fetch_assoc();

$sql->close();
$mysqli->close();



if ($row && $row["id"] > 0) {
    $_SESSION["login"] = $row["login"];
    setcookie("login", $name, time() + 220);
    setcookie("password", $password, time() + 220);
    header('Location:../admin/redactBaza.php');
} else {
    header('Location:../admin/login.php');
}
?>