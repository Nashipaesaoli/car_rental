<?php
require_once 'dbconnection.inc.php';
session_start();

if (!isset($_SESSION['Email1']) && !isset($_SESSION['custname']) && !isset($_SESSION['prof'])) {
    header("Location: index.php");
}else{
  $email = $_SESSION['Email1'];
  $query=mysqli_query($conn,"SELECT * FROM `customers` WHERE `Email_Address`='$email'")or die(mysqli_error());
  $row=mysqli_fetch_array($query);
  $filter = $_SESSION['custname'];
  $profile = $_SESSION['prof'];
}
?>

<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- site metas -->
      <title>Executive Car Hub ~ Customer Homepage</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <!-- style css -->
      <link rel="stylesheet" href="css/style.css">
      <!-- Responsive-->
      <link rel="stylesheet" href="css/responsive.css">
      <!-- fevicon -->
      <link rel="icon" href="images/fevicon.png" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
   </head>

        <style type="text/css">
        
          table{
    border: solid 1px black;
    align-items: center;
  }

   th, tr, td{
    border: solid 1px black;
    padding: 0px 0px;
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
printData();
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
printData();
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
printData();
})  
</script>

            <script type="text/javascript">
function printData5()
{
   var divToPrint=document.getElementById("printTable5");
   newWin= window.open("");
   newWin.document.write(divToPrint.outerHTML);
   newWin.print();
   newWin.close();
}

$('button').on('click',function(){
printData();
})  
</script>

   <!-- body -->
   <body class="main-layout">
      <!-- loader  -->
      <div class="loader_bg">
         <div class="loader"><img src="images/loading.gif" alt="#" /></div>
      </div>
      <!-- end loader -->
      <!-- header -->
      <header>
         <!-- header inner -->
         <div class="header">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                     <div class="full">
                        <div class="center-desk">
                           <div class="logo">
                              <a href="index1.php"><img src="images/logo1.png" alt="#" /></a>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                     <nav class="navigation navbar navbar-expand-md navbar-dark ">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarsExample04">
                           <ul class="navbar-nav mr-auto">
                              <li class="nav-item active">
                                 <a class="nav-link" href="index1.php"> Home  </a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="#about">About Us</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="#action">Customer Actions</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="#contact">Contact Us</a>
                              </li>
                              <li class="nav-item d_none">
                             <a class="nav-link" href="logout.php"><i class="fa fa-user-circle padd_right" aria-hidden="true"></i>Logout</a>
                              </li>
                           </ul>
                        </div>
                     </nav>
                  </div>
               </div>
            </div>
         </div>
      </header>
      <!-- end header inner -->
      <!-- end header -->
      <!-- banner -->
      <section class="banner_main">
         <div id="banner1" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
               <li data-target="#banner1" data-slide-to="0" class="active"></li>
               <li data-target="#banner1" data-slide-to="1"></li>
               <li data-target="#banner1" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
               <div class="carousel-item active">
                  <div class="container-fluid">
                     <div class="carousel-caption">
                        <div class="row">
                           <div class="col-md-6">
                              <div class="text-bg">
                                 <h1>Welcome</h1>
                                 <span><?php echo $row['Fullname']; ?></span>
                                 <p>Driving you to the best deals for cars in the country!</p>
                                 <a href="#">More Info </a> <a href="#">Contact Us</a>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="text_img">
                                 <figure><img src="images/<?php echo $profile; ?>" alt="#"/></figure>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="carousel-item">
                  <div class="container-fluid">
                     <div class="carousel-caption">
                        <div class="row">
                           <div class="col-md-6">
                              <div class="text-bg">
                                 <h1>Welcome</h1>
                                 <span><?php echo $row['Fullname']; ?></span>
                                 <p>We are speedy in ensuring you get the value for your money!</p>
                                 <a href="#">More Info </a> <a href="#">Contact Us</a>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="text_img">
                                 <figure><img src="images/<?php echo $profile; ?>" alt="#"/></figure>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="carousel-item">
                  <div class="container-fluid">
                     <div class="carousel-caption">
                        <div class="row">
                           <div class="col-md-6">
                              <div class="text-bg">
                                 <h1>Welcome</h1>
                                 <span><?php echo $row['Fullname']; ?></span>
                                 <p>Happy shopping!</p>
                                 <a href="#">More Info </a> <a href="#">Contact Us</a>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="text_img">
                                 <figure><img src="images/<?php echo $profile; ?>" alt="#"/></figure>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <a class="carousel-control-prev" href="#banner1" role="button" data-slide="prev">
            <i class="fa fa-chevron-left" aria-hidden="true"></i>
            </a>
            <a class="carousel-control-next" href="#banner1" role="button" data-slide="next">
            <i class="fa fa-chevron-right" aria-hidden="true"></i>
            </a>
         </div>
      </section>
      <!-- end banner -->
      <!-- three_box -->
      <div class="three_box">
         <div class="container">
            <div class="row">
               <div class="col-md-4">
                  <div class="box_text">
                     <h3>Variety of Vehicles</h3>
                     <i><img src="images/thr.png" alt="#"/></i>
                     <p>We offer a wide range of vehicles on our platform, from reputable brands.</p>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="box_text">
                     <h3>All Filled Up and Secure</h3>
                     <i><img src="images/thr1.png" alt="#"/></i>
                     <p>Our system is secure and up to date with the most efficient authentication available.</p>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="box_text">
                     <h3>Speedy Service</h3>
                     <i><img src="images/thr2.png" alt="#"/></i>
                     <p>We offer speedy deliveries and quick transactions, to get you in the driver's seat as soon as possible.</p>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- three_box -->
      <!-- about -->
      <div id="about" class="about">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage">
                     <h2>About Our Car Service </h2>
                  </div>
               </div>
            </div>
            <div class="container">
               <div class="row">
                  <div class="col-md-10 offset-md-1">
                     <div class="about_img">
                        <div class="about_box">
                                                      <h3>Welcome to our car shop!</h3>
                           <p> 
