@extends('layouts.master')

@section('content')
    <div class="row">
      <div class="col s12 m12 l12">
        <div class="card-panel">
            <span class="card-title"><h4>Garments</h4></span>
          <div class="divider"></div>
          <div class="card-content">

          <a class="waves-effect waves-light btn modal-trigger" href="#add">ADD</a>
    
              <table class = "centered" align = "center" border = "1">
              <thead>
                  <tr>
                    <th data-field="id">Garment ID</th>
                    <th data-field="garmentName">Garment Name</th>
                    <th data-field="garmentDescription">Garment Description</th>
                    </tr>
                  <thead>
                  <tbody>
                    <td>id</td>
                    <td>Garment Name</td>
                    <td>Garment Description</td>
                    <td><button class="modal-trigger waves-effect waves-light btn btn-small center-text" href="#edit">EDIT</button>
                    


                  </tbody>
                  </table>

                <div id="edit" class="modal">
                  <div class = "label"><font color = "teal" size = "+3" back >&nbsp Garment
                 </font> </div>
                <div class="modal-content">

                <div class="input-field">
                 <input id="GarmentName" type="text" class="validate">
                 <label for="garment_name">Garment Name: </label>
                </div>

                <div class="input-field">
                 <input id="GarmentDescription" type="text" class="validate">
                 <label for="garment_description">Garment Desription: </label>
                </div>

                <div class="modal-footer">
                  <a href="cancel" class=" modal-action modal-close waves-effect waves-green btn">Cancel</a>
                   <a href="save" class=" modal-action modal-close waves-effect waves-green btn">Save</a> 
                </div>

          </div>

        
          </div>
        </div>

          <div id="add" class="modal">
                  <div class = "label"><font color = "teal" size = "+3" back >&nbsp Garment
                 </font> </div>
                <div class="modal-content">

                <div class="input-field">
                 <input id="GarmentName" type="text" class="validate">
                 <label for="garment_name">Garment Name: </label>
                </div>

                <div class="input-field">
                 <input id="GarmentDescription" type="text" class="validate">
                 <label for="garment_description">Garment Desription: </label>
                </div>

                <div class="modal-footer">
                  <a href="cancel" class=" modal-action modal-close waves-effect waves-green btn">Cancel</a>
                   <a href="save" class=" modal-action modal-close waves-effect waves-green btn">Save</a> 
                </div>
      </div>
    </div>  

@stop

@section('content')
    {{ HTML::script('js/jquery-2.1.4.min.js') }}
    {{ HTML::script('js/materialize.min.js') }}
    {{ HTML::script('js/forModal.js') }}

@stop