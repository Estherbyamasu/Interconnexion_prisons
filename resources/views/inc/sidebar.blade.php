
    <aside>
        <div id="sidebar" class="nav-collapse ">
          <!-- sidebar menu start-->
          <ul class="sidebar-menu" id="nav-accordion">
            <p class="centered"><a href="profile.html"><img src="img/fira.jpg" class="img-circle" width="80"></a></p>
            <a id="navbarDropdown" class="nav-link dropdown-toggle page-header " href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                <span class="caret color_d ">{{ Auth::user()->name }}</span>
           </a>
            {{-- <li class="nav-item dropdown">
                                  <a id="navbarDropdown" class="nav-link dropdown-toggle page-header " href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                       <span class="caret color_d ">{{ Auth::user()->name }}</span>
                                  </a>
  
                                  <div class="dropdown-menu dropdown-menu-left " aria-labelledby="navbarDropdown">
                                      <a class="dropdown-item" href="{{ route('logout') }}"
                                         onclick="event.preventDefault();
                                                       document.getElementById('logout-form').submit();">
                                          {{ __('Deconnexion') }}
                                      </a>
  
                                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                          @csrf
                                      </form>
                                      <br>
                                      @can('manage-users')
                                      <a href="{{route('admin.users.index')}}" class="dropdown-item">Liste des utilisateurs</a>
                                      @endcan
                                  </div>
                              </li>  --}}

                              
         <li class="nav-item dropdown">
        <li class="nav-item dropdown">
                                  
  
  
       
        
          
  
  
  
      
                              </li>
            <li class="mt">
              <a class="active" href="{{url('/')}}">
                <i class="fa fa-dashboard"></i>
                <span>Accueil</span>
                </a>
            </li>
            
       
   
            <li class="parent "><a data-toggle="collapse" href="#sub-item-1">
				<em class="fa fa-cog">&nbsp;</em> Liste menu<span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
				</a>
				<ul class="children collapse" id="sub-item-1">

                    <li><a class="" href="{{ url('provinces')}}">
						<span class="fa fa-bell">&nbsp;</span> Provinces
					</a></li>
					<li><a class="" href="{{ url('communes')}}">
						<span class="fa fa-bell">&nbsp;</span> Communes
					</a></li>
					<li><a class="" href="{{ url('collines')}}">
						<span class="fa fa-clone">&nbsp;</span> Collines
					</a></li>
				
				
				
					
					
					</ul>
			</li>
            <li class="parent "><a data-toggle="collapse" href="#sub-item-2">
				<em class="fa fa-align-center">&nbsp;</em>Prison<span data-toggle="collapse" href="#sub-item-2" class="icon pull-right"><em class="fa fa-plus"></em></span>
				</a>
				<ul class="children collapse" id="sub-item-2">

					<li><a class="" href="{{ url('personnels')}}">
						<span class="fa fa-users">&nbsp;</span> Personnels
					</a></li>
					<li><a class="" href="{{ url('prisons')}}">
						<span class="fa  fa-align-justify">&nbsp;</span> Prisons
					</a></li>
					<li><a class="" href="{{ url('prisonniers')}}">
						<span class="fa fa-users">&nbsp;</span> Prisonniers
					</a></li>
					<li><a class="" href="{{ url('services')}}">
						<span class="fa fa-list-alt">&nbsp;</span> Services
					</a></li>
					<li><a class="" href="{{ url('fonctions')}}">
						<span class="fa fa-list-alt">&nbsp;</span>Fonctions
					</a></li>
					
				
				
					</ul>
			</li>
            <li class="parent "><a data-toggle="collapse" href="#sub-item-3">
				<em class="fa fa-align-justify">&nbsp;</em> Liste de Cas<span data-toggle="collapse" href="#sub-item-3" class="icon pull-right"><em class="fa fa-plus"></em></span>
				</a>
				<ul class="children collapse" id="sub-item-3">

					<li><a class="" href="{{ url('cas_prisonniers')}}">
						<span class="fa fa-id-card">&nbsp;</span> Cas prisonniers
					</a></li>
					<li><a class="" href="{{ url('categorie_cas')}}">
						<span class="fa fa-id-card">&nbsp;</span> Categorie cas
					</a></li>
					
					<li><a class="" href="{{ url('occupations')}}">
						<span class="fa fa-list-alt">&nbsp;</span> Occupations
					</a></li>
					<li><a class="" href="{{ url('transferts')}}">
						<span class="fa fa-list-alt">&nbsp;</span>Transferts
					</a></li>
					<li><a class="" href="{{ url('prisonnier_prisons')}}">
						<span class="fa fa-list-alt">&nbsp;</span>Prisonnier prisons
					</a></li>
					
					</ul>
			</li>

            <li class="parent "><a data-toggle="collapse" href="#sub-item-4">
				<em class="fa fa-align-justify">&nbsp;</em> Utilisateurs<span data-toggle="collapse" href="#sub-item-4" class="icon pull-right"><em class="fa fa-plus"></em></span>
				</a>
				<ul class="children collapse" id="sub-item-4">
					@can('manage-users')
                    <li class="active"><a href="{{route('admin.users.index')}}" class="dropdown-item"><span class="fa fa-users">&nbsp;</span>Liste des utilisateurs</a></li>
					@endcan
					</ul>
			</li>

           
          </ul>
          
          <!-- sidebar menu end-->
        </div>
      </aside>