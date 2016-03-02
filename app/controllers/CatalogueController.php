
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
		$reason = ReasonCatalogue::all();

		$catalogue = DB::table('tblCatalogue')
				->join('tblGarmentCategory', 'tblCatalogue.strCatalogueCategory', '=', 'tblGarmentCategory.strGarmentCategoryID')
				->leftJoin('tblReasonCatalogue', 'tblCatalogue.strCatalogueID', '=', 'tblReasonCatalogue.strInactiveCatalogueID')
				->select('tblCatalogue.*', 'tblGarmentCategory.strGarmentCategoryName', 'tblReasonCatalogue.strInactiveCatalogueID', 'tblReasonCatalogue.strInactiveReason')
				->orderBy('created_at')
				->get();

		return View::make('catalogue')
					->with('newID', $newID)
					->with('catalogue', $catalogue)
					->with('catalogue2', $catalogue)
					->with('reason', $reason)
					->with('category', $category);
	}

	public function addCatalogue()
	{	
		$file = Input::get('addImage');
		$destinationPath = 'public/imgCatalogue';

		$ctlg = Catalogue::all();
		$isAdded = FALSE;

		foreach ($ctlg as $ctlg)
			if(strcasecmp($ctlg->strCatalogueCategory, Input::get('addCategory')) == 0 && 
			   strcasecmp($ctlg->strCatalogueName, trim(Input::get('addCatalogueName'))) == 0)
			   		$isAdded = TRUE;

		if(!$isAdded){
			if($file == '' || $file == null){
				$catalogue = Catalogue::create(array(
				'strCatalogueID' => Input::get('addCatalogueID'),
				'strCatalogueCategory' => Input::get('addCategory'),
				'strCatalogueName' => Input::get('addCatalogueName'),
				'strCatalogueDesc' => Input::get('addCatalogueDesc'),
				'boolIsActive' => 1
			));
			}else{
				$extension = Input::file('addImg')->getClientOriginalExtension();
				$fileName = $file;
				Input::file('addImg')->move($destinationPath, $fileName);

				$catalogue = Catalogue::create(array(
				'strCatalogueID' => Input::get('addCatalogueID'),
				'strCatalogueCategory' => Input::get('addCategory'),
				'strCatalogueName' => Input::get('addCatalogueName'),
				'strCatalogueDesc' => Input::get('addCatalogueDesc'),
				'strCatalogueImage' => 'imgCatalogue/'.$fileName ,
				'boolIsActive' => 1
				));
			}
			
			$catalogue->save();
			return Redirect::to('/catalogue?success=true');
		} else return Redirect::to('/catalogue?success=false');
	}

	public function editCatalogue()
	{	
		$id = Input::get('editCatalogueID');
		$catalogue = Catalogue::find($id);
		
		$ctlg = Catalogue::all();
		$isAdded = FALSE;

		foreach ($ctlg as $ctlg)
			if(strcasecmp($ctlg->strCatalogueCategory, Input::get('editCategory')) == 0 && 
			   strcasecmp($ctlg->strCatalogueName, trim(Input::get('editCatalogueName'))) == 0)
			   		$isAdded = TRUE;

		if(!$isAdded){
			if (Input::get('editImage') == $catalogue->strCatalogueImage) {
				$catalogue->strCatalogueID = Input::get('editCatalogueID');
				$catalogue->strCatalogueCategory = Input::get('editCategory');
				$catalogue->strCatalogueName = Input::get('editCatalogueName');
				$catalogue->strCatalogueDesc = Input::get('editCatalogueDesc');
			} else {
				$file = Input::get('editImage');
				$destinationPath = 'public/imgCatalogue';
				$extension = Input::file('editImg')->getClientOriginalExtension();
				$fileName = $file;
				Input::file('editImg')->move($destinationPath, $fileName);

				$catalogue->strCatalogueID = Input::get('editCatalogueID');
				$catalogue->strCatalogueCategory = Input::get('editCategory');
				$catalogue->strCatalogueName = Input::get('editCatalogueName');
				$catalogue->strCatalogueDesc = Input::get('editCatalogueDesc');
				$catalogue->strCatalogueImage = 'imgCatalogue/'.$fileName;
			}		

			$catalogue->save();
			return Redirect::to('/catalogue?successEdit=true');
		}else return Redirect::to('/catalogue?successEdit=false');
	}

	public function delCatalogue()
	{
		$id = Input::get('delCatalogueID');
		$isDeleted = FALSE;

	  if(!$isDeleted){
		$catalogue = Catalogue::find($id);

		$reason = ReasonCatalogue::create(array(
			'strInactiveCatalogueID' => Input::get('delInactiveCatalogueID'),
			'strInactiveReason' => Input::get('delInactiveReason')
			));

		$catalogue->boolIsActive = 0;
		$reason->save();
		$catalogue->save();
		return Redirect::to('/catalogue?successDel=true');
	  }else return Redirect::to('/catalogue?successDel=false');
	}


	public function reactCatalogue()
	{
		$id = Input::get('reactID');
		$isAdded = FALSE;


		if(!$isAdded){
		$catalogue = Catalogue::find($id);
		
		$reas = Input::get('reactInactiveCatalogueID');
		$reason = DB::table('tblReasonCatalogue')->where('strInactiveCatalogueID', '=', $reas)->delete();
		$catalogue->boolIsActive = 1;

		$catalogue->save();
		return Redirect::to('/catalogue?successRec=true');
	 }else return Redirect::to('/catalogue?successRec=false');
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