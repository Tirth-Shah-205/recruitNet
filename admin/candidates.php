<?php
include '../DBConnection.php'; // Adjust path as needed
// Fetch candidates with profile data
$query = "SELECT c.id, c.name, c.email, c.phone, c.created_at, 
                 p.job_title, p.skills, p.location, p.profile_pic
          FROM candidates c 
          LEFT JOIN profiles p ON c.id = p.candidate_id 
          ORDER BY c.created_at DESC";
$result = $conn->query($query);
?>
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
            <table id="candidatesTable" class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th width="25%">Candidate Name</th>
                        <th width="25%">Email</th>
                        <th width="25%">Skills</th>
                        <th width="15%">Status</th>
                        <th width="10%">Actions</th>
                    </tr>
                </thead>
                <!-- In the table body, replace static rows with: -->
                <tbody>
                    <?php while($row = $result->fetch_assoc()): ?>
                    <tr class="candidate-row">
                        <td>
                            <div class="d-flex align-items-center gap-3">
                                <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center" 
                                    style="width:45px;height:45px;font-weight:700;background-image: url('<?php echo $row['profile_pic'] ?: '../uploads/default-avatar.png'; ?>'); background-size: cover;">
                                    <?php echo strtoupper(substr($row['name'], 0, 2)); ?>
                                </div>
                                <div>
                                    <strong><?php echo htmlspecialchars($row['name']); ?></strong><br>
                                    <small class="text-muted"><?php echo htmlspecialchars($row['location']); ?></small>
                                </div>
                            </div>
                        </td>
                        <td><?php echo htmlspecialchars($row['email']); ?></td>
                        <td>
                            <?php
                            $skills = explode(',', $row['skills']);
                            foreach(array_slice($skills, 0, 3) as $skill): ?>
                                <span class="skill-badge"><?php echo htmlspecialchars(trim($skill)); ?></span>
                            <?php endforeach; ?>
                        </td>
                        <td><span class="badge bg-success px-3 py-2">Active</span></td>
                        <td>
                            <div class="d-flex gap-2">
                                <button class="btn btn-sm btn-outline-primary action-btn" title="View Profile"
                                        onclick="viewCandidate(<?php echo $row['id']; ?>)">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-danger action-btn" title="Delete"
                                        onclick="deleteCandidate(<?php echo $row['id']; ?>)">
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
                <ul id="candidatePagination" class="pagination mb-0"></ul>
            </nav>
        </div>
    </div>

    <script src="js/candidates.js"></script>
</body>
</html>