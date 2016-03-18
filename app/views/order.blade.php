@extends('layouts.master')

@section('content')
	<style type="text/css">
		.disabledbutton {
    		pointer-events: none;
    		opacity: 0.4;
		}
	</style>
	
	<a style="color:black; align= left;" class="btn btn-large center-text light-green accent-1" href="{{URL::to('transaction/walk')}}">Customer Type</a>
	 

	<div class = "main-wrapper">	
		<div class="row">
	      <div class="col s12 m12 l12">
	      	<span class="page-title"><h4>Made to Order</h4></span>
	      </div>
    	</div>
  	</div>

  	<div class="row">
      	<div class="col s12 m12 l12">
	        <div class="card-panel">
	          	<div class="card-content">
	          		<div class = "row" id="order" name="order">
					<form action="{{ URL::to('addJobOrder') }}" method="POST">
						<input type="hidden" value="{{ Input::get('id') }}" id="customerID" name="customerID">
						<input type="hidden" value="{{ $newID }}" id="jobOrderID" name="jobOrderID">
						<div>
							<font size="+1">Job Order No:</font>	
							<font size="+2" color="red">{{ $newID }}</font>			
						</div>

		                <div class="input-field">
		                  <select class="browser-default" name='addCategory' id='addCategory' required>
		                      @foreach($category as $category)
		                          <option value="{{ $category->strGarmentCategoryID }}">{{ $category->strGarmentCategoryName }}</option>
		                      @endforeach
		                  </select>   
		                </div>  

		                <div class="input-field">
		                  <select class="browser-default" required id="addSegment" name="addSegment">
		                        @foreach($segment as $segment_1)
		                            <option value="{{ $segment_1->strGarmentSegmentID }}" class="{{ $segment_1->strCategory }}">{{ $segment_1->strGarmentSegmentName }}</option>
		                        @endforeach
		                  </select>
		                </div>  

				<div class="row">
					<div class="col s12 m12 l12" style="padding:40px;">
						<div class = "input-field col s4" style="padding-left:100px">
							<input id="jobOrderQuantity" name = "jobOrderQuantity" type="text">
			                <label style="color:black"><font size="+0.95"> Quantity </font></label>
						</div>
						<div class = "input-field col s4" style="padding-left:100px">
							<input id="unitPrice" name = "jobOrderQuantity" type="text" disabled>
			                <label style="color:black"> Unit Price</label>
						</div>
						<div class = "input-field col s4" style="padding-left:100px">
							<input id="totalPrice" name = "jobOrderQuantity" type="text" disabled>
			                <label style="color:black"> Total Price</label>
						</div>
					</div>
				</div>
						<div class = "col s6">&nbsp</div>
						<div class = "col s12">
							<center>
								<br><br>
		          				<input type="checkbox" class="filled-in" id="ownFabric" name="ownFabric" />
      							<label for="ownFabric">Fabric is provided by the customer.</label>
      						</center>	
	          			</div>

						<div class="input-field col s12">
						    <select class="browser-default" id="addFabric" name="addFabric">
							    @foreach($fabric as $fab)
									<option value="{{ $fab->strFabricTypeID }}">{{ $fab->strFabricTypeName }}</option>
                         	    @endforeach
						    </select>
						</div>

						<div class="input-field  col s12">
						    <select class="browser-default" id="addSwatch" name="addSwatch">
							    @foreach($swatch as $swa)
									<option value="{{ $swa->strSwatchID }}" class="{{ $swa->strSwatchFabricTypeName }}">{{ $swa->strSwatchName }}</option>
                         	    @endforeach
						    </select>
						</div>

						<div class="input-field col s12">
		                  <input id="note" name = "note" type="text" readonly>
		                  <label for="note"> Note:</label>
		                </div>

		        		<div class="input-field col s12">
		        			<center><button type="submit" style="color:black" class="btn btn-large center-text light-green accent-1">Next</button></center>
						</div>
					</form>
					</div>	
	          	</div>
	        </div>
	    </div>
	</div>


  	<!-- <div class="row">
	    <div class="col s12">
	      <ul class="tabs">
	        <li class="tab col s3"><a href="#tabCatalogue">Catalogue Design</a></li>
	        <li class="tab col s3"><a href="#tabPersonalize">Personalize Design</a></li>
	        <li class="tab col s3"><a href="#tabUpload">Upload Design</a></li>       
	      </ul>
	    </div>

	    <div id="tabCatalogue" class="col s12">
	    	<div class="row">
		      	<div class="col s12 m12 l12">
			        <div class="card-panel">
			          	<div class="card-content">
			          		<div class = "row">
								<div class="input-field col s12">
								    <select>
								      <option value="" disabled selected>Choose Garment</option>
								      <option value="1">Uniform</option>
								      <option value="2">Gown</option>
								      <option value="3">Suit</option>
								    </select>
								    <label>Garment Type:</label>
								</div>

								<div class="input-field col s12">
								    <select>
								      <option value="" disabled selected>Choose Garment Name</option>
								      <option value="1">Women's Uniform</option>
								      <option value="2">Men's Uniform</option>
								    </select>
								    <label>Garment Name:</label>
								</div>

							 	<div class = "col s3">
							 		<label>Image:</label>
							 	</div>
							 	<div class = "col s3">
							 		<img class="img hoverable" src="img/uniform3.jpg">
							 	</div>	

								<div class = "input-field col s6">
									<input id="quantity" name = "quantity" type="text">
					                <label for="quantity"> Quantity:</label>
								</div>
								<div class = "col s12">
									<center>
										<br><br>
				          				<input type="checkbox" class="filled-in" id="ownFabric" />
		      							<label for="ownFabric">Fabric is provided by the customer.</label>
		      						</center>	
			          			</div>
								<div class="input-field col s12">
								    <select>
								      <option value="" disabled selected>Choose Fabric Type</option>
								      <option value="1">Linen</option>
								      <option value="2">Cotton</option>
								    </select>
								    <label>Fabric Type:</label>
								</div>

								<div class="input-field col s12">
								    <select>
								      <option value="" disabled selected>Choose Swatch Name</option>
								      <option value="1">Native Silk</option>
								      <option value="2">Cotton citadel</option>
								    </select>
								    <label>Swatch Name:</label>
								</div>

							 	<div class = "col s3">
							 		<label>Image:</label>
							 	</div>
							 	<div class = "col s3">
							 		<img class="img hoverable" src="imgSwatches/citadel alpine.jpg">
							 	</div>	

								<div class = "input-field col s6">
									<input id="swatchCode" name = "swatchCode" type="text" readonly>
					                <label for="swatchCode"> Swatch Code:</label>
								</div>
								 <div class="input-field col s12">
				                  <input id="note" name = "note" type="text" readonly>
				                  <label for="note"> Note:</label>
				                </div>

				        		<center><a style="color:black" class="btn btn-large center-text light-green accent-1" href="">Place Order</a></center>
							</div>	
			          	</div>
			        </div>
			    </div>
			</div>
	    </div>

	    <div id="tabPersonalize" class="col s12">
	    	<div class="row">
		      	<div class="col s12 m12 l12">
			        <div class="card-panel">
			          	<div class="card-content">
			          		<div class = "row">
								<div class="input-field col s12">
								    <select>
								      <option value="" disabled selected>Choose Garment</option>
								      <option value="1">Uniform</option>
								      <option value="2">Gown</option>
								      <option value="3">Suit</option>
								    </select>
								    <label>Garment Type:</label>
								</div>

								<div class="input-field col s12">
								    <select>
								      <option value="" disabled selected>Choose Garment Name</option>
								      <option value="1">Women's Uniform</option>
								      <option value="2">Men's Uniform</option>
								    </select>
								    <label>Garment Name:</label>
								</div>

								<div class="input-field col s12">
								    <select>
								      <option value="" disabled selected>Choose Garment Segment</option>
								      <option value="1">Pants</option>
								      <option value="2">Skirt</option>
								    </select>
								    <label>Garment Segment Name:</label>
								</div>

								<div class="input-field col s12">
								    <select>
								      <option value="" disabled selected>Choose Segment Pattern</option>
								      <option value="1">Pencil Cut</option>
								      <option value="2">Slim Fit</option>
								    </select>
								    <label>Segment Pattern:</label>
								</div>

							 	<div class = "col s3">
							 		<label>Image:</label>
							 	</div>
							 	<div class = "col s3">
							 		<img class="img hoverable" src="imgDesignPatterns/pencilcut.jpg">
							 	</div>	

								<div class = "input-field col s6">
									<input id="quantity" name = "quantity" type="text">
					                <label for="quantity"> Quantity:</label>
								</div>

								<div class = "col s12">
									<center>
										<br><br>
				          				<input type="checkbox" class="filled-in" id="ownFabric" />
		      							<label for="ownFabric">Fabric is provided by the customer</label>
		      						</center>	
			          			</div>

								<div class="input-field col s12">
								    <select>
								      <option value="" disabled selected>Choose Fabric Type</option>
								      <option value="1">Linen</option>
								      <option value="2">Native Silk</option>
								    </select>
								    <label>Fabric Type:</label>
								</div>

								<div class="input-field col s12">
								    <select>
								      <option value="" disabled selected>Choose Swatch Name</option>
								      <option value="1">Linen Citadel</option>
								      <option value="2">Native Silk</option>
								    </select>
								    <label>Swatch Name:</label>
								</div>

							 	<div class = "col s3">
							 		<label>Image:</label>
							 	</div>
							 	<div class = "col s3">
							 		<img class="img hoverable" src="imgSwatches/citadel alpine.jpg">
							 	</div>	

								<div class = "input-field col s6">
									<input id="swatchCode" name = "swatchCode" type="text" readonly>
					                <label for="swatchCode"> Swatch Code:</label>
								</div>
								 <div class="input-field col s12">
				                  <input id="note" name = "note" type="text" readonly>
				                  <label for="note"> Note:</label>
				                </div>

				        		<center><a style="color:black" class="btn btn-large center-text light-green accent-1" href="">Place Order</a></center>
							</div>	
			          	</div>
			        </div>
			    </div>
			</div>
	    </div>

	    <div id="tabUpload" class="col s12">
	    	<div class="row">
		      	<div class="col s12 m12 l12">
			        <div class="card-panel">
			          	<div class="card-content">
			          		<div class = "row">
								<div class="input-field col s12">
								    <select>
								      <option value="" disabled selected>Choose Garment</option>
								      <option value="1">Uniform</option>
								      <option value="2">Gown</option>
								      <option value="3">Suit</option>
								    </select>
								    <label>Garment Type:</label>
								</div>

								<div class = "col s12">
									<div class="file-field input-field">
					                  <div style="color:black" class="btn tooltipped btn-small center-text light-green accent-1" data-position="bottom" data-delay="50" data-tooltip="May upload jpg, png, gif, bmp, tif, tiff files">
					                    <span>Upload Design Image</span>
					                    <input id="addImg" name="addImg" type="file" accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|images/*">
					                  </div>
					                
					                  <div class="file-path-wrapper">
					                    <input id="addImage" name="addImage" class="file-path validate" type="text" readonly="readonly">
					                  </div>
					                </div>
					            </div>

							 	<div class = "col s3">
							 		<label>Image:</label>
							 	</div>
							 	<div class = "col s3">
							 		<img class="img hoverable" src="img/uniform3.jpg">
							 	</div>	

								<div class = "input-field col s6">
									<input id="quantity" name = "quantity" type="text">
					                <label for="quantity"> Quantity:</label>
								</div>

								<div class = "col s12">
									<center>
										<br><br>
				          				<input type="checkbox" class="filled-in" id="ownFabric" />
		      							<label for="ownFabric">Customer bring and provide fabric</label>
		      						</center>	
			          			</div>

								<div class="input-field col s12">
								    <select>
								      <option value="" disabled selected>Choose Fabric Type</option>
								      <option value="1">Linen</option>
								      <option value="2">Cotton</option>
								    </select>
								    <label>Fabric Type:</label>
								</div>

								<div class="input-field col s12">
								    <select>
								      <option value="" disabled selected>Choose Swatch Name</option>
								      <option value="1">Linen Keme</option>
								      <option value="2">Linen Chuchu</option>
								    </select>
								    <label>Swatch Name:</label>
								</div>

							 	<div class = "col s3">
							 		<label>Image:</label>
							 	</div>
							 	<div class = "col s3">
							 		<img class="img hoverable" src="imgSwatches/citadel alpine.jpg">
							 	</div>	

								<div class = "input-field col s6">
									<input id="swatchCode" name = "swatchCode" type="text" readonly>
					                <label for="swatchCode"> Swatch Code:</label>
								</div>
								 <div class="input-field col s12">
				                  <input id="note" name = "note" type="text" readonly>
				                  <label for="note"> Note:</label>
				                </div>

				        		<center><a style="color:black" class="btn btn-large center-text light-green accent-1" href="">Place Order</a></center>
							</div>	
			          	</div>
			        </div>
			    </div>
			</div>
	    </div>
	</div> -->
@stop

@section('scripts')
	<script type="text/javascript">
		$(document).ready(function() {
	    $('select').material_select();
	  });

	$(document).ready(function(){
	    	$('ul.tabs').tabs();
	  	});
	</script>

	<script type="text/javascript">
		$(document).ready(function(){
			$("#ownFabric").click(function(){

				if($("#ownFabric").is(':checked')){
					$("#addFabric").prop("disabled", true);
					$("#addSwatch").prop("disabled", true);
				}else {
				    $("#addFabric").prop("disabled", false);
					$("#addSwatch").prop("disabled", false);
				}

			});
		});
	</script>
	
	<script>
		

	</script>
	

	<script>
		//$("#order").addClass("disabledbutton");
	</script>

    <script src="js/jquery-1.12.0.min.js"></script>
    <script src="js/jquery-migrate-1.2.1.min.js"></script>
    <script>
      // $(document).ready() executes this script AFTER the whole page loads
      $(document).ready(function () {

        // Get jQuery object for element with ID as 'category' (first select element)
        var categoryElement = $('#addCategory');

        // Get jQuery object for element with ID as 'types' (second select element)
        var typesElement = $('#addSegment');
        console.log(typesElement);
        // Get children elements of typesElement
        var typeOptions = typesElement.children();

        // Invoke updateValue() once with initial category value for initial page load
        updateValue(categoryElement.val());

        // Listen for changes on the categoryElement
        categoryElement.on('change', function () {
          // Invoke updateValue() with currently selected category as parameter
          updateValue(categoryElement.val());
        });

        // Define default current type
        var defaultType = '';

        // updateValue function definition
        function updateValue(category) {
          // On update, show everything first
          typeOptions.show();

          // Set default type to empty string for All
          defaultType = '';

          // If the selected category is all, do not hide anything
          if (category == 'All') return;

          // Iterate over options (children elements of typesElement)
          for (var i = 0; i < typeOptions.length; i++) {
            // Return each child as jQuery object
            var optionElement = $(typeOptions[i]);

            // Check class of optionElement, hide it if it's not equal to the current selected category
            if (!optionElement.hasClass(category)) optionElement.hide();

            // Check class of optionElement if it matches currently selected category AND if defaultType is an empty string,
            // if the evaluation is true, set defaultType to optionElement value. We do this to set the default value
            // when we pick another category
            if (optionElement.hasClass(category) && defaultType == '') defaultType = optionElement.attr('value');
          }

          // If defaultType is not empty string, set it as typesElement value
          if (defaultType != '') typesElement.val(defaultType);
        }
      });
    </script>

    <script>
      // $(document).ready() executes this script AFTER the whole page loads
      $(document).ready(function () {

        // Get jQuery object for element with ID as 'category' (first select element)
        var categoryElement = $('#addFabric');

        // Get jQuery object for element with ID as 'types' (second select element)
        var typesElement = $('#addSwatch');

        // Get children elements of typesElement
        var typeOptions = typesElement.children();

        // Invoke updateValue() once with initial category value for initial page load
        updateValue(categoryElement.val());

        // Listen for changes on the categoryElement
        categoryElement.on('change', function () {
          // Invoke updateValue() with currently selected category as parameter
          updateValue(categoryElement.val());
        });

        // Define default current type
        var defaultType = '';

        // updateValue function definition
        function updateValue(category) {
          // On update, show everything first
          typeOptions.show();

          // Set default type to empty string for All
          defaultType = '';

          // If the selected category is all, do not hide anything
          if (category == 'All') return;

          // Iterate over options (children elements of typesElement)
          for (var i = 0; i < typeOptions.length; i++) {
            // Return each child as jQuery object
            var optionElement = $(typeOptions[i]);

            // Check class of optionElement, hide it if it's not equal to the current selected category
            if (!optionElement.hasClass(category)) optionElement.hide();

            // Check class of optionElement if it matches currently selected category AND if defaultType is an empty string,
            // if the evaluation is true, set defaultType to optionElement value. We do this to set the default value
            // when we pick another category
            if (optionElement.hasClass(category) && defaultType == '') defaultType = optionElement.attr('value');
          }

          // If defaultType is not empty string, set it as typesElement value
          if (defaultType != '') typesElement.val(defaultType);
        }
      });
    </script>


@stop