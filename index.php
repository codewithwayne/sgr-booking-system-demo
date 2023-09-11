<?php
require_once 'dbconnection.inc.php';
session_start();

if (!isset($_SESSION['adminname'])) {
    header("Location: index.html");
}else{
  $filter = $_SESSION['adminname'];
  $query=mysqli_query($conn,"SELECT * FROM `users` WHERE `User_ID`='$filter'")or die(mysqli_error());
  $row=mysqli_fetch_array($query);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>SGR Online Booking System - Administrator Homepage</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content=" HTML " name="keywords">
    <meta content=" HTML " name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>
        <style type="text/css">
        
          table{
    align-items: center;
  }

   th, tr, td{
    padding: 10px 10px;
  }
    </style>

            <script type="text/javascript">
function printData()
{
   var divToPrint=document.getElementById("printTable");
   newWin= window.open("");
   newWin.document.write(divToPrint.outerHTML);
   newWin.print();
   newWin.close();
}

$('button').on('click',function(){
printData();
})  
</script>

            <script type="text/javascript">
function printData1()
{
   var divToPrint=document.getElementById("printTable1");
   newWin= window.open("");
   newWin.document.write(divToPrint.outerHTML);
   newWin.print();
   newWin.close();
}

$('button').on('click',function(){
printData1();
})  
</script>

            <script type="text/javascript">
function printData2()
{
   var divToPrint=document.getElementById("printTable2");
   newWin= window.open("");
   newWin.document.write(divToPrint.outerHTML);
   newWin.print();
   newWin.close();
}

$('button').on('click',function(){
printData2();
})  
</script>

            <script type="text/javascript">
function printData3()
{
   var divToPrint=document.getElementById("printTable3");
   newWin= window.open("");
   newWin.document.write(divToPrint.outerHTML);
   newWin.print();
   newWin.close();
}

$('button').on('click',function(){
printData3();
})  
</script>
<body>
    <!-- Topbar Start -->
    <div class="container-fluid bg-dark">
        <div class="row py-2 px-lg-5">
            <div class="col-lg-12 text-center text-lg-left mb-2 mb-lg-0">
                <div class="d-inline-flex align-items-center text-white">
                    <small><i class="fa fa-phone-alt mr-2"></i>+254 712 3456789</small>
                    <small class="px-3">|</small>
                    <small><i class="fa fa-envelope mr-2"></i>sgr_booking@gmail.com</small>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-lg-5">
            <a href="#" class="navbar-brand ml-lg-3">
                <h1 class="m-0 display-5 text-uppercase text-primary"><i class="fa fa-train mr-2"></i>SGR Online Booking </h1>
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between px-lg-3" id="navbarCollapse">
                <div class="navbar-nav m-auto py-0">
                    <a href="#" class="nav-item nav-link active">Home</a>
                    <a href="#dash" class="nav-item nav-link"><?php echo $row['User_Type']; ?> Dashboard</a>
                    <a href="#contact" class="nav-item nav-link">Contact</a>
                </div>
                <a href="logout.php" class="btn btn-primary py-2 px-4 d-none d-lg-block">Logout</a>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->


    <!-- Header Start -->
    <div class="jumbotron jumbotron-fluid mb-5">
        <div class="container text-center py-5">
            <h1 class="text-primary mb-4">Welcome <?php echo $row['User_Type']; ?>, <?php echo $row['Fullname']; ?>!</h1>
            <h1 class="text-white display-3 mb-5">Your Gateway to Convenient Railway Reservations</h1>
            <div class="mx-auto" style="width: 100%; max-width: 600px;">
            </div>
        </div>
    </div>
    <!-- Header End -->

<div id="dash">
    <!-- Database Start -->
    <div class="container-fluid pt-5">
        <div class="container">
            <div class="text-center pb-2">
                <h6 class="text-primary text-uppercase font-weight-bold">Database</h6>
                <h1 class="mb-4">List of Users</h1>
            </div>
            <div class="row pb-3">
                <div class="col-lg-12 col-md-6 text-center mb-5">
                                           <table id="printTable">
<tr style="text-align: left;
  padding: 8px;">
<th style="text-align: left;
  padding: 8px;">User ID</th>
<th style="text-align: left;
  padding: 8px;">Fullname</th>
  <th style="text-align: left;
  padding: 8px;">Email Address</th>
 <th style="text-align: left;
  padding: 8px;">Phone Number</th>
  <th style="text-align: left;
  padding: 8px;">User Type</th>
   <th style="text-align: left; padding: 8px;"></th>
</tr>

<?php
$conn = mysqli_connect("localhost", "root", "", "sgr");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT `User_ID`, `Fullname`, `Phone_Number`, `Email_Address`, `User_Type` FROM `users`";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
?>
<tr>
<td><?php echo($row["User_ID"]); ?></td>
<td><?php echo($row["Fullname"]); ?></td>
<td><?php echo($row["Email_Address"]); ?></td>
<td><?php echo($row["Phone_Number"]); ?></td>
<td><?php echo($row["User_Type"]); ?></td>
<td><button class="btn btn-primary py-3 px-5" onclick="return confirm('Are you sure that you want to delete this user?')?window.location.href='insertion.inc.php?action=deleteU&id=<?php echo($row["User_ID"]); ?>':true;" title='Delete User'>Delete</button></td>
</tr>
<?php
}
} else { echo "No results"; }
$conn->close();
?>

