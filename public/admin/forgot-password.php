
<?php
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
    <link rel="stylesheet" href="../../src/css/login.css?v=<?php echo time(); ?>">
    <title>Forgot Password?</title>
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
            <form action="../../dashboard/user/authentication/user-forgot-password.php" method="POST" class="needs-validation" novalidate="">
                <section class="copy">
                    <h2>Forgot Password?</h2>
                <br>
                </section>
                <div class="input-container email">
                    <label for="email ">Email</label>
                    <input type="email" class="form-control" name="email" id="email" required>
                </div>
                <div class="invalid-feedback">
                    Email is invalid
                </div>
                <div class="input-container cta">
                    <label for="" class="checkbox-container">
                        <a href="../../">Back to Sign In</a>
                    </label>
                </div>
                <br>
                <button type="submit" class="signup-btn" name="btn-forgot-password">Send Email</button>
                <section class="copy legal">
                    <p><span class="small">By clicking the button we will send a password reset link.</span></p>
                </section>
            </form>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
	<script src="../../src/node_modules/sweetalert/dist/sweetalert.min.js"></script>
	<script src="../../src/node_modules/jquery/dist/jquery.min.js"></script>
	<script>

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