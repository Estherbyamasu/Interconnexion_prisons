<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span></button>
            <a class="navbar-brand" href="{{ url('/') }}"><span>GESTION DEs PRISONs </span> AU BURUNDI</a>
            <ul class="nav navbar-top-links navbar-right">
                
                    
                </a>
                    
                </li>
                
            </ul>
            <div class="top-menu">
                <ul class="nav pull-right top-menu">
                  <div class="flex-shrink-0">
                    <li class="logout">
                      <form method="POST"  action="{{ route('logout') }}">
                          @csrf
                          <a class="btn btn-danger" href="{{ route('logout') }}"
                              onclick="event.preventDefault(); this.closest('form').submit();">
                              <span data-feather="log-out"></span>
                              Déconnexion
                          </a>
                      </form>
                  </li>
                </div>
                  
                </ul>
              </div>
        </div>
        
    </div><!-- /.container-fluid -->
    
</nav>



