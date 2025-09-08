<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sākum lapa</title>
</head>
<body>
    <h1>Sākum lapa</h1>

    <?php if (isset($_SESSION['username'])): ?>
        <p>Sveicināts, <strong><?= $_SESSION['username'] ?></strong>!</p>
        <p>Loma: <strong><?= $_SESSION['role'] ?></strong></p>

        <?php if ($_SESSION['role'] == 'admin'): ?>
            <p><a href="#">Admina panelis</a></p>
        <?php else: ?>
            <p><a href="#">Sākt testu</a></p>
        <?php endif; ?>

        <p><a href="logout.php">Izrakstīties</a></p>

    <?php else: ?>
        <h2>Pieslēgties</h2>
        <form method="POST" action="login.php">
            Lietotājvārds: <input type="text" name="username" required><br>
            Parole: <input type="password" name="password" required><br>
            <input type="submit" value="Pieslēgties">
        </form>

        <h2>Reģistrēties</h2>
        <form method="POST" action="register.php">
            Lietotājvārds: <input type="text" name="username" required><br>
            Parole: <input type="password" name="password" required><br>
            <input type="submit" value="Reģistrēties">
        </form>
    <?php endif; ?>
</body>
</html>
