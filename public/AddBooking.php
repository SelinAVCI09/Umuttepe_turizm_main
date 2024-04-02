<?php 
session_start();

  include("connection.php");
  include("function.php");

  $user_data = check_login($conn);

?>

<?php include("connection.php")?>
<!--
<!DOCTYPE html>
<html>
<head>
  <title>admin Panel suraksha</title>
</head>
<body>

   <a href="adminLogout.php"><button class="btnHome">logout</button></a>

</body>
</html>

-->


<!DOCTYPE html>
<html>
<head>
  <title>booking page</title>
  <!--cdn icon library -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="cssfile/sidebar.css">
<link rel="stylesheet" href="cssfile/signUp.css">
  <style type="text/css">

      body{

      background-image: url("image/1.jpg");
      background-position: center;
      background-size: cover;
      height: 700px;
      background-repeat: no-repeat;
      background-attachment: fixed;

    }
    .adminTopic{
      text-align: center;
      color: #fff;
      

    }

table
{
    width:99%;
    border-collapse: separate !important;
    margin:auto;
    /*/table-layout:fixed;/*/
    text-align:center;
    margin-top:50px;
    background-color: rgb(255, 255, 255);
    border-radius: 10px 10px 0px 0px;

}
table th
{
    border-bottom:2px solid rgb(187, 187, 187);
    padding:10px 0px 10px 0px;
    font-family: "balsamiq_sansitalic" !important;
}
table tr td
{
    border-right: 2px solid rgb(187, 187, 187);
    height: 58px;
    padding: 22px 0px 0px 0px;
    font-family: "monospace;" !important;
    border-bottom: 2px solid rgb(187, 187, 187);
    font-size: 20px;
}
table tr td a
{
    /*background-color: rgb(255, 196, 0);*/
    color: white;
    border-radius: 5px;
    padding: 6px;
    text-decoration: none;
    margin: 10px;
    font-weight: 700;
}

table tr td button:hover
{

  /*
    background: rgb(255, 255, 255);
    text-decoration:underline;
    color:tomato;
    padding: 4px;
    border:2px solid tomato;
    transition:background-color 0.2s;*/

    padding: 5px 5px 5px 5px;
  border: 2px solid yellow;
    border-radius: 7px;
    background-color: red;
    color: white;
    cursor: pointer;
}
button 
{
    padding: 5px 5px 5px 5x;
}
.btnPolicy{

  padding: 5px 5px 5px 5px;
  border: 2px solid yellow;
    border-radius: 7px;
    background-color: red;
    color: white;
    margin-left: 20px;
}

.btnPolicy:hover{

  background:red;
    padding: 7px 7px 7px 7px;
    cursor: pointer;

}
.idclass{

      width: 100%;
      border-radius: 3px;
      border: 1px solid #9597a6;
      padding: 10px;
      outline: none;
      color: black;

    }


  </style>
</head>
<body>
  <input type="checkbox" id="check">

  <label for="check">
<i class="fa fa-bars" id="btn"></i>
<i class="fa fa-times" id="cancle"></i>


  </label>
  <div class="sidebar">
<header><img src="image/Re.png">
<p><?php echo $user_data['username'];?></p>
</header>
<ul>



    <li><a href="viewBus.php">Bilet Rezervasyonu</a></li>
    <li><a href="profile.php">Profil</a></li>
    <li><a href="logout.php">Çıkış</a></li>
    
  <!--  <li><a href="#">Event</a></li>
    <li><a href="#">About</a></li>
    <li><a href="#">Service</a></li>
    <li><a href="#">Contact</a></li>-->
    </ul>
 <!--  <li>
      <div class="social-links">
        <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
        <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
        <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
        <a href="#" class="google-plus"><i class="fa fa-youtube"></i></a>
        
      </div>
    </li>-->
   

</div>



<div class="sidebar2">


    <h1 class="adminTopic">Bilet işlemleri...</h1>



