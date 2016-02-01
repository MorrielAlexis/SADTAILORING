<?php

class FabricAndMaterialsController extends BaseController{
	

	public function fabricType()
	{
		return View::make('fabricAndMaterialsFabricType');
	}

	public function swatches()
	{
		return View::make('fabricAndMaterialsSwatches');
	}


}