Our mission is to provide quality repairs and maintenance services for all types of vehicles, from sedans and SUVs to trucks and commercial vehicles. We use state-of-the-art equipment and the latest diagnostic tools to identify any issues with your vehicle and provide accurate and efficient repairs.

We value our customers and strive to provide a personalized experience that exceeds your expectations. We are committed to providing exceptional customer service and will go above and beyond to ensure that you are completely satisfied with our service.

Thank you for choosing our car shop for your vehicle needs. We look forward to serving you and your vehicle!
</p>
                           <a class="read_more">Read More</a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- end about -->
      <!-- testimonial -->
      <div id="action" class="testimonial">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage">
                     <h2>Database</h2>
                  </div>
               </div>
            </div>
            <div class="row">
                              <div class="col-md-12">
                    <div class="titlepage">
                     <p>My Details</p>
                  </div>
              <table id="printTable">
<tr style="text-align: left;
  padding: 8px;">
<th style="text-align: left;
  padding: 8px;">Fullname</th>
  <th style="text-align: left;
  padding: 8px;">Email Address</th>
  <th style="text-align: left;
  padding: 8px;">Phone Number</th>
  <th style="text-align: left;
  padding: 8px;">Image</th>
</tr>

<?php
$conn = mysqli_connect("localhost", "root", "", "auto_shop");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT `Customer_ID`, `Fullname`, `Phone_Number`, `Email_Address`, `Image` FROM `customers` WHERE `Customer_ID` = '$filter'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
?>
<tr>
<td><?php echo($row["Fullname"]); ?></td>
<td><?php echo($row["Email_Address"]); ?></td>
<td><?php echo($row["Phone_Number"]); ?></td>
<td><img src="images/<?php echo($row["Image"]); ?>" style="width: 200px;"></td>
</tr>
<?php
}
} else { echo "No results"; }
$conn->close();
?>

</table>
                <div>
                  <div><a href="#" onclick="printData();">Print</a></div>
                </div>
               </div>
                              <div class="col-md-12">
                    <div class="titlepage">
                     <p>Cars</p>
                  </div>
                              <table id="printTable1">
<tr style="text-align: left;
  padding: 8px;">
<th style="text-align: left;
  padding: 8px;">Car ID</th>
