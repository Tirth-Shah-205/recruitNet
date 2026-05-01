<?php
include '../DBConnection.php'; // Adjust path as needed
// Fetch jobs with company info
$query = "SELECT j.id, j.title, j.location, j.job_type, j.salary, j.status, j.created_at,
                 c.company_name, c.email as company_email
          FROM jobs j 
          JOIN companies c ON j.company_id = c.id 
          ORDER BY j.created_at DESC";
$result = $conn->query($query);
?>
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
            <table id="jobsTable" class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th width="20%">Job Title</th>
                        <th width="20%">Company</th>
                        <th width="20%">Location</th>
                        <th width="10%">Type</th>
                        <th width="10%">Status</th>
                        <th width="20%">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = $result->fetch_assoc()): ?>
                    <tr class="job-row">
                        <td><?php echo htmlspecialchars($row['title']); ?></td>
                        <td><?php echo htmlspecialchars($row['company_name']); ?></td>
                        <td><?php echo htmlspecialchars($row['location']); ?></td>
                        <td><?php echo htmlspecialchars($row['job_type']); ?></td>
                        <!-- <td><?php echo htmlspecialchars($row['salary']); ?></td> -->
                        <td>
                            <span class="badge <?php 
                                echo $row['status'] == 'open' ? 'bg-success' : 
                                    ($row['status'] == 'paused' ? 'bg-warning' : 'bg-danger'); 
                                ?> px-3 py-2">
                                <?php echo ucfirst($row['status']); ?>
                            </span>
                        </td>
                        <td>
                            <div class="d-flex gap-2">
                                <button class="btn btn-sm btn-outline-primary action-btn" 
                                        onclick="viewJob(<?php echo $row['id']; ?>)">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-warning action-btn" 
                                        onclick="editJobStatus(<?php echo $row['id']; ?>, '<?php echo $row['status']; ?>')">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-danger action-btn" 
                                        onclick="deleteJob(<?php echo $row['id']; ?>)">
                                    <i class="fas fa-trash"></i>
                                </button>
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
                <ul id="jobPagination" class="pagination mb-0"></ul>
            </nav>
        </div>
    </div>

    <script src="js/jobs.js"></script>
</body>
</html>