<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="src/css/login.css?v=<?php echo time(); ?>">
    <title>Sign In</title>
</head>

<body>
    <div class="split-screen">
        <div class="left">
            <section class="copy">
                <h1>Exlplore your Creativity</h1>
                <p>Over 1000 courses taught by real creatives.</p>
            </section>
        </div>
        <div class="right">
            <form action="">
                <section class="copy">
                    <h2>Sign In</h2>
                <br>
                </section>
                <div class="input-container email">
                    <label for="email ">Email</label>
                    <input type="text" name="email" id="email">
                </div>
                <div class="input-container password">
                    <label for="password ">Password</label>
                    <input type="password" name="password" id="password" placeholder="Must be at least 6 characters">
                    <i class="far fa-eye-slash"></i>
                </div>
                <div class="input-container cta">
                    <label for="" class="checkbox-container">
                        <a href="public/user/forgot-password.php">Forgot Password?</a>
                    </label>
                </div>
                <br>
                <button type="submit" class="signup-btn">Sign In</button>
                <section class="copy legal">
                    <p><span class="small">By signing, you agree to accept our <br> <a href="#">Privacy Policy</a> &amp; <a href="#">Terms of Service</a>.</span></p>
                </section>
            </form>
        </div>
    </div>
</body>
</html>