<th style="text-align: left;
  padding: 8px;">Model</th>
  <th style="text-align: left;
  padding: 8px;">Quantity </th>
   <th style="text-align: left;
  padding: 8px;">Description</th>
  <th style="text-align: left;
  padding: 8px;">Category </th>
  <th style="text-align: left;
  padding: 8px;">Purchase Price </th>
  <th style="text-align: left;
  padding: 8px;">Rent Price </th>
  <th style="text-align: left;
  padding: 8px;">Image</th>
</tr>

<?php
$conn = mysqli_connect("localhost", "root", "", "auto_shop");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT `Car_ID`, `Model`, `Quantity`, `Description`, `Category`, `Purchase_Price`, `Rent_Price`, `Image` FROM `cars`";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
  ?>
<tr>
<td><?php echo ($row['Car_ID']); ?></td>
<td><?php echo ($row['Model']); ?></td>
<td><?php echo ($row['Quantity']);?></td>
<td><?php echo ($row['Description']); ?></td>
<td><?php echo ($row['Category']);?></td>
<td><?php echo($row['Purchase_Price']);?></td>
<td><?php echo($row['Rent_Price']);?></td>
<td><img src="images/<?php echo($row["Image"]); ?>" style="width: 200px;"></td>
</tr>
<?php
}
} else { echo "No results"; }
$conn->close();
?>

</table>
                <div>
                  <div><a href="#" onclick="printData1();">Print</a></div>
                </div>
               </div>
                                             <div class="col-md-12">
                    <div class="titlepage">
                     <p>My Pickups</p>
                  </div>
                              <table id="printTable1">
<tr style="text-align: left;
  padding: 8px;">
<th style="text-align: left;
  padding: 8px;">Pickup ID</th>
<th style="text-align: left;
  padding: 8px;">Chauffeur ID</th>
  <th style="text-align: left;
  padding: 8px;">Car ID </th>
  <th style="text-align: left;
  padding: 8px;">Live Map </th>
</tr>

<?php
$conn = mysqli_connect("localhost", "root", "", "auto_shop");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT `Pickup_ID`, `Chauffeur_ID`, `Car_ID`, `Long`, `Lat` FROM `pickup`";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
  ?>
<tr>
<td><?php echo ($row['Pickup_ID']); ?></td>
<td><?php echo ($row['Chauffeur_ID']); ?></td>
<td><?php echo ($row['Car_ID']);?></td>
<td><iframe src="https://maps.google.com/maps?q=<?php echo ($row['Lat']); ?>,  <?php echo ($row['Long']); ?>&z=15&output=embed" width="360" height="270" frameborder="0" style="border:0"></iframe></td>
</tr>
<?php
}
} else { echo "No results"; }
$conn->close();
?>

</table>
                <div>
                  <div><a href="#" onclick="printData1();">Print</a></div>
                </div>
               </div>
                                 <div class="col-md-12">
                    <div class="titlepage">
                     <p>Chauffeur</p>
                  </div>
                              <table id="printTable3">
<tr style="text-align: left;
  padding: 8px;">
<th style="text-align: left;
  padding: 8px;">Chauffeur ID</th>
<th style="text-align: left;
  padding: 8px;">Fullname </th>
  <th style="text-align: left;
  padding: 8px;">Email Address </th>
</tr>

<?php
$conn = mysqli_connect("localhost", "root", "", "auto_shop");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT `Name`, `Email_Address`, `ID` FROM `chauffeur`";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
  ?>
<tr>
<td><?php echo ($row['ID']); ?></td>
<td><?php echo ($row['Name']); ?></td>
<td><?php echo ($row['Email_Address']);?></td>
</tr>
<?php
}
} else { echo "No results"; }
$conn->close();
?>

</table>
                <div>
                  <div><a href="#" onclick="printData3();">Print</a></div>
                </div>
               </div>
        <div class="col-md-12">
                    <div class="titlepage">
                     <p>Orders</p>
                  </div>
        <table id="printTable2">
<tr style="text-align: left;
  padding: 8px;">
<th style="text-align: left;
  padding: 8px;">Order ID</th>
