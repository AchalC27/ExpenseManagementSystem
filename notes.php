<?php
include("session.php");
$update = false;
$del = false;
$title = "";
$notedate = date("Y-m-d");
$notes = "";
if (isset($_POST['addnotes'])) {
    $title = $_POST['title'];
    $notedate = $_POST['notedate'];
    $notes = $_POST['notes'];

    $query = "INSERT INTO notes (user_id, title, notedate, notes) VALUES ('$userid', '$title', '$notedate', '$notes')";
    $result = mysqli_query($con, $query) or die("Something Went Wrong!");
    header('location: notes.php');
}

if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $update = true;
    $record = mysqli_query($con, "SELECT * FROM notes WHERE user_id='$userid' AND notes_id=$id");
    if (mysqli_num_rows($record) == 1) {
        $n = mysqli_fetch_array($record);
        $title = $n['title'];
        $notedate = $n['notedate'];
        $notes = $n['notes'];
    } else {
        echo ("WARNING: AUTHORIZATION ERROR: Trying to Access Unauthorized data");
    }
}

if (isset($_POST['update'])) {
    $id = $_GET['edit'];
    $title = $_POST['title'];
    $notedate = $_POST['notedate'];
    $notes = $_POST['notes'];

    $sql = "UPDATE notes SET title='$title', notedate='$notedate', notes='$notes' WHERE user_id='$userid' AND notes_id='$id'";
    if (mysqli_query($con, $sql)) {
        echo "Records were updated successfully.";
    } else {
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
    }
    header('location: notes.php');
}

if (isset($_POST['delete'])) {
    $id = $_GET['delete'];
    $sql = "DELETE FROM notes WHERE user_id='$userid' AND notes_id='$id'";
    if (mysqli_query($con, $sql)) {
        echo "Records were updated successfully.";
    } else {
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
    }
    header('location: notes.php');
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $del = true;
    $record = mysqli_query($con, "SELECT * FROM notes WHERE user_id='$userid' AND notes_id=$id");

    if (mysqli_num_rows($record) == 1) {
        $n = mysqli_fetch_array($record);
        $title = $n['title'];
        $notedate = $n['notedate'];
        $notes = $n['notes'];
    } else {
        echo ("WARNING: AUTHORIZATION ERROR: Trying to Access Unauthorized data");
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Expense Manager - Add Notes</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">

    <!-- Feather JS for Icons -->
    <script src="js/feather.min.js"></script>

</head>

<body>

    <div class="d-flex" id="wrapper">

        <!-- Sidebar -->
        <?php include('sidebar.php'); ?>

        <!-- Page Content -->
        <div id="page-content-wrapper">

            <nav class="navbar navbar-expand-lg navbar-light  border-bottom">
                <?php include('topnav.php'); ?>
            </nav>

            <div class="container">
                <h3 class="mt-4 text-center">Add Your Daily Notes</h3>
                <hr>
                <div class="row ">

                    <div class="col-md-3"></div>

                    <div class="col-md" style="margin:0 auto;">
                        <form action="" method="POST">
                            <div class="form-group row">
                                <label for="title" class="col-sm-6 col-form-label"><b>Title</b></label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control col-sm-12" value="<?php echo $title; ?>" id="title" name="title" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="notedate" class="col-sm-6 col-form-label"><b>Date</b></label>
                                <div class="col-md-6">
                                    <input type="date" class="form-control col-sm-12" value="<?php echo $notedate; ?>" name="notedate" id="notedate" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="notes" class="col-sm-6 col-form-label"><b>Notes</b></label>
                                <div class="col-md-6">
                                    <textarea class="form-control col-sm-12" rows="5" id="notes" name="notes" required><?php echo $notes; ?></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12 text-right">
                                    <?php if ($update == true) : ?>
                                        <button class="btn btn-lg btn-block btn-warning" style="border-radius: 0%;" type="submit" name="update">Update</button>
                                    <?php elseif ($del == true) : ?>
                                        <button class="btn btn-lg btn-block btn-danger" style="border-radius: 0%;" type="submit" name="delete">Delete</button>
                                    <?php else : ?>
                                        <button type="submit" name="addnotes" class="btn btn-lg btn-block btn-success" style="border-radius: 0%;">Add Note</button>
                                    <?php endif ?>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="col-md-3"></div>
                    
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Bootstrap core JavaScript -->
    <script src="js/jquery.slim.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/Chart.min.js"></script>
    <!-- Menu Toggle Script -->
    <script>
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
    </script>
    <script>
        feather.replace();
    </script>

</body>
</html>