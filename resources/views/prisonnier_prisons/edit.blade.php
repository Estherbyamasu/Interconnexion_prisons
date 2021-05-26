@extends('templates.default')

@section('content')

<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Prisonner prison</li>
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
    <h3 class="modal-title w-100 white-text font-weight-bold color_siew" id="myModalLabel"><strong>Modification de la commune</strong> <a
              class="green-text font-weight-bold"><strong> </strong></a></h3>
              </div>
              </div>
              </div>
              <a href="{{ url('prisonnier_prisons') }}" > <button type="button" class="close white-text" data-dismiss="modal" aria-label="Close">
            
            <span aria-hidden="true">&times;</span></a>
          </button></a>
    
    <!--/.row-->

    <div class="row">
        <div class="col-lg-10">
            <div class="panel panel-info">
                <div class="panel-heading">Modifier le prisonnier prison n&deg; {{ $prisonnier_prison->id }}</div>
                <div class="panel-body">
                    <div class="col-md-12">
                        <form role="form"  action="/prisonnier_prisons/{{$prisonnier_prison->id}}"  method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label>Type prison</label> 
                                <select name="prison_id"  id="" class="form-control"
                                class="@error('type_prison') is-danger @enderror"> 
                                <option value="" >Select type prison</option>
                                @foreach($prisons as $prison)
                                <option value="{{$prison->id}}">{{$prison->type_prison}}</option>
                                @endforeach
                                @error('prison_id')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Nom prisonnier</label> 
                                <select name="prisonnier_id"  id="" class="form-control"
                                class="@error('nom_prisonnier') is-danger @enderror"> 
                                <option value="" >Select Nom prisonnier</option>
                                @foreach($prisonniers as $prisonnier)
                                <option value="{{$prisonnier->id}}">{{$prisonnier->nom_prisonnier}}</option>
                                @endforeach
                                @error('prisonnier_id')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label>Etat:</label>
                                <input type="text" name="etat" class="form-control" placeholder="Entrez le etat"
                                 value="{{$prisonnier_prison->etat}}" >
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