<?php

use Illuminate\Database\Seeder;
use App\TermsOfDelivery;

class TermsOfDeliverySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TermsOfDelivery::truncate();

        $input = [
            [
                'term_of_delivery' => '1 week'
            ],
            [
                'term_of_delivery' => '2 weeks'
            ],
            [
                'term_of_delivery' => '3 weeks'
            ],
            [
                'term_of_delivery' => '4 weeks'
            ],
            [
                'term_of_delivery' => '2 months'
            ],
            [
                'term_of_delivery' => '3 months'
            ],
            [
                'term_of_delivery' => '4 months'
            ],
        ];

        $inserted_input = TermsOfDelivery::insert($input);
    }
}
