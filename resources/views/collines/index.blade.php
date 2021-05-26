@extends('templates.default')

@section('content')

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Collines</li>
        </ol>
    </div>
    <!--/.row-->
    

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Collines</h1>
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
                        
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Nouveau Colline
</button>

                        <table  id="example1" class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Nom Province</th>
                                    <th scope="col">Nom commune</th>
                                    <th scope="col">Nom colline</th>
                                    <th scope="col">Superficie</th>
                                    <th scope="col">Etat</th>
                                    <th scope="col">Options</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($collines as $colline)
                                <tr>
                                    <td>{{ $colline->id }}</td>
                                    <td>{{ $colline->nom_province }}</td>
                                    <td>{{ $colline->nom_commune }}</td>
                                    <td>{{ $colline->nom_colline }}</td>
                                    <td>{{ $colline->superficie }}</td>
                                    <td>{{ $colline->etat }}</td>
                                    <td>
                                        <a href="collines/edit/{{ $colline->id }}" class="glyphicon glyphicon-edit   btn btn-info">edit</a>
                           
                                        <form action="collines/destroy/{{ $colline->id }}" method="post" class="form-inline">
                                        @csrf
                                <button type="submit" onclick="return confirm('Voulez vs vraiment supprimer cette colline ?')" class="glyphicon glyphicon-delite glyphicon-trash   btn btn-danger">Delete</button>
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
        <h2 class="modal-title" id="exampleModalLabel">L'ajout des collines</h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="panel panel-default">
               
               <div class="panel-body">
                   <div class="col-md-8">
                       <form role="form" action="{{ url('collines') }}" method="POST">
                           @csrf
                           {{-- <div class="row"> --}}



                            <div class="form-group">
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
                <div class="form-group">
                    <label for="nom_commune">Nom commune</label>
                    <select name="commune_id" id="" class="form-control" 
                    class="@error('superficie') is-danger @enderror" required>
                        <option value="">Select commune</option>
                        @foreach($communes as $commune)
                        <option value="{{$commune->id}}">{{$commune->nom_commune}}</option>
                        @endforeach
                        @error('commune_id')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                    </select>
                </div>
                

                           <div class="form-group">
                               <label>Nom colline:</label>
                               <input type="text" name="nom_colline" class="form-control"
                                placeholder="Entrez le numero de la colline" required>
                           </div>

                           <div class="form-group">
                               <label>Superficie:</label>
                               <input type="text" name="superficie" class="form-control"
                                placeholder="Entrez le superficie " required>
                           </div>
                           <div class="form-group ">
                            <label for=""> <b>Etat  </b></label>
                            <div class="control  d-inline">
                                <label class="radio ">
                                    <input type="radio" name="etat" value="1" >
                                    Active
                                </label>
                                <label class="radio   d-inline">
                                    <input type="radio" name="etat" value="0">
                                    Desactive
                                </label>
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