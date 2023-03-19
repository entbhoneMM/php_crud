<?php

include("../vendor/autoload.php");

use Libs\Database\MySQL;
use Libs\Database\UsersTable;
use Helpers\HTTP;

$table = new UsersTable(new MySQL);
$id = $_GET['id'];
$result = $table->unsuspend($id);

if ($result) {
    HTTP::redirect("/admin.php");
} else {
    HTTP::redirect("/admin.php", "error=unsuspend");
}
