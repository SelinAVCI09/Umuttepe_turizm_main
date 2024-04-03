 <nav>
      <ul>
        <li class="logo"><h4>Umuttepe Turizm</h4></li>
        <li class="btn"><span class="fas fa-bars"></span></li>
        <div class="items">
          <li><a href="home.php">Ana sayfa</a></li>
          <li><a href="qr.html">QR</a></li>
       <!--   <li><a href="#">Ticket Book</a></li>-->

         
         <!-- <li><a href="#">Packages</a></li>-->
          <li><a href="loginMenu.php">Giriş</a></li>
          <li><a href="AboutUs.php">Bizim Hakkımızda</a></li>
           <li><a href="contact_us.php">İletişime Geçin</a></li>
            <li><a href="slide.php">Servisler</a></li>


        </div>
        <li class="search-icon">
          <input type="search" placeholder="Search">
          <label class="icon">
            <span class="fas fa-search"></span>
          </label>
        </li>
      </ul>
    </nav><!--
    <div class="content">
      <div class="text">Responsive Navbar with Searchbox</div>
      <div class="p">HTML and CSS (Flexbox) Full video tutorial</div>
    </div>-->

    <script>
      $('nav ul li.btn span').click(function(){
        $('nav ul div.items').toggleClass("show");
        $('nav ul li.btn span').toggleClass("show");
      });
    </script>