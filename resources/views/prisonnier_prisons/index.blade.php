@extends('templates.default')

@section('content')

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Prisonnier Prison</li>
        </ol>
    </div>
    <!--/.row-->
    

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"> Prisonnier Prison</h1>
        </div>
    </div>
    <!--/.row-->
    
  
    <div class="row">
        <div class="col-lg-10">
            <div class="panel panel-default">
                
                <div class="panel-body">
                    <div class="col-md-12">
                    <div class="row">
     
       
                        <a href="prisonnier_prisons/create/"  class="glyphicon glyphicon-edit   btn btn-info">Nouveau prisonnier prison</a>
                        <table  id="example1" class="table table-bordered table-hover table-striped">
                        <legend>  liste des prisonnier prisons </legend>
                            <thead>
                                <tr>
                                <th>ID</th>
                                <th>Nom colline </th>
                                <th>Type prison</th>
                                <th>Nom et Prenom du prisonnier</th>
                                <th>Etat</th>
                                    <th scope="col">Options</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($prisonnier_prisons as $prisonnier_prison)
                            <tr>
                            <td>{{$prisonnier_prison->id}}</td>
                            <td>{{$prisonnier_prison->nom_colline}}</td>
                            <td>{{$prisonnier_prison->type_prison}}</td>
                            <td>{{$prisonnier_prison->nom_prisonnier}} {{$prisonnier_prison->prenom_prisonnier}}  </td>
                            <td>{{$prisonnier_prison->etat}}</td>

                                    <td>
                                        <a href="prisonnier_prisons/edit/{{$prisonnier_prison->id}}"  class="glyphicon glyphicon-edit   btn btn-info">edit</a>
                                        
                                        <form action="prisonnier_prisons/destroy/{{ $prisonnier_prison->id}}" method="post" class="form-inline">
                                        @csrf
                                <button type="submit" onclick="return confirm('Voulez vs vraiment supprimer cette prisonnier_prison ?')" class="glyphicon glyphicon-delite glyphicon-trash   btn btn-danger">Delete</button>
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