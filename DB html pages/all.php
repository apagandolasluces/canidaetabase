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
            <CENTER>
            <p>
                Team Members:<br/>
                Phillip Rognerud<br/>
                Nicholas Lacroix<br/>
                Tyler Laskey<br/>
                Jeff Shin<br/>
            </p>
            <a href="index.php">Back HomePage</a><br/></CENTER>
        
        </div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand pull-left" href="index.php"><b>Home</b></a>
                    <a class="navbar-brand">A database for all Canid lovers</a>
                </div>
            </div>
        </nav>


        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8" style="width: 100%;">
                        <div class="card"
                        style="
                            height: 500px; 
                            overflow-x: scroll; 
                            overflow-y: scroll;">
                            <div class="header">
                                <h4 class="title">Search Results</h4>
                            </div>
                            <div class="content">
                                <?php
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
                $sql = "SELECT name, size, mixed, isDomestic, isExtinct,  genus, continentOrigin, yearDiscovered FROM breed";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    // output data of each row
                    echo "<div><b>Breed: ".$result->num_rows." result(s)</b></div>";
                    echo '<table class="table table-hover table-striped table-sortable">';
                    echo '<thead><tr>';
                    echo '</tr></thead>';
                    echo '<th>#</th><th>Name</th><th>Size</th><th>Mixed</th>';
                    echo '<th>isDomestic</th>';
                    echo '<th>isExtinct</th>';
                    echo '<th>genus</th>';
                    echo '<th>continentOrigin</th>';
                    echo '<th>yearDiscovered</th>';
                    echo '<tbody>';
                    $count = 0;
                    while($row = $result->fetch_assoc()) {
                        $count++;
                        echo '<tr>';
                        echo "<td>". $count. "</td>";
                        echo "<td>". $row["name"]. "</td>";
                        echo "<td>". $row["size"]. "</td>";
                        echo "<td>". $row["mixed"]. "</td>";
                        echo "<td>". $row["isDomestic"]. "</td>";
                        echo "<td>". $row["isExtinct"]. "</td>";
                        echo "<td>". $row["genus"]. "</td>";
                        echo "<td>". $row["continentOrigin"]. "</td>";
                        echo "<td>". $row["yearDiscovered"]. "</td>";
                        echo '</tr>';
                    }    
                    echo '</tbody>';
                    echo '</table>';

                } else {
                    echo "0 results";
                }

               
                $sql = "SELECT ssn, firstName, lastName, city, phone FROM owner";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    // output data of each row
                    echo "<div><b>Owner: ".$result->num_rows." result(s)</b></div>";
                    echo '<table class="table table-hover table-striped table-sortable">';
                    echo '<thead><tr>';
                    echo '</tr></thead>';
                    echo '<th>#</th><th>ssn</th><th>firstName</th><th>lastName</th>';
                    echo '<th>city</th><th>phone</th>';
                    echo '<tbody>';
                    $count = 0;
                    while($row = $result->fetch_assoc()) {
                        $count++;
                        echo '<tr>';
                        echo "<td>". $count. "</td>";
                        echo "<td>". $row["ssn"]. "</td>";
                        echo "<td>". $row["firstName"]. "</td>";
                        echo "<td>". $row["lastName"]. "</td>";
                        echo "<td>". $row["city"]. "</td>";
                        echo "<td>". $row["phone"]. "</td>";
                        echo '</tr>';
                    }    
                    echo '</tbody>';
                    echo '</table>';
                } else {
                    echo "0 results";
                }


                $sql = "SELECT businessID, treatsDomestic, companyName, phone FROM vet";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    // output data of each row
                    echo "<div><b>Vets: ".$result->num_rows." result(s)</b></div>";
                    echo '<table class="table table-hover table-striped table-sortable">';
                    echo '<thead><tr>';
                    echo '</tr></thead>';
                    echo '<th>#</th><th>businessID</th><th>treatsDomestic</th><th>companyName</th>';
                    echo '<th>phone</th>';
                    echo '<tbody>';
                    $count = 0;
                    while($row = $result->fetch_assoc()) {
                        $count++;
                        echo '<tr>';
                        echo "<td>". $count. "</td>";
                        echo "<td>". $row["businessID"]. "</td>";
                        echo "<td>". $row["treatsDomestic"]. "</td>";
                        echo "<td>". $row["companyName"]. "</td>";                        
                        echo "<td>". $row["phone"]. "</td>";
                        echo '</tr>';
                    }    
                    echo '</tbody>';
                    echo '</table>';
                } else {
                    echo "0 results";
                }


                $sql = "SELECT businessID, companyName, phone FROM breeder";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    // output data of each row
                    echo "<div><b>Breeders: ".$result->num_rows." result(s)</b></div>";
                    echo '<table class="table table-hover table-striped table-sortable">';
                    echo '<thead><tr>';
                    echo '</tr></thead>';
                    echo '<th>#</th><th>businessID</th><th>companyName</th><th>phone</th>';                    
                    echo '<tbody>';
                    $count = 0;
                    while($row = $result->fetch_assoc()) {
                        $count++;
                        echo '<tr>';
                        echo "<td>". $count. "</td>";
                        echo "<td>". $row["businessID"]. "</td>";
                        echo "<td>". $row["companyName"]. "</td>";                                       
                        echo "<td>". $row["phone"]. "</td>";
                        echo '</tr>';
                    }    
                    echo '</tbody>';
                    echo '</table>';
                } else {
                    echo "0 results";
                }


                $sql = "SELECT zipcode, city, stateProvince, country FROM location";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    // output data of each row
                    echo "<div><b>Locations: ".$result->num_rows." result(s)</b></div>";
                    echo '<table class="table table-hover table-striped table-sortable">';
                    echo '<thead><tr>';
                    echo '</tr></thead>';
                    echo '<th>#</th><th>zipcode</th><th>city</th><th>stateProvince</th>';
                    echo '<th>country</th>';
                    echo '<tbody>';
                    $count = 0;
                    while($row = $result->fetch_assoc()) {
                        $count++;
                        echo '<tr>';
                        echo "<td>". $count. "</td>";
                        echo "<td>". $row["zipcode"]. "</td>";
                        echo "<td>". $row["city"]. "</td>";
                        echo "<td>". $row["stateProvince"]. "</td>";
                        echo "<td>". $row["country"]. "</td>";                                                
                        echo '</tr>';
                    }    
                    echo '</tbody>';
                    echo '</table>';
                } else {
                    echo "0 results";
                }


            }

            $conn->close();

            // ======= end of php =======
            ?>

                            </div>
                        </div>
                    </div>
                </div>
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