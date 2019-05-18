<?php

use Illuminate\Database\Seeder;

class CategoryTableDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['Allium', 'Alstroemeria', 'Amaryllis', 'Anemone', 'Anthurium', 'Antirrhinum / Matthiola',
            'Asclepias', 'Bouquets', 'Calendula', 'Calla Lilies / Zantedeschia', 'Carnations / Spray Carnations',
            'Chrysanthemums', 'Orchids: Cymbidium / Phalaenopsis / Vanda', 'Decorative fruits', 'Dianthus Barbatus',
            'Eryngium Thistle', 'Floral Foam', 'Freesia', 'Gerbera / Germini', 'Gypsy Grass / Solidaster',
            'Heliconia / Strelitzia', 'Hydrangea', 'Hypericum', 'Leaf, Other', 'Limonium',
            'Leucospermum / Protea / Brunia', 'Ornithogalum', 'Other', 'Peony', 'Ranunculus', 'Rose', 'Rose Ecuador',
            'Rose Spray', 'Shrub / Wood', 'Syringa / Viburnum', 'Veronica', 'Waxflower', 'Wreaths'];

        foreach ($categories as $category) {
            \App\Category::firstOrCreate([
                'name' => $category
            ]);
        }
    }
}
