<?php

use Classes\Clients;
use Classes\DetailFactures;
use Classes\Factures;
use Classes\Site;

include 'auth.php';

if(isset($_POST["keyupclient"])){

    $id = json_decode($_POST["keyupclient"]);

    $clients = Clients::userByKeyUp($id);

   $output = '';

    $output = '<ul class="list-unstyled">';



    if(count($clients) > 0){

        foreach ($clients as $client) {

            $output .= '<li>'.$client->getId() .' '.$client->getNom().' '.$client->getPrenom() .'</li>';
        }

    }else{

        $output .= '<li>Client Not Found</li>';

    }



    $output .= '</ul>';

    echo $output;


}


if(isset($_POST["createFacture"])){
    //{client, dateFacture, numeroFacture,}
    $datas = json_decode($_POST['createFacture']);

    $user_field = explode(" ", $datas->client);
    $user_id = $user_field[0];

    $fields = [
        'id' => null,
        'idClient' => $user_id,
        'numeroFacture' => $datas->numeroFacture,
        'dateFacture' => $datas->dateFacture
    ];

    $conn = new Factures();
    $bind = $conn->createFacture($fields);
    if ($bind){

        $facture_id = $conn->LastInsertId();

        $client_site = Site::siteByIdClient($user_id);



        $datas_array = [];

        $datas_array['facture_id'] = $facture_id;
        $datas_array['user_id'] = $user_id;


        if (count($client_site) > 0 ){

            $datas_array['total_site'] = count($client_site);

            $i = 0;

            while ( $i < count($client_site) ){

                $datas_array['idSite'][$i] = $client_site[$i]->getIdSite();
                $datas_array['code'][$i] = $client_site[$i]->getCode();
                $datas_array['nom'][$i] = $client_site[$i]->nom;
                $datas_array['prenom'][$i] = $client_site[$i]->prenom;

                $i++;
            }

        }else{

            $datas_array['total_site'] = 0;
        }


        echo json_encode($datas_array);
    }
    

    
}


if(isset($_POST["ligneFacture"])){
//{"service":"4","date_mep":"2023-12-06","prix":"50000","remise":"5","quantity":"2","site":"4","site_saisi":"","idFacture":"139","total":"95000"}

    $output = '';

    $datas = json_decode($_POST["ligneFacture"]);
    $site = 0;
    $remise = 0;

    if ( ! empty($datas->site_saisi) ){

        //get the client id to do new insertion in site
        $idclient = $datas->user_id;
        $code = $datas->site_saisi;

        $fields = [
            "idSite" => null,
            "code" => $code,
            "adresse" => null,
            "zone" => null,
            "telephone" => null,
            "gerant" => null,
            "idClient" => $idclient
        ];

        $ins = new Site();

        $bind = $ins->create($fields);

        if ($bind){

            $site = $ins->LastInsertId();
        }


    }else{

        $site = $datas->site;

    }

    if (!empty($datas->remise)){

        $remise = $datas->remise;
    }

    $fields = [
        "id" => null,
        "idFacture" => $datas->idFacture,
        "prixUnitaire" => $datas->prix,
        "prix" => $datas->total,
        "quantite" => $datas->quantity,
        "remise" => $remise,
        "idService" => $datas->service,
        "idSite" => $site,
        "dateDeMiseEnPlace" => $datas->date_mep
    ];

    $detailFacture = new DetailFactures();
    $insertLigneFacture = $detailFacture->insertLigneFacture($fields);

    if ($insertLigneFacture){

        $lastInsert = $detailFacture->LastInsertId();

        $allLigneFacture = DetailFactures::returnAllDetailLineByIdFacture($datas->idFacture);

        $for_duplicata = DetailFactures::returnAllDetailLineByIdFactureGroupBySite($datas->idFacture);


        echo '
            <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Site</th>
              <th scope="col">Service</th>
              <th scope="col">Qte</th>
              <th scope="col">Prix unitaire</th>
              <th scope="col">Remise</th>
              <th scope="col">Date Mise en Place</th>
              <th scope="col">Total</th>
            </tr>
          </thead>
          <tbody>';
        $i = 0;
        while ($i < count($for_duplicata)):?>
            <tr>
                <td><?php echo $i+1; ?></td>
                <td><?php echo $for_duplicata[$i]->code; ?></td>
                <td><?php foreach ($allLigneFacture as $item):?>
                    <?php if ($for_duplicata[$i]->code == $item->code) :?>
                        <ul class="">
                            <li class="list-unstyled"><?php echo $item->designation; ?></li>
                        </ul>

                    <?php endif;?>

                    <?php endforeach;?>
                </td>

                <td><?php foreach ($allLigneFacture as $item):?>
                        <?php if ($for_duplicata[$i]->code == $item->code) :?>
                            <ul>
                                <li class="list-unstyled"><?php echo $item->getQuantite(); ?></li>
                            </ul>

                        <?php endif;?>

                    <?php endforeach;?>
                </td>

                <td><?php foreach ($allLigneFacture as $item):?>
                        <?php if ($for_duplicata[$i]->code == $item->code) :?>
                            <ul>
                                <li class="list-unstyled"><?php echo $item->getPrixUnitaire(); ?></li>
                            </ul>

                        <?php endif;?>

                    <?php endforeach;?>
                </td>

                <td><?php foreach ($allLigneFacture as $item):?>
                        <?php if ($for_duplicata[$i]->code == $item->code) :?>
                            <ul>
                                <li class="list-unstyled"><?php echo $item->getRemise(); ?></li>
                            </ul>

                        <?php endif;?>

                    <?php endforeach;?>
                </td>

                <td><?php foreach ($allLigneFacture as $item):?>
                        <?php if ($for_duplicata[$i]->code == $item->code) :?>
                            <ul>
                                <li class="list-unstyled"><?php echo $item->getDateDeMiseEnPlace(); ?></li>
                            </ul>

                        <?php endif;?>

                    <?php endforeach;?>
                </td>

                <td><?php foreach ($allLigneFacture as $item):?>
                        <?php if ($for_duplicata[$i]->code == $item->code) :?>
                            <ul>
                                <li class="list-unstyled"><?php echo $item->getPrix(); ?></li>
                            </ul>

                        <?php endif;?>

                    <?php endforeach;?>
                </td>
            </tr>

        <?php $i++; endwhile;





        echo '</tbody></table>';


    }


}

/*
 *         for ( $i=0; $i < count($allLigneFacture); $i++ ) : ?>


            <tr>
                <th scope="row"><?php echo $i+1 ;?></th>


                <td><?php echo $allLigneFacture[$i]->code; ?></td>

                <td><?php echo $allLigneFacture[$i]->designation; ?></td>
                <td><?php echo $allLigneFacture[$i]->getQuantite() ;?></td>
                <td><?php echo $allLigneFacture[$i]->getPrixUnitaire(); ?></td>
                <td><?php if ($allLigneFacture[$i]->getRemise()){
                        echo $allLigneFacture[$i]->getRemise() .'%';
                    }; ?></td>
                <td><?php echo $allLigneFacture[$i]->getDateDeMiseEnPlace(); ?></td>
                <td><?php echo $allLigneFacture[$i]->getPrix(); ?></td>
            </tr>

        <?php endfor;

 */




