$(document).ready(function(){

    console.log("hello angetraore-dev");


/*
    let client = document.querySelector("#client");
    client.addEventListener('keyup', function(){
        console.log((this).value);
        alert("clicked");
    });
 */
    $("#client").keyup(function (){
        let client = $(this).val();

        if (client != " "){

            $('#clientList').fadeIn();
            $.ajax({
                url:'../../../custom-angetraore-dev.php',
                method: 'POST',
                data:{keyupclient:client},
                success: function (response) {

                    $('#clientList').html(response);
                }
            });
        }
    });

    $(document).on('click', 'li', function(){

        $('#client').val($(this).text());

        $('#clientList').fadeOut();
        //$("#detail_facture_div").fadeOut();

    });


    $("#next_facture_step").on('click', function (){

        let formData = new FormData(document.querySelector("#creer_une_facture"));
        var object = {};
        formData.forEach((value, key) => object[key] = value);
        var json = JSON.stringify(object);

        $.ajax({
            url: "../../../custom-angetraore-dev.php",
            method: "POST",
            //dataType:'JSON',
            data:{createFacture:json},
            success: function (response) {
                console.log(response);

                let i ;
                let table = JSON.parse(response);
                console.log(table);

                $("#creer_une_facture_div").fadeOut();

                //$("#detail_facture_div").fadeIn();

                $("#detail_facture_div").removeClass('invisible');

                if ( table.total_site > 0 ) {

                    $("#site_select").removeClass('invisible');

                    for ( i=0; i < table.total_site; i++ ){

                        $("#site").append($('<option>',{
                            value: table.idSite[i],
                            text: table.code[i]

                        }));

                        //console.log(table.idSite[i] , table.code[i], table.idMiseEnPlace[i], table.designation[i] );
                    }

                }else {

                    $("#the_site_saisi").removeClass('invisible');

                }


                //affichage du numero de la facture
                $("#idFacture").val(table.facture_id);
                $("#user_id").val(table.user_id);


            }
        });

    });

    $("#prix").keyup(function (){
        let prix = $(this).val();

        if ( prix > 0 ) {

            $('#quantity').val(1);

            let total;

            let remise = $("#remise").val();

            if (remise > 0 ) {

                let remisebis = ($('#prix').val() * $('#quantity').val() * remise) /100;

                $("#sub").html(+-+ remisebis);

                total = $('#prix').val() * $('#quantity').val() - remisebis;

            }else {

                total  = $('#prix').val() * $('#quantity').val();
            }

            $('#total').val(total);
        }

    })

    $("#remise").keyup(function (){

        let remise = $(this).val();

        if (remise > 0){
            let remisebis = ($('#prix').val() * $('#quantity').val() * remise) /100;

            $("#sub").html(+-+ remisebis);

            let total =  $('#prix').val() * $('#quantity').val() - remisebis;

            $("#total").val(total);
        }
    });

    $("#remise").blur(function (){

        let total;
        let prix = $('#prix').val();
        let remise = $("#remise").val();
        let qte = $('#quantity').val() ;

        let remisebis = ( prix * qte * remise ) /100;

        total = ( prix * qte ) - remisebis;

        if (remise){
            $("#sub").html(+-+ remisebis);
        }

        $('#total').val( total );

    });


    $('.quantity-right-plus').click(function(e){

        e.preventDefault();

        let quantity = parseInt($('#quantity').val());
        let newOne = quantity + 1;

        // If is not undefined
        $('#quantity').val( newOne );


        let total;
        let prix = $('#prix').val();
        let remise = $("#remise").val();
        let qte = $('#quantity').val() ;

        let remisebis = ( prix * qte * remise ) /100;

        if (remise){
            $("#sub").html(+-+ remisebis);
        }

        total = ( prix * qte ) - remisebis;

        $('#total').val( total );

    });

    $('.quantity-left-minus').click(function(e){

        e.preventDefault();

        var quantity = parseInt($('#quantity').val());

        if(quantity>1){

            var newOne = quantity - 1 ;

            $('#quantity').val(newOne);

            let total;
            let prix = $('#prix').val();
            let remise = $("#remise").val();
            let qte = $('#quantity').val() ;

            let remisebis = ( prix * qte * remise ) /100;

            if (remise){
                $("#sub").html(+-+ remisebis);
            }
            total = ( prix * qte ) - remisebis;

            $('#total').val( total );

        }

    });

    //bouton retour cacher detail_facture_div et afficher creeer_facture_div
    $("#prev").click(function (){
        $("#detail_facture_div").addClass('invisible');

        window.location.href="http://localhost/appBHS-main/pages/dashboards/board.php";

        //$("#creer_une_facture_div").fadeIn();
    });

    //bouton ajouter ligne facture pour un site
    $("#ajouter_ligne_facture").click(function (e){
        e.preventDefault();
        let form = document.querySelector("#detail_facture_form");
        let obj = {};
        let formData = new FormData(form);
        formData.forEach((value, key) => obj[key] = value);
        let objJSON = JSON.stringify(obj);

        console.log(objJSON);

        $.ajax({
            url:"../../../custom-angetraore-dev.php",
            method:"POST",
            //dataType:'JSON',
            data:{ligneFacture:objJSON},
            success:function(response) {

                $("#line_facture").html(response);

            }

        });


    });

    $("#valider_facture_detail").submit(function (){


        window.location.href="http://localhost/appBHS-main/pages/dashboards/board.php";

    });







});