 <!-- Left Panel -->
 <aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="{{Request::segment(1) == 'dashboard' ? 'active' : ''}}">
                    <a href="/dashboard"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                </li>
                <li class="menu-title">Barang</li>
                <!-- /.menu-title -->
                <li class="{{Request::segment(1) == 'product' ? 'active' : ''}}">
                    <a href="/product"> <i class="menu-icon fa fa-list"></i>Lihat Barang</a>
                </li>

                <li class="menu-title">Foto Barang</li>
                <!-- /.menu-title -->
                <li class="{{Request::segment(1) == 'gallery' ? 'active' : ''}}">
                    <a href="/gallery"> <i class="menu-icon fa fa-list"></i>Lihat Foto Barang</a>
                </li>

                <li class="menu-title">Transaksi</li>
                <!-- /.menu-title -->
                <li class="{{Request::segment(1) == 'transaction'? 'active' : ''}}">
                    <a href="/transaction"> <i class="menu-icon fa fa-list"></i>Lihat Transaksi</a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </nav>
</aside>
<!-- /#left-panel -->
