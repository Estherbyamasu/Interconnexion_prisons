@extends('templates.default')

@section('content')
<div class="row">
    <ol class="breadcrumb">
        <li><a href="#">
            <em class="fa fa-home"></em>
        </a></li>
        <li class="active">Occupation</li>
    </ol>
</div>
<div class="modal-dialog form-dark" role="document">
    <!--Content-->
<div class="modal-content card-image" >
      <div class="text-white  py-5 px-5 ">
        <!--Header--><div class="modal-header text-center pb-4">

              
    
    <!--/.row-->
    <h3 class="modal-title w-100 white-text font-weight-bold" id="myModalLabel"><strong>L'ajout des occupations </strong> <a
        class="green-text font-weight-bold"><strong> </strong></a></h3>
    <div class="row">
        <div class="col-lg-10">
            <div class="panel panel-info">
               
                <div class="panel-body">
                    <div class="col-md-12">
                        <form role="form" action="{{ url('occupations') }}" method="post">
                            @csrf
 
                            <div class="form-group">
                                <label for="type_prison"> Prison   </label>
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
                                <label for="nom_personnel"> personnel   </label>
                                <select name="personnel_id"  id="" class="form-control"
                                class ="@error('nom_personnel') is-danger @enderror">
                                <option value="">Select personnel</option>
                                @foreach($personnels as $personnel)
                                <option value="{{$personnel->id}}">{{$personnel->nom_personnel}}</option>
                                @endforeach
                                @error('personnel->id')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="nom_fonction"> Fonction   </label>
                                <select name="fonction_id"  id="" class="form-control"
                                class ="@error('nom_fonction') is-danger @enderror">
                                <option value="">Select fonction</option>
                                @foreach($fonctions as $fonction)
                                <option value="{{$fonction->id}}">{{$fonction->nom_fonction}}</option>
                                @endforeach
                                @error('fonction->id')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Code occupation:</label>
                                <input type="text" name="code_occupation" class="form-control" 
                                placeholder="" required>
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