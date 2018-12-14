<?php

namespace App\Imports;

use App\Product;
use Maatwebsite\Excel\Concerns\ToModel;

class ProductsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        /**
         *
         * Penjelasan: Data yang berada didalam file excel akan di-reformat menjadi array, sehingga untuk tiap barisnya diwakilkan dengan index array yang dimulai dari 0. Pastikan kamu memulai memasukkan data dari cell A1 dan seterusnya pada saat menyusun data excelnya.
         */
        return new Product([
            'title'         => $row[0],
            'slug'          => str_slug($row[0]),
            'description'   => $row[1],
            'stock'         => $row[2],
            'price'         => $row[3]
        ]);
    }
}
