<?php
include '../DBConnection.php';
if(isset($_POST['id'])) {
    $id = (int)$_POST['id'];
    $stmt = $conn->prepare("DELETE FROM companies WHERE id = ?");
    $stmt->bind_param("i", $id);
    if($stmt->execute()) {
        echo "success";
    } else {
        echo "error";
    }
}
?>