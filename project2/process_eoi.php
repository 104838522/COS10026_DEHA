<!-- Filename: process_eoi.php
Name: process eoi page
Description: Expression of interest page for DEHA GAMES
Author: Elana Nguyen
Contributors: Elana Nguyen
Version: 1.2
Date created: 21/05/2025
Last modified: 25/05/2025
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

// Initialise error array
$error = [];

// Initialise variables and sanitise user data
// Job Reference
$job_reference = '';
if (isset($_POST['job'])) {
    $job_reference = clean_input($_POST['job']);  // need validation
}

// First Name
$first_name = '';
if (isset($_POST['firstName'])) {
    $first_name = clean_input($_POST['firstName']);
    if (empty($first_name)) {
        $errors[] = "First name is required.";
    } elseif (!preg_match("/^[a-zA-Z]{1,20}$/", $first_name)) {
        $errors[] = "First name must be up to 20 alphabetic characters.";
    }
}

// Last Name
$last_name = '';
if (isset($_POST['lastName'])) {
    $last_name = clean_input($_POST['lastName']);
    if (empty($last_name)) {
        $errors[] = "Last name is required.";
    } elseif (!preg_match("/^[a-zA-Z]{1,20}$/", $last_name)) {
        $errors[] = "Last name must be up to 20 alphabetic characters.";
    }
}

// Date of Birth
$date_of_birth = '';
if (isset($_POST['dateOfBirth'])) {
    $date_of_birth = clean_input($_POST['dateOfBirth']); // need validation
}

// Gender
$gender = '';
if (isset($_POST['gender'])) {
    $gender = clean_input($_POST['gender']);
}

// Other Gender
$other_gender = '';
if (isset($_POST['otherGender'])) {
    $other_gender = clean_input($_POST['otherGender']); // need validation
}

// Street Address
$street_address = '';
if (isset($_POST['streetAddress'])) {
    $street_address = clean_input($_POST['streetAddress']);
    if (empty($street_address)) {
        $errors[] = "Street address is required.";
    } elseif (strlen($street_address) > 40) {
        $errors[] = "Street address must be up to 40 characters.";
    }
}

// Suburb
$suburb = '';
if (isset($_POST['suburb'])) {
    $suburb = clean_input($_POST['suburb']);
    if (empty($suburb)) {
        $errors[] = "Suburb/town is required.";
    } elseif (strlen($suburb) > 40) {
        $errors[] = "Suburb/town must be up to 40 characters.";
    }
}

// State
$state = '';
if (isset($_POST['state'])) {
    $state = clean_input($_POST['state']); // need validation
}

// Postcode
$postcode = '';
if (isset($_POST['postcode'])) {
    $postcode = clean_input($_POST['postcode']); // need validation
}

// Email Address
$email = '';
if (isset($_POST['email'])) {
    $email = clean_input($_POST['email']);
    if (empty($email)) {
        $errors[] = "Email address is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }
}

// Phone Number
$phone = '';
if (isset($_POST['phoneNumber'])) {
    $phone = clean_input($_POST['phoneNumber']); // need validation
}

// Skills
$skill1 = '';
if (isset($_POST['skill1'])) {
    $skill1 = clean_input($_POST['skill1']);  // need validation
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

// Status of application
$status = 'New'; // Default to 'New' status
if (isset($_POST['status'])) {
    $status = clean_input($_POST['status']);
}

// Stops execution if there are errors
if (!empty($errors)) {
        echo "<p>The following errors were found:</p>";
        echo "<ul>";
        foreach ($errors as $error) {
            echo "<li>$error</li>";
        }
        exit;
    }

// Prepare query with placeholders
$stmt = $conn->prepare("INSERT INTO eoi (job_reference, first_name, last_name, date_of_birth, gender, street_address, suburb, state, postcode, email, phone) 
                        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
// Bind values to placeholders
$stmt->bind_param("sssssssssss", $job_reference, $first_name, $last_name, $date_of_birth, $gender, $street_address, $suburb, $state, $postcode, $email, $phone);

// Send SQL query to database
if ($stmt->execute()) {
    echo "Application submitted successfully.";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>