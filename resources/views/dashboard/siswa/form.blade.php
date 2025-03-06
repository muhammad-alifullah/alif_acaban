@extends('layouts.dashboard')

@section('content')
  <div class="card">
    <div class="card-header">
     <div class="row">
        <div class="col-8 align-self-center">
          <h3>siswa</h3>
        </div>
        <div class="col-4 text-right">
         <button class="btn btn-sm text-secondary" data-bs-toggle="modal" data-bs-target="#deleteModal"><i class="fas fa-trash"></i></button>
              <!-- Tambahkan konten di sini sesuai kebutuhan -->
        </div>
      </div>
    </div>


    <div class="card-body p-2">
      <div class="row">
        <div class="col-md-8 offset-md-2">
            <form method="post" action="{{ route($url, $siswa->id ?? '') }}" enctype="multipart/form-data">
                @csrf
                @if(isset($siswa))
                    @method('put')
                @endif
                <div class="form-group">
                  <label for="nama">Nama</label>
                  <input type="text"class="form-control" name="nama" value="{{ $siswa->nama ??'' }}">
                  @error('nama')
                    <span class="text-danger">{{$message}}</span>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="nisn">Nisn</label>
                  <input type="text"class="form-control" name="nisn" value="{{ $siswa->nisn ??'' }}">
                  @error('nisn')
                    <span class="text-danger">{{$message}}</span>
                  @enderror
                </div> 
                <div class="form-group">
                  <label for="nik">Nik</label>
                  <input type="text"class="form-control" name="nik" value="{{ $siswa->nik ??''}}">
                  @error('nik')
                    <span class="text-danger">{{$message}}</span>
                  @enderror
                </div> 
                <div class="form-group">
                  <label for="agama">Agama</label>
                  <input type="text" class="form-control" name="agama" value="{{ $siswa->agama ??'' }}">
                  @error('agama')
                    <span class="text-danger">{{$message}}</span>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="no_daftar">Nomor Daftar</label>
                  <input type="text"class="form-control" name="no_daftar" value="{{ $siswa->no_daftar ??'' }}">
                  @error('no_daftar')
                      <span class="text-danger">{{$message}}</span>
                  @enderror
                </div> 
                <div class="form-group">
                  <label for="alamat">Alamat</label>
                  <input type="text"class="form-control" name="alamat" value="{{ $siswa->alamat ??'' }}">
                    @error('alamat')
                      <span class="text-danger">{{$message}}</span>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="asal_sekolah">Asal Sekolah</label>
                  <input type="text"class="form-control" name="asal_sekolah" value="{{ $siswa->asal_sekolah ??'' }}">
                  @error('asal_sekolah')
                    <span class="text-danger">{{$message}}</span>
                  @enderror
                </div>
                <div class="form-group">
                    <label for="Jenis_Kelamin">Jenis Kelamin</label>
                    <select class="form-control" name="jenis_kelamin">
                    <option value="">-- Pilih Jenis Kelamin --</option>
                    <option value="Laki-laki" {{ (old('jenis_kelamin', $siswa->jenis_kelamin ?? '') == 'Laki-laki') ? 'selected' : '' }}>Laki-laki</option>
                   <option value="Perempuan" {{ (old('jenis_kelamin', $siswa->jenis_kelamin ?? '') == 'Perempuan') ? 'selected' : '' }}>Perempuan</option>
              </select>
                 @error('jenis_kelamin')
        <span class="text-danger">{{ $message }}</span>
           @enderror
        </div>
                <div class="form-group">
                    <label for="tempat_tanggal_lahir">Tempat/Tanggal Lahir</label>
                    <input type="text"class="form-control" name="tempat_tanggal_lahir" value="{{ $siswa->tempat_tanggal_lahir ??'' }}">
                      @error('tempat_tanggal_lahir')
                        <span class="text-danger">{{$message}}</span>
                  @enderror
                  </div>
                  <div class="form-group">
                      <label for="no_kk">Nomor KK</label>
                      <input type="text"class="form-control" name="no_kk" value="{{ $siswa->no_kk ??'' }}">
                        @error('no_kk')
                          <span class="text-danger">{{$message}}</span>
                  @enderror
                </div>
                <div class="form-group mt-3">
                     <div class="custom-file">
                      <input type="file" name="gambar_siswa" class="custom-file-input">
                      <label for="gambar_siswa" class="custom-file-label">gambar_siswa</label>
                      @error('gambar_siswa')
                         <span class="text-danerg">{{ $message }}</span>
                        @enderror
                   </div>
                </div>
                <div class="form-group mt-4">
                    <button type="button" onclick="window.history.back()" class="btn btn-sm btn-secondary btn-danger me-2">Cancel</button>
                    <button type="submit" class="btn btn-success btn-sm">{{ $button }}</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      
        @if(isset($siswa))
        <div class="modal fade" id="deleteModal">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                
                    <h5 class="modal-gambar_siswa">Delete</h5>
                    <button type="button"class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <div class="modal-body">
                       <p>Anda yakin ingin menghapus siswa</p>
                  </div>
                  <div class="modal-footer">
                       <form action="{{ route('dashboard.siswa.delete', $siswa->id) }}"method="post">
                        @csrf
                        @method('delete')
                         <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                     </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    @endif
  </div>
@endsection






