<?php

require 'dbconnect.php';

$query = '';
$result = '';
$read = array();
$update = array();
$user_exists = false;
$not_user = false;
$not_pass = false;

//CRIAR USUÁRIO
if (isset($_POST['btnNewLogin'])) {
    $login = htmlspecialchars($_POST['login']);
    $pass = htmlspecialchars(password_hash($_POST['pass'], PASSWORD_BCRYPT));

    $query = "SELECT * FROM access WHERE login = :login";
    $query = $db->prepare($query);
    $query->bindValue("login", $login);
    $query->execute();

    if ($query->rowCount() > 0) {
        $user_exists = true;
    } else {
        $query = '';
        $query = "INSERT INTO access SET login = :login, pass = :pass";
        $query = $db->prepare($query);
        $query->bindValue("login", $login);
        $query->bindValue("pass", $pass);
        $query->execute();
        header("Location: login.php");
    }

}

//FAZER LOGIN
if (isset($_POST['btnLogin'])) {
    $login = htmlspecialchars($_POST['login']);
    $pass = htmlspecialchars($_POST['pass']);

    $query = "SELECT * FROM access WHERE login = :login";
    $query = $db->prepare($query);
    $query->bindValue("login", $login);
    $query->execute();

    if ($query->rowCount() > 0) {
        $query = $query->fetch();
        if (password_verify($pass, $query['pass'])) {
            $_SESSION['crud_login'] = $query['id'];
            header("Location: index.php");
        } else {
            $not_pass = true;
        }
    } else {
        $not_user = true;
    }

}

//FAZER LOGOUT
if (isset($_GET['logout'])) {
    unset($_SESSION['crud_login']);
    header("Location: ../login.php");
}

// CREATE
if (isset($_POST['btnCreate'])) {
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    
    $query = "INSERT INTO users (name, surname, caddate) VALUES('{$name}', '{$surname}', NOW())";
    $query = $db->query($query);
    header("Location: index.php");
}

// READ
$query = "SELECT * FROM users";
$query = $db->query($query);
$result = $query->rowCount();

if ($result) {
    $read = $query->fetchAll();
}

// UPDATE
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $query = "SELECT * FROM users WHERE id = {$_GET['id']}";
    $query = $db->query($query);
    $update = $query->fetchAll();
}

if (Isset($_POST['btnUpdate'])) {
    $name = $_POST['name'];
    $surname = $_POST['surname'];

    $query = "UPDATE users SET name = '{$name}', surname = '{$surname}' WHERE id = {$_GET['id']}";
    $query = $db->query($query);
    header("Location: index.php");
}

// DELETE
if (isset($_GET['delid']) && !empty($_GET['delid'])) {
    $query = "DELETE FROM users WHERE id = {$_GET['delid']}";
    $query = $db->query($query);
    header("Location: ../index.php");
}

// ALTERAR STATUS DOS REGISTROS
if (isset($_POST['action']) && $_POST['action'] === "status") {
   $checked = $_POST['checked']; 
   $id = $_POST['id']; 

   
   $query = "UPDATE users SET status = '{$checked}' WHERE id = {$id}";
   $query = $db->query($query);
}