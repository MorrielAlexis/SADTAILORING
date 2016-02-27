
@extends('layouts.master')

@section('content')
    <div class="main-wrapper">
      @if (Input::get('success') == 'true')
        <div class="row" id="success-message">
          <div class="col s12 m12 l12">
            <div class="card-panel teal">
              <span class="white-text">Successfully added customer!<i class="material-icons right" onclick="$('#success-message').hide()">clear</i></span>
            </div>
          </div>
        </div>
      @endif

      <div class="row">
        <div class="col s12 m12 l12">
        <span class="page-title"><h4>Customer Individual</h4></span>
        </div>
      </div>

      <div class="row">
        <div class="col s12 m12 l12">
          <button class="modal-trigger waves-effect waves-light btn btn-small center-text" href="#addCusIndi">ADD INDIVIDUAL CUSTOMER</button>
          <button class="modal-trigger waves-effect waves-light btn btn-small center-text" href="#modal1">VIEW INACTIVE CUSTOMERS </button>
        </div>      
      </div>
    </div>

  <!--MODAL: VIEW ALL EMPLOYEES-->
  <div id="modal1" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h4>INACTIVE CUSTOMERS(IND)</h4>
      <table class = "table centered data-custInd" align = "center" border = "1">
        <thead>
          <tr>
            <th data-field="id">Indivual ID</th>
            <th data-field="fname">First Name</th>
            <th data-field= "mname">Middle Name </th>
            <th data-field="lname">Last Name</th>
            <th data-field="address">Address</th>
            <th data-field="email">Email Address</th>
            <th data-field="cellphone">Cellphone No.</th>
            <th data-field="Landline">Telephone No.</th>
            <th data-field="React">Reactivate</th>
          </tr>
        </thead>

        <tbody>
          @foreach($individual2 as $individual2)
            @if($individual2->boolIsActive == 0)
            <tr>
              <td>{{ $individual2->strCustPrivIndivID }}</td>
              <td>{{ $individual2->strCustPrivFName }}</td>
              <td>{{ $individual2->strCustPrivMName }}</td>
              <td>{{ $individual2->strCustPrivLName }}</td>
              <td>{{ $individual2->strCustPrivAddress }} </td>
              <td>{{ $individual2->strCustPrivEmailAddress}}</td>                  
              <td>{{ $individual2->strCustPrivCPNumber }}</td> 
              <td>{{ $individual2->strCustPrivLandlineNumber }}</td>       
              <td>          
                <form action="{{URL::to('reactCustPrivIndiv')}}" method="POST">
                  <input type="hidden" value="{{ $individual2->strCustPrivIndivID }}" id="reactID" name="reactID">
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
          <span class="card-title"><h5><center>List of Individual Customer</center></h5></span>
          <div class="divider"></div>


          <div class="card-content">

            <div class="col s12 m12 l12 overflow-x">
    
            <table class = "table centered data-custInd" align = "center" border = "1">
              <thead>
                <tr>
                  <th data-field="id">Indivual ID</th>
                  <th data-field="fname">First Name</th>
                  <th data-field="mname">Middle Name</th>
                  <th data-field="lname">Last Name</th>
                  <th data-field="address">Address</th>
                  <th data-field="email">Email Address</th>
                  <th data-field="cellphone">Cellphone No.</th>
                  <th data-field="cellphone">Cellphone No. (alt) </th>
                  <th data-field="Landline">Telephone No.</th>
                  <th data-field="Edit">Edit</th>
                  <th data-field="Delete">Delete</th>

                </tr>
              </thead>

              <tbody>           
                  @foreach($individual as $individual)
                  @if($individual->boolIsActive == 1)
                <tr>
                  <td>{{ $individual->strCustPrivIndivID }}</td>
                  <td>{{ $individual->strCustPrivFName }}</td>
                  <td>{{ $individual->strCustPrivMName }}</td>
                  <td>{{ $individual->strCustPrivLName }}</td>
                  <td>{{ $individual->strCustPrivAddress }} </td>
                  <td>{{ $individual->strCustPrivEmailAddress}}</td>                  
                  <td>{{ $individual->strCustPrivCPNumber }}</td> 
                  <td>{{ $individual->strCustPrivCPNumberAlt }}</td> 
                  <td>{{ $individual->strCustPrivLandlineNumber }}</td>
                  <td><button class="modal-trigger waves-effect waves-light btn btn-small center-text" href="#edit{{$individual->strCustPrivIndivID}}">EDIT</button></td>      
                  <td><button class="modal-trigger waves-effect waves-light btn btn-small center-text" href="#del{{$individual->strCustPrivIndivID}}">DELETE</button>


                    <div id="edit{{$individual->strCustPrivIndivID}}" class="modal modal-fixed-footer">
                      <div class="modal-content">
                      <div class = "label"><font color = "teal" size = "+3" back >Edit Customer Profile </font> </div>
                        <p>
                        <form action="{{URL::to('editCustPrivIndiv')}}" method="POST">
                        <div class="input-field">                 
                          <input value="{{$individual->strCustPrivIndivID}}" id="editIndiID" name="editIndiID" type="text" class="" readonly>
                          <label for="indi_id">Individual ID: </label>
                        </div>

                        <div class="input-field">
                          <input required id="editFName" name = "editFName" value = "{{$individual->strCustPrivFName}}" type="text" class="validateFirst">
                          <label for="first_name"> *First Name: </label>
                        </div>

                        <div class="input-field">
                          <input  id="editMName" name = "editMName" value = "{{$individual->strCustPrivMName}}" type="text" class="validateMiddle">
                          <label for="middle_name"> Middle Name: </label>
                        </div>

                        <div class="input-field">
                          <input required id="editLName" name = "editLName" value = "{{$individual->strCustPrivLName}}" type="text" class="validateLast">
                          <label for="last_name"> *Last Name </label>
                        </div>

                        <div class="input-field">
                          <input required id="editAddress" name = "editAddress" value = "{{$individual->strCustPrivAddress}}" type="text" class="validateAddress">
                          <label for="address"> *Address: </label>
                        </div>

                        <div class="input-field">
                          <input id="editEmail" name = "editEmail" value = "{{$individual->strCustPrivEmailAddress}}" type="text" class="validateEmail">
                          <label for="email"> *Email Address: </label>
                        </div>

                        <div class="input-field">
                          <input required id="editCel" name = "editCel" value = "{{$individual->strCustPrivCPNumber}}" type="text" class="validateCell" maxlength="11">
                          <label for="cellphone"> *Cellphone Number: </label>
                        </div>
                      
                        <div class="input-field">
                          <input id="editCelAlt" name = "editCelAlt" value = "{{$individual->strCustPrivCPNumberAlt}}" type="text" class="validateCellAlt" maxlength="11">
                          <label for="cellphone"> *Cellphone Number: (alternate)</label>
                        </div>

                        <div class="input-field">
                          <input id="editPhone" name = "editPhone" value = "{{$individual->strCustPrivLandlineNumber}}" type="text" class="validatePhone" maxlength="10">
                          <label for="tel"> Telephone Number: </label>
                        </div>
                        </p>
                      </div>

                      <div class="modal-footer">
                        <button type="submit" class="waves-effect waves-green btn-flat">Update</button> 
                        <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Cancel</a>    
                      </div>
                    </form>
                  </div>

                    <div id="del{{$individual->strCustPrivIndivID}}" class="modal modal-fixed-footer">
                      <div class="modal-content">
                        <font color = "teal"><h5><center>Are you sure you want to delete?</center></h5></font> 
                        <p>
                         <form action="{{URL::to('delCustPrivIndiv')}}" method="POST">
                          <div class="input-field">
                            <label for="first_name">Individual ID: </label>
                            <input value="{{$individual->strCustPrivIndivID}}" id="delIndivID" name="delIndivID" type="text" class="validate" readonly>
                          </div>

                          <div class="input-field">
                            <label for="first_name">First Name: </label>
                            <input value="{{$individual->strCustPrivFName}}" id="delIndivFName" name="delIndivFName" type="text" class="validate" readonly>
                          </div>

                           <div class="input-field">
                            <label for="middle_name">Middle Name: </label>
                            <input value="{{$individual->strCustPrivMName}}" id="delIndivMName" name="delIndivMName" type="text" class="validate" readonly>
                          </div>

                          <div class="input-field">
                            <input value="{{$individual->strCustPrivLName}}" id="delIndivLName" name="delIndivLName" type="text" class="validate" readonly>
                            <label for="LastName">Last Name: </label>
                          </div>

                          <div class="input-field">
                            <label for="first_name">Address: </label>
                            <input value="{{$individual->strCustPrivAddress}}" id="delIndivAddress" name="delIndivAddress" type="text" class="validate" readonly>
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
             

            <div id="addCusIndi" class="modal modal-fixed-footer">
              <div class = "label"><font color = "teal" size = "+3" back >Add Customer Profile </font> </div>
              <div class="modal-content">
                <p>

                <form action="{{URL::to('addCustPrivIndiv')}}" method="POST">
                <div class="input-field">                 
                  <input value = "{{$newID}}" id="addIndiID" name="addIndiID" type="text" class="" readonly>
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
                  <label for="last_name"> *Last Name </label>
                </div>

                <div class="input-field">
                  <input id="addAddress" name = "addAddress" type="text" class="validateAddress">
                  <label for="address"> *Address: </label>
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
                </p>
                </div>

              <div class="modal-footer">
                <button type="submit" class="waves-effect waves-green btn-flat">Save</button> 
                <button type="button" onclick="clearData()" class=" modal-action modal-close waves-effect waves-green btn-flat">Cancel</a>     
              </div>
            </form>
            </div>
          </div>            
        </div>
      </div> 
    </div> 
    @stop

