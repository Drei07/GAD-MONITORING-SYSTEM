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
  <title>Home</title>
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
        <a href="#" class="active">
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
        <a href="profile"><img src="../../src/img/<?php echo $profile ?>" alt="user-profile" data-toggle="tooltip" data-placement="bottom" title="Profile"></a>
      </div>
    </div>
    <!-- End Top Bar -->
    <div class="header">
        <h1 class="title">Dashboard</h1>
        <div class="breadcrumbs">
            <p><a href="">Home</a></p>
            <p class="divider"> | </p>
            <p class="active"> Dashboard</p>
        </div>
    </div>
    <!-- Content -->
    <div class="card-boxes">
      <div class="box">
        <div class="right_side">
          <div class="numbers">9.99</div>
          <div class="box_topic">Total Order</div>
        </div>
        <i class='bx bx-cart-alt'></i>
      </div>
      <div class="box">
        <div class="right_side">
          <div class="numbers">15.9</div>
          <div class="box_topic">Total Sales</div>
        </div>
        <i class='bx bxs-cart-add'></i>
      </div>
      <div class="box">
        <div class="right_side">
          <div class="numbers">30.20</div>
          <div class="box_topic">Total Projects</div>
        </div>
        <i class='bx bx-cart'></i>
      </div>
      <div class="box">
        <div class="right_side">
          <div class="numbers">50.9</div>
          <div class="box_topic">Total Return</div>
        </div>
        <i class='bx bxs-cart-download'></i>
      </div>
    </div>
    <!-- End Card Boxs -->
    <di v class="details">
      <div class="recent_project">
        <div class="card_header">
          <h2>Lastet Projects</h2>
        </div>
       
      </div>
      <div class="recent_customers">
        <div class="card_header">
          <h2>New Customers</h2>
        </div>
        <table>
          <tbody>
            <tr>
              <td>
                <div class="info_img">
                  <img src="../../src/img/avatar-3.jpg" alt="">
                </div>
              </td>
              <td>
                <h4>Vanessa Tucker</h4>
                <span>Vanessa@gmail.com</span>
              </td>
            </tr>
            <tr>
              <td>
                <div class="info_img">
                  <img src="../../src/img/avatar-4.jpg" alt="">
                </div>
              </td>
              <td>
                <h4>Sharon Lessma</h4>
                <span>Sharon@gmail.com</span>
              </td>
            </tr>
            <tr>
              <td>
                <div class="info_img">
                  <img src="../../src/img/avatar-5.jpg" alt="">
                </div>
              </td>
              <td>
                <h4>Christina Mason</h4>
                <span>Christina@gmail.com</span>
              </td>
            </tr>
            <tr>
              <td>
                <div class="info_img">
                  <img src="../../src/img/avatar-2.jpg" alt="">
                </div>
              </td>
              <td>
                <h4>Willams Harris</h4>
                <span>Willams@gmail.com</span>
              </td>
            </tr>
            <tr>
              <td>
                <div class="info_img">
                  <img src="../../src/img/avatar-3.jpg" alt="">
                </div>
              </td>
              <td>
                <h4>Sharon Lessma</h4>
                <span>Willams@gmail.com</span>
              </td>
            </tr>
          </tbody>
        </table>
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

    //Tooltip
    $(function () {
      $('[data-toggle="tooltip"]').tooltip()
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
