<?php

class AdminBillingController extends BaseController{

	public function billing(){

		return View::make('adminBillingAndCollection');
	}
}