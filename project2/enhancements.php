<!-- Filename: enhancements.php
Name: Enhancements page
Description: Ehancements to project2
Author: Daehyeon Kim
Contributors: Daehyeon Kim
Version: 1.0
Date created: 21/05/2025
Last modified: 21/05/2025
-->

<?php
    $meta_description="Enhancements to project2. Explore our enhancements and apply today!";
    $page_title = "Enhancements - DEHA GAMES";
    $meta_author = "Daehyeon Kim";
?>
<?php include "header.inc"; ?>
<?php include "nav.inc"; ?>
        <!-- Main -->
        <main id="enhancements_main">
            <h1>Enhancements at DEHA GAMES</h1>
            <!-- Article -->
            <div class="article_aside">
                <article id="enhancements_article">
                        <h2>Enhancement lists</h2>
                    <section>
                        <h3>Options</h3>
                        <!-- First option -->
                        <section>
                            <h3>Option 1:</h3>
                            <p><br>Description:</p>
                            <p>To enhance the user experience and allow easier data review, 
                                we implemented a feature that enables the manager to choose which field 
                                to use for sorting the order of displayed EOI (Expression of Interest) records.</p>
                            <p><br>Implementation Summary:</p>
                            <p>1. Added a sort field dropdown<br>
                            A dropdown menu was added to the "View All EOIs" and "Search EOIs by Job Reference" sections. 
                            It allows the manager to choose a field to sort by (e.g., EOI number, first name, email, or status).</p>
                            <p>2. Captured selected sort valuen<br>
                            When the form is submitted, the selected sort field is retrieved from the form using the POST method. 
                            If no value is selected, EOI number is used as the default.
                            </P>
                            <p>3. Modified SQL queries to apply sortingn<br>
                            The selected field is inserted into the SQL query using the ORDER BY clause. 
                            This returns the EOI records in the desired order.
                            </p>
                            <p>4. Displayed the sorted results in a tablen<br>
                            The sorted EOI data is displayed in an HTML table, helping the manager easily view 
                            and assess applications based on their chosen sort order.
                            </p>             
                            
                            <a class="detail_box" href="manage.php">Go to Manage page</a>
                        </section>
                    
                        <!-- Second option -->
                        <section>
                            <h3>Option 2: Manager Registration with Validation</h3>
                            <p><br>Description:</p>
                            <p>&nbsp;To manage sensitive application data, we implemented a manager registration system with secure, validated inputs.</p>
                            <p><br>Implementation Summary:</p>
                            <p>1. Created signup_manager.php for manager registration.</p>
                            <p>2. Used server-side validation to ensure: <br>
                                &nbsp;&nbsp;&nbsp;&nbsp;- Username is unique using SQL query checks. <br>
                                &nbsp;&nbsp;&nbsp;&nbsp;- Password meets length/security rules before hashing.
                            </p>
                            <p>3. Successfully registered data is stored in the managers table.</p>
                            <a class="detail_box" href="signup_manager.php">Go to Signup page</a>
                        </section>

                        <!-- Third option -->
                        <section>
                            <h3>Option 3: Access Control for manage.php</h3>
                            <p><br>Description:</p>
                            <p>&nbsp;To protect confidential applicant data, access to manage.php is restricted to authenticated managers only.</p>
                            <p><br>Implementation Summary:</p>
                            <p>1. Created login_manager.php for login handling.</p>
                            <p>2. Only registered usernames with correct passwords (hashed) can log in.<br>
                            <p>3. Used PHP sessions ($_SESSION['username']) to manage login state.</p>
                            <p>4. Added access check at the start of manage.php:</p>
                            <a class="detail_box" href="login_manager.php">Go to login page</a>
                        </section>

                        <!-- Fourth option -->
                        <section>
                            <h3>Option 4: Login Attempt Lockout</h3>
                            <p><br>Description:</p>
                            <p>&nbsp;To improve security, the system disables login temporarily after multiple failed login attempts.</p>
                            <p><br>Implementation Summary:</p>
                            <p>1. In login_manager.php, we:</p>
                            <p>&nbsp;&nbsp;&nbsp;&nbsp;- Track login attempts using "$_SESSION['login_attempts']".<br>
                                &nbsp;&nbsp;&nbsp;&nbsp;- Lock out users for a set duration using "$_SESSION['locked_until']".<br>
                                &nbsp;&nbsp;&nbsp;&nbsp;- Display a message like: "❌ Too many failed attempts. Please try again in X seconds."
                            </p>
                            <p>2. Checking the current time using time(), and if it is earlier than the locked_until value stored in the session,
                            it temporarily blocks the user's access to enhance security.</p>
                            <a class="detail_box" href="login_manager.php">Go to login page</a>
                        </section>
                    </section>
                </article>
            </div>
        </main>

<?php include "footer.inc"; ?>