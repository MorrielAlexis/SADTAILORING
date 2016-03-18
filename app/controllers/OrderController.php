<?php

class OrderController extends BaseController{

	public function order(){

		$ids = DB::table('tblJobOrder')
			->select('strJobOrderID')
			->orderBy('created_at', 'desc')
			->orderBy('strJobOrderID', 'desc')
			->take(1)
			->get();

		if($ids == null){
			$newID = "JOB001";
		}else{
			$ID = $ids["0"]->strJobOrderID;
			$newID = $this->smartCounter($ID);				
		}

		$category = Category::all();
		$segment = Segment::all();
		$fabric = FabricType::all();
		$swatch = Swatch::all();
		$price = DB::table('tblgarment_price')
				->select('*')
				->get();


		return View::make('order')
					->with('newID', $newID)
					->with('category', $category)
					->with('segment', $segment)
					->with('fabric', $fabric)
					->with('swatch', $swatch)
					->with('price', $price);
	}

	public function addJobOrder()
	{	
		$ownFabric = Input::has('ownFabric');

		$jobOrder = TransJobOrder::create(array(
			'strJobOrderID' => Input::get('jobOrderID'),
			'strJobDescID' => 'JOBDESC01',
			'strCustomerID' => 	Input::get('customerID'),
			'strTermsPaymentID' => 'TRMPAY01',
			'strCustomerType' => 'Individual',
			'intOrderQuantity' => Input::get('jobOrderQuantity'),
			'dtOrderDate' => null,
			'dtRequiredDate' => null,
			'dtDeliveryDate' => null,
			'boolIsFinished' => 0,
			'boolIsActive' => 1
		));

		$jobOrder->save();

		$jobOrderGarments = TransJobOrderGarment::create(array(
			'strJobOrderID' => Input::get('jobOrderID'),
			'strCategoryID' => Input::get('addCategory'),
			'strSegmentID' => Input::get('addSegment'),
			'boolIsActive' => 1
		));

		$jobOrderGarments->save();


		if(!$ownFabric == TRUE){
			$jobOrderFabric = TransJobOrderFabric::create(array(
				'strOrderID' => Input::get('jobOrderID'),
				'strFabricSwatch' => Input::get('addSwatch'),
				'boolIsActive' => 1
			));

			$jobOrderFabric->save();
		}
 		
		$JO = Input::get('jobOrderID');
		$customerID = Input::get('customerID');

		return Redirect::route('orderMeasurement', array('orderID' => $JO, 'custID' => $customerID));
	}

	public function smartCounter($id)
	{	

		$lastID = str_split($id);

		$ctr = 0;
		$tempID = "";
		$tempNew = [];
		$newID = "";
		$add = TRUE;

		for($ctr = count($lastID)-1; $ctr >= 0; $ctr--){

			$tempID = $lastID[$ctr];

			if($add){
				if(is_numeric($tempID) || $tempID == '0'){
					if($tempID == '9'){
						$tempID = '0';
						$tempNew[$ctr] = $tempID;

					}else{
						$tempID = $tempID + 1;
						$tempNew[$ctr] = $tempID;
						$add = FALSE;
					}
				}else{
					$tempNew[$ctr] = $tempID;
				}			
			}
			$tempNew[$ctr] = $tempID;	
		}

		
		for($ctr = 0; $ctr < count($lastID); $ctr++){
			$newID = $newID . $tempNew[$ctr];
		}

		return $newID;
	}
}