<?php 
    require_once('../Controllers/Admin_Admin_List.php');
    session_start();
?>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>AdminSettings</title>
        <link rel="stylesheet" href="Admin_Settings.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" 
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==
        " crossorigin="anonymous" referrerpolicy="no-referrer" />
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    </head>
    <body>
        <div class="BackgroundImg"></div>
        <form method="get">
            <div>
                <button formaction="Admin_Dashboard.php" id="logo"></button> 
            </div> 
        </form>
        
        <form method="get">
            <div id="button_f">
            <button formaction="Admin_Dashboard.php" class="Other_button1" id="Dashboard"><i class="fa-solid fa-chart-column"></i>&nbsp;Dashboard</button><br><br>
            <button formaction="Admin_Passenger.php" class="Other_button" id="Passengers"><i class="fa-solid fa-person-walking-luggage"></i>&nbsp;Passengers</img></button><br><br>
            <button formaction="Admin_Restaurants.php" class="Other_button" id="Resturents"><i class="fa-solid fa-utensils"></i>&nbsp;Restaurants</button><br><br>
            <button formaction="Admin_Stores.php" class="Other_button" id="Stores"><i class="fa-solid fa-store"></i>&nbsp;Stores</button><br><br>
            <button formaction="Admin_Employees.php" class="Other_button" id="Employees"><i class="fa-solid fa-user-tie"></i>&nbsp;Employees</button><br><br>
            <button formaction="Admin_Service_Provider.php" class="Other_button" id="Service_Provider"><i class="fa-solid fa-user-gear"></i>Service Provider</button><br><br>
            <button formaction="Admin_Airlines.php" class="Other_button" id="Airlines"><i class="fa-solid fa-plane-departure"></i>&nbsp;Airlines</button><br><br>
            <button formaction="Admin_Settings.php" id="Settings"><i class="fa-solid fa-gear"></i>&nbsp;Settings</button><br><br>
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
            <!--Content Name-->
            <div id="content_Name"><p>Settings</p></div>
            <!--Content Form-->
            <div id="content_f"></div>
        </form>
    </form>
    <div class="datetime">
        <div class="time"></div>
        <div class="date"></div>
        <script type="text/javascript" src="clock.js" defer></script>  
    </div>
                    <!--Form Inside-->
    <div class="Form1">
        <fieldset class="Profile_F">
            <legend id="Profile_L"><h2>Profile</h2></legend>
        </fieldset>
        <form id="Contents" method="post" action="../Controllers/Admin_Admin_List.php">
                <?php
                while($r = mysqli_fetch_assoc($List)){ 
                ?>
                <div id="Image"> <?php echo "<img src='data:;base64,
                ".base64_encode($r["Admin_Image"])."' alt='image' style='width: 10vw'>" ?> </div>
                <div id="Id"> Id: <?php echo $r["Admin_Id"] ?> </div>
                <div id="Name"> Name: <?php echo $r["Admin_Name"] ?> </div>
                <div  id="Address">Address: <?php echo $r["Admin_Address"] ?></div>
                <div  id="Mobile">Mobile: <?php echo $r["Admin_Mobile"] ?> </div>
                <div  id="Email">Email: <?php echo $r["Admin_Email"] ?> </div>
                <div  id="Salary">Salary: <?php echo $r["Admin_Salary"] ?> $ </div>   
                <?php
                }
                ?> 
        </form> 
        <div id="Change_Info"><i> Change Info</i></div>
        <div id="Line"></div>
        <form method="post" enctype="multipart/form-data" action="../Controllers/Admin_Admin_Update.php" >
            <div id="Update">
            <p id="label1">Name: </p><input type="text" id="Name" name="Name"><br>
            <p id="label2">Password: </p><input type="password" id="Password" name="Password"><br>
            <p id="label2">Address: </p><p id="lebel"><input type="text" id="Address" name="Address"><br>
            <p id="label2">Mobile: </p><input type="number" id="Mobile" name="Mobile"><br>
            <p id="label2">Email: </p><input type="email" id="Email" name="Email"><br>
            <p id="label2">Image: </p><input type="file" id="Image" name="Image"><br>
            <button type="submit" id="UpdateB"><i class="fa-solid fa-arrow-up-from-bracket"></i> Update</button>
            <?php
            //Pop Up Code--------------------------------------------------------------
            if(!empty($_SESSION['Ad_Update1']))
            { 
            ?>
                <script>swal("Success!", "Admin Updated.", "success");</script>
                <?php unset($_SESSION['Ad_Update1']) ?>
                
            <?php
            }
            else if(!empty($_SESSION['Ad_Update2']))
            { 
            ?>
                <script>swal("Failed!", "Please, fill the box correctly.", "error");</script>
                <?php unset($_SESSION['Ad_Update2']) ?>
            <?php
            }
            ?>
            </div>
        </form>     
    </div>
    <div class="Form2 ">
        <fieldset id="Options_F">
            <legend id="Options_L"><h2>Options</h2></legend> 
            <div id="Notification">
                <label id="Name">Notification</label>
                <input type="checkbox" id="toggle-btn-1">
                <label id="toggle-btn-1L" for="toggle-btn-1"></label>
            </div>    
            <br>
            <div id="DarkMode">
                <label id="Name">Dark Mode</label>
                <input type="checkbox" id="toggle-btn-2">
                <label id="toggle-btn-2L" for="toggle-btn-2"></label>
            </div>     
        </fieldset>
    </div>
    </body>
</html>