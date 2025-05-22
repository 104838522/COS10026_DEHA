<!-- Filename: about.html
Name: 
Description: about.html - About Us page for DEHA Developers
Author: Daehyeon Kim, Elana Nguyen
Version: 1.0
Date created: 09/04/2025
Last modified: 12/05/2025
-->

<?php
  $meta_description="About Us page for DEHA GAMES. Meet our team and learn about our interests and contributions.";
  $page_title = "About Page - DEHA GAMES";
  $meta_author = "Daehyeon Kim";
?>

<?php include "header.inc"; ?>
<?php include "nav.inc"; ?>

    <!-- Main -->    
    <main>
      <!-- 1,2,3  
      Your group name - Class time and day 
      Your tutor’s name
      All your student IDs
      -->
      <article id="about_article">
        <h2>About Us</h2>
        <p>Welcome to DEHA GAMES! We are a passionate team of developers dedicated to creating immersive gaming experiences. <br>Our mission is to push the boundaries of technology and design to deliver unforgettable adventures for players around the world.</p>
        <section id="group_info">
          <div>
            <h2>Group Information</h2>
            <ul>
              <li>Group Name: <strong>DEHA GAMES</strong></li>
              
              <li>Class Details
                <ul>
                  <li>Day: <strong>Thursday</strong></li>
                  <li>Time: <strong>12:30-14:30 PM</strong></li>
                </ul>
              </li>
          
              <li>Tutor Name:
                <ul>
                  <li><strong>Nick</strong></li>
                </ul>
              </li>
            </ul>
          </div>
            
          <div id="team_members">
            <h2>Team Members</h2>
                <ul>
                  <li><!-- Member 1--><strong>Daehyeon Kim</strong>
                    <ul>
                      <li>Student ID: 104838522</li>
                    </ul>
                  </li>
                  <li><!-- Member 2 --><strong>Elana Nguyen</strong>
                    <ul>
                      <li>Student ID: 103561694</li>
                    </ul>
                  </li>
                  <li><!-- Member 3 --><strong>Haider Sakhi</strong>
                    <ul>
                      <li>Student ID: 105912168 </li>
                    </ul>
                  </li>
                  <li><!-- Member 4 --><strong>Andrew Williams</strong>
                    <ul>
                      <li>Student ID: 105920983 </li>
                    </ul>
                  </li>
                </ul>
            </div>
        </section>
      
        <!-- 5 Group photo -->
        <section id="group_photo">
          <h2>Group Photo</h2>
          <figure>
            <img src="images/group_photo.png" alt="Group photo of DEHA GAMES" width="300">
            <figcaption>DEHA Developers Team</figcaption>
          </figure>
        </section>
        <!-- Other info -->
    
        <!-- 4 Member Contributions -->
        <section class="Other_info">
          <h2>Member Contributions for Project2</h2>
          <dl>
            <dt><!-- Member 1 -->Daehyeon Kim</dt>
            <dd>Use PHP to reuse common elements in your Web site</dd>
            <dd>Create a file to store your database connection variables "settings.php"</dd>
            <dd>Create an EOI table (expressions of interest)</dd>
            <dd>Enhancements</dd>
            <dt><!-- Member 2 -->Elana Nguyen</dt>
            <dd>Adding validated rocords to the EOI table (process_eoi.php)</dd>
            <dt><!-- Member 3 -->Haider Sakhi</dt>
            <dd>Update about page (about.php)</dd>
            <dd>Jobs Description</dd>
            <dt><!-- Member 4 -->Andrew Williams</dt>
            <dd>HR manager queries (manage.php)</dd>
          </dl>
        </section>
        <!-- 6 Member's interest -->
        <section class="Other_info">
          <h2>Group Interests</h2>
          <table class="interests-table">
            <caption>Group Member Interests</caption>
            <thead>
              <tr>
                <th>Name</th>
                <th>Interest</th>
                <th>Details</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td rowspan="2">Daehyeon Kim</td>
                <td>Cloud computing</td>
                <td>I’m interested in cloud computing, especially using AWS to deploy and manage scalable web applications. 
                  I enjoy learning how services like EC2 and S3 work together to support modern software systems.</td>
              </tr>
              <tr>
                <td>Car tunning</td>
                <td>I’m passionate about car tuning because it combines mechanical skills with creativity. 
                  I enjoy learning how different modifications can improve a car’s performance, sound, and appearance.</td>
              </tr>

              <tr>
                <td rowspan="2">Elana Nguyen</td>
                <td>Data analysis</td>
                <td>Having a background in Science I find analysing data very fun and interesting. 
                  I like learning about the different ways data can be interpreted and utilised 
                  to make informed decisions and solve complex problems.</td>
              </tr>
              <tr>
                <td>3D design/printing</td>
                <td>I enjoy 3D design and printing 
                  because it allows me to turn creative ideas into real-world objects. 
                  It helps me understand both the creative and technical sides of design.</td>
              </tr>

              <tr>
                <td rowspan="2"> Haider Sakhi</td>
                <td>Coding</td>
                <td>Took Applied Computing, Data Analytics and Software Development 
                  in high school which explains my interest for Software Engineering. </td>
              </tr>
              <tr>
                <td>Gaming, PC's</td>
                <td>I'm also interested in PC's and have a fair bit of knowledge. 
                  I enjoy learning how computer hardware works and how different components affect performance.
                </td>
              </tr>

              <tr>
                <td rowspan="2">Andrew Williams</td>
                <td>Game design, Gaming </td>
                <td> I find game design and development both interesting and fun. 
                And I like playing games in my free time (sometimes), mostly challenge runs and the like.</td>
              </tr>
              <tr>
                <td>Music (instrumentalist and composer)</td>
                <td>Been playing piano since I was 5 and got into writing music a few years ago, 
                  and I'm very passionate about.</td>
              </tr>
            </tbody>
          </table>
        </section>
          
        <!-- Extra members information -->
        <section class="Other_info">
          <h2>Extra members information</h2>
          <div class="team-grid">

            <!-- Member 1 -->
            <div class="member-card">
              <img src="images/daehyeon.png" alt="Photo of Member 1">
              <h3>Daehyeon Kim</h3>
              <p><strong>Nationality:</strong> South Korean</p>
              <p><strong>Languages:</strong> Korean, English</p>
              <p><strong>Skills(Programming Languages):</strong> HTML, CSS, Java, AWS, C++, PHP, MySQL</p>
              <p><strong>Hometown:</strong> Seoul</p>
              <p><strong>Major:</strong> Software Development</p>
            </div>

            <!-- Member 2 -->
            <div class="member-card">
              <img src="images/elana.png" alt="Photo of Member 2">
              <h3>Elana Nguyen</h3>
              <p><strong>Nationality:</strong>Australian</p>
              <p><strong>Languages:</strong> English, Vietnamese</p>
              <p><strong>Skills(Programming Languages):</strong> Ruby, HTML, CSS, PHP, MySQL</p>
              <p><strong>Hometown:</strong> Melbourne</p>
              <p><strong>Major:</strong> Software Development</p>
            </div>

            <!-- Member 3 -->
            <div class="member-card">
              <img src="images/haider.png" alt="Photo of Member 3">
              <h3>Haider Sakhi</h3>
              <p><strong>Nationality:</strong> Australian, Pakistani</p>
              <p><strong>Languages:</strong> English, Farsi</p>
              <p><strong>Skills(Programming Languages):</strong> Ruby, HTML, CSS, PHP, MySQL</p>
              <p><strong>Hometown:</strong> Quetta</p>
              <p><strong>Major:</strong> Software Development</p>
            </div>

            <!-- Member 4 -->
            <div class="member-card">
              <img src="images/andrew.png" alt="Photo of Member 4">
              <h3>Andrew Williams</h3>
              <p><strong>Nationality:</strong> Australian</p>
              <p><strong>Languages:</strong> English</p>
              <p><strong>Skills(Programming Languages):</strong> Ruby, HTML, CSS, PHP, MySQL</p>
              <p><strong>Hometown:</strong> Melbourne</p>
              <p><strong>Major:</strong> Computer Science and Game Design with an unselected major (but maye software dev?)</p>
            </div>
          </div>
        </section>
      </article>
    </main>

    <!-- Footer -->
    <?php include "footer.inc"; ?>

