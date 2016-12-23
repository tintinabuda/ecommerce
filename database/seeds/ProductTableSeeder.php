<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = new \App\Product([
        	'imagePath' => 'http://www.guitarpusher.com/wp-content/uploads/2015/09/Baton-Rouge-AR11S-GACE.jpg',
        	'title' => 'Baton Rouge AR11S/GACE Grand Auditorium Spruce',
        	'description' => 'Great sound!',
        	'price' => 7909.00
        ]);
        $product->save();

        $product = new \App\Product([
        	'imagePath' => 'http://www.guitarpusher.com/wp-content/uploads/2016/03/Chapman-Norseman-Red-2.jpg',
        	'title' => 'Chapman ML-1 Norseman (Strandhugg Rød)',
        	'description' => 'Great sound!',
        	'price' => 35000.00
        ]);
        $product->save();

        $product = new \App\Product([
        	'imagePath' => 'http://www.guitarpusher.com/wp-content/uploads/2016/03/Clifton-Soprano-S_0002.jpg',
        	'title' => 'Clifton Soprano Ukulele Spruce',
        	'description' => 'Great sound!',
        	'price' => 1900.00
        ]);
        $product->save();

        $product = new \App\Product([
        	'imagePath' => 'http://www.guitarpusher.com/wp-content/uploads/2015/04/Acoustic-PRO-1-VSB-4975.jpg',
        	'title' => 'Epiphone PRO-1 Acoustic Guitar (Vintage Sunburst)',
        	'description' => 'Great sound!',
        	'price' => 8500.00
        ]);
        $product->save();

        $product = new \App\Product([
        	'imagePath' => 'http://www.guitarpusher.com/wp-content/uploads/2016/05/Maestro-Raffles-MR-Fanned-Fret_0001.jpg',
        	'title' => 'Maestro Custom Series Raffles-MR CSBe A FF',
        	'description' => 'Great sound!',
        	'price' => 124000.00
        ]);
        $product->save();
    }
}
