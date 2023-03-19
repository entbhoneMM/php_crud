<?php

include("../vendor/autoload.php");

use Libs\Database\MySQL;
use Libs\Database\UsersTable;
use Helpers\HTTP;

$table = new UsersTable(new MySQL);
$email = $_POST['email'];
$password = $_POST['password'];
$user = $table->findByEmailAndPassword($email, $password);

if ($user) {

    if ($user->suspended) {
        HTTP::redirect('/index.php', 'suspended=1');
    }

    session_start();
    $_SESSION['user'] = $user;
    HTTP::redirect("/profile.php");
} else {
    HTTP::redirect("/index.php", "incorrect=1");
}










// session_start();
// $email = $_POST['email'];
// $password = $_POST['password'];
// if ($email === 'entbhonemyintmo@gmail.com' and $password === 'string123') {
//     $_SESSION['user'] = ['username' => 'Ent Bhone Myint Mo'];
//     header('location: ../profile.php');
// } else {
//     header('location: ../index.php?incorrect=1');
// }