@section('scripts')
    <script>
      function clearData(){
          document.getElementById("addFName").value = "";
          document.getElementById("addMName").value = "";
          document.getElementById("addLName").value = "";
          document.getElementById("addAddress").value = "";
          document.getElementById("addEmail").value = "";
          document.getElementById("addCel").value = "";
          document.getElementById("addPhone").value = "";
          
      }

    </script>

    <script type="text/javascript">
      $('.validateFirst').on('input', function() {
        var input=$(this);
        var is_name=input.val();
        if(is_name){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
      });

      $('.validateFirst').blur('input', function() {
        var input=$(this);
        var is_name=input.val();
        if(is_name){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
      });      

      $('.validateMiddle').on('input', function() {
        var input=$(this);
        var is_name=input.val();
        if(is_name){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
      });

      // $('.validateMiddle').blur('input', function() {
      //   var input=$(this);
      //   var is_name=input.val();
      //   if(is_name){input.removeClass("invalid").addClass("valid");}
      //   else{input.removeClass("valid").addClass("invalid");}
      // });

      $('.validateLast').on('input', function() {
        var input=$(this);
        var is_name=input.val();
        if(is_name){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
      });

      $('.validateLast').blur('input', function() {
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

      $('.validateEmail').on('input', function() {
        var input=$(this);
        var re = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
        var is_email=re.test(input.val());
        if(is_email){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
      });

       $('.validateEmail').blur('input', function() {
        var input=$(this);
        var is_name=input.val();
        if(is_name){input.removeClass("invalid").addClass("valid");}
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

      $('.validateCellAlt').on('input', function() {
        var input=$(this);
        var is_name=input.val();
        if(is_name){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
      });

      $('.validateCellAlt').keyup(function() {
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

      $('.validateCellAlt').keyup(function() {
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
        $(this).val($(this).val().replace(/(\d{3})\-?(\d{3})\-?(\d{4})/,'($1)$2-$3'))
      }); 

    </script>

          <!--DATA TABLE SCRIPT-->
    <script type="text/javascript">

      $(document).ready(function() {

          $('.data-custInd').DataTable();
           $('select').material_select();

        setTimeout(function () {
            $('#success-message').hide();
        }, 5000);

      } );

    </script>
@stop