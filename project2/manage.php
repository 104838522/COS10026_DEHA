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

<?php
  $meta_description="Manager Dashboard Page for DEHA GAMES. View and manage job applications.";
  $page_title = "Manager Dashboard - DEHA GAMES";
  $meta_author = "Daehyeon Kim, Andrew Williams";
?>

<?php include "header.inc"; ?>
<?php include "nav.inc"; ?>
<main>
    <?php
        require_once "settings.php";


        // Function to print the EOI table
        function printEOITable($result) {
            echo "<table border='1'>
                <tr>
                    <th>EOI#</th>
                    <th>Job Ref</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Status</th>
                </tr>";
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                    <td>{$row['EOInumber']}</td>
                    <td>{$row['job_reference']}</td>
                    <td>{$row['first_name']} {$row['last_name']}</td>
                    <td>{$row['email']}</td>
                    <td>{$row['phone']}</td>
                    <td>{$row['status']}</td>
                </tr>";
            }
            echo "</table>";
        }
        $submitted = false;//initial value

        if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["action"])) {

            $action_value = $_POST["action"];
            $submitted = true;

            switch ($action_value) {
                case "view_all":
                    $sort_field = isset($_POST["sort_field"]) ? $_POST["sort_field"] : "EOInumber";
                    $sql = "SELECT * FROM eoi ORDER BY $sort_field";
                    $result = mysqli_query($conn, $sql);
                    if ($result) printEOITable($result);
                    break;

                case "search_by_job":
                    $sort_field = isset($_POST["sort_field"]) ? $_POST["sort_field"] : "EOInumber";
                    $job_ref = mysqli_real_escape_string($conn, $_POST["job_ref"]);
                    $sql = "SELECT * FROM eoi WHERE job_reference = '$job_ref' ORDER BY $sort_field";
                    $result = mysqli_query($conn, $sql);
                    if ($result && mysqli_num_rows($result) > 0) {
                        printEOITable($result);
                    } else {
                        echo "<p>❌ No EOIs found for job reference '$job_ref'.</p>";
                    }
                    break;

                case "search_by_name":
                    $first_name = trim($_POST["first_name"]);
                    $last_name = trim($_POST["last_name"]);

                    if (empty($first_name) && empty($last_name)) {
                        echo "<p>⚠️ Please enter at least a first name or last name.</p>";
                        break;
                    }

                    $first_name = mysqli_real_escape_string($conn, $first_name);
                    $last_name = mysqli_real_escape_string($conn, $last_name);

                    if (!empty($first_name) && !empty($last_name)) {
                        $sql = "SELECT * FROM eoi WHERE first_name LIKE '%$first_name%' AND last_name LIKE '%$last_name%'";
                    } elseif (!empty($first_name)) {
                        $sql = "SELECT * FROM eoi WHERE first_name LIKE '%$first_name%'";
                    } else {
                        $sql = "SELECT * FROM eoi WHERE last_name LIKE '%$last_name%'";
                    }

                    $result = mysqli_query($conn, $sql);
                    if ($result && mysqli_num_rows($result) > 0) {
                        printEOITable($result);
                    } else {
                        echo "<p>❌ No EOIs found for the given name(s).</p>";
                    }
                    break;


                case "delete":
                    $delete_ref = mysqli_real_escape_string($conn, trim($_POST["delete_job_ref"]));
                    $sql = "DELETE FROM eoi WHERE job_reference = '$delete_ref'";
                    if (mysqli_query($conn, $sql)) {
                        echo "<p>✅ EOIs with job reference '$delete_ref' have been deleted.</p>";
                    } else {
                        echo "<p>❌ Failed to delete EOIs.</p>";
                    }
                    break;

                case "update":
                    $eoi_number = $_POST["eoi_number"];
                    $status = mysqli_real_escape_string($conn, $_POST["status"]);
                    $sql = "UPDATE eoi SET status = '$status' WHERE EOInumber = $eoi_number";
                    if (mysqli_query($conn, $sql)) {
                        echo "<p>✅ EOI #$eoi_number status updated to '$status'.</p>";
                    } else {
                        echo "<p>❌ Failed to update status.</p>";
                    }
                    break;
            }
            // go back to the dashboard
            echo '<form method="get" style="margin-top: 20px;">
                <button type="submit">🔙 Back to Dashboard</button>
            </form>';

        }
        ?>
    <!-- HTML Form  dashboard -->
    <?php if (!$submitted): ?>
    <h1>Welcome to Manager Dashboard</h1>
    <p>Hello, <?= htmlspecialchars($_SESSION['username']) ?>! You are now logged in.</p>


    <!-- 1. View All EOIs -->
    <form method="post">
        <h2>📋 View All EOIs</h2>
        <label for="sort_field">Sort by:</label>
        <select name="sort_field" id="sort_field">
            <option value="EOInumber">EOI Number</option>
            <option value="job_reference">Job Reference</option>
            <option value="first_name">First Name</option>
            <option value="last_name">Last Name</option>
            <option value="email">Email</option>
            <option value="phone">Phone</option>
            <option value="status">Status</option>
        </select>
        <button class="detail_box" type="submit" name="action" value="view_all">View All</button>
    </form>

    <!-- 2. Search EOIs by Job Reference -->
    <form method="post">
        <h2>🔎 Search EOIs by Job Reference</h2>
        <label for="sort_field">Sort by:</label>
        <select name="sort_field" id="sort_field">
            <option value="EOInumber">EOI Number</option>
            <option value="first_name">First Name</option>
            <option value="last_name">Last Name</option>
            <option value="email">Email</option>
            <option value="phone">Phone</option>
            <option value="status">Status</option>
        </select>
        <input type="text" name="job_ref" placeholder="Enter Job Reference (e.g., SD035)" required>
        <button class="detail_box" type="submit" name="action" value="search_by_job">Search</button>
    </form>

    <!-- 3. Search EOIs by Applicant Name -->
    <form method="post">
        <h2>🔍 Search EOIs by Applicant Name</h2>
        <input type="text" name="first_name" placeholder="First Name">
        <input type="text" name="last_name" placeholder="Last Name">
        <button class="detail_box" type="submit" name="action" value="search_by_name">Search</button>
    </form>

    <!-- 4. Delete EOIs by Job Reference -->
    <form method="post">
        <h2>🗑 Delete EOIs by Job Reference</h2>
        <input type="text" name="delete_job_ref" placeholder="Enter Job Reference (e.g., SD035)" required>
        <button class="detail_box" type="submit" name="action" value="delete">Delete EOIs</button>
    </form>

    <!-- 5. Update EOI Status -->
    <form method="post">
        <h2>📝 Update EOI Status</h2>
        <input type="number" name="eoi_number" placeholder="Enter EOI Number" required>
        <select name="status" required>
            <option value="">Select Status</option>
            <option value="New">New</option>
            <option value="Current">Current</option>
            <option value="Final">Final</option>
        </select>
        <button class="detail_box" type="submit" name="action" value="update">Update Status</button>
    </form>
    <!-- sign out -->
    <div class="form-message"><a href="logout.php">Logout</a></div>
    <?php endif; ?>
</main>
<?php include "footer.inc"; ?>
