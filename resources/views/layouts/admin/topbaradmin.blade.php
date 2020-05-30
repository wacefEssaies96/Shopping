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
                <a class="dropdown-item d-flex align-items-center" href="{{ route('ConsulterDetailleProduit',['prodid' =>  $ND->id_prod,'userid' => $ND->id_user ]) }}">
                  
                  <div class="col-3">
                    @foreach ($NCD['usernotification'] as $NU)
                      @if($ND->id_user==$NU->id)
                        <img  class="img-profile icon-circle" src="{{asset('storage/'.$NU->image)}}"  onerror="this.style.display='none'">
                      
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
                          <img  class="img-profile icon-circle" src="{{asset('storage/'.$NP->photo)}}" alt="ID PROD : {{$NP->id}}"  onerror="this.style.display='none'">
                     
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
                        <img  class="img-profile icon-circle" src="{{asset('storage/'.$NU->image)}}"    onerror="this.style.display='none'">
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
                <!-- <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-success">
                      <i class="fas fa-donate text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">December 7, 2019</div>
                    $290.29 has been deposited into your account!
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-warning">
                      <i class="fas fa-exclamation-triangle text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">December 2, 2019</div>
                    Spending Alert: We've noticed unusually high spending for your account.
                  </div>
                </a> -->
                <a class="dropdown-item text-center small text-gray-500" href="{{route('indexnotification')}}">Show All Notifications</a>
              </div>
            </li>

            <!-- Nav Item - Messages -->
            <!-- <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-envelope fa-fw"></i> -->
                <!-- Counter - Messages ->
                <span class="badge badge-danger badge-counter">7</span>
              </a>
              <!-- Dropdown - Messages ->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
                <h6 class="dropdown-header">
                  Message Center
                </h6>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="#" alt="">
                    <!-- https://source.unsplash.com/fn_BT9fwg_E/60x60 ->
                    <div class="status-indicator bg-success"></div>
                  </div>
                  <div class="font-weight-bold">
                    <div class="text-truncate">Hi there! I am wondering if you can help me with a problem I've been having.</div>
                    <div class="small text-gray-500">Emily Fowler · 58m</div>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="#" alt="">
                    <!-- https://source.unsplash.com/AU4VPcFN4LE/60x60 ->
                    <div class="status-indicator"></div>
                  </div>
                  <div>
                    <div class="text-truncate">I have the photos that you ordered last month, how would you like them sent to you?</div>
                    <div class="small text-gray-500">Jae Chun · 1d</div>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="#" alt="">
                    <!-- https://source.unsplash.com/CS2uCrpNzJY/60x60 ->
                    <div class="status-indicator bg-warning"></div>
                  </div>
                  <div>
                    <div class="text-truncate">Last month's report looks great, I am very happy with the progress so far, keep up the good work!</div>
                    <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="#" alt="">
                    <!-- https://source.unsplash.com/Mv9hjnEUHR4/60x60 ->
                    <div class="status-indicator bg-success"></div>
                  </div>
                  <div>
                    <div class="text-truncate">Am I a good boy? The reason I ask is because someone told me that people say this to all dogs, even if they aren't good...</div>
                    <div class="small text-gray-500">Chicken the Dog · 2w</div>
                  </div>
                </a>
                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
              </div>
            </li>
            -->
            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{$user->name}}</span>
                <img class="img-profile rounded-circle" src="{{asset('storage/'.$user->image)}}"  onerror="this.style.display='none'">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <!-- <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a> -->
                <!-- <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a> -->
                <!-- <a class="dropdown-item" href="#">
                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                  Activity Log
                </a> -->
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
                <!-- <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a> -->
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->