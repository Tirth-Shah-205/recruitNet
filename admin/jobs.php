<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jobs • TalentForge Admin</title>
    
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
                <h2 class="mb-1 fw-bold text-primary-blue">Jobs Management</h2>
                <p class="text-muted mb-0">Manage all job postings across the platform</p>
            </div>
            
            <div class="d-flex align-items-center gap-3">
                <input type="text" id="jobSearch" class="search-box" placeholder="Search by title, company or location...">
                <button class="btn btn-outline-primary action-btn px-4">
                    <i class="fas fa-plus me-2"></i> Post Job
                </button>
            </div>
        </div>

        <!-- Quick Stats -->
        <div class="top-stats">
            <div class="mini-stat">
                <h4 class="mb-0 fw-bold">672</h4>
                <small class="text-muted">Total Jobs</small>
            </div>
            <div class="mini-stat">
                <h4 class="mb-0 fw-bold text-success">412</h4>
                <small class="text-muted">Actively Hiring</small>
            </div>
            <div class="mini-stat">
                <h4 class="mb-0 fw-bold">84</h4>
                <small class="text-muted">Posted This Week</small>
            </div>
        </div>

        <!-- Main Table -->
        <div class="admin-table">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th width="35%">Job Title</th>
                        <th width="25%">Company</th>
                        <th width="20%">Location / Type</th>
                        <th width="20%">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="job-row">
                        <td>
                            <div class="d-flex align-items-center gap-3">
                                <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center" style="width:45px;height:45px;font-weight:700;"><i class="fas fa-code"></i></div>
                                <div>
                                    <strong>Senior PHP Developer</strong><br>
                                    <small class="text-muted">Posted 2 days ago</small>
                                </div>
                            </div>
                        </td>
                        <td>
                            <strong>ABC Ltd</strong><br>
                            <small class="text-muted">Technology Sector</small>
                        </td>
                        <td>
                            <div>Ahmedabad, India</div>
                            <span class="badge bg-light text-dark border mt-1">Full Time</span>
                        </td>
                        <td>
                            <div class="d-flex gap-2">
                                <button class="btn btn-sm btn-outline-primary action-btn" title="View Job">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-danger action-btn" title="Delete">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    
                    <tr class="job-row">
                        <td>
                            <div class="d-flex align-items-center gap-3">
                                <div class="rounded-circle bg-warning text-white d-flex align-items-center justify-content-center" style="width:45px;height:45px;font-weight:700;"><i class="fas fa-paint-brush"></i></div>
                                <div>
                                    <strong>UI/UX Designer</strong><br>
                                    <small class="text-muted">Posted 5 days ago</small>
                                </div>
                            </div>
                        </td>
                        <td>
                            <strong>TechCorp Inc.</strong><br>
                            <small class="text-muted">Software Development</small>
                        </td>
                        <td>
                            <div>Remote</div>
                            <span class="badge bg-light text-dark border mt-1">Contract</span>
                        </td>
                        <td>
                            <div class="d-flex gap-2">
                                <button class="btn btn-sm btn-outline-primary action-btn"><i class="fas fa-eye"></i></button>
                                <button class="btn btn-sm btn-outline-danger action-btn"><i class="fas fa-trash"></i></button>
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

    <script src="js/jobs.js"></script>
</body>
</html>