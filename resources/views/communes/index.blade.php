@extends('templates.default')

@section('content')

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Commune</li>
        </ol>
    </div>
    <!--/.row-->
    

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"> Communes</h1>
        </div>
    </div>
    <!--/.row-->
    
  
    <div class="row">
        <div class="col-lg-10">
            <div class="panel panel-default">
                
                <div class="panel-body">
                    <div class="col-md-12">
                    <div class="row">
     
       
                        <a href="communes/create/"  class="glyphicon glyphicon-edit   btn btn-info">Nouveau Commune</a>
                        <table  id="example1" class="table table-bordered table-hover table-striped">
                        <legend>  liste des communes </legend>
                            <thead>
                                <tr>
                                <th>ID</th>
                                <th>Nom Province </th>
                                <th>Nom commune</th>
                                <th>Superficie</th>
                                
                                    <th scope="col">Options</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($communes as $commune)
                            <tr>
                            <td>{{$commune->id}}</td>
                            <td>{{$commune->nom_province}}</td>
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

              

<!-- Modal -->

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