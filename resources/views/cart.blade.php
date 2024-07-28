@extends('/template/navbar')
@section('isi')
<div class="container" style="margin-top: 5%">
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            setTimeout(function() {
                var alerts = document.querySelectorAll('.alert');
                alerts.forEach(function(alert) {
                    alert.style.transition = 'opacity 0.5s ease';
                    alert.style.opacity = '0';
                    setTimeout(function() {
                        alert.style.display = 'none';
                    }, 500); // waktu untuk transisi
                });
            }, 2000); // waktu dalam milidetik (3000ms = 3 detik)
        });
    </script>

<div class="container">
    <h3 class="mb-4">Keranjang Belanja</h3>
    <div class="card p-5 mb-5">
        <form action="{{ route('cart.checkout') }}" method="POST">
            @csrf
            <div class="form-group mb-2">
                <label for="atasnama">Nama :</label>
                <input type="text" id="atasnama" name="atasnama" class="form-control" required>
            </div>
            <div class="form-group mb-2">
                <label for="meja">Pilih Nomer Meja :</label>
                <select name="meja" id="meja" class="form-control" required>
                    <option value=""></option>
                    @foreach ($meja as $item)
                    <option value="{{ $item->no_meja }}">{{ $item->no_meja }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group mb-2">
                <label for="lokasi">Lokasi (optional) :</label>
                <input type="text" id="lokasi" name="lokasi" class="form-control">
            </div>
            @if(!empty($cart) && count($cart) > 0)
                <div class="table-responsive">
                    <table class="form-table table table-bordered mt-4">
                        <thead>
                            <tr>
                                <th>Gambar</th>
                                <th>Nama</th>
                                <th>Harga</th>
                                <th>Jumlah</th>
                                <th>Total</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cart as $id => $item)
                                <tr>
                                    <td><img src="/image/{{ $item['gambar'] }}" style="max-width: 50px;" alt="{{ $item['nama'] }}"></td>
                                    <td>{{ $item['nama'] }}</td>
                                    <td>RP. {{ number_format($item['harga'], 0, ',', '.') }}</td>
                                    <td class="d-flex align-items-center">
                                        <a href="{{ route('cart.decrease', $id) }}" class="btn btn-outline-secondary" type="button">-</a>
                                        <input type="text" class="form-control text-center mx-2" value="{{ $item['quantity'] }}" readonly>
                                        <a href="{{ route('cart.increase', $id) }}" class="btn btn-outline-secondary" type="button">+</a>
                                    </td>
                                    <td>RP. {{ number_format($item['harga'] * $item['quantity'], 0, ',', '.') }}</td>
                                    <td>
                                        <a href="{{ route('cart.remove', $id) }}" class="btn btn-danger btn-sm">Hapus</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="text-right">
                    <h4>Total: RP. {{ number_format($total, 0, ',', '.') }}</h4>
                </div>
                <button type="submit" class="btn btn-success checkout-btn">Checkout</button>
                <a href="/" class="btn btn-primary return-btn">Kembali</a>
            @else
                <p>Keranjang belanja Anda kosong.</p>
            @endif
        </form>
    </div>
</div>

<style>
    .checkout-btn,
    .return-btn {
        width: calc(50% - 5px); 
    }
</style>


</div>
@endsection