@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-lg">
                <div class="card-header bg-white text black- d-flex align-items-center">
                    <!-- Tambahkan Logo Sekolah -->
                    <img src="{{ asset('img/logo_aw.png') }}" alt="Logo aw" class="img-fluid me-2" width="80">
                    <h5 class="mb-0">{{ __('SELAMAT DATANG DI SMK AL-WASHLIYAH 02 PERDAGANGAN') }}</h5>
                </div>

                <div class="card-body text-center">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p class="lead">{{ __('Silakan daftar untuk menjadi bagian dari keluarga besar kami!') }}</p>

                    <!-- Informasi Pendaftaran -->
                    <div class="row mt-4">
                        <!-- Program Keahlian -->
                        <div class="col-md-4">
                            <div class="card border-0 shadow">
                                <div class="card-body">
                                    <h5 class="card-title">🔹 Program Keahlian</h5>
                                    <ul class="">
                                        <li>Pengembangan Perangkat Lunak dan Gim (PPLG)</li>
                                        <li>Teknik Komputer dan Jaringan (TKJ)</li>
                                        <li>Otomatisasi dan Tata Kelola Perkantoran (OTKP)</li>
                                        <li>Akuntansi dan Keuangan Lembaga (AKL)</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- Jadwal Pendaftaran -->
                        <div class="col-md-4">
                            <div class="card border-0 shadow">
                                <div class="card-body">
                                    <h5 class="card-title">📅 Jadwal Pendaftaran</h5>
                                    <p class="card-text">Pendaftaran dibuka dari 1 Januari - 30 Juni 2025.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Kontak Sekolah -->
                        <div class="col-md-4">
                            <div class="card border-0 shadow">
                                <div class="card-body">
                                <h5 class="card-title">🔹 Clas Industri</h5>
                                <ul class="list-unstyled">
                                <li>📌 Axio</li>
                                <li>📌 Clas BCA</li>
                            </ul>
                         </div>
                      </div>
                  </div>

                <div class="card-footer text-muted text-center">
                     <div class="card-header bg-success text-white">
                📞 Hubungi Kami: (0622)96803 (Admin Sekolah)</p>
                    © {{ date('Y') }} SMK AL-WASHLIYAH 02 PERDAGANGAN
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
