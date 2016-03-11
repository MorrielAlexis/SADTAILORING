<?php

class MaterialsController extends BaseController{
	
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
					->with('threads', $thread)
					->with('reasonThread', $reasonThread)
					->with('newThreadID', $newThreadID)
					->with('needles', $needle)
					->with('reasonNeedle', $reasonNeedle)
					->with('newNeedleID', $newNeedleID)
					->with('buttons', $button)
					->with('reasonButton', $reasonButton)
					->with('newButtonID', $newButtonID)
					->with('zippers', $zipper)
					->with('reasonZipper', $reasonZipper)
					->with('newZipperID', $newZipperID)
					->with('hooks', $hook)
					->with('reasonHook', $reasonHook)
					->with('newHookID', $newHookID);
	}

		///////////THREADS/////////////
	public function addThread()
	{	
		$file = Input::get('addImage');
		$destinationPath = 'public/imgMaterialThreads';

		$threads = MaterialThread::get();
		$isAdded = FALSE;
		$validInput = TRUE;

		$regex = "/^[a-zA-Z\s\-\']+$/";
		$regexDesc = "/^[a-zA-Z0-9\s\-\'\.\,]+$/";
		$regexColor = "/^[a-zA-Z\s\,]+$";
		
		if(!trim(Input::get('addThreadName')) == '' && !trim(Input::get('addThreadDesc')) == '' && !trim(Input::get('addThreadColor')) == ''){
			$validInput = TRUE;
			if (preg_match($regex, Input::get('addThreadName')) && preg_match($regexDesc, Input::get('addThreadDesc')) && preg_match($regexColor, Input::get('addThreadColor'))) {
				$validInput = TRUE;
			}else $validInput = FALSE;
		}else $validInput = FALSE;


		foreach($threads as $thread)
			if(strcasecmp($thread->strMaterialThreadName, trim(Input::get('addThreadName'))) == 0 && 
				strcasecmp($thread->strMaterialThreadColor, trim(Input::get('addThreadColor'))) == 0)
					$isAdded = TRUE;

		if($validInput){
			if(!$isAdded){
				if($file == '' || $file == null){
				$thread = MaterialThread::create(array(
					'strMaterialThreadID' => Input::get('addThreadID'),
					'strMaterialThreadName' => trim(Input::get('addThreadName')),
					'strMaterialThreadColor' => trim(Input::get('addThreadColor')),
					'strMaterialThreadDesc' => trim(Input::get('addThreadDesc')),
					'boolIsActive' => 1
					));
				}else{
					$extension = Input::file('addImg')->getClientOriginalExtension();
					$fileName = $file;
					Input::file('addImg')->move($destinationPath, $fileName);

					$thread = MaterialThread::create(array(
					'strMaterialThreadID' => Input::get('addThreadID'),
					'strMaterialThreadName' => trim(Input::get('addThreadName')),
					'strMaterialThreadColor' => trim(Input::get('addThreadColor')),
					'strMaterialThreadDesc' => trim(Input::get('addThreadDesc')),
					'strMaterialThreadImage' => 'imgMaterialThreads/'.$fileName,
					'boolIsActive' => 1
						));
				}
				$thread ->save();
				return Redirect::to('/maintenance/fabricAndMaterialsMaterials?thread=true&success=true');
			}else return Redirect::to('/maintenance/fabricAndMaterialsMaterials?thread=true&success=duplicate');
		}else return Redirect::to('/maintenance/fabricAndMaterialsMaterials?thread=true&input=invalid');
	}

	public function editThread()
	{
		$threads = MaterialThread::get();
		$isAdded = FALSE;
		$validInput = TRUE;

		$regex = "/^[a-zA-Z\s\-\']+$/";
		$regexDesc = "/^[a-zA-Z0-9\s\-\'\.\,]+$/";
		$regexColor = "/^[a-zA-Z\s\,]+$";
		
		if(!trim(Input::get('editThreadName')) == '' && !trim(Input::get('editThreadDesc')) == '' && !trim(Input::get('editThreadColor')) == ''){
			$validInput = TRUE;
			if (preg_match($regex, Input::get('editThreadName')) && preg_match($regexDesc, Input::get('editThreadDesc')) && preg_match($regexColor, Input::get('editThreadColor'))) {
				$validInput = TRUE;
			}else $validInput = FALSE;
		}else $validInput = FALSE;

		$id = Input::get('editThreadID');
		$thread = MaterialThread::find($id);

		foreach($threads as $threade)
			if(!strcasecmp($threade->strMaterialThreadID, Input::get('editThreadID')) == 0 &&
				strcasecmp($threade->strMaterialThreadName, trim(Input::get('editThreadName'))) == 0 && 
				strcasecmp($threade->strMaterialThreadColor, trim(Input::get('editThreadColor'))) == 0 &&
				strcasecmp($threade->strMaterialThreadDesc, trim(Input::get('editThreadDesc'))) == 0)
					$isAdded = TRUE;

		if($validInput){
			//dd("yes")
			if(!$isAdded){
				if(Input::get('editThreadImage') == $thread->strMaterialThreadImage){
					$thread->strMaterialThreadName = trim(Input::get('editThreadName'));
					$thread->strMaterialThreadColor = trim(Input::get('editThreadColor'));
					$thread->strMaterialThreadDesc = trim(Input::get('editThreadDesc'));	
				}else{	
					$file = Input::get('editThreadImage');
					$destinationPath = 'public/imgMaterialThreads';
					$extension = Input::file('editImg')->getClientOriginalExtension();
					$fileName = $file;
					Input::file('editImg')->move($destinationPath, $fileName);

					$thread->strMaterialThreadName = trim(Input::get('editThreadName'));
					$thread->strMaterialThreadColor = trim(Input::get('editThreadColor'));
					$thread->strMaterialThreadDesc = trim(Input::get('editThreadDesc'));
					$thread->strMaterialThreadImage = 'imgMaterialThreads/'.$fileName;
				}
				$thread->save();
				return Redirect::to('/maintenance/fabricAndMaterialsMaterials?thread=true&successEdit=true');
			}else return Redirect::to('/maintenance/fabricAndMaterialsMaterials?thread=true&success=duplicate');
		}else return Redirect::to('/maintenance/fabricAndMaterialsMaterials?thread=true&input=invalid');
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

		return Redirect::to('/maintenance/fabricAndMaterialsMaterials?thread=true');
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
		return Redirect::to('/utilities/inactiveData?successRec=true');
	}

		///////////NEEDLES////////////
	public function addNeedle()
	{	
		$file = Input::get('addImage');
		$destinationPath = 'public/imgMaterialNeedles';

		$needles = MaterialNeedle::get();
		$isAdded = FALSE;
		$validInput = TRUE;
		
		$regex = "/^[a-zA-Z\s\-\']+$/";
		$regexDesc = "/^[a-zA-Z0-9\s\-\'\.\,]+$/";
		$regexSize = "/^[a-zA-Z0-9\s]+$/";
		
		if(!trim(Input::get('addNeedleName')) == '' && !trim(Input::get('addNeedleDesc')) == '' && !trim(Input::get('addNeedleSize')) == ''){
			$validInput = TRUE;
			if (preg_match($regex, Input::get('addNeedleName')) && preg_match($regexDesc, Input::get('addNeedleDesc')) && preg_match($regexSize, Input::get('addNeedleSize'))) {
				$validInput = TRUE;
			}else $validInput = FALSE;
		}else $validInput = FALSE;


		foreach($needles as $needle)
			if(strcasecmp($needle->strMaterialNeedleName, trim(Input::get('addNeedleName'))) == 0 && 
				strcasecmp($needle->strMaterialNeedleSize, trim(Input::get('addNeedleSize'))) == 0)
					$isAdded = TRUE;

		if($validInput){
			if(!$isAdded){
				if($file == '' || $file == null){
					$needle = MaterialNeedle::create(array(
						'strMaterialNeedleID' => Input::get('addNeedleID'),
						'strMaterialNeedleName' => trim(Input::get('addNeedleName')),
						'strMaterialNeedleSize' => trim(Input::get('addNeedleSize')),
						'strMaterialNeedleDesc' => trim(Input::get('addNeedleDesc')),
						'boolIsActive' => 1
						));
				}else{
					$extension = Input::file('addImg')->getClientOriginalExtension();
					$fileName = $file;
					Input::file('addImg')->move($destinationPath, $fileName);

					$needle = MaterialNeedle::create(array(
						'strMaterialNeedleID' => Input::get('addNeedleID'),
						'strMaterialNeedleName' => trim(Input::get('addNeedleName')),
						'strMaterialNeedleSize' => trim(Input::get('addNeedleSize')),
						'strMaterialNeedleDesc' => trim(Input::get('addNeedleDesc')),
						'strMaterialNeedleImage' => 'imgMaterialNeedles/'.$fileName,
						'boolIsActive' => 1
						));
				}
				$needle ->save();
				return Redirect::to('/maintenance/fabricAndMaterialsMaterials?needle=true&success=true');
			}return Redirect::to('/maintenance/fabricAndMaterialsMaterials?needle=true&success=duplicate');
		}else return Redirect::to('/maintenance/fabricAndMaterialsMaterials?needle=true&input=invalid');
	}

	public function editNeedle()
	{
		$id = Input::get('editNeedleID');
		$needle= MaterialNeedle::find($id);

		$needles = MaterialNeedle::get();
		$isAdded = FALSE;
		$validInput = TRUE;

		$regex = "/^[a-zA-Z\s\-\']+$/";
		$regexDesc = "/^[a-zA-Z0-9\s\-\'\.\,]+$/";
		$regexSize = "/^[a-zA-Z0-9\s]+$/";
		
		if(!trim(Input::get('editNeedleName')) == '' && !trim(Input::get('editNeedleDesc')) == '' && !trim(Input::get('editNeedleSize')) == ''){
			$validInput = TRUE;
			if (preg_match($regex, Input::get('editNeedleName')) && preg_match($regexDesc, Input::get('editNeedleDesc')) && preg_match($regexSize, Input::get('editNeedleSize'))) {
				$validInput = TRUE;
			}else $validInput = FALSE;
		}else $validInput = FALSE;


		foreach($needles as $needlee)
			if(!strcasecmp($needlee->strMaterialNeedleID, Input::get('editNeedleID')) == 0 &&
				strcasecmp($needlee->strMaterialNeedleName, trim(Input::get('editNeedleName'))) == 0 && 
				strcasecmp($needlee->strMaterialNeedleSize, trim(Input::get('editNeedleSize'))) == 0 &&
				strcasecmp($needlee->strMaterialNeedleDesc, trim(Input::get('editNeedleDesc'))) == 0)
					$isAdded = TRUE;

		if($validInput){
			if(!$isAdded){
				if(Input::get('editNeedleImage') == $needle->strMaterialNeedleImage){
					$needle->strMaterialNeedleName = trim(Input::get('editNeedleName'));
					$needle->strMaterialNeedleSize = trim(Input::get('editNeedleSize'));
					$needle->strMaterialNeedleDesc = trim(Input::get('editNeedleDesc'));
				}else{
					$file = Input::get('editNeedleImage');
					$destinationPath = 'public/imgMaterialNeedles';
					$extension = Input::file('editImg')->getClientOriginalExtension();
					$fileName = $file;
					Input::file('editImg')->move($destinationPath, $fileName);

					$needle->strMaterialNeedleName = trim(Input::get('editNeedleName'));
					$needle->strMaterialNeedleSize = trim(Input::get('editNeedleSize'));
					$needle->strMaterialNeedleDesc = trim(Input::get('editNeedleDesc'));
					$needle->strMaterialNeedleImage = 'imgMaterialNeedles/'.$fileName;
				}
				$needle->save();
				return Redirect::to('/maintenance/fabricAndMaterialsMaterials?needle=true&successEdit=true');
			}return Redirect::to('/maintenance/fabricAndMaterialsMaterials?needle=true&successEdit=duplicate');
		}else return Redirect::to('/maintenance/fabricAndMaterialsMaterials?needle=true&input=invalid');
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
		return Redirect::to('/maintenance/fabricAndMaterialsMaterials?needle=true&successDel=true');
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
		return Redirect::to('/utilities/inactiveData?successRec=true&successRec=true');
	}

		///////////BUTTON////////////
	public function addButton()
	{	
		$file = Input::get('addImage');
		$destinationPath = 'public/imgMaterialButtons';

		$buttons = MaterialButton::get();
		$isAdded = FALSE;
		$validInput = TRUE;

		$regex = "/^[a-zA-Z\s\-\']+$/";
		$regexDesc = "/^[a-zA-Z0-9\s\-\'\.\,]+$/";
		$regexSize = "/^[a-zA-Z0-9\s]+$/";
		
		if(!trim(Input::get('addButtonName')) == '' && !trim(Input::get('addButtonDesc')) == '' && !trim(Input::get('addButtonColor')) == '' || !trim(Input::get('addButtonSize')) == ''){
			$validInput = TRUE;
			if (preg_match($regex, Input::get('addButtonName')) && preg_match($regexDesc, Input::get('addButtonDesc')) && preg_match($regex, Input::get('addButtonColor')) && preg_match($regexSize, Input::get('addButtonSize'))) {
				$validInput = TRUE;
			}else $validInput = FALSE;
		}else $validInput = FALSE;


		foreach($buttons as $button)
			if(strcasecmp($button->strMaterialButtonName, trim(Input::get('addButtonName'))) == 0 && 
				strcasecmp($button->strMaterialButtonSize, trim(Input::get('addButtonSize'))) == 0 &&
				strcasecmp($button->strMaterialButtonColor, trim(Input::get('addButtonColor'))) == 0)
					$isAdded = TRUE;

		if($validInput){
			if(!$isAdded){
				if($file == '' || $file == null){
					$button = MaterialButton::create(array(
					'strMaterialButtonID' => Input::get('addButtonID'),
					'strMaterialButtonName' => trim(Input::get('addButtonName')),
					'strMaterialButtonSize' => trim(Input::get('addButtonSize')),
					'strMaterialButtonColor' => trim(Input::get('addButtonColor')),
					'strMaterialButtonDesc' => trim(Input::get('addButtonDesc')),
					'boolIsActive' => 1
					));
				}else{
					$extension = Input::file('addImg')->getClientOriginalExtension();
					$fileName = $file;
					Input::file('addImg')->move($destinationPath, $fileName);

					$button = MaterialButton::create(array(
						'strMaterialButtonID' => Input::get('addButtonID'),
						'strMaterialButtonName' => trim(Input::get('addButtonName')),
						'strMaterialButtonSize' => trim(Input::get('addButtonSize')),
						'strMaterialButtonColor' => trim(Input::get('addButtonColor')),
						'strMaterialButtonDesc' => trim(Input::get('addButtonDesc')),
						'strMaterialButtonImage' => 'imgMaterialButtons/'.$fileName,
						'boolIsActive' => 1
						));
				}
				$button ->save();
				return Redirect::to('/maintenance/fabricAndMaterialsMaterials?button=true&success=true');
			}else return Redirect::to('/maintenance/fabricAndMaterialsMaterials?button=true&success=false');
		}else return Redirect::to('/maintenance/fabricAndMaterialsMaterials?button=true&input=invalid');
	}

	public function editButton()
	{
		$id = Input::get('editButtonID');
		$button= MaterialButton::find($id);

		$buttons = MaterialButton::get();
		$isAdded = FALSE;
		$validInput = TRUE;

		$regex = "/^[a-zA-Z\s\-\']+$/";
		$regexDesc = "/^[a-zA-Z0-9\s\-\'\.\,]+$/";
		$regexSize = "/^[a-zA-Z0-9\s]+$/";
		$regexColor = "/^[a-zA-Z\s\,]+$/";
		
		if(!trim(Input::get('editButtonName')) == '' && !trim(Input::get('editButtonDesc')) == '' && !trim(Input::get('editButtonColor')) == '' || !trim(Input::get('editButtonSize')) == ''){
			$validInput = TRUE;
			if (preg_match($regex, Input::get('editButtonName')) && preg_match($regexDesc, Input::get('editButtonDesc')) && preg_match($regexColor, Input::get('editButtonColor')) && preg_match($regexSize, Input::get('editButtonSize'))) {
				$validInput = TRUE;
			}else $validInput = FALSE;
				
		}else $validInput = FALSE;

		foreach($buttons as $buttonn)
			if(!strcasecmp($buttonn->strMaterialButtonID, Input::get('editButtonID')) == 0 && 
				strcasecmp($buttonn->strMaterialButtonName, trim(Input::get('editButtonName'))) == 0 && 
				strcasecmp($buttonn->strMaterialButtonSize, trim(Input::get('editButtonSize'))) == 0 &&
				strcasecmp($buttonn->strMaterialButtonColor, trim(Input::get('editButtonColor'))) == 0 &&
				strcasecmp($buttonn->strMaterialButtonDesc, trim(Input::get('editButtonDesc'))) == 0)
					$isAdded = TRUE;

		if($validInput){
			if(!$isAdded){
				if(Input::get('editButtonImage') == $button->strMaterialButtonImage){
					$button->strMaterialButtonName = trim(Input::get('editButtonName'));
					$button->strMaterialButtonSize = trim(Input::get('editButtonSize'));
					$button->strMaterialButtonColor = trim(Input::get('editButtonColor'));
					$button->strMaterialButtonDesc = trim(Input::get('editButtonDesc'));
				}else{
					$file = Input::get('editButtonImage');
					$destinationPath = 'public/imgMaterialButtons';
					$extension = Input::file('editImg')->getClientOriginalExtension();
					$fileName = $file;
					Input::file('editImg')->move($destinationPath, $fileName);

					$button->strMaterialButtonName = trim(Input::get('editButtonName'));
					$button->strMaterialButtonSize = trim(Input::get('editButtonSize'));
					$button->strMaterialButtonColor = trim(Input::get('editButtonColor'));
					$button->strMaterialButtonDesc = trim(Input::get('editButtonDesc'));
					$button->strMaterialButtonImage = 'imgMaterialButtons/'.$fileName; 
				}
				$button->save();
				return Redirect::to('/maintenance/fabricAndMaterialsMaterials?button=true&successEdit=true');
			}else return Redirect::to('/maintenance/fabricAndMaterialsMaterials?button=true&successEdit=duplicate');
		}else return Redirect::to('/maintenance/fabricAndMaterialsMaterials?button=true&input=invalid');
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
		return Redirect::to('/maintenance/fabricAndMaterialsMaterials?button=true&successDel=true');
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
		return Redirect::to('/utilities/inactiveData?successRec=true&successRec=true');
	}

		///////////ZIPPER////////////
	public function addZipper()
	{	
		$file = Input::get('addImage');
		$destinationPath = 'public/imgMaterialZippers';

		$zippers = MaterialZipper::get();
		$isAdded = FALSE;
		$validInput = TRUE;

		$regex = "/^[a-zA-Z\s\-\']+$/";
		$regexDesc = "/^[a-zA-Z\s\-\'\.\,]+$/";
		$regexSize = "/^[a-zA-Z0-9\s]+$/";
		
		
		if(!trim(Input::get('addZipperName')) == '' && !trim(Input::get('addZipperSize')) == '' && !trim(Input::get('addZipperColor')) == '' || !trim(Input::get('addZipperDesc')) == ''){
			$validInput = TRUE;
			if (preg_match($regex, Input::get('addZipperName')) && preg_match($regexDesc, Input::get('addZipperSize')) && preg_match($regex, Input::get('addZipperColor')) && preg_match($regexDesc, Input::get('addZipperDesc'))) {
				$validInput = TRUE;
			}else $validInput = FALSE;
		}else $validInput = FALSE;


		foreach($zippers as $zipper)
			if(strcasecmp($zipper->strMaterialZipperName, trim(Input::get('addZipperName'))) == 0 && 
				strcasecmp($zipper->strMaterialZipperSize, trim(Input::get('addZipperSize'))) == 0 &&
				strcasecmp($zipper->strMaterialZipperColor, trim(Input::get('addZipperColor'))) == 0)
					$isAdded = TRUE;

		if($validInput){
			if(!$isAdded){
				if($file == '' || $file == null){
					$zipper = MaterialZipper::create(array(
					'strMaterialZipperID' => Input::get('addZipperID'),
					'strMaterialZipperName' => trim(Input::get('addZipperName')),
					'strMaterialZipperSize' => trim(Input::get('addZipperSize')),
					'strMaterialZipperColor' => trim(Input::get('addZipperColor')),
					'strMaterialZipperDesc' => trim(Input::get('addZipperDesc')),
					'boolIsActive' => 1
					));
				}else{
					$extension = Input::file('addImg')->getClientOriginalExtension();
					$fileName = $file;
					Input::file('addImg')->move($destinationPath, $fileName);

					$zipper = MaterialZipper::create(array(
						'strMaterialZipperID' => Input::get('addZipperID'),
						'strMaterialZipperName' => trim(Input::get('addZipperName')),
						'strMaterialZipperSize' => trim(Input::get('addZipperSize')),
						'strMaterialZipperColor' => trim(Input::get('addZipperColor')),
						'strMaterialZipperDesc' => trim(Input::get('addZipperDesc')),
						'strMaterialZipperImage' => 'imgMaterialZippers/'.$fileName,
						'boolIsActive' => 1
						));
					}
				$zipper ->save();
				return Redirect::to('/maintenance/fabricAndMaterialsMaterials?zipper=true&success=true');
			}else return Redirect::to('/maintenance/fabricAndMaterialsMaterials?zipper=true&success=false');
		}else return Redirect::to('/maintenance/fabricAndMaterialsMaterials?zipper=true&input=invalid');
	}

	public function editZipper()
	{
		$id = Input::get('editZipperID');
		$zipper= MaterialZipper::find($id);

		$zippers = MaterialZipper::get();
		$isAdded = FALSE;
		$validInput = TRUE;

		$regex = "/^[a-zA-Z\s\-\']+$/";
		$regexDesc = "/^[a-zA-Z0-9\s\-\'\.\,]+$/";
		$regexSize = "/^[a-zA-Z0-9\s]+$/";
		$regexColor = "/^[a-zA-Z\s\,]+$";

		if(!trim(Input::get('editZipperName')) == '' && !trim(Input::get('editZipperSize')) == '' && !trim(Input::get('editZipperColor')) == '' || !trim(Input::get('editZipperDesc')) == ''){
			$validInput = TRUE;
			if (preg_match($regex, Input::get('editZipperName')) && preg_match($regexSize, Input::get('editZipperSize')) && preg_match($regexColor, Input::get('editZipperColor')) && preg_match($regexDesc, Input::get('editZipperDesc'))) {
				$validInput = TRUE;
			}else $validInput = FALSE;
		}else $validInput = FALSE;


		foreach($zippers as $zipperr)
			if(!strcasecmp($zipperr->strMaterialZipperID, Input::get('editZipperID')) == 0 &&
				strcasecmp($zipperr->strMaterialZipperName, trim(Input::get('editZipperName'))) == 0 && 
				strcasecmp($zipperr->strMaterialZipperSize, trim(Input::get('editZipperSize'))) == 0 &&
				strcasecmp($zipperr->strMaterialZipperColor, trim(Input::get('editZipperColor'))) == 0 &&
				strcasecmp($zipperr->strMaterialZipperDesc, trim(Input::get('editZipperDesc'))) == 0)
					$isAdded = TRUE;

		if($validInput){
			if(!$isAdded){
				if (Input::get('editZipperImage') == $zipper->strMaterialZipperImage) {
					$zipper->strMaterialZipperName = trim(Input::get('editZipperName'));
					$zipper->strMaterialZipperSize = trim(Input::get('editZipperSize'));
					$zipper->strMaterialZipperColor = trim(Input::get('editZipperColor'));
					$zipper->strMaterialZipperDesc = trim(Input::get('editZipperDesc'));
				} else {
					$file = Input::get('editZipperImage');
					$destinationPath = 'public/imgMaterialZippers';
					$extension = Input::file('editImg')->getClientOriginalExtension();
					$fileName = $file;
					Input::file('editImg')->move($destinationPath, $fileName);

					$zipper->strMaterialZipperName = trim(Input::get('editZipperName'));
					$zipper->strMaterialZipperSize = trim(Input::get('editZipperSize'));
					$zipper->strMaterialZipperColor =trim(Input::get('editZipperColor'));
					$zipper->strMaterialZipperDesc = trim(Input::get('editZipperDesc'));
					$zipper->strMaterialZipperImage = 'imgMaterialZippers/'.$fileName;
				}	
				$zipper->save();
				return Redirect::to('/maintenance/fabricAndMaterialsMaterials?zipper=true&successEdit=true');
			}else return Redirect::to('/maintenance/fabricAndMaterialsMaterials?zipper=true&success=duplicate');
		}else return Redirect::to('/maintenance/fabricAndMaterialsMaterials?zipper=true&input=invalid');
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
		return Redirect::to('/maintenance/fabricAndMaterialsMaterials?zipper=true&successDel=true');
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
		return Redirect::to('/utilities/inactiveData?successRec=true&successRec=true');
	}

		///////////HOOK AND EYE////////////
	public function addHook()
	{	
		$file = Input::get('addImage');
		$destinationPath = 'public/imgMaterialHooks';

		$hooks = MaterialHookAndEye::get();
		$isAdded = FALSE;
		$validInput = TRUE;

		$regex = "/^[a-zA-Z\s\-\']+$/";
		$regexDesc = "/^[a-zA-Z\s\-\'\.\,]+$/";
		$regexSize = "/^[a-zA-Z0-9\s]+$/";
		$regexColor = "/^[a-zA-Z\s\,]+$";
		
		if(!trim(Input::get('addHookName')) == '' && !trim(Input::get('addHookSize')) == '' && !trim(Input::get('addHookColor')) == '' || !trim(Input::get('addHookDesc')) == ''){
			$validInput = TRUE;
			if (preg_match($regex, Input::get('addHookName')) && preg_match($regexSize, Input::get('addHookSize')) && preg_match($regexColor, Input::get('addHookColor')) && preg_match($regexDesc, Input::get('addHookDesc'))) {
				$validInput = TRUE;
			}else $validInput = FALSE;
		}else $validInput = FALSE;


		foreach($hooks as $hook)
			if(strcasecmp($hook->strMaterialHookName, trim(Input::get('addHookName'))) == 0 && 
				strcasecmp($hook->strMaterialHookSize, trim(Input::get('addHookSize'))) == 0 &&
				strcasecmp($hook->strMaterialHookColor, trim(Input::get('addHookColor'))) == 0)
					$isAdded = TRUE;

		if($validInput){
			if(!$isAdded){
				if($file == '' || $file == null){
					$hook = MaterialHookAndEye::create(array(
					'strMaterialHookID' => Input::get('addHookID'),
					'strMaterialHookName' => trim(Input::get('addHookName')),
					'strMaterialHookSize' => trim(Input::get('addHookSize')),
					'strMaterialHookColor' => trim(Input::get('addHookColor')),
					'strMaterialHookDesc' => trim(Input::get('addHookDesc')),
					'boolIsActive' => 1
					));
				}else{
					$extension = Input::file('addImg')->getClientOriginalExtension();
					$fileName = $file;
					Input::file('addImg')->move($destinationPath, $fileName);

					$hook = MaterialHookAndEye::create(array(
						'strMaterialHookID' => Input::get('addHookID'),
						'strMaterialHookName' => trim(Input::get('addHookName')),
						'strMaterialHookSize' => trim(Input::get('addHookSize')),
						'strMaterialHookColor' => trim(Input::get('addHookColor')),
						'strMaterialHookDesc' => trim(Input::get('addHookDesc')),
						'strMaterialHookImage' => 'imgMaterialHooks/'.$fileName,
						'boolIsActive' => 1
						));
				}
				$hook ->save();
				return Redirect::to('/maintenance/fabricAndMaterialsMaterials?hook=true&success=true');
			}else return Redirect::to('/maintenance/fabricAndMaterialsMaterials?hook=true&success=duplicate');
		}else return Redirect::to('/maintenance/fabricAndMaterialsMaterials?hook=true&input=invalid');
	}

	public function editHook()
	{
		$id = Input::get('editHookID');
		$hook = MaterialHookAndEye::find($id);

		$hooks = MaterialHookAndEye::get();
		$isAdded = FALSE;
		$validInput = TRUE;

		$regex = "/^[a-zA-Z\s\-\']+$/";
		$regexDesc = "/^[a-zA-Z\s\-\'\.\,]+$/";
		$regexSize = "/^[a-zA-Z0-9\s]+$/";
		$regexColor = "/^[a-zA-Z\s\,]+$";

		if(!trim(Input::get('editHookName')) == '' && !trim(Input::get('editHookSize')) == '' && !trim(Input::get('editHookColor')) == '' || !trim(Input::get('editHookDesc')) == ''){
			$validInput = TRUE;
			if (preg_match($regex, Input::get('editHookName')) && preg_match($regexSize, Input::get('editHookSize')) && preg_match($regexColor, Input::get('editHookColor')) && preg_match($regexDesc, Input::get('editHookDesc'))) {
				$validInput = TRUE;
			}else $validInput = FALSE;
		}else $validInput = FALSE;


		foreach($hooks as $hookk)
			if(!strcasecmp($hookk->strMaterialHookID, Input::get('editHookID')) == 0 &&
				strcasecmp($hookk->strMaterialHookName, trim(Input::get('editHookName'))) == 0 && 
				strcasecmp($hookk->strMaterialHookSize, trim(Input::get('editHookSize'))) == 0 &&
				strcasecmp($hookk->strMaterialHookColor, trim(Input::get('editHookColor'))) == 0 &&
				strcasecmp($hookk->strMaterialHookDesc, trim(Input::get('editHookDesc'))) == 0)
					$isAdded = TRUE;

		if($validInput){
			if(!$isAdded){
				if (Input::get('editHookImage') == $hook->strMaterialHookImage) {
					$hook->strMaterialHookName = trim(Input::get('editHookName'));
					$hook->strMaterialHookSize = trim(Input::get('editHookSize'));
					$hook->strMaterialHookColor = trim(Input::get('editHookColor'));
					$hook->strMaterialHookDesc = trim(Input::get('editHookDesc'));
				} else {
					$file = Input::get('editHookImage');
					$destinationPath = 'public/imgMaterialHooks';
					$extension = Input::file('editImg')->getClientOriginalExtension();
					$fileName = $file;
					Input::file('editImg')->move($destinationPath, $fileName);

					$hook->strMaterialHookName = trim(Input::get('editHookName'));
					$hook->strMaterialHookSize = trim(Input::get('editHookSize'));
					$hook->strMaterialHookColor = trim(Input::get('editHookColor'));
					$hook->strMaterialHookDesc = trim(Input::get('editHookDesc'));
					$hook->strMaterialHookImage = 'imgMaterialHooks/'.$fileName;
				}
				$hook->save();
				return Redirect::to('/maintenance/fabricAndMaterialsMaterials?hook=true&successEdit=true');
			}else return Redirect::to('/maintenance/fabricAndMaterialsMaterials?hook=true&success=duplicate');
		}else return Redirect::to('/maintenance/fabricAndMaterialsMaterials?hook=true&input=invalid');
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
		return Redirect::to('/maintenance/fabricAndMaterialsMaterials?hook=true&success=true');
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
		return Redirect::to('/utilities/inactiveData?successRec=true&successRec=true');
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