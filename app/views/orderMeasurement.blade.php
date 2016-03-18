@extends('layouts.master')

@section('content')
	<style type="text/css">
		.disabledbutton {
    		pointer-events: none;
    		opacity: 0.4;
		}
	</style>

	<div class = "main-wrapper">	
		<div class="row">
	      <div class="col s12 m12 l12">
	      	<span class="page-title"><h4>Measurement</h4></span>
	      </div>
    	</div>
  	</div>

	
	<div class="row">
	    <div class="col s12 m12 l12" style="background:#80d8ff; opacity:0.75; margin-top:20px; margin-right:15px; margin-left:10px; padding:25px; border:2px outset white">

		<div class="col s6">
			<div class="input-field col s12" style="padding-left:200px">
				@foreach($customer as $cust)
			          <label for="cust_name" style="color:black"><font size="+0.95">CUSTOMER NAME:</font></label>
			          <input style="color:black" disabled id="cust_name" type="text" class="validate" value="{{$cust->strCustPrivLName}}, {{$cust->strCustPrivFName}} {{$cust->strCustPrivMName}}">
	  			@endforeach
	  		</div>
	  	</div>
		
		@foreach($garments as $garment)
		<!-- Hard-coded for now. Change the value into something dynamic (Found in the input tag). -->
		<div class="col s6">
			<div class="input-field col s12" style="padding-left:200px;">
			          <input style="color:black" disabled id="category_name" type="text" class="validate" value="{{$garment->strGarmentCategoryName}}"></input>
			          <label for="cust_name" style="color:black"><font size="+0.95">GARMENT CATEGORY:</font></label>
	  		</div>
	  	</div>

		<!-- Hard coded as well. Base this according to the garment category.-->
		<div class="col s6">
			<div class="input-field col s12" style="padding-left:200px">
				<input style="color:black" disabled id="segment_name" type="text" class="validate" value="{{$garment->strGarmentSegmentName}}"></input>
	  			<label style="color:black"><font size="+0.95">GARMENT SEGMENT:</font></label>
			</div>
		</div>
		@endforeach
		
	    <button class="btn btn-large center-text light-green accent-1" style="margin-left:750px; margin-top:50px; color:black">Submit Measurements</button>
	</div>
	</div>

	<!-- Womens's Uniform Blouse -->
	<div class="row">
      	<div class="col s12 m12 l12">
	        <div class="card-panel">
	          	<div class="card-content">
					<div class="row">
				      	<div class="col s12 m12 l12">
					        <div class="card-panel">
					          	<div class="card-content" id="blouse" name="blouse">
									<input type="hidden" value="{{Input::get('jobOrder')}}" id="joMeas" name="joMeas">


					          		<h5>Blouse</h5> 
					          		<div class = "row">
					          			<div class = "input-field col s3">
					          				<input id="bust" name = "bust" type="text">
		                  					<label for="bust"> Bust:</label>
					          			</div>
					          			<div class = "input-field col s3">
					          				<input id="waist" name = "waist" type="text">
		                  					<label for="waist"> Waist:</label>
					          			</div>
					          			<div class = "input-field col s3">
					          				<input id="sleeve" name = "sleeve" type="text">
		                  					<label for="sleeve"> Sleeve: </label>
					          			</div>
					          			<div class = "input-field col s3">
					          				<input id="hips" name = "hips" type="text">
		                  					<label for="hips"> Hips:</label>
					          			</div>	
					          			<div class = "input-field col s3">
					          				<input id="backWidth" name = "backWidth" type="text">
		                  					<label for="backWidth"> Back Width:</label>
					          			</div>
					          			<div class = "input-field col s3">
					          				<input id="backNeckToWaist" name = "backNeckToWaist" type="text">
		                  					<label for="backNeckToWaist"> Back Neck To Waist: </label>
					          			</div>
					          			<div class = "input-field col s3">
					          				<input id="shoulderToWaist" name = "shoulderToWaist" type="text">
		                  					<label for="shoulderToWaist"> Shoulder To Waist: </label>
					          			</div>							
					          		</div>
					          		
					          	</div>
					        </diV>
					    </div>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>

	<!--Women's Uniform Short -->
		<div class="row">
      	<div class="col s12 m12 l12">
	        <div class="card-panel">
	          	<div class="card-content">
					<div class="row">
				      	<div class="col s12 m12 l12">
					        <div class="card-panel">
					          	<div class="card-content" id="shorts" name="shorts">
					          		<h5>Short</h5> 
					          		<div class = "row">
					          			<div class = "input-field col s3">
					          				<input id="longHips" name = "longHips" type="text">
		                  					<label for="longHips"> Waist: </label>
					          			</div>
					          			<div class = "input-field col s3">
					          				<input id="longLength" name = "longLength" type="text">
		                  					<label for="longLength">Hips:</label>
					          			</div>
					          			<div class = "input-field col s3">
					          				<input id="longLength" name = "longLength" type="text">
		                  					<label for="longLength"> Length:</label>
					          			</div>
										<div class = "input-field col s3">
					          				<input id="longLength" name = "longLength" type="text">
		                  					<label for="longLength"> Inseam:</label>
					          			</div>							
					          		</div>
					          		
					          	</div>
					        </diV>
					    </div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

	<!-- Women's Uniform Ribbon -->
		<div class="row">
      	<div class="col s12 m12 l12">
	        <div class="card-panel">
	          	<div class="card-content">
					<div class="row">
				      	<div class="col s12 m12 l12">
					        <div class="card-panel">
					          	<div class="card-content" id="ribbon" name="ribbon">
					          		<h5>Ribbon</h5> 
					          		<div class = "row">
					          			<div class = "input-field col s3">
					          				<input id="longNeck" name = "longNeck" type="text">
		                  					<label for="longNeck"> Neck Circumference:</label>
					          			</div>							
					          		</div>
					          		
					          	</div>
					        </diV>
					    </div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
	
	<!-- Women's Uniforms -->
	<div class="row">
      	<div class="col s12 m12 l12">
	        <div class="card-panel">
	          	<div class="card-content">
					<div class="row">
				      	<div class="col s12 m12 l12">
					        <div class="card-panel">
					          	<div class="card-content" id="skirt" name="skirt">
					          		<h5>Skirt</h5> 
					          		<div class = "row">
					          			<div class = "input-field col s4">
					          				<input id="longNeck" name = "longNeck" type="text">
		                  					<label for="longNeck"> Waist:</label>
					          			</div>
					          			<div class = "input-field col s4">
					          				<input id="longBust" name = "longBust" type="text">
		                  					<label for="longBust"> Hips:</label>
					          			</div>
					          			<div class = "input-field col s4">
					          				<input id="longHips" name = "longHips" type="text">
		                  					<label for="longHips"> Length: </label>
					          			</div>					          
					          		</div>
					          		
					          	</div>
					        </diV>
					    </div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

	<!-- Men's Uniform-->
		<div class="row">
      	<div class="col s12 m12 l12">
	        <div class="card-panel">
	          	<div class="card-content">
					<div class="row">
				      	<div class="col s12 m12 l12">
					        <div class="card-panel">
					          	<div class="card-content" id="polo" name="polo">
					          		<h5>Polo (Long/Short Sleeve)</h5> 
					          		<div class = "row">
					          			<div class = "input-field col s4">
					          				<input id="longNeck" name = "longNeck" type="text">
		                  					<label for="longNeck"> Neck:</label>
					          			</div>
					          			<div class = "input-field col s4">
					          				<input id="longBust" name = "longBust" type="text">
		                  					<label for="longBust"> Chest:</label>
					          			</div>
					          			<div class = "input-field col s4">
					          				<input id="longHips" name = "longHips" type="text">
		                  					<label for="longHips"> Waist: </label>
					          			</div>
					          			<div class = "input-field col s4">
					          				<input id="longShoulder" name = "longShoulder" type="text">
		                  					<label for="longShoulder"> Hip:</label>
					          			</div>	
					          			<div class = "input-field col s4">
					          				<input id="longLength" name = "longLength" type="text">
		                  					<label for="longLength"> Seat:</label>
					          			</div>
					          			<div class = "input-field col s4">
					          				<input id="longWaist" name = "longWaist" type="text">
		                  					<label for="longWaist"> Shirt Length: </label>
					          			</div>
					          			<div class = "input-field col s4">
					          				<input id="longSleeve" name = "longSleeve" type="text">
		                  					<label for="longSleeve"> Shoulder Width: </label>
					          			</div>	
					          			<div class = "input-field col s4">
					          				<input id="longArmhole" name = "longArmhole" type="text">
		                  					<label for="longArmhole"> Arm Length: </label>
					          			</div>	
					          			<div class = "input-field col s4">
					          				<input id="longArmhole" name = "longArmhole" type="text">
		                  					<label for="longArmhole"> Wrist: </label>
					          			</div>								
					          		</div>
					          		
					          	</div>
					        </diV>
					    </div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

	<!-- Men's Uniform -->
		<div class="row">
      	<div class="col s12 m12 l12">
	        <div class="card-panel">
	          	<div class="card-content">
					<div class="row">
				      	<div class="col s12 m12 l12">
					        <div class="card-panel">
					          	<div class="card-content" id="pants" name="pants">
					          		<h5>Pants</h5> 
					          		<div class = "row">
					          			<div class = "input-field col s3">
					          				<input id="longNeck" name = "longNeck" type="text">
		                  					<label for="longNeck"> Hip (for the bottoms):</label>
					          			</div>
					          			<div class = "input-field col s3">
					          				<input id="longBust" name = "longBust" type="text">
		                  					<label for="longBust"> Seat (for the bottoms):</label>
					          			</div>
					          			<div class = "input-field col s3">
					          				<input id="longHips" name = "longHips" type="text">
		                  					<label for="longHips"> Inseam: </label>
					          			</div>
					          			<div class = "input-field col s3">
					          				<input id="longShoulder" name = "longShoulder" type="text">
		                  					<label for="longShoulder"> Length:</label>
					          			</div>						          				
					          		</div>
					          		
					          	</div>
					        </diV>
					    </div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

	<!-- Jersey Uniform -->
		<div class="row">
      	<div class="col s12 m12 l12">
	        <div class="card-panel">
	          	<div class="card-content">
					<div class="row">
				      	<div class="col s12 m12 l12">
					        <div class="card-panel">
					          	<div class="card-content" id="muscle" name="muscle">
					          		<h5>Muscle Shirt</h5> 
					          		<div class = "row">
					          			<div class = "input-field col s3">
					          				<input id="longNeck" name = "longNeck" type="text">
		                  					<label for="longNeck"> Neck Circumference:</label>
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
					          		</div>
					          		
					          	</div>
					        </diV>
					    </div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

	<!-- Tuxedo -->
		<div class="row">
      	<div class="col s12 m12 l12">
	        <div class="card-panel">
	          	<div class="card-content">
					<div class="row">
				      	<div class="col s12 m12 l12">
					        <div class="card-panel">
					          	<div class="card-content" id="coat" name="coat">
					          		<h5>Coat</h5> 
					          		<div class = "row">
					          			<div class = "input-field col s4">
					          				<input id="longNeck" name = "longNeck" type="text">
		                  					<label for="longNeck"> Coat Sleeve Length:</label>
					          			</div>
					          			<div class = "input-field col s4">
					          				<input id="longBust" name = "longBust" type="text">
		                  					<label for="longBust"> Sleeve Length for Suit:</label>
					          			</div>
					          			<div class = "input-field col s4">
					          				<input id="longHips" name = "longHips" type="text">
		                  					<label for="longHips"> Jacket Length: </label>
					          			</div>					
					          		</div>
					          		
					          	</div>
					        </diV>
					    </div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

		<!-- Women's Dress -->
		<div class="row">
      	<div class="col s12 m12 l12">
	        <div class="card-panel">
	          	<div class="card-content">
					<div class="row">
				      	<div class="col s12 m12 l12">
					        <div class="card-panel">
					          	<div class="card-content" id="dressShirt" id="dressShirt">
					          		<h5>Dress Shirt</h5> 
					          		<div class = "row">
					          			<div class = "input-field col s3">
					          				<input id="longNeck" name = "longNeck" type="text">
		                  					<label for="longNeck"> Neck Circumference:</label>
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
					          		</div>
					          		
					          	</div>
					        </diV>
					    </div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- 	Tuxedo
	Women's Uniforms
	<div class="row">
      	<div class="col s12 m12 l12">
        <div class="card-panel">
          	<div class="card-content">
				<div class="row">
			      	<div class="col s12 m12 l12">
				        <div class="card-panel">
				          	<div class="card-content">
				          		<h5>Pants</h5> 
				          		<div class = "row">
				          			<div class = "input-field col s3">
				          				<input id="longNeck" name = "longNeck" type="text">
	                  					<label for="longNeck"> Hip (for the bottoms):</label>
				          			</div>
				          			<div class = "input-field col s3">
				          				<input id="longBust" name = "longBust" type="text">
	                  					<label for="longBust"> Seat (for the bottoms):</label>
				          			</div>
				          			<div class = "input-field col s3">
				          				<input id="longHips" name = "longHips" type="text">
	                  					<label for="longHips"> Inseam: </label>
				          			</div>
				          			<div class = "input-field col s3">
				          				<input id="longShoulder" name = "longShoulder" type="text">
	                  					<label for="longShoulder"> Length:</label>
				          			</div>					
				          		</div>
				          		
				          	</div>
				        </diV>
				    </div>
				</div>
			</div>
		</div>
	</div>
