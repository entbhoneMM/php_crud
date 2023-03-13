<!DOCTYPE html>
<html>

<head>
    <title>Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        .wrap {
            width: 90%;
            max-width: 400px;
            margin: 40px auto;
        }
    </style>
</head>

<body class="text-center">
    <div class="wrap">
        <h1 class="h3 mb-3">Login</h1>
        <?php if (isset($_GET['incorrect'])) : ?>
            <div class="alert alert-danger">
                Incorrect Email or Password
            </div>
        <?php endif ?>
        <?php if (isset($_GET['logout'])) : ?>
            <div class="alert alert-success">
                Bye... Please Come Again!
            </div>
        <?php endif ?>
        <form action="_actions/create.php" method="post">
            <div class="mb-2">
                <input type="text" name="name" class="form-control" placeholder="Name" required>
            </div>
            <div class="mb-2">
                <input type="email" name="email" class="form-control" placeholder="Email" required>
            </div>
            <div class="mb-2">
                <input type="text" name="phone" class="form-control" placeholder="Phone" required>
            </div>
            <div class="mb-2">
                <textarea name="address" class="form-control" placeholder="Address" required></textarea>
            </div>
            <div class="mb-2">
                <input type="password" name="password" class="form-control mb-2" placeholder="Password" required>
            </div>
            <button type="submit" class="w-100 btn btn-lg btn-primary">
                Register
            </button>
        </form>
        <br>
        <a href="index.php">Login</a>
    </div>
</body>

</html>