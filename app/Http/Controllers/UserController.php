<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DataTables;

class UserController extends Controller
{

    public function load_user() {
        $user = User::orderBy('id', 'DESC')->get();

        return DataTables::of($user)
        ->addColumn('aksi', function ($user) {
            $pilih = "<button data-toggle='modal' id='tombol_edit' data-target='#modal-edit' 
                            class='btn btn btn-outline-primary btn-xs'
                            data-id = '".$user->id."'
                            data-role= '".$user->role."'
                            >
                        <i class='fa fa-pencil'></i>
                    </button>
                    <button class='btn btn-outline-warning btn-xs'
                        data-toggle='modal' id='tombol_hapus' data-id = '".$user->id."' 
                        data-target='#modal-hapus'>
                        <i class='fa fa-trash'></i>
                    </button>";
            return $pilih;
        })
        ->addColumn('fotoprofil', function($user) {
            $pic = $user->avatar != null ? '<img src="'.$user->avatar.'" width="50px">' : 
                    '<img src="https://ui-avatars.com/api/?name='.$user->name.'&color=727cf5&background=EBF4FF" alt="">' ;
        
            return $pic;
        })
        ->addIndexColumn()
        ->rawColumns(['aksi','fotoprofil'])
        ->make(true);
    }

    public function index() {
        return view('content.list_pengguna');
    }

    public function update(Request $request) {
        date_default_timezone_set("Asia/Bangkok");

        $date = date('Y-m-d H:i:s');
        $data = [
            'role' => $request->role,
            'updated_at' => $date
        ];
        $res = User::where('id', $request->id)->update($data);
        if($res == true) {
            return redirect('user')->with('success', 'Pengubahan data User berhasil');
        }
        else {
            return redirect('user')->with('error', 'Pengubahan data User gagal');
        }
    }

    public function destroy(Request $request) {
        $id = $request->id;
        $res = User::where('id', $id)->delete();
        if($res == true){
            return redirect('user')->with('success', 'Penghapusan data User berhasil');
        }
        else {
            return redirect('user')->with('error', 'Penghapusan data User Gagal');
        }
    }
}
