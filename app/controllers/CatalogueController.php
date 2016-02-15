<?php

class CatalogueController extends BaseController{
	
	
	public function catalogue()
	{	
		$ids = DB::table('tblCatalogue')
			->select('strCatalogueID')
			->orderBy('created_at', 'desc')
			->orderBy('strCatalogueID', 'desc')
			->take(1)
			->get();

		$ID = $ids["0"]->strCatalogueID;
		$newID = $this->smartCounter($ID);	

		$category = Category::lists('strGarmentCategoryName', 'strGarmentCategoryID');

		$catalogue = DB::table('tblCatalogue')
				->join('tblGarmentCategory', 'tblCatalogue.strCatalogueCategory', '=', 'tblGarmentCategory.strGarmentCategoryID')
				->select('tblCatalogue.*', 'tblGarmentCategory.strGarmentCategoryName')
				->orderBy('created_at')
				->get();

		return View::make('catalogue')
					->with('catalogue', $catalogue)
					->with('newID', $newID)
					->with('category', $category);
	}

	public function addCatalogue()
	{
		$catalogue = Catalogue::create(array(
			'strCatalogueID' => Input::get('addCatalogueID'),
			'strCatalogueCategory' => Input::get('addCategory'),
			'strCatalogueName' => Input::get('addCatalogueName'),
			'txtCatalogueDesc' => Input::get('addCatalogueDesc'),
			'strCatalogueImage' => '',
			'boolIsActive' => 1
			));

		$catalogue->save();
		return Redirect::to('/catalogue');
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