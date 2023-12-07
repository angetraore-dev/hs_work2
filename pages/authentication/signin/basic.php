<?php

use Classes\Autoloader;
use Classes\Users;

ob_start();

session_start();

require '../../../Classes/Autoloader.php';
Autoloader::register();

if (isset($_SESSION['user'])) {

    header("location: ../../../pages/dashboards/board.php");

    die();

    exit();

}



if (isset($_POST['submit'])) {

    $_code = $_POST['code'];

    $_password = $_POST['password'];

    $findUser = Users::findOneByCode($_code);
    var_dump($findUser);
    //$findUser[0]->getId()

    $total = count($findUser);

    if ($total == 1) {

        $db_code = $findUser[0]->getCode();

        $db_password = $findUser[0]->getPassword();

        if ($_code == $db_code && password_verify($_password, $db_password)) {

            $_SESSION['user'] = $findUser[0]->getId();

            ob_start();

            header('location: ../../../pages/dashboards/board.php');

            exit();

        } else {

            $error = "<div class='alert alert-danger'>Identifiant ou mot de passe incorrect</div>";



        }

    } else {

        $error = "<div class='alert alert-danger'>Identifiant ou mot de passe incorrect</div>";

    }

}

if (isset($_SESSION['message'])) {

    $error = $_SESSION['message'];

    unset($_SESSION['message']);

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

    <title>Black Hawk Security board</title>

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

<body class="">

<div class="container position-sticky z-index-sticky top-0">

    <div class="row">

        <div class="col-12">

            <!-- Navbar -->

            <nav class="navbar navbar-expand-lg blur border-radius-lg top-0 z-index-3 shadow position-absolute my-3 py-2 start-0 end-0 mx-4">

                <div class="container-fluid ps-2 pe-0">

                    <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 " href="https://blackhawksecurity.ci">

                        BLACK HAWK SECURITY

                    </a>

                    <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">

              <span class="navbar-toggler-icon mt-2">

                <span class="navbar-toggler-bar bar1"></span>

                <span class="navbar-toggler-bar bar2"></span>

                <span class="navbar-toggler-bar bar3"></span>

              </span>

                    </button>

                    <div class="collapse navbar-collapse w-100 pt-3 pb-2 py-lg-0" id="navigation">

                        <ul class="navbar-nav navbar-nav-hover mx-auto">

                        </ul>

                        <ul class="navbar-nav d-lg-block d-none">

                            <li class="nav-item">

                                <a href="https://www.blackhawksecurity.ci" class="btn btn-sm  bg-gradient-dark  mb-0 me-1" onclick="smoothToPricing('pricing-argon')">Revenir au site</a>

                            </li>

                        </ul>

                    </div>

                </div>

            </nav>

            <!-- End Navbar -->

        </div>

    </div>

</div>

<main class="main-content main-content-bg mt-0">

    <div class="page-header min-vh-100" style="background-image: url('https://blackhawksecurity.ci/wp-content/uploads/2023/06/2689316.jpg');">

        <span class="mask bg-gradient-dark opacity-6"></span>

        <div class="container">

            <div class="row justify-content-center">

                <div class="col-lg-4 col-md-7">

                    <div class="card border-0 mb-0">

                        <div class="card-header bg-transparent position-relative text-center">

                            <a href="https://blackhawksecurity.ci"><img src='https://blackhawksecurity.ci/wp-content/uploads/2023/10/LOGOTEXTNOIR.png' width="150" class="mb-3"></a>

                        </div>

                        <div class="card-body px-lg-5 pt-0">

                            <div class="text-center text-muted mb-4">

                                <small>Connectez vous avec votre code</small>

                            </div>



                            <form role="form" method="post">

                                <div class="form-group mb-3">

                                    <?php if (isset($error)) {

                                        echo $error;

                                    } ?>

                                    <div class="input-group input-group-merge input-group-alternative">

                                        <input required class="form-control" name="code" placeholder="Votre identifiant">

                                    </div>

                                </div>

                                <div class="form-group mb-3">

                                    <div class="input-group input-group-merge input-group-alternative">

                                        <input required class="form-control" name="password" placeholder="Votre mot de passe" type="password" id="myInput">

                                        <span class="input-group-text" onclick="myFunction()">

                      <i id="hide1" class="fa fa-eye" style="display:none"></i>

                      <i id="hide2" class="fa fa-eye-slash"></i>

                    </span>

                                    </div>

                                </div>

                                <small><a href="#" class="mb-2 position-relative text-center">Mot de passe oublié ?</a></small>

                                <div class="text-center mb-0">

                                    <button type="submit" name="submit" class="btn bg-gradient-dark w-100 mt-2 mb-4">Se connecter</button>

                                </div>

                            </form>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</main>



<!-- -------- START FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->

<footer class="footer py-5">

    <div class="container">

        <div class="row">

            <div class="col-lg-8 mb-4 mx-auto text-center">

                <a href="javascript:;" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">

                    Black Hawk Security

                </a>

            </div>

            <div class="col-lg-8 mx-auto text-center mb-4 mt-2">

                <a href="javascript:;" target="_blank" class="text-secondary me-xl-4 me-4">

                    <span class="text-lg fab fa-twitter"></span>

                </a>

                <a href="javascript:;" target="_blank" class="text-secondary me-xl-4 me-4">

                    <span class="text-lg fab fa-instagram"></span>

                </a>

                <a href="javascript:;" target="_blank" class="text-secondary me-xl-4 me-4">

                    <span class="text-lg fab fa-github"></span>

                </a>

            </div>

        </div>

        <div class="row">

            <div class="col-8 mx-auto text-center mt-1">

                <p class="mb-0 text-secondary">

                    Copyright © <script>

                        document.write(new Date().getFullYear())

                    </script> BLACK HAWK SECURITY

                </p>

            </div>

        </div>

    </div>

</footer>



<script>

    function myFunction() {

        var x = document.getElementById("myInput");

        var y = document.getElementById("hide1");

        var z = document.getElementById("hide2");



        if (x.type === 'password') {

            x.type = "text";

            y.style.display = "block";

            z.style.display = "none";

        } else {

            x.type = "password";

            y.style.display = "none";

            z.style.display = "block";

        }

    }

</script>



<!-- -------- END FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->

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
