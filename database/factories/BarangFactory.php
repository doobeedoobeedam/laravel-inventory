<?php

namespace Database\Factories;
use App\Models\Barang;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Barang>
 */
class BarangFactory extends Factory {
    public function definition(): array {
        return [
            'item_code' => $this->faker->unique()->word,
            'item_name' => $this->faker->word,
            'specification' => $this->faker->word,
            'item_location' => $this->faker->city,
            'category' => $this->faker->word,
            'condition' => $this->faker->word,
            'item_type' => $this->faker->word,
            'funding_source' => $this->faker->word,
        ];
    }
}
