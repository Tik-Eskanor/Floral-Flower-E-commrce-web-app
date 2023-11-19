<?php
    include('../autoloader.php');
    //get  the  reference code from the  url
    if(!empty($_GET['reference']))
    {
        //clence the reference code
        $sanitize= filter_var_array($_GET, FILTER_SANITIZE_STRING);
        $reference =  rawurlencode( $sanitize['reference']);
    }
    else
    {
        $_SESSION['verify_err']="No reference supplied";
        header('location:error.php');
        die();
    }

    //initiate  curl
    $curl= curl_init();

    //turn off ssl checking
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER,false);

    //set the configurations
    curl_setopt_array($curl, array(
        CURLOPT_URL=>  "https://api.paystack.co/transaction/verify/".$reference,
        CURLOPT_RETURNTRANSFER=>true,

       //set the heaers  
       CURLOPT_HTTPHEADER=>[
           "accept: application/json",
           "authorization: Bearer sk_test_4ad1449a18819506c051149febcde5d994ee528e",
           "cache-Control: no-cache"
       ]
    )  
    );

//execute curl
$response=curl_exec($curl);

$err=curl_error($curl);
if($err)
{
    $_SESSION['verify_err'] = $err;
    header('location:error.php');
    die();
}

//echo $response;

  $tranx = json_decode($response);

  if(!$tranx->status)
  {
      $_SESSION['verify_err'] = $tranx->message;
      header('location:error.php');
      die();
  }

  if($tranx->data->status =='success')
  {
      $_SESSION['amount']=$tranx->data->amount/100;
      $_SESSION['ref']=$tranx->data->reference;
      $_SESSION['emailused']=$tranx->data->customer->email;
      $_SESSION['tra_success']=$tranx->data->status;

      $Db = new Database();
      $cart = new Cart($Db);
      
      if($cart->delete_all())
      {
        header('location:success.php'); 
      }
  }
  else
  {
    header('location:error.php');
    die();
  }
?>
