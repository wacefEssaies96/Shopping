<input type="hidden" value=" {{$conND=0}}"> 
@foreach ($NCD['Demnotifications'] as $ND)
<input type="hidden" value=" {{$conND+=1}}"> 
@endforeach
        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow ">

          <!-- Sidebar Toggle (Topbar) -->
          <!-- <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button> -->

          <!-- Topbar Search -->
          <!-- <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form> -->

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto float-right">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <!-- <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages ->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li> -->

            <!-- Nav Item - Alerts -->
            <li class="nav-item dropdown no-arrow mx-1 ">
              <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                <i class="fas fa-bell fa-fw"></i>
                <!-- Counter - Alerts -->
                <span class="badge badge-danger badge-counter">{{$NCD['notification']}}</span>
              </a>
              <!-- Dropdown - Alerts -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"  aria-labelledby="alertsDropdown"  style="height:300px; overflow-y:scroll" wirdth="20px">
                
              
                <h6 class="dropdown-header  text-center">
                  Demands ( {{$conND}} )
                </h6>
                @if($conND==0)
                  <h6 class="text-warning  text-center">There are no demands </h6>
                @else
                @foreach ($NCD['Demnotifications'] as $ND)
                <a class="dropdown-item d-flex align-items-center" href="{{ route('ConsulterDetailleDemandes',['prodid' =>  $ND->id_prod,'userid' => $ND->id_user ]) }}">
                  
                  <div class="col-3">
                    @foreach ($NCD['usernotification'] as $NU)
                      @if($ND->id_user==$NU->id)
                        <img  class="img-profile icon-circle" src="{{asset('images/'.$NU->image)}}"  onerror="this.style.display='none'">
                      
                        "{{$NU->name}}"
                      @endif
                    @endforeach
                  </div>
                  <div class="col-6">
                    <div class="small text-gray-500">{{date('d-m-Y h:i', strtotime($ND->created_at))}}</div>
                    <span class="font-weight-bold"> 
                    
                    want to add his product 
                    </span>
                  </div>
                  <div class="col-4">
                    @foreach ($NCD['produitnotification'] as $NP)
                      @if($ND->id_prod==$NP->id)
                          <img  class="img-profile icon-circle" src="{{ asset('storage/'.$NP->photo) }}" alt="ID PROD : {{$NP->id}}"  onerror="this.style.display='none'">
                     
                          "{{$NP->name}}"
                      @endif
                     
                    @endforeach
                  </div>
                </a>
                @endforeach 
                @endif 
                <h6 class="dropdown-header  text-center">
                  Orders ( {{$NCD['TCEA']}} )
                </h6>
                @if($NCD['TCEA']==0)
                  <h6 class="text-warning  text-center">There are no orders </h6>
                @else
                @foreach ($NCD['Comnotifications'] as $NC)
                <a class="dropdown-item d-flex align-items-center"  href="{{ route('ConsulterDetailleOrder',['prodid' =>  $NC->prod_id,'userid' => $NC->user_id ]) }}" >
                  <div class="mr-3">
                    @foreach ($NCD['usernotification'] as $NU)
                      @if($NC->user_id==$NU->id)
                        <img  class="img-profile icon-circle" src="{{asset('images/'.$NU->image)}}"    onerror="this.style.display='none'">
                      @endif
                    @endforeach
                    </div>
                  <div>
                    <div class="small text-gray-500">{{date('d-m-Y h:i', strtotime($NC->created_at))}}</div>
                    <span class="font-weight-bold"> 
                    "
                    @foreach ($NCD['usernotification'] as $NU)
                      @if($NC->user_id==$NU->id)
                        {{$NU->name}}
                      @endif
                    @endforeach
                    "  send this Order </span>
                  </div>
                </a>
                @endforeach 
                @endif 
                <a class="dropdown-item text-center small text-gray-500" href="{{route('indexnotification')}}">Show All Notifications</a>
              </div>
            </li>
            
            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{$NCD['user']->name}}</span>
                <img class="img-profile rounded-circle" src="{{asset('images/'.$NCD['user']->image)}}"  onerror="this.style.display='none'">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="/profil">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->