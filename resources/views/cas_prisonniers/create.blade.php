
@extends('templates.default')

@section('content')

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Cas des prisonniers</li>
        </ol>
    </div>
    <!--/.row-->
    

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">L'ajout' de Cas des prisonniers</h1>
        </div>
    </div>
    <!--/.row-->
    
  
    <div class="row">
        <div class="col-lg-10">
            <div class="panel panel-default">
                
                <div class="panel-body">
                    <div class="col-md-12">
                    <div class="row">
     
                        
                        <form role="form" action="{{ url('cas_prisonniers') }}" method="post">
                            @csrf
 
                            <div class="row">
                                <div class="col-md-6">
                                         <label for="nom_cat_cas">Category</label>
                                        <select name="category_id" id="" class="form-control" 
                                        class="@error('lieu_passation') is-danger @enderror" required>
                                            <option value="">Select category</option>
                                            @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->nom_cat_cas}}</option>
                                            @endforeach
                                            @error('category->id')
                                        <div class="alert alert-danger">{{$message}}</div>
                                        @enderror
                                        </select>
                                    </div>
                                    
                         
                              <div class="col-md-6">
                                <label for="etat"> Prisonnier prison   </label>
                                <select name="prisonnier_prison_id" id="" class="form-control"
                                class ="@error('nom_prisonnier_prison') is-danger @enderror">
                                <option value="">Select prisonnier_prison</option>
                                @foreach($prisonnier_prisons as $prisonnier_prison)
                                <option value="{{$prisonnier_prison->id}}">{{$prisonnier_prison->etat}}</option>
                                @endforeach
                                @error('prisonnier_prison->id')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <label for="code_occupation"> Occupation   </label>
                                <select name="occupation_id" id="" class="form-control"
                                class ="@error('code_occupation') is-danger @enderror">
                                <option value="">Select occupation</option>
                                @foreach($occupations as $occupation)
                                <option value="{{$occupation->id}}">{{$occupation->code_occupation}}</option>
                                @endforeach
                                @error('occupation->id')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                                </select>
                            </div>
                             <div class="col-md-6">
                                <label>Lieu passation:</label>
                                <input type="text" name="lieu_passation" class="form-control" 
                                placeholder="" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                             <label>Date:</label>
                             <input type="date" name="date_cas" class="form-control" 
                             placeholder="" required>
                         </div>
                       
                       
                            <div class="col-md-6">
                            <label>Heure:</label>
                            <input type="time" name="heure_cas" class="form-control" 
                            placeholder="" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Raison:</label>
                            <input type="text" name="raison_cas" class="form-control" 
                            placeholder="" required>
                        </div>
                       
                            <div class="col-md-6">
                            <label>Temoins:</label>
                            <input type="text" name="nbr_temoins" class="form-control" 
                            placeholder="" required>
                        </div>
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

              

<!-- Modal -->

      </div>
     
    </div>
  </div>
</div>
</div>
</div>
</div>
                    </div>
                </div>
            </div><!-- /.panel-->
        </div><!-- /.panel-->
    </div>
</div><!-- /.row -->
</div>
@endsection







{{-- 
@extends('templates.default')

@section('content')
<div class="row">
    <ol class="breadcrumb">
        <li><a href="#">
            <em class="fa fa-home"></em>
        </a></li>
        <li class="active">Cas prison</li>
    </ol>
</div>
<div class="modal-dialog form-dark" role="document">
    <!--Content-->
<div class="modal-content card-image" >
      <div class="text-white  py-5 px-5 ">
        <!--Header--><div class="modal-header text-center pb-4">

              
    
    <!--/.row-->
    <h3 class="modal-title w-100 white-text font-weight-bold" id="myModalLabel"><strong>L'ajout des cas de prisonniers</strong> <a
        class="green-text font-weight-bold"><strong> </strong></a></h3>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-info">
               
                <div class="panel-body">
                    <div class="col-md-12">
                        <form role="form" action="{{ url('cas_prisonniers') }}" method="post">
                            @csrf
 
                            <div class="row">
                                <div class="col-md-6">
                                         <label for="nom_cat_cas">Category</label>
                                        <select name="category_id" id="" class="form-control" 
                                        class="@error('lieu_passation') is-danger @enderror" required>
                                            <option value="">Select category</option>
                                            @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->nom_cat_cas}}</option>
                                            @endforeach
                                            @error('category->id')
                                        <div class="alert alert-danger">{{$message}}</div>
                                        @enderror
                                        </select>
                                    </div>
                                    
                         
                              <div class="col-md-6">
                                <label for="etat"> Prisonnier prison   </label>
                                <select name="prisonnier_prison_id" id="" class="form-control"
                                class ="@error('nom_prisonnier_prison') is-danger @enderror">
                                <option value="">Select prisonnier_prison</option>
                                @foreach($prisonnier_prisons as $prisonnier_prison)
                                <option value="{{$prisonnier_prison->id}}">{{$prisonnier_prison->etat}}</option>
                                @endforeach
                                @error('prisonnier_prison->id')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <label for="code_occupation"> Occupation   </label>
                                <select name="occupation_id" id="" class="form-control"
                                class ="@error('nom_occupation') is-danger @enderror">
                                <option value="">Select occupation</option>
                                @foreach($occupations as $occupation)
                                <option value="{{$occupation->id}}">{{$occupation->etat}}</option>
                                @endforeach
                                @error('occupation->id')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                                </select>
                            </div>
                             <div class="col-md-6">
                                <label>Lieu passation:</label>
                                <input type="text" name="lieu_passation" class="form-control" 
                                placeholder="" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                             <label>Date:</label>
                             <input type="date" name="date_cas" class="form-control" 
                             placeholder="" required>
                         </div>
                       
                       
                            <div class="col-md-6">
                            <label>Heure:</label>
                            <input type="time" name="heure_cas" class="form-control" 
                            placeholder="" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Raison:</label>
                            <input type="text" name="raison_cas" class="form-control" 
                            placeholder="" required>
                        </div>
                       
                            <div class="col-md-6">
                            <label>Temoins:</label>
                            <input type="text" name="nbr_temoins" class="form-control" 
                            placeholder="" required>
                        </div>
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

@endsection --}}