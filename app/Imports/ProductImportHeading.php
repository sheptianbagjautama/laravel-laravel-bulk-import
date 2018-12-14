<?php

namespace App\Imports;

use App\Product;
use Maatwebsite\Excel\Concerns\ToModel;

//Tambahkan ini jika kita ingin upload excel yang terdapat header nya
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductImportHeading implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        //Perbedaan dengan yang tanpa header hanya, key diubah bukan index array lagi
        return new Product([
            'title'         => $row['title'],
            'slug'          => str_slug($row['title']),
            'description'   => $row['description'],
            'price'         => $row['price'],
            'stock'         => $row['stock']
        ]);
    }
}
