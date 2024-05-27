<?php
session_start();
require '../database.php';




if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    if (!empty($username) && !empty($password)) {
        $username = mysqli_real_escape_string($conn, $username);
        $password = mysqli_real_escape_string($conn, $password);

        $query = "SELECT * FROM user WHERE username = '$username'";
        $result = mysqli_query($conn, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);

           
            if (password_verify($password, $row['password'])) {
                $_SESSION['user_id'] = $row['id'];
                $_SESSION['username'] = $row['username'];

                
                if(isset($_SESSION['redirect_url'])) {
                    $redirect_url = $_SESSION['redirect_url'];
                    unset($_SESSION['redirect_url']);
                    header("Location: $redirect_url");
                } else {
                    
                    header("Location: ../profile/profile.php");
                }
                exit();
            } else {
                $error_message = "Password salah. Silakan coba lagi.";
            }
        } else {
            $error_message = "Username tidak ditemukan. Silakan coba lagi.";
        }
    } else {
        $error_message = "Semua field harus diisi.";
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css"  />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" />
    <script src="https://unpkg.com/feather-icons"></script>
    <title>Login Page</title>
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


.input {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  background: rgba(21, 26, 24, 0.9);
  padding: 50px;
  width: 320px;
  box-shadow: 0px 0px 15px 5px rgba(100, 99, 99, 0.748);
  border-radius: 15px;
}

.input h1 {
  text-align: center;
  color: white;
  font-size: 30px;
  font-family: sans-serif;
  letter-spacing: 3px;
  padding-top: 0;
  margin-top: -20px;
}

.box-input {
  display: flex;
  justify-content: space-between;
  margin: 10px;
  border-bottom: 2px solid white;
  padding: 8px 0;
}

.box-input i {
  font-size: 23px;
  color: white;
  padding: 5px 0;
}

.box-input input {
  width: 85%;
  padding: 5px 0;
  background: none;
  border: none;
  outline: none;
  color: white;
  font-size: 18px;
}

.box-input input::placeholder {
  color: white;
}

.btn-input .box-input input:hover {
  background: rgba(10, 10, 10, s 0.5);
}

.btn-input {
  margin-left: 10px;
  margin-bottom: 20px;
  background: none;
  border: 1px solid white;
  width: 92.5%;
  padding: 10px;
  color: white;
  font-size: 18px;
  letter-spacing: 3px;
  cursor: pointer;
  transition: all 0.2s;
  border-radius: 10px;
}

.btn-input:hover {
  background: #ff5500;
}

.bottom {
  margin-left: 10px;
  margin-right: 10px;
  margin-bottom: -20px;
}

.bottom p {
  color: white;
  font-size: 15px;
  text-decoration: none;
}

.bottom a {
  color: #ff5500;
  font-size: 15px;
  text-decoration: none;
}

.bottom a:hover {
  text-decoration: underline;
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

    <div class="input">
        <h1>LOGIN</h1>
        <?php if (!empty($error_message)) : ?>
            <div class="error-message"><?php echo $error_message; ?></div>
        <?php endif; ?>
        <form action="login.php" method="POST">
            <div class="box-input">
                <i class="fas fa-envelope-open-text"></i>
                <input type="text" name="username" placeholder="Username" required />
            </div>
            <div class="box-input">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" placeholder="Password" required />
            </div>
            <button type="submit" name="login" class="btn-input">Login</button>
            <div class="bottom">
                <p>
                    Belum punya akun?
                    <a href="../RGS/register.html">Registrasi disini</a>
                </p>
            </div>
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
