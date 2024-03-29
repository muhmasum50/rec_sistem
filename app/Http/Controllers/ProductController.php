<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;
use App\Product;
use Validator;
use App\Helpers\Yin;
use App\Helpers\Tanggal;
use Jenssegers\Agent\Agent;
use Exception;
use DataTables;
use Session;

class ProductController extends Controller
{
    public function load_product(Request $request) {
        if($request->ajax()) {
            $product = Product::select('product_name','id','price','created_at','product_pic', 't_userupdate')
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
            ->addColumn('tanggal', function($product){
                $tgl = Tanggal::tanggal_indo($product->created_at);
                return $tgl;
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

        $agent = new Agent();

        $rules = [
            'namaproduk' => 'required',
            'harga' => 'required',
            'deskripsi' => 'required',
            'fotoproduk' => 'required',
        ];
 
        $messages = [
            'namaproduk.required'  => 'Username wajib diisi',
            'harga.required' => 'Password wajib diisi',
            'deskripsi.required'  => 'Deskripsi wajib diisi',
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

    public function destroy(Request $request) {
        $id = $request->id;
        $data = Product::where('id', $id)->first();

        try {
            // jika ada file gambar yang terkait
            if(File::exists(public_path('uploads/products/'.$data->product_pic))){

                File::delete(public_path('uploads/products/'.$data->product_pic));
                $res = Product::where('id', $id)->delete();
                if($res == true){
                    return redirect('produk')->with('success', 'Penghapusan data Produk berhasil');
                }
                else {
                    return redirect('produk')->with('error', 'Penghapusan data Produk Gagal');
                }
            
            }
            // jika tidak ada file gambar
            else {
                $res = Product::where('id', $id)->delete();
    
                if($res == true){
                    return redirect('produk')->with('success', 'Penghapusan data Produk berhasil');
                }
                else {
                    return redirect('produk')->with('error', 'Penghapusan data Produk Gagal');
                }
            }

        } 
        catch (Exception $e){
            if($e->getCode() == "23000"){
                return redirect('produk')->with('error', 'Data Produk gagal dihapus, karena masih berelasi!');
            }
        }
    }

    public function edit(Request $request) {
        
        if($request->ajax()) {
            $id = $request->idproduct;

            $produk = Product::where('id', $id)->first();

            $param = [
                'respose' => true,
                'produk' => $produk,
            ];

            return response()->json(($param), 200);
        }
    }

    public function update(Request $request) {

        $id = $request->id;
        $data = Product::where('id', $id)->first();

        $rules = [
            'namaproduk' => 'required',
            'harga' => 'required',
            'deskripsi' => 'required',
        ];
 
        $messages = [
            'namaproduk.required'  => 'Username wajib diisi',
            'harga.required' => 'Password wajib diisi',
            'deskripsi.required'  => 'Deskripsi wajib diisi',
        ];
 
        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()){
            Session::flash('failedvalidation','Oops, Kamu gagal update data');
            return redirect('produk');
        }

        // jika file ada
        if ($request->file('fotoproduk') != null) {
            // jika ada file gambar yang terkait
            if(File::exists(public_path('uploads/products/'.$data->product_pic))){
                File::delete(public_path('uploads/products/'.$data->product_pic));
            }
            
            $image = $request->file('fotoproduk');
            $image_name = 'TrioKDL-'.time().'.'.$image->getClientOriginalExtension();
            $image->move(\base_path() ."/public/uploads/products", $image_name);

            date_default_timezone_set("Asia/Bangkok");
            $date = date('Y-m-d H:i:s');

            $data = [
                'product_name' => $request->namaproduk,
                'product_desc' => $request->deskripsi,
                'price' => $request->harga,
                'product_pic' => $image_name,
                't_userupdate' => Auth::user()->name,
                't_ipaddress' => request()->ip(),
                'updated_at' => $date
            ];
        }
        else {
            date_default_timezone_set("Asia/Bangkok");
            $date = date('Y-m-d H:i:s');

            $data = [
                'product_name' => $request->namaproduk,
                'product_desc' => $request->deskripsi,
                'price' => $request->harga,
                't_userupdate' => Auth::user()->name,
                't_ipaddress' => request()->ip(),
                'updated_at' => $date
            ];
        }

        $res = Product::where('id', $id)->update($data);
        if($res == true) {
            return redirect('produk')->with('success', 'Perubahan data Produk berhasil');
        }
        else {
            return redirect('produk')->with('error', 'Perubahan data Produk gagal');
        }
    }
}