<th style="text-align: left;
  padding: 8px;">Customer ID</th>
  <th style="text-align: left;
  padding: 8px;">Car ID </th>
  <th style="text-align: left;
  padding: 8px;">Date & Time </th>
  <th style="text-align: left;
  padding: 8px;">Price </th>
    <th style="text-align: left;
  padding: 8px;">Quantity </th>
  <th style="text-align: left;
  padding: 8px;">Status </th>
  <th style="text-align: left; padding: 8px;"></th>
</tr>

<?php
$conn = mysqli_connect("localhost", "root", "", "auto_shop");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT `Order_ID`, `Customer_ID`, `Car_ID`, `Date_Time`, `Price`, `Quantity`, `Status` FROM `orders` WHERE `Customer_ID` = '$filter'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
  ?>
<tr>
<td><?php echo ($row['Order_ID']); ?></td>
<td><?php echo ($row['Customer_ID']); ?></td>
<td><?php echo ($row['Car_ID']); ?></td>
<td><?php echo ($row['Date_Time']); ?></td>
<td><?php echo($row['Price']);?></td>
<td><?php echo ($row['Quantity']);?></td>
<td><?php echo ($row['Status']);?></td>
<td><button onclick="return confirm('Are you sure to cancel this order?')?window.location.href='insertion.inc.php?action=cancelO&id=<?php echo ($row['Order_ID']);?>':true;" title='Cancel Order'>Cancel</button></td>
</tr>
<?php
}
} else { echo "No results"; }
$conn->close();
?>

</table>
                <div>
                  <div><a href="#" onclick="printData2();">Print</a></div>
                </div>
               </div>
                                      <div class="col-md-12">
                    <div class="titlepage">
                     <p>Rent</p>
                  </div>
        <table id="printTable5">
<tr style="text-align: left;
  padding: 8px;">
<th style="text-align: left;
  padding: 8px;">Rent ID</th>
  <th style="text-align: left;
  padding: 8px;">Car ID </th>
  <th style="text-align: left;
  padding: 8px;">Total Price </th>
  <th style="text-align: left;
  padding: 8px;">Start Date </th>
   <th style="text-align: left;
  padding: 8px;">End Date </th>
   <th style="text-align: left;
  padding: 8px;">Number of Months </th>
   <th style="text-align: left;
  padding: 8px;">Quantity </th>
  <th style="text-align: left;
  padding: 8px;">Status </th>
  <th style="text-align: left;
  padding: 8px;"></th>
</tr>

<?php
$conn = mysqli_connect("localhost", "root", "", "auto_shop");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT `Rent_ID`, `Car_ID`, `Total_Price`, `Start_Date`, `End_Date`, `Number_of_Months`, `Quantity`, `Status` FROM `rent` WHERE `Customer_ID` = '$filter'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
  ?>
<tr>
<td><?php echo ($row['Rent_ID']); ?></td>
<td><?php echo ($row['Car_ID']); ?></td>
<td><?php echo ($row['Total_Price']); ?></td>
<td><?php echo($row['Start_Date']);?></td>
<td><?php echo($row['End_Date']);?></td>
<td><?php echo ($row['Number_of_Months']);?></td>
<td><?php echo ($row['Quantity']);?></td>
<td><?php echo ($row['Status']);?></td>
<td><button onclick="return confirm('Are you sure to cancel this rent?')?window.location.href='insertion.inc.php?action=cancelR&id=<?php echo ($row['Rent_ID']);?>':true;" title='Cancel Rent'>Cancel</button></td>
</tr>
<?php
}
} else { echo "No results"; }
$conn->close();
?>

