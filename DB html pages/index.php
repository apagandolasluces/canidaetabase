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
            </div><CENTER>
            <p>
            	Team Members:<br/>
            	Phillip Rognerud<br/>
				Nicholas Lacroix<br/>
				Tyler Laskey<br/>
				Jeff Shin<br/>
            </p></CENTER>
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
                	<div class="col-md-8" style="width: 25%;">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Search Specific Data</h4>
                            </div>
                            <div class="content">
                            
                                   
                                     <div>
                                     	<center>
                                                <a href="all.php">All</a><br/>
                                                <a href="breed.php">Breed</a><br/>
                                                <a href="owners.php">Owners</a><br/>
                                                <a href="vets.php">Vets</a><br/>
                                                <a href="breeders.php">Breeders</a><br/>
                                                <a href="locations.php">Locations</a>
                                        </center>
                                     </div>
                        
                                    <div class="clearfix"></div>
                             
                           
                            </div>
                        </div>
                    </div>

                    <div class="col-md-8" style="width: 25%;">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Select an SQL Query</h4>
                            </div>
                            <div class="content">
                                    <div class="row">
                                    	<p><center>
                                    		<a href="" id="query1">Query1:</a>
                                    		<php?>query 1 script here</php?><br/>
                                    		<a href="" id="query2">Query2:</a>
                                    		<php?>query 2 script here</php?><br/>
                                    		<a href="" id="query3">Query3:</a>
                                    		<php?>query 3 script here</php?><br/>
                                    		<a href="" id="query4">Query4:</a>
                                    		<php?>query 4 script here</php?><br/>
                                    		<a href="" id="query5">Query5:</a>
                                    		<php?>query 5 script here</php?><br/>
                                    	</center>
                                    	</p>
                                    <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>

                    <div class="col-md-8" style="width: 25%;">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Enter your query here</h4>
                            </div>
                            <div class="content">
                                <form action="index.php" method="post">
                                    <div class="row">
                                        <div class="col-md-4" style="width: 100%;">
                                            <div class="form-group">
                                                <label for="searchInput"></label>
                                                <input type="search" name='search' class="form-control" placeholder="Enter your own SQL query to perform a search">
                                            </div>
                                        </div>
                                    </div>
                                     <input type="submit" name="submit" value="Search" class="btn btn-info btn-fill pull-left"/>
                                    <button type="reset" class="btn btn-info btn-fill pull-right" style="padding-left: 15px;" onclick="clearQuery()">Clear</button>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>

           <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card" 
                        	style="width: 113%; 
                    		height: 500px; 
                    		overflow-x: scroll; 
                    		overflow-y: scroll;">
                            <div class="header">
                                <h4 class="title">Search Results</h4>
                            </div>
                            <div class="content">
    <?php
        if(isset($_POST['submit'])) {
            $servername = "localhost:3306";
            $username = "root";
            $password = "root";
            $dbname = "cs157a";

            $search = $_POST['search'];
            echo "<div><b>Search Word: ".$search."</b></div>";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            // Check connection
            if ($conn->connect_error) {
                echo $conn->connect_error;
                die("Connection failed: " . $conn->connect_error);
            } else {
                //echo "<div><b>Search Word: ".$search."</b></div>";
                $sql = "SELECT name, size, mixed, isDomestic, isExtinct, genus, continentOrigin, yearDiscovered FROM breed";
                if  ( $search != '' ) {
                    $sql .= " where name like '%". $search. "%'";
                    $sql .= " or size like '%". $search. "%'";
                    $sql .= " or mixed like '%". $search. "%'";
                    $sql .= " or genus like '%". $search. "%'";
                    $sql .= " or continentOrigin like '%". $search. "%'";
                    if ( is_numeric($search) ) {
                        $sql .= " or yearDiscovered = ". $search;
                    }                    
                }
                //echo $sql;
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
                    //echo "0 results";
                }

                //echo "<div><b>Search Word: ".$search."</b></div>";
                $sql = "SELECT ssn, firstName, lastName, city, phone FROM owner";                
                if  ( $search != '' ) {
                    $sql .= " where ssn like '%". $search. "%'";
                    $sql .= " or firstName like '%". $search. "%'";
                    $sql .= " or lastName like '%". $search. "%'";
                    $sql .= " or city like '%". $search. "%'";                    
                    if ( is_numeric($search) ) {
                        $sql .= " or phone = ". $search;
                    }  
                }
                //echo $sql;
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
                    //echo "0 results";
                }

                //echo "<div><b>Search Word: ".$search."</b></div>";
                $sql = "SELECT businessID, treatsDomestic, companyName, phone FROM vet";
                if  ( $search != '' ) {
                    $sql .= " where businessID like '%". $search. "%'";
                    $sql .= " or companyName like '%". $search. "%'";                   
                    if ( is_numeric($search) ) {
                        $sql .= " or phone = ". $search;
                    } 
                }
                //echo $sql;
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
                   // echo "0 results";
                }

                //echo "<div><b>Search Word: ".$search."</b></div>";
                $sql = "SELECT businessID, companyName, phone FROM breeder";
                if  ( $search != '' ) {
                    $sql .= " where businessID like '%". $search. "%'";
                    $sql .= " or companyName like '%". $search. "%'";                   
                    if ( is_numeric($search) ) {
                        $sql .= " or phone = ". $search;
                    } 
                }
                //echo $sql;
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
                    //echo "0 results";
                }

                //echo "<div><b>Search Word: ".$search."</b></div>";
                $sql = "SELECT zipcode, city, stateProvince, country FROM location";
                if  ( $search != '' ) {
                    $sql .= " where zipcode like '%". $search. "%'";
                    $sql .= " or city like '%". $search. "%'";
                    $sql .= " or stateProvince like '%". $search. "%'";
                    $sql .= " or country like '%". $search. "%'";   
                }
                //echo $sql;
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
                    //echo "0 results";
                }


            }

            $conn->close();
        }    
    // ======= end of php =======
    ?>

                            </div>
                        </div>
                    </div>
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

	<script type="text/javascript">
    	function clearQuery()
    	{
        	document.getElementByID('query').value="";
        };
	</script>

</html>