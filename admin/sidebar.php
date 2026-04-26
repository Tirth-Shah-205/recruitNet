<?php
$current = basename($_SERVER['PHP_SELF']);
?>

<div class="admin-sidebar d-flex flex-column">

    <!-- Logo Section -->
    <div class="admin-logo mb-4 mt-2 ps-3 d-flex align-items-center" style="font-size: 1.8rem; letter-spacing: -0.5px;">
        <div>Recruit<span style="color: #f97316;">Net</span></div>
    </div>
    
    <!-- Navigation Menu -->
    <div class="admin-menu flex-grow-1 pe-2 mt-3" style="overflow-y: auto; overflow-x: hidden;">
        
        <div class="menu-label text-uppercase fw-bold mb-3 px-3" style="font-size: 0.75rem; letter-spacing: 1.2px; color: #64748b;">Overview</div>
        
        <a href="dashboard.php" class="<?= ($current == 'dashboard.php') ? 'active' : '' ?>">
            <i class="fas fa-chart-pie" style="width: 24px; text-align: center; font-size: 1.1rem;"></i> Dashboard
        </a>

        <div class="menu-label text-uppercase fw-bold mt-4 mb-3 px-3" style="font-size: 0.75rem; letter-spacing: 1.2px; color: #64748b;">Management</div>

        <a href="candidates.php" class="<?= ($current == 'candidates.php') ? 'active' : '' ?>">
            <i class="fas fa-user-friends" style="width: 24px; text-align: center; font-size: 1.1rem;"></i> Candidates
        </a>

        <a href="companies.php" class="<?= ($current == 'companies.php') ? 'active' : '' ?>">
            <i class="fas fa-building" style="width: 24px; text-align: center; font-size: 1.1rem;"></i> Companies
        </a>

        <a href="jobs.php" class="<?= ($current == 'jobs.php') ? 'active' : '' ?>">
            <i class="fas fa-briefcase" style="width: 24px; text-align: center; font-size: 1.1rem;"></i> Jobs
        </a>

        <a href="applications.php" class="<?= ($current == 'applications.php') ? 'active' : '' ?>">
            <i class="fas fa-file-signature" style="width: 24px; text-align: center; font-size: 1.1rem;"></i> Applications
        </a>
        
        <div class="menu-label text-uppercase fw-bold mt-4 mb-3 px-3" style="font-size: 0.75rem; letter-spacing: 1.2px; color: #64748b;">System</div>

        <a href="settings.php" class="<?= ($current == 'settings.php') ? 'active' : '' ?>">
            <i class="fas fa-cog" style="width: 24px; text-align: center; font-size: 1.1rem;"></i> Settings
        </a>
    </div>

    <!-- Bottom Profile / Logout section -->
    <div class="sidebar-footer mt-auto p-3 me-2 rounded-4" style="background: rgba(255,255,255,0.04); border: 1px solid rgba(255,255,255,0.08); transition: all 0.3s ease;">
        <div class="d-flex align-items-center gap-3">
            <div class="rounded-circle text-white d-flex align-items-center justify-content-center fw-bold shadow-sm" style="width: 42px; height: 42px; background: linear-gradient(135deg, #0A3B5B, #1e293b); border: 2px solid rgba(255,255,255,0.2);">
                AD
            </div>
            <div class="flex-grow-1">
                <h6 class="mb-0 text-white fw-bold" style="font-size: 0.95rem;">Admin User</h6>
                <small style="font-size: 0.8rem; color: #94a3b8;">Superuser</small>
            </div>
            <a href="logout.php" title="Logout" style="color: #f87171; background: rgba(248, 113, 113, 0.1); width: 36px; height: 36px; display: flex; align-items: center; justify-content: center; border-radius: 10px; transition: 0.3s; text-decoration: none;" onmouseover="this.style.background='#ef4444'; this.style.color='white';" onmouseout="this.style.background='rgba(248, 113, 113, 0.1)'; this.style.color='#f87171';">
                <i class="fas fa-sign-out-alt"></i>
            </a>
        </div>
    </div>
</div>

<link rel="stylesheet" href="css/sidebar.css">