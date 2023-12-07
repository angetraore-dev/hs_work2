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

if(isset($_POST['submit'])){

        $dateadded = date("Y-m-d H:i:s");

        $query = "INSERT into factures ( numeroFacture, client, dateFacture, dateMisePlace, service, quantite, prix, remise, montant, dateadded, typeMise, codeSite) VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $sql->prepare($query);

        $stmt->bindParam(1, $_POST['numeroFacture'], PDO::PARAM_STR);
        $stmt->bindParam(2, $_POST['client'], PDO::PARAM_STR);
        $stmt->bindParam(3, $_POST['dateFacture'], PDO::PARAM_STR);
        $stmt->bindParam(4, $_POST['dateMisePlace'], PDO::PARAM_STR);
        $stmt->bindParam(5, $_POST['service'], PDO::PARAM_STR);
        $stmt->bindParam(6, $_POST['quantite'], PDO::PARAM_STR);
        $stmt->bindParam(7, $_POST['prix'], PDO::PARAM_STR);
        $stmt->bindParam(8, $_POST['remise'], PDO::PARAM_STR);
        $stmt->bindParam(9, $_POST['montant'], PDO::PARAM_STR);
        $stmt->bindParam(10, $dateadded, PDO::PARAM_STR);
        $stmt->bindParam(11, $_POST['typeMise'], PDO::PARAM_STR);
        $stmt->bindParam(12, $_POST['codeSite'], PDO::PARAM_STR);
        $stmt->execute();
        $alert = "notify('success', 'Facture ajoutée avec succès.');";
};

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
  

  <main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
    <!-- End Navbar -->
    <div class="container-fluid py-4">
      <div class="row mb-5">
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
            <!--form panels-->
            <div class="row">
              <div class="col-12 col-lg-8 m-auto">
                <form class="multisteps-form__form mb-8" action="" method="post" enctype="multipart/form-data">
                    
                  <!--single form panel-->
                  <div class="card multisteps-form__panel p-3 border-radius-xl bg-white js-active" data-animation="FadeIn">
                    <h5 class="font-weight-bolder mb-0">Créer une facture</h5>
                    <div class="multisteps-form__content">
                      <div class="row mt-3">
                        <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                            <label for= "client">Choisissez le client</label>
                          <select name="client" class="form-control bg-white">
                        <?php	
	                        $query = "SELECT * FROM `users` order by id desc";
	                        $stmt = $sql->prepare($query);
	                        $stmt->execute();
	                    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                        ?>
                        	<option value="<?php echo $row['code']; ?>"><?php echo $row['code']; ?></option>
                        <?php } ?>
                          </select>
                        </div>
                          <div class="col-12 col-sm-6">
                          <label for= "dateMisePlace">Date de mise en place</label>
                          <input class="multisteps-form__input form-control" type="date" name="dateMisePlace" id="dateMisePlace"/>
                        </div>
                      </div>
                      <div class="row mt-3">
                        <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                          <label for= "numeroFacture">Numéro facture</label>
                          <input class="multisteps-form__input form-control" type="numeroFacture" name="numeroFacture" id="numeroFacture"  />
                        </div>
                        <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                          <label for= "dateFacture">Date de la facture</label>
                          <input class="multisteps-form__input form-control" type="date" name="dateFacture" id="dateFacture"/>
                        </div>
                      </div>
                      <div class="row mt-3">
                        <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                          <label for= "typeMise">Type de mise en place</label>
                          <input class="multisteps-form__input form-control" type="text" name="typeMise" id="typeMise"  />
                        </div>
                        <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                          <label for= "codeSite">Code du site</label>
                          <input class="multisteps-form__input form-control" type="text" name="codeSite" id="codeSite"  />
                        </div>
                      </div>
                      <div class="button-row d-flex mt-4">
                        <button class="btn bg-gradient-dark ms-auto mb-0 js-btn-next" type="button" title="Next">Suivant</button>
                      </div>
                    </div>
                  </div>
                  <!--single form panel-->
                  <div class="card multisteps-form__panel p-3 border-radius-xl bg-white" data-animation="FadeIn">
                    <h5 class="font-weight-bolder">Détails facture</h5>
                    <div class="multisteps-form__content">
                      <div class="form row mt-3">
                        <div class="col-6 mt-3">
                          <label for= "service">Désignation</label>
                          <select class="multisteps-form__input form-control" id="service" name="service" >
                        <option value="AGS">AGS</option>
                        <option value="ADP">ADP</option>
                        <option value="C/E">C/E</option>
                        <option value="BIP">BIP</option>
                        <option value="VIDEO">VIDEO</option>
                        <option value="TRAK">TRAK</option>
                        <option value="MESS">MESS</option>
                        <option value="Anti-INT">Anti-INT</option>
                        <option value="EQP Moto">EQP Moto</option>
                          </select>
                        </div>
                        <div class="col-6 mt-3">
                          <label for= "prix">Prix</label>
                          <input class="multisteps-form__input form-control" type="text" name="prix" id="prix" />
                        </div>
                        <div class="col-6 mt-3">
                          <label for= "remise">Remise</label>
                          <input class="multisteps-form__input form-control" type="text" name="remise" id="remise" />
                        </div>
                        <div class="col-6 mt-3">
                          <label for= "quantite">Quantité</label>
                          <input class="multisteps-form__input form-control" type="text" name="quantite" id="quantite" />
                        </div>
                        <div class="form row mt-3">
                        <div class="col-6 mt-3">
                          <label for= "montant">Montant</label>
                          <input class="multisteps-form__input form-control" type="text" name="montant" id="montant" />
                        </div>
                        <div class="col-12 mt-3">
                        <button class="btn bg-gradient-dark ms-auto mb-0" type="button" onclick="ajouterService()">Ajouter un Service</button>
                        </div>
                      </div>
                      <div class="row">
                        <div class="button-row d-flex mt-4">
                        <button class="btn bg-gradient-light mb-0 js-btn-prev" type="button" title="Prev">Retour</button>
                        <button class="btn bg-gradient-dark ms-auto mb-0" type="submit" name="submit" title="Enregistrer">Enregistrer</button>
                      </div>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
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
                <a href="https://blackhawksecurity.ci" class="font-weight-bold" target="_blank">BLACK HAWK SECURITY</a>
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
  <script src="../../../assets/js/plugins/multistep-form.js"></script>
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