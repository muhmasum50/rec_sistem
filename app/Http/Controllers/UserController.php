<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DataTables;

class UserController extends Controller
{

    public function load_user() {
        $user = User::all();

        return DataTables::of($user)
        ->addColumn('aksi', function ($user) {
            $pilih = $user->stock > 0 ? "<button class='btn btn-primary btn-sm' id='select'
                                            data-id = '".$user->id."'
                                            >
                                            <i class='fa fa-check'></i> Pilih
                                        </button>"
                    : "<button class='btn btn-default btn-sm' disabled > <i class='fa fa-check'></i> Pilih </button>"
                ;
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
}
