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
		/////THREADS/////
		$ids = DB::table('tblMaterialThread')
			->select('strMaterialThreadID')
			->orderBy('created_at', 'desc')
			->orderBy('strMaterialThreadID', 'desc')
			->take(1)
			->get();

		$ID = $ids["0"]->strMaterialThreadID;
		$newThreadID = $this->smartCounter($ID);	

		$thread =  MaterialThread::all();

		/////NEEDLES/////
		$ids = DB::table('tblMaterialNeedle')
			->select('strMaterialNeedleID')
			->orderBy('created_at', 'desc')
			->orderBy('strMaterialNeedleID', 'desc')
			->take(1)
			->get();

		$ID = $ids["0"]->strMaterialNeedleID;
		$newNeedleID = $this->smartCounter($ID);	

		$needle =  MaterialNeedle::all(); 

		/////BUTTONS/////
		$ids = DB::table('tblMaterialButton')
			->select('strMaterialButtonID')
			->orderBy('created_at', 'desc')
			->orderBy('strMaterialButtonID', 'desc')
			->take(1)
			->get();

		$ID = $ids["0"]->strMaterialButtonID;
		$newButtonID = $this->smartCounter($ID);	

		$button =  MaterialButton::all(); 

		/////ZIPPERS/////
		$ids = DB::table('tblMaterialZipper')
			->select('strMaterialZipperID')
			->orderBy('created_at', 'desc')
			->orderBy('strMaterialZipperID', 'desc')
			->take(1)
			->get();

		$ID = $ids["0"]->strMaterialZipperID;
		$newZipperID = $this->smartCounter($ID);	

		$zipper =  MaterialZipper::all(); 

		/////HOOK AND EYE/////
		$ids = DB::table('tblMaterialHookAndEye')
			->select('strMaterialHookID')
			->orderBy('created_at', 'desc')
			->orderBy('strMaterialHookID', 'desc')
			->take(1)
			->get();

		$ID = $ids["0"]->strMaterialHookID;
		$newHookID = $this->smartCounter($ID);	

		$hook =  MaterialHookAndEye::all();


		return View::make('fabricAndMaterialsMaterials')
					->with('thread', $thread)
					->with('thread2', $thread)
					->with('newThreadID', $newThreadID)
					->with('needle', $needle)
					->with('needle2', $needle)
					->with('newNeedleID', $newNeedleID)
					->with('button', $button)
					->with('button2', $button)
					->with('newButtonID', $newButtonID)
					->with('zipper', $zipper)
					->with('zipper2', $zipper)
					->with('newZipperID', $newZipperID)
					->with('hook', $hook)
					->with('hook2', $hook)
					->with('newHookID', $newHookID);
	}

      /////////SWATCHES/////////////
	public function addSwatch()
	{	
		$file = Input::get('addImage');
		$destinationPath = 'public/imgSwatches';
		$extension = Input::file('addImg')->getClientOriginalExtension();
		$fileName = $file;
		Input::file('addImg')->move($destinationPath, $fileName);

		$swatch = Swatch::create(array(
			'strSwatchID' => Input::get('addSwatchID'),
			'strSwatchFabricTypeName' => Input::get('addFabric'),		
			'strSwatchName' => Input::get('addSwatchName'),
			'strSwatchCode' => Input::get('addSwatchCode'),
			'strSwatchImage' => 'imgSwatches/'.$fileName,
			'boolIsActive' => 1
			));

		$swatch->save();
		return Redirect::to('/fabricAndMaterialsSwatches');
	}

	public function editSwatch()
	{	
		$id = Input::get('editSwatchID');
		$swatch = Swatch::find($id);

		$file = Input::get('editImage');
		$destinationPath = 'public/imgSwatches';
		$extension = Input::file('editImg')->getClientOriginalExtension();
		$fileName = $file;
		Input::file('editImg')->move($destinationPath, $fileName);

		$swatch->strSwatchID = Input::get('editSwatchID');
		$swatch->strSwatchFabricTypeName = Input::get('editFabric');		
		$swatch->strSwatchName = Input::get('editSwatchName');
		$swatch->strSwatchCode = Input::get('editSwatchCode');
		$swatch->strSwatchImage = 'imgSwatches/'.$fileName;

		$swatch->save();
		return Redirect::to('/fabricAndMaterialsSwatches');
	}


	public function delSwatch()
	{
		$id = Input::get('delSwatchID');
		$swatch = Swatch::find($id);

		$swatch->boolIsActive = 0;

		$swatch->save();
		return Redirect::to('/fabricAndMaterialsSwatches');
	}

	public function reactSwatch()
	{
		$id = Input::get('reactID');
		$swatch = Swatch::find($id);

		$swatch->boolIsActive = 1;

		$swatch->save();
		return Redirect::to('/fabricAndMaterialsSwatches');
	}

		//////////FABRIC TYPE///////////
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

		///////////THREADS/////////////
	public function addThread()
	{
		$thread = MaterialThread::create(array(
			'strMaterialThreadID' => Input::get('addThreadID'),
			'strMaterialThreadName' => Input::get('addThreadName'),
			'strMaterialThreadColor' => Input::get('addThreadColor'),
			'boolIsActive' => 1
			));

		$thread ->save();
		return Redirect::to('/fabricAndMaterialsMaterials');
	}

	public function editThread()
	{
		$id = Input::get('editThreadID');
		$thread = MaterialThread::find($id);
		$thread->strMaterialThreadName = Input::get('editThreadName');
		$thread->strMaterialThreadColor = Input::get('editThreadColor');

		$thread->save();
		return Redirect::to('/fabricAndMaterialsMaterials');
	}

	public function delThread()
	{
		$id = Input::get('delThreadID');
		$thread = MaterialThread::find($id);

		$thread->boolIsActive = 0;

		$thread->save();
		return Redirect::to('/fabricAndMaterialsMaterials');
	}

	public function reactThread()
	{
		$id = Input::get('reactID');
		$thread = MaterialThread::find($id);

		$thread->boolIsActive = 1;

		$thread->save();
		return Redirect::to('/fabricAndMaterialsMaterials');
	}

		///////////NEEDLES////////////
	public function addNeedle()
	{
		$needle = MaterialNeedle::create(array(
			'strMaterialNeedleID' => Input::get('addNeedleID'),
			'strMaterialNeedleName' => Input::get('addNeedleName'),
			'strMaterialNeedleSize' => Input::get('addNeedleSize'),
			'boolIsActive' => 1
			));

		$needle ->save();
		return Redirect::to('/fabricAndMaterialsMaterials');
	}

	public function editNeedle()
	{
		$id = Input::get('editNeedleID');
		$needle= MaterialNeedle::find($id);
		$needle->strMaterialNeedleName = Input::get('editNeedleName');
		$needle->strMaterialNeedleSize = Input::get('editNeedleSize');

		$needle->save();
		return Redirect::to('/fabricAndMaterialsMaterials');
	}

	public function delNeedle()
	{
		$id = Input::get('delNeedleID');
		$needle = MaterialNeedle::find($id);

		$needle->boolIsActive = 0;

		$needle->save();
		return Redirect::to('/fabricAndMaterialsMaterials');
	}

	public function reactNeedle()
	{
		$id = Input::get('reactID');
		$needle = MaterialNeedle::find($id);

		$needle->boolIsActive = 1;

		$needle->save();
		return Redirect::to('/fabricAndMaterialsMaterials');
	}

		///////////BUTTON////////////
	public function addButton()
	{
		$button = MaterialButton::create(array(
			'strMaterialButtonID' => Input::get('addButtonID'),
			'strMaterialButtonName' => Input::get('addButtonName'),
			'strMaterialButtonSize' => Input::get('addButtonSize'),
			'strMaterialButtonColor' => Input::get('addButtonColor'),
			'boolIsActive' => 1
			));

		$button ->save();
		return Redirect::to('/fabricAndMaterialsMaterials');
	}

	public function editButton()
	{
		$id = Input::get('editButtonID');
		$button= MaterialButton::find($id);
		$button->strMaterialButtonName = Input::get('editButtonName');
		$button->strMaterialButtonSize = Input::get('editButtonSize');
		$button->strMaterialButtonColor = Input::get('editButtonColor');

		$button->save();
		return Redirect::to('/fabricAndMaterialsMaterials');
	}

	public function delButton()
	{
		$id = Input::get('delButtonID');
		$button = MaterialButton::find($id);

		$button->boolIsActive = 0;

		$button->save();
		return Redirect::to('/fabricAndMaterialsMaterials');
	}

	public function reactButton()
	{
		$id = Input::get('reactID');
		$button = MaterialButton::find($id);

		$button->boolIsActive = 1;

		$button->save();
		return Redirect::to('/fabricAndMaterialsMaterials');
	}

		///////////ZIPPER////////////
	public function addZipper()
	{
		$zipper = MaterialZipper::create(array(
			'strMaterialZipperID' => Input::get('addZipperID'),
			'strMaterialZipperName' => Input::get('addZipperName'),
			'strMaterialZipperSize' => Input::get('addZipperSize'),
			'strMaterialZipperColor' => Input::get('addZipperColor'),
			'boolIsActive' => 1
			));

		$zipper ->save();
		return Redirect::to('/fabricAndMaterialsMaterials');
	}

	public function editZipper()
	{
		$id = Input::get('editZipperID');
		$zipper= MaterialZipper::find($id);
		$zipper->strMaterialZipperName = Input::get('editZipperName');
		$zipper->strMaterialZipperSize = Input::get('editZipperSize');
		$zipper->strMaterialZipperColor = Input::get('editZipperColor');

		$zipper->save();
		return Redirect::to('/fabricAndMaterialsMaterials');
	}

	public function delZipper()
	{
		$id = Input::get('delZipperID');
		$zipper = MaterialZipper::find($id);

		$zipper->boolIsActive = 0;

		$zipper->save();
		return Redirect::to('/fabricAndMaterialsMaterials');
	}

	public function reactZipper()
	{
		$id = Input::get('reactID');
		$zipper = MaterialZipper::find($id);

		$zipper->boolIsActive = 1;

		$zipper->save();
		return Redirect::to('/fabricAndMaterialsMaterials');
	}

		///////////HOOK AND EYE////////////
	public function addHook()
	{
		$hook = MaterialHookAndEye::create(array(
			'strMaterialHookID' => Input::get('addHookID'),
			'strMaterialHookName' => Input::get('addHookName'),
			'strMaterialHookSize' => Input::get('addHookSize'),
			'strMaterialHookColor' => Input::get('addHookColor'),
			'boolIsActive' => 1
			));

		$hook ->save();
		return Redirect::to('/fabricAndMaterialsMaterials');
	}

	public function editHook()
	{
		$id = Input::get('editHookID');
		$hook= MaterialHookAndEye::find($id);
		$hook->strMaterialHookName = Input::get('editHookName');
		$hook->strMaterialHookSize = Input::get('editHookSize');
		$hook->strMaterialHookColor = Input::get('editHookColor');

		$hook->save();
		return Redirect::to('/fabricAndMaterialsMaterials');
	}

	public function delHook()
	{
		$id = Input::get('delHookID');
		$hook = MaterialHookAndEye::find($id);

		$hook->boolIsActive = 0;

		$hook->save();
		return Redirect::to('/fabricAndMaterialsMaterials');
	}

	public function reactHook()
	{
		$id = Input::get('reactID');
		$hook = MaterialHookAndEye::find($id);

		$hook->boolIsActive = 1;

		$hook->save();
		return Redirect::to('/fabricAndMaterialsMaterials');
	}

		//////////SMART COUNTER////////////
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