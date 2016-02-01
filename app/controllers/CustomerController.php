<?php

class CustomerController extends BaseController{


	public function individual()
	{
		return View::make('customerIndividual');
	}

	public function company()
	{
		return View::make('customerCompany');
	}

}