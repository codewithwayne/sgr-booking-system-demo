<?php 

session_start();

//Register User
if (isset($_POST['regu'])) {
 $fname = $_POST['fname'];
 $email = $_POST['email'];
 $mod = $_POST['mod'];
 $type = $_POST['type'];
 $phone = $_POST['phone']; 
 $password = $_POST['password'];
 $passwordconfirm = $_POST['cpassword'];

 require_once 'dbconnection.inc.php';

 if ($password == $passwordconfirm) {
  if($mod == 0){
   $sql = "INSERT INTO `users`(`Fullname`, `Email_Address`, `Phone_Number`, `Password`, `User_Type`) VALUES ('$fname','$email','$phone',md5('$password'),'User')";
     mysqli_query($conn, $sql);
  header("Location: index.html?userregistration=success");
 }else if($mod == 1){
   $sql = "INSERT INTO `users`(`Fullname`, `Email_Address`, `Phone_Number`, `Password`, `User_Type`) VALUES ('$fname','$email','$phone',md5('$password'),'$type')";
     mysqli_query($conn, $sql);
  header("Location: index.php?userregistration=success");
 }
}else{
  echo "Passwords do not match.";
 }
}

//Update User
if (isset($_POST['upu'])) {
 $fname = $_POST['fname'];
 $email = $_POST['email'];
 $uid = $_POST['uid'];
 $phone = $_POST['phone'];
 $password = $_POST['password'];
 $passwordconfirm = $_POST['cpassword'];

 require_once 'dbconnection.inc.php';

 if ($password == $passwordconfirm) {
  if ($mod == 1) {
  $sql = "UPDATE `users` SET `Fullname`='$fname',`Email_Address`='$email',`Phone_Number`='$phone',`Password`=md5('$password') WHERE `User_ID`='$uid'";
     mysqli_query($conn, $sql);
  header("Location: index.php?updateadministrator=success");
  }else if ($mod == 2) {
  $sql = "UPDATE `users` SET `Fullname`='$fname',`Email_Address`='$email',`Phone_Number`='$phone',`Password`=md5('$password') WHERE `User_ID`='$uid'";
     mysqli_query($conn, $sql);
  header("Location: index1.php?updateuser=success");
  }
 }else{
  echo "Passwords do not match.";
 }
}

//Add A Train
if (isset($_POST['addt'])) {
 $uid = $_SESSION['adminname'];
 $tname = $_POST['tname'];
 $det = $_POST['det'];
 $vseat = $_POST['vseat'];
 $eseat = $_POST['eseat']; 

 require_once 'dbconnection.inc.php';

$filename = $_FILES['image']['name'];
$valid_extensions = array("jpg","jpeg","png");
$extension = pathinfo($filename, PATHINFO_EXTENSION);
if(in_array(strtolower($extension),$valid_extensions) ) {
move_uploaded_file($_FILES['image']['tmp_name'], "img/".$filename);

  $sql = "INSERT INTO `train`(`Name`, `Econ_Seats`, `VIP_Seats`, `Image`, `Description`) VALUES ('$tname','$eseat','$vseat','$filename','$det')";
     mysqli_query($conn, $sql);
  header("Location: index.php?addtrain=success");
    }else{
    echo "<script>alert('Error Processing Image, kindly try again!');</script>";
 }
}

//Add A Trip
if (isset($_POST['addt1'])) {
 $tid = $_POST['tid'];
 $sl = $_POST['sl'];
 $el = $_POST['el'];
 $st = $_POST['st'];
 $et = $_POST['et']; 
 $date = $_POST['date']; 
 $price = $_POST['price'];  

 require_once 'dbconnection.inc.php';

  $sql = "INSERT INTO `trip`(`Train_ID`, `Start_Location`, `End_Location`, `Start_Time`, `End_Time`, `Date`, `Price`) VALUES ('$tid','$sl','$el','$st','$et','$date','$price kshs.')";
     mysqli_query($conn, $sql);
  header("Location: index.php?addtrip=success");
}

