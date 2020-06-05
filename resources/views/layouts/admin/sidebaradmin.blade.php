
  <!-- Sidebar -->
  <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/admin/indexadmin">
      <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-laugh-wink"></i>
      </div>
      <div class="sidebar-brand-text mx-3">Home Admin<!-- <sup>2</sup> --> </div>
      
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Commandes -->
    <li class=" nav-item {{'admin/commandes' == request()->path() ? 'active' : '' }}">
      <a class="nav-link" href="/admin/commandes">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Commandes</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
      Interface
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
            
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-cog"></i>
        <span>Demands</span>
      </a>
      <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header"> Demands : </h6>
          <a class="collapse-item" href="/admin/Demandes"> All Demands </a>
          <a class="collapse-item" href="/admin/DemandesTDEA"> Pending Demands  </a>
          <a class="collapse-item" href="/admin/DemandesTDAC"> Accepted demands  </a>
        </div>
      </div>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
        <i class="fas fa-fw fa-wrench"></i>
        <span>Product</span>
      </a>
      <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Manage Product :</h6>
          <a class="collapse-item" href="/admin/Produit/Produitsonthesite">Product on the Site</a>
          <a class="collapse-item" href="/admin/Produit/OurProducts">Our Product</a>
          <!--<a class="collapse-item" href="#">Other Product</a> /admin/Produit/OtherProducts -->
          <a class="collapse-item" href="/admin/Produit/AllProduits">All Product</a>
        </div>
      </div>
    </li>

    <!-- Nav Item - Commandes -->
     
    <li class="nav-item {{'admin/user' == request()->path() ? 'active' : '' }}">
      <a class="nav-link" href="/admin/user">
        <i >
            <img  class="img-profile rounded-circle" src="{{ asset('storage/uploads/alt.png') }}"   onerror="this.style.display='none'">
        </i>
        <!-- class="now-ui-icons users_single-02" -->
        <span>User Profile</span></a>
    </li>
    <!-- Divider -->
    <!-- <hr class="sidebar-divider"> -->

    <!-- Heading -->
    <!-- <div class="sidebar-heading">
      Addons
    </div> -->

    <!-- Nav Item - Pages Collapse Menu -->
    <!-- <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
        <i class="fas fa-fw fa-folder"></i>
        <span>Pages</span>
      </a>
      <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Login Screens:</h6>
          <a class="collapse-item" href="#">Login</a><!-- login.html ->
          <a class="collapse-item" href="#">Register</a><!-- register.html ->
          <a class="collapse-item" href="#">Forgot Password</a><!-- forgot-password.html ->
          <div class="collapse-divider"></div>
          <h6 class="collapse-header">Other Pages:</h6>
          <a class="collapse-item" href="#">404 Page</a><!-- 404.html ->
          <a class="collapse-item" href="#">Blank Page</a><!-- blank.html ->
        </div>
      </div>
    </li> -->

    <!-- Nav Item - Charts -->
    <!-- <li class="nav-item">
      <a class="nav-link" href="#"><!-- charts.html->
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Charts</span></a>
    </li> -->

    <!-- Nav Item - Tables -->
    <!-- <li class="nav-item">
      <a class="nav-link" href="#"><!-- tables.html -> 
        <i class="fas fa-fw fa-table"></i>
        <span>Tables</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

  </ul>
  <!-- End of Sidebar -->

  <!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <a class="btn btn-primary" href="#">Logout</a> <!-- login.html -->
      </div>
    </div>
  </div>
</div>