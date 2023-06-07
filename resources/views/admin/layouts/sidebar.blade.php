<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="/admin">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->
 @can('show_roles')
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>authorization</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
         @can('show_roles')
          <li>
            <a href="/roles">
              <i class="bi bi-circle"></i><span>roles</span>
            </a>
          </li>
          @endcan
          @can('show_permissions')
          <li>
              
            <a href="/permissions">
              <i class="bi bi-circle"></i><span>permissions</span>
            </a>
          </li>
          @endcan
          
          
        </ul>
      </li><!-- End Components Nav -->
      @endcan

      @can('show_users')
        
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-person-circle"></i><span>users</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
       
          <li>
            <a href="{{route('users.index')}}">
              <i class="bi bi-circle"></i><span>users</span>
            </a>
          </li>
        </ul>
      </li><!-- End Forms Nav -->
      @endcan
      @can('show_categories')
        
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-layout-text-window-reverse"></i><span>categories</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>  
            <a href="{{route('categories.index')}}">
              <i class="bi bi-circle"></i><span>categories</span>
            </a>
          </li>
         
        </ul>
      </li><!-- End Tables Nav -->
      @endcan
      @can('show_products')
        
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
          <i class="ri-product-hunt-line"></i><span>products</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{route('products.index')}}">
              <i class="bi bi-circle"></i><span>products</span>
            </a>
          </li>
          
        </ul>
      </li><!-- End Charts Nav -->
      @endcan
    </aside><!-- End Sidebar-->
    