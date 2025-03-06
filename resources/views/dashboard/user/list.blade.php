@extends('layouts.dashboard')

@section('content')
  <div class="mb-2">
       <a href="{{route('dashboard.users.create')}}" class="btn btn-primary">+ Tambah User</a>
  </div>
    @if(session()->has('message'))
    <div class="alert alert-success">
        <strong>{{session()->get('message')}}</strong>
        <button type="button" class="close" data-dismiss="alert">
            <span>&times;</span>
        </button>
    </div>
    @endif
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-8 align-self-center">
                <h3>users</h3>
            </div>
            <div class="col-4">
                <form method="get" action="{{ url('dashboard/users')}}">
                    <div class="input-group">
                        <input type="text"class="form-control form-control-sm"name="q"value="{{$request['q']??''}}">
                        <div class="input-group-append">
                            <button type="submit"class="btn btn-secondary btn-sm">search</button>
                        </div>
                    </div>
               </form>
            </div>
        </div>
    </div>
</div>

    <div class="card-body p-0">
    <table class="table">
        <tr>
            <th>NO</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Level</th>
            <th>Hak Akses</th>
            <th>Registed</th>
            <th>Edited</th>
            <th> </th>
        </tr>
        </thead>
        </tbody>
        @foreach ($users as $user)
        <tr>
            <th>{{($users->currentpage()-1)*$users->perpage()+$loop->iteration }}</th>
            </td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->level}}</td>
            <td>
                @if($user->level == 1)
                Admin
                @elseif($user->level == 2)
                  siswa
                 
                @endif
            </td>
            <td>{{$user->created_at}}</td>
            <td>{{$user->updated_at}}</td>
            <td><a href="{{ url('dashboard/user/edit/'.$user->id) }}" class="btn btn-success btn-sm">Edit</a></td>
        @endforeach
    </tbody>
    </table>
    {{$users->appends($request)->links()}}
    </div>
</div>    
@endsection