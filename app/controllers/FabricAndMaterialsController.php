<?php

class FabricAndMaterialsController extends BaseController{
	

	public function fabricType()
	{

		$ids = DB::table('tblFabricType')
			->select('strFabricTypeID')
			->orderBy('created_at', 'desc')
			->orderBy('strFabricTypeID', 'desc')
			->take(1)
			->get();

		$ID = $ids["0"]->strFabricTypeID;
		$newID = $this->smartCounter($ID);	

		$fabricType = FabricType::all();

		return View::make('fabricAndMaterialsFabricType')->with('fabricType', $fabricType)->with('newID', $newID);
	}

	public function swatch()
	{

		$ids = DB::table('tblSwatches')
			->select('strSwatchID')
			->orderBy('created_at', 'desc')
			->orderBy('strSwatchID', 'desc')
			->take(1)
			->get();

		$ID = $ids["0"]->strSwatchID;
		$newID = $this->smartCounter($ID);	

		$fabricType =  FabricType::lists('strFabricTypeName', 'strFabricTypeID'); 		
		
		$swatch = DB::table('tblSwatches')
            ->join('tblFabricType', 'tblSwatches.strSwatchFabricTypeName', '=', 'tblFabricType.strFabricTypeID')
            ->select('tblSwatches.*', 'tblFabricType.strFabricTypeName')
            ->get();

		return View::make('fabricAndMaterialsSwatches')
					->with('swatch', $swatch)
					->with('swatch2', $swatch)
					->with('fabricType', $fabricType)
					->with('newID', $newID);

		
	}

	public function materials()
	{
		return View::make('fabricAndMaterialsMaterials');
	}

	public function addSwatch()
	{	

		$swatch = Swatch::create(array(
			'strSwatchID' => Input::get('addSwatchID'),
			'strSwatchFabricTypeName' => Input::get('addFabric'),		
			'strSwatchName' => Input::get('addSwatchName'),
			'strSwatchCode' => Input::get('addSwatchCode'),
			'strSwatchImageLink' =>'',
			'boolIsActive' => 1
			));

		$swatch->save();
		return Redirect::to('/fabricAndMaterialsSwatches');
	}

	public function addFabricType()
	{	

		$fabricType = FabricType::create(array(
			'strFabricTypeID' => Input::get('addFabricTypeID'),
			'strFabricTypeName' => Input::get('addFabricTypeName'),
			'strFabricTypeDesc' => Input::get('addFabricTypeDesc'),
			'boolIsActive' => 1
			));

		$fabricType->save();
		return Redirect::to('/fabricAndMaterialsFabricType');

	}


	public function editFabricType()
	{
		$id = Input::get('editFabricTypeID');
		$fabricType = FabricType::find($id);
		$fabricType->strFabricTypeName = Input::get('editFabricTypeName');	
		$fabricType->strFabricTypeDesc = Input::get('editFabricTypeDesc');

		$fabricType->save();
		return Redirect::to('/fabricAndMaterialsFabricType');
	}

	public function editSwatch()
	{	
		$id = Input::get('editSwatchID');
		$swatch = Swatch::find($id);

		$swatch->strSwatchID = Input::get('editSwatchID');
		$swatch->strSwatchFabricTypeName = Input::get('editFabric');		
		$swatch->strSwatchName = Input::get('editSwatchName');
		$swatch->strSwatchCode = Input::get('editSwatchCode');
		$swatch->strSwatchImageLink ='';

		$swatch->save();
		return Redirect::to('/fabricAndMaterialsSwatches');
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