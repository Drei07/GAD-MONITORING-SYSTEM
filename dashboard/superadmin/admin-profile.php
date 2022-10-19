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

$employeeId = $_GET["id"];

$pdoQuery = "SELECT * FROM admin WHERE userId = :id";
$pdoResult = $pdoConnect->prepare($pdoQuery);
$pdoExec = $pdoResult->execute(array(":id"=>$employeeId));
$employee = $pdoResult->fetch(PDO::FETCH_ASSOC);

$eadmin_id = $employee["userId"];
$employee_profile = $employee["adminProfile"];
$employee_Lname = $employee["adminLast_Name"];
$employee_Fname = $employee["adminFirst_Name"];
$employee_Mname = $employee["adminMiddle_Name"];
$employee_Email = $employee["adminEmail"];
$employee_position = $employee["adminPosition"];
$employee_status = $employee["adminStatus"];
$employee_last_update = $employee["updated_at"];

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
  <title>Admin Profile</title>
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
        <a href="profile">
          <i class='bx bxs-user'></i>
          <span class="links_name">
            Profile
          </span>
        </a>
      </li>
      <li>
      <a href="admin" class="active">
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
        <h1 class="title">Admin Profile</h1>
        <div class="breadcrumbs">
            <p><a href="home">Home</a></p>
            <p class="divider"> | </p>
            <p class="active"> Admin Profile</p>
        </div>
    </div>
    <!-- Content -->
    <div class="details">
        <div class="recent_project">
            <div class="card_body profile">
            <div class="profile-img">
						<img src="../../src/img/<?php echo $employee_profile ?>" alt="logo">
                        <h5><?php echo $employee_Lname?>, <?php echo $employee_Fname?> <?php echo $employee_Mname?></h5>
                        <p><?php echo $employeeId ?></p>
                        <h7><?php echo $employee_position ?></h7>
                        <?php
                         echo ($employee_status=="N" ? '<button class="P">Pending</button>' :  '<button class="A">Active</button>')
                        ?>
						<button class="delete2"><a href="controller/delete-admin-data-controller.php?Id=<?php echo $eadmin_id ?>" class="btn-delete deletes">Delete Account</a></button>

					</div>

					<form action="" method="POST" class="row gx-5 needs-validation" name="form" onsubmit="return validate()"  novalidate style="overflow: hidden;">
						<div class="row gx-5 needs-validation">

							<label class="form-label" style="text-align: left; padding-top: .5rem; padding-bottom: 1rem; font-size: 1rem; font-weight: bold;"><i class='bx bxs-edit'></i> Admin Information<p>Last update: <?php  echo $employee_last_update  ?></p></label>

							<div class="col-md-6">
								<label for="first_name" class="form-label">First Name<span> *</span></label>
								<input disabled disabled type="text" class="form-control" autocapitalize="on" maxlength="15" autocomplete="off" name="FName" id="first_name" placeholder="<?php echo $employee_Fname ?>" onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode==32)" required>
								<div class="invalid-feedback">
								Please provide a First Name.
								</div>
							</div>

							<div class="col-md-6">
								<label for="middle_name" class="form-label">Middle Name</label>
								<input disabled type="text" class="form-control" autocapitalize="on" maxlength="15" autocomplete="off" name="MName" id="middle_name" placeholder="<?php echo $employee_Mname ?>" onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode==32)">
								<div class="invalid-feedback">
								Please provide a Middle Name.
								</div>
							</div>

							<div class="col-md-6">
								<label for="last_name" class="form-label">Last Name<span> *</span></label>
								<input disabled type="text" class="form-control" autocapitalize="on" maxlength="15" autocomplete="off" name="LName" id="last_name" placeholder="<?php echo $employee_Lname ?>" onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode==32)" required >
								<div class="invalid-feedback">
								Please provide a Last Name.
								</div>
							</div>

                            <div class="col-md-6">
								<label for="email" class="form-label">Email<span> *</span></label>
								<input disabled type="email" class="form-control" autocapitalize="off" autocomplete="off" name="Email" id="email" required placeholder="<?php echo $employee_Email ?>">
								<div class="invalid-feedback">
								Please provide a valid Email.
								</div>
							</div>

							<div class="col-md-6" style="opacity: 0;">
								<label for="" class="form-label">Last Name<span> *</span></label>
								<input disabled type="text" class="form-control" autocapitalize="on" maxlength="15" autocomplete="off" name="" id="" placeholder="<?php echo $employee_Lname ?>" onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode==32)" required >
								<div class="invalid-feedback">
								Please provide a Last Name.
								</div>
							</div>

							<div class="col-md-6" style="opacity: 0;">
								<label for="" class="form-label">Last Name<span> *</span></label>
								<input disabled type="text" class="form-control" autocapitalize="on" maxlength="15" autocomplete="off" name="" id="" placeholder="<?php echo $employee_Lname ?>" onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode==32)" required >
								<div class="invalid-feedback">
								Please provide a Last Name.
								</div>
							</div>

							<div class="col-md-6" style="opacity: 0;">
								<label for="" class="form-label">Last Name<span> *</span></label>
								<input disabled type="text" class="form-control" autocapitalize="on" maxlength="15" autocomplete="off" name="" id="" placeholder="<?php echo $employee_Lname ?>" onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode==32)" required >
								<div class="invalid-feedback">
								Please provide a Last Name.
								</div>
							</div>


						</div>

						<div class="addBtn">
                            <button type="button" onclick="location.href='admin'" class="back">Back</button>
						</div>
					</form>
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

    $('.deletes').on('click', function(e){
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
