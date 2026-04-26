<?php
include '../DBConnection.php';
if(isset($_POST['id']) && isset($_POST['status'])) {
    $id = (int)$_POST['id'];
    $status = $_POST['status'];
    $stmt = $conn->prepare("UPDATE jobs SET status = ? WHERE id = ?");
    $stmt->bind_param("si", $status, $id);
    if($stmt->execute()) {
        echo "success";
    } else {
        echo "error";
    }
}
?>