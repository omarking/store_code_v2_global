<?php

    include("Autorizacion.php");
    $url2 = 'https://apis-sandbox.fedex.com/ship/v1/shipments';
    //$url2 = 'https://apis.fedex.com/ship/v1/shipments'; url producción
    $methodo = 'POST';
    $headers2 = array(
        "Authorization:Bearer $token",
        "X-locale: en_MX",
        "content-type: application/json",
    );
        $body2 = '{
        "labelResponseOptions": "URL_ONLY",
    "requestedShipment": {
        "shipper": {
        "contact": {
            "personName": "SHIPPER NAME",
            "phoneNumber": 1234567890,
            "companyName": "Shipper Company Name"
        },
        "address": {
            "streetLines": [
            "SHIPPER STREET LINE 1",
            "SHIPPER STREET LINE 2"
            ],
            "city": "MEXICO CITY",
            "stateOrProvinceCode": "DF",
            "postalCode": 15520,
            "countryCode": "MX"
        }
        },
        "recipients": [
        {
            "contact": {
            "personName": "RECIPIENT NAME",
            "phoneNumber": 1234567890,
            "companyName": "Recipient Company Name"
            },
            "address": {
            "streetLines": [
                "RECIPIENT STREET LINE 1",
                "RECIPIENT STREET LINE 2"
            ],
            "city": "MEXICO CITY",
            "stateOrProvinceCode": "DF",
            "postalCode": "04230",
            "countryCode": "MX"
            }
        }
        ],
        "shipDatestamp": "2020-07-03",
        "serviceType": "FEDEX_EXPRESS_SAVER",
        "packagingType": "YOUR_PACKAGING",
        "pickupType": "USE_SCHEDULED_PICKUP",
        "blockInsightVisibility": false,
        "shippingChargesPayment": {
        "paymentType": "SENDER"
        },
        "labelSpecification": {
        "imageType": "PDF",
        "labelStockType": "PAPER_85X11_TOP_HALF_LABEL"
        },
        "requestedPackageLineItems": [
        {
            "groupPackageCount": 1,
            "itemDescriptionForClearance": "description",
            "declaredValue": {
            "amount": 100,
            "currency": "NMP"
            },
            "weight": {
            "units": "KG",
            "value": 10
            }
        }
        ]
    },
    "accountNumber": {
        "value": "740561073"
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
        //$jsonData = file_get_contents($responses);


        // $jsons=json_decode ($jsonData, true);
        
        // var_dump(json_decode($jsonData));

        // $ost=$jsons{"transactionId"};
        //	print($ost);
        $jsons = $responses;
        $objeto  = json_decode($jsons);
        //$tiket = $objeto->{'transactionId'};
        $etiqueta = $objeto->{'output'}->{'transactionShipments'}[0]->{'pieceResponses'}[0]->{'packageDocuments'}[0]->{'url'};
    
        //echo ($tiket);
        echo(var_dump($etiqueta));

    

        if ($erro) {
        echo "cURL Error #:" . $erro;
        } else {
        //echo $responses;
        }
?>
