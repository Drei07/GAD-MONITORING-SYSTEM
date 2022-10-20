<?php
include_once __DIR__. '/../../src/API/api.php';
include_once '../../dashboard/admin/authentication/admin-signin.php';
include_once '../../dashboard/superadmin/controller/select-settings-coniguration-controller.php';


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../src/img/<?php echo $logo ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://www.google.com/recaptcha/api.js?render=<?php echo $SiteKEY ?>"></script>
    <link rel="stylesheet" href="../../src/css/login.css?v=<?php echo time(); ?>">
    <title>Admin Sign In</title>
</head>

<body>
    <div class="split-screen">
        <div class="left">
            <section class="copy">
                <img src="../../src/img/DHVSU_logo.png" width="120px">
                <br>
                <br>
                <p>DHVSU Harmonized Gender and Development<br>Guidelines System</p>
            </section>
        </div>
        <div class="right">
            <form action="../../dashboard/admin/authentication/admin-signin.php" method="POST" class="my-login-validation" novalidate="">
                <section class="copy">
                    <h2>Sign In</h2>
                <br>
                </section>
                <input type="hidden" id="g-token" name="g-token">
                <div class="input-container email">
                    <label for="email ">Email</label>
                    <input type="email" class="form-control" name="email" id="email" required>
                </div>
                <div class="input-container password">
                    <label for="password ">Password</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Must be at least 6 characters" required >
                    <i class="far fa-eye-slash"></i>
                </div>
                <div class="input-container cta">
                    <label for="" class="checkbox-container">
                        <a href="forgot-password">Forgot Password?</a>
                    </label>
                </div>
                <br>
                <button type="submit" class="signup-btn" name="btn-signin">Sign In</button>
                <section class="copy legal">
                    <p><span class="small">By signing, you agree to accept our <br> <a href="#">Privacy Policy</a> &amp; <a href="#">Terms of Service</a>.</span></p>
                </section>
            </form>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
	<script src="../../src/node_modules/sweetalert/dist/sweetalert.min.js"></script>
	<script src="../../src/node_modules/jquery/dist/jquery.min.js"></script>
	<script>

		// CAPTCHA
			grecaptcha.ready(function() {
			grecaptcha.execute('<?php echo $SiteKEY ?>', {action: 'submit'}).then(function(token) {
				document.getElementById("g-token").value = token;
			});
			});

        // Form
		(function () {
			'use strict'
			var forms = document.querySelectorAll('.needs-validation')
			Array.prototype.slice.call(forms)
			.forEach(function (form) {
				form.addEventListener('submit', function (event) {
				if (!form.checkValidity()) {
					event.preventDefault()
					event.stopPropagation()
				}

				form.classList.add('was-validated')
				}, false)
			})
		})();


	</script>

	<!-- SWEET ALERT -->
	<?php

		if(isset($_SESSION['status']) && $_SESSION['status'] !='')
		{
			?>
			<script>
				swal({
				title: "<?php echo $_SESSION['status_title']; ?>",
				text: "<?php echo $_SESSION['status']; ?>",
				icon: "<?php echo $_SESSION['status_code']; ?>",
				button: false,
				timer: <?php echo $_SESSION['status_timer']; ?>,
				});
			</script>
			<?php
			unset($_SESSION['status']);
		}
	?>
</body>
</html>