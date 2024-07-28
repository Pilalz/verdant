@extends('admin/layout/header')
@section('isinya')
    <!-- Page Wrapper -->
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                    <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                    <li class="nav-item dropdown no-arrow d-sm-none">
                        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-search fa-fw"></i>
                        </a>
                        <!-- Dropdown - Messages -->
                        <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                            aria-labelledby="searchDropdown">
                            <form class="form-inline mr-auto w-100 navbar-search">
                                <div class="input-group">
                                    <input type="text" class="form-control bg-light border-0 small"
                                        placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="button">
                                            <i class="fas fa-search fa-sm"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </li>

                    <!-- Nav Item - Alerts -->
                    <li class="nav-item dropdown no-arrow mx-1">
                        <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-bell fa-fw"></i>
                            <!-- Counter - Alerts -->
                            <span class="badge badge-danger badge-counter">3+</span>
                        </a>
                        <!-- Dropdown - Alerts -->
                        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                            aria-labelledby="alertsDropdown">
                            <h6 class="dropdown-header">
                                Pesanan Masuk
                            </h6>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="mr-3">
                                    <div class="icon-circle bg-primary">
                                        <i class="fas fa-file-alt text-white"></i>
                                    </div>
                                </div>
                                <div>
                                    <div class="small text-gray-500">December 12, 2019</div>
                                    <span class="font-weight-bold">A new monthly report is ready to download!</span>
                                </div>
                            </a>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="mr-3">
                                    <div class="icon-circle bg-success">
                                        <i class="fas fa-donate text-white"></i>
                                    </div>
                                </div>
                                <div>
                                    <div class="small text-gray-500">December 7, 2019</div>
                                    $290.29 has been deposited into your account!
                                </div>
                            </a>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="mr-3">
                                    <div class="icon-circle bg-warning">
                                        <i class="fas fa-exclamation-triangle text-white"></i>
                                    </div>
                                </div>
                                <div>
                                    <div class="small text-gray-500">December 2, 2019</div>
                                    Spending Alert: We've noticed unusually high spending for your account.
                                </div>
                            </a>
                            <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                        </div>
                    </li>

                    <!-- Nav Item - Messages -->
                    <div class="topbar-divider d-none d-sm-block"></div>

                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">Bima hilal</span>
                            <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                            aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                Profile
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="login.html" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                            </a>
                        </div>
                    </li>
                </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2" style="color: #423118; text-align: center;">Detail Pesanan</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <form action="{{ route('admin.pesanan.update', $detail_transaksi->id_transaksi) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <table class="mb-4">
                                        <tr>
                                            <th>Id Transaksi </th>
                                            <td>{{ $detail_transaksi->id_transaksi }}</td>
                                        </tr>

                                        <tr>
                                            <th>Nomor Meja </th>
                                            <td><input type="text" id="no_meja" name="no_meja" value="{{ $detail_transaksi->no_meja }}" readonly></input><!-- update --></td>
                                        </tr>
                                        
                                        <tr>
                                            <th>Nama Pelanggan </th>
                                            <td><input type="text" id="nama_pelanggan" name="nama_pelanggan" value="{{ $detail_transaksi->nama_pelanggan }}" readonly></input><!-- update --></td>
                                        </tr>

                                        <tr>
                                            <th>Kasir </th>
                                            <td><input type="text" id="id_kasir" name="id_kasir" value="{{ $detail_transaksi->id_kasir }}" readonly></input><!-- update --></td>
                                        </tr>
                                    </table>
                                    
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr style="text-align: center;">
                                                <th>No</th>
                                                <th>Gambar</th>
                                                <th>Nama</th>
                                                <th>Harga</th>
                                                <th>Jumlah</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($menu as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->gambar_menu }}</td>
                                                <td>{{ $item->judul_menu }}</td>
                                                <td>RP. {{ number_format($detail_transaksi->harga_menu, 0, ',', '.') }}</td>
                                                <td>{{ $item->jumlah }}</td>
                                                <td>RP. {{ number_format($detail_transaksi->total, 0, ',', '.') }}</td>
                                            </tr>
                                            @empty
                                            <div class="alert alert-danger">
                                                Data Post belum Tersedia.
                                            </div>
                                            @endforelse
                                        </tbody>
                                    </table>

                                    <table>
                                        <tr>
                                            <th>Total Menu </th>
                                            <td><input type="text" id="total_menu" name="total_menu" value="{{ $detail_transaksi->total_menu }}" readonly></input><!-- update --></td>
                                        </tr>
                                        
                                        <tr>
                                            <th>Total Harga </th>
                                            <td><input type="text" id="total_harga" name="total_harga" value="{{ $detail_transaksi->total_harga }}" readonly></input><!-- update --></td>
                                            <td>RP. {{ number_format($detail_transaksi->total_harga, 0, ',', '.') }}</td>
                                        </tr>
                                    
                                        <tr>
                                            <th>Dibayar </th>
                                            <td><input type="number" id="dibayar" name="dibayar" value="RP. {{ $detail_transaksi->dibayar ?? 0 }}"></input></td>
                                        </tr>
                                    
                                        <tr>
                                            <th>Kembalian </th>
                                            <td><input type="text" id="kembalian" name="kembalian" readonly></td>
                                            <td><span id="kembalianFormatted"></span></td>
                                        </tr>
                                    </table>
                                    
                                    <button type="submit" class="btn btn-success mt-4">Bayar</button>
                                    <a href="{{ route('admin.pesanan') }}" class="btn btn-dark mt-4">Kembali</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Verdant 2024</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->
        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('dibayar').addEventListener('input', function() {
            var totalHarga = {{ $detail_transaksi->total_harga }};
            var dibayar = parseInt(this.value);
            var kembalian = dibayar - totalHarga;

            if (!isNaN(kembalian) && kembalian >= 0) {
                document.getElementById('kembalian').value = kembalian;
                document.getElementById('kembalianFormatted').innerText = new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(kembalian);
            } else {
                document.getElementById('kembalian').value = 0;
                document.getElementById('kembalianFormatted').innerText = 'RP. 0';
            }
        });
    </script>

@endsection
