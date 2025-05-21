<!-- Filename: manage.php
Name: manager page
Description: Manager dashboard for DEHA GAMES
Author: Daehyeon Kim, Andrew Williams
Contributors: Daehyeon Kim, Andrew Williams
Version: 1.2
Date created: 18/05/2025
Last modified: 21/05/2025
-->
<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login_manager.php");
    exit();
}
?>
<!-- HTML Form -->
<?php
  $meta_description="Manager Dashboard Page for DEHA GAMES. View and manage job applications.";
  $page_title = "Manager Dashboard - DEHA GAMES";
  $meta_author = "Daehyeon Kim, Andrew Williams";
?>

<?php include "header.inc"; ?>
<?php include "nav.inc"; ?>
<main>
    <h1>Welcome to Manager Dashboard</h1>
    <p>Hello, <?= htmlspecialchars($_SESSION['username']) ?>! You are now logged in.</p>
    <div class="form-message"><a href="logout.php" class=form-message>Logout</a></div>
</main>
<?php include "footer.inc"; ?>
