<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ParentUserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'email'=>$this->faker->unique()->email,
            'phone_number'=>$this->faker->phoneNumber,
            'password'=>$this->faker->unique()->password,
            'address'=>$this->faker->address,
            'pan_card' => $this->faker->regexify('/^([A-Z]){5}([0-9]){4}([A-Z]){1}?$/'),
            'gender' => $this->faker->randomElement(['male', 'female']),
            'is_approved'=>$this->faker->randomElements(['approved','not_approved']),
        ];
    }
}
