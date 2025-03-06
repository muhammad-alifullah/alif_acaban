@extends('layouts.dashboard')

@section('content')
<div class="mb-2">
    <a href ="{{route('dashboard.siswa.create')}}"class="btn btn-primary">+Siswa</a>
</div>
@if(session()->has('message'))
<div class="alert alert-success alert-dismissible fade show">
     <strong>{{session()->get('message')}}</strong>
     <button type="button" class="btn-close" data-dismiss="alert">
     </button>
</div>
@endif

<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-8 align-self-center">
                <h3>Siswa</h3>
            </div>
            <div class="col-4">
                <form method="get" action="{{ route('dashboard.siswa') }}">
                    <div class="input-group">
                        <input type="text"class="form-control form-control-sm"name="q"value="{{$request['q']??''}}">
                        <div class="input-group-append">
                            <button type="submit"class="btn btn-secondary btn-danger">search</button>
                        </div>
                    </div>
               </form>
            </div>
        </div>
    </div>
</div>

    <div class="card-body p-0">
        @if($siswas->total())
    <table class="table table-bordered table-striped table-hover">
        <thead>
        <tr>
            <th>NO</th>
            <th>NAMA</th>
            <th>NIK</th>
            <th>AGAMA</th>
            <th>LIHAT DETAIL</th>
        </tr>
        </thead>
        </tbody>
        @foreach ($siswas as $siswa)
        <tr>
            <th>{{ ($siswas->currentpage() -1) * $siswas->perpage() + $loop->iteration }}</th>
            </td>
            <td>{{$siswa->nama}}</td>
            <td>{{$siswa->nik}}</td>
            <td>{{$siswa->agama}}</td>
            <td><a href="{{ route('dashboard.siswa.show', $siswa->id) }}" class="btn btn-info text-white btn"><i class="fas fa-eye"></i></a></td>
        </tr>
        @endforeach
    </tbody>
    </table>
    {{$siswas->Links()}}
    @else
    <h5 class="text-center p-3">Belum ada data Siswa</h5>
    @endif
    </div>
</div>    
@endsection