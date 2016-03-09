<?php

class ProductController extends BaseController{

	public function products(){

		return View::make('chooseProduct');
	}
}