<?php
include_once '../../database/dbconfig2.php';
require_once 'authentication/superadmin-class.php';
include_once 'controller/select-settings-coniguration-controller.php';


$superadmin_home = new SUPERADMIN();

if (!$superadmin_home->is_logged_in()) {
  $superadmin_home->redirect('../../public/superadmin/signin');
}

$stmt = $superadmin_home->runQuery("SELECT * FROM superadmin WHERE superadminId=:uid");
$stmt->execute(array(":uid" => $_SESSION['superadminSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);

$Guidlines_ID = $_GET['Id'];

$pdoQuery = "SELECT * FROM guidelines WHERE Id = :Id";
$pdoResult = $pdoConnect->prepare($pdoQuery);
$pdoExec = $pdoResult->execute(array(":Id" => $Guidlines_ID));
$guidlines_data = $pdoResult->fetch(PDO::FETCH_ASSOC);

$guidlines_name = $guidlines_data['guidelines_name'];
$guidlines_file = $guidlines_data['files'];
$guidelinesID   = $guidlines_data['guidelines_Id'];

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

  <title>Guidlines Reports</title>
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
        <a href="admin">
          <i class='bx bxs-user-pin'></i>
          <span class="links_name">
            Admin
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
        <a href="reports">
          <i class='bx bxs-book'></i>
          <span class="links_name">
            Reports
          </span>
        </a>
      </li>
      <li>
        <a href="archives">
          <i class='bx bxs-file-archive'></i>
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
        <a href="profile"><img src="../../src/img/<?php echo $profile ?>" alt="user-profile" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Profile"></a>
      </div>
    </div>
    <!-- End Top Bar -->
    <div class="header">
      <h1 class="title"><?php echo $guidlines_name ?></h1>
      <div class="breadcrumbs">
        <p><a href="">Home</a></p>
        <p class="divider"> | </p>
        <p><a href="guidelines">List</a></p>
        <p class="divider"> | </p>
        <p class="active">Data</p>
      </div>
      <button type="button" class="primary" data-bs-toggle="modal" data-bs-target="#classModal"><i class='bx bxs-file-pdf'></i> View File</button>
    </div>

    <!-- Content -->
    <div class="data_table">
      <div class="card_body table">
          <section class="data-table">
          <div class="searchBx">
            <input type="input" placeholder="search . . . . . ." class="search" name="search_box" id="search_box"><button class="searchBtn"><i class="bx bx-search icon"></i></button>
          </div>

          <div class="table">
            <div id="dynamic_content">
            </div>
        </section>
      </div>
    </div>

    <!-- MODALS -->
    <div class="class-modal">
      <div class="modal fade" id="classModal" tabindex="-1" aria-labelledby="classModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
          <div class="modal-content">
            <div class="modal-body">
              <div id="pdf-files"></div>
              <script>
                PDFObject.embed("../PDF/<?php echo $guidlines_file ?>", "#pdf-files", {
                  omitInlineStyles: false
                });
              </script>
            </div>
          </div>
          <div class="header"><i class='bx bx-exit-fullscreen'></i> Click outside to exit.</div>

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
      if (sidebar.classList.contains("open")) {
        closeBtn.classList.replace("bx-menu", "bx-menu-alt-right");
      } else {
        closeBtn.classList.replace("bx-menu-alt-right", "bx-menu");
      }
    }

    //Ajax data table
    $(document).ready(function() {

      load_data(1);

      function load_data(page, query = '') {
        $.ajax({
          url: "data-table/guidelines-report-table.php?guidelinesID=<?php echo $guidelinesID ?>",
          method: "POST",
          data: {
            page: page,
            query: query
          },
          success: function(data) {
            $('#dynamic_content').html(data);
          }
        });
      }

      $(document).on('click', '.page-link', function() {
        var page = $(this).data('page_number');
        var query = $('#search_box').val();
        load_data(page, query);
      });

      $('#search_box').keyup(function() {
        var query = $('#search_box').val();
        load_data(1, query);
      });

    });

    // Signout
    $('.btn-signout').on('click', function(e) {
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

  if (isset($_SESSION['status']) && $_SESSION['status'] != '') {
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