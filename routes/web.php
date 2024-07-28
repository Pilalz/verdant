<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UlasanController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MejaController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\SubKategoriController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//ADMIN
Route::get('/admin', [AdminController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login');
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

//Auth
Route::get('/logout', function () {
    Auth::logout();
    return redirect('/admin');
})->name('logout');
Route::get('/admin/access-denied', function () {
    return view('admin.access-denied');
})->name('access-denied');

//Pesanan
Route::get('/admin/pesanan', [AdminController::class, 'transaksi'])->name('admin.pesanan');
Route::get('/admin/pesanan/paid', [AdminController::class, 'transaksiPaid'])->name('admin.pesanan-paid');
Route::get('/admin/pesanan/detail/{id}', [AdminController::class, 'detailTransaksi'])->name('admin.pesanan.detail');
Route::get('/admin/pesanan/detail/paid/{id}', [AdminController::class, 'detailTransaksiPaid'])->name('admin.pesanan.detail-paid');
Route::put('/admin/pesanan/detail/bayar{id}', [AdminController::class, 'updateTransaksi'])->name('admin.pesanan.update');

//Data Menu
Route::middleware(['auth', 'role:owner'])->group(function () {
    Route::get('/admin/data/menu', [MenuController::class, 'menu'])->name('admin.menu');
    Route::get('admin/data/menu/create', [MenuController::class, 'create'])->name('admin.menu.create');
    Route::post('admin/data/menu/create/save', [MenuController::class, 'save'])->name('admin.menu.save');
    Route::get('admin/data/menu/remove/{id}', [MenuController::class, 'remove'])->name('admin.menu.remove');
    Route::get('admin/data/menu/edit/{id}', [MenuController::class, 'edit'])->name('admin.menu.edit');
    Route::put('admin/data/menu/edit/save/{id}', [MenuController::class, 'update'])->name('admin.menu.update');
});

//Data Meja
Route::middleware(['auth', 'role:owner'])->group(function () {
    Route::get('admin/data/meja', [MejaController::class, 'meja'])->name('admin.meja');
    Route::get('admin/data/meja/create', [MejaController::class, 'create'])->name('admin.meja.create');
    Route::post('admin/data/meja/create/save', [MejaController::class, 'save'])->name('admin.meja.save');
    Route::get('admin/data/meja/remove/{id}', [MejaController::class, 'remove'])->name('admin.meja.remove');
    Route::get('admin/data/meja/edit/{id}', [MejaController::class, 'edit'])->name('admin.meja.edit');
    Route::put('admin/data/meja/edit/save/{id}', [MejaController::class, 'update'])->name('admin.meja.update');
});

//Data Kategori
Route::middleware(['auth', 'role:owner'])->group(function () {
    Route::get('/admin/data/kategori', [KategoriController::class, 'kategori'])->name('admin.kategori');
    Route::get('admin/data/kategori/create', [KategoriController::class, 'create'])->name('admin.kategori.create');
    Route::post('admin/data/kategori/create/save', [KategoriController::class, 'save'])->name('admin.kategori.save');
    Route::get('admin/data/kategori/edit/{id}', [KategoriController::class, 'edit'])->name('admin.kategori.edit');
    Route::put('admin/data/kategori/edit/save/{id}', [KategoriController::class, 'update'])->name('admin.kategori.update');
    Route::get('admin/data/kategori/remove/{id}', [KategoriController::class, 'remove'])->name('admin.kategori.remove');
});

//Data Sub
Route::middleware(['auth', 'role:owner'])->group(function () {
    Route::get('/admin/data/subkategori', [SubKategoriController::class, 'subkategori'])->name('admin.subkategori');
    Route::get('admin/data/subkategori/create', [SubKategoriController::class, 'create'])->name('admin.subkategori.create');
    Route::post('admin/data/subkategori/create/save', [SubKategoriController::class, 'save'])->name('admin.subkategori.save');
    Route::get('admin/data/subkategori/edit/{id}', [SubKategoriController::class, 'edit'])->name('admin.subkategori.edit');
    Route::put('admin/data/subkategori/edit/save/{id}', [SubKategoriController::class, 'update'])->name('admin.subkategori.update');
    Route::get('admin/data/subkategori/remove/{id}', [SubKategoriController::class, 'remove'])->name('admin.subkategori.remove');
});

//Data User
Route::middleware(['auth', 'role:owner'])->group(function () {
    Route::get('/admin/data/user', [AdminController::class, 'user'])->name('admin.user');
    Route::get('admin/data/user/create', [AdminController::class, 'create'])->name('admin.user.create');
    Route::post('admin/data/user/create/save', [AdminController::class, 'save'])->name('admin.user.save');
    Route::get('admin/data/user/edit/{id}', [AdminController::class, 'edit'])->name('admin.user.edit');
    Route::put('admin/data/user/edit/save/{id}', [AdminController::class, 'update'])->name('admin.user.update');
    Route::get('admin/data/user/remove/{id}', [AdminController::class, 'remove'])->name('admin.user.remove');
});

//index & kategori
Route::get('/', [MenuController::class, 'index'])->name('index');
Route::get('/kategori/{id}', [MenuController::class, 'index'])->name('index.kategori');

//cart
Route::get('/cart', [CartController::class, 'viewCart'])->name('cart.view');
Route::get('/cart/increase/{id}', [CartController::class, 'increaseQuantity'])->name('cart.increase');
Route::get('/cart/decrease/{id}', [CartController::class, 'decreaseQuantity'])->name('cart.decrease');
Route::get('/cart/add/{id}', [CartController::class, 'addToCart'])->name('cart.add');
Route::get('/cart/remove/{id}', [CartController::class, 'removeFromCart'])->name('cart.remove');
Route::post('/cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
Route::get('/cart/checkout/success', [CartController::class, 'checkoutSuccess'])->name('transaksi');

//tentang
Route::get('/tentang', [MenuController::class, 'tentang'])->name('tentang');

//ulasan
Route::get('/ulasan', [UlasanController::class, 'ulasan'])->name('ulasan');
Route::get('/admin/ulasan', [UlasanController::class, 'showUlasan'])->name('admin.ulasan');
Route::post('/ulasan/save', [UlasanController::class, 'save'])->name('ulasan.save');