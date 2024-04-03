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
    $sqlget = "SELECT * FROM booking b
                JOIN route r ON r.id = b.route_id
                WHERE b.passenger_name = '$username'";
    $sqldata = mysqli_query($conn, $sqlget) or die('error getting');
     
     
     
    echo "<table>";
    echo "<tr>
    <th>Kalkış Şehri</th>
    <th>İniş Şehri</th>
    <th>Peron</th>
    <th>Tarih</th>
    <th>Zaman</th>
    <th>Ücret</th>
    <th>PNR</th>
    
   
       </tr>";
       $uniqueTickets = array(); // Tekil biletler için dizi
       while ($row = mysqli_fetch_array($sqldata, MYSQLI_ASSOC)) {
           // Biletin daha önce eklenip eklenmediğini kontrol et
           if (!in_array($row['id'], $uniqueTickets)) {
               echo "<tr>";
               echo "<td>" . $row['via_city'] . "</td>";
               echo "<td>" . $row['destination'] . "</td>";
               echo "<td>" . $row['bus_name'] . "</td>";
               echo "<td>" . $row['departure_date'] . "</td>";
               echo "<td>" . $row['departure_time'] . "</td>";
               echo "<td>" . $row['cost'] . "</td>";
               echo "<td>";
               echo '<button style="border:2px solid yellow; border-radius:7px; background-color:red;color:white;">';
               echo '<a href="pnr.php?id=' . $row['id'] . '">PNR KODU</a>';
               echo "</button>";
               echo "</td>";
               echo "</tr>";
               // Biletin bir kez eklendiğini işaretleyin
               $uniqueTickets[] = $row['id'];
           }
       }
       
    
       
          
        ?>
    
<?php

       echo "</table>";


?>






</div>

</body>
</html>