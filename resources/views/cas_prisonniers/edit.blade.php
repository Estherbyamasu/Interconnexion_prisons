



@extends('templates.default')

@section('content')

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    
    <!--/.row-->
    

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Guichets</h1>
        </div>
    </div>
    <!--/.row-->
    
  
    <div class="row">
        <div class="col-lg-10">
            <div class="panel panel-default">
                
                <div class="panel-body">
                    <div class="col-md-12">
                    <div class="row">
     
      
                        <div class="modal-body text-center mb-1">
                            <a href="{{url('cas_prisonniers')}}" > <button type="button" class="close white-text" data-dismiss="modal" aria-label="Close">
                                
                                <span aria-hidden="true">&times;</span></a>
                              </button></a>
                                    <div class="card-header"><h2>Modification des cas des prisonniers</h2></div>
                    
                                    
                                    <div class="card-body">
                    
                                        <form role="form"  action="/cas_prisonniers/{{$cas_prisonnier->id}}"  method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-group">
                                                <label>Categorie</label> 
                                                <select name="category_id"  id="" class="form-control"
                                                class="@error('nom_cat_cas') is-danger @enderror"> 
                                                <option value="" >Select categorie</option>
                                                @foreach($categories as $category)
                                                <option value="{{$category->id}}">{{$category->nom_cat_cas}}</option>
                                                @endforeach
                                                @error('category_id')
                                                <div class="alert alert-danger">{{$message}}</div>
                                                @enderror
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Prisonnier prison</label> 
                                                <select name="prisonnier_prison_id"  id="" class="form-control"
                                                class="@error('etat') is-danger @enderror"> 
                                                <option value="" >Select prisonnier prison</option>
                                                @foreach($prisonnier_prisons as $prisonnier_prison)
                                                <option value="{{$prisonnier_prison->id}}">{{$prisonnier_prison->etat}}</option>
                                                @endforeach
                                                @error('prisonnier_prison_id')
                                                <div class="alert alert-danger">{{$message}}</div>
                                                @enderror
                                                </select>
                                            </div>
                
                                            <div class="form-group">
                                                <label>Code occupation</label> 
                                                <select name="occupation_id"  id="" class="form-control"
                                                class="@error('code_occupation') is-danger @enderror"> 
                                                <option value="" >Select code occupation</option>
                                                @foreach($occupations as $occupation)
                                                <option value="{{$occupation->id}}">{{$occupation->code_occupation}}</option>
                                                @endforeach
                                                @error('occupation_id')
                                                <div class="alert alert-danger">{{$message}}</div>
                                                @enderror
                                                </select>
                                            </div>
                                            
                                            <div class="row">
                                                <div class="col-md-6">
                                                <label>Lieu passation:</label>
                                                <input type="text" name="lieu_passation" class="form-control" placeholder="Entrez le lieu passation"
                                                 value="{{$cas_prisonnier->lieu_passation}}" >
                                            </div>
                                          
                                                <div class="col-md-6">
                                                <label>Date:</label>
                                                <input type="date" name="date_cas" class="form-control" placeholder="Entrez la date"
                                                 value="{{$cas_prisonnier->date_cas}}" >
                                            </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                <label>heure:</label>
                                                <input type="time" name="heure_cas" class="form-control" placeholder=""
                                                 value="{{$cas_prisonnier->heure_cas}}" >
                                            </div>
                                          
                                                <div class="col-md-6">
                                                <label>Raison:</label>
                                                <input type="text" name="raison_cas" class="form-control" placeholder="Entrez le lieu passation"
                                                 value="{{$cas_prisonnier->raison_cas}}" >
                                            </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Tempoins:</label>
                                                <input type="text" name="nbr_temoins" class="form-control" placeholder="Entrez le nbr_temoinsn"
                                                 value="{{$cas_prisonnier->nbr_temoins}}" >
                                            </div>
                                            <div class="row">
                            <div class="text-center mb-3 col-md-6">
                              <button type="submit" class=" glyphicon glyphicon-edit btn btn-success btn-block btn-rounded z-depth-1">Modifier</button>
                              </div>
                             
                             </div>
                                        </form>
                                     
                                @csrf
                                
                        </div>
                                </div>
                              
                       
              

                    </div>
                </div>
            </div><!-- /.panel-->
        </div><!-- /.panel-->
    </div>
</div><!-- /.row -->
</div>
<!--/.main-->

@endsection