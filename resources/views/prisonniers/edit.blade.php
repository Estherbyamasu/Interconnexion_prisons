@extends('templates.default')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Prisonniers</h1>
    </div>
</div>

<div class="modal-dialog form-dark" role="document">
    <!--Content-->
<div class="modal-content card-image" >
      <div class="text-white  py-5 px-5 ">
        <!--Header--><div class="modal-header text-center pb-4">
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
<div class="row">
        <div class="col-lg-10">   
<div class="panel panel-info"><!--/.row-->
   
              </div>
              </div>
              </div>
              <a href="{{ url('prisonniers') }}" > <button type="button" class="close white-text" data-dismiss="modal" aria-label="Close">
            
            <span aria-hidden="true">&times;</span></a>
          </button></a>
    
    <!--/.row-->

    <div class="row">
        <div class="col-lg-10">
            <div class="panel panel-info">
                <div class="panel-heading">Modifier le prisonnier n&deg; {{ $prisonnier->id }}</div>
                <div class="panel-body">
                    <div class="col-md-12">
                        <form role="form" action="/prisonniers/{{ $prisonnier->id }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label>Nom prisonnier:</label>
                                <input type="text" name="nom_prisonnier" class="form-control" placeholder="Entrez le nom  du prisonnier"
                                 value="{{ $prisonnier->nom_prisonnier }}" >
                            </div>
                            <div class="form-group">
                                <label>Prenom prisonnier:</label>
                                <input type="text" name="prenom_prisonnier" class="form-control" placeholder="Entrez le prenom du prisonnier"
                                 value="{{ $prisonnier->nom_prisonnier }}" >
                            </div>
                            <div class="form-group">
                                <label>Adresse:</label>
                                <input type="text" name="adresse" class="form-control" placeholder="Entrez l'adresse'"
                                 value="{{ $prisonnier->adresse }}" >
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
<!--/.main-->

@endsection