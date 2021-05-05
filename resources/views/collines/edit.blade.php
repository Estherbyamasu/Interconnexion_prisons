@extends('templates.default')
 
@section('content')



<div class="row">
    <ol class="breadcrumb">
        <li><a href="#">
            <em class="fa fa-home"></em>
        </a></li>
        <li class="active">Colline</li>
    </ol>
</div><!--/.row-->



<div class="modal-dialog form-dark" role="document">
<!--Content-->
<div class="modal-content card-image" >
<div class="text-white  py-5 px-5 ">
<!--Header--><div class="modal-header text-center pb-4">
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
<div class="row">
<div class="col-lg-10">   
<div class="panel panel-info"><!--/.row-->
<h3 class="modal-title w-100 white-text font-weight-bold color_siew" id="myModalLabel"><strong>Modification de la colline</strong> <a
      class="green-text font-weight-bold"><strong> </strong></a></h3>
      </div>
      </div>
      </div>
      <a href="{{ url('collines') }}" > <button type="button" class="close white-text" data-dismiss="modal" aria-label="Close">
    
    <span aria-hidden="true">&times;</span></a>
  </button></a>

<!--/.row-->

<div class="row">
<div class="col-lg-10">
    <div class="panel panel-info">
        <div class="panel-heading">Modifier la colline n&deg; {{ $colline->id }}</div>
        <div class="panel-body">
            <div class="col-md-12">
                <form role="form"  action="/collines/{{$colline->id}}"  method="POST">
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
                    <div class="form-group">
                        <label>Nom commune</label> 
                        <select name="commune_id" style="background:gray; color:white" id="" class="form-control"
                        class="@error('nom_commune') is-danger @enderror"> 
                        <option value="" >Select Nom commune</option>
                        @foreach($communes as $commune)
                        <option value="{{$commune->id}}">{{$commune->nom_commune}}</option>
                        @endforeach
                        @error('commune_id')
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
                    <div class="form-group">
                        <label>Nom colline:</label>
                        <input type="text" name="nom_colline" class="form-control" placeholder="Entrez le nom d'une colline"
                         value="{{$colline->nom_colline}}" >
                    </div>
                    <div class="form-group">
                        <label>Superficie:</label>
                        <input type="text" name="superficie" class="form-control" placeholder="Entrez le superficie"
                         value="{{$colline->superficie}}" >
                    </div>
                    <div class="form-group ">
                        <label for=""> <b>Etat  </b></label>
                        <input type="text" name="etat" class="form-control" placeholder="Entrez le etat"
                         value="{{$colline->etat}}" >
                        {{-- <div class="control  d-inline">
                            <label class="radio ">
                                <input type="radio" name="etat" value="1" >
                                Active
                            </label>
                            <label class="radio   d-inline">
                                <input type="radio" name="etat" value="0">
                                Desactive
                            </label>
                        </div> --}}
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


{{-- <div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Edition d'une colline</div>
 
                <div class="panel-body">
                    @if (session()->has('success'))
                        <div class="alert alert-success" role="alert">{{ session('success') }}</div>
                    @endif
                    <form method="POST" action="/collines/{{$colline->id}} " accept-charset="UTF-8" class="form-horizontal panel">
                         
                        {!! csrf_field() !!}
                        <input name="_method" type="hidden" value="PUT">
 
                        <div class="form-group ">
                            <label for="nom_colline" class="col-md-4 control-label">Nom colline :</label>
                            <div class="col-md-6">
                                <input class="form-control" name="nom_colline" type="text" id="nom_colline" 
                      value="{{ old('nom_colline', $colline->nom_colline) }}">
                                @if ($errors->has('nom_colline'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nom_colline') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                  <div class="form-group ">
                                <label for="superficie" class="col-md-4 control-label">Superficie :</label>
                                <div class="col-md-6">
                                    <input class="form-control" name="superficie" type="text" id="superficie" 
                          value="{{ old('superficie', $colline->superficie) }}">
                                    @if ($errors->has('superficie'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('superficie') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                              <div class="form-group ">
                                    <label for="etat" class="col-md-4 control-label">Nom colline :</label>
                                    <div class="col-md-6">
                                        <input class="form-control" name="etat" type="text" id="etat" 
                              value="{{ old('etat', $colline->etat) }}">
                                        @if ($errors->has('etat'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('etat') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                        <div class="form-group">
                            <label for="nom_province" class="col-md-4 control-label">Province :</label>
                            <div class="col-md-6">
                                <select name="province_id" id="" class="form-control">
                                    @foreach($provinces as $province)
                                        <option value="{{ $province->id }}">{{ $province->nom_province}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
 
                        <div class="form-group">
                            <label for="nom_commune" class="col-md-4 control-label">Commune :</label>
                            <div class="col-md-6">
                                <select name="nom_commune" id="commune_id" class="form-control"></select>
                            </div>
                        </div>
 
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Envoyer
                                </button>
                            </div>
                        </div>
 
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection
 
{{-- @section('scripts')
<script>
$(function() {
 
    // Récupération des id pour pays et ville
    var province_id = {{ old('provinces', $colline->commune->province->id) }};
    var commune_id = {{ old('communes', $colline->commune->id) }};
 
    // Sélection du pays
    $('#provinces').val(province_id).prop('selected', true);
    // Synchronisation des villes
    communeUpdate(province_id);
 
    // Changement de pays
    $('#provinces').on('change', function(e) {
        var province_id = e.target.value;
        commune_id = false;
        communeUpdate(province_id);
    });
 
    // Requête Ajax pour les villes
    function communeUpdate(provinceId) {
        $.get('{{ url('communes') }}/'+ provinceId + "'", function(data) {
            $('#communes').empty();
            $.each(data, function(index, communes) {
                $('#communes').append($('<option>', { 
                    value: communes.id,
                    text : communes.nom_commune 
                }));
            });
            if(commune_id) {
                $('#communes').val(commune_id).prop('selected', true);
            }
        });
    }
     
});
</script> --}}
{{-- @endsection --}}
