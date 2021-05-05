@extends('templates.default')

@section('content')

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Services</li>
        </ol>
    </div>
    <!--/.row-->

    <div class="row">
    <div class="col-lg-12">  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
    <div class="modal-header text-center pb-4">
        <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    
        <div class="col-md-12">
            <a href="{{ url('services') }}" class="   btn btn-link"><h1 class="page-header">Fonctions</h1></a>
            <a href="{{ url('services') }}" > <button type="button" class="close white-text" data-dismiss="modal" aria-label="Close">
            
            <span aria-hidden="true">&times;</span></a>
          </button></a>
        </div>
        
       
    </div>
    <!--/.row-->

    <div class="row">
        <div class="col-md-12">
     
        <div class="row">
          <div class="col-md-10">
            <div class="panel panel-default">
          
            <div class="panel-body">
           
                <div class="panel-heading">Liste des fonctions appartenant dans le service {{ $service_fonctions->nom_service }}</div>
                
                
                   
                    
            <form action="{{url('service')}}" method="POST">
                    @csrf
                   

                    <div class="form-group">
                               <label>Nom fonction:</label>
                               <input type="text" name="nom_fonction" class="form-control"
                                placeholder="Entrez le nom de la fonction" required>
                           </div>

                          




                <div class="row">
            <div class="text-center mb-3 col-md-6">
              <button type="submit" class=" glyphicon glyphicon-plus btn  btn-primary btn-block btn-rounded z-depth-1">Save</button>
              </div>
              <div class="text-center mb-3 col-md-6">
              <button  type="reset"class="btn btn-outline-info waves-effect ml-auto" data-dismiss="modal">Reset</button>
              </div>
             </div>
           
            </form>
            <div class="modal-content">
      <!--Modal cascading tabs-->
      <div class="modal-body text-center mb-1">
                        <table  id="example1" class="table table-bordered table-hover table-striped">
                            <thead>
                            <tr>
                                        <th>ID</th>
                                        <th>Nom fonction</th>
                                        
                                        
                                       
                                        

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($service_fonctions->fonctions as $fonction)
                                        <tr>
                                            <td> {{ $fonction->id }}</td>
                                            <td> {{ $fonction->nom_fonction }}</td>
                                            
                                            
                                           

                                           
                                </tr>
                                @endforeach
                            </tbody>

                        </table>
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