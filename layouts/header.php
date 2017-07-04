<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Bread & Breakfast">
    <meta name="Triller_Mx" content="Triller Mx">
    <title>Bread & Breakfast</title>

    <!-- Bootstrap -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap responsive -->
    <link href="assets/css/bootstrap-responsive.min.css" rel="stylesheet">
    <!-- Font awesome - iconic font with IE7 support --> 
    <link href="assets/css/font-awesome.css" rel="stylesheet">
    <link href="assets/css/font-awesome-ie7.css" rel="stylesheet">
    <!-- Bootbusiness theme -->
    <link href="assets/css/boot-business.css" rel="stylesheet">
  </head>

  <body>
    <!-- Start: HEADER -->
    <header>

      <!-- Start: Navigation wrapper -->
      <div class="navbar navbar-fixed-top">
        <div class="navbar-inner">
          <div class="container">
            <a href="index.php" class="brand brand-bootbus">Bread & Breakfast</a>
            <!-- Below button used for responsive navigation -->
            <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>

            <!-- Start: Primary navigation -->
            <div class="nav-collapse collapse">        
              <ul class="nav pull-right">
                <!-- <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Products and Services<b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li class="nav-header">PRODUCTS</li>
                    <li><a href="product.html">Product1</a></li>         
                    <li class="divider"></li>
                    <li class="nav-header">SERVICES</li>
                    <li><a href="service.html">Service1</a></li>
                  </ul>                  
                </li> -->
                <!-- <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">About<b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li><a href="our_works.html">Our works</a></li>
                  </ul>
                </li> -->
                <!-- <li><a href="faq.html">FAQ</a></li> -->

                <?php if(isset($_SESSION["user_type"]) && $_SESSION["user_type"] == 'RENTER'){ ?>

                  <li><a href="add_lodging.php">Add Lodging</a></li>

                <?php } elseif (isset($_SESSION["user_type"]) && $_SESSION["user_type"] == 'TOURIST') { ?>

                  <li><a href="view_lodging.php">View Lodgings</a></li>

                <?php } ?>

                <li><a href="contact_us.php">Contact us</a></li>

                <!-- View Login & Register / Logout -->

                <?php if(!(isset($_SESSION["user_email"]))){?>

                  <li><a href="register.php">Sign up</a></li>
                  <li><a href="login.php">Sign in</a></li>

                <?php } else { ?>

                  <li><a href="logout.php">Logout</a></li>

                <?php } ?>

                <?php if (isset($_SESSION["user_type"]) && $_SESSION["user_type"] == 'TOURIST') { ?>
                  <li>
                  <form class="navbar-form navbar-right" action="view_lodging.php" method="get">
                    <div class="form-group">
                      <input type="hidden" name="pagination" value="0">
                      <input id="P_Search" name="P_Search" type="text" placeholder="Search Lodging Name / Price" class="form-control" required>
                      <button id="search" class="btn btn-success" type="submit">Search</button>
                    </div>
                  </form>
                  </li>

                <?php } ?>

              </ul>
            </div>

          </div>
        </div>

      </div>
      <!-- End: Navigation wrapper -->   

    </header>
    <!-- End: HEADER -->