<div class="sidebar">
  <nav class="sidebar-nav">
    <ul class="nav">
      <li class="nav-item">
        <a class="nav-link" href="{{route('dashboard.index')}}">
            <i class="nav-icon icon-speedometer"></i> Dashboard
        </a>
      </li>
        
        <li class="nav-item nav-dropdown">
            <a class="nav-link nav-dropdown-toggle" style="cursor: pointer">
            <i class="nav-icon icons cui-user"></i>Many HomeInfo</a>
            <ul class="nav-dropdown-items">
              <li class="nav-item">
                <a class="nav-link" href="">
                 <i class="nav-icon icon-info"></i>Home Info</a>
              </li>
            </ul>
        </li>
        <li class="nav-item nav-dropdown">
            <a class="nav-link nav-dropdown-toggle" style="cursor: pointer">
            <i class="nav-icon icons cui-user"></i>Nhà cung cấp</a>
            <ul class="nav-dropdown-items">
              <li class="nav-item">
                <a class="nav-link" href="{{route('dashboard.provider.list')}}">
                 <i class="nav-icon icon-info"></i>danh dach</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('dashboard.provider.getCreate')}}">
                 <i class="nav-icon icon-info"></i>Tạo</a>
              </li>
             
            </ul>
        </li>

    </ul>
  </nav>
</div>