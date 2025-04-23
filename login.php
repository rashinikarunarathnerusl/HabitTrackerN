<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="3.jpg">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- CSS -->
     <style>
        body{
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
            background-image: url('images/background.jpg');
            background-size: cover;
        }
        .image{
            width: 100%;
            height: 100vh;
            background-size: cover;
            background-position: center;
            /* display: flex; */
            justify-content: center;
            align-items: center;
        }
        /* .logo{
            width: 15vh;
            height: 15vh;
            margin: 40px 40px 0 auto;
            display: block;
            border-radius: 10px;
            background-color: transparent;
        } */
        img{
            width: 25vh;
            height: 25vh;
            margin: 40px 40px 0 auto;
            display: block;
            background-color: #5d5e5d;
            border-radius: 20px;
            background-color: transparent;
            border: #000000 solid 2px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        }
        .header{
            position: absolute;
            top: 50%;
            left: 50%;
            background-color: #ddddddab;
            border-radius: 20px;
            padding: 40px;
            transform: translate(-50%, -50%);
            text-align: center;
        }
        .header h1{
            color: #000000;
            font-size: 50px;
            margin: 0;
            padding: 0;
        }
        .header h2{
            text-align: center;
        }
        button {
            background-color: #3a3a3a;
            color: white;
            padding: 8px 24px;
            border: none;
            border-radius: 50px;
            cursor: pointer;
            margin: 10px 5px;
            font-size: 15px;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #5d5e5d;
        }
        .form-control{
            background-color: #b6b6b6;
            border-radius: 10px;
            border: 2px solid #0000005b;
        }
     </style>

</head>
<body>
    <div class="image">
        
        <img class="logo" src="images/3.jpg" alt="logo">
        <div class="header">
            <h2>
                 Login to your Account 
                 </h2><br><br>

            <div class="form-group">
                <form id="loginForm" action="controller/login.php" method="POST">
                    <div class="row mb-3">
                      <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                      <div class="col-sm-10">
                        <input type="email" class="form-control" id="inputEmail" name="email" required>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                      <div class="col-sm-10">
                        <input type="password" class="form-control" id="inputPassword" name="password" required>
                      </div>
                    </div>

                    <?php
                        session_start();
                        if (isset($_SESSION['error'])) {
                            echo '<p class="error">' . $_SESSION['error'] . '</p>';
                            unset($_SESSION['error']);
                        }
                        if (isset($_SESSION['success'])) {
                            echo '<p class="success">' . $_SESSION['success'] . '</p>';
                            unset($_SESSION['success']);
                        }
                    ?>
                    
                    <button type="submit" id="signup-btn">LOGIN</button>
                    <a href="index.html"><button type="button" id="back-btn-main">BACK</button></a><br>
                    <b>Don't have an account?</b> <a href="signup.php">signup here</a> <br> 

                </form>
            </div>
        </div>      
    </div>
    

    <!-- <script>
    document.getElementById('loginForm').addEventListener('submit', function(e) {
        e.preventDefault();
    
        var email = document.getElementById('inputEmail').value;
        var password = document.getElementById('inputPassword').value;
    
        if (email === 'sss@gmail.com' && password === '1111') {
            window.location.href = 'tracker.html';
        } else {
            alert('Invalid email or password');
        }
    });     
    </script> -->
    
</body>
</html>