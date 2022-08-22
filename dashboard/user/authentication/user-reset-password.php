<?php
require_once 'user-class.php';
include_once '../../../dashboard/superadmin/controller/select-settings-coniguration-controller.php';

$user = new USER();

if(empty($_GET['id']) && empty($_GET['code']))
{
 $user->redirect('../../../');
}

if(isset($_GET['id']) && isset($_GET['code']))
{
 $id = base64_decode($_GET['id']);
 $code = $_GET['code'];
 
 $stmt = $user->runQuery("SELECT * FROM user WHERE userId=:uid AND tokencode=:token");
 $stmt->execute(array(":uid"=>$id,":token"=>$code));
 $rows = $stmt->fetch(PDO::FETCH_ASSOC);
 
 if($stmt->rowCount() == 1)
 {
  if(isset($_POST['btn-update-password']))
  {
   $npass = $_POST['new-password'];
   
    $code = md5(uniqid(rand()));
    $npass = md5($npass);
    $stmt = $user->runQuery("UPDATE user SET userPassword=:upass, tokencode=:token WHERE userId=:uid");
    $stmt->execute(array(":token"=>$code,":upass"=>$npass,":uid"=>$rows['userId']));
    
    $_SESSION['status_title'] = "Success !";
    $_SESSION['status'] = "Password is updated. Redirecting to Sign in.";
    $_SESSION['status_code'] = "success";
    header("refresh:4;../../../");
   
  } 
 }
 else
 {
    $_SESSION['status_title'] = "Oops !";
    $_SESSION['status'] = "Your token is expired.";
    $_SESSION['status_code'] = "error";
 }
 
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../../src/img/<?php echo $logo ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="../../../src/css/login.css?v=<?php echo time(); ?>">
    <title>Reset Password?</title>
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
            <form action="" method="POST" class="needs-validation" novalidate="">
                <section class="copy">
                    <h2>Reset Password</h2>
                <br>
                </section>
                <div class="input-container email">
                    <label for="email ">New Password</label>
					<input id="new-password" type="password" class="form-control" name="new-password" autocapitalize="on" autocorrect="off" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" placeholder="Enter your password" required autofocus data-eye>
                </div>
                <div class="invalid-feedback">
                    Password is required
                </div>
                <div class="input-container cta">
                    <label for="" class="checkbox-container">
                        <a href="../../../">Back to Sign In</a>
                    </label>
                </div>
                <br>
                <button type="submit" class="signup-btn" name="btn-update-password">Reset Password</button>
                <section class="copy legal">
                    <p><span class="small">By clicking the Reset buton your password will be reset.</span></p>
                </section>
            </form>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
	<script src="../../../src/node_modules/sweetalert/dist/sweetalert.min.js"></script>
	<script src="../../../src/node_modules/jquery/dist/jquery.min.js"></script>
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
				timer: <?php echo $_SESSION['status_timer']; ?>
				});
			</script>
			<?php
			unset($_SESSION['status']);
		}
	?>
</body>
</html>