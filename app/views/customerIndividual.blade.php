@extends('layouts.master')

@section('content')
    <div class="main-wrapper">
      <div class="row">
        <div class="col s12 m12 l12">
        <span class="page-title"><h4>Customer Individual</h4></span>
        </div>
      </div>

      <div class="row">
        <div class="col s12 m12 l6">
          <button class="modal-trigger waves-effect waves-light btn btn-small center-text" href="#addCusIndi">ADD INDIVIDUAL Customer</button>
          <button class="modal-trigger waves-effect waves-light btn btn-small center-text" href="#modal1">VIEW ALL EMPLOYEES</button>
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
            <th data-field="id">Indivual ID</th>
            <th data-field="fname">First Name</th>
            <th data-field="lname">Last Name</th>
            <th data-field="address">Address</th>
            <th data-field="email">Email Address</th>
            <th data-field="cellphone">Cellphone No.</th>
            <th data-field="Landline">Telephone No.</th>
          </tr>
        </thead>

        <tbody>
          <tr>
            <td>Individual ID</td>
            <td>First Name</td>
            <td>Last Name</td>
            <td>Address</td>
            <td>Email Address</td>
            <td>Cellphone No.</td>
            <td>Telephone No.</td>                  
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
          <span class="card-title"><h5><center>List of Individual Customer</center></h5></span>
          <div class="divider"></div>


          <div class="card-content">
    
            <table class = "centered" align = "center" border = "1">
              <thead>
                <tr>
                  <th data-field="id">Indivual ID</th>
                  <th data-field="fname">First Name</th>
                  <th data-field="lname">Last Name</th>
                  <th data-field="address">Address</th>
                  <th data-field="email">Email Address</th>
                  <th data-field="cellphone">Cellphone No.</th>
                  <th data-field="Landline">Telephone No.</th>

                </tr>
              </thead>

              <tbody>           
                  @foreach($privindiv as $privindiv)
                <tr>
                  <td>{{ $privindiv->strCustPrivIndivID }}</td>
                  <td>{{ $privindiv->strCustFName }}</td>
                  <td>{{ $privindiv->strCustLName }}</td>
                  <td>{{ $privindiv->strCustAddress }} </td>
                  <td>{{ $privindiv->strCustEmailAddress}}</td>                  
                  <td>{{ $privindiv->strCustPhoneNumber }}</td> 
                  <td>{{ $privindiv->strCustLandlineNumber }}</td>
                  <td><button class="modal-trigger waves-effect waves-light btn btn-small center-text" href="#editCusIndi">EDIT</button>

                    <div id="editCusIndi" class="modal">
                      <div class = "label"><font color = "teal" size = "+3" back >&nbsp Edit Customer Profile </font> </div>
                        
                      <div class="modal-content">

                        <div class="input-field">                 
                          <input value="editIndiID" id="editIndiID" name="editIndiID" type="text" class="validate" readonly = "readonly">
                          <label for="indi_id">Individual ID: </label>
                        </div>

                        <div class="input-field">
                          <input id="editFName" name = "editFName" value = "editFName" type="text" class="validate">
                          <label for="first_name"> First Name: </label>
                        </div>

                        <div class="input-field">
                          <input id="editLName" name = "editLName" value = "editLName" type="text" class="validate">
                          <label for="last_name"> Last Name </label>
                        </div>

                        <div class="input-field">                                                    
                              <select name='editSex'>
                              <option disabled>Sex</option>
                                  @if($employee->strSex == "M")
                                    <option selected value="{{$employee->strSex}}">Male</option>
                                    <option value="F">Female</option>
                                  @else
                                    <option value="M">Male</option>
                                    <option selected value="{{$employee->strSex}}">Female</option>
                                  @endif
                            </select>    
                          </div>

                        <div class="input-field">
                          <input id="editAddresss" name = "editAddress" value = "editAddress" type="text" class="validate">
                          <label for="address"> Address: </label>
                        </div>

                        <div class="input-field">
                          <input id="editEmail" name = "editEmail" value = "editEmail" type="text" class="validate">
                          <label for="email"> Email Address: </label>
                        </div>

                        <div class="input-field">
                          <input id="editCel" name = "editCel" value = "editCel" type="text" class="validate">
                          <label for="cellphone"> Cellphone Number: </label>
                        </div>
                      
                        <div class="input-field">
                          <input id="editPhone" name = "editPhone" value = "editPhone" type="text" class="validate">
                          <label for="tel"> Telephone Number: </label>
                        </div>

                      </div>


                      <div class="modal-footer">
                        <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Cancel</a>
                        <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Update</a>     
                      </div>

                    </div>
                 </td> 
                </tr>
              </tbody>
            </table>
             

            <div id="addCusIndi" class="modal">
              <div class = "label"><font color = "teal" size = "+3" back >&nbsp Add Customer Profile </font> </div>
              <div class="modal-content">

                <div class="input-field">                 
                  <input value = "addIndiID" id="addIndiID" name="addIndiID" type="text" class="validate" readonly = "readonly">
                  <label for="indi_id">Individual ID: </label>
                </div>

                <div class="input-field">
                  <input id="addFName" name = "addFName" type="text" class="validate">
                  <label for="first_name"> First Name: </label>
                </div>

                <div class="input-field">
                  <input id="addLName" name = "addLName" type="text" class="validate">
                  <label for="last_name"> Last Name </label>
                </div>

                <div class="input-field">                                                    
                              <select name='addSex' id='addSex' required>
                              <option selected disabled>Sex</option>
                                      <option value="M">Male</option>
                                      <option value="F">Female</option>
                            </select>    
                      </div>

                <div class="input-field">
                  <input id="addAddresss" name = "addAddress" type="text" class="validate">
                  <label for="address"> Address: </label>
                </div>

                <div class="input-field">
                  <input id="addEmail" name = "addEmail" type="text" class="validate">
                  <label for="email"> Email Address: </label>
                </div>

                <div class="input-field">
                  <input id="addCel" name = "addCel" type="text" class="validate">
                  <label for="cellphone"> Cellphone Number: </label>
                </div>

                <div class="input-field">
                  <input id="addPhone" name = "addPhone" type="text" class="validate">
                  <label for="tel"> Telephone Number: </label>
                </div>

                </div>

              <div class="modal-footer">
                <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Cancel</a>
                <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Save</a>      
              </div>

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
