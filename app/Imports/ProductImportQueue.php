<?php

namespace App\Imports;

use App\Product;
use Maatwebsite\Excel\Concerns\ToModel;

use Illuminate\Contracts\Queue\ShouldQueue; //IMPORT SHOUDLQUEUE
use Maatwebsite\Excel\Concerns\WithChunkReading; //IMPORT CHUNK READING

//Tambahkan ini jika kita ingin upload excel yang terdapat header nya
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductImportQueue implements ToModel, WithHeadingRow
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

    //LIMIT CHUNKSIZE
    public function chunkSize(): int
    {
        return 1000; //ANGKA TERSEBUT PERTANDA JUMLAH BARIS YANG AKAN DIEKSEKUSI
    }


}
