<?php
session_start();
$email = $_POST['email'];
$password = $_POST['password'];
if ($email === 'entbhonemyintmo@gmail.com' and $password === 'string123') {
    $_SESSION['user'] = ['username' => 'Ent Bhone Myint Mo'];
    header('location: ../profile.php');
} else {
    header('location: ../index.php?incorrect=1');
}
