<ul class="nav nav-pills nav-sidebar nav-flat flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <li class="nav-item">
        <a href="{{ route('dashboard.report.index') }}" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>
                Dashboard
            </p>
        </a>
    </li>
    <li class="nav-item">
        <a href="#" class="nav-link ">
            <i class="nav-icon fas fa-calculator"></i>
            <p>
                Transaksi
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{ route('transaksi.header.index') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Jurnal</p>
                </a>
            </li>
        </ul>
    </li>
    <li class="nav-item">
        <a href="#" class="nav-link">
            <i class="nav-icon fas fa-edit"></i>
            <p>
                Otorisasi
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{ route('transaksi.header.index') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Transaksi Rekening Koran</p>
                </a>
            </li>
        </ul>
    </li>
</ul>
