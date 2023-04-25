<?php 

//Register Administrator
if (isset($_POST['rega'])) {
 $fname = $_POST['fname'];
 $email = $_POST['email'];
 $password = $_POST['password'];
 $passwordconfirm = $_POST['cpassword'];

 require_once 'dbconnection.inc.php';

 if ($password == $passwordconfirm) {

   $sql = "INSERT INTO `admin`(`Fullname`, `Email_Address`, `Password`) VALUES ('$fname','$email',md5('$password'))";
     mysqli_query($conn, $sql);
   // var_dump($sql);
   // die();
  header("Location: index1.php?administratorregistration=success");
 }else{
  echo "Passwords do not match.";
 }
}

//Register Chauffeur
if (isset($_POST['regc1'])) {
 $fname = $_POST['fname'];
 $email = $_POST['email'];

 require_once 'dbconnection.inc.php';

   $sql = "INSERT INTO `chauffeur`(`Name`, `Email_Address`) VALUES ('$fname','$email')";
     mysqli_query($conn, $sql);
   // var_dump($sql);
   // die();
  header("Location: index1.php?chauffeurregistration=success");
}

//Register Customer
if (isset($_POST['regc'])) {
 $fname = $_POST['fname'];
 $email = $_POST['email'];
 $phone = $_POST['phone'];
 $password = $_POST['password'];
 $passwordconfirm = $_POST['cpassword'];

 require_once 'dbconnection.inc.php';

 if ($password == $passwordconfirm) {

  if ($_FILES["image"]["error"] === 4) {
   echo "<script> alert('Image does not exist!'); </script>";
  }else{
  $uploads_dir = 'images';
  $fileName = $_FILES["image"]["name"];
  $fileSize = $_FILES["image"]["size"];
  $tmpName = $_FILES["image"]["tmp_name"];

  $validImageExtension = ['jpg', 'jpeg', 'png'];
  $imageExtension = explode('.', $fileName);
  $imageExtension = strtolower(end($imageExtension));

  if (!in_array($imageExtension, $validImageExtension)) {
    echo "<script> alert('Invalid Image Format!'); </script>";
  }else if($fileSize > 10000000){
    echo "<script> alert('Image is too large!'); </script>";
  }else{

    $newImgName = uniqid();
    $newImgName .= '.' . $imageExtension;

    move_uploaded_file($tmpName, "$uploads_dir/$newImgName");

   $sql = "INSERT INTO `customers`(`Fullname`, `Email_Address`, `Phone_Number`, `Image`, `Password`) VALUES ('$fname','$email','$phone','$newImgName',md5('$password'))";
     mysqli_query($conn, $sql);
   // var_dump($sql);
   // die();
  header("Location: index.php?customerregistration=success");
 }
}
}else{
  echo "Passwords do not match.";
 }
}


//Order Auto (Customer)
if (isset($_POST['order'])) {
 $cid = $_POST['cid'];
 $car = $_POST['car'];
 $quan = $_POST['quan'];      
 $lat = $_POST['lat'];
 $long = $_POST['long'];
 $chid = $_POST['chid'];

 require_once 'dbconnection.inc.php';

   $sql = "SELECT * FROM `cars` WHERE `Car_ID`='$car'";

        $query = mysqli_query($conn,$sql);

        if(mysqli_num_rows($query) > 0){
            $row = mysqli_fetch_assoc($query);
            $price = $row['Purchase_Price'];
            $cprice = $quan * $price;
            $quan1 = $row['Quantity'];

            $quan2 = $quan1 - $quan;

            if ($quan2 > 0 ) {

   $sql = "INSERT INTO `orders`(`Customer_ID`, `Car_ID`, `Date_Time`, `Price`, `Quantity`, `Status`) VALUES ('$cid','$car',NOW(),'$cprice','$quan','Pending')";
     mysqli_query($conn, $sql);
    $sql2 = "UPDATE `cars` SET `Quantity`='$quan2' WHERE `Car_ID`='$car'";
     mysqli_query($conn, $sql2);  

   $sql3 = "INSERT INTO `pickup`(`Customer_ID`,`Chauffeur_ID`, `Car_ID`, `Long`, `Lat`) VALUES ('$cid','$chid','$car','$long','$lat')";
     mysqli_query($conn, $sql3); 
    // var_dump($sql);
   // die();
  header("Location: index2.php?ordercar=success");
 }else{
      echo "Cannot process order due to not enough quantity of requested car. Kindly try again later.";
 }
}
 else{
  echo "Car not found, kindly try with existing Car ID.";
 }
}

