<?php

  $json = '

  [
    {
      "rebate_discount": 0,
      "rebate_token": "string",
      "user_id": 0,
      "updated_at": "string",
      "tracking_code_list": [
        "string"
      ],
      "tracking_code": "string",
      "total": 0,
      "token": "string",
      "taxes": 0,
      "subtotal": 0,
      "status": "received",
      "payment_due_date": "2019-08-24",
      "slip_url": "string",
      "slip_token": "string",
      "slip_due_date": "2019-08-24",
      "slip": true,
      "shipping_tracked_at": "2019-08-24T14:15:22Z",
      "shipping_price": 0,
      "shipping_label": "string",
      "shipped_at": "2019-08-24T14:15:22Z",
      "received_at": "2019-08-24T14:15:22Z",
      "payment_tid": "string",
      "payment_method": "string",
      "payment_gateway": "string",
      "payment_authorization": "string",
      "paid_at": "2019-08-24T14:15:22Z",
      "items": [
        {
          "extra": {},
          "height": 0,
          "id": 0,
          "length": 0,
          "original_price": 0,
          "package": "string",
          "picture_url": "string",
          "place_city": "string",
          "place_id": 0,
          "place_name": "string",
          "price": 0,
          "product_id": 0,
          "product_name": "string",
          "quantity": 0,
          "reference": "string",
          "sku": "string",
          "total": 0,
          "variant_id": 0,
          "variant_name": "string",
          "weight": 0,
          "width": 0
        }
      ],
      "installments": 1,
      "id": 0,
      "extra": {},
      "expected_delivery_date": "2019-08-24",
      "email": "string",
      "discount_price": 0,
      "deposit": true,
      "delivery_type": "string",
      "delivery_message": "string",
      "delivery_days": 0,
      "delivered_at": "2019-08-24T14:15:22Z",
      "coupon_code": "string",
      "confirmed_at": "2019-08-24T14:15:22Z",
      "code": "string",
      "client_id": 0,
      "channel": "ecommerce",
      "cart_id": 0,
      "card_validity": "string",
      "card_number": "string",
      "card": true,
      "canceled_at": "2019-08-24T14:15:22Z",
      "browser_ip": "192.168.0.1",
      "agent": "string",
      "affiliate_tag": "string",
      "pix_qr_code": "string",
      "payment_authorization_code": "string",
      "bonus_granted": true,
      "has_split": true,
      "pix": true,
      "ame_qr_code": "string",
      "ame": true,
      "antifraud_assurance": "string"
    }
  ]
      

  ';


  //echo $json;

  $object = json_decode($json);

  
  

  echo "<pre>";

  print_r($object);

  echo "</pre>";

  echo '<br><br>-----------------------------------------------<br><br>';

  echo gettype($object[0]);

  echo '<br><br>-----------------------------------------------<br><br>';

  

  function int($key) {

    if(!is_integer($key))
    {
      echo "`$key`";
      echo " int(200),";
      echo "<br>";
    }

  }

  function string($key, $value) {

    if(!is_integer($key)){

      if (str_contains($value, '-') == true) {

        echo "`$key`";
        echo " datetime,";
        echo "<br>";

      }else {

        echo "`$key`";
        echo " varchar(200),";
        echo "<br>";

      }
    }
    

  }

  function bool($key) {
    echo "`$key`";
    echo " tinyint(1),";
    echo "<br>";
  }


  function obj($obj) {

    $arrayVarName = get_class_vars(get_class($obj));

    return $arrayVarName;

  }

  function checkArray(array $array, string $function, bool $active = false) {

    if($active == true) {

      foreach($array as $key => $value) {      

        call_user_func_array($function, array($key, $value));
              
      }

    }

    
  }

    function check($key, $value) {
          

      if(is_integer($value)) {

        int($key);

      }else if(is_bool($value)) {

        bool($key);

      }else if( is_string($value) ) {

        string($key, $value);

      }else if(is_array($value)){
        /*
         Aqui terá a foreign key para os valores desse array,
         ou seja, os valores desse array estão em outra tabela 
         do mesmo banco de dados

        */

        echo "`$key` int(200), <br>"; 

        //checkArray($value,  "check", false);

        

      }else if(is_object($value) ){


        foreach($value as $k => $v) {          

          check($k, $v);
          

        }
        
      }

      

    }


  function arrayToMySql(array $array) {

    foreach($array[0] as  $key => $value) {
      
      
      
      check($key, $value);

      
  
    }

  };

  /*
  $c = arrayToMySql($object[0]->category_tags);

  echo $c;

  */
  
  echo '<br><br>-----------------------------------------------<br><br>';

  echo "Padronizando o json para criação das colunas da tabela MySQL";
  
  echo '<br><br>-----------------------------------------------<br><br>';

  
  $result = arrayToMySql($object);


  echo $result;

  

  $o = $object[0]->installments;

  

  
  




?>