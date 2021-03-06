<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item nav-profile">
      
    </li>
    <li class="nav-item nav-category">Main Menu</li>
    <li class="nav-item">
      <a class="nav-link" href="{{route('home')}}">
        <i class="menu-icon typcn typcn-document-text"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{route('index-ketenagakerjaan-admin')}}">
        <i class="menu-icon typcn typcn-document-text"></i>
        <span class="menu-title">Ketenagakerjaan</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{route('index-data-admin')}}">
        <i class="menu-icon typcn typcn-document-text"></i>
        <span class="menu-title">Data</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{route('index-publikasi-admin')}}">
        <i class="menu-icon typcn typcn-document-text"></i>
        <span class="menu-title">Publikasi</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{route('index-infograpik-admin')}}">
        <i class="menu-icon typcn typcn-document-text"></i>
        <span class="menu-title">Infografik</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{route('index-galeri-admin')}}">
        <i class="menu-icon typcn typcn-document-text"></i>
        <span class="menu-title">Galery</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{route('index-banner-admin')}}">
        <i class="menu-icon typcn typcn-document-text"></i>
        <span class="menu-title">Banner</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
        <i class="menu-icon typcn typcn-coffee"></i>
        <span class="menu-title">Kategori</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="ui-basic">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item">
            <a class="nav-link" href="{{route('index-kategori-infograpik')}}">Infografik</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('index-kategori-galery')}}">Galery</a>
          </li>
        </ul>
      </div>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
          document.getElementById('logout-form').submit();">
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
          @csrf
        </form>
        <i class="menu-icon typcn typcn-document-text"></i>
        <span class="menu-title">Logout</span>
      </a>
    </li>
    </li>
  </ul>
</nav>