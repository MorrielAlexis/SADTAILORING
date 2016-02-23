@extends('layouts.master')

@section('content')


  <div class="main-wrapper">
    <div class="row">
      <div class="col s12 m12 l12">
      <span class="page-title"><h4>Customers</h4></span>
      </div>
    </div>

    <div class="row">
      <div class="col s12 m12 l12">
       <button class="modal-trigger waves-effect waves-light btn btn-small center-text" href="#addCom">ADD COMPANY Customer</button>
       <button class="modal-trigger waves-effect waves-light btn btn-small center-text" href="#modal1">VIEW ALL CUSTOMERS</button>
      </div>
    </div>
  </div>

  <!--MODAL: VIEW ALL EMPLOYEES-->
  <div id="modal1" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h4>ALL EMPLOYEES</h4>
      <table class="table centered data-reactcustCompany" border="1">
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
            <th data-field="react">Reactivate</th>
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
                  <form action="{{URL::to('reactCustCompany')}}" method="POST">
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

            <table class = "table centered data-custCompany" align = "center" border = "1">
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
                  <th data-field="Edit">Edit</th>
                  <th data-field="Delete">Delete</th>
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
                  <td><button class="modal-trigger waves-effect waves-light btn btn-small center-text" href="#del{{$company->strCustCompanyID}}">DELETE</button></td>
                  

                    <div id="edit{{$company->strCustCompanyID}}" class="modal modal-fixed-footer">
                      <div class="modal-content">
                      <div class = "label"><font color = "teal" size = "+3" back >Edit Company Profile </font> </div>
                        <p>
                        <form action="{{URL::to('editCustCompany')}}" method="POST">
                        <div class="input-field">                 
                          <input value="{{$company->strCustCompanyID}}" id="editComID" name="editComID" type="text" class="validate" readonly>
                          <label for="company_id">Company ID: </label>
                        </div>

                        <div class="input-field">
                          <input required id="editComName" name = "editComName" value = "{{$company->strCustCompanyName}}" type="text" class="validateComName">
                          <label for="company_name"> Company Name: </label>
                        </div>

                        <div class="input-field">
                          <input required id="editAddress" name = "editAddress" value = "{{$company->strCustCompanyAddress}}" type="text" class="validateAddress">
                          <label for="address"> Address: </label>
                        </div>

                        <div class="input-field">
                          <input required id="editConPerson" name = "editConPerson" value = "{{$company->strCustContactPerson}}" type="text" class="validateConPerson">
                          <label for="company_name"> Contact Person: </label>
                        </div>

                        <div class="input-field">
                          <input id="editComEmailAddress" name = "editComEmailAddress" value = "{{$company->strCustCompanyEmailAddress}}" type="text" class="validateEmail">
                          <label for="com_email_address"> Company Email Address: </label>
                        </div>

                        <div class="input-field">
                          <input required id="editCel" name = "editCel" value = "{{$company->strCustCompanyCPNumber}}" type="text" class="validateCell" maxlength="11">
                          <label for="cellphone"> Cellphone Number: </label>
                        </div>

                        <div class="input-field">
                          <input id="editPhone" name = "editPhone" value = "{{$company->strCustCompanyTelNumber}}" type="text" class="validatePhone" maxlength="10">
                          <label for="tel"> Telephone Number: </label>
                        </div>

                        <div class="input-field">
                          <input id="editFax" name = "editFax" value = "{{$company->strCustCompanyFaxNumber}}" type="text" class="validateFax" maxlength="9" minlength="9">
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
                         <form action="{{URL::to('delCustCompany')}}" method="POST">
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
                <form action="{{URL::to('addCustCompany')}}" method="POST">
              <div class="input-field">                 
                <input value="{{$newID}}" id="addComID" name="addComID" type="text" class="validate" readonly>
                <label for="company_id">Company ID: </label>
              </div>

              <div class="input-field">
                <input required id="addComName" name = "addComName" type="text" class="validateComName">
                <label for="company_name"> Company Name: </label>
              </div>

              <div class="input-field">
                <input required id="addAddress" name = "addAddress" type="text" class="validateAddress">
                <label for="address"> Address: </label>
              </div>

              <div class="input-field">
                <input required id="addConPerson" name = "addConPerson" type="text" class="validateConPerson">
                <label for="company_name"> Contact Person: </label>
              </div>

              <div class="input-field">
                <input id="addComEmailAdd" name = "addComEmailAddress" type="text" class="validateEmail">
                <label for="com_email_address"> Company Email Address: </label>
              </div>

              <div class="input-field">
                <input required id="addCel" name = "addCel" type="text" class="validateCell" maxlength="11" minlength="11">
                <label for="cellphone"> Cellphone Number: </label>
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
              </p>
              </div>

            <div class="modal-footer">
              <button type="submit" class=" waves-effect waves-green btn-flat">Add</button>  
              <button type="button" onclick="clearData()" class=" modal-action modal-close waves-effect waves-green btn-flat">Cancel</button>
            </div>
            </form>
          </div>     
          
        </div>
       </div>  
    </div> 
    @stop

