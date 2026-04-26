<?php
include '../DBConnection.php'; // Adjust path as needed
$query = "SELECT a.id, a.status, a.applied_at,
                 j.title as job_title, j.location,
                 cand.name as candidate_name, cand.email as candidate_email,
                 comp.company_name
          FROM applications a 
          JOIN jobs j ON a.job_id = j.id 
          JOIN candidates cand ON a.candidate_id = cand.id 
          JOIN companies comp ON a.company_id = comp.id 
          ORDER BY a.applied_at DESC";
$result = $conn->query($query);
?>
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
            <table id="applicationsTable" class="table table-hover mb-0">
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
                    <?php while($row = $result->fetch_assoc()): ?>
                    <tr class="application-row">
                        <td><?php echo htmlspecialchars($row['candidate_name']); ?></td>
                        <td><?php echo htmlspecialchars($row['job_title']); ?></td>
                        <td><?php echo htmlspecialchars($row['company_name']); ?></td>
                        <!-- <td><?php echo htmlspecialchars($row['applied_at']); ?></td> -->
                        <td>
                            <span class="badge <?php 
                                echo $row['status'] == 'applied' ? 'bg-primary' : 
                                    ($row['status'] == 'shortlisted' ? 'bg-warning' : 
                                    ($row['status'] == 'hired' ? 'bg-success' : 'bg-danger')); 
                                ?> px-3 py-2">
                                <?php echo ucfirst($row['status']); ?>
                            </span>
                        </td>
                        <td>
                            <div class="d-flex gap-2">
                                <button class="btn btn-sm btn-outline-primary action-btn" 
                                        onclick="viewApplication(<?php echo $row['id']; ?>)">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <select class="form-select form-select-sm" 
                                        onchange="updateApplicationStatus(<?php echo $row['id']; ?>, this.value)">
                                    <option value="applied" <?php echo $row['status']=='applied'?'selected':''; ?>>Applied</option>
                                    <option value="shortlisted" <?php echo $row['status']=='shortlisted'?'selected':''; ?>>Shortlisted</option>
                                    <option value="rejected" <?php echo $row['status']=='rejected'?'selected':''; ?>>Rejected</option>
                                    <option value="hired" <?php echo $row['status']=='hired'?'selected':''; ?>>Hired</option>
                                </select>
                            </div>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
        
        <!-- Pagination -->
        <div class="d-flex justify-content-center align-items-center mt-5 mb-3">
            <nav>
                <ul id="applicationPagination" class="pagination mb-0"></ul>
            </nav>
        </div>
    </div>

    <script src="js/applications.js"></script>
</body>
</html>