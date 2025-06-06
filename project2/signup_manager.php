<!-- Filename: signup_manager.php
Name: signup page
Description: signup page for DEHA GAMES manage page
Author: Daehyeon Kim
Contributors: Daehyeon Kim
Version: 1.2
Date created: 18/05/2025
Last modified: 19/05/2025
-->
<?php
require_once "settings.php";

$message = "";

$table_check_query = "SHOW TABLES LIKE 'managers'";
$table_result = mysqli_query($conn, $table_check_query);// 1 row or 0 row


// Check if the table exists, if not, create it
if (mysqli_num_rows($table_result) === 0) {
    $create_table_sql = "
        CREATE TABLE managers (
            id INT AUTO_INCREMENT PRIMARY KEY,
            username VARCHAR(50) NOT NULL UNIQUE,
            password_hash VARCHAR(255) NOT NULL
        );
    ";
    //Failure to create table
    if (!mysqli_query($conn, $create_table_sql)) {
        die("Failed to create table: " . mysqli_error($conn));
    }
}
// Check if the form is submitted
// If the form is submitted, process the data
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);

    if (!empty($username) && !empty($password)) {

        if (strlen($password) < 8 || 
            !preg_match('/[A-Z]/', $password) || 
            !preg_match('/[0-9]/', $password)) {
            $message = "❗ Password must be at least 8 characters and contain at least one uppercase letter and one number.<a href='signup_manager.php'> Try again!</a>";
        } else {
            // Check if username already exists
            $check_sql = "SELECT * FROM managers WHERE username = ?";
            $stmt = mysqli_prepare($conn, $check_sql);
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            //username already exists
            if (mysqli_num_rows($result) > 0) {
                $message = "❗ This username is already taken.<a href='signup_manager.php'> Try again!</a>";
            } 
            //username does not exist
            else {
                $hashed = password_hash($password, PASSWORD_DEFAULT);

                $insert_sql = "INSERT INTO managers (username, password_hash) VALUES (?, ?)";
                $stmt = mysqli_prepare($conn, $insert_sql);
                mysqli_stmt_bind_param($stmt, "ss", $username, $hashed);
                // Successfully inserted
                if (mysqli_stmt_execute($stmt)) {
                    $message = "✅ Registration successful! <a href='login_manager.php'>Click here to log in</a>.";
                }
                // Failed to insert
                else {
                    $message = "❌ An error occurred during registration. <a href='signup_manager.php'> Try again!</a>";
                }
            }
        }
    } 
    // If the username or password is empty 
    else {
        $message = '❗ Please fill in all fields. <a href="signup_manager.php">Try again!</a>';
    }

    mysqli_close($conn);
}

?>


<!-- HTML Form -->
<?php
  $meta_description="Sign up for the manager page of DEHA GAMES. Create an account to manage your games and content.";
  $page_title = "Sign up Manage Page - DEHA GAMES";
  $meta_author = "Daehyeon Kim";
?>

<?php include "header.inc"; ?>
<?php include "nav.inc"; ?>
<main>
  
    <!-- Show the signup form -->
    <h1>Welcome to DEHA GAMES Manager Signup</h1>
    <p>Join us to manage your games and content.</p>
    <?php if (!empty($message)): ?>
        <!-- Show result message-->
        <div class="form-message"><?= $message ?></div>
    <?php else: ?>
    <form method="POST" action="signup_manager.php">
        <label>Username: <input type="text" name="username" required></label><br><br>
        <label>Password: <input type="password" name="password" required></label><br><br>
        <p>Note: Password must be at least 8 characters long and contain at least one uppercase letter and one number.</p>
        <input type="submit" value="Sign Up">
    </form>
  <?php endif; ?>
</main>
<?php include "footer.inc"; ?>
