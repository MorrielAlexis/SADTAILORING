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
		$reason = ReasonFabricType::all();

		$fabricType = DB::table('tblFabricType')
				->leftJoin('tblReasonFabricType', 'tblFabricType.strFabricTypeID', '=', 'tblReasonFabricType.strInactiveFabricTypeID')
				->select('tblFabricType.*', 'tblReasonFabricType.strInactiveFabricTypeID', 'tblReasonFabricType.strInactiveReason')
				->orderBy('created_at')
				->get();

		return View::make('fabricAndMaterialsFabricType')
					->with('fabricType', $fabricType)
					->with('fabricType2', $fabricType)
					->with('reason', $reason)
					->with('newID', $newID);
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
		$reason = ReasonSwatches::all();		
		
		$swatch = DB::table('tblSwatches')
            ->join('tblFabricType', 'tblSwatches.strSwatchFabricTypeName', '=', 'tblFabricType.strFabricTypeID')
            ->leftJoin('tblReasonSwatches', 'tblSwatches.strSwatchID', '=', 'tblReasonSwatches.strInactiveSwatchID')
            ->select('tblSwatches.*', 'tblFabricType.strFabricTypeName', 'tblReasonSwatches.strInactiveSwatchID', 'tblReasonSwatches.strInactiveReason')
            ->get();

		return View::make('fabricAndMaterialsSwatches')
					->with('swatch', $swatch)
					->with('swatch2', $swatch)
					->with('fabricType', $fabricType)
					->with('reason', $reason)
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

		$reasonThread = ReasonMaterialThread::all();

		$thread = DB::table('tblMaterialThread')
				->leftJoin('tblReasonMaterialThread', 'tblMaterialThread.strMaterialThreadID', '=', 'tblReasonMaterialThread.strInactiveThreadID')
				->select('tblMaterialThread.*', 'tblReasonMaterialThread.strInactiveThreadID', 'tblReasonMaterialThread.strInactiveReason')
				->orderBy('created_at')
				->get();

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

		$reasonNeedle = ReasonMaterialNeedle::all();

		$needle = DB::table('tblMaterialNeedle')
				->leftJoin('tblReasonMaterialNeedle', 'tblMaterialNeedle.strMaterialNeedleID', '=', 'tblReasonMaterialNeedle.strInactiveNeedleID')
				->select('tblMaterialNeedle.*', 'tblReasonMaterialNeedle.strInactiveNeedleID', 'tblReasonMaterialNeedle.strInactiveReason')
				->orderBy('created_at')
				->get();

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

		$reasonButton = ReasonMaterialButton::all();

		$button = DB::table('tblMaterialButton')
				->leftJoin('tblReasonMaterialButton', 'tblMaterialButton.strMaterialButtonID', '=', 'tblReasonMaterialButton.strInactiveButtonID')
				->select('tblMaterialButton.*', 'tblReasonMaterialButton.strInactiveButtonID', 'tblReasonMaterialButton.strInactiveReason')
				->orderBy('created_at')
				->get();

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

		$reasonZipper = ReasonMaterialZipper::all();

		$zipper = DB::table('tblMaterialZipper')
				->leftJoin('tblReasonMaterialZipper', 'tblMaterialZipper.strMaterialZipperID', '=', 'tblReasonMaterialZipper.strInactiveZipperID')
				->select('tblMaterialZipper.*', 'tblReasonMaterialZipper.strInactiveZipperID', 'tblReasonMaterialZipper.strInactiveReason')
				->orderBy('created_at')
				->get();

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

		$reasonHook = ReasonMaterialHookAndEye::all();

		$hook = DB::table('tblMaterialHookAndEye')
				->leftJoin('tblReasonMaterialHookAndEye', 'tblMaterialHookAndEye.strMaterialHookID', '=', 'tblReasonMaterialHookAndEye.strInactiveHookID')
				->select('tblMaterialHookAndEye.*', 'tblReasonMaterialHookAndEye.strInactiveHookID', 'tblReasonMaterialHookAndEye.strInactiveReason')
				->orderBy('created_at')
				->get();


		return View::make('fabricAndMaterialsMaterials')
					->with('thread', $thread)
					->with('thread2', $thread)
					->with('reasonThread', $reasonThread)
					->with('newThreadID', $newThreadID)
					->with('needle', $needle)
					->with('needle2', $needle)
					->with('reasonNeedle', $reasonNeedle)
					->with('newNeedleID', $newNeedleID)
					->with('button', $button)
					->with('button2', $button)
					->with('reasonButton', $reasonButton)
					->with('newButtonID', $newButtonID)
					->with('zipper', $zipper)
					->with('zipper2', $zipper)
					->with('reasonZipper', $reasonZipper)
					->with('newZipperID', $newZipperID)
					->with('hook', $hook)
					->with('hook2', $hook)
					->with('reasonHook', $reasonHook)
					->with('newHookID', $newHookID);
	}

      /////////SWATCHES/////////////
	public function addSwatch()
	{		
		$file = Input::get('addImage');
		$destinationPath = 'public/imgSwatches';

		$swa = Swatch::all();
		$isAdded = FALSE;

		foreach ($swa as $swa)
			if(strcasecmp($swa->strSwatchFabricTypeName, Input::get('addFabric')) == 0 && 
			   strcasecmp($swa->strSwatchName, Input::get('addSwatchName')) == 0 &&
			   strcasecmp($swa->strSwatchCode, Input::get('addSwatchCode')) == 0)
			   		$isAdded = TRUE;

		if(!$isAdded){
			if($file == '' || $file == null){
			$swatch = Swatch::create(array(
			'strSwatchID' => Input::get('addSwatchID'),
			'strSwatchFabricTypeName' => Input::get('addFabric'),		
			'strSwatchName' => Input::get('addSwatchName'),
			'strSwatchCode' => Input::get('addSwatchCode'),
			'boolIsActive' => 1
			));
			}else{
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
			}	

			$swatch->save();
			return Redirect::to('/fabricAndMaterialsSwatches?success=true');
		} else return Redirect::to('/fabricAndMaterialsSwatches?success=duplicate');
	}

	public function editSwatch()
	{	
		$id = Input::get('editSwatchID');
		$swatch = Swatch::find($id);

		$swa = Swatch::all();
		$isAdded = FALSE;

		foreach ($swa as $swa)
			if(strcasecmp($swa->strSwatchFabricTypeName, Input::get('editFabric')) == 0 && 
			   strcasecmp($swa->strSwatchName, Input::get('editSwatchName')) == 0 &&
			   strcasecmp($swa->strSwatchCode, Input::get('editSwatchCode')) == 0)
			   		$isAdded = TRUE;

		if(!$isAdded){	
			if(Input::get('editSwatchImage') == $swatch->strSwatchImage){
				$swatch->strSwatchFabricTypeName = Input::get('editFabric');		
				$swatch->strSwatchName = Input::get('editSwatchName');
				$swatch->strSwatchCode = Input::get('editSwatchCode');
			}else{

				$file = Input::get('editSwatchImage');
				$destinationPath = 'public/imgSwatches';
				$extension = Input::file('editImg')->getClientOriginalExtension();
				$fileName = $file;
				Input::file('editImg')->move($destinationPath, $fileName);

				$swatch->strSwatchFabricTypeName = Input::get('editFabric');		
				$swatch->strSwatchName = Input::get('editSwatchName');
				$swatch->strSwatchCode = Input::get('editSwatchCode');
				$swatch->strSwatchImage = 'imgSwatches/'.$fileName;
			}

			$swatch->save();
			return Redirect::to('/fabricAndMaterialsSwatches?successEdit=true');
		} else return Redirect::to('/fabricAndMaterialsSwatches?success=duplicate');
	}


	public function delSwatch()
	{
		$id = Input::get('delSwatchID');
		$isDeleted = FALSE;


	if(!$isDeleted){
		$swatch = Swatch::find($id);

    	$reason = ReasonSwatches::create(array(
    		'strInactiveSwatchID' => Input::get('delInactiveSwatch'),
    		'strInactiveReason' => Input::get('delInactiveReason')
    		));

		$swatch->boolIsActive = 0;
		$reason->save();
		$swatch->save();
		return Redirect::to('/fabricAndMaterialsSwatches?successDel=true');
	 } else return Redirect::to('/fabricAndMaterialsSwatches?successDel=false');
	}

	public function reactSwatch()
	{
		$id = Input::get('reactID');
		$isAdded = FALSE;


	if(!$isAdded){
		$swatch = Swatch::find($id);

		$reas = Input::get('reactInactiveSwatch');
		$reason = DB::table('tblReasonSwatches')
						->where('strInactiveSwatchID', '=', $reas)
						->delete();

		$swatch->boolIsActive = 1;

		$swatch->save();
		return Redirect::to('/fabricAndMaterialsSwatches?successRec=true');
	 } else return Redirect::to('/fabricAndMaterialsSwatches?successRec=false');
	}

		//////////FABRIC TYPE///////////
	public function addFabricType()
	{	
		$fabric = FabricType::get();
		$isAdded = FALSE;

		foreach($fabric as $fabric)
			if(strcmp($fabric->strFabricTypeName, Input::get('addFabricTypeName')) == 0)
				$isAdded = TRUE;

		if(!$isAdded){
			$fabricType = FabricType::create(array(
			'strFabricTypeID' => Input::get('addFabricTypeID'),
			'strFabricTypeName' => Input::get('addFabricTypeName'),
			'strFabricTypeDesc' => Input::get('addFabricTypeDesc'),
			'boolIsActive' => 1
			));

			$fabricType->save();
			return Redirect::to('/fabricAndMaterialsFabricType?success=true');
		}else return Redirect::to('/fabricAndMaterialsFabricType?success=duplicate');

	}

	public function editFabricType()
	{	
		$id = Input::get('editFabricTypeID');
		$fabricType = FabricType::find($id);

		$fabric = FabricType::get();
		$isAdded = FALSE;

		foreach($fabric as $fabric)
			if(strcmp($fabric->strFabricTypeName, Input::get('editFabricTypeName')) == 0)
				$isAdded = TRUE;

		if(!$isAdded){
			$fabricType = FabricType::find($id);
			$fabricType->strFabricTypeName = Input::get('editFabricTypeName');	
			$fabricType->strFabricTypeDesc = Input::get('editFabricTypeDesc');

			$fabricType->save();
			return Redirect::to('/fabricAndMaterialsFabricType?successEdit=true');
		}else return Redirect::to('/fabricAndMaterialsFabricType?success=duplicate');
	}


	public function delFabricType()
	{
		$id = Input::get('delFabricID');
		$isDeleted = FALSE;

	if(!$isDeleted){
		$fabricType = FabricType::find($id);

    	$reason = ReasonFabricType::create(array(
    		'strInactiveFabricTypeID' => Input::get('delInactiveFabricType'),
    		'strInactiveReason' => Input::get('delInactiveReason')
    		));

		$fabricType->boolIsActive = 0;
		$reason->save();
		$fabricType->save();
		return Redirect::to('/fabricAndMaterialsFabricType?successDel=true');
	 } else return Redirect::to('/fabricAndMaterialsFabricType?successDel=false');
	}

	public function reactFabricType()
	{
		$id = Input::get('reactID');
		$isAdded = FALSE;

	if(!$isAdded){
		$fabricType = FabricType::find($id);

		$reas = Input::get('reactInactiveFabricType');
		$reason = DB::table('tblReasonFabricType')
						->where('strInactiveFabricTypeID', '=', $reas)
						->delete();

		$fabricType->boolIsActive = 1;

		$fabricType->save();
		return Redirect::to('/fabricAndMaterialsFabricType?successRec=true');
	 } else return Redirect::to('/fabricAndMaterialsFabricType?successRec=false');
	}

		///////////THREADS/////////////
	public function addThread()
	{	
		$file = Input::get('addImage');
		$destinationPath = 'public/imgMaterialThreads';
		if($file == '' || $file == null){
		$thread = MaterialThread::create(array(
			'strMaterialThreadID' => Input::get('addThreadID'),
			'strMaterialThreadName' => Input::get('addThreadName'),
			'strMaterialThreadColor' => Input::get('addThreadColor'),
			// 'strMaterialThreadDesc' => Input::get('addThreadDesc'),
			'boolIsActive' => 1
			));
		}else{
			$extension = Input::file('addImg')->getClientOriginalExtension();
			$fileName = $file;
			Input::file('addImg')->move($destinationPath, $fileName);

			$thread = MaterialThread::create(array(
			'strMaterialThreadID' => Input::get('addThreadID'),
			'strMaterialThreadName' => Input::get('addThreadName'),
			'strMaterialThreadColor' => Input::get('addThreadColor'),
			'strMaterialThreadDesc' => Input::get('addThreadDesc'),
			'strMaterialThreadImage' => 'imgMaterialThreads/'.$fileName,
			'boolIsActive' => 1
			));
		}

		$thread ->save();
		return Redirect::to('/fabricAndMaterialsMaterials');
	}

	public function editThread()
	{
		$id = Input::get('editThreadID');
		$thread = MaterialThread::find($id);

		if(Input::get('editThreadImage') == $thread->strMaterialThreadImage){
			$thread->strMaterialThreadName = Input::get('editThreadName');
			$thread->strMaterialThreadColor = Input::get('editThreadColor');
			$thread->strMaterialThreadDesc = Input::get('editThreadDesc');	
		}else{
			$file = Input::get('editThreadImage');
			$destinationPath = 'public/imgMaterialThreads';
			$extension = Input::file('editImg')->getClientOriginalExtension();
			$fileName = $file;
			Input::file('editImg')->move($destinationPath, $fileName);

			$thread->strMaterialThreadName = Input::get('editThreadName');
			$thread->strMaterialThreadColor = Input::get('editThreadColor');
			$thread->strMaterialThreadDesc = Input::get('editThreadDesc');
			$thread->strMaterialThreadImage = 'imgMaterialThreads/'.$fileName;
		}

		$thread->save();
		return Redirect::to('/fabricAndMaterialsMaterials');
	}

	public function delThread()
	{
		$id = Input::get('delThreadID');
		$thread = MaterialThread::find($id);

		$reasonThread = ReasonMaterialThread::create(array(
			'strInactiveThreadID' => Input::get('delInactiveThread'),
			'strInactiveReason' => Input::get('delInactiveReason')
			));

		$thread->boolIsActive = 0;
		$reasonThread->save();
		$thread->save();
		return Redirect::to('/fabricAndMaterialsMaterials');
	}

	public function reactThread()
	{
		$id = Input::get('reactID');
		$thread = MaterialThread::find($id);

		$reas = Input::get('reactInactiveThread');
		$reasonThread = DB::table('tblReasonMaterialThread')
						->where('strInactiveThreadID', '=', $reas)
						->delete();

		$thread->boolIsActive = 1;

		$thread->save();
		return Redirect::to('/fabricAndMaterialsMaterials');
	}

		///////////NEEDLES////////////
	public function addNeedle()
	{	
		$file = Input::get('addImage');
		$destinationPath = 'public/imgMaterialNeedles';
		if($file == '' || $file == null){
			$needle = MaterialNeedle::create(array(
				'strMaterialNeedleID' => Input::get('addNeedleID'),
				'strMaterialNeedleName' => Input::get('addNeedleName'),
				'strMaterialNeedleSize' => Input::get('addNeedleSize'),
				'strMaterialNeedleDesc' => Input::get('addNeedleDesc'),
				'boolIsActive' => 1
				));
		}else{
			$extension = Input::file('addImg')->getClientOriginalExtension();
			$fileName = $file;
			Input::file('addImg')->move($destinationPath, $fileName);

			$needle = MaterialNeedle::create(array(
				'strMaterialNeedleID' => Input::get('addNeedleID'),
				'strMaterialNeedleName' => Input::get('addNeedleName'),
				'strMaterialNeedleSize' => Input::get('addNeedleSize'),
				'strMaterialNeedleDesc' => Input::get('addNeedleDesc'),
				'strMaterialNeedleImage' => 'imgMaterialNeedles/'.$fileName,
				'boolIsActive' => 1
				));
		}

		$needle ->save();
		return Redirect::to('/fabricAndMaterialsMaterials');
	}

	public function editNeedle()
	{
		$id = Input::get('editNeedleID');
		$needle= MaterialNeedle::find($id);

		if(Input::get('editNeedleImage') == $needle->strMaterialNeedleImage){
			$needle->strMaterialNeedleName = Input::get('editNeedleName');
			$needle->strMaterialNeedleSize = Input::get('editNeedleSize');
			$needle->strMaterialNeedleDesc = Input::get('editNeedleDesc');
		}else{
			$file = Input::get('editNeedleImage');
			$destinationPath = 'public/imgMaterialNeedles';
			$extension = Input::file('editImg')->getClientOriginalExtension();
			$fileName = $file;
			Input::file('editImg')->move($destinationPath, $fileName);

			$needle->strMaterialNeedleName = Input::get('editNeedleName');
			$needle->strMaterialNeedleSize = Input::get('editNeedleSize');
			$needle->strMaterialNeedleDesc = Input::get('editNeedleDesc');
			$needle->strMaterialNeedleImage = 'imgMaterialNeedles/'.$fileName;
		}


		$needle->save();
		return Redirect::to('/fabricAndMaterialsMaterials');
	}

	public function delNeedle()
	{
		$id = Input::get('delNeedleID');
		$needle = MaterialNeedle::find($id);

		$reasonNeedle = ReasonMaterialNeedle::create(array(
			'strInactiveNeedleID' => Input::get('delInactiveNeedle'),
			'strInactiveReason' => Input::get('delInactiveReason')
			));

		$needle->boolIsActive = 0;
		$reasonNeedle->save();
		$needle->save();
		return Redirect::to('/fabricAndMaterialsMaterials');
	}

	public function reactNeedle()
	{
		$id = Input::get('reactID');
		$needle = MaterialNeedle::find($id);

		$reas = Input::get('reactInactiveNeedle');
		$reasonNeedle = DB::table('tblReasonMaterialNeedle')
						->where('strInactiveNeedleID', '=', $reas)
						->delete();

		$needle->boolIsActive = 1;

		$needle->save();
		return Redirect::to('/fabricAndMaterialsMaterials');
	}

		///////////BUTTON////////////
	public function addButton()
	{	
		$file = Input::get('addImage');
		$destinationPath = 'public/imgMaterialButtons';
		if($file == '' || $file == null){
			$button = MaterialButton::create(array(
			'strMaterialButtonID' => Input::get('addButtonID'),
			'strMaterialButtonName' => Input::get('addButtonName'),
			'strMaterialButtonSize' => Input::get('addButtonSize'),
			'strMaterialButtonColor' => Input::get('addButtonColor'),
			'strMaterialButtonDesc' => Input::get('addButtonDesc'),
			'boolIsActive' => 1
			));
		}else{
			$extension = Input::file('addImg')->getClientOriginalExtension();
			$fileName = $file;
			Input::file('addImg')->move($destinationPath, $fileName);

			$button = MaterialButton::create(array(
				'strMaterialButtonID' => Input::get('addButtonID'),
				'strMaterialButtonName' => Input::get('addButtonName'),
				'strMaterialButtonSize' => Input::get('addButtonSize'),
				'strMaterialButtonColor' => Input::get('addButtonColor'),
				'strMaterialButtonDesc' => Input::get('addButtonDesc'),
				'strMaterialButtonImage' => 'imgMaterialButtons/'.$fileName,
				'boolIsActive' => 1
				));
		}

		$button ->save();
		return Redirect::to('/fabricAndMaterialsMaterials');
	}

	public function editButton()
	{
		$id = Input::get('editButtonID');
		$button= MaterialButton::find($id);

		if(Input::get('editButtonImage') == $button->strMaterialButtonImage){
			$button->strMaterialButtonName = Input::get('editButtonName');
			$button->strMaterialButtonSize = Input::get('editButtonSize');
			$button->strMaterialButtonColor = Input::get('editButtonColor');
			$button->strMaterialButtonDesc = Input::get('editButtonDesc');
		}else{
			$file = Input::get('editButtonImage');
			$destinationPath = 'public/imgMaterialButtons';
			$extension = Input::file('editImg')->getClientOriginalExtension();
			$fileName = $file;
			Input::file('editImg')->move($destinationPath, $fileName);

			$button->strMaterialButtonName = Input::get('editButtonName');
			$button->strMaterialButtonSize = Input::get('editButtonSize');
			$button->strMaterialButtonColor = Input::get('editButtonColor');
			$button->strMaterialButtonDesc = Input::get('editButtonDesc');
			$button->strMaterialButtonImage = 'imgMaterialButtons/'.$fileName; 
		}
	

		$button->save();
		return Redirect::to('/fabricAndMaterialsMaterials');
	}

	public function delButton()
	{
		$id = Input::get('delButtonID');
		$button = MaterialButton::find($id);

		$reasonButton = ReasonMaterialButton::create(array(
			'strInactiveButtonID' => Input::get('delInactiveButton'),
			'strInactiveReason' => Input::get('delInactiveReason')
			));

		$button->boolIsActive = 0;
		$reasonButton->save();
		$button->save();
		return Redirect::to('/fabricAndMaterialsMaterials');
	}

	public function reactButton()
	{
		$id = Input::get('reactID');
		$button = MaterialButton::find($id);

		$reas = Input::get('reactInactiveButton');
		$reasonButton = DB::table('tblReasonMaterialButton')
						->where('strInactiveButtonID', '=', $reas)
						->delete();

		$button->boolIsActive = 1;

		$button->save();
		return Redirect::to('/fabricAndMaterialsMaterials');
	}

		///////////ZIPPER////////////
	public function addZipper()
	{	
		$file = Input::get('addImage');
		$destinationPath = 'public/imgMaterialZippers';
		if($file == '' || $file == null){
			$zipper = MaterialZipper::create(array(
			'strMaterialZipperID' => Input::get('addZipperID'),
			'strMaterialZipperName' => Input::get('addZipperName'),
			'strMaterialZipperSize' => Input::get('addZipperSize'),
			'strMaterialZipperColor' => Input::get('addZipperColor'),
			'strMaterialZipperDesc' => Input::get('addZipperDesc'),
			'boolIsActive' => 1
			));
		}else{
			$extension = Input::file('addImg')->getClientOriginalExtension();
			$fileName = $file;
			Input::file('addImg')->move($destinationPath, $fileName);

			$zipper = MaterialZipper::create(array(
				'strMaterialZipperID' => Input::get('addZipperID'),
				'strMaterialZipperName' => Input::get('addZipperName'),
				'strMaterialZipperSize' => Input::get('addZipperSize'),
				'strMaterialZipperColor' => Input::get('addZipperColor'),
				'strMaterialZipperDesc' => Input::get('addZipperDesc'),
				'strMaterialZipperImage' => 'imgMaterialZippers/'.$fileName,
				'boolIsActive' => 1
				));
			}

		$zipper ->save();
		return Redirect::to('/fabricAndMaterialsMaterials');
	}

	public function editZipper()
	{
		$id = Input::get('editZipperID');
		$zipper= MaterialZipper::find($id);

		if (Input::get('editZipperImage') == $zipper->strMaterialZipperImage) {
			$zipper->strMaterialZipperName = Input::get('editZipperName');
			$zipper->strMaterialZipperSize = Input::get('editZipperSize');
			$zipper->strMaterialZipperColor = Input::get('editZipperColor');
			$zipper->strMaterialZipperDesc = Input::get('editZipperDesc');
		} else {
			$file = Input::get('editZipperImage');
			$destinationPath = 'public/imgMaterialZippers';
			$extension = Input::file('editImg')->getClientOriginalExtension();
			$fileName = $file;
			Input::file('editImg')->move($destinationPath, $fileName);

			$zipper->strMaterialZipperName = Input::get('editZipperName');
			$zipper->strMaterialZipperSize = Input::get('editZipperSize');
			$zipper->strMaterialZipperColor = Input::get('editZipperColor');
			$zipper->strMaterialZipperDesc = Input::get('editZipperDesc');
			$zipper->strMaterialZipperImage = 'imgMaterialZippers/'.$fileName;
		}	

		$zipper->save();
		return Redirect::to('/fabricAndMaterialsMaterials');
	}

	public function delZipper()
	{
		$id = Input::get('delZipperID');
		$zipper = MaterialZipper::find($id);

		$reasonZipper = ReasonMaterialZipper::create(array(
			'strInactiveZipperID' => Input::get('delInactiveZipper'),
			'strInactiveReason' => Input::get('delInactiveReason')
			));

		$zipper->boolIsActive = 0;
		$reasonZipper->save();
		$zipper->save();
		return Redirect::to('/fabricAndMaterialsMaterials');
	}

	public function reactZipper()
	{
		$id = Input::get('reactID');
		$zipper = MaterialZipper::find($id);

		$reas = Input::get('reactInactiveZipper');
		$reasonZipper = DB::table('tblReasonMaterialZipper')
						->where('strInactiveZipperID', '=', $reas)
						->delete();

		$zipper->boolIsActive = 1;

		$zipper->save();
		return Redirect::to('/fabricAndMaterialsMaterials');
	}

		///////////HOOK AND EYE////////////
	public function addHook()
	{	
		$file = Input::get('addImage');
		$destinationPath = 'public/imgMaterialHooks';
		if($file == '' || $file == null){
			$hook = MaterialHookAndEye::create(array(
			'strMaterialHookID' => Input::get('addHookID'),
			'strMaterialHookName' => Input::get('addHookName'),
			'strMaterialHookSize' => Input::get('addHookSize'),
			'strMaterialHookColor' => Input::get('addHookColor'),
			'strMaterialHookDesc' => Input::get('addHookDesc'),
			'boolIsActive' => 1
			));
		}else{
			$extension = Input::file('addImg')->getClientOriginalExtension();
			$fileName = $file;
			Input::file('addImg')->move($destinationPath, $fileName);

			$hook = MaterialHookAndEye::create(array(
				'strMaterialHookID' => Input::get('addHookID'),
				'strMaterialHookName' => Input::get('addHookName'),
				'strMaterialHookSize' => Input::get('addHookSize'),
				'strMaterialHookColor' => Input::get('addHookColor'),
				'strMaterialHookDesc' => Input::get('addHookDesc'),
				'strMaterialHookImage' => 'imgMaterialHooks/'.$fileName,
				'boolIsActive' => 1
				));
		}

		$hook ->save();
		return Redirect::to('/fabricAndMaterialsMaterials');
	}

	public function editHook()
	{
		$id = Input::get('editHookID');
		$hook = MaterialHookAndEye::find($id);

		if (Input::get('editHookImage') == $hook->strMaterialHookImage) {
			$hook->strMaterialHookName = Input::get('editHookName');
			$hook->strMaterialHookSize = Input::get('editHookSize');
			$hook->strMaterialHookColor = Input::get('editHookColor');
			$hook->strMaterialHookDesc = Input::get('editHookDesc');
		} else {
			$file = Input::get('editHookImage');
			$destinationPath = 'public/imgMaterialHooks';
			$extension = Input::file('editImg')->getClientOriginalExtension();
			$fileName = $file;
			Input::file('editImg')->move($destinationPath, $fileName);

			$hook->strMaterialHookName = Input::get('editHookName');
			$hook->strMaterialHookSize = Input::get('editHookSize');
			$hook->strMaterialHookColor = Input::get('editHookColor');
			$hook->strMaterialHookDesc = Input::get('editHookDesc');
			$hook->strMaterialHookImage = 'imgMaterialHooks/'.$fileName;
		}
		
		$hook->save();
		return Redirect::to('/fabricAndMaterialsMaterials');
	}

	public function delHook()
	{
		$id = Input::get('delHookID');
		$hook = MaterialHookAndEye::find($id);

		$reasonHook = ReasonMaterialHookAndEye::create(array(
			'strInactiveHookID' => Input::get('delInactiveHook'),
			'strInactiveReason' => Input::get('delInactiveReason')
			));

		$hook->boolIsActive = 0;
		$reasonHook->save();
		$hook->save();
		return Redirect::to('/fabricAndMaterialsMaterials');
	}

	public function reactHook()
	{
		$id = Input::get('reactID');
		$hook = MaterialHookAndEye::find($id);

		$reas = Input::get('reactInactiveHook');
		$reasonHook = DB::table('tblReasonMaterialHookAndEye')
						->where('strInactiveHookID', '=', $reas)
						->delete();

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