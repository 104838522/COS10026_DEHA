<!-- Filename: uiux-designer-uix37.html
Name: Job Description Page - UIX37
Description: Job description page for UI/UX Designer position Reference Number: UIX37
Author: Elana Nguyen
Contributors: Elana Nguyen, Daehyeon Kim
Version: 1.1
Date created: 06/04/2025
Last modified: 21/05/2025
-->

<?php
$meta_description = "UI/UX Designer job description page for DEHA GAMES. Explore the job details and apply";
$page_title = "UI/UX Designer - DEHA GAMES";
$meta_author = "Elana Nguyen";

include "header.inc";
include "nav.inc";
require_once "settings.php";



$query = "SELECT * FROM jobs WHERE job_ref = 'UIX37'";
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
            <p>Reports to: Creative Director</p>
            <p>Job date listed: 01 April, 2025</p>
        </div>

        <p><?php echo htmlspecialchars($job['description']); ?><br><br></p>
        <!-- Job summary -->
                <p>
                DEHA GAMES is seeking a UI/UX Designer to shape the player experience
                for our games. Create intuitive and stunning interfaces that enhance
                player engagement across our gaming portfolio. You&apos;ll craft intuitive
                interfaces, design engaging user flows, and collaborate with
                developers and artists to bring visually stunning and user-friendly
                designs to life. We&apos;re looking for a creative thinker with a passion
                for gaming and a keen eye for detail.
                </p>

        <!-- Job responsibilities -->
        <h3>Key Responsibilities</h3>
        <ol>
            <li>Design game interfaces and menus</li>
            <li>Develop wireframes and prototypes</li>
            <li>Conduct user testing and iterate designs</li>
            <li>Collaborate with software developers and product managers</li>
        </ol>

        <!-- Requirements for job position -->
        <h3>Requirements</h3>
        <p>Essential:</p>
        <ul>
            <li>Bachelor's degree in Design or related field</li>
            <li>2+ years experience in UI/UX design</li>
            <li>Proficiency in Adobe Suite and Figma</li>
        </ul>
        <p>Preferable:</p>
        <ul>
            <li>Experience with game UI design</li>
            <li>Knowledge of Unity or Unreal Engine</li>
        </ul>

        <a class="detail_box" href="apply.php">Apply Now</a>
    </section>
</main>

<?php
mysqli_close($conn);
include "footer.inc";
?>

