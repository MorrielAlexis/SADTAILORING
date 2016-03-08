<?php

class adminBillingController extends BaseController{

	public function billing(){

		return View::make('adminBillingAndCollection');
	}
}