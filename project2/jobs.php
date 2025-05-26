<!-- Filename: jobs.php
Name: Job pages
Description: Current job openings
Author: Elana Nguyen, Haider Sakhi
Contributors: Elana Nguyen, Daehyeon Kim, Haider Sakhi
Version: 1.1
Date created: 06/04/2025
Last modified: 21/05/2025
-->
<?php
$meta_description = "Current job openings at DEHA GAMES. Explore our job listings and apply today!";
$page_title = "Job Openings - DEHA GAMES";
$meta_author = "Elana Nguyen, Haider Sakhi";
include "header.inc";
include "nav.inc";
require_once "settings.php"; 
?>

<main id="jobs_main">
    <h1>Careers at DEHA GAMES</h1>
    <div class="article_aside">
        <article id="jobs_article">
            <h3>Current Job Openings</h3>
            <section>
                <h3>Job lists</h3>

                <?php
                    $query = "SELECT * FROM jobs";
                    $result = mysqli_query($conn, $query);

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<section>";
                            echo "<h3>" . htmlspecialchars($row['title']) . "</h3>";
                            echo "<p>Ref: " . htmlspecialchars($row['job_ref']) . "</p>";
                            echo "<p>" . htmlspecialchars($row['type']) . " Position</p>";
                            echo "<p><i class='fa fa-map-marker-alt'></i> " . htmlspecialchars($row['location']) . "</p>";
                            echo "<p><i class='fas fa-briefcase'></i> Salary Range: " . htmlspecialchars($row['salary_range']) . "</p>";
                            echo "<p><i class='far fa-clock'></i> Close date: " .  date("d M, Y", strtotime($row['close_date'])) . "</p>";
                            echo "<p>" . htmlspecialchars($row['description']) . "</p>";
                            echo "<a class='detail_box' href='" . htmlspecialchars($row['detail_link']) . "' target='_blank'>View Full Details</a>";
                            echo "</section>";
                        }
                    } else {
                        echo "<p>No jobs available at the moment.</p>";
                    }

                    mysqli_close($conn);
                ?>
            </section>
        </article>

        <!-- Aside -->
        <aside class="aside">
            <div class="text_box">
                <h3>Why DEHA GAMES?</h3>
                <p>We're building a team of innovators who thrive on collaborative, creativity, and cutting-edge challenges. Join us to shape the future of gaming!</p>
            </div>
            <img id="levelup" src="images/levelup.png" alt="level-up">
        </aside>
    </div>
</main>

<?php include "footer.inc"; ?>
