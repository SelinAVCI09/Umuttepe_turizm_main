<?php
session_start();
include("connection.php");

// Diğer sayfadan gelen id değerini al
if (isset($_GET['id'])) {
    $routeId = $_GET['id'];
} else {
    echo "id değeri belirtilmemiş.";
}

// Veritabanından dolu koltukları oturum kimliği ile çek
$sql = "SELECT seat, gender FROM booking WHERE route_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $routeId);
$stmt->execute();
$result = $stmt->get_result();

// Dolu koltukları saklamak için bir dizi oluştur
$bookedSeats = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $bookedSeats[$row["seat"]] = $row["gender"];
    }
}
?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title></title>
 

    <style>
    *, *:before, *:after {
  box-sizing: border-box;
}

html {
  font-size: 16px;
}

.plane {
  margin: 20px auto;
  max-width: 300px;
}

.exit {
  position: relative;
  height: 50px;
}
.exit:before, .exit:after {
  content: "EXIT";
  font-size: 14px;
  line-height: 18px;
  padding: 0px 2px;
  font-family: "Arial Narrow", Arial, sans-serif;
  display: block;
  position: absolute;
  background: red;
  color: white;
  top: 50%;
  transform: translate(0, -50%);
}
.exit:before {
  left: 0;
}
.exit:after {
  right: 0;
}

.fuselage {
  border-right: 5px solid #d8d8d8;
  border-left: 5px solid #d8d8d8;
}

ol {
  list-style: none;
  padding: 0;
  margin: 0;
}

.seats {
  display: flex;
  flex-direction: row;
  flex-wrap: nowrap;
  justify-content: flex-start;
}
.see {
  display: flex;
  flex: 0 0 14.28571428571429%;
  padding: 5px;
  position: relative;
}
.see label {
  display: block;
  position: relative;
  width: 100%;
  text-align: center;
  font-size: 14px;
  font-weight: bold;
  line-height: 1.5rem;
  padding: 4px 0;
  background: greenyellow;
  border-radius: 5px;
  animation-duration: 300ms;
  animation-fill-mode: both;
}

.seat {
  display: flex;
  flex: 0 0 14.28571428571429%;
  padding: 5px;
  position: relative;
}
.seat:nth-child(2) {
  margin-right: 14.28571428571429%;
}
.seat input[type=checkbox] {
  position: absolute;
  opacity: 0;
}
.seat input[type=checkbox]:checked + label {
  background: red;
  -webkit-animation-name: rubberBand;
  animation-name: rubberBand;
  animation-duration: 300ms;
  animation-fill-mode: both;
}
.seat input[type=checkbox]:disabled + label {
  background: #dddddd;
  text-indent: -9999px;
  overflow: hidden;
}
.seat input[type=checkbox]:disabled + label:after {
  content: "X";
  text-indent: 0;
  position: absolute;
  top: 4px;
  left: 50%;
  transform: translate(-50%, 0%);
}
.seat input[type=checkbox]:disabled + label:hover {
  box-shadow: none;
  cursor: not-allowed;
}
.seat label {
  display: block;
  position: relative;
  width: 100%;
  text-align: center;
  font-size: 14px;
  font-weight: bold;
  line-height: 1.5rem;
  padding: 4px 0;
  background: greenyellow;
  border-radius: 5px;
  animation-duration: 300ms;
  animation-fill-mode: both;
}
.seat label:before {
  content: "";
  position: absolute;
  width: 75%;
  height: 75%;
  top: 1px;
  left: 50%;
  transform: translate(-50%, 0%);
  background: rgba(255, 255, 255, 0.4);
  border-radius: 3px;
}
.seat label:hover {
  cursor: pointer;
  box-shadow: 0 0 0px 2px #5C6AFF;
}

