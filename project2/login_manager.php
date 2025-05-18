<?php
require_once "settings.php";
session_start();

$message = "";



if ($_SERVER["REQUEST_METHOD"] === "POST") {
    //bring in the username and password from the form
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);
    
    //prepare query and bring result
    $sql = "SELECT * FROM managers WHERE username = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    //check if the username exists
    //username exists
    if ($row = mysqli_fetch_assoc($result)) {
        //username exists, correct password
        if (password_verify($password, $row['password_hash'])) {
            $_SESSION['username'] = $username;// Store username in session
            header("Location: manage.php");
            exit();
        } 
        //username exists, incorrect password
        else {
            $message = "❌ Incorrect password.";
        }
    } 
    //username does not exist
    else {
        $message = "❌ Username not found.";
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
    <form method="POST" action="login_manager.php">
        <label>Username: <input type="text" name="username" required></label><br><br>
        <label>Password: <input type="password" name="password" required></label><br><br>
        <input type="submit" value="Login">
    </form>
</main>
<?php include "footer.inc"; ?>
