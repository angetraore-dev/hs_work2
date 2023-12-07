<?php
include "../../../auth.php";

if(isset($_GET['id'])){
    $userid = $_GET['id'];
    $query = "select * from users where id = ?";
    $stmt = $sql->prepare($query);
    $stmt->bindParam(1, $userid, PDO::PARAM_INT);
    $stmt->execute();
    $row = $stmt->fetch();
    if($stmt->rowCount()==0){
        header("location:users");
    }
    $email = $row['email'];
    $telephone = $row['telephone'];
    $name = $row['name'];
    $code = $row['code'];
    $comment = $row['comment'];
    
    
}else{
    header("location:users");
}

if(isset($_GET['id'])){
    $fileid = $_GET['id'];
    $query = "select * from users where id=?";
    $stmt = $sql->prepare($query);
    $stmt->bindParam(1, $fileid, PDO::PARAM_STR);
    $stmt->execute();
    $filedata = $stmt->fetch();
    
    $query = "select * from users where id=?";
    $stmt = $sql->prepare($query);
    $stmt->bindParam(1, $filedata['user_id'], PDO::PARAM_STR);
    $stmt->execute();
    $user = $stmt->fetch();
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

<body class="g-sidenav-show   bg-gray-100">
  <div class="min-height-300 bg-dark position-absolute w-100"></div>
  
<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4" id="sidenav-main">
  <div class="sidenav-header">
    <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
      aria-hidden="true" id="iconSidenav"></i>
    <a class="navbar-brand m-0" href=" https://blackhawksecurity.ci " target="_blank">
      <img src="https://blackhawksecurity.ci/wp-content/uploads/2023/10/LOGOTESTHAUT.png" class="navbar-brand-img h-100"
        alt="main_logo" />
      <span class="ms-1 font-weight-bold">Black Hawk Security</span>
    </a>
  </div>
  <hr class="horizontal dark mt-0" />
  <div class="collapse navbar-collapse w-auto h-auto" id="sidenav-collapse-main">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" role="button" href="../../dashboards/board.php">
          <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
            <i class="ni ni-shop text-primary text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Acceuil</span>
        </a>
      </li>
      <hr class="horizontal dark" />
      <li class="nav-item">
        <a data-bs-toggle="collapse" href="#client" class="nav-link" aria-controls="client" role="button"
          aria-expanded="false">
          <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
            <i class="ni ni-circle-08 text-warning text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Clients</span>
        </a>
        <div class="collapse" id="client">
          <ul class="nav ms-4">
            <li class="nav-item">
              <a class="nav-link" href="new-client.php">
                <span class="sidenav-mini-icon text-xs"> + </span>
                <span class="sidenav-normal"> Ajouter </span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="all-client.php">
                <span class="sidenav-mini-icon text-xs"> L </span>
                <span class="sidenav-normal"> Liste </span>
              </a>
            </li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a data-bs-toggle="collapse" href="#factures" class="nav-link" aria-controls="factures" role="button"
          aria-expanded="false">
          <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
            <i class="fa fa-file text-success text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Factures</span>
        </a>
        <div class="collapse" id="factures">
          <ul class="nav ms-4">
            <li class="nav-item">
              <a class="nav-link" href="../account/add-invoice.php">
                <span class="sidenav-mini-icon"> + </span>
                <span class="sidenav-normal"> Ajouter </span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../account/all-invoice.php">
                <span class="sidenav-mini-icon"> L </span>
                <span class="sidenav-normal"> Liste </span>
              </a>
            </li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a data-bs-toggle="collapse" href="#recu" class="nav-link" aria-controls="recu" role="button"
          aria-expanded="false">
          <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
            <i class="ni ni-ui-04 text-info text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Reçus</span>
        </a>
        <div class="collapse" id="recu">
          <ul class="nav ms-4">
            <li class="nav-item">
              <a class="nav-link" href="../account/add-receipt.php">
                <span class="sidenav-mini-icon"> + </span>
                <span class="sidenav-normal"> Ajouter </span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../account/all-receipt.php">
                <span class="sidenav-mini-icon"> L </span>
                <span class="sidenav-normal"> Liste </span>
              </a>
            </li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a data-bs-toggle="collapse" href="#proforma" class="nav-link" aria-controls="proforma" role="button"
          aria-expanded="false">
          <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
            <i class="ni ni-ungroup text-primary text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Proformas</span>
        </a>
        <div class="collapse" id="proforma">
          <ul class="nav ms-4">
            <li class="nav-item">
              <a class="nav-link" href="../account/add-proforma.php">
                <span class="sidenav-mini-icon"> + </span>
                <span class="sidenav-normal"> Ajouter </span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../account/all-proforma.php">
                <span class="sidenav-mini-icon"> L </span>
                <span class="sidenav-normal"> Liste </span>
              </a>
            </li>
          </ul>
        </div>
      </li>
      <hr class="horizontal dark" />
      <li class="nav-item active">
        <a data-bs-toggle="collapse show" href="#staff" class="nav-link active" aria-controls="staff" role="button"
          aria-expanded="false">
          <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
            <i class="ni ni-single-02 text-warning text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Staff</span>
        </a>
        <div class="collapse show" id="staff">
          <ul class="nav ms-4">
            <li class="nav-item">
              <a class="nav-link" href="new-staff.php">
                <span class="sidenav-mini-icon text-xs"> + </span>
                <span class="sidenav-normal"> Ajouter </span>
              </a>
            </li>
            <li class="nav-item active">
              <a class="nav-link active" href="all-staff.php">
                <span class="sidenav-mini-icon text-xs"> L </span>
                <span class="sidenav-normal"> Liste </span>
              </a>
            </li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a data-bs-toggle="collapse" href="#gps" class="nav-link" aria-controls="gps" role="button"
          aria-expanded="false">
          <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
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
        <a data-bs-toggle="collapse" href="#auth" class="nav-link" aria-controls="auth" role="button"
          aria-expanded="false">
          <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
            <i class="ni ni-single-copy-04 text-danger text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Authentification</span>
        </a>
        <div class="collapse" id="auth">
          <ul class="nav ms-4">
            <li class="nav-item">
              <a class="nav-link" href="../pages/authentication/reset/basic.html">
                <span class="sidenav-mini-icon"> R </span>
                <span class="sidenav-normal">
                  Réinitialiser le mot de passe <b class="caret"></b></span>
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
    <a href="blackhawksecurity.ci/contact.php" target="_blank" class="btn btn-dark btn-sm w-100 mb-3">Contactez nous</a>
  </div>
</aside>
  
  <main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg  px-0 mx-4 shadow-none border-radius-xl z-index-sticky " id="navbarBlur" data-scroll="false">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm">
              <a class="text-white" href="javascript:;">
                <i class="ni ni-box-2"></i>
              </a>
            </li>
            <li class="breadcrumb-item text-sm text-white"><a class="opacity-5 text-white" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">Staff</li>
          </ol>
          <h6 class="font-weight-bolder mb-0 text-white">Bonjour <?php echo ucwords($userdata['name']); ?></h6>
        </nav>
        <div class="sidenav-toggler sidenav-toggler-inner d-xl-block d-none ">
          <a href="javascript:;" class="nav-link p-0">
            <div class="sidenav-toggler-inner">
              <i class="sidenav-toggler-line bg-white"></i>
              <i class="sidenav-toggler-line bg-white"></i>
              <i class="sidenav-toggler-line bg-white"></i>
            </div>
          </a>
        </div>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            <div class="input-group">
              <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
              <input type="text" class="form-control" name= "search" placeholder="Rechercher...">
            </div>
          </div>
          <ul class="navbar-nav  justify-content-end">
            <li class="nav-item d-flex align-items-center">
              <a href="../../../pages/authentication/signin/logout.php" class="nav-link text-white font-weight-bold px-0" target="_blank">
                <i class="fa fa-user me-sm-1"></i>
                <span class="d-sm-inline d-none">Se déconnecter</span>
              </a>
            </li>
            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-white p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line bg-white"></i>
                  <i class="sidenav-toggler-line bg-white"></i>
                  <i class="sidenav-toggler-line bg-white"></i>
                </div>
              </a>
            </li>
            <li class="nav-item px-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-white p-0">
                <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->

        <div class="container-fluid mt--6 mx-auto">
            <div class="row">
                <div class="col-md-8 mx-auto">
                    <div class="card-wrapper">
                        <!-- Custom form validation -->
                        <div class="card">
                            <!-- Card header -->
                            <div class="card-header">
                                    <span class="float-right">
                                        <a href="all-staff.php" class="btn btn-primary btn-sm">Retour</a>
                                    <?php if (isset($_GET['staff'])) { ?>
                                        <a href="edit-staff?id=<?php echo $filedata['id']; ?>&staff=<?php echo $filedata['user_id']; ?>" class="btn btn-primary btn-sm">Editer le profil</a>
                                    <?php } else { ?>
                                        <a href="edit-staff?id=<?php echo $filedata['id']; ?>" class="btn btn-primary btn-sm">Editer le profil</a>
                                    <?php } ?>
                                </span>

                            </div>
                            <div class="table-responsive py-4">
                            <h1 class="px-4 py-2 text-center">Infos staff</h1>
                            <table class="table align-items-center table-bordered" id="">
                                <tr>
                                    <th>Code de connection</th>
                                    <td><?php echo $code ?></td>
                                </tr>
                                <tr>
                                    <th>Nom </th>
                                    <td><?php echo $name ?></td>
                                </tr>
                                <tr>
                                    <th>Adresse mail</th>
                                    <td><?php echo $email ?></td>
                                </tr>
                                <tr>
                                    <th>Numéro de téléphone</th>
                                    <td><?php echo $telephone ?></td>
                                </tr>
                                <tr>
                                    <th>Commentaires</th>
                                    <td><?php echo $comment ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
        </div>
      </div>
    </div>
    </div>
</main>
</body>

</html>