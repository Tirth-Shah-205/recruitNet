<?php
include '../DBConnection.php'; // Adjust path as needed
// Get statistics
$candidates_count = $conn->query("SELECT COUNT(*) as count FROM candidates")->fetch_assoc()['count'];
$companies_count = $conn->query("SELECT COUNT(*) as count FROM companies")->fetch_assoc()['count'];
$jobs_count = $conn->query("SELECT COUNT(*) as count FROM jobs WHERE status='open'")->fetch_assoc()['count'];
$applications_count = $conn->query("SELECT COUNT(*) as count FROM applications")->fetch_assoc()['count'];

// Get applications trend (last 6 months)
$applications_trend = [];
for($i = 5; $i >= 0; $i--) {
    $date = date('Y-m', strtotime("-$i months"));
    $count = $conn->query("SELECT COUNT(*) as count FROM applications WHERE DATE_FORMAT(applied_at, '%Y-%m') = '$date'")->fetch_assoc()['count'];
    $applications_trend[] = $count;
}

// Get jobs by category
$jobs_by_category = $conn->query("SELECT job_type, COUNT(*) as count FROM jobs GROUP BY job_type");
$job_categories = [];
$job_counts = [];
while($row = $jobs_by_category->fetch_assoc()) {
    $job_categories[] = $row['job_type'];
    $job_counts[] = $row['count'];
}

// Get candidate growth (last 6 months)
$candidate_growth = [];
for($i = 5; $i >= 0; $i--) {
    $date = date('Y-m', strtotime("-$i months"));
    $count = $conn->query("SELECT COUNT(*) as count FROM candidates WHERE DATE_FORMAT(created_at, '%Y-%m') = '$date'")->fetch_assoc()['count'];
    $candidate_growth[] = $count;
}

// Get company growth (last 6 months)
$company_growth = [];
for($i = 5; $i >= 0; $i--) {
    $date = date('Y-m', strtotime("-$i months"));
    $count = $conn->query("SELECT COUNT(*) as count FROM companies WHERE DATE_FORMAT(created_at, '%Y-%m') = '$date'")->fetch_assoc()['count'];
    $company_growth[] = $count;
}

