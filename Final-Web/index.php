<?php
session_start();


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://unpkg.com/feather-icons"></script>

  <!--=============== CSS ===============-->
  <style>
     body {
  margin: 0;
  padding: 0;

  background-image: url("../Madura/bgBaru.png");
  font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
}
      
nav {
  display: flex;
  justify-content: space-between;
  padding: 1rem;
  align-items: center;
  background-color: rgb(13, 13, 13);
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  z-index: 1000; /* Ensure nav is above other content */
}

nav div a {
  display: flex;
  font-size: 30px;
  text-decoration: none;
  color: #ff7315;
}

nav ul {
  display: flex;
  gap: 2rem;
  margin-right: 1rem;
  list-style: none; /* Add this line to remove default list style */
}

nav ul a {
  font-size: 20px;
  font-weight: 600;
  text-decoration: none;
  padding: 8px;
  color: whitesmoke;
}

nav ul a:hover {
  color: #ff5500;
  border-bottom: 1px solid white;
}

/* Dropdown styles */
.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: white;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
  z-index: 1;
  right: 0; /* Align dropdown to the right edge */
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {
  background-color: #ddd;
}

/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-content {
  display: block;
}
footer {
  padding: 1rem;
  background-color: rgba(241, 241, 241, 0.8);
  display: flex;
  flex-direction: column; /* Susun anak-anak secara vertikal */
  align-items: center; /* Pusatkan anak-anak secara horizontal */
  margin-top: 100vh;
}

footer main {
  display: flex;
  justify-content: space-between; /* Pisahkan elemen anak */
  width: 100%; /* Ambil lebar penuh dari footer */
}

.contact ul,
.sosmed ul {
  list-style: none;
  padding: 0;
  margin: 0; /* Tambahkan margin 0 untuk menghilangkan margin default */
}

.contact ul li,
.sosmed ul li {
  display: flex;
  align-items: center; /* Pusatkan item dalam list secara vertikal */
  margin-bottom: 0.5rem;
  margin-right: 50px;
  margin-left: 30px;
}

.contact ul li a,
.sosmed ul li a {
  text-decoration: none;
  color: rgb(13, 13, 13);
  margin-left: 1rem; /* Beri jarak antara ikon dan teks */
  font-size: 16px;
}

.contact ul li a:hover,
.sosmed ul li a:hover,
.contact ul li i:hover,
.sosmed ul li i:hover {
  color: #ff5500; /* Warna latar belakang saat hover */
}

/* Atur posisi sosial media di kanan */
.sosmed {
  display: flex;
  justify-content: flex-end;

  align-items: flex-end; /* Sejajarkan item ke kanan */
}

.sosmed ul li {
  margin-bottom: 0.5rem;
}
.copyright {
  text-align: center;
  margin-top: 1rem; /* Tambahkan spasi di atas teks copyright */
  font-size: 14px;
  color: rgb(29, 29, 29); /* Atur warna abu-abu */
  width: 100%; /* Ambil lebar penuh dari footer */
}
  </style>
  <link rel="stylesheet" href="assets/css/styles.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" />

  <title>Landscape responsive card - Bedimcode</title>
</head>
<body>
<nav>
    <div>
        <a href="/"><b>MADURA99</b></a>
      </div>
      <ul>
        <a href="Madura/home.html">Home</a>
        <a href="Madura/home.html#Layanan">Layanan</a>
        <a href="index.php">Booking</a>
        <li class="dropdown">
          <a href="login"><i data-feather="user"></i></a>
          <div class="dropdown-content">
            <a href="login/login.php">Login</a>
            <a href="RGS/register.html">Sign Up</a>
            <a href="profile/profile.php">Profile</a>
          </div>
        </li>
      </ul>
    </nav>
  <div class="container">
    <div class="card__container">
      <article class="card__article">
        <img src="assets/img/landscape-4.jpg" alt="image" class="card__img" />
        <div class="card__data">
          <h2 class="card__title">Kang Faisal</h2>
          <span class="card__description">
            Faisal, ahli pengasahan pisau dan pembawa cerita misterius.
            Nikmati pengalaman unik di kursi cukur sambil mendengarkan kisah
            petualangannya yang menarik!
          </span>
        </div>
      </article>

      <article class="card__article">
        <img src="assets/img/landscape-2.jpg" alt="image" class="card__img" />
        <div class="card__data">
          <h2 class="card__title">Mister Farel</h2>
          <span class="card__description">
            Farel, seniman rambut dengan keahlian tak tertandingi yang membuat
            setiap potongan menjadi karya seni. Bersiaplah untuk menikmati
            harmoni musik dan rambut di bawah tangan ahli!
          </span>
        </div>
      </article>

      <article class="card__article">
        <img src="assets/img/landscape-3.jpg" alt="image" class="card__img" />
        <div class="card__data">
          <h2 class="card__title">Senior Ippank</h2>
          <span class="card__description">
            Ippank, pemberani di kursi cukur dan ahli dalam menciptakan
            suasana yang santai. Bersiaplah untuk humor khasnya yang membuat
            Anda nyaman di setiap potongan rambut!
          </span>
        </div>
      </article>
    </div>
    <!-- Booking Form -->
    <div class="booking-form">
      <h2>Booking Form</h2>
      <?php if(!empty($error_message)) { ?>
        <div class="error-message"><?php echo $error_message; ?></div>
      <?php } ?>
      <form id="bookingForm" action="booking.php" method="post" onsubmit="return validateBooking()">


        <div class="form-group">
          <label for="booking-date">Pilih Tanggal Booking :</label>
          <input type="text" id="booking-date" name="booking_date" required />
        </div>
        <div class="form-group">
          <input type="submit" class="form-button" value="Booking Sekarang">
        </div>
      </form>
    </div>
  </div>

  <!-- Flatpickr JS -->
  <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
  <script>
    flatpickr("#booking-date", {
      dateFormat: "Y-m-d",
      minDate: "today",
      altInput: true,
      altFormat: "F j, Y",
      disableMobile: "true",
    });

    function validateBooking() {
      var bookingDate = document.getElementById("booking-date").value;
      if (bookingDate === "") {
        alert("Masukkan Tanggal Bookingnya Mas Broo");
        return false; 
      } else {
        return true; 
      }
    }

  </script>
   <footer>
      <main>
        <div class="contact">
          <h3>Kontak Kami <br /><br /></h3>
          <ul>
            <li>
              <i data-feather="map-pin"></i>
              <a href="https://maps.app.goo.gl/pWScWGZzwadpsGyu6"
                >Jl. Urip Sumoeharjo</a
              >
            </li>
            <li>
              <i data-feather="phone"></i>
              <a href="https://wa.me/6281212000637">0812 1200 0637</a>
            </li>
            <li>
              <i data-feather="mail"></i>
              <a href="mailto:iccankar04@gmail.com">iccankar04@gmail.com</a>
            </li>
          </ul>
        </div>
        <div class="sosmed">
          <ul>
            <li>
              <a href="https://www.facebook.com"
                ><i data-feather="facebook" width="50px" height="50px"></i
              ></a>
            </li>
          </ul>
          <ul>
            <li>
              <a href="https://www.instagram.com/"
                ><i data-feather="instagram" width="50px" height="50px"></i
              ></a>
            </li>
          </ul>
          <ul>
            <li>
              <a href="https://www.youtube.com"
                ><i data-feather="youtube" width="50px" height="50px"></i
              ></a>
            </li>
          </ul>
        </div>
      </main>
      <div class="copyright">&copy; 2024 MADURA99. All rights reserved.</div>
    </footer>

    <script>
      feather.replace();
    </script>
</body>
</html>
