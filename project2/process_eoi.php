<!-- Filename: process_eoi.php
Name: process eoi page
Description: Expression of interest page for DEHA GAMES
Author: Elana Nguyen
Contributors: Elana Nguyen
Version: 1.2
Date created: 21/05/2025
Last modified: 26/05/2025
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
$errors = [];

// Initialise variables and sanitise user data
// Job Reference
$job_reference = '';
if (isset($_POST['job'])) {
    $job_reference = clean_input($_POST['job']);
    if (!in_array($job_reference, ['SD035', 'CLE56', 'UIX37'])) {
        $errors[] = "Job reference number field required.";
    }
}

// First Name
$first_name = '';
if (isset($_POST['firstName'])) {
    $first_name = clean_input($_POST['firstName']);
    if (empty($first_name)) {
        $errors[] = "First name field is required.";
    } elseif (!preg_match("/^[a-zA-Z\s'-]{1,20}$/", $first_name)) {
        $errors[] = "First name exceeds 20 alphabetic characters limit.";
    }
}

// Last Name
$last_name = '';
if (isset($_POST['lastName'])) {
    $last_name = clean_input($_POST['lastName']);
    if (empty($last_name)) {
        $errors[] = "Last name field is required.";
    } elseif (!preg_match("/^[a-zA-Z\s'-]{1,20}$/", $last_name)) {
        $errors[] = "Last name must be up to 20 alphabetic characters.";
    }
}

// Date of Birth
$date_of_birth = '';
if (isset($_POST['dateOfBirth'])) {
    $date_of_birth = clean_input($_POST['dateOfBirth']);
    if (empty($date_of_birth))
        $errors[] = "Date Of Birth field is required.";
}
// Gender
$gender = '';
if (!isset($_POST['gender']) || empty($_POST['gender'])) { // Check for empty radio check box
    $errors[] = "Gender selection field is required.";
} else {
    $gender = clean_input($_POST['gender']);
}

// Other Gender
$other_gender = NULL;
if ($gender === 'other') {
    if (!isset($_POST['otherGender']) || empty($_POST['otherGender'])) {
        $errors[] = "Other gender field is required.";
    } else {
        $other_gender = clean_input($_POST['otherGender']);
        if (!preg_match("/^[a-zA-Z\s'-]{0,20}$/", $other_gender)) {
            $errors[] = "Other gender field must only contain alphabetic characters.";
        }
    }
}

// Street Address
$street_address = '';
if (isset($_POST['streetAddress'])) {
    $street_address = clean_input($_POST['streetAddress']);
    if (empty($street_address)) {
        $errors[] = "Street address field is required.";
    } elseif (strlen($street_address) > 40) {
        $errors[] = "Street address exceeds 40 characters.";
    } elseif (!preg_match("/^[a-zA-Z0-9\s\-\/]{1,40}$/", $street_address)) {
        $errors[] = "Street address can only contain letters, numbers, spaces, hyphens, or forward slashes.";
    }
}

// Suburb
$suburb = '';
if (isset($_POST['suburb'])) {
    $suburb = clean_input($_POST['suburb']);
    if (empty($suburb)) {
        $errors[] = "Suburb field is required.";
    } elseif (!preg_match("/^[a-zA-Z0-9\s]{1,40}$/", $suburb)) {
        $errors[] = "Suburb exceeds 40 characters.";
    }
}

// State
$state = '';
if (isset($_POST['state'])) {
    $state = clean_input($_POST['state']);
    if (!in_array($state, ['VIC', 'NSW', 'QLD', 'SA', 'WA', 'TAS', 'NT', 'ACT'])) {
        $errors[] = "State field required.";
    }
}

// Postcode
$postcode = '';
if (isset($_POST['postcode'])) {
    $postcode = clean_input($_POST['postcode']);
    if (!preg_match("/^\d{4}$/", $postcode)) {
        $errors[] = "Postcode must be 4 digits.";
    } else {
        $postcode_ranges = [
            'NSW' => ['2'], // 2000 - 2999
            'VIC' => ['3'], //3000 - 3999
            'QLD' => ['4'], //4000 - 4999
            'SA' => ['5'], //5000 - 5999
            'WA' => ['6'], //6000 - 6999
            'TAS' => ['7'], //7000 - 7999
            'ACT' => ['2'], //2000 - 2999
            'NT' => ['0'] //0000 - 0999
        ];
        $first_digit = substr($postcode, 0, 1);
        if (!in_array($first_digit, $postcode_ranges[$state])) {
            $errors[] = "Postcode does not match selected state.";
        }
    }
}

