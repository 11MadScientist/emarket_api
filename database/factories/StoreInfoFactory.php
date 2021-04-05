<?php

namespace Database\Factories;

use App\Models\StoreInfo;
use Illuminate\Database\Eloquent\Factories\Factory;

class StoreInfoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = StoreInfo::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'acc_id'        =>$this->faker->randomDigit,
            'store_name'     => $this->faker->firstName,
            'store_location' => $this->faker->address,
        ];
    }
}
