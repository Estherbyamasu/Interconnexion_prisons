@extends('templates.default')

@section('content')
<div class="row">
    <ol class="breadcrumb">
        <li><a href="#">
            <em class="fa fa-home"></em>
        </a></li>
        <li class="active">prisonnier prison</li>
    </ol>
</div>
<div class="modal-dialog form-dark" role="document">
    <!--Content-->
<div class="modal-content card-image" >
      <div class="text-white  py-5 px-5 ">
        <!--Header--><div class="modal-header text-center pb-4">

              
    
    <!--/.row-->
    <h3 class="modal-title w-100 white-text font-weight-bold" id="myModalLabel"><strong>L'ajout des prisonnier prisons </strong> <a
        class="green-text font-weight-bold"><strong> </strong></a></h3>
    <div class="row">
        <div class="col-lg-10">
            <div class="panel panel-info">
               
                <div class="panel-body">
                    <div class="col-md-8">
                        <form role="form" action="{{ url('prisonnier_prisons') }}" method="post">
                            @csrf
 
 
                         
                            <div class="form-group">
                                <label for="nom_prisonnier"> Prisonnier   </label>
                                <select name="prisonnier_id"  id="" class="form-control"
                                class ="@error('nom_prisonnier') is-danger @enderror">
                                <option value="">Select prisonnier</option>
                                @foreach($prisonniers as $prisonnier)
                                <option value="{{$prisonnier->id}}">{{$prisonnier->nom_prisonnier}}</option>
                                @endforeach
                                @error('prisonnier->id')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                                </select>
                            </div>
 
                            <div class="form-group">
                                <label for="type_prisonnier"> Prison   </label>
                                <select name="prison_id"  id="" class="form-control"
                                class ="@error('type_prison') is-danger @enderror">
                                <option value="">Select prison</option>
                                @foreach($prisons as $prison)
                                <option value="{{$prison->id}}">{{$prison->type_prison}}</option>
                                @endforeach
                                @error('prison->id')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                                </select>
                            </div>
                            <div class="form-group">
                             <label>Etat:</label>
                             <input type="text" name="etat" class="form-control" 
                             placeholder="" required>
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