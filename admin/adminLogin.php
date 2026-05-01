<?php 
    session_start();
    include '../DBConnection.php'; // Adjust path as needed
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>RecruitNet | Admin Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/login.css">
    <style>
        body {
            background: linear-gradient(135deg, #05273D, #0A3B5B);
        }
        
        .admin-badge {
            background: #FF7A3D;
            color: white;
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            margin-bottom: 20px;
            display: inline-block;
        }
        
        .auth-card h3 {
            color: #0A3B5B;
        }
    </style>
</head>

<body>

<div class="auth-card">
    <h3>Admin Login</h3>
    <form action="dashboard.php" method="POST">
        <input type="text" name="username" class="form-control mb-3" placeholder="Username" required>
        <input type="password" name="password" class="form-control mb-4" placeholder="Password" required>
        <button type="submit" class="btn-main w-100">Login</button>
    </form>
</div>

</body>
</html>