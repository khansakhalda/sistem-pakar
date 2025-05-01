@extends('Dashboard.layout.app')

@section('content')
<style>
    /* Warna teks dan link breadcrumb disamakan dengan oranye */
    .text-info-custom {
        color: #ff914d; /* Warna oranye lembut */
    }

    .breadcrumb .breadcrumb-item.active,
    .breadcrumb a {
        color: #ff914d;
        font-weight: 500;
        text-decoration: none;
    }

    .breadcrumb a:hover {
        text-decoration: underline;
    }

    /* Ubah border input saat fokus jadi oranye */
    .form-control:focus {
        border-color: #ff914d;
        box-shadow: 0 0 0 0.2rem rgba(255, 145, 77, 0.25);
    }

    /* Tombol oranye */
    .btn-orange {
        background-color: #ff914d;
        color: white;
        border: none;
    }

    .btn-orange:hover {
        background-color: #e67d3e;
        color: white;
    }
</style>

<div class="page-header mb-3">
    <div class="row align-items-center">
        <div class="col-md-6">
            <h4 class="text-info-custom fw-bold mb-1">Buat Akun Baru</h4>
            <p class="text-muted small">Silakan isi formulir berikut untuk mulai menggunakan SIDINYAM.</p>
        </div>
    </div>

    <nav aria-label="breadcrumb" class="mt-2">
        <ol class="breadcrumb bg-white rounded px-3 py-2 shadow-sm">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Beranda</a></li>
            <li class="breadcrumb-item active" aria-current="page">Registrasi</li>
        </ol>
    </nav>
</div>

<div class="card border-0 shadow-sm rounded-lg px-4 py-4">
    <form method="POST" action="{{ route('register') }}">
        @csrf

        {{-- Nama --}}
        <div class="form-group mb-3">
            <label for="name" class="font-weight-semibold">Nama Lengkap</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}"
                class="form-control @error('name') is-invalid @enderror" placeholder="Contoh: Khansa Khalda">
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Usia --}}
        <div class="form-group mb-3">
            <label for="age">Usia</label>
            <input type="text" id="age" name="age" value="{{ old('age') }}"
                class="form-control @error('age') is-invalid @enderror" placeholder="Contoh: 20">
            @error('age')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Nomor HP --}}
        <div class="form-group mb-3">
            <label for="number">Nomor HP</label>
            <input type="text" id="number" name="number" value="{{ old('number') }}"
                class="form-control @error('number') is-invalid @enderror" placeholder="Contoh: 085123456789">
            @error('number')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Email --}}
        <div class="form-group mb-3">
            <label for="email">Alamat Email</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}"
                class="form-control @error('email') is-invalid @enderror" placeholder="Contoh: email@domain.com">
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Alamat --}}
        <div class="form-group mb-3">
            <label for="address">Alamat Tempat Tinggal</label>
            <input type="text" id="address" name="address" value="{{ old('address') }}"
                class="form-control @error('address') is-invalid @enderror" placeholder="Contoh: Jl. Kenanga No. 10, Purwokerto">
            @error('address')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Password --}}
        <div class="form-group mb-3">
            <label for="password">Kata Sandi</label>
            <input type="password" id="password" name="password"
                class="form-control @error('password') is-invalid @enderror" placeholder="Masukkan password yang kuat">
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Konfirmasi Password --}}
        <div class="form-group mb-4">
            <label for="password_confirmation">Ulangi Kata Sandi</label>
            <input type="password" id="password_confirmation" name="password_confirmation"
                class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="Ketik ulang password">
            @error('password_confirmation')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Tombol Submit --}}
        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-orange rounded-pill px-4 py-2">
                Daftar Sekarang
            </button>
        </div>
    </form>
</div>
@endsection
