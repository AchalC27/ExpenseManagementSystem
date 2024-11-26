<?php
include("session.php"); // Include session management
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Payment Gateway Integration</title>
    <link rel="icon" href="images/dollar.png" type="image/png" sizes="16x16">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    
    <!-- CSS and Font Links -->
    <link href="css/payment.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    
    <link href='https://fonts.googleapis.com/css?family=Fugaz+One' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Alegreya+Sans:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,800,800italic,900,900italic' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
    
    <!-- jQuery -->
    <script src="js/jquery.min.js"></script>
    <script src="js/easyResponsiveTabs.js" type="text/javascript"></script>
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
            <a href="index.php" class="list-group-item list-group-item-action sidebar-active"><span data-feather="home"></span> Dashboard</a>
            <a href="add_expense.php" class="list-group-item list-group-item-action "><span data-feather="plus-square"></span> Add Expenses</a>
            <a href="manage_expense.php" class="list-group-item list-group-item-action "><span data-feather="dollar-sign"></span> Manage Expenses</a>
            <a href="student.php" class="list-group-item list-group-item-action "><span data-feather="users"></span> Students</a>
            <a href="notes.php" class="list-group-item list-group-item-action "><span data-feather="book"></span> Notes</a>
        </div>
        <div class="sidebar-heading">Settings </div>
        <div class="list-group list-group-flush">
            <a href="pro.php" class="list-group-item list-group-item-action"><span data-feather="dollar-sign"></span> FinFlow PRO</a>
            <a href="profile.php" class="list-group-item list-group-item-action "><span data-feather="user"></span> Profile</a>
            <a href="logout.php" class="list-group-item list-group-item-action "><span data-feather="power"></span> Logout</a>
        </div>
        </div>
        <!-- /#sidebar-wrapper -->

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


            <div class="content">
                <script type="text/javascript">
                    $(document).ready(function() {
                        $('#horizontalTab').easyResponsiveTabs({
                            type: 'default',
                            width: 'auto',
                            fit: true
                        });
                    });
                </script>
                
                <div class="sap_tabs">
                    <div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
                        <div class="pay-tabs">
                            <h2>Select Payment Method</h2>
                            <ul class="resp-tabs-list">
                                <li class="resp-tab-item" aria-controls="tab_item-0" role="tab">
                                    <span><label class="pic1"></label>Credit Card</span>
                                </li>
                                <li class="resp-tab-item" aria-controls="tab_item-1" role="tab">
                                    <span><label class="pic3"></label>Net Banking</span>
                                </li>
                                <li class="resp-tab-item" aria-controls="tab_item-2" role="tab">
                                    <span><label class="pic4"></label>PayPal</span>
                                </li>
                                <li class="resp-tab-item" aria-controls="tab_item-3" role="tab">
                                    <span><label class="pic2"></label>Debit Card</span>
                                </li>
                                <div class="clear"></div>
                            </ul>
                        </div>
                        
                        <div class="resp-tabs-container">
                            <!-- Credit Card Tab -->
                            <div class="tab-1 resp-tab-content" aria-labelledby="tab_item-0">
                                <div class="payment-info">
                                    <h3 class="pay-title">Credit Card Info</h3>
                                    <form action="process_payment.php" method="POST">
                                        <input type="hidden" name="payment_method" value="credit_card">
                                        <div class="tab-for">
                                            <h5>Amount</h5>
                                            <input class="pay-logo" type="number" name="amount" step="0.01" required placeholder="Enter Amount">
                                        </div>
                                        <div class="tab-for">
                                            <h5>NAME ON CARD</h5>
                                            <input class="pay-logo" type="text" name="card_name" required placeholder="Enter Name on Card">
                                            
                                            <h5>CARD NUMBER</h5>
                                            <input class="pay-logo" type="text" name="card_number" pattern="\d{4}-\d{4}-\d{4}-\d{4}" placeholder="0000-0000-0000-0000" required>

                                            <h5>Email ID</h5>
                                            <input class="pay-logo" type="email" name="email" required placeholder="Enter your email ID">
                                        </div>
                                        <div class="transaction">
                                            <div class="tab-form-left user-form">
                                                <h5>EXPIRATION</h5>
                                                <ul>
                                                    <li>
                                                        <select name="exp_month" required>
                                                            <?php for($m=1; $m<=12; $m++): ?>
                                                                <option value="<?php echo str_pad($m, 2, '0', STR_PAD_LEFT); ?>">
                                                                    <?php echo str_pad($m, 2, '0', STR_PAD_LEFT); ?>
                                                                </option>
                                                            <?php endfor; ?>
                                                        </select>
                                                    </li>
                                                    <li>
                                                        <select name="exp_year" required>
                                                            <?php 
                                                            $current_year = date('Y');
                                                            for($y=$current_year; $y<=$current_year+15; $y++): ?>
                                                                <option value="<?php echo $y; ?>"><?php echo $y; ?></option>
                                                            <?php endfor; ?>
                                                        </select>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="tab-form-right user-form-rt">
                                                <h5>CVV NUMBER</h5>
                                                <input type="password" name="cvv" maxlength="3" required placeholder="CVV">
                                            </div>
                                            <div class="clear"></div>
                                        </div>
                                        <input type="submit" class="confirm-btn" value="SEND">
                                    </form>
                                </div>
                            </div>
                            
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>                                                            
    <!-- JavaScript -->
    <script src="js/jquery.slim.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>