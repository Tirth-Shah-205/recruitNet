<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Applications • TalentForge Admin</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" href="css/candidates.css">
</head>
<body>
    <?php include 'sidebar.php'; ?>

    <div class="admin-content">
        
        <!-- Page Header -->
        <div class="page-header">
            <div>
                <h2 class="mb-1 fw-bold text-primary-blue">Applications Management</h2>
                <p class="text-muted mb-0">Track and manage candidate job applications</p>
            </div>
            
            <div class="d-flex align-items-center gap-3">
                <input type="text" id="applicationSearch" class="search-box" placeholder="Search by candidate, job or company...">
                
                <button class="btn btn-outline-primary action-btn px-4">
                    <i class="fas fa-filter me-2"></i> Filter
                </button>
            </div>
        </div>

        <!-- Quick Stats -->
        <div class="top-stats">
            <div class="mini-stat">
                <h4 class="mb-0 fw-bold">3,842</h4>
                <small class="text-muted">Total Applications</small>
            </div>
            <div class="mini-stat">
                <h4 class="mb-0 fw-bold text-warning">145</h4>
                <small class="text-muted">Pending Review</small>
            </div>
            <div class="mini-stat">
                <h4 class="mb-0 fw-bold text-success">28</h4>
                <small class="text-muted">Hired This Month</small>
            </div>
        </div>

        <!-- Main Table -->
        <div class="admin-table">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th width="30%">Candidate Name</th>
                        <th width="30%">Applied Job</th>
                        <th width="20%">Company</th>
                        <th width="10%">Status</th>
                        <th width="10%">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="application-row">
                        <td>
                            <div class="d-flex align-items-center gap-3">
                                <div class="rounded-circle bg-warning text-white d-flex align-items-center justify-content-center" style="width:45px;height:45px;font-weight:700;">JD</div>
                                <div>
                                    <strong>John Doe</strong><br>
                                    <small class="text-muted">Applied 2 hrs ago</small>
                                </div>
                            </div>
                        </td>
                        <td>
                            <strong>PHP Developer</strong><br>
                            <small class="text-muted">Full Time</small>
                        </td>
                        <td>
                            <div>ABC Ltd</div>
                        </td>
                        <td><span class="badge bg-warning px-3 py-2 status-badge status-pending text-dark">Pending</span></td>
                        <td>
                            <div class="d-flex gap-2">
                                <button class="btn btn-sm btn-outline-primary action-btn" title="Review">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-success action-btn" title="Accept">
                                    <i class="fas fa-check"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    
                    <tr class="application-row">
                        <td>
                            <div class="d-flex align-items-center gap-3">
                                <div class="rounded-circle bg-info text-white d-flex align-items-center justify-content-center" style="width:45px;height:45px;font-weight:700;">AS</div>
                                <div>
                                    <strong>Alice Smith</strong><br>
                                    <small class="text-muted">Applied 1 day ago</small>
                                </div>
                            </div>
                        </td>
                        <td>
                            <strong>UI/UX Designer</strong><br>
                            <small class="text-muted">Contract</small>
                        </td>
                        <td>
                            <div>TechCorp Inc.</div>
                        </td>
                        <td><span class="badge bg-success px-3 py-2 status-badge status-verified text-white">Accepted</span></td>
                        <td>
                            <div class="d-flex gap-2">
                                <button class="btn btn-sm btn-outline-primary action-btn" title="Review">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-success action-btn" title="Accept" disabled>
                                    <i class="fas fa-check"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        
        <!-- Pagination -->
        <div class="d-flex justify-content-center align-items-center mt-5 mb-3">
            <nav>
                <ul class="pagination mb-0">
                    <li class="page-item disabled"><a class="page-link" href="#" aria-label="Previous"><i class="fas fa-chevron-left me-1"></i> Prev</a></li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item disabled"><a class="page-link" href="#">...</a></li>
                    <li class="page-item"><a class="page-link" href="#">12</a></li>
                    <li class="page-item"><a class="page-link" href="#" aria-label="Next">Next <i class="fas fa-chevron-right ms-1"></i></a></li>
                </ul>
            </nav>
        </div>
    </div>

    <script src="js/applications.js"></script>
</body>
</html>