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

use Classes\Service;
//use Classes\Users;

//$uu = $_SESSION['user'];
//$userdata = Users::findOne($uu);
include "../../../auth.php";
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

    <script type="text/javascript" src="../../../assets/js/jquery-3.7.1.js"></script>

    <style>

        ul

        {

            background-color:#eee;

            cursor:pointer;

        }

        li

        {

            padding:12px;

        }

    </style>
</head>

<body class="g-sidenav-show   bg-gray-100">
  <div class="min-height-300 bg-dark position-absolute w-100"></div>
<!--
  <div id="mySidenav" class="mySidenav invisible">
    <aside
            class="bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4"
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
            <a href="#" class="closebtn" onclick="closeNav()">&times;</a>

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
                            <li class="nav-item active">
                                <a class="nav-link active" href="add-invoice.php">
                                    <span class="sidenav-mini-icon"> + </span>
                                    <span class="sidenav-normal"> Ajouter </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="all-invoice.php">
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

</div>
-->

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
                      <li class="breadcrumb-item text-sm text-white"><a class="opacity-5 text-white" href="javascript:;">Factures</a></li>
                      <li class="breadcrumb-item text-sm text-white active" aria-current="page">Ajouter une facture</li>
                  </ol>
                  <h6 class="font-weight-bolder mb-0 text-white">Bonjour <?php echo $userdata[0]->getName(); ?></h6>
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
                      </div>
                  </div>
                  <ul class="navbar-nav  justify-content-end">
                      <li class="nav-item d-flex align-items-center">
                          <a href="../../pages/authentication/signin/logout.php" class="nav-link text-white font-weight-bold px-0" target="_blank">
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
                          </a><!--
                          <span class="small-menu" style ="font-size: 30px; cursor: pointer; color: #21D192"

                          onclick="openNav();"
                          >&#9776; </span>-->

                      </li>
                      <li class="nav-item px-3 d-flex align-items-center">
                          <a href="" class="nav-link text-white p-0">
                              <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
                          </a>
                      </li>
                  </ul>
                  <button class="navbar-toggler bg-white" type="button" data-bs-target="#collapsibleNavbar">
                      <span class="navbar-toggler-icon"></span>
                  </button>
              </div>
          </div>
      </nav>



      <!-- End Navbar -->
    <div class="container-fluid py-4">
      <div class="row mb-5"><!--
          <div id="mySidenav" class="mySidenav">
              <a href="#" class="closebtn" onClick="closeNav()">&times;</a>
          </div>-->
        <div class="col-12">
          <div class="multisteps-form mb-5">
            <!--progress bar-->
            <div class="row">
              <div class="col-12 col-lg-8 mx-auto my-4">
                <div class="card">
                  <div class="card-body">
                    <div class="multisteps-form__progress">
                      <button class="multisteps-form__progress-btn js-active" type="button" title="Info client">
                        <span>Informations</span>
                      </button>
                      <button class="multisteps-form__progress-btn" type="button" title="Details">Détails</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!--form panels col-12 col-lg-8 m-auto for_form=multisteps-form__form -->
            <div class="row">
              <div class="col-sm-8 mx-auto" id="creer_une_facture_div">
                <form class="row g-3 multisteps-form__form" name="creer_une_facture" id="creer_une_facture" role="form" >
                    
                  <!--single form panel-->
                  <div class="card p-3 border-radius-xl bg-white" data-animation="FadeIn">
                    <h5 class="font-weight-bolder mb-0">Créer une facture</h5>
                    <div class="multisteps-form__content">

                      <div class="row mt-3">
                        <div class="col-12 col-lg-12 col-sm-6 mt-3 mt-sm-0">
                            <label for= "client" class="form-label">Entrez le nom du client</label>
                            <input required="required" type="text" name="client" id="client" class="form-control" style="color: black; background-color: white" placeholder=" Enter the name and choose in the list" />
                            <div id="clientList"></div>
                        </div>

                      </div>

                      <div class="row mt-3">

                          <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                              <label for= "numeroFacture" class="form-label">Numéro facture</label>
                              <input required="required" class="form-control" type="text" style="color: black; background-color: white" name="numeroFacture" id="numeroFacture"  />
                          </div>

                        <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                          <label for= "dateFacture" class="form-label">Date de la facture</label>
                          <input required="required" class="form-control" type="date" style="color: black; background-color: white" name="dateFacture" id="dateFacture"/>
                        </div>


                      </div>

                      <div class="button-row d-flex mt-4">
                        <button class="btn bg-gradient-dark ms-auto mb-0 btn btn-sm" type="button" title="Next" name="next_facture_step" id="next_facture_step">Suivant</button>
                      </div>
                    </div>
                  </div>

                </form>
              </div>

                <div class="col-sm-8 mx-auto invisible" id="detail_facture_div">

                    <form class="row g-3" name="detail_facture_form" id="detail_facture_form" role="form">
                        <!--single form panel-->
                        <div class="card p-3 border-radius-xl bg-white" id="detail_facture_div" data-animation="FadeIn">
                            <h5 class="font-weight-bolder">Détails facture</h5>
                            <div class="multisteps-form__content">
                                <div class="form row mt-3">
                                    <div class="col-6 mt-3">
                                        <label for= "service">Selectionnez un service</label>
                                        <select required="required" class="form-control" id="service" name="service" style="color: black; background-color: white">
                                        <?php $allServive = Service::allService(); foreach ($allServive as $value) : ?>
                                            <option value="<?php echo $value->getIdService(); ?>"><?php echo $value->getDesignation(); ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>

                                    <div class="col-6 mt-3">
                                        <label for= "date_mep">Date de la mise en place du service</label>
                                        <input required="required" class="form-control" type="date" name="date_mep" id="date_mep"  style="color: black; background-color: white" />
                                    </div>

                                    <div class="col-6 mt-3">
                                        <label for= "prix">Prix</label>
                                        <input required="required" class="form-control" type="number" name="prix" id="prix"  style="color: black; background-color: white" />
                                    </div>

                                    <div class="col-6 mt-3">
                                        <label class="form-label" for="remise">Remise</label>
                                        <input class="form-control" type="number" name="remise" id="remise"  style="color: black; background-color: white" />
                                    </div>

                                    <div class="col-6 mt-3">
                                        <label class="form-label" for="quantity">Quantité</label>
                                        <div class="qte-div d-flex justify-content-between">

                                            <button type="button" class="btn btn-sm quantity-left-minus" data-type="minus" data-field=""> - </button>

                                            <input required="required" type="number" class="form-control" name="quantity" id="quantity" min="1" max="100" readonly />

                                            <button type="button" class="btn btn-sm quantity-right-plus" data-type="plus" data-field="">+</button>

                                        </div>
                                    </div>

                                    <div class="col-6 mt-3 invisible" id="site_select">
                                        <label for="site" class="form-label">Selectionnez le site concerné</label>
                                        <select required="required" id="site" name="site" class="form-control" style="background-color: white; color: black"></select>
                                    </div>

                                    <div class="col-6 mt-3 invisible" id="the_site_saisi">
                                        <label class="form-label" for="site_saisi">Entrez le code du site</label>
                                        <input required="required" type="text" name="site_saisi" id="site_saisi"  class="form-control" />
                                    </div>

                                    <div class="row g-3 p-4">
                                        <!-- Hidden facture id and user id in detail facture -->
                                        <input class="form-control" type="hidden" name="idFacture" id="idFacture" value="" readonly />
                                        <input class="form-control" type="hidden" name="user_id" id="user_id" value="" readonly />

                                        <div class="col amountremise d-flex justify-content-between">

                                            <div class="amountremisesub">

                                                <span><small class="form-label">Remise en FCFA: </small><p class="text-muted" id="sub"></p></span>
                                            </div>

                                            <div class="">
                                                <label for="total" class="form-label fw-6 text-back">TOTAL en FCFA</label><br>
                                                <div class="col">
                                                    <input class="form-control" type="text" name="total" id="total" value="" readonly="readonly">
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="form-row mt-3">
                                        <div class="col-12 mt-3">
                                            <button class="btn bg-gradient-dark ms-auto mb-0" type="button" name="ajouter_ligne_facture" id="ajouter_ligne_facture">Ajouter à la facture</button>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="button-row d-flex mt-4">
                                            <button class="btn bg-gradient-light mb-0" id="prev" name="prev" type="button" title="Prev">Retour</button>
                                            <button class="btn bg-gradient-dark ms-auto mb-0" id="valider_facture_detail" type="submit" name="valider_facture_detail" title="Enregistrer">Enregistrer</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </form>

                    <div class="table-responsive" id="line_facture"></div>
                </div>
            </div>
          </div>
        </div>

          <form class="multisteps-form__form mb-8" action="" method="post" enctype="multipart/form-data">

              <!--single form panel-->
              <hr class="multisteps-form__panel p-3 border-radius-xl bg-white js-active" data-animation="FadeOut" />

          </form>

      </div>
      <footer class="footer pt-3  ">
        <div class="container-fluid">
          <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6 mb-lg-0 mb-4">
              <div class="copyright text-center text-sm text-muted text-lg-start">
                © <script>
                  document.write(new Date().getFullYear())
                </script>,
                <a href="https://localhost" class="font-weight-bold" target="_blank">BLACK HAWK SECURITY</a>
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
            <input class="form-check-input mt-1 ms-auto" type="checkbox" id="navbarFixed" onclick="navbarFixed(this)" />
          </div>
        </div>
        <hr class="horizontal dark mb-1">
        <div class="d-flex my-4">
          <h6 class="mb-0">Mini menu</h6>
          <div class="form-check form-switch ps-0 ms-auto my-auto">
            <input class="form-check-input mt-1 ms-auto" type="checkbox" id="navbarMinimize" onclick="navbarMinimize(this)" />
          </div>
        </div>
        <hr class="horizontal dark my-sm-4">
        <div class="mt-2 mb-5 d-flex">
          <h6 class="mb-0">Clair / Sombre</h6>
          <div class="form-check form-switch ps-0 ms-auto my-auto">
            <input class="form-check-input mt-1 ms-auto" type="checkbox" id="dark-version" onclick="darkMode(this)" />
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
  <script src="../../../assets/js/plugins/multistep-form.js"></script>
  <!-- Kanban scripts -->
  <script src="../../../assets/js/plugins/dragula/dragula.min.js"></script>
  <script src="../../../assets/js/plugins/jkanban/jkanban.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      let options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../../../assets/js/argon-dashboard.min.js?v=2.0.5"></script>
<script type="text/javascript">
    // Toggle Menu
    function openNav(){

        $("#mySidenav").removeClass("invisible");

        //document.getElementById("mySidenav").removeClass("invisible");

    }

    //Toggle close menu
    const closeNav = () => {
        $("#mySidenav").addClass("invisible");
    }
</script>
<script type="text/javascript" src="../../../assets/js/angetraore-dev.js"></script>
</body>

</html>