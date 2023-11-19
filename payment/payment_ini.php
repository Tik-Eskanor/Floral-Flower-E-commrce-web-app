<?php
    include('../autoloader.php');

    if(isset($_POST['submit']))
    {
        $_SESSION['firstname'] = $_POST['fname'];
        $_SESSION['lastname'] = $_POST['lname'];
        $email = $_POST['email'];
        $_SESSION['phone'] = $_POST['phone'];
        $price= $_POST['price'];
    
        // initialize payment...............................
        $url="https://api.paystack.co/transaction/initialize";
    
        //Gather body  parameters
        $transaction_data=
        [
            "email"=>  $email,
            "amount"=> (int)$price  *  100,
            "callback_url" =>  "http://localhost/php/PROJECT/flora/payment/payment_verify.php"
        ];

        //Generate  url encoded string
        $encode_transaction_data = http_build_query($transaction_data);

         //open connection to curl
         $ch = curl_init();

        //turnoff mandatory ssl checking
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        //set url
        curl_setopt($ch, CURLOPT_URL, $url);

         //make curl return the data instead of echoing it
         curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        //enable data to be sent in POST arrays
        curl_setopt($ch, CURLOPT_POST, true);

         //collect  the posted  data from  above
         curl_setopt($ch, CURLOPT_POSTFIELDS,$encode_transaction_data);

         //Set the headers from the end point
         curl_setopt($ch, CURLOPT_HTTPHEADER, [
            "Authorization: Bearer sk_test_4ad1449a18819506c051149febcde5d994ee528e",
            "cache-Control: no-cache"
         ]);


         //execute  curl
         $result= curl_exec($ch);

         //check  errors
         $errors= curl_error($ch);
         if($errors)
         {
             die("curl error:".$errors);
         }


        $transaction=json_decode($result);

        //automatically redirect  to  payment page
        
        $authorization_url=$transaction->data->authorization_url;
        // var_dump($authorization_url);
       header('location:'.$authorization_url);
    }
?>