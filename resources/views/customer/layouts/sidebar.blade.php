
   <aside class="main-sidebar sidebar-dark-primary elevation-4">


    <a href="{{ route('customer.login') }}" class="brand-link" align="center" style="text-decoration:none;">
     <span class="brand-text font-weight-light"> Customer Panel </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

     <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
       <img src="{{ (!empty(Auth::guard('customer')->user()->photo))?url('upload/customer_profile/'.Auth::guard('customer')->user()->photo):url('upload/no_image.png') }}" class="img-circle elevation-2" alt="Customer Image">
      </div>
      <div class="info">
       <a href="{{ route('customer.profile') }}" class="d-block" style="text-decoration:none;">{{ Auth::guard('customer')->user()->name }}</a>
      </div>
     </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Order Info
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('customer.order') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Order</p>
                </a>
              </li>
            </ul>
          </li>


         </li>
        </ul>
       </nav>
    </div>
  </aside>