</table>
                    <a class="border-bottom text-decoration-none" onclick="printData();">Print</a>
                </div>
            </div>
        </div>
                <div class="container">
            <div class="text-center pb-2">
                <h1 class="mb-4">List of Trains</h1>
            </div>
            <div class="row pb-3">
                <div class="col-lg-12 col-md-6 text-center mb-5">
                                           <table id="printTable1">
<tr style="text-align: left;
  padding: 8px;">
<th style="text-align: left;
  padding: 8px;">Name</th>
  <th style="text-align: left;
  padding: 8px;">Description</th>
  <th style="text-align: left;
  padding: 8px;">Image</th>  
 <th style="text-align: left;
  padding: 8px;">Economy Seats</th>
  <th style="text-align: left;
  padding: 8px;">First Class Seats</th>
   <th style="text-align: left; padding: 8px;"></th>
</tr>

<?php
$conn = mysqli_connect("localhost", "root", "", "sgr");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT `Train_ID`, `Name`, `Econ_Seats`, `VIP_Seats`, `Image`, `Description` FROM `train`";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
?>
<tr>
<td><?php echo($row["Name"]); ?></td>
<td><?php echo($row["Description"]); ?></td>
<td><img src="img/<?php echo($row["Image"]); ?>" title="<?php echo($row["Name"]); ?>" style="width: 200px;"></td>
<td><?php echo($row["Econ_Seats"]); ?></td>
<td><?php echo($row["VIP_Seats"]); ?></td>

<td><button class="btn btn-primary py-3 px-5" onclick="return confirm('Are you sure that you want to delete this train?')?window.location.href='insertion.inc.php?action=deleteT&id=<?php echo($row["Train_ID"]); ?>':true;" title='Delete Train'>Delete</button></td>
</tr>
<?php
}
} else { echo "No results"; }
$conn->close();
?>

</table>
                    <a class="border-bottom text-decoration-none" onclick="printData1();">Print</a>
                </div>
            </div>
        </div>
                <div class="container">
            <div class="text-center pb-2">
                <h1 class="mb-4">List of Trips</h1>
            </div>
            <div class="row pb-3">
                <div class="col-lg-12 col-md-6 text-center mb-5">
                                           <table id="printTable2">
<tr style="text-align: left;
  padding: 8px;">
<th style="text-align: left;
  padding: 8px;">Trip ID</th>
<th style="text-align: left;
  padding: 8px;">Train</th>
  <th style="text-align: left;
  padding: 8px;">Trip</th>
 <th style="text-align: left;
  padding: 8px;">Date & Time</th>
  <th style="text-align: left;
  padding: 8px;">Price</th>
  <th style="text-align: left;
  padding: 8px;">Status</th>  
   <th style="text-align: left; padding: 8px;"></th>
   <th style="text-align: left; padding: 8px;"></th>   
</tr>

<?php
$conn = mysqli_connect("localhost", "root", "", "sgr");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT `trip`.`Trip_ID`, `train`.`Name`, `trip`.`Start_Location`, `trip`.`End_Location`, `trip`.`Start_Time`, `trip`.`End_Time`, `trip`.`Date`, `trip`.`Price`, `trip`.`Status` FROM `trip` JOIN `train` ON `trip`.`Train_ID` = `train`.`Train_ID`";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
?>
<tr>
<td><?php echo($row["Trip_ID"]); ?></td>
<td><?php echo($row["Name"]); ?></td>
<td><?php echo($row["Start_Location"]); ?> to <?php echo($row["End_Location"]); ?></td>
<td>On <?php echo($row["Date"]); ?> at <?php echo($row["Start_Time"]); ?> to <?php echo($row["End_Time"]); ?></td>
<td><?php echo($row["Price"]); ?></td>
<td><?php echo($row["Status"]); ?></td>
<td><button class="btn btn-primary py-3 px-5" onclick="return confirm('Are you sure that you want to delete this trip?')?window.location.href='insertion.inc.php?action=deleteT1&id=<?php echo($row["Trip_ID"]); ?>':true;" title='Delete Trip'>Delete</button></td>
<?php
if ($row["Status"] != "Completed") {
?>
<td><button class="btn btn-primary py-3 px-5" onclick="return confirm('Are you sure that you want to complete this trip?')?window.location.href='insertion.inc.php?action=completeT&id=<?php echo($row["Trip_ID"]); ?>&id1=<?php echo($row["Status"]); ?>':true;" title='Complete Trip'>Complete</button></td>
<?php
}else{

}?>
</tr>
<?php
}
} else { echo "No results"; }
$conn->close();
?>

