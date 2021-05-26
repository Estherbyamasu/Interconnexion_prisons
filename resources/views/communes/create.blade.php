@extends('templates.default')

@section('content')
<div class="row">
    <ol class="breadcrumb">
        <li><a href="#">
            <em class="fa fa-home"></em>
        </a></li>
        <li class="active">Commune</li>
    </ol>
</div>
<div class="modal-dialog form-dark" role="document">
    <!--Content-->
<div class="modal-content card-image" >
      <div class="text-white  py-5 px-5 ">
        <!--Header--><div class="modal-header text-center pb-4">

              
    
    <!--/.row-->
    <h3 class="modal-title w-100 white-text font-weight-bold" id="myModalLabel"><strong>L'ajout des communes </strong> <a
        class="green-text font-weight-bold"><strong> </strong></a></h3>
    <div class="row">
        <div class="col-lg-10">
            <div class="panel panel-info">
               
                <div class="panel-body">
                    <div class="col-md-8">
                        <form role="form" action="{{ url('communes') }}" method="post">
                            @csrf
 
 
                         
                            <div class="form-group">
                                <label for="nom_province"> Province   </label>
                                <select name="province_id" style="background:gray; color:white" id="" class="form-control"
                                class ="@error('nom_province') is-danger @enderror">
                                <option value="">Select province</option>
                                @foreach($provinces as $province)
                                <option value="{{$province->id}}">{{$province->nom_province}}</option>
                                @endforeach
                                @error('province->id')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                                </select>
                            </div>
 
                            <div class="form-group">
                                <label>Nom commune:</label>
                                <input type="text" name="nom_commune" class="form-control" 
                                placeholder="Saisir le nom commune required>
                            </div>
                            <div class="form-group">
                             <label>Superficie:</label>
                             <input type="text" name="superficie" class="form-control" 
                             placeholder="Saisir le superficie" required>
                         </div>
                        
 
                            <div class="modal-footer">
       <div class="row">
             <div class="text-center mb-3 col-md-6">
               <button type="submit" class=" glyphicon glyphicon-plus btn  btn-primary btn-block btn-rounded z-depth-1">Save</button>
               </div>
               <div class="text-center mb-3 col-md-6">
               <button  type="reset"class="btn btn-outline-info waves-effect ml-auto" data-dismiss="modal">Reset</button>
               </div>
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