//Rent Auto (Customer)
if (isset($_POST['rent'])) {
 $cid = $_POST['cid'];
 $car = $_POST['car'];
 $quan = $_POST['quan'];      
 $lat = $_POST['lat'];
 $long = $_POST['long'];
 $chid = $_POST['chid'];
 $months = $_POST['month'];

 $date = date("Y-m-d", strtotime('+'.$months.'months'));
 // $date = date("Y-m-d h:i:sa", $d);

 require_once 'dbconnection.inc.php';

   $sql = "SELECT * FROM `cars` WHERE `Car_ID`='$car'";

        $query = mysqli_query($conn,$sql);

        if(mysqli_num_rows($query) > 0){
            $row = mysqli_fetch_assoc($query);
            $price = $row['Rent_Price'];
            $cprice = $price * $months;
            $tprice = $quan * $cprice;
            $quan1 = $row['Quantity'];

            $quan2 = $quan1 - $quan;

            if ($quan2 > 0 ) {

   $sql = "INSERT INTO `rent`(`Customer_ID`, `Car_ID`, `Total_Price`, `Start_Date`, `End_Date`, `Number_of_Months`, `Quantity`, `Status`) VALUES ('$cid','$car','$tprice',NOW(),'$date','$months','$quan','Pending')";
     mysqli_query($conn, $sql);
    $sql2 = "UPDATE `cars` SET `Quantity`='$quan2' WHERE `Car_ID`='$car'";
     mysqli_query($conn, $sql2);  

   $sql3 = "INSERT INTO `pickup`(`Customer_ID`,`Chauffeur_ID`, `Car_ID`, `Long`, `Lat`) VALUES ('$cid','$chid','$car','$long','$lat')";
     mysqli_query($conn, $sql3); 
    // var_dump($sql);
   // die();
  header("Location: index2.php?rentcar=success");
 }else{
      echo "Cannot process order due to not enough quantity of requested car. Kindly try again later.";
 }
}
 else{
  echo "Car not found, kindly try with existing Car ID.";
 }
}

//Add An Auto
if (isset($_POST['addc'])) {
 $model = $_POST['model'];
 $quan = $_POST['quan'];
 $price = $_POST['price'];
 $rprice = $_POST['rprice'];
 $desc = $_POST['desc'];
 $cat = $_POST['cat'];

 require_once 'dbconnection.inc.php';

  if ($_FILES["image"]["error"] === 4) {
   echo "<script> alert('Image does not exist!'); </script>";
  }else{
  $uploads_dir = 'images';
  $fileName = $_FILES["image"]["name"];
  $fileSize = $_FILES["image"]["size"];
  $tmpName = $_FILES["image"]["tmp_name"];

  $validImageExtension = ['jpg', 'jpeg', 'png'];
  $imageExtension = explode('.', $fileName);
  $imageExtension = strtolower(end($imageExtension));

  if (!in_array($imageExtension, $validImageExtension)) {
    echo "<script> alert('Invalid Image Format!'); </script>";
  }else if($fileSize > 10000000){
    echo "<script> alert('Image is too large!'); </script>";
  }else{

    $newImgName = uniqid();
    $newImgName .= '.' . $imageExtension;

    move_uploaded_file($tmpName, "$uploads_dir/$newImgName");

   $sql = "INSERT INTO `cars`(`Model`, `Quantity`, `Description`, `Category`, `Purchase_Price`, `Rent_Price`, `Image`) VALUES ('$model','$quan','$desc','$cat','$price','$rprice','$newImgName')";
     mysqli_query($conn, $sql);
   // var_dump($sql);
   // die();
  header("Location: index1.php?addcar=success");
 }
}
}

