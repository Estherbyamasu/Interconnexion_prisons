@extends('templates.default')

@section('content')

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Occupation</li>
        </ol>
    </div>
    <!--/.row-->
    

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"> Occupation</h1>
        </div>
    </div>
    <!--/.row-->
    
  
    <div class="row">
        <div class="col-lg-10">
            <div class="panel panel-default">
                
                <div class="panel-body">
                    <div class="col-md-12">
                    <div class="row">
     
       
                        <a href="occupations/create/"  class="glyphicon glyphicon-plus  btn btn-info">Nouveau occupation</a>
                        <table  id="example1" class="table table-bordered table-hover table-striped">
                        {{-- <legend>  </legend> --}}
                            <thead>
                                <tr>
                                <th>ID</th>
                                
                                <th>Nom personnel</th>
                                <th>Type Prison</th>
                                <th>Nom service </th>
                                <th>Nom fonction</th>
                                <th>Etat</th>
                                <th>Code occupation</th>
                                
                                    <th scope="col">Options</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($occupations as $occupation)
                            <tr>
                            <td>{{$occupation->id}}</td>
                            <td>{{$occupation->nom_personnel}}{{$occupation->prenom_personnel}}  </td>
                            <td>{{$occupation->type_prison}}  </td>
                            <td>{{$occupation->nom_fonction}}  </td>
                            <td>{{$occupation->nom_service}}</td>
                            <td>{{$occupation->etat}}  </td>
                            <td>{{$occupation->code_occupation}}</td>
                            
                           

                                    <td>
                                        <a href="occupations/edit/{{$occupation->id}}"  class="glyphicon glyphicon-edit   btn btn-info">edit</a>
                                        
                                        <form action="occupations/destroy/{{ $occupation->id}}" method="post" class="form-inline">
                                        @csrf
                                <button type="submit" onclick="return confirm('Voulez vs vraiment supprimer cette occupation ?')" class="glyphicon glyphicon-delite glyphicon-trash   btn btn-danger">Delete</button>
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