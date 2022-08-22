<?php
include_once '../../database/dbconfig2.php';
require_once 'authentication/superadmin-class.php';
include_once 'controller/select-settings-coniguration-controller.php';


$superadmin_home = new SUPERADMIN();

if(!$superadmin_home->is_logged_in())
{
 $superadmin_home->redirect('../../public/superadmin/signin');
}

$stmt = $superadmin_home->runQuery("SELECT * FROM superadmin WHERE superadminId=:uid");
$stmt->execute(array(":uid"=>$_SESSION['superadminSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="shortcut icon" href="../../src/img/<?php echo $logo ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../src/node_modules/bootstrap/dist/css/bootstrap.min.css">

  <link rel="stylesheet" href="../../src/css/dashboard.css?v=<?php echo time(); ?>">
  <title>Setings</title>
  <!-- box icon -->
  <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
  <div class="sidebar">
    <div class="logo_details">
      <div class="logo_name">
        <img src="../../src/img/<?php echo $logo ?>" alt="logo">
      </div>
    </div>
    <ul>
      <li>
        <a href="home">
          <i class='bx bx-grid-alt'></i>
          <span class="links_name">
            Dashboard
          </span>
        </a>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-user'></i>
          <span class="links_name">
            Profile
          </span>
        </a>
      </li>
      <li>
        <a href="#">
          <i class='bx bxs-truck'></i>
          <span class="links_name">
            Sales
          </span>
        </a>
      </li>
      <li>
        <a href="" class="active">
          <i class='bx bx-cog'></i>
          <span class="links_name">
            Setting
          </span>
        </a>
      </li>
      <li class="login">
        <a href="authentication/superadmin-signout.php" class="btn-signout">
          <span class="links_name login_out">
            Signout
          </span>
          <i class='bx bx-log-out' id="log_out"></i>
        </a>
      </li>
    </ul>
  </div>
  <!-- End Sideber -->
  <section class="home_section">
    <div class="topbar">
      <div class="toggle">
        <i class='bx bx-menu' id="btn"></i>
      </div>
      <span class="user_name"><?php echo $row['name']; ?></span>
      <div class="user_wrapper">
        <img src="../../src/img/<?php echo $profile ?>" alt="user-profile">
      </div>
    </div>
    <!-- End Top Bar -->
    <div class="header">
        <h1 class="title">Settings</h1>
        <div class="breadcrumbs">
            <p><a href="home">Home</a></p>
            <p class="divider"> | </p>
            <p class="active"> Settings</p>
        </div>
    </div>
    <!-- Content -->
    <div class="details">
      <div class="recent_project">
      <div class="card_body">
        <form action="controller/update-system-config.php" method="POST" class="row gx-5 needs-validation" name="form" onsubmit="return validate()"  novalidate style="overflow: hidden;">
            <div class="row gx-5 needs-validation">

            <label class="form-label" style="text-align: left; padding-top: .5rem; padding-bottom: 2rem; font-size: 1rem; font-weight: bold;"><i class='bx bxs-edit'></i> System Configuration <p>Last update: <?php  echo $system_config_last_update  ?></p></label>

                <div class="col-md-6">
                    <label for="sname" class="form-label">System Name<span> *</span></label>
                    <input type="text" class="form-control" autocapitalize="on" autocomplete="off" name="SName" id="sname" required value="<?php  echo $system_name  ?>">
                    <div class="invalid-feedback">
                    Please provide a System Name.
                    </div>
                </div>

                <div class="col-md-6">
                    <label for="cright" class="form-label">System Copyright<span> *</span></label>
                    <input type="text" class="form-control" autocapitalize="on" autocomplete="off" name="CRight" id="cright" required value="<?php  echo $system_copyright ?>">
                    <div class="invalid-feedback">
                    Please provide a System Copyright.
                    </div>
                </div>

                <div class="col-md-6" >
                    <label for="phone_number" class="form-label">Default Phone Number<span> *</span></label>
                    <div class="input-group flex-nowrap">
                    <span class="input-group-text" id="addon-wrapping">+63</span>
                    <input type="text" class="form-control numbers"  autocapitalize="off" inputmode="numeric" autocomplete="off" name="PNumber" id="phone_number" minlength="10" maxlength="10" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" required value="<?php  echo $system_number  ?>">
                    </div>
                </div>

                <div class="col-md-6">
                    <label for="email" class="form-label">Default Email<span> *</span></label>
                    <input type="email" class="form-control" autocapitalize="off" autocomplete="off" name="Email" id="email" required value="<?php  echo $system_email  ?>">
                    <div class="invalid-feedback">
                    Please provide a valid Email.
                    </div>
                </div>

            </div>

            <div class="addBtn">
                <button type="submit" class="btn-danger" name="btn-update" id="btn-update" onclick="return IsEmpty(); sexEmpty();">Update</button>
            </div>
        </form>
    </div>
       
      </div>

      <div class="recent_project">
        <div class="card_body">
            <form action="controller/update-logo-controller.php" method="POST" enctype="multipart/form-data" class="row gx-5 needs-validation" name="form" onsubmit="return validate()"  novalidate style="overflow: hidden;">
                <div class="row gx-5 needs-validation">

                    <label class="form-label" style="text-align: left; padding-top: .5rem; padding-bottom: 2rem; font-size: 1rem; font-weight: bold;"><i class='bx bxs-edit'></i> Logo Configuration <p>Last update: <?php  echo $system_logo_last_update  ?></p></label>

                    <div class="col-md-12">
                        <label for="logo" class="form-label">Upload Logo<span> *</span></label>
                        <input type="file" class="form-control" name="Logo" id="logo" style="height: 33px ;" required>
                        <div class="invalid-feedback">
                        Please provide a Logo.
                        </div>
                    </div>

                </div>

                <div class="addBtn" style="padding-top: 2rem;">
                    <button type="submit" class="btn-danger" name="btn-update" id="btn-update" onclick="return IsEmpty(); sexEmpty();">Update</button>
                </div>
            </form>
        </div>
      </div>

      <div class="recent_project">
        <div class="card_body">
            <form action="controller/update-smtp-email-controller.php" method="POST" class="row gx-5 needs-validation" name="form" onsubmit="return validate()"  novalidate style="overflow: hidden;">
                <div class="row gx-5 needs-validation">

                <label class="form-label" style="text-align: left; padding-top: .5rem; padding-bottom: 2rem; font-size: 1rem; font-weight: bold;"><i class='bx bxs-edit'></i> SMTP Email Configuration <p>Last update: <?php  echo $email_config_last_update  ?></p></label>

                    <div class="col-md-6">
                        <label for="email" class="form-label">Email<span> *</span></label>
                        <input type="email" class="form-control" autocapitalize="off" autocomplete="off" name="Email" id="email" required placeholder = "<?php  echo $smtp_email  ?>">
                        <div class="invalid-feedback">
                        Please provide a valid Email.
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label for="Gpassword" class="form-label">Generated Password<span> *</span></label>
                        <input type="text" class="form-control" autocapitalize="on" autocomplete="off" name="GPassword" id="Gpassword" required placeholder ="<?php  echo $smtp_password  ?>">
                        <div class="invalid-feedback">
                        Please provide a Generated Password.
                        </div>
                    </div>

                </div>

                <div class="addBtn">
                    <button type="submit" class="btn-danger" name="btn-update" id="btn-update" onclick="return IsEmpty(); sexEmpty();">Update</button>
                </div>
            </form>
        </div>
      </div>

      <div class="recent_project">
            <div class="card_body">
                <form action="controller/update-google-recaptcha-controller.php" method="POST" class="row gx-5 needs-validation" name="form" onsubmit="return validate()"  novalidate style="overflow: hidden;">
                    <div class="row gx-5 needs-validation">

                    <label class="form-label" style="text-align: left; padding-top: .5rem; padding-bottom: 2rem; font-size: 1rem; font-weight: bold;"><i class='bx bxs-edit'></i> reCAPTCHA API Configuration <p>Last update: <?php  echo $google_recaptcha_api_last_update  ?></p></label>

                    <div class="col-md-6">
                            <label for="Skey" class="form-label">Site Key<span> *</span></label>
                            <input type="text" class="form-control" autocapitalize="on" autocomplete="off" name="SKey" id="Skey" required placeholder ="<?php  echo $SKey  ?>">
                            <div class="invalid-feedback">
                            Please provide a Site Key.
                            </div>
                    </div>

                    <div class="col-md-6">
                        <label for="Sskey" class="form-label">Site Secret Key<span> *</span></label>
                        <input type="text" class="form-control" autocapitalize="on" autocomplete="off" name="SSKey" id="Sskey" required placeholder ="<?php  echo $SSKey  ?>">
                        <div class="invalid-feedback">
                        Please provide a Site Secret Key.
                        </div>
                    </div>

                    </div>

                    <div class="addBtn">
                        <button type="submit" class="btn-danger" name="btn-update" id="btn-update" onclick="return IsEmpty(); sexEmpty();">Update</button>
                    </div>
                </form>
            </div>
      </div>

    </div>
  </section>

    <script src="../../src/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../../src/node_modules/sweetalert/dist/sweetalert.min.js"></script>
    <script src="../../src/node_modules/jquery/dist/jquery.min.js"></script>

  <script>
    let sidebar = document.querySelector(".sidebar");
    let closeBtn = document.querySelector("#btn");

    closeBtn.addEventListener("click", () => {
      sidebar.classList.toggle("open");
      // call function
      changeBtn();
    });

    function changeBtn() {
      if(sidebar.classList.contains("open")) {
        closeBtn.classList.replace("bx-menu", "bx-menu-alt-right");
      } else {
        closeBtn.classList.replace("bx-menu-alt-right", "bx-menu");
      }
    }

    // Signout
    $('.btn-signout').on('click', function(e){
    e.preventDefault();
    const href = $(this).attr('href')

            swal({
            title: "Signout?",
            text: "Are you sure do you want to signout?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willSignout) => {
            if (willSignout) {
            document.location.href = href;
            }
        });
    })

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
