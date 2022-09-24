<?php

namespace App\Console\Commands;
use App\Models\ProductCategory;
use Illuminate\Console\Command;

class CreateProductCategory extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:productCategory';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new product category through artisan command';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $product_category = $this->ask('What is the product category name ?');
        $description = $this->ask('What is the description of the product category ?');

        ProductCategory::create([
            'name'=> $product_category,
            'description' => $description,
        ]);
        $this->info('product category created successfully !');

    }
}
