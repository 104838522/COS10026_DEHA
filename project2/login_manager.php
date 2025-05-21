<!-- Filename: login_manager.php
Name: login page
Description: login page for DEHA GAMES manage page
Author: Daehyeon Kim
Contributors: Daehyeon Kim
Version: 1.2
Date created: 18/05/2025
Last modified: 19/05/2025
-->
<?php
require_once "settings.php";
session_start();

$message = "";

// Initialize session variables for tracking attempts
if (!isset($_SESSION['login_attempts'])) {
    $_SESSION['login_attempts'] = 0;
}
if (!isset($_SESSION['locked_until'])) {
    $_SESSION['locked_until'] = 0;
}

// User is locked out
if (time() < $_SESSION['locked_until']) {
    $remaining = ($_SESSION['locked_until'] - time());
    $message = "❌ Too many failed attempts. Please try again in $remaining second(s). <a href='login_manager.php'>Try again!</a>";
} 
// User is not locked out
elseif ($_SERVER["REQUEST_METHOD"] === "POST") {
    //bring in the username and password from the form
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);
    
    //prepare query and bring result
    $sql = "SELECT * FROM managers WHERE username = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    //check if the username and password are correct
    //A. username exists
    if ($row = mysqli_fetch_assoc($result)) {
        //A-1 username exists, correct password : Success
        if (password_verify($password, $row['password_hash'])) {
            $_SESSION['username'] = $username;// Store username in session
            $_SESSION['login_attempts'] = 0;     // Reset on success
            $_SESSION['locked_until'] = 0;
            header("Location: manage.php");
            exit();
        } 
        //A-2 username exists, incorrect password : Failed
        else {
            $_SESSION['login_attempts']++;
            if ($_SESSION['login_attempts'] >= 3) {
                $_SESSION['locked_until'] = time() + (3 * 60); // Lock for 3 minutes
                $message = "❌ Too many failed attempts. Please try again in 3 minutes. <a href='login_manager.php'>Try again!</a>";
            } else {
                $message = "❌ Incorrect password.";
            }
        }
    } 
    //B. username does not exist: Failed
    else {
        $_SESSION['login_attempts']++;
        if ($_SESSION['login_attempts'] >= 3) {
            $_SESSION['locked_until'] = time() + (3 * 60);
            $message = "❌ Too many failed attempts. Please try again in 3 minutes. <a href='login_manager.php'>Try again!</a>";
        } else {
            $message = "❌ Username not found.";
        }
    }
    mysqli_close($conn);
}
?>

<!-- HTML Form -->
<?php
  $meta_description="Login page for DEHA GAMES manager. Please enter your username and password.";
  $page_title = "login_manager - DEHA GAMES";
  $meta_author = "Daehyeon Kim";
?>

<?php include "header.inc"; ?>
<?php include "nav.inc"; ?>
    <main>
        <h1>Login to Manager Page</h1>
        
        <?php if (!empty($message)): ?>
            <div class="form-message"><?= $message ?></div>
        <?php endif; ?>

        <?php if (time() >= $_SESSION['locked_until']): ?>
        <form method="POST" action="login_manager.php">
            <label>Username: <input type="text" name="username" required></label><br><br>
            <label>Password: <input type="password" name="password" required></label><br><br>
            <input type="submit" value="Login">
        </form>
        <?php endif; ?>
    </main>
<?php include "footer.inc"; ?>
