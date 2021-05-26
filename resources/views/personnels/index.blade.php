@extends('templates.default')

@section('content')

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Personnels</li>
        </ol>
    </div>
    <!--/.row-->
    

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Personnels</h1>
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
  Nouveau Personnel
</button>

                        <table  id="example1" class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Nom personnel</th>
                                    <th scope="col">Prenom personnel</th>
                                    <th scope="col">Genre</th>
                                    <th scope="col">Telephone</th>
                                    <th scope="col">Adresse</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Options</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($personnels as $personnel)
                                <tr>
                                    <td>{{ $personnel->id }}</td>
                                    <td>{{ $personnel->nom_personnel }}</td>
                                    <td>{{ $personnel->prenom_personnel }}</td>
                                    <td>{{ $personnel->genre}}</td>
                                    <td>{{ $personnel->tel }}</td>
                                    <td>{{ $personnel->adresse }}</td>
                                    <td>{{ $personnel->email }}</td>
                                    <td>
                                        <a href="personnels/edit/{{ $personnel->id }}" class="glyphicon glyphicon-edit   btn btn-info">edit</a>
                                      
                                        <form action="personnels/destroy/{{ $personnel->id }}" method="post" class="form-inline">
                                        @csrf
                                <button type="submit" onclick="return confirm('Voulez vs vraiment supprimer cette personnel ?')" class="glyphicon glyphicon-delite glyphicon-trash   btn btn-danger">Delete</button>
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
        <h2 class="modal-title" id="exampleModalLabel">L'ajout des personnels</h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="panel panel-default">
               
               <div class="panel-body">
                   <div class="col-md-8">
                       <form role="form" action="{{ url('personnels') }}" method="post">
                           @csrf
                           <div class="row">
                            <div class="col-lg-6"> 
                               <label>Nom personnel:</label>
                               <input type="text" name="nom_personnel" class="form-control"
                                placeholder="" required>
                           </div>
                           <div class="col-lg-6"> 
                            <label>Prenom personnel:</label>
                            <input type="text" name="prenom_personnel" class="form-control"
                             placeholder="" required>
                        </div>
                      
                        <div class="row">
                        <div class="col-lg-6">
                            <label>Genre:</label>  <br />
                            
                            <select name="genre" id="genre"  style="width:150px; height:32px ;"
                                >
                                <option value="feminin">Feminin</option>
                                <option value="masculin">Masculin</option>
                            </select>
                        </div>
                        <div class="col-lg-6">

                            <label>Telephone:</label>
                            <input type="text" name="tel" class="form-control"
                             placeholder="" required>
                        </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <label>Adresse:</label>
                                <input type="text" name="adresse" class="form-control"
                                 placeholder="" required>
                            </div>
                            <div class="col-lg-6">
    
                                <label>Email:</label>
                                <input type="text" name="email" class="form-control"
                                 placeholder=" " required>
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
  </div>
</div>
                    </div>
                </div>
            </div><!-- /.panel-->
        </div><!-- /.panel-->
    </div>
</div><!-- /.row -->
</div>
<!--/.main-->

@endsection