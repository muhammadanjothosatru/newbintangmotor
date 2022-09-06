<div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <img src="{{ asset('images/logo2.png')}}" width="60%" >
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
          <img src="{{ asset('images/logo.png')}}" width="60%">
          </div>
          <ul class="sidebar-menu" id="sidebar-menu">

            @foreach(getMenus() as $menu)
              <li class="{{ request()->segment(1) == $menu->url ? 'active' : ''}}">
                  <a class="nav-link" href="{{$menu->url}}"><i class="{{$menu->icon}}"></i><span>{{$menu->name}}</span></a>
              </li>
            @endforeach

        </aside>
      </div>