<?php

class BraintreeTransaction extends CI_Controller {

    public function sale() {

        /* get a client token by calling client token model call
        | or retrieve the client token from Session
        | although perhaps payment method nonce should always be available by this point,
        |
        |-
        */

        //Store POST variables in an Array for the Braintree sale call. use CI input method

        //$this->load->model('Braintree');

        $nonce = 'fake-valid-nonce';
        $data = array(

            'amount' => '10.00',
	  	    'orderId' => time(),
            'paymentMethodNonce' => $nonce
        );


//        $nonce = "";
//        //echo var_dump($_POST);
//        $nonce = $_POST["payment_method_nonce"];

        $result = $this->braintree_model->createTransaction($data);

        if($result->success) {

            echo "Transaction.sale success!" . "<br />";
            echo "<pre>";
            var_dump($result->transaction);
            echo "</pre>";

        } else {

            print_r("transaction.sale call failed, validation errors: \n");
            print_r($result->errors->deepAll());


        }
    }



}

?>
