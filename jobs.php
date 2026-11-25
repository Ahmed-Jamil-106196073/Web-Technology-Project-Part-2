<?php
$search = $_GET['search'] ?? '';

if (!is_string($search)) {
    $search = '';
}

$search = trim(substr($search, 0, 100));

function escapeHtml($value): string
{
    return htmlspecialchars((string) ($value ?? ''), ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

function jobListItems($value): array
{
    if ($value === null || trim((string) $value) === '') {
        return [];
    }

    $raw = trim((string) $value);
    $decoded = json_decode($raw, true);

    if (json_last_error() === JSON_ERROR_NONE && is_array($decoded)) {
        return array_values(array_filter(array_map('strval', $decoded), 'strlen'));
    }

    $parts = preg_split('/\r\n|\r|\n|\s*\|\s*|\s*;\s*/u', $raw);

    return array_values(array_filter(array_map(static function ($item) {
        return trim(preg_replace('/^\s*(?:[-*•]|\d+[.)])\s*/u', '', $item));
    }, $parts), 'strlen'));
}

function identifyColumn(array $columns, array $candidates): ?string
{
    $lookup = array_change_key_case(array_combine($columns, $columns), CASE_LOWER);

    foreach ($candidates as $candidate) {
        if (isset($lookup[strtolower($candidate)])) {
            return $lookup[strtolower($candidate)];
        }
    }

    return null;
}

$jobs = [];
$databaseUnavailable = false;
$errorMessage = '';

try {
    if (!is_file(__DIR__ . '/settings.php')) {
        throw new RuntimeException('Missing settings.php');
    }

    require_once __DIR__ . '/settings.php';

    $db = null;

    foreach (['conn', 'connection', 'mysqli', 'db', 'db_connection'] as $variableName) {
        if (isset($$variableName) && $$variableName instanceof mysqli) {
            $db = $$variableName;
            break;
        }
    }

    if (!$db) {
        $hostName = $host ?? $servername ?? $db_host ?? (defined('DB_HOST') ? DB_HOST : null);
        $userName = $user ?? $username ?? $db_user ?? (defined('DB_USER') ? DB_USER : null);
        $passwordValue = $password ?? $pass ?? $db_pass ?? $pwd ?? (defined('DB_PASS') ? DB_PASS : '');
        $databaseName = $database ?? $dbname ?? $db_name ?? $sql_db ?? (defined('DB_NAME') ? DB_NAME : null);

        if ($hostName === null || $userName === null || $databaseName === null) {
            throw new RuntimeException('Unrecognized settings.php connection values');
        }

        $db = new mysqli($hostName, $userName, (string) $passwordValue, $databaseName);
    }

    if ($db->connect_errno) {
        throw new RuntimeException('Database connection failed');
    }

    $db->set_charset('utf8mb4');

    $result = $db->query('SHOW COLUMNS FROM `jobs`');
    $columns = [];

    while ($field = $result->fetch_assoc()) {
        $columns[] = $field['Field'];
    }

    $result->free();

    $mapping = [
        'reference' => ['job_reference', 'job_ref', 'reference', 'ref_number', 'jobref', 'job_ref_number'],
        'title' => ['job_title', 'title', 'position', 'position_title'],
        'description' => ['job_description', 'description', 'summary'],
        'salary' => ['salary', 'salary_range'],
        'reports_to' => ['reports_to', 'reporting_to', 'reports_to_position'],
        'responsibilities' => ['responsibilities', 'key_responsibilities', 'job_responsibilities'],
        'essential_requirements' => ['essential_requirements', 'essential', 'requirements', 'required_qualifications'],
        'preferable_requirements' => ['preferable_requirements', 'preferred_requirements', 'desirable_requirements', 'preferred_qualifications']
    ];

    $selected = [];

    foreach ($mapping as $alias => $candidates) {
        $column = identifyColumn($columns, $candidates);

        if ($column === null) {
            throw new RuntimeException('Missing jobs column for ' . $alias);
        }

        $selected[$alias] = '`' . str_replace('`', '``', $column) . '`';
    }

    $selectList = [];

    foreach ($selected as $alias => $column) {
        $selectList[] = $column . ' AS `' . $alias . '`';
    }

    $query = 'SELECT ' . implode(', ', $selectList) . ' FROM `jobs`';
    $params = [];

    if ($search !== '') {
        $searchColumns = [
            $selected['title'],
            $selected['reference']
        ];

        $terms = array_map(static function ($column) {
            return 'CAST(' . $column . ' AS CHAR) LIKE ?';
        }, $searchColumns);

        $query .= ' WHERE ' . implode(' OR ', $terms);
        $params = array_fill(0, count($terms), '%' . $search . '%');
    }

    $query .= ' ORDER BY ' . $selected['reference'] . ' ASC';

    $statement = $db->prepare($query);

    if ($params) {
        $statement->bind_param(str_repeat('s', count($params)), ...$params);
    }

    $statement->execute();
    $result = $statement->get_result();
    $jobs = $result->fetch_all(MYSQLI_ASSOC);
    $statement->close();

} catch (Throwable $exception) {
    error_log('Jobs page database error: ' . $exception->getMessage());

    $databaseUnavailable = true;
    $errorMessage = 'Job listings are temporarily unavailable. Please try again later.';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="Explore job opportunities at Creative Digital Media Agency.">
    <meta name="keywords" content="Creative Digital Media Agency, Jobs, Web Developer, Digital Designer">
    <meta name="author" content="Abdulrahman Shehada">

    <title>Job List | Creative Digital Media Agency</title>

    <link rel="stylesheet" href="style.css">

    <style>
        .jobs-intro {
            max-width: 700px;
            margin: 0 auto 50px;
        }
    </style>
</head>

<body>

<?php include 'includes/header.inc'; ?>

<main>

    <section class="hero jobs-hero">

        <p class="eyebrow">WE'RE HIRING</p>

        <h1>
            Find your place<br>
            in our creative team.
        </h1>

        <p class="hero-text">
            Design, develop and create digital experiences
            with Creative Digital Media Agency.
        </p>

        <a href="#open-positions" class="button">
            View Open Positions &darr;
        </a>

    </section>

    <section class="section jobs-section" id="open-positions">

        <div class="jobs-heading">

            <p class="eyebrow">CURRENT OPENINGS</p>

            <h2>Build your future with us</h2>

            <p class="jobs-intro">
                We are looking for creative people who enjoy
                working with technology, design and digital media.
                Explore our current opportunities below.
            </p>

        </div>

        <form action="jobs.php#open-positions" method="get"
              class="search-form jobs-search-form" role="search">

            <label for="job-search">
                Search Available Jobs
            </label>

            <div class="search-controls">

                <input
                    type="search"
                    id="job-search"
                    name="search"
                    maxlength="100"
                    placeholder="Search by job title or reference"
                    value="<?= escapeHtml($search) ?>"
                >

                <button type="submit" class="button">
                    Search
                </button>

                <a href="jobs.php#open-positions" class="search-clear">
                    Clear
                </a>

            </div>

        </form>

        <aside class="jobs-aside">

            <p class="aside-label">
                WHY WORK WITH US?
            </p>

            <h2>More than just a job.</h2>

            <p>
                Join a team where creative ideas and technology
                come together to produce work for real clients.
            </p>

            <ul>
                <li>Creative projects</li>
                <li>Friendly team environment</li>
                <li>Professional development</li>
                <li>Inclusive workplace</li>
            </ul>

            <h3>Inclusive Employment</h3>

            <p>
                We welcome people from different backgrounds
                and encourage applications from Aboriginal
                and Torres Strait Islander peoples.
            </p>

        </aside>

        <div class="job-list">

            <?php if ($databaseUnavailable): ?>

                <p class="no-jobs-message" role="alert">
                    <?= escapeHtml($errorMessage) ?>
                </p>

            <?php elseif (count($jobs) === 0): ?>

                <p class="no-jobs-message" role="status">
                    No jobs found matching your search.
                    Please try another keyword.
                </p>

            <?php else: ?>

                <?php foreach ($jobs as $index => $job): ?>

                    <section class="job-card">

                        <div class="job-top">

                            <p class="job-number">
                                <?= escapeHtml(str_pad((string) ($index + 1), 2, '0', STR_PAD_LEFT)) ?>
                            </p>

                            <p class="job-reference">
                                <?= escapeHtml($job['reference']) ?>
                            </p>

                        </div>

                        <h2>
                            <?= escapeHtml($job['title']) ?>
                        </h2>

                        <p class="job-description">
                            <?= escapeHtml($job['description']) ?>
                        </p>

                        <div class="job-details">

                            <div>
                                <p class="detail-label">SALARY</p>
                                <p><?= escapeHtml($job['salary']) ?></p>
                            </div>

                            <div>
                                <p class="detail-label">REPORTS TO</p>
                                <p><?= escapeHtml($job['reports_to']) ?></p>
                            </div>

                        </div>

                        <h3>Key Responsibilities</h3>

                        <ol>
                            <?php foreach (jobListItems($job['responsibilities']) as $item): ?>
                                <li><?= escapeHtml($item) ?></li>
                            <?php endforeach; ?>
                        </ol>

                        <h3>Essential Requirements</h3>

                        <ul>
                            <?php foreach (jobListItems($job['essential_requirements']) as $item): ?>
                                <li><?= escapeHtml($item) ?></li>
                            <?php endforeach; ?>
                        </ul>

                        <h3>Preferable Requirements</h3>

                        <ul>
                            <?php foreach (jobListItems($job['preferable_requirements']) as $item): ?>
                                <li><?= escapeHtml($item) ?></li>
                            <?php endforeach; ?>
                        </ul>

                        <a
                            href="apply.php?job_reference=<?= rawurlencode((string) $job['reference']) ?>"
                            class="button"
                            style="margin-top: 10px;"
                        >
                            Apply for this role &rarr;
                        </a>

                    </section>

                <?php endforeach; ?>

            <?php endif; ?>

        </div>

    </section>

</main>

<?php include 'includes/footer.inc'; ?>

</body>
</html>