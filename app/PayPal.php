<?php

namespace App;
use App\ShoppingCart;
use App\PayPal;

class PayPal{
	private $_apiContext;
	private $shopping_cart;
	private $_ClientId = "ASu7ZMdFul43ZhBN_9TqSbiKG8NxJX3vP7ykWEcWdUdRgJzEmSwNNwF8qPtQE4gEQM3m_FNInAbA2AYt";
	private $_ClientSecret = "EKsGG25u-U5RKe9Pz3fBLmMv7vc_t7T-DFv-ZN3uJF0vTiF_vaU6cIf5SSTtKSWJtoY51YdAA-BflAcg";

	public function __construct($shopping_cart){

		$this->_apiContext = \PaypalPayment::ApiContext($this->_ClientId, $this->_ClientSecret);

		$config = config("paypal_payment");
		$flatConfig = array_dot($config);

		$this->_apiContext->setConfig($flatConfig);


		$this->shopping_cart = $shopping_cart;
	}
	public function generate(){
		$payment = \PaypalPayment::payment()->setIntent("sale")->setPayer($this->payer())->setTransactions([$this->transaction()])->setRedirectUrls($this->redirect_urls());

		try{
			$payment->create($this->_apiContext);
		}catch(\Exception $ex){
			//dd($ex);
			dd( $this->amount());
			exit(1);
		}
		return $payment;
	}

	public function redirect_urls(){
		$baseUrl = url('/');

		return \PaypalPayment::redirectUrls()->setReturnUrl("$baseUrl/payments/store")->setCancelUrl("$baseUrl/carrito");

	}

	public function transaction(){
		//retorna informacion de transaccion
		return \PaypalPayment::transaction()->setAmount($this->amount())->setItemList($this->items())->setDescription("tu Compra en  ccss")->setInvoiceNumber(uniqid());
	}

	public function items(){
		$items = [];
		 $products = $this->shopping_cart->products()->get();

		 foreach ($products as $product) {
		 	array_push($items,$product->paypalItem());
		 }
		 return \PaypalPayment::itemList()->setItems($items);
	}

	public function amount(){
		return \PaypalPayment::amount()->setCurrency("USD")->setTotal($this->shopping_cart->total());
	}

	public function payer(){
		// return payment's info

		return \PaypalPayment::payer()->setPaymentMethod("paypal");
	}

	public function execute($paymentId, $PayerID){
		$payment = \PaypalPayment::getById($paymentId, $this->_apiContext);

		$execution = \PaypalPayment::PaymentExecution()->setPayerID($PayerID);
		return $payment->execute($execution,$this->_apiContext);

	}



}