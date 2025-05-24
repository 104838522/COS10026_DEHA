<!-- Filename: apply.html
Name: Job Application Page
Description: Form used for applying for a job
Author: Andrew Williams
Contributors: Andrew Williams, Daehyeon Kim, Elana Nguyen
Version: 1.2
Date created: 08/04/2025
Last modified: 12/05/2025
-->
<?php
    $meta_description="Job Application Page for DEHA GAMES. Fill out the form to apply for a job.";
    $page_title = "Job Application - DEHA GAMES";
    $meta_author = "Andrew Williams"; 
?>
<?php include "header.inc"; ?>
<?php include "nav.inc"; ?>
        <!-- Main -->
         
        <main>
            <article id="apply_article">
                <h2>Career Opportunities at DEHA GAMES</h2>
                <h2>Job Application Form</h2>
                <h3>Please fill out the form below to apply for a job at DEHA GAMES.</h3>
                <p>Do not allow the user to submit the form if any required fields are blank or incorrectly filled.</p>
                <section>
                    <form action="https://mercury.swin.edu.au/it000000/formtest.php" method="post" novalidate="novalidate">
                        <h3>Application Details</h3>
                        <!-- Job Reference Number (dropdown) -->
                        <label for="job">Job Reference Number:</label>
                        <select id="job" name="job" required>
                            <!-- Blank field used to assure that an input is entered. -->
                            <option value="">-- Please select a job --</option>
                            <option value="SD035">SD035 - Software Developer</option>
                            <option value="CLE56">CLE56 - Cloud Engineer</option>
                            <option value="UIX37">UIX37 - UI/UX Designer</option>
                        </select>
                        
                        <!-- First name -->
                        <label for="firstName">First Name:</label>
                        <input type="text" id="firstName" name="firstName" pattern="[a-zA-Z]+"
                            title="First name must contain only letters, Max 20 characters" maxlength="20" required>
                        
                        <!-- Last name -->
                        <label for="lastName">Last Name:</label>
                        <input type="text" id="lastName" name="lastName" pattern="[a-zA-Z]+"
                            title="Last name must contain only letters, Max 20 characters" maxlength="20" required>
                        
                        <!-- Date of Birth -->
                        <label for="dateOfBirth">Date of Birth:</label>
                        <input type="date" id="dateOfBirth" name="dateOfBirth" required>
                        
                        <!-- Gender -->
                        <fieldset>
                            <legend>Gender:</legend>
                        
                            <label for="male">
                            <input type="radio" id="male" name="gender" value="male">Male</label>
                        
                            <label for="female">
                            <input type="radio" id="female" name="gender" value="female">Female</label>
                        
                            <label for="other">
                            <input type="radio" id="other" name="gender" value="other">Other</label>
                        
                            <label for="none">
                            <input type="radio" id="none" name="gender" value="none" required>Prefer not to say</label>
                            <br>
                            <!-- Other gender -->
                            <label for="otherGender">If other, specify:</label>
                            <input type="text" id="otherGender" name="otherGender"
                                pattern="[a-zA-Z]+" maxlength="20"
                                title="Must contain only letters, Max 20 characters">
                        </fieldset>
                        
                        
                        <!-- Street Address -->
                        <label for="streetAddress">Street Address:</label>
                        <input type="text" id="streetAddress" name="streetAddress"
                            title="Max 40 characters" maxlength="40" required>
                        
                        <!-- Suburb/Town -->
                        <label for="suburb">Suburb/Town:</label>
                        <input type="text" id="suburb" name="suburb"
                            title="Max 40 characters" maxlength="40" required>
                        
                        <!-- State -->
                        <label for="state">State/Territory:</label>
                        <select id="state" name="state" required>
                            <!-- Blank field used to assure that an input is entered. -->
                            <option value="">-- Please select a state --</option>
                            <option value="VIC">VIC - Victoria</option>
                            <option value="NSW">NSW - New South Wales</option>
                            <option value="QLD">QLD - Queensland</option>
                            <option value="NT">NT - Northern Territory</option>
                            <option value="WA">WA - Western Australia</option>
                            <option value="SA">SA - South Australia</option>
                            <option value="TAS">TAS - Tasmania</option>
                            <option value="ACT">ACT - Australian Capital Territory</option>
                        </select>
                        <!-- Postcode -->
                        <label for="postcode">Postcode:</label>
                        <input type="text" id="postcode" name="postcode" pattern="\d{4}" title="Exactly 4 digits" required>
                        
                        <!-- Email address -->
                        <label for="email">Email Address:</label>
                        <input type="email" id="email" name="email"
                            pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}"
                            title="Please enter a valid email address format" required>
                        
                        <!-- Phone number -->
                        <label for="phoneNumber">Phone Number:</label>
                        <input type="text" id="phoneNumber" name="phoneNumber"
                            pattern="^(?=(?:\D*\d){8,12}$)[\d ]+$"
                            title="Enter 8 to 12 digits (spaces allowed)"
                            required>
                        
                        <!-- Required technical list -->
                        <fieldset id="skills">
                            <legend>Required Technical Skills:</legend>

                            <label>
                            <input type="checkbox" name="skills[]" value="HTML" checked> HTML
                            </label>
                        
                            <label>
                            <input type="checkbox" name="skills[]" value="CSS"> CSS
                            </label>
                        
                            <label>
                            <input type="checkbox" name="skills[]" value="JavaScript"> JavaScript
                            </label>
                        
                            <label>
                            <input type="checkbox" name="skills[]" value="Python"> Python
                            </label>
                        
                            <label>
                            <input type="checkbox" name="skills[]" value="SQL"> SQL
                            </label>
                        </fieldset>
                        <!-- Other skills -->
                        <label for="otherSkills">Other Skills:</label>
                        <textarea id="otherSkills" name="otherSkills" rows="4" cols="40"
                                placeholder="Write any other technical skills here"></textarea>
                        
                        <!-- Submit -->
                        <input class="detail_box" type="submit" value="Apply">
                    </form>
                </section>
            </article>
        </main>

<?php include "footer.inc"; ?>
