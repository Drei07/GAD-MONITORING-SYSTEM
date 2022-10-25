<?php
include_once '../../database/dbconfig2.php';
require_once 'authentication/admin-class.php';
include_once __DIR__ .'/../superadmin/controller/select-settings-coniguration-controller.php';

$user_home = new ADMIN();

if(!$user_home->is_logged_in())
{
 $user_home->redirect('../../public/admin/signin');
}

$stmt = $user_home->runQuery("SELECT * FROM admin WHERE userId=:uid");
$stmt->execute(array(":uid"=>$_SESSION['adminSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);

$profile_user 	= $row['adminProfile'];
$UId 			= $row['userId'];


$Guidlines_ID = $_GET ['Id'];

$pdoQuery = "SELECT * FROM guidelines WHERE guidelines_Id = :Id";
$pdoResult = $pdoConnect->prepare($pdoQuery);
$pdoExec = $pdoResult->execute(array(":Id" => $Guidlines_ID));
$guidlines_data = $pdoResult->fetch(PDO::FETCH_ASSOC);

$guidelines_name = $guidlines_data['guidelines_name'];
$guidelines_file = $guidlines_data['files'];

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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfobject/2.2.8/pdfobject.min.js" integrity="sha512-MoP2OErV7Mtk4VL893VYBFq8yJHWQtqJxTyIAsCVKzILrvHyKQpAwJf9noILczN6psvXUxTr19T5h+ndywCoVw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <title>Guidelines | Add Guidlines</title>
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
          <i class='bx bx-user'></i>
          <span class="links_name">
            Profile
          </span>
        </a>
      </li>
      <li>
        <a href="guidelines" class="active">
          <i class='bx bxs-book-bookmark'></i>
          <span class="links_name">
            Guidelines
          </span>
        </a>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-cog'></i>
          <span class="links_name">
            Setting
          </span>
        </a>
      </li>
      <li class="login">
        <a href="authentication/admin-signout" class="btn-signout">
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
      <span class="user_name"><?php echo $row['adminLast_Name']; ?>, <?php echo $row['adminFirst_Name']; ?></span>
      <div class="user_wrapper">
        <a href="profile"><img src="../../src/img/<?php echo $profile_user ?>" alt="user-profile" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Profile"></a>
      </div>
    </div>
    <!-- End Top Bar -->
    <div class="header">
        <h1 class="title">Add Guidelines</h1>
        <div class="breadcrumbs">
            <p><a href="">Home</a></p>
            <p class="divider"> | </p>
            <p><a href="guidelines">Guidelines Lists</a></p>
            <p class="divider"> | </p>
            <p class="active"> Add</p>
            
        </div>
        <button type="button" class="primary" data-bs-toggle="modal" data-bs-target="#classModal"><i class='bx bxs-file-pdf'></i> View File</button>

    </div>
    <!-- Content -->
    <di v class="details">
      <div class="recent_project">
        <div class="card_header">
          <h2><?php echo $guidelines_name ?></h2>
        </div>
        <div class="card_body">
            <form action="controller/add-guidlines-controller.php?guidelinesID=<?php echo $Guidlines_ID  ?>" method="POST"  enctype="multipart/form-data" class="row gx-5 needs-validation" name="form" onsubmit="return validate()"  novalidate style="overflow: hidden;">
                <div class="row gx-5 needs-validation">

                    <div class="col-md-12">
                        <label for="files" class="form-label">Upload Proof<span> *</span></label>
                        <input type="file" class="form-control" name="files" id="files" style="height: 33px ;" required>
                        <div class="invalid-feedback">
                        Please provide a proof.
                        </div>
                    </div>

                </div>

                <div class="addBtn">
                    <button type="submit" class="btn-danger" name="btn-register" id="btn-register" onclick="return IsEmpty(); sexEmpty();">Add</button>
                </div>
            </form>
        </div>
      </div>
    </div>

       	<!-- MODALS -->
		<div class="class-modal">
			<div class="modal fade" id="classModal" tabindex="-1" aria-labelledby="classModalLabel" aria-hidden="true" >
				<div class="modal-dialog modal-dialog-centered modal-xl">
					<div class="modal-content">
						<div class="modal-body">
                            <div id="pdf-files"></div>
                            <script>PDFObject.embed("../PDF/<?php echo $guidelines_file ?>", "#pdf-files", {omitInlineStyles: false});</script>
						</div>
					</div>
                    <div class="header"><i class='bx bx-exit-fullscreen' ></i> Click outside to exit.</div>

				</div>
			</div>
		</div>
		<!-- END MODALS -->
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
