@extends('layouts.master')

@section('content')
	

	<a style="color:black; align= left;" class="btn btn-large center-text light-green accent-1" href="{{URL::to('transaction/walk')}}">Customer Type</a>

	<div class = "main-wrapper">	
		<div class="row">
	      <div class="col s12 m12 l12">
	      	<span class="page-title"><h4>Measurement</h4></span>
	      </div>
    	</div>
  	</div>

  	<div class="row">
      	<div class="col s12 m12 l12">
	        <div class="card-panel">
	          	<div class="card-content">
					<div class="row">
				      	<div class="col s12 m12 l12">
					        <div class="card-panel">
					          	<div class="card-content">
					          		<h5>Long Sleeve</h5> 
					          		<div class = "row">
					          			<div class = "input-field col s3">
					          				<input id="longNeck" name = "longNeck" type="text">
		                  					<label for="longNeck"> Neck:</label>
					          			</div>
					          			<div class = "input-field col s3">
					          				<input id="longBust" name = "longBust" type="text">
		                  					<label for="longBust"> Bust:</label>
					          			</div>
					          			<div class = "input-field col s3">
					          				<input id="longHips" name = "longHips" type="text">
		                  					<label for="longHips"> Hips: </label>
					          			</div>
					          			<div class = "input-field col s3">
					          				<input id="longShoulder" name = "longShoulder" type="text">
		                  					<label for="longShoulder"> Shoulder:</label>
					          			</div>	
					          			<div class = "input-field col s3">
					          				<input id="longLength" name = "longLength" type="text">
		                  					<label for="longLength"> Length:</label>
					          			</div>
					          			<div class = "input-field col s3">
					          				<input id="longWaist" name = "longWaist" type="text">
		                  					<label for="longWaist"> Waist: </label>
					          			</div>
					          			<div class = "input-field col s3">
					          				<input id="longSleeve" name = "longSleeve" type="text">
		                  					<label for="longSleeve"> Sleeve: </label>
					          			</div>	
					          			<div class = "input-field col s3">
					          				<input id="longArmhole" name = "longArmhole" type="text">
		                  					<label for="longArmhole"> Arm Hole: </label>
					          			</div>	
					          			<div class = "input-field col s3">
					          				<input id="longCircu" name = "longCircu" type="text">
		                  					<label for="longCircu"> Circumference: </label>
					          			</div>								
					          		</div>
					          	</div>
					        </diV>
					    </div>
					</div>

					<div class="row">
				      	<div class="col s12 m12 l12">
					        <div class="card-panel">
					          	<div class="card-content">
					          		<h5>Polo</h5>
					          		<div class = "row">
					          			<div class = "input-field col s3">
					          				<input id="poloNeck" name = "poloNeck" type="text">
		                  					<label for="poloNeck"> Neck:</label>
					          			</div>
					          			<div class = "input-field col s3">
					          				<input id="poloBust" name = "poloBust" type="text">
		                  					<label for="poloBust"> Bust:</label>
					          			</div>
					          			<div class = "input-field col s3">
					          				<input id="poloHips" name = "poloHips" type="text">
		                  					<label for="poloHips"> Hips: </label>
					          			</div>
					          			<div class = "input-field col s3">
					          				<input id="poloShoulder" name = "poloShoulder" type="text">
		                  					<label for="poloShoulder"> Shoulder:</label>
					          			</div>	
					          			<div class = "input-field col s3">
					          				<input id="poloLength" name = "poloLength" type="text">
		                  					<label for="poloLength"> Length:</label>
					          			</div>
					          			<div class = "input-field col s3">
					          				<input id="poloWaist" name = "poloWaist" type="text">
		                  					<label for="poloWaist"> Waist: </label>
					          			</div>
					          			<div class = "input-field col s3">
					          				<input id="poloSleeve" name = "poloSleeve" type="text">
		                  					<label for="poloSleeve"> Sleeve: </label>
					          			</div>	
					          			<div class = "input-field col s3">
					          				<input id="poloArmhole" name = "poloArmhole" type="text">
		                  					<label for="poloArmhole"> Arm Hole: </label>
					          			</div>	
					          			<div class = "input-field col s3">
					          				<input id="poloCircu" name = "poloCircu" type="text">
		                  					<label for="poloCircu"> Circumference: </label>
					          			</div>
					          	</div>
					        </div>
					    </div>
					</div> 

					<div class="row">
				      	<div class="col s12 m12 l12">
					        <div class="card-panel">
					          	<div class="card-content">
					          		<h5>Coat</h5>
					          		<div class = "row">
					          			<div class = "input-field col s3">
					          				<input id="coatNeck" name = "coatNeck" type="text">
		                  					<label for="coatNeck"> Neck:</label>
					          			</div>
					          			<div class = "input-field col s3">
					          				<input id="coatBust" name = "coatBust" type="text">
		                  					<label for="coatBust"> Bust:</label>
					          			</div>
					          			<div class = "input-field col s3">
					          				<input id="coatHips" name = "coatHips" type="text">
		                  					<label for="coatHips"> Hips: </label>
					          			</div>
					          			<div class = "input-field col s3">
					          				<input id="coatShoulder" name = "coatShoulder" type="text">
		                  					<label for="coatShoulder"> Shoulder:</label>
					          			</div>	
					          			<div class = "input-field col s3">
					          				<input id="coatLength" name = "coatLength" type="text">
		                  					<label for="coatLength"> Length:</label>
					          			</div>
					          			<div class = "input-field col s3">
					          				<input id="coatWaist" name = "coatWaist" type="text">
		                  					<label for="coatWaist"> Waist: </label>
					          			</div>
					          			<div class = "input-field col s3">
					          				<input id="coatSleeve" name = "coatSleeve" type="text">
		                  					<label for="coatSleeve"> Sleeve: </label>
					          			</div>	
					          			<div class = "input-field col s3">
					          				<input id="coatArmhole" name = "coatArmhole" type="text">
		                  					<label for="coatArmhole"> Arm Hole: </label>
					          			</div>	
					          			<div class = "input-field col s3">
					          				<input id="coatCircu" name = "coatCircu" type="text">
		                  					<label for="coatCircu"> Circumference: </label>
					          			</div>
					          	</div>
					        </div>
					    </div>
					</div>  

					<div class="row">
				      	<div class="col s12 m12 l12">
					        <div class="card-panel">
					          	<div class="card-content">
					          		<h5>Blazer</h5>
					          		<div class = "row">
										<div class = "input-field col s3">
					          				<input id="blazerShoulder" name = "blazerShoulder" type="text">
		                  					<label for="blazerShoulder"> Shoulder:</label>
					          			</div>
					          			<div class = "input-field col s3">
					          				<input id="blazerFrontFig" name = "blazerFrontFig" type="text">
		                  					<label for="blazerFrontFig"> Front Figure:</label>
					          			</div>
					          			<div class = "input-field col s3">
					          				<input id="blazerBackFig" name = "blazerBackFig" type="text">
		                  					<label for="blazerFig"> Back Figure: </label>
					          			</div>
					          			<div class = "input-field col s3">
					          				<input id="blazerSleeve" name = "blazerSleeve" type="text">
		                  					<label for="blazerSleeve"> Sleeve:</label>
					          			</div>
					          			<div class = "input-field col s3">
					          				<input id="blazerCuff" name = "blazerCuff" type="text">
		                  					<label for="blazerCuff"> Cuff:</label>
					          			</div>
					          			<div class = "input-field col s3">
					          				<input id="blazerNeck" name = "blazerNeck" type="text">
		                  					<label for="blazerNeck"> Neck:</label>
					          			</div>
					          			<div class = "input-field col s3">
					          				<input id="blazerLength" name = "blazerLength" type="text">
		                  					<label for="blazerLength"> Length:</label>
					          			</div>
					          			<div class = "input-field col s3">
					          				<input id="blazerBustLine" name = "blazerBustLine" type="text">
		                  					<label for="blazerBustLine">Bust Line:</label>
					          			</div>
					          			<div class = "input-field col s3">
					          				<input id="blazerBustPoint" name = "blazerBustPoint" type="text">
		                  					<label for="blazerBustPoint">Bust Point:</label>
					          			</div>
					          			<div class = "input-field col s3">
					          				<input id="blazerBustDistance" name = "blazerBustDistance" type="text">
		                  					<label for="blazerBustDistance">Bust Distance:</label>
					          			</div>
					          			<div class = "input-field col s3">
					          				<input id="blazerFrontChest" name = "blazerFrontChest" type="text">
		                  					<label for="blazerFrontChest"> Front Chest:</label>
					          			</div>
					          			<div class = "input-field col s3">
					          				<input id="blazerBackChest" name = "blazerBackChest" type="text">
		                  					<label for="blazerBackChest"> Back Chest: </label>
					          			</div>
					          			<div class = "input-field col s3">
					          				<input id="blazerArmhole" name = "blazerArmhole" type="text">
		                  					<label for="blazerArmhole"> Armhole:</label>
					          			</div>
					          			<div class = "input-field col s3">
					          				<input id="blazerCircu" name = "blazerCircu" type="text">
		                  					<label for="blazerCircu"> Circumference:</label>
					          			</div>
					          		</div>			
					          	</div>
					        </div>
					    </div>
					</div>

					<div class="row">
				      	<div class="col s12 m12 l12">
					        <div class="card-panel">
					          	<div class="card-content">
					          		<h5>Blouse</h5>
					          		<div class = "row">
										<div class = "input-field col s3">
					          				<input id="blouseShoulder" name = "blouseShoulder" type="text">
		                  					<label for="blouseShoulder"> Shoulder:</label>
					          			</div>
					          			<div class = "input-field col s3">
					          				<input id="blouseFrontFig" name = "blouseFrontFig" type="text">
		                  					<label for="blouseFrontFig"> Front Figure:</label>
					          			</div>
					          			<div class = "input-field col s3">
					          				<input id="blouseBackFig" name = "blouseBackFig" type="text">
		                  					<label for="blouseFig"> Back Figure: </label>
					          			</div>
					          			<div class = "input-field col s3">
					          				<input id="blouseSleeve" name = "blouseSleeve" type="text">
		                  					<label for="blouseSleeve"> Sleeve:</label>
					          			</div>
					          			<div class = "input-field col s3">
					          				<input id="blouseCuff" name = "blouseCuff" type="text">
		                  					<label for="blouseCuff"> Cuff:</label>
					          			</div>
					          			<div class = "input-field col s3">
					          				<input id="blouseNeck" name = "blouseNeck" type="text">
		                  					<label for="blouseNeck"> Neck:</label>
					          			</div>
					          			<div class = "input-field col s3">
					          				<input id="blouseLength" name = "blouseLength" type="text">
		                  					<label for="blouseLength"> Length:</label>
					          			</div>
					          			<div class = "input-field col s3">
					          				<input id="blouseBustLine" name = "blouseBustLine" type="text">
		                  					<label for="blouseBustLine">Bust Line:</label>
					          			</div>
					          			<div class = "input-field col s3">
					          				<input id="blouseBustPoint" name = "blouseBustPoint" type="text">
		                  					<label for="blouseBustPoint">Bust Point:</label>
					          			</div>
					          			<div class = "input-field col s3">
					          				<input id="blouseBustDistance" name = "blouseBustDistance" type="text">
		                  					<label for="blouseBustDistance">Bust Distance:</label>
					          			</div>
					          			<div class = "input-field col s3">
					          				<input id="blouseFrontChest" name = "blouseFrontChest" type="text">
		                  					<label for="blouseFrontChest"> Front Chest:</label>
					          			</div>
					          			<div class = "input-field col s3">
					          				<input id="blouseBackChest" name = "blouseBackChest" type="text">
		                  					<label for="blouseBackChest"> Back Chest: </label>
					          			</div>
					          			<div class = "input-field col s3">
					          				<input id="blouseArmhole" name = "blouseArmhole" type="text">
		                  					<label for="blouseArmhole"> Armhole:</label>
					          			</div>
					          			<div class = "input-field col s3">
					          				<input id="blouseCircu" name = "blouseCircu" type="text">
		                  					<label for="blouseCircu"> Circumference:</label>
					          			</div>
					          		</div>			
					          	</div>
					        </div>
					    </div>
					</div>

					<div class="row">
				      	<div class="col s12 m12 l12">
					        <div class="card-panel">
					          	<div class="card-content">
					          		<h5>Pants</h5>
					          		<div class = "row">
										<div class = "input-field col s3">
					          				<input id="pantsWaistLine" name = "pantsWaistLine" type="text">
		                  					<label for="pantsWaistLine"> Waist line:</label>
					          			</div>
					          			<div class = "input-field col s3">
					          				<input id="pantsWaistHipster" name = "pantsWaistHipster" type="text">
		                  					<label for="pantsWaistHipster"> Waist (Hipster):</label>
					          			</div>
					          			<div class = "input-field col s3">
					          				<input id="pantsCrotch" name = "pantsCrotch" type="text">
		                  					<label for="pantsCrotch"> Crotch: </label>
					          			</div>
					          			<div class = "input-field col s3">
					          				<input id="pantsThigh" name = "pantsThigh" type="text">
		                  					<label for="pantsThigh"> Thigh: </label>
					          			</div>
					          			<div class = "input-field col s3">
					          				<input id="pantsKnee" name = "pantsKnee" type="text">
		                  					<label for="pantsKnee"> Thigh: </label>
					          			</div>
					          			<div class = "input-field col s3">
					          				<input id="pantsBottom" name = "pantsBottom" type="text">
		                  					<label for="pantsBottom"> Bottom: </label>
					          			</div>
					          			<div class = "input-field col s3">
					          				<input id="pantsLength" name = "pantsLength" type="text">
		                  					<label for="pantsLength"> Length: </label>
					          			</div>
					          		</div>			
					          	</div>
					        </div>
					    </div>
					</div>

					<div class="row">
				      	<div class="col s12 m12 l12">
					        <div class="card-panel">
					          	<div class="card-content">
					          		<h5>Skirt</h5>
					          		<div class = "row">
										<div class = "input-field col s3">
					          				<input id="skirtWaistLine" name = "skirtWaistLine" type="text">
		                  					<label for="skirtWaistLine"> Waist line:</label>
					          			</div>
					          			<div class = "input-field col s3">
					          				<input id="skirtWaistHipster" name = "skirtWaistHipster" type="text">
		                  					<label for="skirtWaistHipster"> Waist (Hipster):</label>
					          			</div>
					          			<div class = "input-field col s3">
					          				<input id="skirtCrotch" name = "skirtCrotch" type="text">
		                  					<label for="skirtCrotch"> Crotch: </label>
					          			</div>
					          			<div class = "input-field col s3">
					          				<input id="skirtLength" name = "skirtLength" type="text">
		                  					<label for="skirtLength"> Length: </label>
					          			</div>
					          			<div class = "input-field col s3">
					          				<input id="skirtcircu" name = "skirtCircu" type="text">
		                  					<label for="skirtCircu"> Circumference: </label>
					          			</div>
					          		</div>			
					          	</div>
					        </div>
					    </div>
					</div>

					<center><a style="color:black; align= left;" class="btn btn-large center-text light-green accent-1"  href="{{URL::to('transaction/adminBillingPayment')}}">Checkout</a></center>   	       	        	         	          		
				</div>
			</div>
		</div>
	</div>			
					  	
	   

@stop