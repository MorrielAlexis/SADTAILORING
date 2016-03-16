<?php

class AdminBillingAndCollectionController extends BaseController{

	
	public function collection(){

		return View::make('adminBillingCollection');
	}

	public function payment(){

		return View::make('adminBillingPayment');
	}
}