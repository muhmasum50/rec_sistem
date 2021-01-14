<?php

namespace App\Helpers;

use Illuminate\Support\Facades\DB;
use App\User;
use App\Product;

class Yin {

    public static function Validation() {
        $messages = [
            // 'required' => ':attribute wajib diisi',
            // 'numeric' => ':attribute berupa angka',
            // 'unique' => ':attribute sudah digunakan, coba lagi',
            // 'min' => ':attribute harus diisi minimal :min karakter',
            // 'max' => ':attribute harus diisi maksimal :max karakter',
            // 'image' => ':attribute hanya boleh berupa jpeg/png/jpg'

            'accepted' => ':attribute harus diterima.',
            'active_url' => ':attribute bukan URL yang valid.',
            'after' => ':attribute harus tanggal setelah :date.',
            'after_or_equal' => ':attribute harus berupa tanggal setelah atau sama dengan tanggal :date.',
            'alpha' => ':attribute hanya boleh berisi huruf.',
            'alpha_dash' => ':attribute hanya boleh berisi huruf, angka, dan strip.',
            'alpha_num' => ':attribute hanya boleh berisi huruf dan angka.',
            'array' => ':attribute harus berupa sebuah array.',
            'before' => ':attribute harus tanggal sebelum :date.',
            'before_or_equal' => ':attribute harus berupa tanggal sebelum atau sama dengan tanggal :date.',
            'between' => [
                'numeric' => ':attribute harus antara :min dan :max.',
                'file' => ':attribute harus antara :min dan :max kilobytes.',
                'string' => ':attribute harus antara :min dan :max karakter.',
                'array' => ':attribute harus antara :min dan :max item.',
            ],
            'boolean' => ':attribute harus berupa true atau false',
            'confirmed' => 'Konfirmasi :attribute tidak cocok.',
            'date' => ':attribute bukan tanggal yang valid.',
            'date_format' => ':attribute tidak cocok dengan format :format.',
            'different' => ':attribute dan :other harus berbeda.',
            'digits' => ':attribute harus berupa angka :digits.',
            'digits_between' => ':attribute harus antara angka :min dan :max.',
            'dimensions' => ':attribute tidak memiliki dimensi gambar yang valid.',
            'distinct' => ':attribute memiliki nilai yang duplikat.',
            'email' => ':attribute harus berupa alamat surel yang valid.',
            'exists' => ':attribute yang dipilih tidak valid.',
            'file' => ':attribute harus berupa sebuah berkas.',
            'filled' => ':attribute harus memiliki nilai.',
            'image' => ':attribute harus berupa gambar.',
            'in' => ':attribute yang dipilih tidak valid.',
            'in_array' => ':attribute tidak terdapat dalam :other.',
            'integer' => ':attribute harus merupakan bilangan bulat.',
            'ip' => ':attribute harus berupa alamat IP yang valid.',
            'ipv4' => ':attribute harus berupa alamat IPv4 yang valid.',
            'ipv6' => ':attribute harus berupa alamat IPv6 yang valid.',
            'json' => ':attribute harus berupa JSON string yang valid.',
            'max' => [
                'numeric' => ':attribute seharusnya tidak lebih dari :max.',
                'file' => ':attribute seharusnya tidak lebih dari :max kilobytes.',
                'string' => ':attribute seharusnya tidak lebih dari :max karakter.',
                'array' => ':attribute seharusnya tidak lebih dari :max item.',
            ],
            'mimes' => ':attribute harus dokumen berjenis : :values.',
            'mimetypes' => ':attribute harus dokumen berjenis : :values.',
            'min' => [
                'numeric' => ':attribute harus minimal :min.',
                'file' => ':attribute harus minimal :min kilobytes.',
                'string' => ':attribute harus minimal :min karakter.',
                'array' => ':attribute harus minimal :min item.',
            ],
            'not_in' => ':attribute yang dipilih tidak valid.',
            'numeric' => ':attribute harus berupa angka.',
            'present' => ':attribute wajib ada.',
            'regex' => 'Format :attribute tidak valid.',
            'required' => ':attribute wajib diisi.',
            'required_if' => ':attribute wajib diisi bila :other adalah :value.',
            'required_unless' => ':attribute wajib diisi kecuali :other memiliki nilai :values.',
            'required_with' => ':attribute wajib diisi bila terdapat :values.',
            'required_with_all' => ':attribute wajib diisi bila terdapat :values.',
            'required_without' => ':attribute wajib diisi bila tidak terdapat :values.',
            'required_without_all' => ':attribute wajib diisi bila tidak terdapat ada :values.',
            'same' => ':attribute dan :other harus sama.',
            'size' => [
                'numeric' => ':attribute harus berukuran :size.',
                'file' => ':attribute harus berukuran :size kilobyte.',
                'string' => ':attribute harus berukuran :size karakter.',
                'array' => ':attribute harus mengandung :size item.',
            ],
            'string' => ':attribute harus berupa string.',
            'timezone' => ':attribute harus berupa zona waktu yang valid.',
            'unique' => ':attribute sudah ada sebelumnya.',
            'uploaded' => ':attribute gagal diunggah.',
            'url' => 'Format :attribute tidak valid.',

        ];

        return $messages;
    }

    public static function JumlahUsers() {
        $user = User::where('role', 'user')->get();

        return count($user->toArray());
    }

    public static function JumlahProducts() {
        $product = Product::all();

        return count($product->toArray());
    }
    public static function debug($var, $die=FALSE)
    {
        echo '<pre>';
        print_r($var);
        echo '</pre>';
        if ($die) die;
    }
}