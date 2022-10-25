<?php
include_once '../../database/dbconfig2.php';
require_once 'authentication/admin-class.php';
include_once '../superadmin/controller/select-settings-coniguration-controller.php';

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
  <title>Guidlines</title>
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
        <a href="home" >
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
        <a href="" class="active">
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
        <h1 class="title">List of of Boxes and Checklists</h1>
        <div class="breadcrumbs">
            <p><a href="home">Home</a></p>
            <p class="divider"> | </p>
            <p class="active"> List</p>
        </div>
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

    //Ajax data table
    $(document).ready(function(){

    load_data(1);

    function load_data(page, query = '')
    {
    $.ajax({
        url:"data-table/guidelines-data-table.php",
        method:"POST",
        data:{page:page, query:query},
        success:function(data)
        {
        $('#dynamic_content').html(data);
        }
    });
    }

    $(document).on('click', '.page-link', function(){
    var page = $(this).data('page_number');
    var query = $('#search_box').val();
    load_data(page, query);
    });

    $('#search_box').keyup(function(){
    var query = $('#search_box').val();
    load_data(1, query);
    });

    });


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
