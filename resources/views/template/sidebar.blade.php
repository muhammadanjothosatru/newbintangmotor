<div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a class="nav-link" href="/dashboard"><img src="{{ asset('images/logo2.png')}}" width="75%" ></a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a class="nav-link" href="/dashboard"><img src="{{ asset('images/logo.png')}}" width="100%" ></a>
          </div>
          <ul class="sidebar-menu" id="sidebar-menu">

            <li class="{{ request()->is('dashboard') ? 'active' : '' }}">
                <a class="nav-link" href="/dashboard"><i class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>
            
            <li class="{{ request()->is('kendaraan', 'kendaraan/*') ? 'active' : ''}}">
              <a href="{{ route('kendaraan.index') }}" class="nav-link"><i class="fas fa-light fa-car-side"></i><span>Kendaraan</span></a>
              @if(Auth::user()->role == 0)
              <ul class="dropdown-menu">
                <li class="{{ request()->is('kendaraan') ? 'active' : ''}}"><a class="nav-link " href="kendaraan">Motor</a></li>
                <li class=""><a class="nav-link" href="{{ route('kendaraan.mobil') }}">Mobil</a></li>
              </ul>
              @endif
            </li>
            {{-- @if (Auth::user()->role == 1) --}}
            <li class="{{ request()->is('pelanggan', 'pelanggan/*') ? 'active' : ''}}">
              <a href="{{ route('pelanggan.index') }}" class="nav-link"><i class="fas fa-light fa-user"></i> <span>Pelanggan</span></a>
            </li>
            {{-- @endif --}}
            <li class="{{ request()->is('transaksi', 'transaksi/*') ? 'active' : ''}}">
              <a href="{{ route('transaksi.index') }}" class="nav-link" ><i class="fas fa-light fa-file"></i> <span>Pembelian</span></a>
            </li>

            <li class="{{ request()->is('laporan', 'laporan/*') ? 'active' : '' }}">
              <a href="{{ route('laporan.index') }}" class="nav-link"><i class="fas fa-folder"></i><span>Laporan</span></a>
            </li>
            @if(Auth::user()->role == 0)
            <li class="{{ request()->is('#administrasi') ? 'active' : '' }}">
              <a href="#administrasi" class="nav-link" ><i class="fas fa-users"></i> <span>Administrasi</span></a>
            </li>
            @endif
        </aside>
      </div>