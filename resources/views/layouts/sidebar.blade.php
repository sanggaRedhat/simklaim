<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
      <li class="nav-item">
        <a href="../widgets.html" class="nav-link">
          <i class="nav-icon fas fa-tachometer-alt"></i>
          <p>
            Dashboard
          </p>
        </a>
      </li>
      <li class="nav-header">KEUANGAN</li>
      <li class="nav-item {{ open([
        'keuangan.header.index',
        'keuangan.header.create',
        'keuangan.jurnal.show',
        'keuangan.authorize-m.index',
        'keuangan.authorize-m.show',
        'keuangan.operasional.index'
        ]) }}">
        <a href="#" class="nav-link {{ set_active([
          'keuangan.header.index',
          'keuangan.jurnal.show',
          'keuangan.header.create',
          'keuangan.authorize-m.index'
          ]) }}">
          <i class="nav-icon fas fa-paper-plane"></i>
          <p>
            Mutasi
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{ route(
              'keuangan.header.index'
              ) }}" class="nav-link {{ set_active([
              'keuangan.header.index',
              'keuangan.jurnal.show',
              'keuangan.header.create',
              ]) }}">
              <i class="fas fa-minus nav-icon"></i>
              <p>Rekening Koran</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('keuangan.operasional.index') }}" class="nav-link {{ 
              set_active([
                'keuangan.operasional.index'
              ]) }}">
              <i class="fas fa-minus nav-icon"></i>
              <p>Kas Operasional</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('keuangan.authorize-m.index') }}" class="nav-link {{ 
                set_active([
                  'keuangan.authorize-m.index',
                  'keuangan.authorize-m.show'
                ])
              }}">
              <i class="fas fa-minus nav-icon"></i>
              <p>Permintaan Otorisasi</p>
              <span style="display:none" class="badge badge-info right reminder-authorize-m"></span>
            </a>
          </li>
          <li class="nav-item {{ open([
        'admin.user.index',
        'admin.user.create',
        'admin.user.edit'
        ]) }}">
        <a href="#" class="nav-link {{ set_active([
          'admin.user.index',
          'admin.user.create',
          'admin.user.edit'
          ]) }}">
          <i class="nav-icon fas fa-paperclip"></i>
          <p>
            Administrasi Keuangan
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{ route('admin.user.index') }}" class="nav-link {{ set_active([
              'admin.user.index',
              'admin.user.create',
              'admin.user.edit'
              ]) }}">
              <i class="fas fa-minus nav-icon"></i>
              <p>Form Investasi</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fas fa-minus nav-icon"></i>
              <p>Manajemen Kode Akun</p>
            </a>
          </li>
        </ul>
      </li>
        </ul>
      </li>
      <li class="nav-header">ADMINISTRATOR</li>
      <li class="nav-item {{ open([
        'admin.user.index',
        'admin.user.create',
        'admin.user.edit'
        ]) }}">
        <a href="#" class="nav-link {{ set_active([
          'admin.user.index',
          'admin.user.create',
          'admin.user.edit'
          ]) }}">
          <i class="nav-icon fas fa-circle"></i>
          <p>
            Manajemen User
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{ route('admin.user.index') }}" class="nav-link {{ set_active([
              'admin.user.index',
              'admin.user.create',
              'admin.user.edit'
              ]) }}">
              <i class="fas fa-minus nav-icon"></i>
              <p>User</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fas fa-minus nav-icon"></i>
              <p>Level</p>
            </a>
          </li>
        </ul>
      </li>
    </ul>
  </nav>