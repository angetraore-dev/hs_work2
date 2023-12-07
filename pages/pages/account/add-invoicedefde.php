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
       <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

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
                <div class="col-12 col-lg-8 m-auto creationFacture">
                  
                  <!--CREATION DE FACTURE-->
                  
                  
                    <div class="col-sm-8  mx-auto" id="forfacture">

        <h3 class="h3 text-black fw-4 fs-3 my-4 text-left" id="create_facture"> Create a facture</h3>

        <form class="row g-3" name="formcreateFacture" id="formcreateFacture" role="form">
            
            <div class="col-12">
                <label for="userr" class="form-label">Search Customer by Name :</label>

                <input autocomplete="off" type="text" name="userr" id="userr" class="form-control" placeholder="Enter Customer Name" />

                <div id="userList"></div>

            </div>
            <div class="col-6">
                <label for="datemiseenplace" class="form-label">Date de mise en place</label>
                <input type="date" class="form-control" id="datemiseenplace" name="datemiseenplace" />
            </div>

            <div class="col-6">
                <label for="numFacture" class="form-label">Numero Facture</label>
                <input type="text" class="form-control" id="numFacture" name="numFacture" />
            </div>
            
            <div class="col-12">
                <label for="typemiseenplace" class="form-label"> typemiseenplace </label>
                <input type="text" class="form-control" id="typemiseenplace" name="typemiseenplace" />
            </div>

            
           
            <div class="col-12 my-3">
                <button type="button" id="buttoncreateFacture" name="buttoncreateFacture" class="btn btn-primary float-end">next</button>
            </div>
        </form>
        
        
                  <!--CREATION DE FATURE END-->
        
        
               
               
               
               
               
               
               
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
	                        $query = "SELECT * FROM `clients` order by id desc";
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
                        
                      </div>
                      <div class="button-row d-flex mt-4">
                        <button class="btn bg-gradient-dark ms-auto mb-0 js-btn-next" type="button" id="next" name="next" title="Next">Suivant</button>
                      </div>
                    </div>
                  </div>
                  <!--single form panel-->
                </form>
                  
                 
                  
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
                
                
                
                <div class="col-sm-8 mx-auto p-4 creationadddetailFacture">
                    
                
                    
                    <!--detail facture-->
                    

                        <form class="form py-4 px-2" name="formadddetailFacture" id="formadddetailFacture" role="form">
            
                        <div class="row g-3">
                            <div class="col">
                                <label for="formIdSite" class="form-label">Site</label>
                                <input type="number" name="formIdSite" id="formIdSite" class="form-control">
                                    
                            </div>
                            
                            <div class="col">
                                <label for="formIdService" class="form-label">Designation</label>
                                <select name="formIdService" id="formIdService" class="form-select">
                                    
                                  <option value="11">11</option>
            
                                </select>
                            </div>
            
                            <div class="col">
                                <label for="formprix" class="form-label">Prix</label>
                                <input class="form-control" type="number" name="formprix" id="formprix" />
                            </div>
                        </div>
            
            
                        <div class="row g-3 py-4">
            
                            <div class="col-8">
            
                                <label for="quantity" class="form-label">Quantite</label>
            
                                <div class="qte-div">
            
                                    <button type="button" class="quantity-left-minus" data-type="minus" data-field=""> - </button>
            
                                    <input type="number" class="" name="quantity" id="quantity" value="" min="1" max="100" readonly />
            
                                    <button type="button" class="quantity-right-plus" data-type="plus" data-field="">+</button>
            
                                </div>
            
                            </div>
            
            
                            <div class="col">
                                <label for="formIdRemise" class="form-label">Remise</label>
                                <input type="number" name="formIdRemise" id="formIdRemise" class="form-control">
                                    
                            </div>
                            
                            
            
                        </div>
            
                        <!-- idFacture to repeat insertion in same facture -->
                       <div class="row g-3 p-4">
                           <div class="col">
                               <label for="idFacture" class="form-label">Facture numero:</label>
                               <input class="form-control" type="text" name="idFacture" id="idFacture" value="" readonly="readonly" />
                               <input class="form-control" type="text" name="code" id="code" value=""  />
            
                           </div>
                           <div class="col amountremise">
                               <label for="total" class="form-label fw-6 text-back">Montant TOTAL en FCFA *</label><br>
            
                               <div class="amountremisesub">
            
                                   <label for="sub" class="form-label text-muted"><small>Remise Amount:</small></label>
                                   <span><p class="text-muted" id="sub"></p> FCFA</span>
                               </div>
                               <input class="form-control" type="text" name="total" id="total" value="" readonly="readonly">
            
                           </div>
                       </div>
            
                        <div class="col-12 my-4">
                            <button class="btn btn-primary bg-dark text-white float-start" type="button" name="ajouter" id="ajouter">Ajouter a la facture</button>
                            <button class="btn btn-outline-success text-black float-end" type="button" name="save" id="save">Save & close</button>
                        </div>
            
                    </form>
                    
                        <div id="retourderequest"></div>
        
                    <!--end detail facture -->
                    
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
  <script>
  document.addEventListener("DOMContentLoaded", () => {
    console.log("Hello World!");
});
  
   $(document).ready(function(){
      
      
    $('#forcomporter').hide();
    $('.amountremisesub').fadeOut();
      
       $('#userr').keyup(function(){
        
        let value = $(this).val();
        
        
        
        if(value != ""){
            
            $.ajax({
                url:'https://blackhawksecurity.ci/app/customWorkk.php',
                method: 'POST',
                data:{searchUser:value},
                success:function(data){
                    
                    $('#userList').fadeIn();
                    $('#userList').html(data);
                    
                }
            
            });
        
        }
        
        
        
        $(document).on('click', 'li', function(){

            $('#userr').val($(this).text());
            
        
    
            $('#userList').fadeOut();
            
            let idUser = $("#userr").val();
            
            $.ajax({

            url:"https://blackhawksecurity.ci/app/customWorkk.php",

            method:"POST",

            data:{iduser:idUser},

            success:function(data)

            {
                //champ site
                
                $('#idFacture').val(data);
               
                

            }

        });

        });
        
    });
    
    
     
   $("#buttoncreateFacture").on('click', function (){
           
        let formData = new FormData(document.querySelector("#formcreateFacture"));
        var object = {};
        formData.forEach((value, key) => object[key] = value);
        
        var json = JSON.stringify(object);
        
        console.log(json);

        $.ajax({

            url:"https://blackhawksecurity.ci/app/customWorkk.php",

            method:"POST",

            data:{createFacture:json},

            success:function(data)

            {
                $('#forfacture').fadeOut();
                
                $('#foradddetailfacture').show();
                
                
                $('#idFacture').val(data);
               
                

            }

        });

    });





 $('.quantity-right-plus').click(function(e){

        // Stop acting like a button
        e.preventDefault();

        let quantity = parseInt($('#quantity').val());
        let newOne = quantity + 1;

        // If is not undefined
        $('#quantity').val( newOne );


        $('#total').val( $('#prix').val() * newOne );

        // Increment

    });

    $('.quantity-left-minus').click(function(e){

        // Stop acting like a button
        e.preventDefault();

        // Get the field name
        var quantity = parseInt($('#quantity').val());

        // If is not undefined

        // Increment
        if(quantity>1){

            var newOne = quantity - 1 ;

            $('#quantity').val(newOne);

            $('#total').val($('#prix').val() * newOne);
        }

    });










   });
  </script>
 
</body>

</html>