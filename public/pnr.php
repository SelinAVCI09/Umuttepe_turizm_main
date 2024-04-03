<?php 
session_start();

  include("connection.php");
  include("function.php");

  $user_data = check_login($conn);

?>

<?php include("connection.php")?>



<!DOCTYPE html>
<html>
<head>
  <title></title>
  <!--cdn icon library -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="cssfile/sidebar.css">
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


<li><a href="viewBus.php">Bilet Rezervi</a></li>
    <li><a href="profile.php">Profil</a></li>
    <li><a href="viewTickets.php">Biletlerim</a></li>
    <li><a href="logout.php">Çıkış</a></li>

    </ul>
   

</div>



<div class="sidebar2">


    <h1 class="adminTopic">Biletlerim</h1>
    
    <?php
    
    $username = mysqli_real_escape_string($conn, $user_data['username']);

    $sql = "SELECT route.*, bus.Bus_Name 
            FROM route 
            JOIN bus ON route.bus_id = bus.id 
            JOIN booking ON route.id = booking.route_id
            WHERE booking.passenger_name = '$username'";
    

    $result = mysqli_query($conn, $sql);
    echo "<table>";
    echo "<tr>";

    if (mysqli_num_rows($result) > 0) {
        // Her bir route için PNR kodu oluşturma
        while($row = mysqli_fetch_assoc($result)) {
            echo "</td><td>";
            $pnrCode = $row["plaka"] . $row["zaman"] . str_replace(array('.', ' ', ':'), '', $row["departure_date"] . $row["departure_time"]) . $row["bus_name"] . str_replace(' ', '', $row["Bus_Name"]);
            echo "PNR Kodu: " . $pnrCode . "<br>";

        }
    } else {
        echo "Route bulunamadı";
    }
    echo "</table>";

    mysqli_close($conn);
?>