@section('scripts')	 
    <script>
      function clearData(){
          document.getElementById("addComName").value = "";
          document.getElementById("addConPerson").value = "";
          document.getElementById("addAddress").value = "";
          document.getElementById("addCel").value = "";
          document.getElementById("addPhone").value = "";
          document.getElementById("addComEmailAdd").value = "";
          document.getElementById("addFax").value = "";
      }

    </script>

    <script type="text/javascript">
      $('.validateComName').on('input', function() {
        var input=$(this);
        var is_name=input.val();
        if(is_name){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
      });

      $('.validateComName').blur('input', function() {
        var input=$(this);
        var is_name=input.val();
        if(is_name){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
      }); 

      $('.validateAddress').on('input', function() {
        var input=$(this);
        var is_name=input.val();
        if(is_name){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
      });

      //Validate Blank
      $('.validateAddress').blur('input', function() {
        var input=$(this);
        var is_name=input.val();
        if(is_name){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
      });     

      $('.validateConPerson').on('input', function() {
        var input=$(this);
        var is_name=input.val();
        if(is_name){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
      });

      $('.validateConPerson').blur('input', function() {
        var input=$(this);
        var is_name=input.val();
        if(is_name){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
      });

      $('.validateEmail').on('input', function() {
        var input=$(this);
        var re = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
        var is_email=re.test(input.val());
        if(is_email){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
      });

      $('.validateCell').on('input', function() {
        var input=$(this);
        var is_name=input.val();
        if(is_name){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
      });

      $('.validateCell').keyup(function() {
        var numbers = $(this).val();
        $(this).val(numbers.replace(/\D/, ''));
      });

      //Validate Blank
      $('.validateCell').blur('input', function() {
        var input=$(this);
        var is_name=input.val();
        if(is_name){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
      });

       $('.validateCell').keyup(function() {
        var numbers = $(this).val();
        $(this).val(numbers.replace(/\D/, ''));
        $(this).val($(this).val().replace(/(\d{4})\-?(\d{3})\-?(\d{4})/,'($1)-$2-$3'))
      });

       $('.validatePhone').keyup(function() {
        var numbers = $(this).val();
        $(this).val(numbers.replace(/\D/, ''));
      });

       $('.validatePhone').keyup(function() {
        var numbers = $(this).val();
        $(this).val(numbers.replace(/\D/, ''));
        $(this).val($(this).val().replace(/(\d{3})\-?(\d{3})\-?(\d{4})/,'($1)-$2-$3'))
      }); 

       $('.validateFax').keyup(function() {
        var numbers = $(this).val();
        $(this).val(numbers.replace(/\D/, ''));
      });

       $('.validateFax').keyup(function() {
      var numbers = $(this).val();
      $(this).val(numbers.replace(/\D/, ''));
      $(this).val($(this).val().replace(/(\d{2})\-?(\d{3})\-?(\d{4})/,'($1)-$2-$3'))
      }); 


    </script>

      <!--DATA TABLE SCRIPT-->
    <script type="text/javascript">

      $(document).ready(function() {

          $('.data-custCompany').DataTable();

      } );

    </script>

      <!--DATA TABLE SCRIPT-->
    <script type="text/javascript">

      $(document).ready(function() {

          $('.data-reactcustCompany').DataTable();

      } );

    </script>

@stop                             
		
 
	


