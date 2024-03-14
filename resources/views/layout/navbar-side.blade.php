<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      @if(Session::get('akses') == 'Admin')
        <li class="nav-item">
          <a class="nav-link collapsed" href="{{route('dashboard')}}">
            <i class="bi bi-grid"></i>
            <span>Dashboard</span>
          </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item">
          <a class="nav-link collapsed" href="{{route('produk')}}">
            <i class="bi bi-menu-button-wide"></i>
            <span>Produk</span>
          </a>
        </li><!-- End Components Nav -->

        <li class="nav-item">
          <a class="nav-link collapsed" href="{{route('transaksi')}}">
            <i class="bi bi-menu-button-wide"></i>
            <span>Transaksi</span>
          </a>
        </li><!-- End Tables Nav -->

        <li class="nav-item">
          <a class="nav-link collapsed" href="{{route('laporan')}}">
            <i class="bi bi-menu-button-wide"></i><span>Laporan</span>
          </a>
        </li><!-- End Charts Nav -->
      @else
        <li class="nav-item">
          <a class="nav-link collapsed" href="{{route('transaksi')}}">
            <i class="bi bi-menu-button-wide"></i>
            <span>Transaksi</span>
          </a>
        </li><!-- End Tables Nav -->
      @endif

    </ul>

  </aside><!-- End Sidebar-->