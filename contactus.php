<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="3.jpg">
    <title>SignUp</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- CSS -->
     <style>
        body{
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
            background-color: #000000;
            background-image: url('images/background.jpg');
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
            background-color: #cacacaab;
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
                 CONTACT US 
                 </h2><br><br>

            <div class="form-group">
                <form action="">
                    <div class="row mb-3">
                        <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputName" required>
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="inputEmail" required>
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="txtarea" class="col-sm-2 col-form-label">Message</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="txtarea" placeholder="" required></textarea>
                        </div>
                    </div>
                      

                      <a href=""><button type="submit" id="signup-btn">SUBMIT</button></a>
                      <a href="index.html"><button type="button" id="back-btn-main">HOME</button></a>

                </form>
            </div>
            
            <!-- <div class="button-group">
                <button id="signup-btn">SIGN UP</button>
                <button id="login-btn-main">BACK</button>
            </div> -->
        </div>
        
    </div>
    
    
</body>
</html>