<?php 
session_start();

require '../functions.php';

if ( isset($_POST["login"]) ){

    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username' ");

    //cek username
    if ( mysqli_num_rows($result) === 1 ){
        
        //cel password
        $row = mysqli_fetch_assoc($result);
        if ( password_verify($password, $row["password"]) ){

            // cek session
            $_SESSION["admin"]= true;

            header("Location: index.php");
            exit;
        }
    }

    $error = true;
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admiistrator</title> 

    <link href="https://fonts.googleapis.com/css2?family=Viga&display=swap" rel="stylesheet"> 
    <link href="../asset/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <style>
    body
      {
          background-image: url(../asset/img/belakang.jpg);
          background-size: cover;
          background-attachment: fixed;

      }

      #card {
        background: #fbfbfb;
        border-radius: 8px;
        box-shadow: 1px 2px 8px rgba(0, 0, 0, 0.65);
        height: 408px;
        margin: 6rem auto 8.1rem auto;
        width: 329px;
        }

        #card-content{
            padding: 12px 44px;
        }
        #judul{
            font-family: Viga;
            text-align: center;
            letter-spacing: 1px;
            padding-bottom: 10px;
            padding-top: 5px;
            font-size: 18px;
        }
       .garisbawah{
        background: -webkit-linear-gradient(right, #a6f77b, #2ec06f);
        height: 3px;
        margin: -1.1rem auto 0 auto;
        width: 150px;
       } 

       label {
        font-family:Viga;
        font-size: 11pt;
        letter-spacing: 1px;
        }

        .form {
        align-items: left;
        display: flex;
        flex-direction: column;
        }
        .form : i {
            color: #a6f77b;
        }

        .form-border {
        background: -webkit-linear-gradient(right, #a6f77b, #2ec06f);
        height: 2px;
        width: 100%;
        }

        .form-content {
        background: #fbfbfb;
        border: none;
        outline: none;
        padding-bottom: 10px;
        padding-top: 5px;  
        }

        .login{
        background: -webkit-linear-gradient(right, #a6f77b, #2dbd6e);
        border: none;
        border-radius: 20px;
        box-shadow: 0px 1px 8px #24c64f;
        cursor: pointer;
        color: white;
        font-family: sans-serif;
        margin: 0 auto;
        margin-top: 20px;
        transition: 0.25s;
        width: 200px;
        height: 30px;
        font-size: 18px;
        }
        .login:hover{
            box-shadow: 0px 1px 18px #24c64f;
        }

        .kembali{
        background: -webkit-linear-gradient(right, #a6f77b, #2dbd6e);
        border: none;
        border-radius: 20px;
        box-shadow: 0px 1px 8px #24c64f;
        cursor: pointer;
        color: white;
        font-family: sans-serif;
        margin: 0 auto;
        margin-top: 2px;
        transition: 0.25s;
        width: 200px;
        height: 30px;
        font-size: 18px;
        text-align: center;  
        }

        .kembali:hover{
            box-shadow: 0px 1px 18px #24c64f; 
        }
    
    </style>
</head>
<body>

    <div id="card">
        <div id="card-content">
            <div id="judul">
            <i class="fas fa-book fa-2x"></i>
            <h4>LOGIN ADMINISTRATOR</h4>
            <div class="garisbawah"></div>
        </div>

        <?php if ( isset($error) ) : ?>
            <p style="color: red; font-style : italic; text-align: center;">username / password salah</p>
        <?php endif; ?>

        <form action="" method="post" class="form">
            
                    <label for="username" style="padding-top:10px">Username</label>
                    <span>
                        <i class="fas fa-user "></i>
                        <input  id="username" class="form-content" type="text" name="username" required>
                        <div class="form-border"></div>
                    </span>
                    
                    <label for="password" style="padding-top:20px">Password</label>
                    <span>
                        <i class="fas fa-key"></i>
                        <input id="password" class="form-content" type="password" name="password" required>
                        <div class="form-border"></div>
                    </span>

            <button type="submit" name="login" class="login" >LOGIN</button>
            <br>
            <a href="../index.php" name="kembali" class="kembali">KEMBALI</a>
        </form>
        </div>
    </div>

</body>
</html>