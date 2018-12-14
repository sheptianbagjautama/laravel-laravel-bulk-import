<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

//tambahan
use Excel;
use App\Imports\ProductsImport;
use App\Imports\ProductImportQueue;

class ImportJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $file;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($file)
    {
        //MENERIMA PARAMETER YANG DIKIRIM
        $this->file = $file;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        //MENJALANKAN PROSES IMPORT
        Excel::import(new ProductImportQueue,'public/'.$this->file);

        //MENGHAPUS FILE EXCEL YANG TELAH DI-UPLOAD
        unlink(storage_path('app/public'.$this->file));
    }
}
