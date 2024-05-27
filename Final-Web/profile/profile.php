<?php
session_start();

require '../database.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="profileStyle.css">
    <script src="https://unpkg.com/feather-icons"></script>
    <style>
      
body {
  margin: 0;
  padding: 0;

  background-image: url("../Madura/bgBaru.png");
  background-color: #1a472a;
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

.profile-container {
  position: absolute;
  top: 50%; 
  left: 50%; 
  transform: translate(-50%, -50%);
  max-width: 800px;
  margin: 0 auto;
  padding: 20px;
  background-color: rgba(21, 26, 24, 0.9); 
  border-radius: 15px;
  box-shadow: 0px 0px 15px 5px rgba(100, 99, 99, 0.748);
}


.profile-container h2 {
  margin-bottom: 20px;
  text-align: center;
  color: white; 
  font-size: 30px; 
  letter-spacing: 3px;
}

.user-info {
  margin-bottom: 20px;
  text-align: center;
}

.user-info h3 {
  font-size: 18px;
  color: white; 
}
.user-info a {
  font-size: 50px;
  color: white; 
}

.booking-table {
  overflow-x: auto;
}

.booking-table h3 {
  margin-bottom: 10px;
  font-size: 16px;
  color: white; 
}

table {
  width: 100%;
  border-collapse: collapse;
}

table th,
table td {
  padding: 10px;
  text-align: left;
  border-bottom: 1px solid #ddd;
  color: white; 
}

table th {
  background-color: #f2f2f2;
}

table td {
  background-color: #fff;
}

table td a {
  color: #007bff;
  text-decoration: none;
  margin-right: 10px;
}

table td a:hover {
  text-decoration: underline;
}
table {
  width: 100%;
  border-collapse: collapse;
  background-color: #fff; 
  color: #333; 
}

table th,
table td {
  padding: 10px;
  text-align: left;
  border-bottom: 1px solid #ddd;
}

table th {
  background-color: #1a472a;
}

table td {
  background-color: #1a472a;
}

table td a {
  color: #007bff;
  text-decoration: none;
  margin-right: 10px;
}

table td a:hover {
  text-decoration: underline;
}


footer {
  padding: 1rem;
  background-color: rgba(241, 241, 241, 0.8);
  display: flex;
  flex-direction: column; 
  align-items: center; 
  margin-top: 90vh;
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

    <div class="profile-container">
        <h2>Profile</h2>
        <div class="user-info">
            <i data-feather="user" color=" #ff7315" width="80px" height="80px"></i>
            <h3><?php echo $_SESSION['username']; ?></h3>
        </div>
        <div class="booking-table">
            <h3>Bookingan Anda</h3>
            <table>
                <tr>
                    <th>No</th>
                    <th>Tanggal Booking</th>
                    <th>Harga</th>
                    <th>Aksi</th>
                </tr>
                <?php
               
                $today = date('Y-m-d');

                
                $userId = $_SESSION['user_id'];
                $query = "SELECT * FROM booking WHERE id_user = $userId AND tanggal >= '$today' ORDER BY tanggal ASC";
                $result = mysqli_query($conn, $query);

                if (!$result) {
                    die("Query gagal: " . mysqli_error($conn));
                }

                $counter = 1;
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $counter++ . "</td>";
                    echo "<td>" . $row['tanggal'] . "</td>";
                    echo "<td>" . $row['harga'] . "</td>";
                    echo "<td>
                            <a href='updateBookingForm.php?id=" . $row['id_booking'] . "'>Update</a> |
                            <a href='delete_booking.php?id=" . $row['id_booking'] . "'>Delete</a>
                          </td>";
                    echo "</tr>";
                }
                ?>
            </table>
        </div>
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
