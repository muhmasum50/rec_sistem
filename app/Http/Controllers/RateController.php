<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Rating;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Helpers\Yin;

class RateController extends Controller
{
    public function index() {

        // $produk = Product::select('*')->get();
        $products = DB::table('products')->select('*')->get()->toArray();
        $ratings =  DB::table('ratings')->select('*')->get()->toArray();

        $produk = [];
        foreach($products as $v) {
            $produk[] = (array)$v;
        }

        $rating = [];
        foreach($ratings as $v) {
            $rating[] = (array)$v;
        }

        // temp rating
        $a_rating = [];
        foreach($rating as $r) {
            $a_rating[$r['id_product']][$r['id_user']] = $r;
        }

        foreach($produk as $k => $p) {

            $produk[$k]['rating'] = isset($a_rating[$p['id']]) ? $a_rating[$p['id']] : null;
        }

        // Yin::debug($rating);

        return view('user.list_rateproduk', compact('produk'));
    }

    public function gorating(Request $request) {

        if($request->ajax()) {

            date_default_timezone_set("Asia/Bangkok");
            $date = date('Y-m-d H:i:s');



            $isUserRating = Rating::where([
                        ['id_user', '=', $request->iduser],
                        ['id_product', '=', $request->idproduct ]
                    ])->first();
                    
            // cek apakah sudah rate atau belum
            // jika sudah rate maka update rate
            if($isUserRating) {

                $param = [
                    'id_product' => $request->idproduct,
                    'rating' => $request->stars,
                    'id_user' => $request->iduser,
                    't_userupdate' => Auth::user()->name,
                    'updated_at' => $date
                ];

                $response = Rating::where([
                    ['id_user', '=', $request->iduser],
                    ['id_product', '=', $request->idproduct ]
                ])->update($param);

                if($response == true) {
                    $arr = [
                        'response' => true,
                        'message' => 'data berhasil diupdate'
                    ];
                    return response()->json(($arr), 200);
    
                } else {
                    $arr = [
                        'response' => false,
                        'message' => 'data gagal berhasil diupdate'
                    ];
                    return response()->json(($arr), 200);
                }

            } else {
                $param = [
                    'id_product' => $request->idproduct,
                    'rating' => $request->stars,
                    'id_user' => $request->iduser,
                    'created_at' => $date,
                    't_userupdate' => Auth::user()->name,
                ];
                $response = Rating::insert($param);
                if($response == true) {
                    $arr = [
                        'response' => true,
                        'message' => 'data berhasil diinsert'
                    ];
                    return response()->json(($arr), 200);
    
                } else {
                    $arr = [
                        'response' => false,
                        'message' => 'data gagal berhasil diinsert'
                    ];
                    return response()->json(($arr), 200);
                }
            }

        }
    }
}
