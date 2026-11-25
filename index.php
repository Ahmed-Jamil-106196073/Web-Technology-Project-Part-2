<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="Creative Digital Media Agency recruitment website">
    <meta name="keywords" content="Creative Digital, Web Design, Careers, Digital Media">
    <meta name="author" content="Creative Digital Media Agency">

    <title>Creative Digital Media Agency | Home</title>

    <!-- External CSS -->
    <link rel="stylesheet" href="style.css">

    <!-- Embedded CSS -->
    <style>
        .home-section-intro {
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
        <section id="home" class="hero home-hero">

            <p class="eyebrow">WELCOME TO OUR CREATIVE AGENCY</p>

            <h1>Creativity starts here.</h1>

            <p class="hero-text">
                We are Creative Digital Media Agency,
                specialising in web design, branding,
                and digital content creation.
            </p>

            <p class="hero-text">
                Our mission is to help businesses create
                professional and engaging digital experiences.
            </p>

            <a href="jobs.php" class="button">
                Explore Careers &rarr;
            </a>

        </section>


        <!-- ABOUT SECTION -->
        <section id="about" class="section home-about">

            <div class="section-heading">

                <p class="eyebrow">GET TO KNOW US</p>

                <h2>Who We Are</h2>

            </div>

            <div class="home-content">

                <p class="home-description">
                    Creative Digital Media Agency is a company
                    focused on building modern websites,
                    developing strong brands, and producing
                    engaging digital content.
                </p>

                <p class="home-description">
                    Our team combines creativity and technology
                    to deliver innovative solutions for clients.
                    We believe collaboration, communication,
                    and continuous learning are essential
                    to successful digital projects.
                </p>

                <a href="about.php" class="button">
                    Learn More About Us
                </a>

            </div>

        </section>


        <!-- SERVICES SECTION -->
        <section id="services" class="section home-services">

            <div class="section-heading">

                <p class="eyebrow">WHAT WE DO</p>

                <h2>Our Services</h2>

            </div>

            <p class="home-section-intro">
                We provide creative and technical services
                that help businesses improve their digital presence.
            </p>

            <div class="services-grid">

                <!-- SERVICE 1 -->
                <article class="service-card">

                    <h3>Website Design &amp; Development</h3>

                    <p>
                        We create modern, responsive,
                        and user-friendly websites
                        designed to meet client needs.
                    </p>

                </article>


                <!-- SERVICE 2 -->
                <article class="service-card">

                    <h3>Branding &amp; Graphic Design</h3>

                    <p>
                        We help businesses develop
                        professional brand identities
                        through creative visual design.
                    </p>

                </article>


                <!-- SERVICE 3 -->
                <article class="service-card">

                    <h3>Digital Content Creation</h3>

                    <p>
                        We produce engaging digital
                        content that helps organisations
                        communicate with their audiences.
                    </p>

                </article>


                <!-- SERVICE 4 -->
                <article class="service-card">

                    <h3>User Experience (UX) Design</h3>

                    <p>
                        We design accessible and
                        easy-to-use digital experiences
                        that focus on user needs.
                    </p>

                </article>

            </div>

        </section>


        <!-- CAREERS SECTION -->
        <section id="careers" class="section home-careers">

            <div class="section-heading">

                <p class="eyebrow">JOIN OUR CREATIVE TEAM</p>

                <h2>Build Your Future With Us</h2>

            </div>

            <div class="home-content">

                <p class="home-description">
                    Are you passionate about creativity,
                    technology, and digital innovation?
                </p>

                <p class="home-description">
                    Creative Digital Media Agency is looking
                    for motivated individuals who want to
                    contribute to exciting digital projects.
                </p>

                <p class="home-description">
                    We offer career opportunities for
                    front-end developers, web designers,
                    and other creative professionals.
                </p>

                <a href="jobs.php" class="button">
                    View Available Jobs &rarr;
                </a>

                <a href="apply.php" class="button home-secondary-button">
                    Apply Now
                </a>

            </div>

        </section>


        <!-- SEARCH SECTION -->
        <section class="section search-section">

            <div class="section-heading">

                <p class="eyebrow">FIND YOUR OPPORTUNITY</p>

                <h2>Search Careers</h2>

            </div>

            <p>
                Looking for your next creative opportunity?
                Explore the available positions at our agency.
            </p>

            <form action="jobs.php" method="get" class="search-form" role="search">

                <label for="job-search">
                    Search for a job
                </label>

                <div class="search-controls">

                    <input
                        type="search"
                        id="job-search"
                        name="search"
                        placeholder="e.g. Web Developer"
                        required>

                    <!-- Inline CSS -->
                    <button
                        type="submit"
                        class="button"
                        style="cursor: pointer;">
                        Search Jobs
                    </button>

                </div>

            </form>

        </section>


        <!-- COMPANY INFORMATION TABLE -->
        <section class="section company-table-section">

            <div class="section-heading">

                <p class="eyebrow">OUR EXPERTISE</p>

                <h2>What Makes Us Different</h2>

            </div>

            <div class="table-container">

                <table class="company-table">

                    <caption>
                        Creative Digital Media Agency Services
                    </caption>

                    <thead>
                        <tr>
                            <th scope="col">Service</th>
                            <th scope="col">Description</th>
                            <th scope="col">Focus</th>
                        </tr>
                    </thead>

                    <tbody>

                        <tr>
                            <td>Web Development</td>
                            <td>Responsive and accessible websites</td>
                            <td>Technology</td>
                        </tr>

                        <tr>
                            <td>Graphic Design</td>
                            <td>Creative branding and visual identity</td>
                            <td>Creativity</td>
                        </tr>

                        <tr>
                            <td>Digital Marketing</td>
                            <td>Engaging online campaigns</td>
                            <td>Communication</td>
                        </tr>

                        <tr>
                            <td colspan="3" class="table-highlight">
                                Combining creativity and technology
                                to deliver meaningful digital experiences.
                            </td>
                        </tr>

                    </tbody>

                </table>

            </div>

        </section>


        <!-- ACKNOWLEDGEMENT OF COUNTRY -->
        <section class="section acknowledgement-section">

            <div class="section-heading">

                <p class="eyebrow">RESPECT AND INCLUSION</p>

                <h2>Acknowledgement of Country</h2>

            </div>

            <p>
                Creative Digital Media Agency acknowledges
                the Traditional Custodians of the lands
                throughout Australia and pays respect to
                Aboriginal and Torres Strait Islander Elders
                past and present.
            </p>

            <p>
                We recognise the importance of diversity,
                inclusion, and respectful representation
                in digital media and creative industries.
                We welcome applications from Aboriginal
                and Torres Strait Islander peoples.
            </p>

        </section>


        <!-- PROJECT LINKS SECTION -->
        <section id="project-links" class="section project-links">

            <div class="section-heading">

                <p class="eyebrow">OUR PROJECT</p>

                <h2>Explore Our Website</h2>

            </div>

            <p class="home-section-intro">
                Explore our project resources and view
                the source code of our recruitment website.
            </p>

            <div class="project-links-container">

                <!-- GITHUB REPOSITORY -->
                <article class="project-link-card">

                    <h3>GitHub Repository</h3>

                    <p>
                        View the source code for our
                        Creative Digital Media Agency website.
                    </p>

                    <a
                        href="https://github.com/Ahmed-Jamil-106196073/Web-Technology-Project-Part-1v2"
                        class="button"
                        target="_blank"
                        rel="noopener noreferrer">
                        View GitHub Repository
                    </a>

                </article>


                <!-- JIRA PROJECT -->
                <article class="project-link-card">

                    <h3>Jira Project</h3>

                    <p>
                        Explore our Creative Digital Media Agency
                        project management board, where our team
                        organises tasks, tracks progress, and
                        collaborates on website development.
                    </p>

                    <a
                        href="https://taimataallah.atlassian.net/jira/software/projects/CDMA/summary"
                        class="button"
                        target="_blank"
                        rel="noopener noreferrer">
                        View Jira Project
                    </a>

                </article>

            </div>

        </section>

    </main>


    <!-- FOOTER -->

    <?php include 'includes/footer.inc'; ?>

</body>
</html>