@-webkit-keyframes rubberBand {
  0% {
    -webkit-transform: scale3d(1, 1, 1);
    transform: scale3d(1, 1, 1);
  }
  30% {
    -webkit-transform: scale3d(1.25, 0.75, 1);
    transform: scale3d(1.25, 0.75, 1);
  }
  40% {
    -webkit-transform: scale3d(0.75, 1.25, 1);
    transform: scale3d(0.75, 1.25, 1);
  }
  50% {
    -webkit-transform: scale3d(1.15, 0.85, 1);
    transform: scale3d(1.15, 0.85, 1);
  }
  65% {
    -webkit-transform: scale3d(0.95, 1.05, 1);
    transform: scale3d(0.95, 1.05, 1);
  }
  75% {
    -webkit-transform: scale3d(1.05, 0.95, 1);
    transform: scale3d(1.05, 0.95, 1);
  }
  100% {
    -webkit-transform: scale3d(1, 1, 1);
    transform: scale3d(1, 1, 1);
  }
}
@keyframes rubberBand {
  0% {
    -webkit-transform: scale3d(1, 1, 1);
    transform: scale3d(1, 1, 1);
  }
  30% {
    -webkit-transform: scale3d(1.25, 0.75, 1);
    transform: scale3d(1.25, 0.75, 1);
  }
  40% {
    -webkit-transform: scale3d(0.75, 1.25, 1);
    transform: scale3d(0.75, 1.25, 1);
  }
  50% {
    -webkit-transform: scale3d(1.15, 0.85, 1);
    transform: scale3d(1.15, 0.85, 1);
  }
  65% {
    -webkit-transform: scale3d(0.95, 1.05, 1);
    transform: scale3d(0.95, 1.05, 1);
  }
  75% {
    -webkit-transform: scale3d(1.05, 0.95, 1);
    transform: scale3d(1.05, 0.95, 1);
  }
  100% {
    -webkit-transform: scale3d(1, 1, 1);
    transform: scale3d(1, 1, 1);
  }
}
.rubberBand {
  -webkit-animation-name: rubberBand;
  animation-name: rubberBand;
}

    </style>
</head>
<body>



    <div class="plane">
        <h1>Koltuk Seçiniz</h1>
      <div class="fuselage">
        
 
      <div class="fuselage">
        <div>
          <li class="see label">
          <input type="checkbox" id="male" name="gender" value="male">
          <label for="male">Erkek</label>
        </li>
        </div>
        <div>
          <li class="see label">
          <input type="checkbox" id="female" name="gender" value="female">
          <label for="female">Kadın</label>
        </li>
        </div>


      
    <?php
            for ($i = 1; $i <= 10; $i++) {
                echo "<li class='seats--$i'>";
                echo "<ol class='seats' type='A'>";
                for ($j = 1; $j <= 4; $j++) {
                    $seat = $i . chr(64 + $j);
                    $disabled = isset($bookedSeats[$seat]);
                    $gender = isset($bookedSeats[$seat]) ? $bookedSeats[$seat] : "";
                    $color = $gender == "male" ? "blue" : ($gender == "female" ? "pink" : "greenyellow");
                    echo "<li class='seat' data-gender='$gender'>";
                    echo "<input type='checkbox' id='$seat' " . ($disabled ? "disabled" : "") . " />";
                    echo "<label for='$seat' style='background:$color'>" . $seat . "</label>";
                    echo "</li>";
                }
                echo "</ol>";
                echo "</li>";
            }
            ?>
            <br>
                <button style="border:8px solid red; border-radius:10px; background-color:red;color:white;" id="bookButton">Bilet Al</button>
