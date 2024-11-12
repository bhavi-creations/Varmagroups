<?php
// Include the database connection file
include '../../db.connection/db_connection.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch image details based on the ID
    $sql = "SELECT id, title, image_path FROM image_uploads WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $image = $result->fetch_assoc();
    } else {
        echo "Image not found.";
        exit;
    }
} else {
    echo "No image ID provided.";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Handle form submission to update image details
    $title = $_POST['title'];

    // If a new image is uploaded, handle the image upload logic
    if (isset($_FILES['image']['name']) && $_FILES['image']['name'] != '') {
        $target_dir = "uploads/images/"; // Define the directory to store the image
        $target_file = $target_dir . basename($_FILES['image']['name']);
        move_uploaded_file($_FILES['image']['tmp_name'], $target_file);
        $image_path = $target_file;
    } else {
        // Use the current image if no new image is uploaded
        $image_path = $image['image_path'];
    }

    // Update the database with the new title and image
    $update_sql = "UPDATE image_uploads SET title = ?, image_path = ? WHERE id = ?";
    $stmt = $conn->prepare($update_sql);
    $stmt->bind_param('ssi', $title, $image_path, $id);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "Image details updated successfully.";
        header('Location: allimages.php'); // Redirect to the image list page
        exit;
    } else {
        echo "Failed to update image details.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">


<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Varma Groups - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include 'sidebar.php'; ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include 'navbar.php'; ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Edit Image</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <div class="col-xl-11">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-success">EDIT POST DETAILS</h6>
                                </div>
                                


                                <div class="card-body">
                                
                                    <form method="POST" enctype="multipart/form-data">
                                        <label for="title">Image Title</label>
                                        <input type="text" id="title" name="title" value="<?php echo $image['title']; ?>" required>
                                        <br><br>

                                        <label for="image">Upload New Image</label>
                                        <input type="file" id="image" name="image">
                                        <br><br>

                                        <img src="<?php echo $image['image_path']; ?>" alt="Current Image" width="100">
                                        <br><br>

                                        <input type="submit" class='btn btn-success mx-1 my-2 col-xl-2' value="Update Changes">
                                    </form>
                                </div>



                            </div>
                        </div>
                    </div>
                    

                </div>
                <!-- End of Main Content -->

                <!-- Footer -->
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <p class="mini_text" style="color:black">©2024 Varma Groups. All Rights Reserved. Designed &
                                Developed by <a href="https://bhavicreations.com/" target="_blank"
                                    style="text-decoration: none;color:black">Bhavi Creations</a></p>
                        </div>
                    </div>
                </footer>
                <!-- End of Footer -->

            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" href="login.html">Logout</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap core JavaScript-->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="js/sb-admin-2.min.js"></script>

</body>

</html>