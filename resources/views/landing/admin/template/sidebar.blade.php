<div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a class="nav-link" href="/datamanagement"><img src="{{ asset('images/logo2.png')}}" width="75%" ></a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a class="nav-link" href="/datamanagement"><img src="{{ asset('images/logo.png')}}" width="100%" ></a>
          </div>
          <ul class="sidebar-menu" id="sidebar-menu">

          <li class="{{ request()->is('datamanagement') ? 'active' : '' }}">
            <a class="nav-link" href="/datamanagement"><i class="fas fa-file"></i><span>Kelola Data</span></a>
          </li>

          <li class="{{ request()->is('carousel') ? 'active' : '' }}">
            <a class="nav-link" href="/carousel"><i class="fas fa-image"></i><span>Kelola Banner</span></a>
          </li>

          <li class="{{ request()->is('dashboard') ? 'active' : '' }}">
            <a class="nav-link" href="/dashboard"><i class="fas fa-fire"></i><span>Dashboard</span></a>
          </li>

        </aside>
      </div>