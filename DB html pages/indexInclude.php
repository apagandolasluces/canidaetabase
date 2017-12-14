    <?php
            $servername = "localhost:3306";
            $username = "root";
            $password = "root";
            $dbname = "cs157a";
            $sql = "";
        
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            echo $conn->connect_error;
            die("Connection failed: " . $conn->connect_error);
        }    

        // from queryId (1-5)
        if (isset($_GET['queryId'])) {
            $queryId = $_GET['queryId'];
            if ($queryId == 1) {
                $sql = "SELECT * FROM `breed` WHERE breed.yearDiscovered < 1850";
            } else if ( $queryId == 2) {
                $sql = "SELECT size, COUNT(size) FROM breed GROUP BY size";
            } else if ( $queryId == 3) {
            	$sql = "SELECT size, yearDiscovered, COUNT(size) FROM breed GROUP BY size HAVING yearDiscovered <= 1850";
            } else if ( $queryId == 4) {
                //$sql = "SELECT DISTINCT size, COUNT(size) FROM breed GROUP BY size";
                $sql = "SELECT vet.businessID, companyName, zipcode FROM vet, vetlocation WHERE vet.businessID = vetlocation.businessID;";
            } else if ( $queryId == 5) {
                $sql = "SELECT a.city, b.firstName, b.lastName FROM location a INNER JOIN owner b on a.city = b.city";
            }       
            echo $sql;
            $result = $conn->query($sql);
            //var_dump($result);
            if (!empty($result) and $result->num_rows > 0) {
               
                // output data of each row
                if ($queryId == 1) {
                    echo "<div><b>Breed: ".$result->num_rows." result(s)</b></div>";                   
                    echo '<table class="table table-hover table-striped table-sortable">';
                    echo '<thead><tr>';                    
                    //find all the column names
                    $sql = "SHOW COLUMNS FROM breed";
                    $result2 = mysqli_query($conn,$sql);
                    echo '<th>#</th>';
                    $fields = array();
                    $count = 0;
                    //table header
                    while($row2 = mysqli_fetch_array($result2)){
                        echo "<th>".$row2['Field']."</th>";
                        $fields[$count++] = $row2['Field'];
                    }
                    echo '</tr></thead>';
                    echo '<tbody>';
                    $count = 0;
                    //table data
                    while($row = $result->fetch_assoc()) {
                        $count++;
                        echo '<tr>';
                        echo "<td>". $count. "</td>";
                        foreach ($fields as $f) { 
                            echo "<td>". $row[$f]. "</td>";
                        }
                        echo '</tr>';
                    }    
                    echo '</tbody>';
                    echo '</table>';
                } else if ( $queryId == 3) {
                    echo "<div><b>Breed Size, Year Summary: ".$result->num_rows." result(s)</b></div>";
                    echo '<table class="table table-hover table-striped table-sortable">';
                    echo '<thead><tr>';                    
                    echo '<th>#</th><th>Size</th><th>Year Discovered</th><th>Count</th>';
                    echo '</tr></thead>';
                    echo '<tbody>';
                    $count = 0;
                    while($row = $result->fetch_row()) {
                        $count++;
                        echo '<tr>';
                        echo "<td>". $count. "</td>";
                        echo "<td>". $row[0]. "</td>";
                        echo "<td>". $row[1]. "</td>";
                        echo "<td>". $row[2]. "</td>";
                        echo '</tr>';
                    }    
                    echo '</tbody>';
                    echo '</table>';

                } else if ( $queryId == 5) {
                    echo "<div><b>Select City, name: ".$result->num_rows." result(s)</b></div>";
                    echo '<table class="table table-hover table-striped table-sortable">';
                    echo '<thead><tr>';                    
                    echo '<th>#</th><th>City</th><th>First Name</th><th>Last Name</th>';
                    echo '</tr></thead>';
                    echo '<tbody>';
                    $count = 0;
                    while($row = $result->fetch_row()) {
                        $count++;
                        echo '<tr>';
                        echo "<td>". $count. "</td>";
                        echo "<td>". $row[0]. "</td>";
                        echo "<td>". $row[1]. "</td>";
                        echo "<td>". $row[2]. "</td>";
                        echo '</tr>';
                    }    
                    echo '</tbody>';
                    echo '</table>';

                } else if ( $queryId == 2) {
                    echo "<div><b>Breed Size Summary: ".$result->num_rows." result(s)</b></div>";
                    echo '<table class="table table-hover table-striped table-sortable">';
                    echo '<thead><tr>';                    
                    echo '<th>#</th><th>Size</th><th>Count</th>';
                    echo '</tr></thead>';
                    echo '<tbody>';
                    $count = 0;
                    while($row = $result->fetch_row()) {
                        $count++;
                        echo '<tr>';
                        echo "<td>". $count. "</td>";
                        echo "<td>". $row[0]. "</td>";
                        echo "<td>". $row[1]. "</td>";
                        echo '</tr>';
                    }    
                    echo '</tbody>';
                    echo '</table>';            
                
                 
                } else if ( $queryId == 4) {
                    // output data of each row
                    echo "<div><b>Vet match with location by businessID: ".$result->num_rows." result(s)</b></div>";
                    echo '<table class="table table-hover table-striped table-sortable">';
                    echo '<thead><tr>';                    
                    echo '<th>#</th><th>businessID</th><th>companyName</th><th>zipcode</th>';
                    echo '</tr></thead>';
                    echo '<tbody>';
                    $count = 0;
                    while($row = $result->fetch_assoc()) {
                        $count++;
                        echo '<tr>';
                        echo "<td>". $count. "</td>";
                        echo "<td>". $row["businessID"]. "</td>";
                        echo "<td>". $row["companyName"]. "</td>";                    
                        echo "<td>". $row["zipcode"]. "</td>";
                        echo '</tr>';
                    }    
                    echo '</tbody>';
                    echo '</table>';
                }  
            } else {
                echo "<br>0 results";
            }

        }
        if(isset($_POST['submit'])) {
            $search = $_POST['search'];
            echo "<div><b>Search Word: ".$search."</b></div>";

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
                    echo '<th>#</th><th>Name</th><th>Size</th><th>Mixed</th>';
                    echo '<th>isDomestic</th>';
                    echo '<th>isExtinct</th>';
                    echo '<th>genus</th>';
                    echo '<th>continentOrigin</th>';
                    echo '<th>yearDiscovered</th>';
                    echo '</tr></thead>';
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
                    echo '<th>#</th><th>ssn</th><th>firstName</th><th>lastName</th>';
                    echo '<th>city</th><th>phone</th>';
                    echo '</tr></thead>';
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
                    echo '<th>#</th><th>businessID</th><th>treatsDomestic</th><th>companyName</th>';
                    echo '<th>phone</th>';
                    echo '</tr></thead>';
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
                    echo '<th>#</th><th>businessID</th><th>companyName</th><th>phone</th>';                    
                    echo '</tr></thead>';
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
                    echo '<th>#</th><th>zipcode</th><th>city</th><th>stateProvince</th>';
                    echo '<th>country</th>';
                    echo '</tr></thead>';
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
    // ======= end of php =======
    ?>

