@extends('templates.default')

@section('content')

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Prisons</li>
        </ol>
    </div>
    <!--/.row-->
    

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Liste Des Prisons</h1>
        </div>
    </div>
    <!--/.row-->
    
  
    <div class="row">
        <div class="col-lg-10">
            <div class="panel panel-default">
                
                <div class="panel-body">
                    <div class="col-md-12">
                    <div class="row">
                        @if (session()->has('success'))
                        <div class="alert alert-success" role="alert">{{ session('success') }}</div>
                    @endif
                        
        <button type="button" class=" glyphicon glyphicon-plus btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Nouveau Prison
</button>

                        <table  id="example1" class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    {{-- <th scope="col"> Province</th>
                                    <th scope="col">Commune</th> --}}
                                    <th scope="col">Colline</th>
                                    <th scope="col">Type prison</th>
                                    <th scope="col">Nbre_piece</th>
                                    <th scope="col">Adresse complete</th>
                                    <th scope="col">Fax</th>
                                    <th scope="col">Code_prison</th>
                                    <th scope="col">Options</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($prisons as $prison)
                                <tr>
                                    <td>{{ $prison->id }}</td>
                                    {{-- <td>{{ $prison->nom_province }}</td>
                                    <td>{{ $prison->nom_commune }}</td> --}}
                                    <td>{{ $prison->nom_colline }}</td>
                                    <td>{{ $prison->type_prison }}</td>
                                    <td>{{ $prison->nbre_piece }}</td>
                                    <td>{{ $prison->adresse_complete }}</td>
                                    <td>{{ $prison->fax }}</td>
                                    <td>{{ $prison->code_prison }}</td>
                                    <td>
                                        <a href="prisons/edit/{{ $prison->id }}" class="glyphicon glyphicon-edit   btn btn-info">edit</a>
                           
                                        <form action="prisons/destroy/{{ $prison->id }}" method="post" class="form-inline">
                                        @csrf
                                <button type="submit" onclick="return confirm('Voulez vs vraiment supprimer cette prison ?')" class="glyphicon glyphicon-delite glyphicon-trash   btn btn-danger">Delete</button>
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
        <h2 class="modal-title" id="exampleModalLabel">L'ajout des prisons</h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="panel panel-default">
               
               <div class="panel-body">
                   <div class="col-md-8">
                       <form role="form" action="{{ url('prisons') }}" method="POST">
                           @csrf
                           {{-- <div class="row"> --}}



                            {{-- <div class="form-group"> --}}
                            {{-- <label for="nom_province">Nom province</label>
                            <select name="province_id"  id="nom_province" class="form-control"
                            required>
                                <option value="">------Selectionner la province -------</option>
                                @foreach($provinces as $province)
                                <option value="{{$province->id}}">{{$province->numero_province}}</option>
                                @endforeach
                                @error('province_id')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                            </select>
                        </div> --}}
                        {{-- <div class="form-group">
                            <label for="nom_province">Nom province</label>
                            <select name="province_id" id="" class="form-control" 
                            class="@error('superficie') is-danger @enderror" required>
                                <option value="">Select province</option>
                                @foreach($provinces as $province)
                                <option value="{{$province->id}}">{{$province->nom_province}}</option>
                                @endforeach
                                @error('province_id')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                            </select>
                        </div> --}}
                        <div class="form-row ">
                            <div class="form-group col-md-6">
                                    <label for="nom_colline">Nom colline</label>
                                    <select name="colline_id" id="" class="form-control" 
                                    class="@error('fax') is-danger @enderror" required>
                                        <option value="">Select colline</option>
                                        @foreach($collines as $colline)
                                        <option value="{{$colline->id}}">{{$colline->nom_colline}}</option>
                                        @endforeach
                                        @error('colline_id')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                    </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="type_prison">type prison</label><br />
                                <select name="type_prison" id="type_prison">
                            
                                    <option value="central">prison central</option>
                                    <option value="provincia">prison provincial</option>
                                    <option value="communial">prison communial</option>
                                </select>
                               </div>
                        
                            </div>
                        <div class="form-group">
                               <label>Nombre piece:</label>
                               <input type="text" name="nbre_piece" class="form-control"
                                placeholder="Entrez le nombre de piece" required>
                           </div>

                           <div class="form-group">
                               <label>Adresse:</label>
                               <input type="text" name="adresse_complete" class="form-control"
                                placeholder="Entrez le adresse " required>
                           </div>
                        
                    
                        
                                 <div class="form-group">
                                   <label>Fax:</label>
                                   <input type="text" name="fax" class="form-control"
                                    placeholder="Entrez le fax" required>
                               </div>
    
                               <div class="form-group">
                                   <label>Code prison:</label>
                                   <input type="text" name="code_prison" class="form-control"
                                    placeholder="Entrez le code de prison " required>
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