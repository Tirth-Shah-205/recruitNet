<?php
require_once "header.php";
require "connection.php";

// ================= FILTER LOGIC =================
$where = "WHERE status = 'open'";
$params = [];

if (!empty($_GET['search'])) {
    $where .= " AND (title LIKE :search OR company LIKE :search OR skills LIKE :search)";
    $params[':search'] = "%" . $_GET['search'] . "%";
}

if (!empty($_GET['location'])) {
    $where .= " AND location = :location";
    $params[':location'] = $_GET['location'];
}

if (!empty($_GET['job_type'])) {
    $where .= " AND job_type = :job_type";
    $params[':job_type'] = $_GET['job_type'];
}

if (!empty($_GET['experience'])) {
    $where .= " AND experience = :experience";
    $params[':experience'] = $_GET['experience'];
}

$sql = "SELECT * FROM jobs $where ORDER BY created_at DESC";
$stmt = $conn->prepare($sql);
$stmt->execute($params);
$jobs = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<style>
/* ===== MODERN SEARCH BAR ===== */
.search-wrapper {
    background: #fff;
    border-radius: 50px;
    padding: 10px;
    box-shadow: 0 10px 25px rgba(0,0,0,0.05);
}

.search-wrapper .form-control,
.search-wrapper .form-select {
    border: none;
    border-radius: 30px;
    padding: 12px 15px;
    font-size: 14px;
    box-shadow: none;
}

.search-wrapper .form-control:focus,
.search-wrapper .form-select:focus {
    outline: none;
    box-shadow: none;
}

.search-btn {
    border-radius: 30px;
    padding: 12px;
    font-weight: 600;
}
</style>

<!-- ========== FEATURED JOBS SECTION ========== -->
<section class="py-5 bg-light" style="padding: 140px 0 90px;">
    <div class="container" style="padding:140px 0 90px;">
        
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="section-tag">
                <i class="fas fa-bolt me-2"></i>Acquire Proficiency In Robust Development Job Skills
            </span>
            <h2 class="section-title">
                Together with useful notifications, collab insights, and improvement tip etc.
            </h2>
        </div>

        <!-- ===== MODERN SEARCH UI ===== -->
        <form method="GET" class="search-wrapper row g-2 align-items-center mb-5">

            <div class="col-lg-4 col-md-12">
                <input type="text" name="search" class="form-control"
                    placeholder="🔍 Search jobs, skills, companies..."
                    value="<?php echo $_GET['search'] ?? ''; ?>">
            </div>

            <div class="col-lg-2 col-md-4">
                <select name="location" class="form-select">
                    <option value="">📍 Location</option>
                    <option value="Mumbai" <?php if(($_GET['location'] ?? '')=='Mumbai') echo 'selected'; ?>>Mumbai</option>
                    <option value="Pune" <?php if(($_GET['location'] ?? '')=='Pune') echo 'selected'; ?>>Pune</option>
                    <option value="Bangalore" <?php if(($_GET['location'] ?? '')=='Bangalore') echo 'selected'; ?>>Bangalore</option>
                    <option value="Hyderabad" <?php if(($_GET['location'] ?? '')=='Hyderabad') echo 'selected'; ?>>Hyderabad</option>
                    <option value="Chennai" <?php if(($_GET['location'] ?? '')=='Chennai') echo 'selected'; ?>>Chennai</option>
                </select>
            </div>

            <div class="col-lg-2 col-md-4">
                <select name="job_type" class="form-select">
                    <option value="">💼 Job Type</option>
                    <option value="Full-time" <?php if(($_GET['job_type'] ?? '')=='Full-time') echo 'selected'; ?>>Full-time</option>
                    <option value="Part-time" <?php if(($_GET['job_type'] ?? '')=='Part-time') echo 'selected'; ?>>Part-time</option>
                </select>
            </div>

            <div class="col-lg-2 col-md-4">
                <select name="experience" class="form-select">
                    <option value="">🧠 Experience</option>
                    <option value="1-2 years" <?php if(($_GET['experience'] ?? '')=='1-2 years') echo 'selected'; ?>>1-2 years</option>
                    <option value="2-3 years" <?php if(($_GET['experience'] ?? '')=='2-3 years') echo 'selected'; ?>>2-3 years</option>
                    <option value="3-5 years" <?php if(($_GET['experience'] ?? '')=='3-5 years') echo 'selected'; ?>>3-5 years</option>
                </select>
            </div>

            <div class="col-lg-2 col-md-12 d-grid">
                <button type="submit" class="btn btn-primary search-btn">
                    Search
                </button>
            </div>

        </form>

        <!-- ================= JOB CARDS ================= -->
        <div class="row g-4">

        <?php if(count($jobs) > 0){ ?>

            <?php foreach($jobs as $row){ ?>

                <div class="col-lg-6" data-aos="fade-up">
                    <div class="job-card">

                        <h3 class="job-title"><?php echo htmlspecialchars($row['title']); ?></h3>

                        <div class="job-meta">
                            <span><i class="fas fa-building"></i> <?php echo htmlspecialchars($row['company']); ?></span>
                            <span><i class="fas fa-map-marker-alt"></i> <?php echo htmlspecialchars($row['location']); ?></span>
                            <span><i class="far fa-calendar-alt"></i>
                                <?php echo date("d M Y", strtotime($row['created_at'])); ?>
                            </span>
                        </div>

                        <div class="job-tags">
                            <span class="job-tag"><?php echo htmlspecialchars($row['job_type']); ?></span>
                            <span class="job-tag"><?php echo htmlspecialchars($row['experience']); ?></span>
                        </div>

                        <div class="job-salary">
                            ₹<?php echo htmlspecialchars($row['salary']); ?>/month
                        </div>

                        <p><strong>Skills:</strong> <?php echo htmlspecialchars($row['skills']); ?></p>

                        <a href="jobDetails.php?id=<?php echo $row['id']; ?>" class="btn-read-more">
                            Read More
                        </a>

                    </div>
                </div>

            <?php } ?>

        <?php } else { ?>
            <p class="text-center">No jobs found</p>
        <?php } ?>

        </div>

    </div>
</section>

</div>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="js/candidateHomePage.js"></script>

<?php require_once 'footer.php'; ?>