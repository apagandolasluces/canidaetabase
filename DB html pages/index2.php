<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Canidaetabase</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>

    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />

</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="purple" data-image="assets/img/sidebar-5.jpg">

    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->

    	<div class="sidebar-wrapper">
            <div class="logo">
                <a class="simple-text">
                    Canidaetabase
                </a>
            </div>

    	</div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand">A database for all Canid lovers</a>
                </div>
            </div>
        </nav>


        <div class="content">
            <div class="container-fluid">
                <div class="row">
                	<div class="col-md-8" style="padding-left: 25%;">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Search Bar</h4>
                            </div>
                            <div class="content">
                                <form action="index.php" method="post">
                                    <div class="row">
                                        <div class="col-md-4" style="width: 100%;">
                                            <div class="form-group">
                                                <label for="searchInput"></label>
                                                <input type="search" name='search' class="form-control" placeholder="Enter a search for breeds, owners, vets, breeders, or locations">
                                            </div>
                                        </div>
                                    </div>
                                   
                                     <div class="form-group">
                                     	<center>
                                                <label for="searchInput">Search In:</label>
                                                <input type="Checkbox" id="all" name="all"><a>All</a></input>
                                                <input type="Checkbox" id="breed"><a>Breed</a></input>
                                                <input type="Checkbox" id="owner"><a>Owners</a></input>
                                                <input type="Checkbox" id="vet"><a>Vets</a></input>
                                                <input type="Checkbox" id="breeder"><a>Breeders</a></input>
                                                <input type="Checkbox" id="location"><a>Locations</a></input>
                                        </center>
                                     </div>
                                    <input type="submit" name="submit" class="btn btn-info btn-fill pull-right">Search</button>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<div>
    <?php
       if(isset($_POST['submit'])) {
          echo("search: " . $_POST['search'] . "<br />\n");
          echo("all: " . $_POST['all'] . "<br />\n");
          $servername = "localhost:3306";
          $username = "root";
            $password = "root";
            $dbname = "cs157a";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            // Check connection
            if ($conn->connect_error) {
                echo $conn->connect_error;
                die("Connection failed: " . $conn->connect_error);
            } else {
                $sql = "SELECT name, size, mixed FROM breed";
                if  ( $_POST['search'] != '' ) {
                    $sql .= " where name like '%". $_POST['search']. "%'";
                }
                echo $sql;
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // output data of each row
                    echo "<br>".$result->num_rows." result(s)";
                    while($row = $result->fetch_assoc()) {
                    echo "<br> name: ". $row["name"]. " - size: ". $row["size"]. " - mixed: ". $row["mixed"] . "<br>";
                }
                } else {
                    echo "0 results";
                }

            }

            $conn->close();

       }
    ?>
</div>   

        </div>

        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">

                </nav>
                <!- LEAVE THIS HERE BECAUSE OF THE TEMPLATE LICENSE, DO NOT DELETE! ->
                <p class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script> <a href="http://www.creative-tim.com">Creative Tim</a>, made with love for a better web
                </p>
            </div>
        </footer>

    </div>
</div>
 

</body>

    <!--   Core JS Files   -->
    <script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Checkbox, Radio & Switch Plugins -->
	<script src="assets/js/bootstrap-checkbox-radio-switch.js"></script>

	<!--  Charts Plugin -->
	<script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>


    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="assets/js/light-bootstrap-dashboard.js"></script>


</html>