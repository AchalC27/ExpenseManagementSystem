<?php
  include("session.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Expense Manager - Pro</title>

  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet">

  <!-- Feather JS for Icons -->
  <script src="js/feather.min.js"></script>
  <style>
    .card a {
      color: #000;
      font-weight: 500;
    }

    .card a:hover {
      color: #28a745;
      text-decoration: dotted;
    }

    .wrapper {
      text-align: center;
      margin-top: 100px;
    }

    .wrapper h2 {
      font-size: 2rem;
      margin-bottom: 20px;
    }

    .btn3 {
      display: inline-block;
      padding: 10px 20px;
      background-color: #28a745;
      color: #fff;
      text-decoration: none;
      border-radius: 5px;
      font-size: 1rem;
    }

    .btn3:hover {
      background-color: #218838;
      color: #fff;
    }
  </style>

</head>

<body>

  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="border-right" id="sidebar-wrapper">
      <div class="user">
        <img class="img img-fluid rounded-circle" src="<?php echo $userprofile ?>" width="120">
        <h5><?php echo $username ?></h5>
        <p><?php echo $useremail ?></p>
      </div>
      <div class="sidebar-heading">Management</div>
      <div class="list-group list-group-flush">
        <a href="index.php" class="list-group-item list-group-item-action"><span data-feather="home"></span> Dashboard</a>
        <a href="add_expense.php" class="list-group-item list-group-item-action"><span data-feather="plus-square"></span> Add Expenses</a>
        <a href="manage_expense.php" class="list-group-item list-group-item-action"><span data-feather="dollar-sign"></span> Manage Expenses</a>
        <a href="student.php" class="list-group-item list-group-item-action"><span data-feather="users"></span> Students</a>
        <a href="notes.php" class="list-group-item list-group-item-action"><span data-feather="book"></span> Notes</a>
      </div>
      <div class="sidebar-heading">Settings </div>
      <div class="list-group list-group-flush">
        <a href="pro.php" class="list-group-item list-group-item-action sidebar-active"><span data-feather="dollar-sign"></span> FinFlow PRO</a>
        <a href="profile.php" class="list-group-item list-group-item-action"><span data-feather="user"></span> Profile</a>
        <a href="logout.php" class="list-group-item list-group-item-action"><span data-feather="power"></span> Logout</a>
      </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">

      <nav class="navbar navbar-expand-lg navbar-light  border-bottom">

        <button class="toggler" type="button" id="menu-toggle" aria-expanded="false">
          <span data-feather="menu"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img class="img img-fluid rounded-circle" src="<?php echo $userprofile ?>" width="25">
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="profile.php">Your Profile</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="logout.php">Logout</a>
              </div>
            </li>
          </ul>
        </div>
      </nav>

      <!-- Custom Content for Pro Page -->
      <div class="wrapper">
        <h2>Advanced Analytics and Reporting <br> @ FinFlow PRO </h2>
        <a href="payment.php" class="btn3">DONATE</a>
      </div>

    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Bootstrap core JavaScript -->
  <script src="js/jquery.slim.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script>
    feather.replace()
  </script>
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>

</body>

</html>
