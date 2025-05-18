<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login_manager.php");
    exit();
}
?>

<?php include "header.inc"; ?>
<main>
    <h1>Welcome to Manager Dashboard</h1>
    <p>Hello, <?= htmlspecialchars($_SESSION['username']) ?>! You are now logged in.</p>
</main>
<?php include "footer.inc"; ?>
