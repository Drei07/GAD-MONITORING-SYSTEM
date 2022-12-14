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
  <title>Profile</title>
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
        <a href="" class="active">
          <i class='bx bxs-user'></i>
          <span class="links_name">
            Profile
          </span>
        </a>
      </li>
      <li>
      <a href="admin">
          <i class='bx bxs-user-pin'></i>
          <span class="links_name">
            Admin
          </span>
        </a>
      </li>
      <li>
        <a href="guidelines">
          <i class='bx bxs-book-bookmark'></i>
          <span class="links_name">
            Guidelines
          </span>
        </a>
      </li>
      <li>
        <a href="reports">
          <i class='bx bxs-book'></i>
          <span class="links_name">
            Reports
          </span>
        </a>
      </li>
      <li>
        <a href="archives">
        <i class='bx bxs-file-archive' ></i>
          <span class="links_name">
            Archives
          </span>
        </a>
      </li>
      <li>
        <a href="settings">
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
        <a href="profile"><img src="../../src/img/<?php echo $profile ?>"  alt="user-profile" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Profile"></a>
      </div>
    </div>
    <!-- End Top Bar -->
    <div class="header">
        <h1 class="title">Profile</h1>
        <div class="breadcrumbs">
            <p><a href="home">Home</a></p>
            <p class="divider"> | </p>
            <p class="active"> Profile</p>
        </div>
    </div>
    <!-- Content -->
    <div class="details">
        <div class="recent_project">
            <div class="card_body profile">
                <div class="profile-img">
                    <img src="../../src/img/<?php echo $profile ?>" alt="logo">

                    <a href="controller/delete-profile-controller.php" class="delete"><i class='bx bxs-trash'></i></a>
                    <button class="primary" onclick="edit()"><i class='bx bxs-edit'></i> Edit Profile</button>
                    <button class="primary" onclick="avatar()"><i class='bx bxs-user'></i> Change Avatar</button>
                    <button class="primary" onclick="password()"><i class='bx bxs-key'></i> Change Password</button>
				</div>

                					
                <div id="Edit">
                    <form action="controller/update-profile-controller.php" method="POST" class="row gx-5 needs-validation" name="form" onsubmit="return validate()"  novalidate style="overflow: hidden;">
                        <div class="row gx-5 needs-validation">

                            <label class="form-label" style="text-align: left; padding-top: .5rem; padding-bottom: 1rem; font-size: 1rem; font-weight: bold;"><i class='bx bxs-edit'></i> Edit Profile<p>Last update: <?php  echo $superadmin_profile_last_update  ?></p></label>

                            <div class="col-md-12">
                                <label for="name" class="form-label">Name<span> *</span></label>
                                <input type="text" class="form-control" autocapitalize="on" autocomplete="off" name="Name" id="name" required value="<?php  echo $superadmin_name  ?>">
                                <div class="invalid-feedback">
                                Please provide a Old Password.
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label for="email" class="form-label">Email<span> *</span></label>
                                <input type="email" class="form-control" autocapitalize="off" autocomplete="off" name="Email" id="email" required value="<?php  echo $superadmin_email  ?>">
                                <div class="invalid-feedback">
                                Please provide a valid Email.
                                </div>
                            </div>

                            <div class="col-md-12" style="opacity: 0;">
                                <label for="sname" class="form-label">Old Password<span> *</span></label>
                                <input type="text" class="form-control" autocapitalize="on" autocomplete="off" name="SName" id="sname" required value="<?php  echo $system_name  ?>">
                                <div class="invalid-feedback">
                                Please provide a Old Password.
                                </div>
                            </div>

                        </div>

                        <div class="addBtn">
                            <button disabled type="submit" class="primary" name="btn-update" id="btn-update" onclick="return IsEmpty(); sexEmpty();">Update</button>
                        </div>
                    </form>
                </div>


                <div id="avatar" style="display: none;">
                  <form action="controller/update-profile-avatar-controller.php" method="POST" enctype="multipart/form-data" class="row gx-5 needs-validation" name="form" onsubmit="return validate()"  novalidate style="overflow: hidden;">
                    <div class="row gx-5 needs-validation">

                      <label class="form-label" style="text-align: left; padding-top: .5rem; padding-bottom: 1rem; font-size: 1rem; font-weight: bold;"><i class='bx bxs-user'></i> Change Avatar<p>Last update: <?php  echo $superadmin_profile_last_update  ?></p></label>

                      <div class="col-md-12">
                        <label for="logo" class="form-label">Upload Logo<span> *</span></label>
                        <input type="file" class="form-control" name="Logo" id="logo" style="height: 33px ;" required>
                        <div class="invalid-feedback">
                        Please provide a Logo.
                        </div>
                      </div>

                      <div class="col-md-12" style="opacity: 0;">
                        <label for="email" class="form-label">Default Email<span> *</span></label>
                        <input type="email" class="form-control" autocapitalize="off" autocomplete="off" name="" id="email" required value="<?php  echo $system_email  ?>">
                        <div class="invalid-feedback">
                        Please provide a valid Email.
                        </div>
                      </div>

                      <div class="col-md-12" style="opacity: 0; padding-bottom: 1.3rem;">
                        <label for="sname" class="form-label">Old Password<span> *</span></label>
                        <input type="text" class="form-control" autocapitalize="on" autocomplete="off" name="" id="sname" required value="<?php  echo $system_name  ?>">
                        <div class="invalid-feedback">
                        Please provide a Old Password.
                        </div>
                      </div>
                    </div>

                    <div class="addBtn">
                      <button type="submit" class="primary" name="btn-update" id="btn-update" onclick="return IsEmpty(); sexEmpty();">Update</button>
                    </div>
                  </form>
                </div>

                <div id="password" style="display: none;">
                  <form action="controller/update-password-controller.php" method="POST" class="row gx-5 needs-validation" name="form" onsubmit="return validate()"  novalidate style="overflow: hidden;">
                    <div class="row gx-5 needs-validation">

                      <label class="form-label" style="text-align: left; padding-top: .5rem; padding-bottom: 1rem; font-size: 1rem; font-weight: bold;"><i class='bx bxs-key'></i> Change Password<p>Last update: <?php  echo $superadmin_profile_last_update  ?></p></label>

                      <div class="col-md-12">
                        <label for="old_pass" class="form-label">Old Password<span> *</span></label>
                        <input type="password" class="form-control" autocapitalize="on" autocomplete="off"  name="Old" id="old_pass" required>
                        <div class="invalid-feedback">
                        Please provide a Old Password.
                        </div>
                      </div>

                      <div class="col-md-12">
                        <label for="new_pass" class="form-label">New Password<span> *</span></label>
                        <input type="text" class="form-control" autocapitalize="on" autocomplete="off" name="New" id="new_pass" required>
                        <div class="invalid-feedback">
                        Please provide a New Password.
                        </div>
                      </div>

                      <div class="col-md-12">
                        <label for="confirm_pass" class="form-label">Confirm Password<span> *</span></label>
                        <input type="text" class="form-control" autocapitalize="on" autocomplete="off" name="Confirm" id="confirm_pass" required>
                        <div class="invalid-feedback">
                        Please provide a Confirm Password.
                        </div>
                      </div>

                    </div>

                    <div class="addBtn">
                      <button type="submit" class="primary" name="btn-update-password" id="btn-update" onclick="return IsEmpty(); sexEmpty();">Update</button>
                    </div>
                  </form>
                </div>
            </div> 
        </div>
    </div>
</section>

    <script src="../../src/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../../src/node_modules/sweetalert/dist/sweetalert.min.js"></script>
    <script src="../../src/node_modules/jquery/dist/jquery.min.js"></script>
    <script src="../../src/js/tooltip.js"></script>

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

    // Buttons Profile


    function edit(){
        document.getElementById('Edit').style.display = 'block';
        document.getElementById('password').style.display = 'none';
        document.getElementById('avatar').style.display = 'none';
    }

    function avatar(){
        document.getElementById('avatar').style.display = 'block';
        document.getElementById('Edit').style.display = 'none';
        document.getElementById('password').style.display = 'none';
    }

    function password(){
        document.getElementById('password').style.display = 'block';
        document.getElementById('avatar').style.display = 'none';
        document.getElementById('Edit').style.display = 'none';
    }


    //Delete Profile

    $('.delete').on('click', function(e){
    e.preventDefault();
    const href = $(this).attr('href')

            swal({
            title: "Delete?",
            text: "Do you want to delete?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
            document.location.href = href;
            }
        });
    })


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
