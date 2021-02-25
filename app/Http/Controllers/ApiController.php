<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Rating;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Helpers\Yin;
use App\Helpers\Recommend;
use Validator;

class ApiController extends Controller
{

    protected $token = 'developer';


    public function index() {
        $product =  Product::all();

        // add dir picture 
        foreach($product as $k => $v) {
            $picture[$v->id] = url('/uploads/products').'/'.$v->product_pic;
        }
        foreach($product as $k => $p) {
            $product[$k]['picture'] = $picture[$p->id];
        }

        $arr = [
            'response' => true,
            'total' => count($product),
            'data' => $product
        ];
        return response()->json($arr, 200);
    }

    public function detail($id) {
        $product = Product::where('id', $id)->take(10)->get();

        foreach($product as $k => $v) {
            $picture[$v->id] = url('/uploads/products').'/'.$v->product_pic;
        }
        foreach($product as $k => $p) {
            $product[$k]['picture'] = $picture[$p->id];
        }

        $arr = [
            'response' => true,
            'data' => $product
        ];
        return response()->json($arr, 200);
    }

    public function limit(Request $request) {

        if($request->token != $this->token) {
            $arr = [
                'response' => false,
                'msg' => 'token tidak boleh kosong'
            ];
            return response()->json($arr, 204);
        } 
        else {

            $rules = [
                'limit' => 'required|integer',
            ];
     
            $messages = [
                'limit.required'  => 'limit wajib diisi',
                'limit.integer' => 'limit hanya boleh berupa integer'
            ];
     
            $validator = Validator::make($request->all(), $rules, $messages);
            if($validator->fails()){
               $arr = [
                   'response' => false,
                   'msg' => $validator->errors()->first()
               ];
               return response()->json($arr, 200);
            }

            // if true
            $product = Product::take($request->limit)->get();
            foreach($product as $k => $v) {
                $picture[$v->id] = url('/uploads/products').'/'.$v->product_pic;
            }
            foreach($product as $k => $p) {
                $product[$k]['picture'] = $picture[$p->id];
            }
            $arr = [
                'response' => true,
                'total' => count($product),
                'data' => $product
            ];

            return response()->json($arr, 200);
        }
        
    }

    public function data_skripsi(){
        $data = DB::table('data')->get();
        return response()->json($data, 200);
    }
}
