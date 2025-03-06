@extends('layouts.dashboard')

@section('content')
<div class="mb-3">
    <a href ="{{route('dashboard.siswa')}}"class="btn btn-secondary">⬅ Kembali Ke Daftar Siswa</a>
</div>
  <div class= "container">
     <div class="card shadow-sm">
     <div class="card-header bg-primary text-white">
     <h3 class="mb-0">Detail Siswa</h3>
  </div>
     <div class="card">
      <div class="card-header">
      <div class="row">
      <div class="col-8 align-self-center">
  </div>
       <div class="col-4 text-right">
            <button class="btn btn-sm text-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
            <i class="fas fa-trash"></i>
          </button>
        </div>
      </div>
    </div> 

    <div class="siswa-detail">
      <!-- Gambar Siswa -->
      <div class="colgambar_siswa" style="text-align: center; margin-bottom: 90px;">
        <img src="{{ asset('storage/siswa/'.$siswa->gambar_siswa) }}" class="img-foto_siswa" style="width: 250px; ">
      </div>

      <!-- Informasi Siswa dalam Tabel -->
      <table class="table table-bordered">
        <tbody>
          <tr>
            <td><strong>Nama</strong></td>
            <td>{{ $siswa->nama }}</td>
          </tr>
          <tr>
            <td><strong>NISN</strong></td>
            <td>{{ $siswa->nisn }}</td>
          </tr>
          <tr>
            <td><strong>NIK</strong></td>
            <td>{{ $siswa->nik }}</td>
          </tr>
          <tr>
            <td><strong>Agama</strong></td>
            <td>{{ $siswa->agama }}</td>
          </tr>
          <tr>
            <td><strong>No Daftar</strong></td>
            <td>{{ $siswa->no_daftar }}</td>
          </tr>
          <tr>
            <td><strong>Alamat</strong></td>
            <td>{{ $siswa->alamat }}</td>
          </tr>
          <tr>
            <td><strong>Asal Sekolah</strong></td>
            <td>{{ $siswa->asal_sekolah }}</td>
          </tr>
          <tr>
            <td><strong>Jenis Kelamin</strong></td>
            <td>{{ $siswa->jenis_kelamin }}</td>
          </tr>
          <tr>
          <td><strong>Tempat, Tanggal Lahir</strong></td>
           <td>{{ $siswa->tempat_lahir }} {{ \Carbon\Carbon::parse($siswa->tanggal_lahir)->isoFormat('D MMMM YYYY') }}</td>
          </tr>
            <td><strong>No KK</strong></td>
            <td>{{ $siswa->no_kk }}</td>
          </tr>
        </tbody>
      </table>

      <!-- Tombol Edit -->
      <div class="text-center mt-3">
        <a href="{{ route('dashboard.siswa.edit', $siswa->id) }}" class="btn btn-primary">
          <i class="fas fa-pen"></i> Edit
        </a>
      </div>
    </div>

    <!-- Modal Delete -->
    @if(isset($siswa))
      <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="deleteModalLabel">Delete</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <p>Anda yakin ingin menghapus siswa ini?</p>
            </div>
            <div class="modal-footer">
              <form action="{{ route('dashboard.siswa.delete', $siswa->id) }}" method="post">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-sm btn-danger">
                  <i class="fas fa-trash"></i> Hapus
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    @endif
  </div>
@endsection
