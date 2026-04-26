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
                        <div class="fw-semibold">Ayushi Zala</div>
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
                            <h2 class="fw-bold mb-1 text-dark">1,847</h2>
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
                            <h2 class="fw-bold mb-1 text-dark">124</h2>
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
                            <h2 class="fw-bold mb-1 text-dark">672</h2>
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
                            <h2 class="fw-bold mb-1 text-dark">3,291</h2>
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
                        <tr>
                            <td><small>Just now</small></td>
                            <td>New Application</td>
                            <td>Senior Developer @ TechCorp</td>
                            <td><span class="badge bg-success">Shortlisted</span></td>
                        </tr>
                        <tr>
                            <td><small>27 min ago</small></td>
                            <td>Company Onboarded</td>
                            <td>Flipkart HR Team</td>
                            <td><span class="badge bg-primary">Approved</span></td>
                        </tr>
                        <!-- Add more rows as needed -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="js/dashboard.js"></script>
</body>
</html>