<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "deha_db"; 

$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {
    die("Failed to connect to database: " . mysqli_connect_error());
}
?>
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
);

-->