<script>
    const bookedSeats = <?php echo json_encode($bookedSeats); ?>;

    // Koltuk seçme işlemi
    document.querySelectorAll('.seat input[type="checkbox"]').forEach(function(checkbox) {
        checkbox.addEventListener('change', function() {
            var selectedSeat = this.id;
            var selectedGender = this.parentElement.dataset.gender;

            // Seçilen koltuğun yanındaki koltuğun cinsiyetini kontrol et
            var adjacentSeat = checkAdjacentSeat(selectedSeat, selectedGender);
            if (!adjacentSeat) {
                // Yanındaki koltuk uygun değilse, seçimi iptal et
                this.checked = false;
                alert("Hata: Seçtiğiniz koltuk ve yanındaki koltuk cinsiyet uyumsuz.");
            }
        });
    });

    // Dolu koltukların yanındaki koltukların cinsiyetini kontrol etme işlevi
    function checkAdjacentSeat(seatId, gender) {
        // Koltuk numarasından sıra ve sütun bilgisini al
        var seatInfo = getSeatInfo(seatId);
        var row = seatInfo.row;
        var column = seatInfo.column;

        // Yanındaki koltukların sıra ve sütun numaralarını oluştur
        var adjacentSeats = [
            (row - 1) + column, // Üstteki koltuk
            (row + 1) + column, // Altındaki koltuk
            row + String.fromCharCode(column.charCodeAt(0) - 1), // Soldaki koltuk
            row + String.fromCharCode(column.charCodeAt(0) + 1) // Sağdaki koltuk
        ];

        // Yanındaki koltukların her birini kontrol et
        for (var i = 0; i < adjacentSeats.length; i++) {
            var adjacentSeat = adjacentSeats[i];
            if (bookedSeats.hasOwnProperty(adjacentSeat)) {
                var adjacentGender = bookedSeats[adjacentSeat];
                if ((gender === "male" && adjacentGender === "female") || (gender === "female" && adjacentGender === "male")) {
                    return false;
                }
            }
        }
        return true;
    }

    // Koltuk numarasından sıra ve sütun bilgisini alma işlevi
    function getSeatInfo(seatId) {
        var match = seatId.match(/(\d+)([A-Z])/);
        return {
            row: parseInt(match[1]),
            column: match[2]
        };
    }

    const maleCheckbox = document.getElementById('male');
    const femaleCheckbox = document.getElementById('female');
    const seats = document.querySelectorAll('.seat input[type="checkbox"]');
    const bookButton = document.getElementById('bookButton');

    maleCheckbox.addEventListener('change', function() {
        if (this.checked) {
            femaleCheckbox.checked = false;
            seats.forEach(seat => {
                seat.addEventListener('change', function() {
                    if (this.checked) {
                        this.parentElement.style.background = 'blue';
                    }
                });
            });
        }
    });

    femaleCheckbox.addEventListener('change', function() {
        if (this.checked) {
            maleCheckbox.checked = false;
            seats.forEach(seat => {
                seat.addEventListener('change', function() {
                    if (this.checked) {
                        this.parentElement.style.background = 'pink';
                    }
                });
            });
        }
    });

    bookButton.addEventListener('click', function() {
        const selectedSeat = document.querySelector('.seat input[type="checkbox"]:checked');
        if (!selectedSeat) {
            alert('Lütfen bir koltuk seçin.');
            return;
        }

        const seatLabel = selectedSeat.parentElement.textContent.trim();
        const seatNumber = seatLabel.replace(/[^A-Za-z0-9]/g, '');
        const routeId = "<?php echo $routeId; ?>";

        const selectedGender = document.querySelector('input[name="gender"]:checked').value;

        // Form oluştur
        const form = document.createElement('form');
        form.method = 'GET'; // GET metoduyla gönderim yapılacak
        form.action = 'AddBooking.php'; // Formun gönderileceği dosya

        // Koltuk ve cinsiyeti gizli alan olarak forma ekle
        const seatInput = document.createElement('input');
        seatInput.type = 'hidden';
        seatInput.name = 'seat'; 
        seatInput.value = seatNumber;
        form.appendChild(seatInput);

        const routeInput = document.createElement('input');
        routeInput.type = 'hidden';
        routeInput.name = 'route_id'; 
        routeInput.value = routeId;
        form.appendChild(routeInput);

        const genderInput = document.createElement('input');
        genderInput.type = 'hidden';
        genderInput.name = 'gender';
        genderInput.value = selectedGender;
        form.appendChild(genderInput); 

        // Formu sayfaya ekleyerek gönder
        document.body.appendChild(form);
        form.submit();
    });
</script>

  
  </body>

  </html>