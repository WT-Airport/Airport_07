<?php
session_start();
?>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>AdminPassenger</title>
        <link rel="stylesheet" href="Admin_Passenger.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" 
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    </head>
    <body onload="initClock()">
        <div class="BackgroundImg"></div>
        <form method="get">
            <div>
                <button formaction="Admin_Dashboard.php" id="logo"></button> 
            </div> 
        </form>
        
        <form method="post">
            <div id="button_f">
            <button formaction="Admin_Dashboard.php" class="Other_button1" id="Dashboard"><i class="fa-solid fa-chart-column"></i>&nbsp;Dashboard</button><br><br>
            <button formaction="Admin_Passenger.php" id="Passengers"><i class="fa-solid fa-person-walking-luggage"></i>&nbsp;Passengers</img></button><br><br>
            <button formaction="Admin_Restaurants.php" class="Other_button" id="Resturents"><i class="fa-solid fa-utensils"></i>&nbsp;Restaurants</button><br><br>
            <button formaction="Admin_Stores.php" class="Other_button" id="Stores"><i class="fa-solid fa-store"></i>&nbsp;Stores</button><br><br>
            <button formaction="Admin_Employees.php" class="Other_button" id="Employees"><i class="fa-solid fa-user-tie"></i>&nbsp;Employees</button><br><br>
            <button formaction="Admin_Service_Provider.php" class="Other_button" id="Service_Provider"><i class="fa-solid fa-user-gear"></i>Service Provider</button><br><br>
            <button formaction="Admin_Airlines.php" class="Other_button" id="Airlines"><i class="fa-solid fa-plane-departure"></i>&nbsp;Airlines</button><br><br>
            <button formaction="Admin_Settings.php"class="Other_button" id="Settings"><i class="fa-solid fa-gear"></i>&nbsp;Settings</button><br><br>
            </div>
        </form>

        <div>
            <button id="Logout"></button>
        </div> 
        <form method="get">
            <!--Outbox-->
            <div id="outer_f"></div>            
            <!--Admin Name-->
            <p id="admin_Name">
            <?php 
            require_once('../Controllers/Admin_Name_Show.php');
            while($req = mysqli_fetch_assoc($name)){
                echo $req["Admin_Name"];
            }
            ?>
            </p>
            <!--Admin Photo-->
            <form method="post">
                <button formaction="Admin_Settings.php" id="admin_Photo">   
            </form>
            <?php 
            require_once('../Controllers/Admin_Image_Show.php');
            while($req = mysqli_fetch_assoc($Image)){
                echo "<img src='data:;base64,".base64_encode($req["Admin_Image"])."' alt='image' style='width: 3vw'>";
            }
            ?>
            </button>
            <div id="content_Name"><p>Passenger</p></div>
            <!--Content Form-->
            <div id="content_f"></div>
            <!--Time-Date-->
        </form>
        <div class="datetime">
            <div class="time"></div>
            <div class="date"></div>
            <script type="text/javascript" src="clock.js" defer></script>  
        </div> 

        <!-- Passenger LIST-->
        <div class="Contents">
            <div id="Contents1">
                <h2 id="H">List of the Passengers</h2>
                <!--Search box-->
                <div>           
                <input type="text" placeholder="Search..." id="search" onkeyup="filterTable()">
                <button type="button" id="search_i"><i class="fa-solid fa-magnifying-glass"></i></button>
                <script>
                function filterTable() {
                    var input, filter, table, tr, td, i, txtValue;
                    input = document.getElementById("search");
                    filter = input.value.toLowerCase();
                    table = document.getElementById("Table");
                    tr = table.getElementsByTagName("tr");

                    for (i = 1; i < tr.length; i++) { // start from 1 to skip the header row
                        tr[i].style.display = "none"; // hide the row initially
                        td = tr[i].getElementsByTagName("td");
                        for (var j = 0; j < td.length; j++) {
                            if (td[j]) {
                                txtValue = td[j].textContent || td[j].innerText;
                                if (txtValue.toLowerCase().indexOf(filter) > -1) {
                                    tr[i].style.display = ""; // show the row if a match is found
                                    break;
                                }
                            }
                        }
                    }
                }
                </script>
                </div> 
                <div id="Scrolable-Table">
                    <?php require_once('../Controllers/Admin_All_Pass_List.php');?>
                    <form method="post" action="../Controllers/Admin_All_Pass_List.php">
                    <table id="Table" border="1">
                    <tr id="TH">
                       <th>User</th>
                       <th>Email</th>
                       <th>Image</th>
                       <th>Mobile</th>
                       <th>Address</th>
                       <th>Points</th>
                       <th>Gender</th>
                       <th>Action</th>
                    </tr>
                    <?php
                    while($r = mysqli_fetch_assoc($List)){ 
                    ?>
                    <tr id="TD">
                    <td> <?php echo $r["user"] ?> </td>
                    <td> <?php echo $r["Email"] ?> </td>
                    <td> <?php echo "<img src='data:;base64,".base64_encode($r["img"])."' alt='image' style='width: 3vw'>" ?> </td>
                    <td> <?php echo $r["Mobile"] ?> </td>
                    <td> <?php echo $r["Address"] ?> </td>
                    <td> <?php echo $r["Points"] ?> </td>
                    <td> <?php echo $r["Gender"] ?> </td>
                    <td>
                    <form method="post" action="../Controllers/Admin_All_Pass_List.php">
                        <input type="hidden" name="user" value="<?php echo $r['user']; ?>">
                        <button type="submit" id="Delete" name="Delete">
                            <i class="fa-solid fa-trash"></i> Delete
                        </button>
                      </form></td>
                    </tr>
                    <?php 
                  } 
                  ?>
                    </table>
                </form>
              </div>
            </div>
    </body>
</html>
