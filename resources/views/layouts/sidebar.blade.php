<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ asset('AdminLTE-2/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ auth()->user()->name }}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        
        <li>
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            
          </a>
        </li>
        <li>
          <a href="{{ route('guru.index') }}">
            <i class="fa fa-file-pdf-o"></i> <span>Guru</span>
          </a>
        </li>
        <li>
          <a href="{{ route('mata-pelajaran.index') }}">
            <i class="fa fa-file-pdf-o"></i> <span>Mata Pelajaran</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class="fa fa-file-pdf-o"></i> <span>Nilai Sikap</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class="fa fa-file-pdf-o"></i> <span>Keterampilan</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class="fa fa-file-pdf-o"></i> <span>Pengetahuan</span>
          </a>
        </li> 
        <li>
          <a href="#">
            <i class="fa fa-users"></i> <span>Siswa</span>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>