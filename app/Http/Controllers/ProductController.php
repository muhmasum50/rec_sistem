<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;
use App\Product;
use Validator;
use App\Helpers\Yin;
use Jenssegers\Agent\Agent;
use Exception;
use DataTables;

class ProductController extends Controller
{
    public function load_product(Request $request) {
        if($request->ajax()) {
            $product = Product::select('product_name','id','price','product_desc','product_pic')
                ->orderBy('id', 'DESC')->get();

            return DataTables::of($product)
            ->addColumn('aksi', function ($product) {
                $pilih = "<button data-toggle='modal' id='tombol_edit' data-target='#modal-edit' 
                                class='btn btn btn-outline-primary btn-xs'
                                data-id = '".$product->id."'
                                >
                            <i class='fa fa-pencil'></i>
                        </button>
                        <button class='btn btn-outline-warning btn-xs'
                            data-toggle='modal' id='tombol_hapus' data-id = '".$product->id."' 
                            data-target='#modal-hapus'>
                            <i class='fa fa-trash'></i>
                        </button>";
                return $pilih;
            })
            ->addColumn('harga', function($product) {
                $price = 'Rp. '.number_format($product->price, 2);
                return $price;
            })
            ->addColumn('fotoproduct', function($product) {
                $pic = $product->product_pic != null ? '<img src="'.asset("uploads/products").'/'.$product->product_pic.'" width="100px;">' : 
                        '<img src="https://ui-avatars.com/api/?name='.$product->product_pic.'&color=727cf5&background=EBF4FF" alt="">' ;
            
                return $pic;
            })
            ->addIndexColumn()
            ->rawColumns(['aksi','fotoproduct'])
            ->make(true);

        }
        else {
            abort(404);
        }
    }

    public function index() {
        return view('content.list_produk');
    }

    public function create() {
        return view('content.add_produk');
    }

    public function store(Request $request) {

        $agent = new Agent();;

        $rules = [
            'namaproduk' => 'required',
            'harga' => 'required',
            'deskripsi' => 'required',
            'fotoproduk' => 'required',
        ];
 
        $messages = [
            'namaproduk.required'  => 'Username wajib diisi',
            'harga.required' => 'Password wajib diisi',
            'deskripsi.required'  => 'Email wajib diisi',
            'fotoproduk.required' => 'Foto Produk tidak boleh kosong'
        ];
 
        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()){
            return redirect('produk/add')->withErrors($validator)->withInput($request->all);
        }

        // jika file ada
        if ($request->file('fotoproduk') != null) {
            $image = $request->file('fotoproduk');
            $image_name = 'TrioKDL-'.time().'.'.$image->getClientOriginalExtension();
            $image->move(\base_path() ."/public/uploads/products", $image_name);
        }
        else {
            $image_name = null;
        }

        date_default_timezone_set("Asia/Bangkok");
        $date = date('Y-m-d H:i:s');

        $data = [
            'product_name' => $request->namaproduk,
            'product_desc' => $request->deskripsi,
            'price' => $request->harga,
            'product_pic' => $image_name,
            't_userupdate' => Auth::user()->name,
            't_ipaddress' => request()->ip(),
            'created_at' => $date
        ];

        $res = Product::insert($data);
        if($res == true) {
            return redirect('produk')->with('success', 'Penambahan data Produk berhasil');
        }
        else {
            return redirect('produk')->with('error', 'Penambahan data Produk gagal');
        }
    }
}
