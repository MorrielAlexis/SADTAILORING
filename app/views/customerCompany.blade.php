@extends('layouts.master')

	@section('content')


  <div class="main-wrapper">
    <div class="row">
      <div class="col s12 m12 l12">
      <span class="page-title"><h4>Customers</h4></span>
      </div>
    </div>

    <div class="row">
      <div class="col s12 m12 l6">
       <button class="modal-trigger waves-effect waves-light btn btn-small center-text" href="#addCom">ADD COMPANY Customer</button>
       <button class="modal-trigger waves-effect waves-light btn btn-small center-text" href="#modal1">VIEW ALL CUSTOMERS</button>
      </div>
    </div>
  </div>

  <!--MODAL: VIEW ALL EMPLOYEES-->
  <div id="modal1" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h4>ALL EMPLOYEES</h4>
      <table class="centered" border="1">
        <thead>
          <tr>
            <th data-field="id">Company ID</th>
            <th data-field="name">Company Name</th>
            <th data-field="address">Address</th>
            <th data-field="contact">Contact Person</th>
            <th data-field="comEmail">Company Email Address</th>
            <th data-field="cellphone">Cellphone No.</th>
            <th data-field="Landline">Telephone No.</th>
            <th data-field="fax">Fax No.</th>
          </tr>
        </thead>

        <tbody>
          <tr>
            <td>Company ID</td>
            <td>Company Name</td>
            <td>Address</td>
            <td>Contact Person</td>
            <td>Company Email Address</td>
            <td>Cellphone No.</td>
            <td>Telephone No.</td>                  
            <td>Fax No.</td>
            <td><button class="modal-trigger waves-effect waves-light btn btn-small center-text" href="#">REACTIVATE</button></td>
          </tr>
        </tbody>
      </table>
    </div>
  
    <!--MODAL FOOTER-->
    <div class="modal-footer">
      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">CLOSE</a>
    </div>
  </div>

    <div class="row">
      <div class="col s12 m12 l12">
        <div class="card-panel">
          <span class="card-title"><h5>Customer Profile - (Company)</h5></span>
          <div class="divider"></div>
          <div class="card-content">

            <table class = "centered" align = "center" border = "1">
              <thead>
                <tr>
                  <th data-field="id">Company ID</th>
                  <th data-field="name">Company Name</th>
                  <th data-field="address">Address</th>
                  <th data-field="contact">Contact Person</th>
                  <th data-field="comEmail">Company Email Address</th>
                  <th data-field="cellphone">Cellphone No.</th>
                  <th data-field="Landline">Telephone No.</th>
                  <th data-field="fax">Fax No.</th>
                </tr>
              </thead>

              <tbody>
                @foreach($company as $company)
                  @if($company->boolIsActive == 1)
                <tr>
                  <td>{{ $company->strCustCompanyID }}</td>
                  <td>{{ $company->strCustCompanyName }}</td>
                  <td>{{ $company->strCustCompanyAddress }}</td>
                  <td>{{ $company->strCustContactPerson }} </td>
                  <td>{{ $company->strCustCompanyEmailAddress}}</td>                  
                  <td>{{ $company->strCustCompanyCPNumber }}</td> 
                  <td>{{ $company->strCustCompanyTelNumber }}</td>                  
                  <td>{{ $company->strCustCompanyFaxNumber }}</td>        
                  <td><button class="modal-trigger waves-effect waves-light btn btn-small center-text" href="#editCom">EDIT</button>

                    <div id="editCom" class="modal">
                      <div class = "label"><font color = "teal" size = "+3" back >&nbsp Edit Company Profile </font> </div>
                        
                      <div class="modal-content">

                        <div class="input-field">                 
                          <input value="editComID" id="editComID" name="editComID" type="text" class="validate" readonly = "readonly">
                          <label for="company_id">Company ID: </label>
                        </div>

                        <div class="input-field">
                          <input id="editComName" name = "editComName" value = "editComName" type="text" class="validate">
                          <label for="company_name"> Company Name: </label>
                        </div>

                        <div class="input-field">
                          <input id="editAddress" name = "editAddress" value = "editAddress" type="text" class="validate">
                          <label for="address"> Address: </label>
                        </div>

                        <div class="input-field">
                          <input id="editConPerson" name = "editConPerson" value = "editConPerson" type="text" class="validate">
                          <label for="company_name"> Contact Person: </label>
                        </div>

                        <div class="input-field">
                          <input id="editComEmailAdd" name = "editComEmailAddress" value = "editComEmailAddress" type="text" class="validate">
                          <label for="com_email_address"> Company Email Address: </label>
                        </div>

                        <div class="input-field">
                          <input id="editCel" name = "editCel" value = "editCel" type="text" class="validate">
                          <label for="cellphone"> Cellphone Number: </label>
                        </div>

                        <div class="input-field">
                          <input id="editPhone" name = "editPhone" value = "editPhone" type="text" class="validate">
                          <label for="tel"> Telephone Number: </label>
                        </div>

                        <div class="input-field">
                          <input id="editFax" name = "editFax" value = "editFax" type="text" class="validate">
                          <label for="fax"> Fax Number: </label>
                        </div>
                      </div>

                      <div class="modal-footer">
                         <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Update</a>  
                         <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Cancel</a>   
                      </div>

                   </div>
                  </td>                  
                </tr>    
              </tbody>
            </table>
    
            <div id="addCom" class="modal">
              <h5><font color = "teal"><center>&nbsp Add Company Profile </center> </font> </h5>
                        
              <div class="modal-content">

              <div class="input-field">                 
                <input value="addComID" id="addComID" name="addComID" type="text" class="validate" readonly = "readonly">
                <label for="company_id">Company ID: </label>
              </div>

              <div class="input-field">
                <input id="addComName" name = "addComName" type="text" class="validate">
                <label for="company_name"> Company Name: </label>
              </div>

              <div class="input-field">
                <input id="addAddress" name = "addAddress" type="text" class="validate">
                <label for="address"> Address: </label>
              </div>

              <div class="input-field">
                <input id="addConPerson" name = "addConPerson" type="text" class="validate">
                <label for="company_name"> Contact Person: </label>
              </div>

              <div class="input-field">
                <input id="addComEmailAdd" name = "addComEmailAddress" type="text" class="validate">
                <label for="com_email_address"> Company Email Address: </label>
              </div>

              <div class="input-field">
                <input id="addCel" name = "addCel" type="text" class="validate">
                <label for="cellphone"> Cellphone Number: </label>
              </div>

              <div class="input-field">
                <input id="addPhone" name = "addPhone" type="text" class="validate">
                <label for="tel"> Telephone Number: </label>
              </div>

              <div class="input-field">
                <input id="addFax" name = "addFax" type="text" class="validate">
                <label for="fax"> Fax Number: </label>
              </div>
            </div>

            <div class="modal-footer">
              <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Add</a>  
              <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Cancel</a>
            </div>

          </div>         
        </div>
       </div>  
    </div> 
    @stop

    @section('scripts')
      <script>
      $(document).ready(function(){
      // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
      $('.modal-trigger').leanModal();
      });
      </script>

  	 
    @stop                             
		
 
	


