<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Booking</title>
    <script src="https://unpkg.com/feather-icons"></script>
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
  z-index: 1000; 
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
  list-style: none; 
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
  right: 0; 
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


.dropdown:hover .dropdown-content {
  display: block;
}

.container {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  background: rgba(21, 26, 24, 0.9);
  padding: 50px;
  width: 320px;
  box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
  border-radius: 15px;
  color: white; 
  box-shadow: 0px 0px 15px 5px rgba(100, 99, 99, 0.748);
}

h2 {
  text-align: center;
  color: white; 
  font-size: 24px; 
  margin-bottom: 20px; 
}

form {
  display: flex;
  flex-direction: column;
}

label {
  margin-bottom: 10px;
  font-weight: bold;
}

input[type="date"] {
  padding: 10px;
  margin-bottom: 20px;
  border: 1px solid white; 
  border-radius: 5px;
  font-size: 16px;
  background: none; 
  color: white; 
  outline: none; 
}

button[type="submit"] {
  padding: 10px 20px;
  background-color: #ff5500; 
  color: white; 
  border: none;
  border-radius: 5px;
  cursor: pointer;
  font-size: 16px;
  transition: background-color 0.3s; 
}

button[type="submit"]:hover {
  background-color: #d44600; 
}

        footer {
  padding: 1rem;
  background-color: rgba(241, 241, 241, 0.8);
  display: flex;
  flex-direction: column; 
  align-items: center; 
  margin-top: 100vh;
}

footer main {
  display: flex;
  justify-content: space-between; 
  width: 100%; 
}

.contact ul,
.sosmed ul {
  list-style: none;
  padding: 0;
  margin: 0; 
}

.contact ul li,
.sosmed ul li {
  display: flex;
  align-items: center; 
  margin-bottom: 0.5rem;
  margin-right: 50px;
  margin-left: 30px;
}

.contact ul li a,
.sosmed ul li a {
  text-decoration: none;
  color: rgb(13, 13, 13);
  margin-left: 1rem; 
  font-size: 16px;
}

.contact ul li a:hover,
.sosmed ul li a:hover,
.contact ul li i:hover,
.sosmed ul li i:hover {
  color: #ff5500; 
}


.sosmed {
  display: flex;
  justify-content: flex-end;

  align-items: flex-end; 
}

.sosmed ul li {
  margin-bottom: 0.5rem;
}
.copyright {
  text-align: center;
  margin-top: 1rem; 
  font-size: 14px;
  color: rgb(29, 29, 29); 
  width: 100%; 
}
    </style>
</head>
<body>
<nav>
    <div>
        <a href="/"><b>MADURA99</b></a>
      </div>
      <ul>
        <a href="../Madura/home.html">Home</a>
        <a href="../Madura/home.html#Layanan">Layanan</a>
        <a href="../index.php">Booking</a>
        <li class="dropdown">
          <a href="login"><i data-feather="user"></i></a>
          <div class="dropdown-content">
            <a href="../login/login.php">Login</a>
            <a href="../RGS/register.html">Sign Up</a>
            <a href="../profile/profile.php">Profile</a>
          </div>
        </li>
      </ul>
    </nav>
    <div class="container">
        <h2>Update Booking</h2>
        <form action="updateBooking.php" method="POST">
            <input type="hidden" name="booking_id" value="<?php echo $_GET['id']; ?>">
            <label for="new_date">Tanggal Baru:</label>
            
            <input type="date" id="new_date" name="new_date" min="<?php echo date('Y-m-d'); ?>" required>
            <button type="submit">Update</button>
        </form>
    </div>
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