//Book A Trip
if (isset($_POST['bookt'])) {
 $uid = $_SESSION['username'];
 $tid = $_POST['tid'];
 $result_explode = explode(",", $tid);
 $tri = $result_explode[0];
 $tra = $result_explode[1];
 $pri = $result_explode[2];    
 $eset = $_POST['eset'];
 $vset = $_POST['vset'];  
 $price = ($pri * $eset) + ($pri * $vset);   
 $pay = $price . " at " . $_POST['mean'] . " via " . $_POST['conf'];   


 require_once 'dbconnection.inc.php';

 if ($eset == "" && $vset == "") {
     echo "<script>alert('Kindly select at least one seat!');</script>";
 }else{
  $sql = "INSERT INTO `booking`(`User_ID`, `Trip_ID`, `Train_ID`, `Payment_Details`, `Econ_Seats`, `VIP_Seats`) VALUES ('$uid','$tri','$tra','$pay','$eset','$vset')";
     mysqli_query($conn, $sql);
       $sql1 = "UPDATE `trip` SET `Econ` = `Econ` + '$eset', `VIP` = `VIP` + '$vset' WHERE `Trip_ID` = '$tri'";
     mysqli_query($conn, $sql1);
  header("Location: index1.php?booktrip=success");
}
}

//Delete Functions

        if($_REQUEST['action'] == 'deleteU' && !empty($_REQUEST['id'])){ 
        require_once 'dbconnection.inc.php';
        $deleteItem = $_REQUEST['id'];
        $sql = "DELETE FROM `users` WHERE `User_ID` = '$deleteItem'";
        mysqli_query($conn, $sql); 
        header("Location: index.php?deleteuser=success");
        }

        if($_REQUEST['action'] == 'deleteT' && !empty($_REQUEST['id'])){ 
        require_once 'dbconnection.inc.php';
        $deleteItem = $_REQUEST['id'];
        $sql = "DELETE FROM `train` WHERE `Train_ID` = '$deleteItem'";
        mysqli_query($conn, $sql); 
        header("Location: index.php?deletetrain=success");
        }

        if($_REQUEST['action'] == 'deleteT1' && !empty($_REQUEST['id'])){ 
        require_once 'dbconnection.inc.php';
        $deleteItem = $_REQUEST['id'];
        $sql = "DELETE FROM `trip` WHERE `Trip_ID` = '$deleteItem'";
        mysqli_query($conn, $sql); 
        header("Location: index.php?deletetrip=success");
        }

        if($_REQUEST['action'] == 'deleteB' && !empty($_REQUEST['id']) && !empty($_REQUEST['id1']) && !empty($_REQUEST['id2']) && !empty($_REQUEST['id3'])){ 
        require_once 'dbconnection.inc.php';
        $deleteItem = $_REQUEST['id'];
        $eset = $_REQUEST['id1'];
        $vset = $_REQUEST['id2'];
        $tri = $_REQUEST['id3'];                        
        $sql = "DELETE FROM `booking` WHERE `Booking_ID` = '$deleteItem'";
        mysqli_query($conn, $sql); 
        $sql1 = "UPDATE `trip` SET `Econ` = `Econ` - '$eset', `VIP` = `VIP` - '$vset' WHERE `Trip_ID` = '$tri'";
        mysqli_query($conn, $sql1);
        header("Location: index1.php?deletebooking=success");
        }

//Update Functions
        if($_REQUEST['action'] == 'completeT' && !empty($_REQUEST['id'])  && !empty($_REQUEST['id1'])){ 
        require_once 'dbconnection.inc.php';
        $updateItem = $_REQUEST['id'];
        $stat = $_REQUEST['id1'];
        if ($stat != "Completed") {       
        $sql = "UPDATE `trip` SET `Status` = 'Completed' WHERE `Trip_ID` = '$updateItem'";
        mysqli_query($conn, $sql); 
        $sql1 = "UPDATE `booking` SET `Status` = 'Completed' WHERE `Trip_ID` = '$updateItem'";
        mysqli_query($conn, $sql1);         
        header("Location: index.php?completeTrip&Booking=success");
        }else{
            echo "<script>alert('Trip has already been completed!');</script>";
        }   
        } 

                if($_REQUEST['action'] == 'confirmB' && !empty($_REQUEST['id'])){ 
        require_once 'dbconnection.inc.php';
        $updateItem = $_REQUEST['id'];
        $sql = "UPDATE `booking` SET `Status` = 'Active' WHERE `Booking_ID` = '$updateItem'";
        mysqli_query($conn, $sql); 
        header("Location: index.php?confirmbookingpayment=success");
        }  

?>