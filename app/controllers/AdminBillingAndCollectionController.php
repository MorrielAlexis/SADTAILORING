<?php

class AdminBillingAndCollectionController extends BaseController{

	
	public function collection(){

		return View::make('adminBillingCollection');
	}

	public function payment(){

		return View::make('adminBillingPayment');
	}

	public function generateBill(){
		$pdf = PDF::loadView('billingPDF');
        return $pdf->stream();
		return View::make('bill');
	}
}