@extends('templates.default')
 
@section('content')



<div class="row">
    <ol class="breadcrumb">
        <li><a href="#">
            <em class="fa fa-home"></em>
        </a></li>
        <li class="active">Prison</li>
    </ol>
</div><!--/.row-->



<div class="modal-dialog form-dark" role="document">
<!--Content-->
<div class="modal-content card-image" >
<div class="text-white  py-5 px-5 ">
<!--Header--><div class="modal-header text-center pb-4">
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">

      <a href="{{ url('prisons') }}" > <button type="button" class="close white-text" data-dismiss="modal" aria-label="Close">
    
    <span aria-hidden="true">&times;</span></a>
  </button></a>

<!--/.row-->

<div class="row">
<div class="col-lg-10">
    <div class="panel panel-info">
        <div class="panel-heading">Modifier le prison n&deg; {{ $prison->id }}</div>
        <div class="panel-body">
            <div class="col-md-12">
                <form role="form"  action="/prisons/{{$prison->id}}"  method="POST">
                    @csrf
                    @method('PUT')
                    {{-- <div class="form-group">
                        <label>Nom province</label> 
                        <select name="province_id" style="background:gray; color:white" id="" class="form-control"
                        class="@error('nom_province') is-danger @enderror"> 
                        <option value="" >Select Nom province</option>
                        @foreach($provinces as $province)
                        <option value="{{$province->id}}">{{$province->nom_province}}</option>
                        @endforeach
                        @error('province_id')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                        </select>
                    </div> --}}
                    <div class="form-row ">
                        <div class="form-group col-md-6">
                        <label>Nom colline</label> 
                        <select name="colline_id"  id="" class="form-control"
                        class="@error('nom_colline') is-danger @enderror"> 
                        <option value="" >Select Nom colline</option>
                        @foreach($collines as $colline)
                        <option value="{{$colline->id}}">{{$colline->nom_colline}}</option>
                        @endforeach
                        @error('colline_id')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                        </select>
                    </div>
                    {{-- <div class="form-group">
                      <label for="nom_commune" class="col-md-4 control-label">Commune :</label>
                         <div class="col-md-6">
                             <select name="nom_commune" id="commune_id" class="form-control"></select>
                         </div>
                      </div> --}}
             <div class="form-group col-md-6">
                        <label>Type prison:</label>
                        <select name="type_prison" id="type_prison"  value="{{$prison->type_prison}}">
                            
                            <option value="central">prison central</option>
                            <option value="provincial">prison provincial</option>
                            <option value="communial">prison communial</option>
                        </select>
                    </div>
                </div>
                
                    <div class="form-group">
                        <label>Nbre piece:</label>
                        <input type="text" name="nbre_piece" class="form-control" placeholder="Entrez le nbre_piece"
                         value="{{$prison->nbre_piece}}" >
                    </div>
                    <div class="form-group">
                        <label>Fax:</label>
                        <input type="text" name="fax" class="form-control" placeholder="Entrez le fax"
                         value="{{$prison->fax}}" >
                    </div>
                    <div class="form-group">
                        <label>Adresse:</label>
                        <input type="text" name="adresse_complete" class="form-control" placeholder="Entrez le adresse_complete"
                         value="{{$prison->adresse_complete}}" >
                    </div>
                    
                    <div class="form-group">
                        <label>Code prison:</label>
                        <input type="text" name="code_prison" class="form-control" placeholder="Entrez le code_prison"
                         value="{{$prison->code_prison}}" >
                    </div>
                    <div class="row">
    <div class="text-center mb-3 col-md-6">
      <button type="submit" class=" glyphicon glyphicon-edit btn btn-success btn-block btn-rounded z-depth-1">Modifier</button>
      </div>
     
     </div>
                </form>
            </div>
        </div>
        </div>
</div>
</div>
</div>
    </div><!-- /.panel-->
</div><!-- /.panel-->
</div><!-- /.col-->
</div><!-- /.row -->
</div>


@endsection
