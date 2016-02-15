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
          @foreach($company2 as $company2)
                  @if($company2->boolIsActive == 0)
                <tr>
                  <td>{{ $company2->strCustCompanyID }}</td>
                  <td>{{ $company2->strCustCompanyName }}</td>
                  <td>{{ $company2->strCustCompanyAddress }}</td>
                  <td>{{ $company2->strCustContactPerson }} </td>
                  <td>{{ $company2->strCustCompanyEmailAddress}}</td>                  
                  <td>{{ $company2->strCustCompanyCPNumber }}</td> 
                  <td>{{ $company2->strCustCompanyTelNumber }}</td>                  
                  <td>{{ $company2->strCustCompanyFaxNumber }}</td>  
            <td>
                  <form action="/reactCustCompany" method="POST">
                  <input type="hidden" value="{{ $company2->strCustCompanyID }}" id="reactID" name="reactID">
                  <button type="submit" class="waves-effect waves-green btn btn-small center-text">REACTIVATE</button>
                  </form>
              </td>
          </tr>
          @endif
          @endforeach
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
          <span class="card-title"><h5><center>Customer Profile - (Company)</center></h5></span>
          <div class="divider"></div>
          <div class="card-content">

           <div class="col s12 m12 l12 overflow-x"> 

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
                  <td><button class="modal-trigger waves-effect waves-light btn btn-small center-text" href="#edit{{$company->strCustCompanyID}}">EDIT</button></td>       
                  <td><button class="modal-trigger waves-effect waves-light btn btn-small center-text" href="#del{{$company->strCustCompanyID}}">DELETE</button>


                    <div id="edit{{$company->strCustCompanyId}}" class="modal modal-fixed-footer">
                      <div class="modal-content">
                      <div class = "label"><font color = "teal" size = "+3" back >Edit Company Profile </font> </div>
                        <p>
                        <form action="/editCustCompany" method="POST">
                        <div class="input-field">                 
                          <input value="{{$company->strCustCompanyID}}" id="editComID" name="editComID" type="text" class="validate" readonly>
                          <label for="company_id">Company ID: </label>
                        </div>

                        <div class="input-field">
                          <input id="editComName" name = "editComName" value = "{{$company->strCustCompanyName}}" type="text" class="validate">
                          <label for="company_name"> Company Name: </label>
                        </div>

                        <div class="input-field">
                          <input id="editAddress" name = "editAddress" value = "{{$company->strCustCompanyAddress}}" type="text" class="validate">
                          <label for="address"> Address: </label>
                        </div>

                        <div class="input-field">
                          <input id="editConPerson" name = "editConPerson" value = "{{$company->strCustContactPerson}}" type="text" class="validate">
                          <label for="company_name"> Contact Person: </label>
                        </div>

                        <div class="input-field">
                          <input id="editComEmailAddress" name = "editComEmailAddress" value = "{{$company->strCustCompanyEmailAddress}}" type="text" class="validate">
                          <label for="com_email_address"> Company Email Address: </label>
                        </div>

                        <div class="input-field">
                          <input id="editCel" name = "editCel" value = "{{$company->strCustCompanyCPNumber}}" type="text" class="validate">
                          <label for="cellphone"> Cellphone Number: </label>
                        </div>

                        <div class="input-field">
                          <input id="editPhone" name = "editPhone" value = "{{$company->strCustCompanyTelNumber}}" type="text" class="validate">
                          <label for="tel"> Telephone Number: </label>
                        </div>

                        <div class="input-field">
                          <input id="editFax" name = "editFax" value = "{{$company->strCustCompanyFaxNumber}}" type="text" class="validate">
                          <label for="fax"> Fax Number: </label>
                        </div>
                        </p>
                      </div>

                      <div class="modal-footer">
                         <button type="submit" class="waves-effect waves-green btn-flat">Update</button>  
                         <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Cancel</a>   
                      </div>
                    </form>
                   </div>
                    <!-- DELETE -->
                   <div id="del{{$company->strCustCompanyID}}" class="modal modal-fixed-footer">
                      <div class="modal-content">
                        <font color = "teal"><h5><center>Are you sure you want to delete?</center></h5></font> 
                        <p>
                         <form action="/delCustCompany" method="POST">
                          <div class="input-field">
                            <label for="first_name">Company ID: </label>
                            <input value="{{$company->strCustCompanyID}}" id="delCompanyID" name="delCompanyID" type="text" class="validate" readonly>
                          </div>

                          <div class="input-field">
                            <label for="first_name">Company Name: </label>
                            <input value="{{$company->strCustCompanyName}}" id="delCompanyName" name="delCompanyName" type="text" class="validate" readonly>
                          </div>

                          <div class="input-field">
                            <input value="{{$company->strCustContactPerson}}" id="delConPerson" name="delConPerson" type="text" class="validate" readonly>
                            <label for="LastName">Contact Person: </label>
                          </div>
                        </p>
                      </div>

                         <div class="modal-footer">
                          <button type="submit" class="waves-effect waves-green btn-flat">OK</button>
                          <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Cancel</a>
                          </div> 
                        </form>
                      </div>
                  </td>                  
                </tr>
                @endif
                @endforeach    
              </tbody>
            </table>

            </div>

            <div class = "clearfix">

            </div>  
    
            <div id="addCom" class="modal modal-fixed-footer">
              <h5><font color = "teal"><center>Add Company Profile </center> </font> </h5>                      
              <div class="modal-content">
                <p>
                <form action="/addCustCompany" method="POST">
              <div class="input-field">                 
                <input value="{{$newID}}" id="addComID" name="addComID" type="text" class="validate" readonly>
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
              </p>
              </div>

            <div class="modal-footer">
              <button type="submit" class=" waves-effect waves-green btn-flat">Add</button>  
              <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Cancel</a>
            </div>
            </form>
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
		
 
	


