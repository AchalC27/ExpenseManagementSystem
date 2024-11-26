<?php
include("session.php"); // Include session handling and user data

// Fetch data or set dynamic content if needed
$transaction_id = "123456789"; // Example transaction ID
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Payment Success</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles -->
    <link href="css/style.css" rel="stylesheet">
    <link rel="icon" href="images/dollar.png" type="image/png" sizes="16x16">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">

    <!-- Feather Icons -->
    <script src="js/feather.min.js"></script>

    <style>
        body {
            background: #dcf0fa;
        }

        .container {
            max-width: 380px;
            margin: 50px auto;
            overflow: hidden;
        }

        .printer-top, .printer-bottom {
            z-index: 1;
            border: 6px solid #666666;
            height: 6px;
            background: #333333;
        }

        .printer-top {
            border-bottom: 0;
            border-radius: 6px 6px 0 0;
        }

        .printer-bottom {
            border-top: 0;
            border-radius: 0 0 6px 6px;
        }

        .paper-container {
            position: relative;
            overflow: hidden;
            height: 467px;
        }

        .paper {
            background: #ffffff;
            font-family: 'Poppins', sans-serif;
            height: 447px;
            position: absolute;
            z-index: 2;
            margin: 0 12px;
            margin-top: -12px;
            animation: print 5s cubic-bezier(0.68, -0.55, 0.265, 0.9) infinite;
        }

        .main-contents {
            margin: 0 12px;
            padding: 24px;
        }

        .success-icon {
            text-align: center;
            font-size: 48px;
            height: 72px;
            background: #359d00;
            border-radius: 50%;
            width: 72px;
            margin: 16px auto;
            color: #fff;
        }

        .success-title {
            font-size: 22px;
            text-align: center;
            color: #666;
            font-weight: bold;
            margin-bottom: 16px;
        }

        .success-description {
            font-size: 15px;
            line-height: 21px;
            color: #999;
            text-align: center;
            margin-bottom: 24px;
        }

        .order-details {
            text-align: center;
            color: #333;
            font-weight: bold;
        }

        .order-number-label {
            font-size: 18px;
            margin-bottom: 8px;
        }

        .order-number {
            border-top: 1px solid #ccc;
            border-bottom: 1px solid #ccc;
            line-height: 48px;
            font-size: 48px;
            padding: 8px 0;
            margin-bottom: 24px;
        }

        .complement {
            font-size: 18px;
            margin-bottom: 8px;
            color: #32a852;
        }

        @keyframes print {
            0% {
                transform: translateY(-90%);
            }

            100% {
                transform: translateY(0%);
            }
        }
    </style>
</head>

<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <?php include("sidebar.php"); ?>

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light border-bottom">
                <button class="toggler" type="button" id="menu-toggle" aria-expanded="false">
                    <span data-feather="menu"></span>
                </button>

                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="img img-fluid rounded-circle" src="<?php echo $userprofile ?>" width="25">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">Your Profile</a>
                                <a class="dropdown-item" href="#">Edit Profile</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="logout.php">Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="container">
                <div class="printer-top"></div>

                <div class="paper-container">
                    <div class="printer-bottom"></div>

                    <div class="paper">
                        <div class="main-contents">
                            <div class="success-icon">&#10004;</div>
                            <div class="success-title">Payment Complete</div>
                            <div class="success-description">
                                Thank you for completing the payment! You will shortly receive an email of your payment.
                            </div>
                            <div class="order-details">
                                <div class="order-number-label">Transaction ID</div>
                                <div class="order-number"><?php echo $transaction_id; ?></div>
                                <div class="complement">Thank You!</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="js/jquery.slim.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script>
        feather.replace();
    </script>
</body>
</html>
