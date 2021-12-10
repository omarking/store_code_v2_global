<?php
session_start();  
if(isset($_SESSION["Email"])) {             

?>


<?php
    $token ="TEST-1412316930483794-100821-54d5c451775de5e2c0bcd435489144df-260957436";
    $url2 = 'https://api.mercadopago.com/v1/payments';
    $methodo = 'POST';
    $headers2 = array(
        "Authorization: Bearer $token",
        "Content-Type: application/json",
    );
        $body2 ='{
            "installments":1,
            "transaction_amount":58.80,
            "description":"Producto Point para cobros con tarjetas mediante bluetooth",
            "payment_method_id":"visa",
            "payer":{
            "email":"test_user_123456@testuser.com"
        
            },
            "notification_url":"https://www.suaurl.com/notificacoes/",
            "sponsor_id":null,
            "binary_mode":false,
            "external_reference":"MP0001",
            "satement_descriptor":"MercadoPago",
            "additional_info":{
            "items":[
                {
                    "id": "PR0001",
                    "title": "Point Mini",
                    "picture_url": "https://http2.mlstatic.com/resources/frontend/statics/growth-sellers-landings/device-mlb-point-i_medium@2x.png",
                    "category_id": "electronics",
                    "quantity": 1,
                    "unit_price": 58.8
                }
            ],
            "payer": {
                "first_name": "Test",
                "last_name": "Test",
                "address":{
                    "zip_code": "06233-200",
                    "street_name": "Av das Nacoes Unidas",
                    "street_number": 3003
                },
                "registration_date":"2021-11-21:05:48:00-03:00",
                "phone": {
                    "area_code": 11,
                    "number": "987654321"
                }
                },
                "shipments": {
                    "receiver_address": {
                        "street_name": "Av das Nacoes Unidas",
                        "street_number": 3003,
                        "zip_code": "06233200"
                    }
                }
            }
        }';
        
    $curls = curl_init();
        
    curl_setopt_array($curls, array(
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_URL => $url2,
        CURLOPT_CUSTOMREQUEST => $methodo,
        CURLOPT_HTTPHEADER => $headers2,
            CURLOPT_POSTFIELDS => $body2
        ));
        
        $responses = curl_exec($curls);
        $erro = curl_error($curls);


        curl_close($curls);
    
        //echo ($id_transaccion);
        //echo(var_dump($etiqueta));
        if ($erro) {
        echo "cURL Error #:" . $erro;
        } else {
        echo $responses;
        }

    }else{
        echo "Sesion Incorrecta";
    }


?>