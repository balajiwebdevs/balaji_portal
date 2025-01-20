<?php
include 'connection.php';

// Check if 'id' is provided
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = intval($_GET['id']); // Sanitize the id input

    // Prepare the DELETE query
    $del = "DELETE FROM `register` WHERE id = ?";
    $stmt = $conn->prepare($del);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        
    echo '<script>alert("Delete the Record!!")</script>';

    header('location: admin/manage_user.php');
        
    } else {
        echo "Error deleting record: " . $conn->error;
    }
} else {
    echo "Invalid ID or no ID provided.";
}
?>