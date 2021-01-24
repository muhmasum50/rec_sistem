<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Rating;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Helpers\Yin;
use App\Helpers\Recommend;
use App\user;


class CalculateController extends Controller
{
    public function index() {


        $products = DB::table('products')->select('*')->get()->toArray();
        $ratings =  DB::table('ratings')->select('*')->get()->toArray();

        $product = [];
        foreach($products as $k => $v) {
            $product[$v->id] = $v->product_name;
        }

        $rating = [];
        foreach((array)$ratings as $k => $rate) {
            $rating[$rate->id_user][$product[$rate->id_product]] = $rate->rating;
            
            // $rating[$rate->id_user][$rate->id_product] = $rate->rating;
        }

        $rec = number_format(100 * Recommend::similarityDistance($rating,12, 10),2);
        // $rec = Recommend::matchItems($rating, Auth::user()->id);
        // $rec = Recommend::transformPreferences($rating);
        $rec =  Recommend::getRecommendations($rating, 11);

        Yin::debug($rec);
    }

    public function MappingRatingAndProduct(){
        $products = DB::table('products')->select('*')->get()->toArray();
        $ratings =  DB::table('ratings')->select('*')->get()->toArray();

        $product = [];
        foreach($products as $k => $v) {
            $product[$v->id] = $v->product_name;
        }

        $rating = [];
        foreach((array)$ratings as $k => $rate) {
            $rating[$rate->id_user][$product[$rate->id_product]] = $rate->rating;
            
            // $rating[$rate->id_user][$rate->id_product] = $rate->rating;
        }

        return $rating;
    }

    public function list_rekomendasi() {
        $products = DB::table('products')->select('*')->get()->toArray();
        $ratings =  DB::table('ratings')->select('*')->get()->toArray();

        $product = [];
        foreach($products as $k => $v) {
            $product[$v->id] = $v->product_name;
        }

        $rating = [];
        foreach((array)$ratings as $k => $rate) {
            $rating[$rate->id_user][$product[$rate->id_product]] = $rate->rating;
        }

        // get produk
        $produk = [];
        foreach($products as $k => $v) {
            $produk[$v->product_name] = $v;
        }
        
        // add logic jika user belum merating
        if(!isset($rating[Auth::user()->id])){
            $recommend = null;
        } else {
            $rate = $rating;
            $recommend = Recommend::getRecommendations($rate, Auth::user()->id);
        }
        return view('content.list_rekomendasi', compact('recommend', 'produk'));

    }

    public function list_perhitungan() {

        $user = DB::table('ratings as r')->join('users as u', 'u.id', '=', 'r.id_user')
            ->select('u.id','u.name')->distinct()
            ->get();
        return view('content.list_perhitungan', compact('user'));


    }

    public function hitungsimilarity(Request $request) {

        $products = DB::table('products')->select('*')->get()->toArray();
        $ratings =  DB::table('ratings')->select('*')->get()->toArray();

        $product = [];
        foreach($products as $k => $v) {
            $product[$v->id] = $v->product_name;
        }

        $rating = [];
        foreach((array)$ratings as $k => $rate) {
            $rating[$rate->id_user][$product[$rate->id_product]] = $rate->rating;
        }

        $pengguna = DB::table('users')->select('*')->get()->toArray();
        foreach($pengguna as $k => $v) {
            $user[$v->id] = $v;
        }

        $user1 = $request->user1;
        $user2 = $request->user2;

        $hitungsimilarity = number_format(100 * Recommend::similarityDistance($rating, $user1, $user2),2).' %';

        if(isset($hitungsimilarity)) {
            $arr = [
                'response' => true,
                'data' => $hitungsimilarity,
                'user1' => $user[$user1],
                'user2' => $user[$user2]
            ];
            return response()->json(($arr), 200);
        }
        else {
            $arr = [
                'response' => false,
                'data' => null
            ];
            return response()->json(($arr), 200);
        }
    }
    
    public function skorrekomendasi(Request $request) {

        $pengguna = $request->pengguna;
        $rating = $this->MappingRatingAndProduct();
        $rekomendasi = Recommend::getRecommendations($rating, $pengguna);

        $arr = [
            'response' => true,
            'data' => $rekomendasi
        ];
        return response()->json(($arr), 200);
    }
}