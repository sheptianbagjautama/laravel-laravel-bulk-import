install package dari Laravel excel 3.1 dengan command:
composer require maatwebsite/excel

php artisan make:model Product -m

file yang berhubungan dengan fitur ini :
1. model Product.php

2. controller Product :
- ProductImportHeading.php
- ProductImportQueue.php
- ProductImport.php

3. view importWithHeading.php, welcome.blade.php

  Membuat class Product Import yang bertugas untuk mengolah data yang ada dalam file excel : 
  menggunakan command berikut :
  php artisan make:import ProductsImport --model=Product
  
  
  
