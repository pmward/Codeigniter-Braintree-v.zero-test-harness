<?php


class Transaction extends CI_Controller {

	public function index()
	{
		//$this->load->view('welcome_message');
	}

    public function getClientToken()
    {
        $this->load->library('session');

        //$this->config->load('braintree_config');
        Braintree_Configuration::environment('sandbox');
        Braintree_Configuration::merchantId('w2d7snyv86b6m993');
        Braintree_Configuration::publicKey('rm724h4nmjw6pg2n');
        Braintree_Configuration::privateKey('87b54560036ce7f21ee95c866357341c');

        $clientToken = Braintree_ClientToken::generate();

        $this->session->set_userdata($clientToken);
        if(isset($clientToken)) {

            //$this->session->set_userdata($clientToken);

        } else {

        }

        echo $_SESSION;



    }
}



?>
