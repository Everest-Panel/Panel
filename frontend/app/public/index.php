<?php 

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Everest Panel | Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="/api/dump/?type=styles&file=default.css">
        <link rel="stylesheet" type="text/css" href="/api/dump/?type=styles&file=login.css">
    </head>
    <body>
        <div class="background">
            <video autoplay loop>
                <source src="/api/dump/?type=videos&file=particles_floating.mp4" type="video/mp4">
            </video>
        </div>
        <div id="login">
            <div class="icon">
                <img class="icon" alt="Everest Icon" draggable="false" src="/api/dump/?type=images&file=everest.png">
            </div>
            <div class="title">
                Everest Login
            </div>
            <div class="bars">
                <div class="bar active"></div>
                <div class="bar"></div>
            </div>
            <div class="inputs">
                <div class="input">
                    <label for="username">Username</label>
                    <input id="username" type="text" placeholder="JohnDoe" maxlength="30" autofocus tabindex="1">
                </div>
                <div class="input">
                    <label for="password">Password</label>
                    <input id="password" type="password" placeholder="SuperSecret" maxlength="254" tabindex="2">
                </div>
                <div class="input">
                    <div class="small">
                        <div class="text">Forgot Password?</div>
                    </div>
                </div>
                <div class="input">
                    <div class="submit">Submit</div>
                </div>
            </div>
        </div>
    </body>
</html>