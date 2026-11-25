<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Apply for a job at Creative Digital Media Agency">
    <meta name="keywords" content="Job Application, Creative Digital Media Agency, Careers">
    <meta name="author" content="Creative Digital Media Agency">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Apply Now | Creative Digital Media Agency</title>

    <!-- External CSS -->
    <link rel="stylesheet" href="style.css">

    <!-- Embedded CSS -->
    <style>
        .application-intro {
            max-width: 750px;
            margin-bottom: 35px;
        }
    </style>
</head>

<body>

    <!-- HEADER -->

    <?php include 'includes/header.inc'; ?>


    <main>

        <!-- HERO SECTION -->
        <section class="hero">

            <p class="eyebrow">JOIN OUR CREATIVE TEAM</p>

            <h1>Your next chapter<br>starts here.</h1>

            <p class="hero-text">
                Ready to turn your creativity into a career?
                Join Creative Digital Media Agency and help us
                build meaningful digital experiences.
            </p>

            <a href="#application-form" class="button">
                Start Application &darr;
            </a>

        </section>


        <!-- APPLICATION SECTION -->
        <section class="section application-section" id="application-form">

            <div class="section-heading application-intro">

                <p class="eyebrow">YOUR FUTURE STARTS HERE</p>

                <h2>Job Application Form</h2>

                <p>
                    Complete the form below to apply for a position
                    at Creative Digital Media Agency.
                    All fields marked with * are required.
                </p>

            </div>


            <!-- APPLICATION FORM -->
            <form
                action="https://mercury.swin.edu.au/it000000/formtest.php"
                method="post"
                class="application-form">


                <!-- JOB INFORMATION -->
                <fieldset class="form-section">

                    <legend>01. Job Information</legend>

                    <div class="form-grid">

                        <div class="form-group">

                            <label for="jobref">
                                Job Reference Number *
                            </label>

                            <input
                                type="text"
                                id="jobref"
                                name="jobref"
                                pattern="[A-Za-z0-9]{5}"
                                minlength="5"
                                maxlength="5"
                                title="Enter exactly 5 letters or numbers"
                                placeholder="e.g. WD001"
                                required>

                        </div>

                    </div>

                </fieldset>


                <!-- PERSONAL DETAILS -->
                <fieldset class="form-section">

                    <legend>02. Personal Details</legend>

                    <div class="form-grid">

                        <div class="form-group">

                            <label for="firstname">
                                First Name *
                            </label>

                            <input
                                type="text"
                                id="firstname"
                                name="firstname"
                                pattern="[A-Za-z]{1,20}"
                                maxlength="20"
                                title="Letters only, maximum 20 characters"
                                placeholder="Enter your first name"
                                autocomplete="given-name"
                                required>

                        </div>


                        <div class="form-group">

                            <label for="lastname">
                                Last Name *
                            </label>

                            <input
                                type="text"
                                id="lastname"
                                name="lastname"
                                pattern="[A-Za-z]{1,20}"
                                maxlength="20"
                                title="Letters only, maximum 20 characters"
                                placeholder="Enter your last name"
                                autocomplete="family-name"
                                required>

                        </div>


                        <div class="form-group">

                            <label for="dob">
                                Date of Birth *
                            </label>

                            <input
                                type="text"
                                id="dob"
                                name="dob"
                                placeholder="dd/mm/yyyy"
                                pattern="(0[1-9]|[12][0-9]|3[01])/(0[1-9]|1[0-2])/[0-9]{4}"
                                title="Enter your date of birth as dd/mm/yyyy"
                                maxlength="10"
                                inputmode="numeric"
                                required>

                        </div>


                        <fieldset class="form-group gender-fieldset">

                            <legend>Gender *</legend>

                            <div class="radio-options">

                                <label>
                                    <input
                                        type="radio"
                                        name="gender"
                                        value="Male"
                                        required>
                                    Male
                                </label>

                                <label>
                                    <input
                                        type="radio"
                                        name="gender"
                                        value="Female">
                                    Female
                                </label>

                                <label>
                                    <input
                                        type="radio"
                                        name="gender"
                                        value="Other">
                                    Other
                                </label>

                            </div>

                        </fieldset>

                    </div>

                </fieldset>


                <!-- ADDRESS DETAILS -->
                <fieldset class="form-section">

                    <legend>03. Address Details</legend>

                    <div class="form-grid">

                        <div class="form-group full-width">

                            <label for="street">
                                Street Address *
                            </label>

                            <input
                                type="text"
                                id="street"
                                name="street"
                                maxlength="40"
                                placeholder="Enter your street address"
                                autocomplete="address-line1"
                                required>

                        </div>


                        <div class="form-group">

                            <label for="suburb">
                                Suburb / Town *
                            </label>

                            <input
                                type="text"
                                id="suburb"
                                name="suburb"
                                maxlength="40"
                                placeholder="Enter your suburb or town"
                                autocomplete="address-level2"
                                required>

                        </div>


                        <div class="form-group">

                            <label for="state">
                                State *
                            </label>

                            <select
                                id="state"
                                name="state"
                                autocomplete="address-level1"
                                required>

                                <option value="">Select your state</option>
                                <option value="VIC">VIC</option>
                                <option value="NSW">NSW</option>
                                <option value="QLD">QLD</option>
                                <option value="NT">NT</option>
                                <option value="WA">WA</option>
                                <option value="SA">SA</option>
                                <option value="TAS">TAS</option>
                                <option value="ACT">ACT</option>

                            </select>

                        </div>


                        <div class="form-group">

                            <label for="postcode">
                                Postcode *
                            </label>

                            <input
                                type="text"
                                id="postcode"
                                name="postcode"
                                pattern="[0-9]{4}"
                                minlength="4"
                                maxlength="4"
                                inputmode="numeric"
                                title="Enter exactly 4 digits"
                                placeholder="e.g. 3000"
                                autocomplete="postal-code"
                                required>

                        </div>

                    </div>

                </fieldset>


                <!-- CONTACT INFORMATION -->
                <fieldset class="form-section">

                    <legend>04. Contact Information</legend>

                    <div class="form-grid">

                        <div class="form-group">

                            <label for="email">
                                Email Address *
                            </label>

                            <input
                                type="email"
                                id="email"
                                name="email"
                                placeholder="example@email.com"
                                autocomplete="email"
                                required>

                        </div>


                        <div class="form-group">

                            <label for="phone">
                                Phone Number *
                            </label>

                            <input
                                type="tel"
                                id="phone"
                                name="phone"
                                pattern="[0-9]{8,12}"
                                minlength="8"
                                maxlength="12"
                                title="Enter 8 to 12 digits without spaces"
                                placeholder="e.g. 0412345678"
                                autocomplete="tel"
                                required>

                        </div>

                    </div>

                </fieldset>


                <!-- SKILLS AND EXPERIENCE -->
                <fieldset class="form-section">

                    <legend>05. Skills &amp; Experience</legend>

                    <p class="form-description">
                        Select the skills that match your experience.
                    </p>

                    <div class="checkbox-grid">

                        <label>
                            <input
                                type="checkbox"
                                name="skills[]"
                                value="HTML"
                                required>
                            HTML *
                        </label>

                        <label>
                            <input
                                type="checkbox"
                                name="skills[]"
                                value="CSS">
                            CSS
                        </label>

                        <label>
                            <input
                                type="checkbox"
                                name="skills[]"
                                value="JavaScript">
                            JavaScript
                        </label>

                        <label>
                            <input
                                type="checkbox"
                                name="skills[]"
                                value="UI/UX Design">
                            UI/UX Design
                        </label>

                        <label>
                            <input
                                type="checkbox"
                                name="skills[]"
                                value="Graphic Design">
                            Graphic Design
                        </label>

                        <label>
                            <input
                                type="checkbox"
                                name="skills[]"
                                value="Digital Marketing">
                            Digital Marketing
                        </label>

                    </div>


                    <div class="form-group other-skills">

                        <label for="otherskills">
                            Other Skills (Optional)
                        </label>

                        <textarea
                            id="otherskills"
                            name="otherskills"
                            rows="5"
                            placeholder="Tell us about any additional skills or experience..."></textarea>

                    </div>

                </fieldset>


                <!-- SUBMIT SECTION -->
                <div class="form-submit">

                    <p>
                        Please review your information before submitting.
                    </p>

                    <!-- Inline CSS -->
                    <button
                        type="submit"
                        class="button submit-button"
                        style="cursor: pointer;">
                        Submit Application &rarr;
                    </button>

                </div>

            </form>

        </section>

    </main>


    <!-- FOOTER -->

    <?php include 'includes/footer.inc'; ?>

</body>
</html>