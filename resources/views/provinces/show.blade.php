@extends('templates.default')

@section('content')

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Communes</li>
        </ol>
    </div>
    <!--/.row-->

    <div class="row">
    <div class="col-lg-12">  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
    <div class="modal-header text-center pb-4">
        <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    
        <div class="col-md-12">
            
            <a href="{{ url('provinces') }}" > <button type="button" class="close white-text" data-dismiss="modal" aria-label="Close">
            
            <span aria-hidden="true">&times;</span></a>
          </button></a>
        </div>
        
       
    </div>
    <!--/.row-->

    <div class="row">
        <div class="col-md-12">
     
        <div class="row">
          <div class="col-md-12">
            <div class="panel panel-default">
          
            <div class="panel-body">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Nouveau de Commune
</button>
                <div class="panel-heading">Liste des communes appartenant dans la province {{ $province_commune->nom_province}}</div>
                
            <div class="modal-content">
      <!--Modal cascading tabs-->
      <div class="modal-body text-center mb-1">
                        
      <table  id="example1" class="table table-bordered table-hover table-striped">
                        <legend>  liste des communes </legend>
                            <thead>
                                <tr>
                                <th>ID</th>
                                
                                <th>Nom commune</th>
                                <th>Superfie</th>
                               
                             <th scope="col">Options</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($province_commune->communes as $commune)
                            <tr>
                            <td>{{$commune->id}}</td>
                            
                            <td>{{$commune->nom_commune}}</td>
                            <td>{{$commune->superficie}}  
                            

                                    <td>
                                        <a href="communes/edit/{{$commune->id}}"  class="glyphicon glyphicon-edit   btn btn-info">edit</a>
                                        
                                        <form action="communes/destroy/{{ $commune->id}}" method="post" class="form-inline">
                                        @csrf
                                <button type="submit" onclick="return confirm('Voulez vs vraiment supprimer cette commune ?')" class="glyphicon glyphicon-delite glyphicon-trash   btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>

                        </table>
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title" id="exampleModalLabel">L'ajout des communes</h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="panel panel-default">
               
               <div class="panel-body">
                   <div class="col-md-8">
                       <form role="form" action="/provincees/storecommune" method="POST">
                           @csrf


                      


                   
                             
                            <div class="row">
                           "> 
                            <div class="form-group">
                            <label for=""> Nom commune</label>
                            <input type="float" style="background:gray; color:white" name="nom_commune" id="" class="form-control"
                            class="@error('nom_commune') is-danger @enderror" placeholder="" required >
                            @error('nom_commune')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                           
                            </div>
                            
                            <div class="form-group">
                            <label for=""> Superficie</label>
                            <input type="text" style="background:gray; color:white" name="superficie" id="" class="form-control"
                            class="@error('superficie') is-danger @enderror" placeholder="" aria-describedby="helpId" required>
                            @error('superficie')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                            
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
                    </div>
                </div>
            </div><!-- /.panel-->
        </div><!-- /.panel-->
    </div>
    </div>
        </div>
        </div> </div>

</div><!-- /.row -->
</div>
<!--/.main-->

@endsection