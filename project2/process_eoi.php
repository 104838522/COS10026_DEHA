<!-- Filename: process_eoi.php
Name: process eoi page
Description: Expression of interest page for DEHA GAMES
Author: Elana Nguyen
Contributors: Elana Nguyen
Version: 1.2
Date created: 21/05/2025
Last modified: 24/05/2025
-->

<?php
require_once "settings.php";
session_start();

$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {
    die("Failed to connect to database: " . mysqli_connect_error());
}

// Hide server page from user
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: apply.php');
    exit;
}

// Create table if one doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS eoi (
    EOInumber INT AUTO_INCREMENT PRIMARY KEY,
    job_reference ENUM('SD035', 'CLE56', 'UIX37') NOT NULL,
    firstName VARCHAR(20) NOT NULL,
    last_name VARCHAR(20) NOT NULL,
    date_of_birth DATE NOT NULL,
    gender ENUM('Male', 'Female', 'Other', 'Prefer not to say') NOT NULL,
    other_gender VARCHAR(20),
    street_address VARCHAR(40) NOT NULL,
    suburb VARCHAR(40) NOT NULL,
    state ENUM('VIC', 'NSW', 'QLD', 'SA', 'WA', 'TAS', 'NT', 'ACT') NOT NULL,
    postcode CHAR(4) NOT NULL,
    email VARCHAR(100) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    skill1 VARCHAR(10),
    skill2 VARCHAR(10),
    skill3 VARCHAR(10),
    skill4 VARCHAR(10),
    skill5 VARCHAR(10),
    other_skills TEXT,
    status ENUM('New', 'Current', 'Final') DEFAULT 'New'
)";
if ($conn->query($sql) !== TRUE) {
    die("Error sending application." . $conn->error);
}

// Sanitise input function
function clean_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Initialise variables and sanitise user data
$job_reference = '';
if (isset($_POST['job'])) {
    $job_reference = clean_input($_POST['job']);
}

$first_name = '';
if (isset($_POST['firstName'])) {
    $first_name = clean_input($_POST['firstName']);
}

$last_name = '';
if (isset($_POST['lastName'])) {
    $last_name = clean_input($_POST['lastName']);
}

$dob = '';
if (isset($_POST['dateOfBirth'])) {
    $dob = clean_input($_POST['dateOfBirth']);
}

$gender = '';
if (isset($_POST['gender'])) {
    $gender = clean_input($_POST['gender']);
}

$other_gender = '';
if (isset($_POST['otherGender'])) {
    $other_gender = clean_input($_POST['otherGender']);
}

$street_address = '';
if (isset($_POST['streetAddress'])) {
    $street_address = clean_input($_POST['streetAddress']);
}

$suburb = '';
if (isset($_POST['suburb'])) {
    $suburb = clean_input($_POST['suburb']);
}

$state = '';
if (isset($_POST['state'])) {
    $state = clean_input($_POST['state']);
}

$postcode = '';
if (isset($_POST['postcode'])) {
    $postcode = clean_input($_POST['postcode']);
}

$email = '';
if (isset($_POST['email'])) {
    $email = clean_input($_POST['email']);
}

$phone = '';
if (isset($_POST['phoneNumber'])) {
    $phone = clean_input($_POST['phoneNumber']);
}

$skill1 = '';
if (isset($_POST['skill1'])) {
    $skill1 = clean_input($_POST['skill1']);
}

$skill2 = '';
if (isset($_POST['skill2'])) {
    $skill2 = clean_input($_POST['skill2']);
}

$skill3 = '';
if (isset($_POST['skill3'])) {
    $skill3 = clean_input($_POST['skill3']);
}

$skill4 = '';
if (isset($_POST['skill4'])) {
    $skill4 = clean_input($_POST['skill4']);
}

$skill5 = '';
if (isset($_POST['skill5'])) {
    $skill5 = clean_input($_POST['skill5']);
}

$other_skills = '';
if (isset($_POST['otherSkills'])) {
    $other_skills = clean_input($_POST['otherSkills']);
}

$status = 'New'; // Default to 'New' status
if (isset($_POST['status'])) {
    $status = clean_input($_POST['status']);
}

// Insert data to database
$stmt = $conn->prepare("INSERT INTO eoi (job_reference, first_name, last_name, date_of_birth, gender, street_address, suburb, state, postcode, email, phone) 
                        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

$stmt->bind_param("sssssssssss", $job_reference, $first_name, $last_name, $dob, $gender, $street_address, $suburb, $state, $postcode, $email, $phone);

if ($stmt->execute()) {
    echo "Application submitted successfully.";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>