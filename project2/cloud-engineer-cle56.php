<!-- Filename: cloud-engineer-cle56.php
Name: Job Description Page - CLE56
Description: Job description page for Cloud Engineer position Reference Number: CLE56
Author: Elana Nguyen
Contributors: Elana Nguyen, Daehyeon Kim
Version: 1.1
Date created: 06/04/2025
Last modified: 21/05/2025
-->
<?php
$meta_description = "Job Description Page for Cloud Engineer position Reference Number: CLE56. Learn about the job summary, responsibilities, and requirements.";
$page_title = "Cloud Engineer - DEHA GAMES";
$meta_author = "Elana Nguyen";

include "header.inc";
include "nav.inc";
require_once "settings.php";

$query = "SELECT * FROM jobs WHERE job_ref = 'CLE56'";
$result = mysqli_query($conn, $query);
$job = mysqli_fetch_assoc($result);
?>

<main class="job_details_main">
    <section>
        <h2><?php echo htmlspecialchars($job['title']) . " Ref: " . htmlspecialchars($job['job_ref']); ?></h2>
        <div class="job_details">
            <p><?php echo htmlspecialchars($job['type']); ?> Position</p>
            <p>Location: <?php echo htmlspecialchars($job['location']); ?></p>
            <p>Salary Range: <?php echo htmlspecialchars($job['salary_range']); ?></p>
            <p>Close date: <?php echo date("d F, Y", strtotime($job['close_date'])); ?></p>
            <p>Reports to: Infrastructure Manager</p>
            <p>Job date listed: 05 April, 2025</p>
        </div>

        <p><?php echo htmlspecialchars($job['description']); ?><br><br></p>
        <p>
                DEHA GAMES is searching for a Cloud Engineer to support our game
                development infrastructure. Design and maintain cloud infrastructure
                to deliver seamless online gaming experiences to millions. You&apos;ll
                design, deploy, and manage scalable cloud solutions using platforms
                like AWS or Azure, ensuring seamless performance for our games. We&apos;re
                looking for a team player with a knack for problem-solving and a
                passion for gaming and cutting-edge technology.
                </p>

        <!-- Job responsibilities -->
        <h3>Key Responsibilities</h3>
        <ol>
            <li>Design and implement cloud-based solutions</li>
            <li>Manage server scalability and reliability</li>
            <li>Monitor system performance and security</li>
            <li>Integrate cloud services with dev teams</li>
        </ol>

        <!-- Requirements for job position -->
        <h3>Requirements</h3>
        <p>Essential:</p>
        <ul>
            <li>Bachelor's degree in IT or related field</li>
            <li>3+ years experience with AWS or Azure</li>
            <li>Strong problem-solving and analytical skills</li>
            <li>Knowledge of Docker and Kubernetes</li>
            <li>PAWS Certified Solutions Architect certification</li>
        </ul>
        <p>Preferable:</p>
        <ul>
            <li>Experience with gaming infrastructure</li>
        </ul>
<!-- The infomation provided for job salary, job summary, job responsibilities and job position requirements
                were sought using reference: https://www.seek.com.au -->
        <a class="detail_box" href="apply.php">Apply Now</a>
    </section>
</main>

<?php
mysqli_close($conn);
include "footer.inc";
?>