</table>
                <div>
                  <div><a href="#" onclick="printData5();">Print</a></div>
                </div>
               </div>
            </div>
         </div>
      </div>
      <!-- end testimonial -->
      </div>
      <!--  footer -->
      <footer>
         <div class="footer">
            <div class="container">
               <div class="row">
                  <div class="col-md-2">
                     <div class="titlepage">
                        <h2 style="font-size: 28px;">Contact Us</h2>
                     </div>
                  </div>
                  <div id="contact" class="col-md-10">
                     <ul class="location_icon">
                        <li><a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i></a> Nairobi, Kenya.</li>
                        <li><a href="#"><i class="fa fa-volume-control-phone" aria-hidden="true"></i></a> +254 729 593325</li>
                        <li><a href="#"><i class="fa fa-envelope" aria-hidden="true"></i></a>car.hub@gmail.com</li>
                     </ul>
                  </div>
               </div>
               <br>
               <br>
               <div class="row">
                      <div class="col-md-6">
                     <div class="titlepage">
                        <h2 style="font-size: 28px;">Update My Details</h2>
                     </div>
                  </div>
                    <div class="col-md-6">
                     <div class="titlepage">
                        <h2 style="font-size: 28px;">Order A Car</h2>
                        <br>
                        <h3 style="font-size: 16px; color: white; font-weight: bold;">Pay via M-PESA to the Till Number : xxx xxx (Your Order will be confirmed within 48 hours of the receiving of the Payment Amount in kshs.)</h3>
                     </div>
                  </div>
               </div>
               <div class="row" id="start">
                  <div class="col-md-6">
                     <form id="request" class="main_form" method="POST" action="insertion.inc.php">
                        <div class="row">
                           <div class="col-md-12 ">
                              <input class="contactus" placeholder="Fullname" type="text" name="fname" required> 
                               <input type="hidden" value="<?php echo $filter; ?>" name="cid" required>
                           </div>
                           <div class="col-md-12">
                              <input class="contactus" placeholder="Email Address" type="email" name="email" required> 
                           </div>                           
                           <div class="col-md-12">
                           <input class="contactus" placeholder="Phone Number" type="text" name="phone" required>                          
                           </div>
                           <div class="col-md-12 ">
                              <input class="contactus" placeholder="Password" type="password" name="password" required> 
                           </div>
                           <div class="col-md-12 ">
                              <input class="contactus" placeholder="Confirm Password" type="password" name="cpassword" required> 
                           </div>
                           <div class="col-sm-col-xl-6 col-lg-6 col-md-6 col-sm-12">
                              <button class="send_btn" type="submit" name="upc1">Update</button>
                           </div>
                        </div>
                     </form>
                  </div>
                  <div class="col-md-6">
                        <form id="request" class="main_form" method="POST" action="insertion.inc.php">
                        <div class="row">
                           <div class="col-md-12">
                              <input class="contactus" placeholder="Quantity" type="number" name="quan" required>
                              <input type="hidden" value="<?php echo $filter; ?>" name="cid" required> 
                           </div>
                           <div class="col-md-12">
                              <input class="contactus" placeholder="Location Longitude from the Map Below (+)" type="text" name="long" required>
                           </div>
                           <div class="col-md-12">
                              <input class="contactus" placeholder="Location Latitude from the Map Below (-)" type="text" name="lat" required>
                           </div>
                           <div class="col-md-12">
                            <select class="contactus" name="chid" required>
                                <option selected disabled value="0">Select A Chauffeur ID</option>
                                     <?php
                                      $con = mysqli_connect("localhost","root","","auto_shop");
                                      $sql = "SELECT * FROM `chauffeur`";
                                      $all_categories = mysqli_query($con,$sql);
                                      while ($category = mysqli_fetch_array(
                                              $all_categories,MYSQLI_ASSOC)):;
                                  ?>
                                  <option value="<?php echo $category["ID"];?>"><?php echo $category["ID"];?></option>
                                  <?php
                                      endwhile;
                                  ?>
                                </select>
                           </div>
                           <div class="col-md-12">
                            <select class="contactus" name="car" required>
                                <option selected disabled value="0">Select A Car ID</option>
                                     <?php
                                      $con = mysqli_connect("localhost","root","","auto_shop");
                                      $sql = "SELECT * FROM `cars`";
                                      $all_categories = mysqli_query($con,$sql);
                                      while ($category = mysqli_fetch_array(
                                              $all_categories,MYSQLI_ASSOC)):;
                                  ?>
                                  <option value="<?php echo $category["Car_ID"];?>"><?php echo $category["Car_ID"];?></option>
                                  <?php
                                      endwhile;
                                  ?>
                                </select>
                           </div>
                           <div class="col-sm-col-xl-6 col-lg-6 col-md-6 col-sm-12">
                              <button class="send_btn" type="submit" name="order">Order</button>
                           </div>
                           <div class="col-sm-col-xl-6 col-lg-6 col-md-6 col-sm-12">
                              <ul class="social_icon">
                                 <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                 <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                 <li><a href="#"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a></li>
                                 <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                              </ul>
                           </div>
                        </div>
                     </form>
                  </div>
               </div>
               <br>
               <br>
               <div class="row">
                    <div class="col-md-12">
                     <div class="titlepage">
                        <h2 style="font-size: 28px;">Rent A Car</h2>
                        <br>
                        <h3 style="font-size: 16px; color: white; font-weight: bold;">Pay via M-PESA to the Till Number : xxx xxx (Your Order will be confirmed within 48 hours of the receiving of the Payment Amount in kshs.)</h3>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-md-12">
                        <form id="request" class="main_form" method="POST" action="insertion.inc.php">
                        <div class="row">
                           <div class="col-md-12">
                              <input class="contactus" placeholder="Quantity" type="number" name="quan" required>
                              <input type="hidden" value="<?php echo $filter; ?>" name="cid" required> 
                           </div>
                           <div class="col-md-12">
                              <input class="contactus" placeholder="Number of Months" type="number" name="month" required>
                           </div>
                           <div class="col-md-12">
                              <input class="contactus" placeholder="Location Longitude from the Map Below (+)" type="text" name="long" required>
                           </div>
                           <div class="col-md-12">
                              <input class="contactus" placeholder="Location Latitude from the Map Below (-)" type="text" name="lat" required>
                           </div>
                           <div class="col-md-12">
                            <select class="contactus" name="chid" required>
                                <option selected disabled value="0">Select A Chauffeur ID</option>
                                     <?php
                                      $con = mysqli_connect("localhost","root","","auto_shop");
                                      $sql = "SELECT * FROM `chauffeur`";
                                      $all_categories = mysqli_query($con,$sql);
                                      while ($category = mysqli_fetch_array(
                                              $all_categories,MYSQLI_ASSOC)):;
                                  ?>
                                  <option value="<?php echo $category["ID"];?>"><?php echo $category["ID"];?></option>
                                  <?php
                                      endwhile;
                                  ?>
                                </select>
                           </div>
                           <div class="col-md-12">
                            <select class="contactus" name="car" required>
                                <option selected disabled value="0">Select A Car ID</option>
                                     <?php
                                      $con = mysqli_connect("localhost","root","","auto_shop");
                                      $sql = "SELECT * FROM `cars`";
                                      $all_categories = mysqli_query($con,$sql);
                                      while ($category = mysqli_fetch_array(
                                              $all_categories,MYSQLI_ASSOC)):;
                                  ?>
                                  <option value="<?php echo $category["Car_ID"];?>"><?php echo $category["Car_ID"];?></option>
                                  <?php
                                      endwhile;
                                  ?>
                                </select>
                           </div>
                           <div class="col-sm-col-xl-6 col-lg-6 col-md-6 col-sm-12">
                              <button class="send_btn" type="submit" name="rent">Order</button>
                           </div>
                           <div class="col-sm-col-xl-6 col-lg-6 col-md-6 col-sm-12">
                              <ul class="social_icon">
                                 <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                 <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                 <li><a href="#"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a></li>
                                 <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                              </ul>
                           </div>
                        </div>
                     </form>
                  </div>
               </div>
               <br>
               <br>
               <div class="row">
                                 <div class="col-md-12">
                  <div class="map_main">
                     <div class="map-responsive">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d255282.3585378304!2d36.70730674843509!3d-1.302861786946768!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x182f1172d84d49a7%3A0xf7cf0254b297924c!2sNairobi!5e0!3m2!1sen!2ske!4v1678374173670!5m2!1sen!2ske" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                     </div>
                  </div>
               </div>
               </div>
            </div>
            <div class="copyright">
               <div class="container">
                  <div class="row">
                     <div class="col-md-12">
                        <p>Copyright 2023 All Right Reserved.</p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </footer>
      <!-- end footer -->
      <!-- Javascript files-->
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
      <script src="js/jquery-3.0.0.min.js"></script>
      <!-- sidebar -->
      <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="js/custom.js"></script>
   </body>
</html>