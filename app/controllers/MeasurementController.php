<?php

class MeasurementController extends BaseController{
	
	
	public function category()
	{
		return View::make('measurementCategory');
	}

	public function details()
	{
		return View::make('measurementDetails');
	}


}