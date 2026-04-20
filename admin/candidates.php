<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Candidates • TalentForge Admin</title>
    
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
                <h2 class="mb-1 fw-bold text-primary-blue">Candidates Management</h2>
                <p class="text-muted mb-0">Manage and monitor all registered candidates</p>
            </div>
            
            <div class="d-flex align-items-center gap-3">
                <input type="text" id="candidateSearch" class="search-box" placeholder="Search by name, email or skill...">
                
                <button class="btn btn-primary-blue action-btn px-4" onclick="exportCandidates()">
                    <i class="fas fa-download me-2"></i> Export CSV
                </button>
                
                <button class="btn btn-outline-primary action-btn px-4">
                    <i class="fas fa-plus me-2"></i> Add Candidate
                </button>
            </div>
        </div>

        <!-- Quick Stats -->
        <div class="top-stats">
            <div class="mini-stat">
                <h4 class="mb-0 fw-bold">1,284</h4>
                <small class="text-muted">Total Candidates</small>
            </div>
            <div class="mini-stat">
                <h4 class="mb-0 fw-bold text-success">847</h4>
                <small class="text-muted">Active This Month</small>
            </div>
            <div class="mini-stat">
                <h4 class="mb-0 fw-bold">92</h4>
                <small class="text-muted">New This Week</small>
            </div>
        </div>

        <!-- Main Table -->
        <div class="admin-table">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th width="25%">Candidate Name</th>
                        <th width="25%">Email</th>
                        <th width="25%">Skills</th>
                        <th width="15%">Status</th>
                        <th width="10%">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="candidate-row">
                        <td>
                            <div class="d-flex align-items-center gap-3">
                                <div class="rounded-circle bg-warning text-white d-flex align-items-center justify-content-center" style="width:45px;height:45px;font-weight:700;">JD</div>
                                <div>
                                    <strong>John Doe</strong><br>
                                    <small class="text-muted">Mumbai, India</small>
                                </div>
                            </div>
                        </td>
                        <td>john.doe@email.com</td>
                        <td>
                            <span class="skill-badge">PHP</span>
                            <span class="skill-badge">JavaScript</span>
                            <span class="skill-badge">Laravel</span>
                        </td>
                        <td><span class="badge bg-success px-3 py-2">Verified</span></td>
                        <td>
                            <div class="d-flex gap-2">
                                <button class="btn btn-sm btn-outline-primary action-btn" title="View Profile">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-danger action-btn" title="Delete">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    
                    <!-- More sample rows -->
                    <tr class="candidate-row">
                        <td>
                            <div class="d-flex align-items-center gap-3">
                                <div class="rounded-circle bg-info text-white d-flex align-items-center justify-content-center" style="width:45px;height:45px;font-weight:700;">SP</div>
                                <div>
                                    <strong>Sneha Patel</strong><br>
                                    <small class="text-muted">Ahmedabad, India</small>
                                </div>
                            </div>
                        </td>
                        <td>sneha.patel@gmail.com</td>
                        <td>
                            <span class="skill-badge">React</span>
                            <span class="skill-badge">Node.js</span>
                        </td>
                        <td><span class="badge bg-warning px-3 py-2">Pending</span></td>
                        <td>
                            <div class="d-flex gap-2">
                                <button class="btn btn-sm btn-outline-primary action-btn"><i class="fas fa-eye"></i></button>
                                <button class="btn btn-sm btn-outline-danger action-btn"><i class="fas fa-trash"></i></button>
                            </div>
                        </td>
                    </tr>
                    
                    <!-- You can add more rows here -->
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

    <script src="js/candidates.js"></script>
</body>
</html>