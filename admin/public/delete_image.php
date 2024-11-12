<?php
// Include the database connection file
include '../../db.connection/db_connection.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch the image path to delete the file from the server
    $sql = "SELECT image_path FROM image_uploads WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $image = $result->fetch_assoc();
        $image_path = $image['image_path'];

        // Delete the image file from the server
        if (file_exists($image_path)) {
            unlink($image_path);
        }

        // Delete the image record from the database
        $delete_sql = "DELETE FROM image_uploads WHERE id = ?";
        $delete_stmt = $conn->prepare($delete_sql);
        $delete_stmt->bind_param('i', $id);
        $delete_stmt->execute();

        if ($delete_stmt->affected_rows > 0) {
            echo "Image deleted successfully.";
            header('Location: allimages.php'); // Redirect to the image list page
            exit;
        } else {
            echo "Failed to delete image.";
        }
    } else {
        echo "Image not found.";
    }
} else {
    echo "No image ID provided.";
}
?>
