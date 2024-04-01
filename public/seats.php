<?php 

	session_start();

?><?php include("connection.php")?>
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
        <h1>Selecionar lugar</h1>
      <div class="fuselage">
        
      </div>
      <ol class="cabin fuselage">
        <li class="row row--1">
          <ol class="seats" type="A">
            <li class="seat">
              <input type="checkbox" id="1A" />
              <label for="1A">1A</label>
            </li>
            <li class="seat">
              <input type="checkbox" id="1B" />
              <label for="1B">1B</label>
            </li>
            <li class="seat">
              <input type="checkbox" id="1C" />
              <label for="1C">1C</label>
            </li>
            <li class="seat">
              <input type="checkbox" disabled id="1D" />
              <label for="1D">1D</label>
            </li>
          </ol>
        </li>
        <li class="row row--2">
          <ol class="seats" type="A">
            <li class="seat">
              <input type="checkbox" id="2A" />
              <label for="2A">2A</label>
            </li>
            <li class="seat">
              <input type="checkbox" id="2B" />
              <label for="2B">2B</label>
            </li>
            <li class="seat">
              <input type="checkbox" id="2C" />
              <label for="2C">2C</label>
            </li>
            <li class="seat">
              <input type="checkbox" id="2D" />
              <label for="2D">2D</label>
            </li>
          </ol>
        </li>
        <li class="row row--3">
          <ol class="seats" type="A">
            <li class="seat">
              <input type="checkbox" id="3A" />
              <label for="3A">3A</label>
            </li>
            <li class="seat">
              <input type="checkbox" id="3B" />
              <label for="3B">3B</label>
            </li>
            <li class="seat">
              <input type="checkbox" id="3C" />
              <label for="3C">3C</label>
            </li>
            <li class="seat">
              <input type="checkbox" id="3D" />
              <label for="3D">3D</label>
            </li>
          </ol>
        </li>
        <li class="row row--4">
          <ol class="seats" type="A">
            <li class="seat">
              <input type="checkbox" id="4A" />
              <label for="4A">4A</label>
            </li>
            <li class="seat">
              <input type="checkbox" id="4B" />
              <label for="4B">4B</label>
            </li>
            <li class="seat">
              <input type="checkbox" id="4C" />
              <label for="4C">4C</label>
            </li>
            <li class="seat">
              <input type="checkbox" id="4D" />
              <label for="4D">4D</label>
            </li>
          </ol>
        </li>
        <li class="row row--5">
          <ol class="seats" type="A">
            <li class="seat">
              <input type="checkbox" id="5A" />
              <label for="5A">5A</label>
            </li>
            <li class="seat">
              <input type="checkbox" id="5B" />
              <label for="5B">5B</label>
            </li>
            <li class="seat">
              <input type="checkbox" id="5C" />
              <label for="5C">5C</label>
            </li>
            <li class="seat">
              <input type="checkbox" id="5D" />
              <label for="5D">5D</label>
            </li>
          </ol>
        </li>
        <li class="row row--6">
          <ol class="seats" type="A">
            <li class="seat">
              <input type="checkbox" id="6A" />
              <label for="6A">6A</label>
            </li>
            <li class="seat">
              <input type="checkbox" id="6B" />
              <label for="6B">6B</label>
            </li>
            <li class="seat">
              <input type="checkbox" id="6C" />
              <label for="6C">6C</label>
            </li>
            <li class="seat">
              <input type="checkbox" id="6D" />
              <label for="6D">6D</label>
            </li>
          </ol>
        </li>
        <li class="row row--7">
          <ol class="seats" type="A">
            <li class="seat">
              <input type="checkbox" id="7A" />
              <label for="7A">7A</label>
            </li>
            <li class="seat">
              <input type="checkbox" id="7B" />
              <label for="7B">7B</label>
            </li>
            <li class="seat">
              <input type="checkbox" id="7C" />
              <label for="7C">7C</label>
            </li>
            <li class="seat">
              <input type="checkbox" id="7D" />
              <label for="7D">7D</label>
            </li>
          </ol>
        </li>
        <li class="row row--8">
          <ol class="seats" type="A">
            <li class="seat">
              <input type="checkbox" id="8A" />
              <label for="8A">8A</label>
            </li>
            <li class="seat">
              <input type="checkbox" id="8B" />
              <label for="8B">8B</label>
            </li>
            <li class="seat">
              <input type="checkbox" id="8C" />
              <label for="8C">8C</label>
            </li>
            <li class="seat">
              <input type="checkbox" id="8D" />
              <label for="8D">8D</label>
            </li>
          </ol>
        </li>
        <li class="row row--9">
          <ol class="seats" type="A">
            <li class="seat">
              <input type="checkbox" id="9A" />
              <label for="9A">9A</label>
            </li>
            <li class="seat">
              <input type="checkbox" id="9B" />
              <label for="9B">9B</label>
            </li>
            <li class="seat">
              <input type="checkbox" id="9C" />
              <label for="9C">9C</label>
            </li>
            <li class="seat">
              <input type="checkbox" id="9D" />
              <label for="9D">9D</label>
            </li>
          </ol>
        </li>
        <li class="row row--10">
          <ol class="seats" type="A">
            <li class="seat">
              <input type="checkbox" id="10A" />
              <label for="10A">10A</label>
            </li>
            <li class="seat">
              <input type="checkbox" id="10B" />
              <label for="10B">10B</label>
            </li>
            <li class="seat">
              <input type="checkbox" id="10C" />
              <label for="10C">10C</label>
            </li>
            <li class="seat">
              <input type="checkbox" id="10D" />
              <label for="10D">10D</label>
            </li>
          </ol>
        </li>
      </ol>
      <div class="fuselage">
        <div>
          <li class="seat">
          <input type="checkbox" id="male" name="gender" value="male">
          <label for="male">Erkek</label>
        </li>
        </div>
        <div>
          <li class="seat">
          <input type="checkbox" id="female" name="gender" value="female">
          <label for="female">Kadın</label>
        </li>
        </div>
        <div class="fuselage"></div>
    <button id="bookButton">Rezervasyon Yap</button>
      </div>
    </div>
    <script>
  const maleCheckbox = document.getElementById('male');
  const femaleCheckbox = document.getElementById('female');
  const seats = document.querySelectorAll('.seat input[type="checkbox"]');
  const bookButton = document.getElementById('bookButton');

  // Yardımcı fonksiyon: Koltuk numarasından sıra ve sütun bilgisini alır
  function getSeatInfo(seatId) {
    const match = seatId.match(/(\d+)([A-Z])/);
    return {
      row: parseInt(match[1]),
      column: match[2]
    };
  }

  // Yardımcı fonksiyon: Verilen iki koltuk numarasının yan yana olup olmadığını kontrol eder
  function areSeatsAdjacent(seatId1, seatId2) {
    const seat1Info = getSeatInfo(seatId1);
    const seat2Info = getSeatInfo(seatId2);
    // Yan yana olup olmadığını kontrol etmek için sıra numaralarını ve sütun harflerini karşılaştırıyoruz
    return (
      Math.abs(seat1Info.row - seat2Info.row) === 0 && // Aynı sıra
      Math.abs(seat1Info.column.charCodeAt(0) - seat2Info.column.charCodeAt(0)) === 1 // Yan yana sütunlar
    );
  }

  maleCheckbox.addEventListener('change', function() {
    if (this.checked) {
      femaleCheckbox.checked = false;
      seats.forEach(seat => {
        seat.addEventListener('change', function() {
          if (this.checked) {
            this.parentElement.style.background = 'blue';
            const selectedGender = document.querySelector('input[name="gender"]:checked');
            if (selectedGender && selectedGender.value === 'female' && areSeatsAdjacent('1B', '1C')) {
              alert('Kadın ve erkek yan yana oturamaz!');
            }
          } else {
            this.parentElement.style.background = 'greenyellow';
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
            const selectedGender = document.querySelector('input[name="gender"]:checked');
            if (selectedGender && selectedGender.value === 'male' && areSeatsAdjacent('1B', '1C')) {
              alert('Kadın ve erkek yan yana oturamaz!');
            }
          } else {
            this.parentElement.style.background = 'greenyellow';
          }
        });
      });
    }
  });

  // Butona tıklandığında formu gönder
// Butona tıklandığında formu gönder
bookButton.addEventListener('click', function() {
    const selectedSeat = document.querySelector('.seat input[type="checkbox"]:checked');
    if (!selectedSeat) {
        alert('Lütfen bir koltuk seçin.');
        return;
    }

    const selectedGender = document.querySelector('input[name="gender"]:checked').value;

    // Form oluştur
    const form = document.createElement('form');
    form.method = 'GET'; // GET metoduyla gönderim yapılacak
    form.action = 'AddBooking.php'; // Formun gönderileceği dosya

    // Koltuk ve cinsiyeti gizli alan olarak forma ekle
    const seatInput = document.createElement('input');
    seatInput.type = 'hidden';
    seatInput.name = 'seat'; 
    seatInput.value = selectedSeat.id;
    form.appendChild(seatInput);

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