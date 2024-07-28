@extends('/template/navbar')
@section('isi')
<div class="d-flex justify-content-center align-items-center full-height ">
        <div class="card mt-5 mb-5 " style="width: 30rem;">
            <div class="card-body text-center">
                <h5 class="card-title text-center">CHECK-OUT</h5>
                <h6 class="card-subtitle mb-2 text-body-secondary">Pesanan Telah Diterima</h6>
                <p class="card-text">Pesanan sedang dalam proses pembuatan, silahkan lakukan pembayaran di kasir</p>
                <a href="{{ route('index') }}" class="btn btn-dark">Halaman utama</a>
            </div>
        </div>
    </div>
@endsection