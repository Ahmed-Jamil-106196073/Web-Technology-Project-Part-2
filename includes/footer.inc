<?php
$currentPage = basename($_SERVER['PHP_SELF']);
?>
    <!-- HEADER -->
    <header class="site-header">

        <a href="index.php" class="brand">
            <img
                src="Images/logo.png"
                alt="Creative Digital Media Agency Logo"
                class="site-logo">
        </a>

        <nav aria-label="Main navigation">
            <ul>
                <li><a href="index.php"<?php if ($currentPage === 'index.php') echo ' aria-current="page"'; ?>>Home</a></li>
                <li><a href="jobs.php"<?php if ($currentPage === 'jobs.php') echo ' aria-current="page"'; ?>>Job List</a></li>
                <li><a href="apply.php"<?php if ($currentPage === 'apply.php') echo ' aria-current="page"'; ?>>Apply</a></li>
                <li><a href="about.php"<?php if ($currentPage === 'about.php') echo ' aria-current="page"'; ?>>About</a></li>
            </ul>
        </nav>

    </header>