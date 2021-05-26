@extends('templates.default')

@section('content')

<div class="modal-dialog form-dark" role="document">
    <!--Content-->
{{-- <div class="modal-content card-image" >
      <div class="text-white  py-5 px-5 ">
        <!--Header--><div class="modal-header text-center pb-4">
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main"> --}}
<div class="row">
        <div class="col-lg-12">   
<div class="panel panel-info"><!--/.row-->
    <h3 class="modal-title w-100 white-text font-weight-bold" id="myModalLabel"><strong>Modification des personnels</strong> <a
              class="green-text font-weight-bold"><strong> </strong></a></h3>
              </div>
              </div>
              </div>
              <a href="{{ url('personnels') }}" > <button type="button" class="close white-text" data-dismiss="modal" aria-label="Close">
            
            <span aria-hidden="true">&times;</span></a>
          </button></a>
    
    <!--/.row-->

    <div class="row">
        <div class="col-lg-10">
            <div class="panel panel-info">
                <div class="panel-heading">Modifier le personnel n&deg; {{ $personnel->id }}</div>
                <div class="panel-body">
                    <div class="col-md-12">
                        <form role="form" action="/personnels/{{ $personnel->id }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-lg-6">
                                <label>Nom personnel:</label>
                                <input type="text" name="nom_personnel" class="form-control" placeholder="" value="{{ $personnel->nom_personnel }}" >
                            </div>
                            <div class="col-lg-6">
                                <label>Prenom personnel:</label>
                                <input type="text" name="prenom_personnel" class="form-control" placeholder="" value="{{ $personnel->prenom_personnel }}" >
                            </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                <label>Genre:</label>
                                <input type="text" name="genre" class="form-control" placeholder="" value="{{ $personnel->genre }}" >
                            </div>
                            <div class="col-lg-6">
                                <label>Telephone:</label>
                                <input type="text" name="tel" class="form-control" placeholder="" value="{{ $personnel->tel }}" >
                            </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                <label>Adresse:</label>
                                <input type="text" name="adresse" class="form-control" placeholder="" value="{{ $personnel->adresse }}" >
                            </div>
                            <div class="col-lg-6">
                                <label>Email:</label>
                                <input type="text" name="email" class="form-control" placeholder="" value="{{ $personnel->email }}" >
                            </div>
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