</table>
                    <a class="border-bottom text-decoration-none" onclick="printData2();">Print</a>
                </div>
            </div>
        </div>
                <div class="container">
            <div class="text-center pb-2">
                <h1 class="mb-4">List of Bookings</h1>
            </div>
            <div class="row pb-3">
                <div class="col-lg-12 col-md-6 text-center mb-5">
                                           <table id="printTable3">
<tr style="text-align: left;
  padding: 8px;">
<th style="text-align: left;
  padding: 8px;">Booking ID</th>
<th style="text-align: left;
  padding: 8px;">Trip ID</th>  
<th style="text-align: left;
  padding: 8px;">Fullname</th>
  <th style="text-align: left;
  padding: 8px;">Payment Details</th>
 <th style="text-align: left;
  padding: 8px;">Seats</th>
  <th style="text-align: left;
  padding: 8px;">Status</th>
   <th style="text-align: left; padding: 8px;"></th>  
</tr>

<?php
$conn = mysqli_connect("localhost", "root", "", "sgr");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT `booking`.`Booking_ID`, `users`.`Fullname`, `booking`.`Trip_ID`, `booking`.`Payment_Details`, `booking`.`Econ_Seats`, `booking`.`VIP_Seats`, `booking`.`Status` FROM `booking` JOIN `users` ON `booking`.`User_ID` = `users`.`User_ID`";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
?>
<tr>
<td><?php echo($row["Booking_ID"]); ?></td>
<td><?php echo($row["Trip_ID"]); ?></td>
<td><?php echo($row["Fullname"]); ?></td>
<td><?php echo($row["Payment_Details"]); ?></td>
<?php
if ($row['Econ_Seats'] == "") {
?>
<td>First Class : <?php echo($row["VIP_Seats"]); ?></td>
<?php
}else if ($row['VIP_Seats'] == "") {
?>
<td>Economy : <?php echo($row["Econ_Seats"]); ?></td>
<?php
}else if ($row['Econ_Seats'] != "" && $row['VIP_Seats'] != "") {
?>
<td>First Class : <?php echo($row["VIP_Seats"]); ?> & Economy : <?php echo($row["Econ_Seats"]); ?></td>
<?php
}
?>
<td><?php echo($row["Status"]); ?></td>
<?php
if ($row["Status"] == "Completed") {
?>
<?php
}elseif ($row["Status"] != "Active") {
?>
<td><button class="btn btn-primary py-3 px-5" onclick="return confirm('Are you sure that you want to confirm payment for this booking?')?window.location.href='insertion.inc.php?action=confirmB&id=<?php echo($row["Booking_ID"]); ?>':true;" title='Confirm Payment'>Confirm</button></td>
<?php
}else{
}?>
</tr>
<?php
}
} else { echo "No results"; }
$conn->close();
?>

