<?php
include '../DBConnection.php'; // Adjust path as needed
$query = "SELECT c.id, c.company_name, c.email, c.phone, c.created_at,
                 cp.industry, cp.company_size, cp.logo, cp.headquarters
          FROM companies c 
          LEFT JOIN company_profiles cp ON c.id = cp.company_id 
          ORDER BY c.created_at DESC";
$result = $conn->query($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Companies • TalentForge Admin</title>
    
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
                <h2 class="mb-1 fw-bold text-primary-blue">Companies Management</h2>
                <p class="text-muted mb-0">Manage and monitor all partnered companies</p>
            </div>
            
            <div class="d-flex align-items-center gap-3">
                <input type="text" id="companySearch" class="search-box" placeholder="Search by name or email...">
                <button class="btn btn-outline-primary action-btn px-4">
                    <i class="fas fa-plus me-2"></i> Add Company
                </button>
            </div>
        </div>

        <!-- Quick Stats -->
        <div class="top-stats">
            <div class="mini-stat">
                <h4 class="mb-0 fw-bold">124</h4>
                <small class="text-muted">Total Companies</small>
            </div>
            <div class="mini-stat">
                <h4 class="mb-0 fw-bold text-success">86</h4>
                <small class="text-muted">Active Hiring</small>
            </div>
            <div class="mini-stat">
                <h4 class="mb-0 fw-bold">12</h4>
                <small class="text-muted">New This Month</small>
            </div>
        </div>

        <!-- Main Table -->
        <div class="admin-table">
            <table id="companiesTable" class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th width="35%">Company Name</th>
                        <th width="30%">Email Address</th>
                        <th width="15%">Status</th>
                        <th width="20%">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = $result->fetch_assoc()): ?>
                    <tr class="company-row">
                        <td>
                            <div class="d-flex align-items-center gap-3">
                                <img src="<?php echo $row['logo'] ?: '../uploads/default-logo.png'; ?>" 
                                    class="rounded-circle" style="width:45px;height:45px;object-fit:cover;">
                                <div>
                                    <strong><?php echo htmlspecialchars($row['company_name']); ?></strong><br>
                                    <small class="text-muted"><?php echo htmlspecialchars($row['industry']); ?></small>
                                </div>
                            </div>
                        </td>
                        <td><?php echo htmlspecialchars($row['email']); ?></td>
                        <!-- <td><?php echo htmlspecialchars($row['headquarters']); ?></td>
                        <td><?php echo htmlspecialchars($row['company_size']); ?> employees</td> -->
                        <td><span class="badge bg-success px-3 py-2">Active</span></td>
                        <td>
                            <div class="d-flex gap-2">
                                <button class="btn btn-sm btn-outline-primary action-btn" 
                                        onclick="viewCompany(<?php echo $row['id']; ?>)">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-danger action-btn" 
                                        onclick="deleteCompany(<?php echo $row['id']; ?>)">
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
                <ul id="companyPagination" class="pagination mb-0"></ul>
            </nav>
        </div>
    </div>

    <script src="js/companies.js"></script>
</body>
</html>