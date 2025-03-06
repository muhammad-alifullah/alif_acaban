<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,Siswa $Siswa)
    {
        $q = $request->input('q');

        $active = ('Siswa');

        $Siswa = $Siswa->when($q, function($query) use($q) {
            return $query->where('nama','like','%'.$q.'%');
         })

         ->paginate(10);
         return view('dashboard/siswa/list', [
            'siswas' => $Siswa,
            'request' => $request,
            'active' => $active
         ]);
    }

    /**
     * Show the form for creating a new resource.
     * 
     * * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $active = 'Siswa';
        return view('dashboard/Siswa/form',[
            'active' => $active,
            'button' =>'create',
            'url' =>'dashboard.siswa.store'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
           'gambar_siswa' => 'required|image',
           'nama'  =>'required',
           'nisn' =>'required|unique:App\Models\Siswa,nisn',
           'nik'  =>'required|unique:App\Models\Siswa,nik',
           'agama' =>'required',
           'no_daftar' =>'required|unique:App\Models\Siswa,no_daftar',
           'alamat' =>'required',
           'asal_sekolah' =>'required',
           'jenis_kelamin' =>'required',
           'tempat_tanggal_lahir'  =>'required',
           'no_kk' =>'required|unique:App\Models\Siswa,no_kk'
     ]);

     if ($validator->fails()) {
        return redirect()
        ->route('dashboard.siswa.create')
        ->withErrors($validator)
        ->withinput();
     }else {
        $siswa = new Siswa();
        $image = $request->file('gambar_siswa');
        $filename = time() .'.'. $image->getClientoriginalExtension();
        Storage::disk('local')->putfileAs('public/siswa',$image,$filename);
        $siswa->gambar_siswa = $filename;
        $siswa->nama =$request->input('nama');
        $siswa->nisn =$request->input('nisn');
        $siswa->nik =$request->input('nik');
        $siswa->agama =$request->input('agama');
        $siswa->no_daftar =$request->input('no_daftar');
        $siswa->alamat =$request->input('alamat');
        $siswa->asal_sekolah =$request->input('asal_sekolah');
        $siswa->jenis_kelamin =$request->input('jenis_kelamin');
        $siswa->tempat_tanggal_lahir =$request->input('tempat_tanggal_lahir');
        $siswa->no_kk =$request->input('no_kk');
        $siswa->save();

        return redirect()
                    ->route('dashboard.siswa')
                    ->with('message',__('Akun Siswa Telah Terdaftar.',['title'=>$request->input('title')]));
        
                        
     }       
            
    }

    /**
     * Display the specified resource.
     */
    public function show(Siswa $siswa)
    {
        $active = 'siswa';
        return view('dashboard/siswa/show',[
            'active' => $active,
            'siswa' =>$siswa,
        
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Siswa $siswa)
    {
        $active = 'siswa';
        return view('dashboard/siswa/form',[
            'active' => $active,
            'siswa' =>$siswa,
            'button' =>'Update',
            'url' => 'dashboard.siswa.update'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Siswa $siswa)
    {
        //
          $validator = Validator::make($request->all(), [
            'gambar_siswa' => 'image',
            'nama'  =>'required',
            'nisn' =>'required|unique:App\Models\Siswa,nisn,'.$siswa->id,
            'nik'  =>'required|unique:App\Models\Siswa,nik,'.$siswa->id,
            'agama' =>'required',
            'no_daftar' =>'required|unique:App\Models\Siswa,no_daftar,'.$siswa->id,
            'alamat' =>'required',
            'asal_sekolah' =>'required',
            'jenis_kelamin' =>'required',
            'tempat_tanggal_lahir'  =>'required',
            'no_kk' =>'required|unique:App\Models\Siswa,no_kk,'.$siswa->id
      ]);
 
      if ($validator->fails()) {
         return redirect()
         ->route('dashboard.siswa.edit',$siswa->id)
         ->withErrors($validator)
         ->withinput();
      }else {
        if($request->hasFile('gambar_siswa')) {
            $image = $request->file('gambar_siswa');
            $filename = time() .'.'. $image->getClientoriginalExtension();
            Storage::disk('local')->putFileAs('public/siswa',$image,$filename);
            $siswa->gambar_siswa = $filename;
        }
         
         $siswa->nama =$request->input('nama');
         $siswa->nisn =$request->input('nisn');
         $siswa->nik =$request->input('nik');
         $siswa->agama =$request->input('agama');
         $siswa->no_daftar =$request->input('no_daftar');
         $siswa->alamat =$request->input('alamat');
         $siswa->asal_sekolah =$request->input('asal_sekolah');
         $siswa->jenis_kelamin =$request->input('jenis_kelamin');
         $siswa->tempat_tanggal_lahir =$request->input('tempat_tanggal_lahir');
         $siswa->no_kk =$request->input('no_kk');
         $siswa->save();
 
         return redirect()
                    ->route('dashboard.siswa')
                    ->with('message', __('Pergantian Data Siswa Berhasil.',['title'=>$request->input('title')]));

      }      
             
 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Siswa $siswa)
    {
        $title = $siswa->title;

        $siswa->delete();
        return redirect()
                ->route('dashboard.siswa')
                ->with ('message',__('Akun Siswa Telah Dihapus',['title'=>$title]));
    }
}
