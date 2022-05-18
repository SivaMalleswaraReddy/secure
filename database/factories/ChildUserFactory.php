<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ChildUserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'first_name' => $this->faker->name,
            'last_name' => $this->faker->name,
            'dob'=>$this->faker->dateTime,
            'email'=>$this->faker->unique()->email,
            'phone_number'=>$this->faker->phoneNumber,
            'gender' => $this->faker->randomElement(['male', 'female']),
            'monthly_limit'=>$this->faker->randomElements([3000, 4000, 5000]),
            'is_approved'=>$this->faker->randomElements(['approved','not_approved']),
        ];
    }
}
