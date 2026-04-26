<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings • TalentForge Admin</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" href="css/candidates.css"> <!-- Reusing page-header CSS -->
    <link rel="stylesheet" href="css/settings.css">
</head>
<body>

    <?php include 'sidebar.php'; ?>

    <div class="admin-content">
        
        <!-- Page Header -->
        <div class="page-header">
            <div>
                <h2 class="mb-1 fw-bold text-primary-blue">Platform Settings</h2>
                <p class="text-muted mb-0">Manage your administrative account and preferences</p>
            </div>
        </div>

        <div class="row g-4 mt-1">
            
            <!-- Security Settings -->
            <div class="col-lg-7 col-md-12">
                <div class="settings-card">
                    <div class="d-flex align-items-center gap-3 mb-4">
                        <div class="icon-box bg-primary text-white bg-opacity-10" style="color: #0A3B5B !important; background: rgba(10,59,91,0.1) !important;">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <div>
                            <h4 class="mb-1 fw-bold text-primary-blue">Security Settings</h4>
                            <p class="text-muted mb-0" style="font-size: 0.9rem;">Update your account password</p>
                        </div>
                    </div>
                    
                    <form action="change_password.php" method="POST">
                        <div class="mb-4">
                            <label class="premium-label">Current Password</label>
                            <input type="password" name="current" class="form-control premium-input" placeholder="Enter current password" required>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label class="premium-label">New Password</label>
                                <input type="password" name="new" class="form-control premium-input" placeholder="Enter new password" required>
                            </div>
                            <div class="col-md-6 mb-4">
                                <label class="premium-label">Confirm Password</label>
                                <input type="password" name="confirm" class="form-control premium-input" placeholder="Confirm new password" required>
                            </div>
                        </div>
                        
                        <div class="d-flex justify-content-end mt-2">
                            <button class="btn btn-primary-blue action-btn px-5 py-2" type="submit">
                                Update Password <i class="fas fa-arrow-right ms-2"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            
            <!-- Session Management -->
            <div class="col-lg-5 col-md-12">
                <div class="settings-card d-flex flex-column">
                    <div class="d-flex align-items-center gap-3 mb-4">
                        <div class="icon-box" style="color: #dc3545; background: rgba(220,53,69,0.1);">
                            <i class="fas fa-power-off"></i>
                        </div>
                        <div>
                            <h4 class="mb-1 fw-bold text-danger">Session Management</h4>
                            <p class="text-muted mb-0" style="font-size: 0.9rem;">Manage your active session</p>
                        </div>
                    </div>
                    
                    <div class="mt-auto mb-4">
                        <div class="p-4 rounded-4" style="background: #fff5f5; border: 1px solid #ffe3e3;">
                            <h6 class="fw-bold text-danger mb-2">Secure Logout</h6>
                            <p class="text-muted mb-0" style="font-size: 0.9rem;">Logging out will securely end your current administrative session. You will need to re-authenticate to access the dashboard.</p>
                        </div>
                    </div>
                    
                    <a href="adminLogout.php" class="btn btn-danger action-btn py-3 w-100 fw-bold shadow-sm" style="border-radius: 14px; font-size: 1rem;">
                        <i class="fas fa-sign-out-alt me-2"></i> Logout Now
                    </a>
                </div>
            </div>
            
        </div>
    </div>
</body>
</html>