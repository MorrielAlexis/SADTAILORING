@extends('layouts.master')

@section('content')

	<div class = "main-wrapper">	
		<div class="row">
	      <div class="col s12 m12 l12">
	      	<span class="page-title"><h4>Walk in Customer</h4></span>
	      </div>
    	</div>
  	</div>


  	<div class="row">
	    <div class="col s12">
	      <ul class="tabs">
	        <li class="tab col s3"><a href="#tabIndi">Individual</a></li>
	        <li class="tab col s3"><a href="#tabCom">Company</a></li>
	      </ul>
	    </div>

	    <div id="tabIndi" class="col s12">
	    	<div class="row">
		      	<div class="col s12 m12 l12">
			        <div class="card-panel">
			          	<div class="card-content">
							<form action="{{URL::to('addWalkInIndiv')}}" method="POST">
				                <div class="input-field">                 
				                  <input value = "{{$indID}}" id="addIndiID" name="addIndiID" type="text" class="" readonly>
				                  <label for="indi_id">Individual ID: </label>
				                </div>

				                <div class="input-field">
				                  <input required id="addFName" name = "addFName" type="text" class="validateFirst">
				                  <label for="first_name"> *First Name: </label>
				                </div>

				                <div class="input-field">
				                  <input id="addMName" name = "addMName" type="text" class="validateMiddle">
				                  <label for="middle_name"> Middle Name: </label>
				                </div>

				                <div class="input-field">
				                  <input required id="addLName" name = "addLName" type="text" class="validateLast">
				                  <label for="last_name"> *Last Name: </label>
				                </div>

				                <div class="input-field">
				                  <input required id="addCustPrivHouseNo" name="addCustPrivHouseNo" type="text" class="validateHouseNo">
				                  <label for="House No">*House No./Unit No./Floor Number: </label>
				                </div>

				                 <div class="input-field">
				                  <input required id="addCustPrivStreet" name="addCustPrivStreet" type="text" class="validateStreet">
				                  <label for=" Street">*Street: </label>
				                </div>

				                <div class="input-field">
				                  <input  id="addCustPrivBarangay" name="addCustPrivBarangay" type="text" class="validateBarangay">
				                  <label for=" Brgy">Barangay/Subd: </label>
				                </div>

				                <div class="input-field">
				                  <input required id="addCustPrivCity" name="addCustPrivCity" type="text" class="validateCity">
				                  <label for=" City">*City/Municipality: </label>
				                </div>

				                <div class="input-field">
				                  <input id="addCustPrivProvince" name="addCustPrivProvince" type="text" class="validateProvince">
				                  <label for=" Province">Province/Region: </label>
				                </div>

				                 <div class="input-field">
				                  <input id="addCustPrivZipCode" name="addCustPrivZipCode" type="text" class="validateZip">
				                  <label for=" Zip Code">Zip Code: </label>
				                </div>

				                <div class="input-field">
				                  <input required id="addEmail" name = "addEmail" type="text" class="validateEmail">
				                  <label for="email"> *Email Address: </label>
				                </div>

				                <div class="input-field">
				                  <input required id="addCel" name = "addCel" type="text" class="validateCell" maxlength="11">
				                  <label for="cellphone"> *Cellphone Number: </label>
				                </div>

				                <div class="input-field">
				                  <input id="addCelAlt" name = "addCelAlt" type="text" class="validateCellAlt" maxlength="11">
				                  <label for="cellphone"> Cellphone Number: (alternate)</label>
				                </div>

				                <div class="input-field">
				                  <input id="addPhone" name = "addPhone" type="text" class="validatePhone" maxlength="10">
				                  <label for="tel"> Telephone Number: </label>
				                </div>
								<br>
						    
						</div>
					</div>

					<div class = "row">
						<div class = "col s6">
							<center><a style="color:black" class="btn btn-large center-text light-green accent-1" href="{{URL::to('/alteration')}}">Go to Alterations</a></center>
						</div>
						<div class = "col s6">
							<center><button style="color:black" class="btn btn-large center-text light-green accent-1" href="{{URL::to('/addWalkInIndiv')}}">Go to Made to Order</a></center>
						</div>
					</div>	
					</form>
				</div>
			</div>
	    </div>

	    <div id="tabCom" class="col s12">
	    	<div class="row">
		      	<div class="col s12 m12 l12">
			        <div class="card-panel">
			          	<div class="card-content">
							<form action="{{URL::to('addWalkInCompany')}}" method="POST">
						      <div class="input-field">                 
				                <input value="{{$compID}}" id="addComID" name="addComID" type="text" class="" readonly>
				                <label for="company_id">Company ID: </label>
				              </div>

				              <div class="input-field">
				                <input required id="addComName" name = "addComName" type="text" class="validateComName">
				                <label for="company_name"> *Company Name: </label>
				              </div>

				              <div class="input-field">
				                  <input required id="addCustCompanyHouseNo" name="addCustCompanyHouseNo" type="text" class="validateHouseNo">
				                  <label for="House No">*House No./Unit No./Floor Number: </label>
				              </div>

				               <div class="input-field">
				                <input  required id="addCustCompanyStreet" name="addCustCompanyStreet" type="text" class="validateStreet">
				                <label for=" Street">*Street: </label>
				              </div>

				              <div class="input-field">
				                <input id="addCustCompanyBarangay" name="addCustCompanyBarangay" type="text" class="validateBarangay">
				                <label for=" Brgy">Barangay/Subd: </label>
				              </div>

				              <div class="input-field">
				                <input required="" id="addCustCompanyCity" name="addCustCompanyCity" type="text" class="validateCity">
				                <label for=" City">*City/Municipality: </label>
				              </div>

				              <div class="input-field">
				                <input id="addCustCompanyProvince" name="addCustCompanyProvince" type="text" class="validateProvince">
				                <label for=" Province">Province: </label>
				              </div>

				               <div class="input-field">
				                <input id="addCustCompanyZipCode" name="addCustCompanyZipCode" type="text" class="validateZip">
				                <label for=" Zip Code">Zip Code: </label>
				              </div>

				              <div class="input-field">
				                <input required id="addConPerson" name = "addConPerson" type="text" class="validateConPerson">
				                <label for="company_name"> *Contact Person: </label>
				              </div>

				              <div class="input-field">
				                <input required id="addComEmailAdd" name = "addComEmailAddress" type="text" class="validateEmail">
				                <label for="com_email_address"> *Company Email Address: </label>
				              </div>

				              <div class="input-field">
				                <input required id="addCel" name = "addCel" type="text" class="validateCell" maxlength="11" minlength="11">
				                <label for="cellphone"> *Cellphone Number: </label>
				              </div>

				              <div class="input-field">
				                <input id="addCelAlt" name = "addCelAlt" type="text" class="validateCellAlt" maxlength="11" minlength="11">
				                <label for="cellphone"> Cellphone Number: (alternate)</label>
				              </div>

				              <div class="input-field">
				                <input  id="addPhone" name = "addPhone" type="text" class="validatePhone" maxlength="10" minlength="10">
				                <label for="tel"> Telephone Number: </label>
				              </div>

				              <div class="input-field">
				                <input id="addFax" name = "addFax" type="text" class="validateFax" maxlength="9" minlength="9">
				                <label for="fax"> Fax Number: </label>
				              </div>
								<br>
						    </form>
						</div>
					</div>
					<div class = "row">
						<div class = "col s6">
							<center><a style="color:black" class="btn btn-large center-text light-green accent-1" href="{{URL::to('/alteration')}}">Go to Alterations</a></center>
						</div>
						<div class = "col s6">
							<center><a style="color:black" class="btn btn-large center-text light-green accent-1" href="{{URL::to('/madeOrder')}}">Go to Made to Order</a></center>
						</div>
					</div>	
				</div>	
			</div>
	    </div>
  	</div>     	
@stop