</table>
                    <a class="border-bottom text-decoration-none" onclick="printData3();">Print</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Database End -->

    <!--  My Module -->
    <div class="container-fluid bg-secondary my-5" id="start">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 py-5 py-lg-0">
                    <h6 class="text-primary text-uppercase font-weight-bold">Administrator Dashboard</h6>
                    <h1 class="mb-4">Add A Train</h1>
                    <div class="bg-primary py-5 px-4 px-sm-5">
                        <form class="py-5" action="insertion.inc.php" enctype="multipart/form-data" method="POST">
                            <div class="form-group">
                                <input type="text" class="form-control border-0 p-4" placeholder="Train Name" name="tname" required />
                            </div>
                            <div class="form-group">
                                <input type="number" class="form-control border-0 p-4" placeholder="Economy Seats" name="eseat" required />
                            </div>                            
                            <div class="form-group">
                                <input type="number" class="form-control border-0 p-4" placeholder="First Class Seats" name="vseat" required />
                            </div>
                                                        <div class="form-group">
                                                          <br>
                                                          <label>Train Image:</label>
                                                          <br>
                            <input type="file" class="form-control border-0 p-4" accept=".jpg, .png, .jpeg" name="image" required />
                            </div>  
                                                        <div class="form-group">
                            <textarea rows="3" type="text" class="form-control border-0 p-4" placeholder="Train Details" name="det" required></textarea>
                            </div>                            
                            <div>
                                <button class="btn btn-dark btn-block border-0 py-3" type="submit" name="addt">Add</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6">
                    <h1 class="mb-4">Add A Trip</h1>
                    <div class="bg-primary py-5 px-4 px-sm-5">
                        <form class="py-5" action="insertion.inc.php" method="POST">
                            <div class="form-group">
                                <input type="text" class="form-control border-0 p-4" placeholder="Start Location" name="sl" required />
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control border-0 p-4" placeholder="End Location" name="el" required />
                            </div>                            
                            <div class="form-group">
                                                                                        <br>
                                                          <label>Start Time:</label>
                                                          <br>
                                <input type="time" class="form-control border-0 p-4" placeholder="Start Time" name="st" required />
                            </div>
                            <div class="form-group">
                                                                                        <br>
                                                          <label>End Time:</label>
                                                          <br>
                                <input type="time" class="form-control border-0 p-4" placeholder="End Time" name="et" required />
                            </div>                            
                                                        <div class="form-group">
                                                                                                              <br>
                                                          <label>Date of Trip:</label>
                                                          <br>
                            <input type="date" min="<?php echo date('Y-m-d'); ?>" class="form-control border-0 p-4" placeholder="Date of Trip" name="date" required />
                            </div>  
                                                        <div class="form-group">
                            <input type="number" class="form-control border-0 p-4" placeholder="Price in kshs." name="price" required />
                            </div>  
                            <div class="form-group">
                                <select class="custom-select border-0 px-4" name="tid" required style="height: 47px;">
                                    <option selected disabled>Select A Train</option>
                                     <?php
                                      $con = mysqli_connect("localhost","root","","sgr");
                                      $sql = "SELECT * FROM `train`";
                                      $all_categories = mysqli_query($con,$sql);
                                      while ($category = mysqli_fetch_array(
                                              $all_categories,MYSQLI_ASSOC)):;
                                  ?>
                                  <option value="<?php echo $category["Train_ID"];?>"><?php echo $category["Name"];?></option>
                                  <?php
                                      endwhile;
                                  ?>
                                </select>
                            </div>
                            <div>
                                <button class="btn btn-dark btn-block border-0 py-3" type="submit" name="addt1">Add</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
                        <div class="row align-items-center">
                <div class="col-lg-6 py-5 py-lg-0">
                    <h1 class="mb-4">Update My Details</h1>
                    <div class="bg-primary py-5 px-4 px-sm-5">
                        <form class="py-5" action="insertion.inc.php" method="POST">
                            <div class="form-group">
                                <input type="text" class="form-control border-0 p-4" placeholder="Your Name" name="fname" required />
                                <input type="hidden" value="1" name="mod" required>
                                <input type="hidden" value="<?php echo $filter; ?>" name="uid" required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control border-0 p-4" placeholder="Your Phone Number" name="phone" required />
                            </div>                            
                            <div class="form-group">
                                <input type="email" class="form-control border-0 p-4" placeholder="Your Email" name="email" required />
                            </div>
                                                        <div class="form-group">
                            <input type="password" class="form-control border-0 p-4" placeholder="Your Password" name="password" required />
                            </div>  
                                                        <div class="form-group">
                            <input type="password" class="form-control border-0 p-4" placeholder="Confirm Your Password" name="cpassword" required />
                            </div>                            
                            <div>
                                <button class="btn btn-dark btn-block border-0 py-3" type="submit" name="upu">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6">
                    <h1 class="mb-4">Register A User</h1>
                    <div class="bg-primary py-5 px-4 px-sm-5">
                        <form class="py-5" action="insertion.inc.php" method="POST">
                            <div class="form-group">
                                <input type="text" class="form-control border-0 p-4" placeholder="Your Name" name="fname" required />
                                <input type="hidden" value="1" name="mod" required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control border-0 p-4" placeholder="Your Phone Number" name="phone" required />
                            </div>                            
                            <div class="form-group">
                                <input type="email" class="form-control border-0 p-4" placeholder="Your Email" name="email" required />
                            </div>
                                                        <div class="form-group">
                            <input type="password" class="form-control border-0 p-4" placeholder="Your Password" name="password" required />
                            </div>  
                                                        <div class="form-group">
                            <input type="password" class="form-control border-0 p-4" placeholder="Confirm Your Password" name="cpassword" required />
                            </div>  
                            <div class="form-group">
                                <select class="custom-select border-0 px-4" name="type" required style="height: 47px;">
                                    <option selected disabled>Select A User Type</option>
                                    <option value="Administrator">Administrator</option>
                                    <option value="User">User</option>
                                </select>
                            </div>
                            <div>
                                <button class="btn btn-dark btn-block border-0 py-3" type="submit" name="regu">Register</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- My Module -->
</div>


    


  


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Javascript -->
    <script src="js/main.js"></script>
</body>

</html>