<?php

    /*
    $sqlget="SELECT * FROM bus";
    $sqldata=mysqli_query($conn,$sqlget) or die('error getting');
    

    echo "<table>";
    echo "<tr>
      <th>ID</th>
    <th>Bus Name</th>
    <th>Tel</th>
    <th>Book Now</th>
    
   
       </tr>";

       while ($row=mysqli_fetch_array($sqldata,MYSQLI_ASSOC))
       {
        echo "<tr><td>";
        echo $row['id'];
        echo "</td><td>";
        echo $row['Bus_Name'];
        echo "</td><td>";
        echo $row['Tel'];
        echo "</td>";
       
          
        ?>

        <td>

        <button style="border:2px solid yellow; border-radius:7px; background-color:red;color:white;">
          <a href="Viewbooking.php">
         
          
          

          Book Now

          </a>

        </button>

        </td></tr>

<?php
       }

       echo "</table>";

*/
?>

<?php



       


  if(isset($_POST['AddBooking'])){


     $passenger=$_POST['passenger_name'];
     $tel=$_POST['tel'];
     $email=$_POST['email'];
     $routeId=$_GET['route_id'];
     $gender=$_GET['gender'];
     $seat=$_GET['seat'];

    


       if($conn->connect_error)
          {
            die('Connection Failed :'.$conn->connect_error);
          }
          else
          {


              $stmt=$conn->prepare("INSERT INTO booking (passenger_name, telephone, email, gender, seat, route_id) VALUES(?,?,?,?,?,?)");

              //table3 is the table name//

              $stmt->bind_param("ssssss",$passenger,$tel,$email,$gender,$seat,$routeId);

              $stmt->execute();
              
                         echo ("<script LANGUAGE='JavaScript'>
                window.alert('Succesfully added!!!');
                window.location.href='AddPay.php';
                </script>");
              
              $stmt->close();
              $conn->close();
              }
                
          
      }     
  

   ?>





   
          

          <div class="wrapper">
  <div class="registration_form">
    <div class="title">
    Geting A Ticket...
    </div>

    <form action="#" method="POST">
      <div class="form_wrap">
        
        <div class="input_wrap">
          <label for="title">Yolcu Adı</label>
          <input type="text" id="title" name="passenger_name" placeholder="Passenger Name" required>
        </div>


        <div class="input_wrap">
          <label for="title">Telefon</label>
          <input type="text" id="title" name="tel" placeholder="Tel" required>
        </div>

        <div class="input_wrap">
          <label for="title">E-mail</label>
          <input type="E-mail" id="title" name="email" placeholder="E-mail" class="idclass" required>
        </div>


        <?php
// URL parametrelerini al
$seats = explode(",", $_GET['seat']);
$routeId = isset($_GET['route_id']) ? $_GET['route_id'] : "VarsayılanDeğer";

// Cinsiyet bilgisini al, eğer belirtilmemişse null olarak ata
$gender = isset($_GET['gender']) ? $_GET['gender'] : null;

// Her koltuk için bilgileri yazdır
foreach ($seats as $seat) {
    // Koltuk numarasını al
    $seatNumber = $seat;
    echo "<div class='input_wrap'>";
    echo "<label for='seatNumber'>Koltuk No</label>";
    echo "<input type='text' id='seatNumberInput' name='seatNumber' value='".($seatNumber ?:'') ."' required>";
    echo "</div>";

    echo "<div class='input_wrap'>";
    echo "<label for='seatNumber'>Otobüs Numarası</label>";
    echo "<input type='text' id='routeInput' name='route_id' value='".($routeId ?:'') ."' required>";
    echo "</div>";

    echo "<div class='input_wrap'>";
    echo "<label for='gender'>Cinsiyet</label>";
    echo "<input type='text' id='genderInput' name='gender' value='" . ($gender ?: '') . "' required>";
    echo "</div>";
}
?>




        <div class="input_wrap">
          <input type="submit" value="Booking Now" class="submit_btn" name="AddBooking">

        </div>



      </div>
    </form>
  </div>
</div>


        







</div>

</body>
</html>