</div>
</div> -->


@stop

@section('scripts')
	<script>
		$(document).ready(function(){
			$("#skirt").addClass("disabledbutton");
			$("#blouse").addClass("disabledbutton");
			$("#coat").addClass("disabledbutton");
			$("#dressShirt").addClass("disabledbutton");
			$("#pants").addClass("disabledbutton");
			$("#polo").addClass("disabledbutton");
			$("#muscle").addClass("disabledbutton");
			$("#ribbon").addClass("disabledbutton");
			$("#shorts").addClass("disabledbutton");


			if($("#segment_name").val() == 'Skirt'){
				$("#skirt").removeClass("disabledbutton");
			}
			if($("#segment_name").val() == 'Blouse'){
				$("#blouse").removeClass("disabledbutton");
			}
			if($("#segment_name").val() == 'Coat'){
				$("#coat").removeClass("disabledbutton");
			}
			if($("#segment_name").val() == 'Dress shirt'){
				$("#dressShirt").removeClass("disabledbutton");
			}
			if($("#segment_name").val() == 'Pants'){
				$("#pants").removeClass("disabledbutton");
			}
			if($("#segment_name").val() == 'Long Sleeve Polo'){
				$("#polo").removeClass("disabledbutton");
			}
			if($("#segment_name").val() == 'Muscle Shirt'){
				$("#muscle").removeClass("disabledbutton");
			}
			if($("#segment_name").val() == 'Ribbon'){
				$("#ribbon").removeClass("disabledbutton");
			}
			if($("#segment_name").val() == 'Shorts'){
				$("#shorts").removeClass("disabledbutton");
			}
		});
	</script>
@stop