//Update An Auto
if (isset($_POST['upc'])) {
 $model = $_POST['model'];
 $quan = $_POST['quan'];
 $price = $_POST['price'];
 $cid = $_POST['cid'];
 $rprice = $_POST['rprice'];
 $desc = $_POST['desc'];
 $cat = $_POST['cat'];


 require_once 'dbconnection.inc.php';

 $sql = "SELECT * FROM `cars` WHERE `Car_ID`='$cid'";

        $query = mysqli_query($conn,$sql);

        if(mysqli_num_rows($query) > 0){
            $row = mysqli_fetch_assoc($query);
            $quan1 = $row['Quantity'];

            $quan2 = $quan1 + $quan;

   $sql2 = "UPDATE `cars` SET `Model` = '$model' , `Quantity` = '$quan2' , `Purchase_Price` = '$price', `Description` = '$desc' , `Category` = '$cat' , `Rent_Price` = '$rprice' WHERE `Car_ID` = '$cid'";
     mysqli_query($conn, $sql2);

     //var_dump($sql2);
   // die();
  header("Location: index1.php?updatecar=success");
 }else{
  echo "Car does not exist.";
 }
}

//Delete Functions

        if($_REQUEST['action'] == 'deleteAd' && !empty($_REQUEST['id'])){ 
        require_once 'dbconnection.inc.php';
        $deleteItem = $_REQUEST['id'];
        $sql = "DELETE FROM `admin` WHERE `Administrator_ID` = '$deleteItem'";
        mysqli_query($conn, $sql); 
        header("Location: index1.php?deleteadministrator=success");
        }

        if($_REQUEST['action'] == 'deleteAu' && !empty($_REQUEST['id'])){ 
        require_once 'dbconnection.inc.php';
        $deleteItem = $_REQUEST['id'];
        $sql = "DELETE FROM `cars` WHERE `Car_ID` = '$deleteItem'";
        mysqli_query($conn, $sql); 
        header("Location: index1.php?deletcar=success");
        }

        if($_REQUEST['action'] == 'deleteC' && !empty($_REQUEST['id'])){ 
        require_once 'dbconnection.inc.php';
        $deleteItem = $_REQUEST['id'];
        $sql = "DELETE FROM `customers` WHERE `Customer_ID` = '$deleteItem'";
        mysqli_query($conn, $sql); 
        header("Location: index1.php?deletecustomer=success");
        }

        if($_REQUEST['action'] == 'deleteCh' && !empty($_REQUEST['id'])){ 
        require_once 'dbconnection.inc.php';
        $deleteItem = $_REQUEST['id'];
        $sql = "DELETE FROM `chauffeur` WHERE `ID` = '$deleteItem'";
        mysqli_query($conn, $sql); 
        header("Location: index1.php?deletechauffeur=success");
        }

//Cancel Functions

        if($_REQUEST['action'] == 'cancelO' && !empty($_REQUEST['id'])){ 
        require_once 'dbconnection.inc.php';
        $cancelItem = $_REQUEST['id'];
        $sql = "SELECT * FROM `orders` WHERE `Order_ID`='$cancelItem'";
        $query = mysqli_query($conn,$sql);
        if(mysqli_num_rows($query) > 0){
            $row = mysqli_fetch_assoc($query);
            $quan = $row['Quantity'];
            $cid = $row['Car_ID'];

        $sql4 = "SELECT * FROM `cars` WHERE `Car_ID`='$cid'";

        $query1 = mysqli_query($conn,$sql4);

        if(mysqli_num_rows($query1) > 0){
            $row1 = mysqli_fetch_assoc($query1);
            $quan1 = $row['Quantity'];

            $quan2 = $quan1 + $quan;

        $sql2 = "UPDATE `orders` SET `Status`='Cancelled' WHERE `Order_ID` = '$cancelItem'";
        mysqli_query($conn, $sql2);
        $sql3 = "UPDATE `cars` SET `Quantity`='$quan2' WHERE `Car_ID` = '$cid'";
        mysqli_query($conn, $sql3); 
        header("Location: index2.php?cancelorder=success");
        }else{
          echo "Car not found, kindly try again with an existing Car ID.";
        }
      }else{
          echo "Order not found, kindly try again with an existing Order ID.";
        }
    }

        if($_REQUEST['action'] == 'cancelR' && !empty($_REQUEST['id'])){ 
        require_once 'dbconnection.inc.php';
        $cancelItem = $_REQUEST['id'];
        $sql = "SELECT * FROM `rent` WHERE `Rent_ID`='$cancelItem'";
        $query = mysqli_query($conn,$sql);
        if(mysqli_num_rows($query) > 0){
            $row = mysqli_fetch_assoc($query);
            $quan = $row['Quantity'];
            $cid = $row['Car_ID'];

        $sql4 = "SELECT * FROM `cars` WHERE `Car_ID`='$cid'";

        $query1 = mysqli_query($conn,$sql4);

        if(mysqli_num_rows($query1) > 0){
            $row1 = mysqli_fetch_assoc($query1);
            $quan1 = $row['Quantity'];

            $quan2 = $quan1 + $quan;

        $sql2 = "UPDATE `rent` SET `Status`='Cancelled' WHERE `Rent_ID` = '$cancelItem'";
        mysqli_query($conn, $sql2);
        $sql3 = "UPDATE `cars` SET `Quantity`='$quan2' WHERE `Car_ID` = '$cid'";
        mysqli_query($conn, $sql3); 
        header("Location: index2.php?cancelrent=success");
        }else{
          echo "Car not found, kindly try again with an existing Car ID.";
        }
      }else{
          echo "Rent not found, kindly try again with an existing Rent ID.";
        }
    }

