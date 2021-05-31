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
            <h1 class="page-header"> Cas des prisonniers</h1>
        </div>
    </div>
    <!--/.row-->
    
  
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                
                <div class="panel-body">
                    <div class="col-md-12">
                    <div class="row">
     
       
                        <a href="cas_prisonniers/create/"  class="glyphicon glyphicon-plus   btn btn-info">Nouveau Cas</a>
                        <table  id="example1" class="table table-bordered table-hover table-striped">
                       
                            <thead>
                                <tr>
                                <th>ID</th>
                                <th>Categorie </th>
                                <th>Prisonnier </th>
                                <th>Pri Prison</th>
                                <th>Personnel</th>
                                <th>Fonction</th>
                                <th>Code occup</th>
                                <th>Lieu passation</th>
                                <th>Date</th>
                                <th>Heure</th>
                                <th>Raison cas</th>
                                <th>Nbre temoins</th>
                                <th scope="col">Options</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($cas_prisonniers as $cas_prisonnier)
                            <tr>
                            <td>{{$cas_prisonnier->id}}</td>
                            <td>{{$cas_prisonnier->nom_cat_cas}}</td>
                            <td>{{$cas_prisonnier->nom_prisonnier}}</td>
                            <td>{{$cas_prisonnier->etat}}</td>
                            <td>{{$cas_prisonnier->nom_personnel}}</td>
                            <td>{{$cas_prisonnier->nom_fonction}}</td>
                            <td>{{$cas_prisonnier->code_occupation}}</td>
                            <td>{{$cas_prisonnier->lieu_passation}}  
                            <td>{{$cas_prisonnier->date_cas}}  
                             <td>{{$cas_prisonnier->heure_cas}}  
                             <td>{{$cas_prisonnier->raison_cas}}  
                            <td>{{$cas_prisonnier->nbr_temoins}} 
                                

                                    <td>
                                        <a href="cas_prisonniers/edit/{{$cas_prisonnier->id}}"  class="glyphicon glyphicon-edit   btn btn-info">edit</a>
                                        
                                        <form action="cas_prisonniers/destroy/{{ $cas_prisonnier->id}}" method="post" class="form-inline">
                                        @csrf
                                <button type="submit" onclick="return confirm('Voulez vs vraiment supprimer cette cas_prisonnier ?')" class="glyphicon glyphicon-delite glyphicon-trash   btn btn-danger">Delete</button>
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