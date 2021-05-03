@extends('templates.default')

@section('content')

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Provinces</li>
        </ol>
    </div>
    <!--/.row-->
    

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"> Provinces </h1>
        </div>
    </div>
    <!--/.row-->
    
  
    <div class="row">
        <div class="col-lg-10">
            <div class="panel panel-default">
                
                <div class="panel-body">
                    <div class="col-md-12">
                    <div class="row">
     
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Nouveau Province
</button>

                        <table  id="example1" class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                <th>ID</th>
                                 <th>Nom province</th>
                                 <th>Superficie</th>
                                 <th>Chef lieu</th>
                                    <th scope="col">Options</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($provinces as $province)
                            <tr>
                            <td>{{$province->id}}</td>
                            <td>{{$province->nom_province}}</td>
                            <td>{{$province->Superficie}}</td>
                            <td>{{$province->chef_lieu}}</td>
                                    <td>
                                        <a href="provinces/edit/{{$province->id}}"  class="glyphicon glyphicon-edit   btn btn-info">edit</a>
                                        <a href="provinces/show/{{$province->id}}" class="glyphicon glyphicon-play btn btn-success" >vor les communes</a>
                                        <form action="provinces/destroy/{{ $province->id}}" method="post" class="form-inline">
                                        @csrf
                                <button type="submit" onclick="return confirm('Voulez vs vraiment supprimer cette categorie ?')" 
                                class="glyphicon glyphicon-delite glyphicon-trash   btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>

                        </table>

              

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title" id="exampleModalLabel">L'ajout des provinces</h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="panel panel-default">
               
               <div class="panel-body">
                   <div class="col-md-8">
                       <form role="form" action="{{ url('provinces') }}" method="post">
                           @csrf


                           <!-- <div class="form-group">
						<label>Nom_compte</label> 
						 <input type="text" name="nom_categorie_compte" class="form-control" 
                          placeholder="Saisir le nom categorie_compte" 
						class="form-control" class="@error('nom_categorie_compte') is-danger @enderror">
						@error('nom_categorie_compte')
						<div class="alert alert-danger">{{$message}}</div>
						@enderror
					</div> -->


                           <div class="form-group">
                               <label>Nom province:</label>
                               <input type="text" name="nom_province" class="form-control" 
                               placeholder="Saisir le nom province" required>
                           </div>
                           <div class="form-group">
                            <label>Superficie:</label>
                            <input type="text" name="Superficie" class="form-control" 
                            placeholder="Saisir le superficie" required>
                        </div>
                        <div class="form-group">
                            <label>Chef lieu:</label>
                            <input type="text" name="chef_lieu" class="form-control" 
                            placeholder="Saisir le chef lieu" required>
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