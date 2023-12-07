<!--
 =========================================================
* Argon Dashboard 2 PRO - v2.0.5
=========================================================

* Product Page:  https://www.creative-tim.com/product/argon-dashboard-pro 
* Copyright 2022 Creative Tim (https://www.creative-tim.com)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->

<?php
include "../../../auth.php";
if (isset($_GET['id'])) {
    $fileid = $_GET['id'];
    $query = "select * from factures where ID= ?";
    $stmt = $sql->prepare($query);
    $stmt->bindParam(1, $fileid, PDO::PARAM_STR);
    $stmt->execute();
    $filedata = $stmt->fetch();
    
    $clientid = $filedata['client'];
    $query = "select * from clients where code= ?";
    $stmt = $sql->prepare($query);
    $stmt->bindParam(1, $clientid, PDO::PARAM_STR);
    $stmt->execute();
    $clientdata = $stmt->fetch();
}
?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link
      rel="apple-touch-icon"
      sizes="76x76"
      href="../../../assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="../../../assets/img/favicon.png" />
    <title>Black Hawk Security</title>
    <!--     Fonts and icons     -->
    <link
      href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700"
      rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="../../../assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="../../../assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script
      src="https://kit.fontawesome.com/42d5adcbca.js"
      crossorigin="anonymous"></script>
    <link href="../../../assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link
      id="pagestyle"
      href="../../../assets/css/argon-dashboard.css"
      rel="stylesheet" />
  </head>

<body class="g-sidenav-show bg-gray-100">
  <div class="min-height-300 bg-dark position-absolute w-100"></div>
  
<aside
  class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4"
  id="sidenav-main">
  <div class="sidenav-header">
    <i
      class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
      aria-hidden="true"
      id="iconSidenav"></i>
    <a
      class="navbar-brand m-0"
      href=" https://blackhawksecurity.ci "
      target="_blank">
      <img
        src="https://blackhawksecurity.ci/wp-content/uploads/2023/10/LOGOTESTHAUT.png"
        class="navbar-brand-img h-100"
        alt="main_logo" />
      <span class="ms-1 font-weight-bold">Black Hawk Security</span>
    </a>
  </div>
  <hr class="horizontal dark mt-0" />
  <div
    class="collapse navbar-collapse w-auto h-auto"
    id="sidenav-collapse-main">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" role="button" href="../../dashboards/board.php">
          <div
            class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
            <i class="ni ni-shop text-primary text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Acceuil</span>
        </a>
      </li>
      <hr class="horizontal dark" />
      <li class="nav-item">
        <a
          data-bs-toggle="collapse"
          href="#client"
          class="nav-link"
          aria-controls="client"
          role="button"
          aria-expanded="false">
          <div
            class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
            <i class="ni ni-circle-08 text-warning text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Clients</span>
        </a>
        <div class="collapse" id="client">
          <ul class="nav ms-4">
            <li class="nav-item">
              <a class="nav-link" href="../users/new-client.php">
                <span class="sidenav-mini-icon text-xs"> + </span>
                <span class="sidenav-normal"> Ajouter </span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../users/all-client.php">
                <span class="sidenav-mini-icon text-xs"> L </span>
                <span class="sidenav-normal"> Liste </span>
              </a>
            </li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a
          data-bs-toggle="collapse show"
          href="#factures"
          class="nav-link active"
          aria-controls="factures"
          role="button"
          aria-expanded="false">
          <div
            class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
            <i class="fa fa-file text-success text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Factures</span>
        </a>
        <div class="collapse show" id="factures">
          <ul class="nav ms-4">
            <li class="nav-item">
              <a class="nav-link" href="add-invoice.php">
                <span class="sidenav-mini-icon"> + </span>
                <span class="sidenav-normal"> Ajouter </span>
              </a>
            </li>
            <li class="nav-item active">
              <a class="nav-link active" href="all-invoice.php">
                <span class="sidenav-mini-icon"> L </span>
                <span class="sidenav-normal"> Liste </span>
              </a>
            </li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a
          data-bs-toggle="collapse"
          href="#recu"
          class="nav-link"
          aria-controls="recu"
          role="button"
          aria-expanded="false">
          <div
            class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
            <i class="ni ni-ui-04 text-info text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Reçus</span>
        </a>
        <div class="collapse" id="recu">
          <ul class="nav ms-4">
            <li class="nav-item">
              <a class="nav-link" href="add-receipt.php">
                <span class="sidenav-mini-icon"> + </span>
                <span class="sidenav-normal"> Ajouter </span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="all-receipt.php">
                <span class="sidenav-mini-icon"> L </span>
                <span class="sidenav-normal"> Liste </span>
              </a>
            </li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a
          data-bs-toggle="collapse"
          href="#proforma"
          class="nav-link"
          aria-controls="proforma"
          role="button"
          aria-expanded="false">
          <div
            class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
            <i class="ni ni-ungroup text-primary text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Proformas</span>
        </a>
        <div class="collapse" id="proforma">
          <ul class="nav ms-4">
            <li class="nav-item">
              <a class="nav-link" href="add-proforma.php">
                <span class="sidenav-mini-icon"> + </span>
                <span class="sidenav-normal"> Ajouter </span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="all-proforma.php">
                <span class="sidenav-mini-icon"> L </span>
                <span class="sidenav-normal"> Liste </span>
              </a>
            </li>
          </ul>
        </div>
      </li>
      <hr class="horizontal dark" />
      <li class="nav-item">
        <a
          data-bs-toggle="collapse"
          href="#staff"
          class="nav-link"
          aria-controls="staff"
          role="button"
          aria-expanded="false">
          <div
            class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
            <i class="ni ni-single-02 text-warning text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Staff</span>
        </a>
        <div class="collapse" id="staff">
          <ul class="nav ms-4">
            <li class="nav-item">
              <a class="nav-link" href="../users/new-staff.php">
                <span class="sidenav-mini-icon text-xs"> + </span>
                <span class="sidenav-normal"> Ajouter </span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../users/all-staff.php">
                <span class="sidenav-mini-icon text-xs"> L </span>
                <span class="sidenav-normal"> Liste </span>
              </a>
            </li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a
          data-bs-toggle="collapse"
          href="#gps"
          class="nav-link"
          aria-controls="gps"
          role="button"
          aria-expanded="false">
          <div
            class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
            <i class="ni ni-square-pin text-primary text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">GPS</span>
        </a>
        <div class="collapse" id="gps">
          <ul class="nav ms-4">
            <li class="nav-item">
              <a class="nav-link" href="../pages/gps/gps.php">
                <span class="sidenav-mini-icon text-xs"> + </span>
                <span class="sidenav-normal"> Recouvreur </span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../pages/gps/gps.php">
                <span class="sidenav-mini-icon text-xs"> L </span>
                <span class="sidenav-normal"> Recap </span>
              </a>
            </li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a
          data-bs-toggle="collapse"
          href="#auth"
          class="nav-link"
          aria-controls="auth"
          role="button"
          aria-expanded="false">
          <div
            class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
            <i class="ni ni-single-copy-04 text-danger text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Authentification</span>
        </a>
        <div class="collapse" id="auth">
          <ul class="nav ms-4">
            <li class="nav-item">
              <a class="nav-link" href="../authentication/reset/basic.html">
                <span class="sidenav-mini-icon"> R </span>
                <span class="sidenav-normal">
                  Réinitialiser le mot de passe <b class="caret"></b
                ></span>
              </a>
            </li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <hr class="horizontal dark" />
      </li>
    </ul>
  </div>
  <div class="sidenav-footer mx-3 my-3">
    <a
      href="blackhawksecurity.ci/contact.php"
      target="_blank"
      class="btn btn-dark btn-sm w-100 mb-3"
      >Contactez nous</a
    >
  </div>
</aside>
  
  <main class="main-content max-height-vh-100 h-100">
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl  position-sticky top-1 z-index-sticky" id="navbarBlur" data-scroll="false">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm">
              <a class="text-white" href="javascript:;">
                <i class="ni ni-box-2"></i>
              </a>
            </li>
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Facture</a></li>
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">Détails</li>
          </ol>
          <h6 class="font-weight-bolder text-white">Facture</h6>
        </nav>
        <div class="sidenav-toggler sidenav-toggler-inner d-xl-block d-none me-auto">
          <a href="javascript:;" class="nav-link text-body p-0">
            <div class="sidenav-toggler-inner">
              <i class="sidenav-toggler-line bg-white"></i>
              <i class="sidenav-toggler-line bg-white"></i>
              <i class="sidenav-toggler-line bg-white"></i>
            </div>
          </a>
        </div>
        <div class="collapse navbar-collapse me-md-0 me-sm-4 mt-sm-0 mt-2" id="navbar">
          <ul class="navbar-nav justify-content-end ms-auto">
            <li class="nav-item d-xl-none ps-3 pe-0 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line bg-white"></i>
                  <i class="sidenav-toggler-line bg-white"></i>
                  <i class="sidenav-toggler-line bg-white"></i>
                </div>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="container-fluid">
      <div class="row justify-content-between">
        <div class="col-lg-2 col-sm-4 col-xs-6">
          <div class="nav-wrapper position-relative end-0">
            <ul class="nav nav-pills nav-fill p-1">
              <li class="nav-item">
                <a class="nav-link mb-0 px-0 py-1 active " href="all-invoice.php" >Retour
                </a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-lg-2 col-sm-4 col-xs-6">
          <div class="nav-wrapper position-relative end-0">
            <ul class="nav nav-pills nav-fill p-1">
              <li class="nav-item">
                <a class="nav-link mb-0 px-0 py-1 active " href="#../../../pages/account/mail.php" >Envoyer par mail
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid my-5 py-2">
      <div class="row">
        <div class="col-md-8 col-sm-10 mx-auto">
          <form class="" action="index.php" method="post">
            <div class="card my-sm-5 my-lg-0">
              <div class="card-header text-center">
                <div class="row">
                  <div class="col-sm-8 text-start">
                    <img class="mb-2 w-25 p-2" src="https://blackhawksecurity.ci/wp-content/uploads/2023/10/LOGOTEXTNOIR.png" alt="Logo">
                    <h6>Nom du client</h6>
                    <p class="text-secondary"><?php echo $filedata['client'] ?><br></p>
                  </div>
                  <div class="col-sm-4 text-md-end text-start mt-5">
                    <h6>Date de la facture</h6>
                    <p class="text-secondary"><?php echo date('d-m-Y', strtotime($filedata['dateFacture'])); ?><br></p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-7 text-start">
                    <h6>Facture no</h6>
                    <p class="text-secondary"># <?php echo $filedata['numeroFacture'] ?><br></p>
                  </div>
                  <div class="col-sm-5 text-md-end text-start">
                    <h6>Date de mise en place</h6>
                    <p class="text-secondary"><?php echo $clientdata['dateMisePlace'] ?><br></p>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-12">
                    <div class="table-responsive border-radius-lg">
                      <table class="table text-right">
                        <thead class="bg-default">
                          <tr>
                            <th scope="col" class="pe-2 text-start ps-2 text-white">Désignation</th>
                            <th scope="col" class="pe-2 text-white">Qté</th>
                            <th scope="col" class="pe-2 text-white" colspan="2">Prix</th>
                            <th scope="col" class="pe-2 text-white">Total</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td class="text-start"><?php echo $filedata['produits'] ?></td>
                            <td class="ps-4"><?php echo $filedata['quantité'] ?></td>
                            <td class="ps-4" colspan="2"> <?php echo number_format($filedata["coutUnitaire"], 0, ',', ' ') . " CFA"; ?></td>
                            <td class="ps-4"> <?php echo number_format($filedata["montant"], 0, ',', ' ') . " CFA"; ?></td>
                          </tr>
                        </tbody>
                        <tfoot>
                          <tr>
                            <th></th>
                          </tr>
                        </tfoot>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer mt-md-5 mt-4">
                <div class="row">
                  <div class="col-lg-5 text-left">
                    <h5>Merci !</h5>
                    <p class="text-secondary text-sm">Si vous rencontrez un soucis relatif à cette facture merci de nous contacter à:</p>
                    <h6 class="text-secondary mb-0">
                      <span class="text-dark">support@blackhawksecurity.ci</span>
                    </h6>
                  </div>
                  <div class="col-lg-7 text-md-end mt-md-0 mt-3">
                    <button class="btn btn-primary mt-lg-7 mb-0" onClick="window.print()" type="button" name="button">Imprimer</button>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
      <footer class="footer pt-3  ">
        <div class="container-fluid">
          <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6 mb-lg-0 mb-4">
              <div class="copyright text-center text-sm text-muted text-lg-start">
                © <script>
                  document.write(new Date().getFullYear())
                </script>,
                <a href="#https://www.blackhawksecurity.ci" class="font-weight-bold" target="_blank">BLACK HAWK SECURITY</a>
              </div>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </main>
  <div class="fixed-plugin">
    <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
      <i class="fa fa-cog py-2"> </i>
    </a>
    <div class="card shadow-lg">
      <div class="card-header pb-0 pt-3 bg-transparent ">
        <div class="float-start">
          <h5 class="mt-3 mb-0">Options</h5>
          <p>Configuration du thème.</p>
        </div>
        <div class="float-end mt-4">
          <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
            <i class="fa fa-close"></i>
          </button>
        </div>
        <!-- End Toggle Button -->
      </div>
      <hr class="horizontal dark my-1">
      <div class="card-body pt-sm-3 pt-0 overflow-auto">
        <!-- Sidebar Backgrounds -->
        <div>
          <h6 class="mb-0"> Couleurs boutons</h6>
        </div>
        <a href="javascript:void(0)" class="switch-trigger background-color">
          <div class="badge-colors my-2 text-start">
            <span class="badge filter bg-gradient-primary active" data-color="primary" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-dark" data-color="dark" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-info" data-color="info" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-success" data-color="success" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-warning" data-color="warning" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-danger" data-color="danger" onclick="sidebarColor(this)"></span>
          </div>
        </a>
        <!-- Sidenav Type -->
        <div class="mt-3">
          <h6 class="mb-0">Menu latéral</h6>
          <p class="text-sm">Choisir entre les 2 differents thèmes.</p>
        </div>
        <div class="d-flex">
          <button class="btn bg-gradient-primary w-100 px-3 mb-2 active me-2" data-class="bg-white" onclick="sidebarType(this)">Blanc</button>
          <button class="btn bg-gradient-primary w-100 px-3 mb-2" data-class="bg-default" onclick="sidebarType(this)">Sombre</button>
        </div>
        <p class="text-sm d-xl-none d-block mt-2">Vous pouvez changer la navigation latérale en vue de bureau.</p>
        <!-- Navbar Fixed -->
        <div class="d-flex my-3">
          <h6 class="mb-0">Menu du haut fixe</h6>
          <div class="form-check form-switch ps-0 ms-auto my-auto">
            <input class="form-check-input mt-1 ms-auto" type="checkbox" id="navbarFixed" onclick="navbarFixed(this)">
          </div>
        </div>
        <hr class="horizontal dark mb-1">
        <div class="d-flex my-4">
          <h6 class="mb-0">Mini menu</h6>
          <div class="form-check form-switch ps-0 ms-auto my-auto">
            <input class="form-check-input mt-1 ms-auto" type="checkbox" id="navbarMinimize" onclick="navbarMinimize(this)">
          </div>
        </div>
        <hr class="horizontal dark my-sm-4">
        <div class="mt-2 mb-5 d-flex">
          <h6 class="mb-0">Clair / Sombre</h6>
          <div class="form-check form-switch ps-0 ms-auto my-auto">
            <input class="form-check-input mt-1 ms-auto" type="checkbox" id="dark-version" onclick="darkMode(this)">
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="../../../assets/js/core/popper.min.js"></script>
  <script src="../../../assets/js/core/bootstrap.min.js"></script>
  <script src="../../../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../../../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <!-- Kanban scripts -->
  <script src="../../../assets/js/plugins/dragula/dragula.min.js"></script>
  <script src="../../../assets/js/plugins/jkanban/jkanban.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../../../assets/js/argon-dashboard.min.js?v=2.0.5"></script>
</body>

</html>