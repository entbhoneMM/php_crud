<?php

include("vendor/autoload.php");

use Libs\Database\MySQL;
use Libs\Database\UsersTable;
use Helpers\Auth;

$Auth = Auth::check();

$table = new UsersTable(new MySQL);
$users = $table->getAll();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Users</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body class="bg-secondary">
    <div class="container">

        <h1 class="h3 mt-4 mb-3">User Admin
            <span class="badge bg-danger text-white">
                <?= count($users) ?>
            </span>
        </h1>


        <table class="table table-striped table-secondary">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Role</th>
                <th>Action</th>
            </tr>
            <?php foreach ($users as $user) : ?>
                <tr>
                    <td><?= $user->id ?></td>
                    <td><?= $user->name ?></td>
                    <td><?= $user->email ?></td>
                    <td><?= $user->phone ?></td>
                    <td>
                        <?php if ($user->role_id === 3) : ?>
                            <span class="badge bg-success">
                            <?php elseif ($user->role_id === 2) : ?>
                                <span class="badge bg-primary">
                                <?php else : ?>
                                    <span class="badge bg-secondary">
                                    <?php endif ?>
                                    <?= $user->role ?>
                                    </span>
                    </td>
                    <td>
                        <div class="button-group dropdown">
                            <?php if ($Auth->role_id === 3) : ?>
                                <a href="" class="btn btn-outline-primary btn-sm dropdown-toggle" data-bs-toggle="dropdown">Change Role</a>
                                <div class="dropdown-menu dropdown-menu-dark">
                                    <a href="_actions/role.php?id=<?= $user->id ?>&role=1" class="dropdown-item">User</a>
                                    <a href="_actions/role.php?id=<?= $user->id ?>&role=2" class="dropdown-item">Editor</a>
                                    <a href="_actions/role.php?id=<?= $user->id ?>&role=3" class="dropdown-item">Admin</a>
                                </div>
                            <?php endif ?>

                            <?php if ($Auth->role_id >= 2) : ?>
                                <?php if ($user->suspended) : ?>
                                    <a href="_actions/unsuspend.php?id=<?= $user->id ?>" class="btn btn-warning btn-sm">Unban</a>
                                <?php else : ?>
                                    <a href="_actions/suspend.php?id=<?= $user->id ?>" class="btn btn-outline-warning btn-sm">Ban</a>
                                <?php endif  ?>
                                <a href="_actions/delete.php?id=<?= $user->id ?>" class="btn btn-outline-danger btn-sm" onClick="return comfirm('Are You Sure?')">Delete</a>
                            <?php endif ?>

                        </div>
                    </td>
                </tr>
            <?php endforeach ?>

        </table>
    </div>

    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>