// Email Address
$email = '';
if (isset($_POST['email'])) {
    $email = clean_input($_POST['email']);
    if (empty($email)) {
        $errors[] = "Email address field is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }
}

// Phone Number
$phone = '';
if (isset($_POST['phoneNumber'])) {
    $phone = clean_input($_POST['phoneNumber']);
    if (empty($phone)) {
        $errors[] = "Phone number field is required.";
    } elseif (!preg_match("/^[\d\s]{8,12}$/", $phone)) {
        $errors[] = "Phone number must be 8 to 12 digits or spaces.";
    }
}

// Skills
$selectedSkills = [];
if (isset($_POST['skills']) && !empty($_POST['skills'])) {
    foreach ($_POST['skills'] as $skill) {
        $selectedSkills[] = clean_input($skill);
    }
} else {
    $errors['skills'] = "One technical skill required.";
}
$skill_values = array_fill(0, 5, NULL); // create array
for ($i = 0; $i < min(count($selectedSkills), 5); $i++) {
    $skill_values[$i] = $selectedSkills[$i];
}

// Other skills
$other_skills = NULL;
if (isset($_POST['otherSkills']) && $_POST['otherSkills'] === 'otherSkills') {
    if (isset($_POST['otherSkillsText']) && !empty(clean_input($_POST['otherSkillsText']))) {
        $other_skills = clean_input($_POST['otherSkillsText']);
        if (strlen($other_skills) > 500) {
            $errors[] = "Other skills description exceeds 500 characters.";
        }
    } else {
        $errors[] = "'Other Skills' checkbox is selected - description required.";
    }
}
else if (isset($_POST['otherSkillsText']) && !empty(clean_input($_POST['otherSkillsText']))) { // Validation if 'Other skills' is not checked but textbox contains text
    $errors[] = "Please check the 'Other Skills' box if you are providing additional skills.";
}

// Status of application
$status = 'New'; // Default to 'New' status
if (isset($_POST['status'])) {
    $status = clean_input($_POST['status']);
}

// Error output
if (!empty($errors)) {
    $meta_description="Error Page for Application Page. List of errors in application form.";
    $page_title = "Incomplete Application Form Page - DEHA GAMES";
    $meta_author = "Elana Nguyen"; 
    include "header.inc";
    include "nav.inc";

    echo "<div class='eoi-container'>";
    echo "<h1>Oops! Your application is incomplete</h1>";
    echo "<p>The following issues were found with your application:</p>";
    echo "<ul>";
    foreach ($errors as $error) {
        echo "<li>" . clean_input($error) . "</li>";
    }
    echo "</ul>";
    echo "<p>Return to <a href='apply.php'>application form</a> ↩️</p>";
    echo "</div><br><br>";

    include "footer.inc";
    exit;
}

// Prepare query with placeholders
$stmt = $conn->prepare("INSERT INTO eoi (job_reference, first_name, last_name, date_of_birth, gender, other_gender, street_address, suburb, state, postcode, email, phone, skill1, skill2, skill3, skill4, skill5, other_skills, status) 
                        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

// Bind values to placeholders                        
$stmt->bind_param(
    "sssssssssssssssssss",
    $job_reference,
    $first_name,
    $last_name,
    $date_of_birth,
    $gender,
    $other_gender,
    $street_address,
    $suburb,
    $state,
    $postcode,
    $email,
    $phone,
    $skill_values[0],
    $skill_values[1],
    $skill_values[2],
    $skill_values[3],
    $skill_values[4],
    $other_skills,
    $status
);

// Application success output and sends SQL query to database
if ($stmt->execute()) {
    $eoi_number = $stmt->insert_id; // Get the auto-generated EOInumber

    $meta_description="Application Submitted Page. Displays user EOI number.";
    $page_title = "Application Successfully Submitted Page - DEHA GAMES";
    $meta_author = "Elana Nguyen"; 
    include "header.inc";
    include "nav.inc";

    echo "<div class='eoi-container'>";
    echo "<h1>Application successfully submitted!</h1><br>";
    echo "<p>Your application has been received. Your EOI reference number is: <strong>" . $eoi_number . "</strong></p><br><br>";
    echo "<p><a href='index.php'>Return to Home page</a></p>";
    echo "</div><br><br><br><br>";

    include "footer.inc";
} else {
    echo "<h1>Application Error</h1>";
    echo "<p>There was an error processing your application. Please try again later.</p>";
    echo "<p>Error: " . htmlspecialchars($stmt->error) . "</>"; // Display SQL error for debugging
}

$stmt->close();
$conn->close();
?>