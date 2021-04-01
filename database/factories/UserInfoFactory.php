<?php

namespace Database\Factories;

use App\Models\UserInfo;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserInfoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UserInfo::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'firstname'   => $this->faker->firstName,
            'lastname'    => $this->faker->lastName,
            'password'    => $this->faker->password,
            'email'       => $this->faker->email,
            'address'     => $this->faker->address,
            'phonenumber' => $this->faker->e164PhoneNumber,
        ];
    }
}
