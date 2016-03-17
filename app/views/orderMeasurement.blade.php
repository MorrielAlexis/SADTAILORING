@extends('layouts.master')

@section('content')
	

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
			          <input style="color:black" disabled id="cust_name" type="text" class="validate" value="Buenavides, Honey May"></input>
			          <label for="cust_name" style="color:black"><font size="+0.95">CUSTOMER NAME:</font></label>
	  		</div>
	  	</div>

		<!-- Hard-coded for now. Change the value into something dynamic (Found in the input tag). -->
		<div class="col s6">
			<div class="input-field col s12" style="padding-left:200px;">
			          <input style="color:black" disabled id="cust_name" type="text" class="validate" value="Uniform"></input>
			          <label for="cust_name" style="color:black"><font size="+0.95">GARMENT CATEGORY:</font></label>
	  		</div>
	  	</div>

		<div class="col s6">
			<div class="input-field col s12" style="padding-left:200px">
	  				<label style="color:black"><font size="+0.95">CUSTOMER SEX:</font></label>
					    <select class="browser-default">
					    	  <option value="1" disabled selected>--- Choose customer sex ---</option>
						      <option value="1">Male</option>
						      <option value="2">Female</option>
					    </select>
			</div>
		</div>

		<!-- Hard coded as well. Base this according to the garment category.-->
		<div class="col s6">
			<div class="input-field col s12" style="padding-left:200px">
	  				<label style="color:black"><font size="+0.95">GARMENT SEGMENT:</font></label>
					    <select class="browser-default">
					    	  <option value="1" disabled selected>--- Choose garment segment ---</option>
						      <option value="1">Blouse</option>
						      <option value="2">Ribbon</option>
						      <option value="3">Shorts</option>
						      <option value="4">Skirt</option>
					    </select>
			</div>
		</div>

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
					          	<div class="card-content">
					          		<h5>Blouse</h5> 
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

	<!--Women's Uniform Short -->
		<div class="row">
      	<div class="col s12 m12 l12">
	        <div class="card-panel">
	          	<div class="card-content">
					<div class="row">
				      	<div class="col s12 m12 l12">
					        <div class="card-panel">
					          	<div class="card-content">
					          		<h5>Short</h5> 
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

	<!-- Women's Uniform Ribbon -->
		<div class="row">
      	<div class="col s12 m12 l12">
	        <div class="card-panel">
	          	<div class="card-content">
					<div class="row">
				      	<div class="col s12 m12 l12">
					        <div class="card-panel">
					          	<div class="card-content">
					          		<h5>Ribbon</h5> 
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
	
	<!-- Women's Uniforms -->
	<div class="row">
      	<div class="col s12 m12 l12">
	        <div class="card-panel">
	          	<div class="card-content">
					<div class="row">
				      	<div class="col s12 m12 l12">
					        <div class="card-panel">
					          	<div class="card-content">
					          		<h5>Skirt</h5> 
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

	<!-- Men's Uniform-->
		<div class="row">
      	<div class="col s12 m12 l12">
	        <div class="card-panel">
	          	<div class="card-content">
					<div class="row">
				      	<div class="col s12 m12 l12">
					        <div class="card-panel">
					          	<div class="card-content">
					          		<h5>Long Sleeve Polo</h5> 
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

	<!-- Men's Uniform -->
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

	<!-- Jersey Uniform -->
		<div class="row">
      	<div class="col s12 m12 l12">
	        <div class="card-panel">
	          	<div class="card-content">
					<div class="row">
				      	<div class="col s12 m12 l12">
					        <div class="card-panel">
					          	<div class="card-content">
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
		<!-- Women's Uniforms -->
		<div class="row">
      	<div class="col s12 m12 l12">
	        <div class="card-panel">
	          	<div class="card-content">
					<div class="row">
				      	<div class="col s12 m12 l12">
					        <div class="card-panel">
					          	<div class="card-content">
					          		<h5>Coat</h5> 
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

	<!--Tuxedo-->
		<!-- Women's Uniforms -->
		<div class="row">
      	<div class="col s12 m12 l12">
	        <div class="card-panel">
	          	<div class="card-content">
					<div class="row">
				      	<div class="col s12 m12 l12">
					        <div class="card-panel">
					          	<div class="card-content">
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

	<!--Tuxedo-->
		<!-- Women's Uniforms -->
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



@stop