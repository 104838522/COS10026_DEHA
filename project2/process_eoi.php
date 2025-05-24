<!-- Filename: process_eoi.php
Name: process eoi page
Description: Expression of interest page for DEHA GAMES
Author: Elana Nguyen
Contributors: Elana Nguyen
Version: 1.2
Date created: 21/05/2025
Last modified: 22/05/2025
-->

<?php
require_once "settings.php";
session_start();

$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {
    die("Failed to connect to database: " . mysqli_connect_error());
}

// Create table if one doesn't exist
<!--create table query

CREATE TABLE eoi (
  EOInumber INT AUTO_INCREMENT PRIMARY KEY,
  job_reference ENUM('SD035', 'CLE56', 'UIX37') NOT NULL,
  first_name VARCHAR(20) NOT NULL,
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
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-->

//validate form data
//validate job reference
$job_reference = '';
if (isset($_POST['job_reference'])) {
    $job_reference = htmlspecialchars($_POST['job_reference']);
}
// add error echo

// validate first name
$first_name = '';
if (isset($_POST['first_name'])) {
    $first_name = htmlspecialchars($_POST['first_name']);
}
if (empty($first_name)) {
    echo "<p>First name is required.<p>";
} elseif (!preg_match('/^[a-zA-Z]{1,20}$/', $first_name)) {
    echo "<p>First name must be max 20 alphabetic characters.<p>";
}

// validate last name
$last_name = '';
if (isset($_POST['last_name'])) {
    $last_name = htmlspecialchars($_POST['last_name']);
}
if (empty($last_name)) {
    echo "<p>Last name is required.<p>";
} elseif (!preg_match('/^[a-zA-Z]{1,20}$/', $last_name)) {
    echo "<p>Last name must be max 20 alphabetic characters.<p>";
}

// validate date of birth
$date_of_birth = '';
if (isset($_POST['date_of_birth'])) {
    $date_of_birth = htmlspecialchars($_POST['date_of_birth']);
}
if (empty($date_of_birth)) {
    echo "<p>Date of birth is required.<p>";
} elseif (!preg_match('/^\d{2}\/\d{2}\/\d{4}$/', $date_of_birth)) {
    echo "Date of birth must be in dd/mm/yyyy format.<p>";
}

// validate email address
$email = test_input($_POST['email']);
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  echo "<p>Input valid email address.<p>";
}