// Get recent activity
$recent_activity = $conn->query("
    SELECT 'application' as type, a.applied_at as date, CONCAT(cand.name, ' applied for ', j.title) as description, a.status
    FROM applications a 
    JOIN candidates cand ON a.candidate_id = cand.id 
    JOIN jobs j ON a.job_id = j.id 
    UNION ALL
    SELECT 'company' as type, comp.created_at as date, CONCAT('Company ', comp.company_name, ' joined') as description, 'approved' as status
    FROM companies comp
    ORDER BY date DESC LIMIT 10
");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TalentForge • Admin Dashboard</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Poppins:wght@500;600;700&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="css/admin.css">
    
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>
    <script>
        window.chartData = {
            applicationsTrend: <?php echo json_encode($applications_trend); ?>,
            jobCategories: <?php echo json_encode($job_categories); ?>,
            jobCounts: <?php echo json_encode($job_counts); ?>,
            candidateGrowth: <?php echo json_encode($candidate_growth); ?>,
            companyGrowth: <?php echo json_encode($company_growth); ?>
        };
    </script>
    
    <link rel="stylesheet" href="css/dashboard.css">
</head>
<body>
    <?php include 'sidebar.php'; ?>

    <div class="admin-content">
        
        <!-- Premium Topbar -->
        <div class="glass-topbar d-flex justify-content-between align-items-center p-4 rounded-4 mb-5">
            <div class="d-flex align-items-center gap-3">
                <h3 class="mb-0 fw-bold" style="color:#0f172a;">Dashboard</h3>
            </div>
            
            <div class="d-flex align-items-center gap-4">
                <div class="d-flex align-items-center gap-3">
                    <div class="admin-avatar fw-bold fs-4" style="background:linear-gradient(135deg,#f97316,#fb923c); width:52px;height:52px;border-radius:50%; display:flex;align-items:center;justify-content:center;color:white;">A</div>
                    <div>
                        <div class="fw-semibold">Admin User</div>
                        <small class="text-muted">Super Admin</small>
                    </div>
                </div>
            </div>
        </div>

        <!-- Stats -->
        <div class="row g-4 mb-5">
            <div class="col-lg-3 col-md-6">
                <div class="stat-card p-5 h-100">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h2 class="fw-bold mb-1 text-dark"><?php echo $candidates_count; ?></h2>
                            <p class="text-muted mb-0">Total Candidates</p>
                        </div>
                        <div class="stat-icon"><i class="fas fa-users"></i></div>
                    </div>
                    <div class="mt-4 text-success fw-medium">↑ 28% this month</div>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="stat-card p-5 h-100">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h2 class="fw-bold mb-1 text-dark"><?php echo $companies_count; ?></h2>
                            <p class="text-muted mb-0">Active Companies</p>
                        </div>
                        <div class="stat-icon"><i class="fas fa-building"></i></div>
                    </div>
                    <div class="mt-4 text-success fw-medium">↑ 12% this month</div>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="stat-card p-5 h-100">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h2 class="fw-bold mb-1 text-dark"><?php echo $jobs_count; ?></h2>
                            <p class="text-muted mb-0">Jobs Posted</p>
                        </div>
                        <div class="stat-icon"><i class="fas fa-briefcase"></i></div>
                    </div>
                    <div class="mt-4 text-danger fw-medium">↓ 4% this month</div>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="stat-card p-5 h-100">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h2 class="fw-bold mb-1 text-dark"><?php echo $applications_count; ?></h2>
                            <p class="text-muted mb-0">Applications</p>
                        </div>
                        <div class="stat-icon"><i class="fas fa-file-alt"></i></div>
                    </div>
                    <div class="mt-4 text-success fw-medium">↑ 47% this month</div>
                </div>
            </div>
        </div>

        <!-- Charts -->
        <div class="row g-4">
            <div class="col-lg-7">
                <div class="chart-container">
                    <h5 class="fw-semibold mb-4">Applications Trend • Last 6 Months</h5>
                    <canvas id="appChart" height="140"></canvas>
                </div>
            </div>
            
            <div class="col-lg-5">
                <div class="chart-container h-100">
                    <h5 class="fw-semibold mb-4">Jobs by Category</h5>
                    <canvas id="categoryChart" height="140"></canvas>
                </div>
            </div>
        </div>

        <div class="row g-4 mt-4">
            <div class="col-lg-6">
                <div class="chart-container">
                    <h5 class="fw-semibold mb-4">Candidate Growth</h5>
                    <canvas id="candidateChart" height="140"></canvas>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="chart-container">
                    <h5 class="fw-semibold mb-4">Companies Joined</h5>
                    <canvas id="companyChart" height="140"></canvas>
                </div>
            </div>
        </div>

        <!-- Recent Activity -->
        <div class="chart-container mt-5">
            <h5 class="fw-semibold mb-4">Recent Activity</h5>
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead>
                        <tr>
                            <th>Time</th>
                            <th>Activity</th>
                            <th>Details</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($activity = $recent_activity->fetch_assoc()): ?>
                        <tr>
                            <td><small><?php echo date('M j, H:i', strtotime($activity['date'])); ?></small></td>
                            <td><?php echo ucfirst($activity['type']); ?></td>
                            <td><?php echo htmlspecialchars($activity['description']); ?></td>
                            <td>
                                <span class="badge <?php 
                                    echo $activity['status'] == 'approved' ? 'bg-primary' : 
                                        ($activity['status'] == 'shortlisted' ? 'bg-warning' : 'bg-secondary'); 
                                    ?>">
                                    <?php echo ucfirst($activity['status']); ?>
                                </span>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="js/dashboard.js"></script>
</body>
</html>