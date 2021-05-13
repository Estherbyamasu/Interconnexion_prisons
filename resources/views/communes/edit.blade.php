@extends('templates.default')

@section('content')

<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Commune</li>
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
              <a href="{{ url('communes') }}" > <button type="button" class="close white-text" data-dismiss="modal" aria-label="Close">
            
            <span aria-hidden="true">&times;</span></a>
          </button></a>
    
    <!--/.row-->

    <div class="row">
        <div class="col-lg-10">
            <div class="panel panel-info">
                <div class="panel-heading">Modifier la commune n&deg; {{ $commune->id }}</div>
                <div class="panel-body">
                    <div class="col-md-12">
                        <form role="form"  action="/communes/{{$commune->id}}"  method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
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
                            </div>
                            <div class="form-group">
                                <label>Nom commune:</label>
                                <input type="text" name="nom_commune" class="form-control" placeholder="Entrez le nom d'une commune"
                                 value="{{$commune->nom_commune}}" >
                            </div>
                            <div class="form-group">
                                <label>Superficie:</label>
                                <input type="text" name="superficie" class="form-control" placeholder="Entrez le superficie"
                                 value="{{$commune->superficie}}" >
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