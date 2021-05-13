@extends('templates.default')

@section('content')

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Prisonniers</li>
        </ol>
    </div>
    <!--/.row-->
    

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Prisonniers</h1>
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
  Nouveau Prisonnier
</button>

                        <table  id="example1" class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Nom prisonnier</th>
                                    <th scope="col">Prenom prisonnier</th>
                                    <th scope="col">Adresse</th>
                                    <th scope="col">Options</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($prisonniers as $prisonnier)
                                <tr>
                                    <td>{{ $prisonnier->id }}</td>
                                    <td>{{ $prisonnier->nom_prisonnier }}</td>
                                    <td>{{ $prisonnier->prenom_prisonnier }}</td>
                                    <td>{{ $prisonnier->adresse }}</td>
                                    <td>
                                        <a href="prisonniers/edit/{{ $prisonnier->id }}" class="glyphicon glyphicon-edit   btn btn-info">edit</a>
                                      
                                        <form action="prisonniers/destroy/{{ $prisonnier->id }}" method="post" class="form-inline">
                                        @csrf
                                <button type="submit" onclick="return confirm('Voulez vs vraiment supprimer cette prisonnier ?')" class="glyphicon glyphicon-delite glyphicon-trash   btn btn-danger">Delete</button>
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
        <h2 class="modal-title" id="exampleModalLabel">L'ajout des prisonniers</h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="panel panel-default">
               
               <div class="panel-body">
                   <div class="col-md-8">
                       <form role="form" action="{{ url('prisonniers') }}" method="post">
                           @csrf
                           <div class="form-group">
                               <label>Nom prisonnier:</label>
                               <input type="text" name="nom_prisonnier" class="form-control"
                                placeholder="Entrez le nom d'une prisonnier" required>
                           </div>
                           <div class="form-group">
                            <label>Prenom prisonnier:</label>
                            <input type="text" name="prenom_prisonnier" class="form-control"
                             placeholder="Entrez le prenom d'une prisonnier" required>
                        </div>
                        <div class="form-group">
                            <label>Adresse:</label>
                            <input type="text" name="adresse" class="form-control"
                             placeholder="Entrez l'adresse'" required>
                        </div>
                           <div class="modal-footer">
      <div class="row">
            <div class="text-center mb-3 col-md-6">
              <button type="submit" onclick= "Addprisonnier()" class=" glyphicon glyphicon-plus btn  btn-primary btn-block btn-rounded z-depth-1">Save</button>
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

<script type="text/javascript">
    $(document).ready(function() {
      affiche_prisonnier();
  
      Addprisonnier();
  });
  
  function Addprisonnier() {
      $("#btn_addprisonnier").click(function(){
  
          var nom = $("input[name='nom_prisonnier']").val();
          var prenom = $("#prenom_prisonnier").val();
          var tel = $("#adresse").val();
  
          //---------initialiser le regular express
          var reg_nom = /^[a-zA-Z\s]*$/;
          //-----------------------------------------------------
          if (nom.length == 0) {
              $("#messg").text('Completez tous les champs!!!').css('color', 'red');
              $("#nom_prisonnier").focus();
              return false;
  
          } else if (nom.length == 0 || !nom.match(reg_nom)) {
  
              $("#msg_nom_prisonnier").text('*La nom est recomandée*').css('color', 'red');;
              $("#nom_prisonnier").focus();
              return false;
          } else {
  
              swal({
                  title: "Etes-vous sure?",
                  text: "Enregistrement du caf!",
                  type: "warning",
                  showCancelButton: true,
                  confirmButtonColor: "#DD6B55",
                  confirmButtonText: "Oui, Enregistre!",
                  closeOnConfirm: false
              }, function(isConfirm) {
                  if (!isConfirm) return;
                  $.ajax({
                      url: 'script/addcaf.php',
                      method: "POST",
                      datatype: 'html',
                      data: {
                          nom_prisonnier: nom_prisonnier,
                          prenom_prisonnier: prenom_prisonnier,                        
                          adresse: adresse
  
                      },
                      success: function(response) {
  
                          swal("Success", response, "success");
  
                          affiche_prisonnier();
                      },
                      error: function(response, ajaxOptions, thrownError) {
                          swal("Erreur d'enregistrement!", response, "error");
                      }
                  });
              });
  
          }
  
  
  
      });
  
  }
  
  
  function affiche_prisonnier() {
  
      affiche_prisonnier(1);
  
      function affiche_prisonnier(page, query = '') {
          $.ajax({
              url: "script/fetch_caf.php",
              method: "POST",
              data: { page: page, query: query },
              success: function(data) {
                  $('#dynamic_content_utilisateur').html(data);
              }
          });
      }
  
      $(document).on('click', '.page-link', function() {
          var page = $(this).data('page_number');
          var query = $('#search_box').val();
          affiche_caf(page, query);
      });
  
      $('#search_box').keyup(function() {
          var query = $('#search_box').val();
          affiche_prisonnier(1, query);
      });
  
  }
  </script>
  