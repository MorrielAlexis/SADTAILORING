<?php

class GarmentsController extends BaseController{
	
	
	public function category()
	{
		return View::make('garments');
	}

	public function details()
	{
		return View::make('garmentsDetails');
	}

	public function designPattern()
	{
		return View::make('designPattern');
	}


}