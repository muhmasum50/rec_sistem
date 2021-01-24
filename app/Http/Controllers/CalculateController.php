<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Rating;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Helpers\Yin;
use App\Helpers\Recommend;


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

        $rec = Recommend::similarityDistance($rating, Auth::user()->id, 12);
        $rec = Recommend::matchItems($rating, Auth::user()->id);
        $rec = Recommend::transformPreferences($rating);

        Yin::debug($rec);
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

    // public function hitung_similarity(Request $request) {

    // }

}
