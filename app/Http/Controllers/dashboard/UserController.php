<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Validator;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    
    /**
     * Display a listing of the resource.
     */
    public function index(request $request,user $users)
    {
        $q = $request->input('q');
        $active ='Users';
        $users = $users->when($q, function($query) use ($q) {
            return $query->where('name', 'like', '%' .$q. '%')
                         ->orwhere('email', 'like', '%' .$q. '%');
    })
    ->paginate(10);
    $request=$request->all();
    return view('dashboard/user/list',[
        'users' => $users,  
        'active' => $active,
        'request'=>$request,
        
    ]); 
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        {
            $active = 'User';
            $users = User::all();
            return view('dashboard/user/form', [
                'users' => $users,
                'active' => $active,
                'button' =>'Create',
                'url'    =>'dashboard.users.store'
            ]);
        }
    
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        
        $validator = VALIDATOR::make($request->all(), [
            'level' => ['required', Rule::in(['1', '2', '3'])],
            'name' =>'required',
            'email' =>'required',
            'password' => 'required|min:8', // Tambahkan validasi untuk password baru
            'password_confirmation' => 'same:password', // Pastikan konfirmasi password sama dengan password
        ]);

        if($validator->fails()){
            return redirect('dashboard/user/create/')
            ->withErrors($validator)
            ->withinput();

  }else{
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->level = $request->input('level');
            
        // Menginput password jika ada input baru
        if ($request->has('password')) {
            $user->password = Hash::make($request->input('password'));
        }
        $user->save();
        $messagekey = 'user.store';
        return redirect()
                     ->route('dashboard.users')
                     ->with('message',__('Akun user Telah Terdaftar.',['title'=>$request->input('title')]));

    }
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $user = USER::find($id);
        $active='Users';
        return view('dashboard/user/form', [
           'active' => $active,
            'user'   => $user,
            'button' =>'Update',        
            'url'    =>'dashboard.users.update'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $user = USER::find($id);

        $validator = VALIDATOR::make($request->all(), [
            'level' => ['required', Rule::in(['1', '2', '3'])],
            'name' =>'required',
            'email' =>'required',
            'password' => 'nullable|min:8', // Tambahkan validasi untuk password baru
            'password_confirmation' => 'same:password', // Pastikan konfirmasi password sama dengan password
        ]);

   // Jika validasi gagal
    if($validator->fails()){
        return redirect()->back()
                ->withErrors($validator)
                ->withInput();
  }else{
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->level = $request->input('level');
        // Mengupdate password jika ada input baru
        if ($request->has('password')) {
            $user->password = Hash::make($request->input('password'));
        }
        $user->save();
        $messagekey = 'user.update';
        return redirect()
                   ->route('dashboard.users')
                   ->with ('message', __('Pergantian Data user Berhasil.',['title'=>$request->input('title')]));

    }
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
      $user = USER::find($id);
      $user->delete();
      $messageKey = 'user.delete';
      return redirect()
                  ->route('dashboard.users')
                  ->with ('message',__('Akun user Telah Dihapus',['title'=>$title]));
    }
    }

