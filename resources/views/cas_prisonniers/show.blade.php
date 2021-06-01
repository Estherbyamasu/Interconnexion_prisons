@extends('templates.default')
@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-8 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Cas prisonnier</li>
        </ol>
    </div>
    <!--/.row-->

    <!--/.row-->
    <div class="modal-content">
    <div class="modal-body text-center mb-1">
    <a href="{{ url('cas_prisonniers') }}" > <button type="button" class="close white-text" data-dismiss="modal" aria-label="Close">
            
            <span aria-hidden="true">&times;</span></a>
          </button></a>
       
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
            
         
            <script type="text/javascript">
        function print() {

            var zone = document.getElementById("imprimer");
            var f = window.open(
                "",
                "",
                "height=730,width=720,toolbar=0,menubar=0,scrollbars=1,resizable=0,status=0,location=0,left=10,top=10"
            );
            f.document.write('<html><head><title></title></head><body onload="window.print();window.close();"><center>' + zone.innerHTML + '</center></body></html>');
            f.document.close();
            return;
        }
    </script>


    <div id="imprimer">
        <center>

            <h1>Liste des cas des prisonniers </h1>
        </center>
        <p style="direction: ltr;  position: static; top:31px; margin-left: 4em" align="left">
           PRISON</br>
            BURUNDI</br>
            TEL: 22354678
            </p>
           
         
          
            <table  class="table table-bordered table-hover table-striped">
                       
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
                    

                       
                    </tr>
                    @endforeach
                </tbody>

            </table>
            <div class="row">
        <div class="col-lg-12">
        </div>
    </div>
    <font style="direction: ltr; position: static; top:31px; margin-left: 25em">
        Bujumbura, le.........../........../......
    </font>

</div></br></br>
<center>
    <input type="button" onclick="print();" value="APERCU" />
</center>
<div class="col-sm-12">
    <p class="back-link">
        <tr>
            <td align="center">
                DEVELOPPEUR<br> Esther Furaha<br> Copyright &copy; 2020
            </td>
        </tr>
    </p>
</div>
    
        </div>
    </div>
    <!--/.row-->





    



    </div>
        </div>
        </div>
        </div>
        </div>
        </div>
    </div>
</div><!-- /.row -->
@endsection()