//Update Functions

        if($_REQUEST['action'] == 'approveR' && !empty($_REQUEST['id'])){ 
        require_once 'dbconnection.inc.php';
        $updateItem = $_REQUEST['id'];
        $sql = "UPDATE `rent` SET `Status`='Approved' WHERE `Rent_ID`='$updateItem'";
        mysqli_query($conn, $sql); 
        header("Location: index1.php?approverent=success");
        }

        if($_REQUEST['action'] == 'finishR' && !empty($_REQUEST['id'])){ 
        require_once 'dbconnection.inc.php';
        $updateItem = $_REQUEST['id'];
        $sql = "SELECT * FROM `rent` WHERE `Rent_ID`='$updateItem'";
        $query = mysqli_query($conn,$sql);
        if(mysqli_num_rows($query) > 0){
            $row = mysqli_fetch_assoc($query);
            $quan = $row['Quantity'];
            $cid = $row['Car_ID'];

        $sql4 = "SELECT * FROM `cars` WHERE `Car_ID`='$cid'";

        $query1 = mysqli_query($conn,$sql4);

        if(mysqli_num_rows($query1) > 0){
            $row1 = mysqli_fetch_assoc($query1);
            $quan1 = $row1['Quantity'];

            $quan2 = $quan1 + $quan;

        $sql = "UPDATE `rent` SET `Status`='Completed' WHERE `Rent_ID`='$updateItem'";
        mysqli_query($conn, $sql); 
        $sql3 = "UPDATE `cars` SET `Quantity`='$quan2' WHERE `Car_ID` = '$cid'";
        mysqli_query($conn, $sql3); 
        // var_dump($sql3);
        header("Location: index1.php?completerent=success");
        }
      }
    }

        if($_REQUEST['action'] == 'updateO' && !empty($_REQUEST['id'])){ 
        require_once 'dbconnection.inc.php';
        $updateItem = $_REQUEST['id'];
        $sql = "UPDATE `orders` SET `Status`='Completed', `Date_Time` = NOW() WHERE `Order_ID`='$updateItem'";
        mysqli_query($conn, $sql); 
        header("Location: index1.php?updateorder=success");
        }

//Update Administrator
if (isset($_POST['upa'])) {
 $fname = $_POST['fname'];
 $email = $_POST['email'];
 $aid = $_POST['aid'];
 $password = $_POST['password'];
 $passwordconfirm = $_POST['cpassword'];

 require_once 'dbconnection.inc.php';

 if ($password == $passwordconfirm) {

   $sql = "UPDATE `admin` SET `Fullname`='$fname',`Email_Address`='$email',`Password`=md5('$password') WHERE `Administrator_ID`='$aid'";
     mysqli_query($conn, $sql);
   // var_dump($sql);
   // die();
  header("Location: logout.php");
}else{
  echo "Passwords do not match.";
 }
}

//Update Customer
if (isset($_POST['upc1'])) {
 $fname = $_POST['fname'];
 $email = $_POST['email'];
 $phone = $_POST['phone'];
 $cid = $_POST['cid'];
 $password = $_POST['password'];
 $passwordconfirm = $_POST['cpassword'];

 require_once 'dbconnection.inc.php';

 if ($password == $passwordconfirm) {
   $sql = "UPDATE `customers` SET `Fullname`='$fname',`Phone_Number`='$phone',`Email_Address`='$email',`Password`=md5('$password') WHERE `Customer_ID`='$cid'";
     mysqli_query($conn, $sql);
   // var_dump($sql);
   // die();
  header("Location: logout.php");
 }else{
  echo "Passwords do not match.";
 }
}

 ?>