<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item nav-profile">
        {{-- <a href="#" class="nav-link">
          <div class="profile-image">
            <img class="img-xs rounded-circle" src="{{ asset('/src/assets/images/faces/face8.jpg')}}" alt="profile image">
            <div class="dot-indicator bg-success"></div>
          </div>
          <div class="text-wrapper">
            <p class="profile-name">Allen Moreno</p>
            <p class="designation">Premium user</p>
          </div>
        </a> --}}
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
        <a class="nav-link" href="">
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
          <span class="menu-title">Infograpik</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="">
          <i class="menu-icon typcn typcn-document-text"></i>
          <span class="menu-title">Galery</span>
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
              <a class="nav-link" href="{{route('index-kategori-infograpik')}}">Infograpik</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('index-kategori-galery')}}">Galery</a>
            </li>
          </ul>
        </div>
      </li>
    </ul>
  </nav>