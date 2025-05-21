<!-- Filename: software-developer-sd035.php
Name: Job Description Page - SD035
Description: Job description page for Software Engineer position Reference Number: SD035
Author: Elana Nguyen
Contributors: Elana Nguyen, Daehyeon Kim
Version: 1.2
Date created: 06/04/2025
Last modified: 21/05/2025
-->

<?php
$meta_description = "Software Developer job description page for DEHA GAMES. Explore the job details and apply";
$page_title = "Software Developer - DEHA GAMES";
$meta_author = "Elana Nguyen";
include "header.inc";
include "nav.inc";
require_once "settings.php";

$query = "SELECT * FROM jobs WHERE job_ref = 'SD035'";
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
            <p>Reports to: Lead Software Engineer</p>
            <p>Job date listed: 02 April, 2025</p>
        </div>

        <p><?php echo htmlspecialchars($job['description']); ?><br><br></p>
        <!-- Job summary -->
                <p>
                DEHA GAMES is hiring a Software Developer to design and build
                innovative gaming software. Join our team to be part of the innovative
                gaming revolution to enhance the user experience. We are looking for 1
                x Software Developer, with the opportunity of a Full-time position,
                passionate about the future of games and technology.
                </p>

        <!-- Job responsibilities -->
        <h3>Key Responsibilities</h3>
        <ol>
            <li>Design and implement scalable software solutions</li>
            <li>Write clean, maintainable, and well-documented code</li>
            <li>Participate in code reviews and maintain coding standards</li>
            <li>Collaborate with UX designers and product managers</li>
            <li>Optimise applications for maximum performance</li>
            <li>Participate in agile development processes</li>
        </ol>

        <!-- Requirements for job position -->
        <h3>Requirements</h3>
        <p>Essential:</p>
        <ul>
            <li>Bachelor's degree in Computer Science or related field</li>
            <li>3+ years experience with C++</li>
            <li>Strong problem-solving and analytical skills</li>
            <li>Experience with Unreal Engine or Unity</li>
            <li>Proficiency in version control systems (Git)</li>
        </ul>
        <p>Preferable:</p>
        <ul>
            <li>Experience with cloud platforms (AWS/Azure)</li>
            <li>Knowledge of Agile/Scrum methodologies</li>
            <li>Experience with JavaScript, C# and modern frontend frameworks such as React</li>
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



