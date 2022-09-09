<div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <img src="{{ asset('images/logo2.png')}}" width="60%" >
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
          <img src="{{ asset('images/logo.png')}}" width="60%">
          </div>
          <ul class="sidebar-menu" id="sidebar-menu">

            <li class="{{ request()->is('dashboard') ? 'active' : '' }}">
                <a class="nav-link" href="/dashboard"><i class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>
            
            <li class="{{ request()->is('kendaraan', ) ? 'active' : '' }}">
              <a href="{{ route('kendaraan.index') }}" class="nav-link"><i class="fas fa-light fa-car-side"></i><span>Kendaraan</span></a>
            </li>
            
            <li class="{{ request()->is('pelanggan') ? 'active' : '' }}">
              <a href="{{ route('pelanggan.index') }}" class="nav-link"><i class="fas fa-light fa-user"></i> <span>Pelanggan</span></a>
            </li>

            <li class="{{ request()->is('transaksi') ? 'active' : '' }}">
              <a href="{{ route('transaksi.index') }}" class="nav-link" ><i class="fas fa-light fa-file"></i> <span>Pembelian</span></a>
            </li>

            <li class="{{ request()->is('laporan') ? 'active' : '' }}">
              <a href="#laporan" class="nav-link"><i class="fas fa-folder"></i><span>Laporan</span></a>
            </li>

            <li class="{{ request()->is('/administrasi') ? 'active' : '' }}">
              <a href="#administrasi" class="nav-link" ><i class="fas fa-users"></i> <span>Administrasi</span></a>
            </li>
        </aside>
      </div>