
@extends('layouts.master')

@section('content')
    <div class="main-wrapper">
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
          @foreach($individual2 as $individual2)
            @if($individual2->boolIsActive == 0)
            <tr>
              <td>{{ $individual2->strCustPrivIndivID }}</td>
              <td>{{ $individual2->strCustPrivFName }}</td>
              <td>{{ $individual2->strCustPrivLName }}</td>
              <td>{{ $individual2->strCustPrivAddress }} </td>
              <td>{{ $individual2->strCustPrivEmailAddress}}</td>                  
              <td>{{ $individual2->strCustPrivCPNumber }}</td> 
              <td>{{ $individual2->strCustPrivLandlineNumber }}</td>       
              <td>          
              <form action="/reactCustPrivIndiv" method="POST">
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
      <a href="#!" class="modal-action modal-close  waves-effect waves-green btn-flat">CLOSE</a>
    </div>
  </div>
    

    <div class="row">
      <div class="col s12 m12 l12">
        <div class="card-panel">
          <span class="card-title"><h5><center>List of Individual Customer</center></h5></span>
          <div class="divider"></div>


          <div class="card-content">

            <div class="col s12 m12 l12 overflow-x">
    
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
                  @foreach($individual as $individual)
                  @if($individual->boolIsActive == 1)
                <tr>
                  <td>{{ $individual->strCustPrivIndivID }}</td>
                  <td>{{ $individual->strCustPrivFName }}</td>
                  <td>{{ $individual->strCustPrivLName }}</td>
                  <td>{{ $individual->strCustPrivAddress }} </td>
                  <td>{{ $individual->strCustPrivEmailAddress}}</td>                  
                  <td>{{ $individual->strCustPrivCPNumber }}</td> 
                  <td>{{ $individual->strCustPrivLandlineNumber }}</td>
                  <td><button class="modal-trigger waves-effect waves-light btn btn-small center-text" href="#edit{{$individual->strCustPrivIndivID}}">EDIT</button></td>      
                  <td><button class="modal-trigger waves-effect waves-light btn btn-small center-text" href="#del{{$individual->strCustPrivIndivID}}">DELETE</button>


                    <div id="edit{{$individual->strCustPrivIndivID}}" class="modal modal-fixed-footer">
                      <div class="modal-content">
                      <div class = "label"><font color = "teal" size = "+3" back >Edit Customer Profile </font> </div>
                        <p>
                          <form action="/editCustPrivIndiv" method="POST">
                        <div class="input-field">                 
                          <input value="{{$individual->strCustPrivIndivID}}" id="editIndiID" name="editIndiID" type="text" class="validate" readonly>
                          <label for="indi_id">Individual ID: </label>
                        </div>

                        <div class="input-field">
                          <input id="editFName" name = "editFName" value = "{{$individual->strCustPrivFName}}" type="text" class="validate" required>
                          <label for="first_name"> First Name: </label>
                        </div>

                        <div class="input-field">
                          <input id="editLName" name = "editLName" value = "{{$individual->strCustPrivLName}}" type="text" class="validate" required>
                          <label for="last_name"> Last Name </label>
                        </div>

                        <div class="input-field">
                          <input id="editAddresss" name = "editAddress" value = "{{$individual->strCustPrivAddress}}" type="text" class="validate">
                          <label for="address"> Address: </label>
                        </div>

                        <div class="input-field">
                          <input id="editEmail" name = "editEmail" value = "{{$individual->strCustPrivEmailAddress}}" type="text" class="validate">
                          <label for="email"> Email Address: </label>
                        </div>

                        <div class="input-field">
                          <input id="editCel" name = "editCel" value = "{{$individual->strCustPrivCPNumber}}" type="text" class="validate">
                          <label for="cellphone"> Cellphone Number: </label>
                        </div>
                      
                        <div class="input-field">
                          <input id="editPhone" name = "editPhone" value = "{{$individual->strCustPrivLandlineNumber}}" type="text" class="validate">
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
                         <form action="/delCustPrivIndiv" method="POST">
                          <div class="input-field">
                            <label for="first_name">Individual ID: </label>
                            <input value="{{$individual->strCustPrivIndivID}}" id="delIndivID" name="delIndivID" type="text" class="validate" readonly>
                          </div>

                          <div class="input-field">
                            <label for="first_name">First Name: </label>
                            <input value="{{$individual->strCustPrivFName}}" id="delIndivFName" name="delIndivFName" type="text" class="validate" readonly>
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

                <form action="/addCustPrivIndiv" method="POST">
                <div class="input-field">                 
                  <input value = "{{$newID}}" id="addIndiID" name="addIndiID" type="text" class="validate" readonly>
                  <label for="indi_id">Individual ID: </label>
                </div>

                <div class="input-field">
                  <input id="addFName" name = "addFName" type="text" class="validate" required>
                  <label for="first_name"> First Name: </label>
                </div>

                <div class="input-field">
                  <input id="addLName" name = "addLName" type="text" class="validate" required>
                  <label for="last_name"> Last Name </label>
                </div>

                <div class="input-field">
                  <input id="addAddress" name = "addAddress" type="text" class="validate">
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
                </p>
                </div>

              <div class="modal-footer">
                <button type="submit" class="waves-effect waves-green btn-flat">Save</button> 
                <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Cancel</a>     
              </div>
            </form>
            </div>
          </div>            
        </div>
      </div> 
    </div> 
    @stop

@section('scripts')
@stop