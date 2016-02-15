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

	public function swatches()
	{
		return View::make('fabricAndMaterialsSwatches');
	}

	public function materials()
	{
		return View::make('fabricAndMaterialsMaterials');
	}

	public function addFabricType()
	{	

		$fabricType = FabricType::create(array(
			'strFabricTypeID' => Input::get('addFabricTypeID'),
			'strFabricTypeName' => Input::get('addFabricTypeName'),
			'textFabricTypeDesc' => Input::get('addFabricTypeDesc'),
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
		$fabricType->textFabricTypeDesc = Input::get('editFabricTypeDesc');

		$fabricType->save();
		return Redirect::to('/fabricAndMaterialsFabricType');
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