<?php

class AdminBillingAndCollectionController extends BaseController{

	public function payment(){

		return View::make('adminBillingPayment');
	}

	public function collection(){

		return View::make('adminBillingCollection');
	}
}