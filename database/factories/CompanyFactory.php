<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;


class CompanyFactory extends Factory
{
   public function definition()
   {
      return[
         'name'    => $this->faker->company(),
         'address' => $this->faker->address(),
         'website' => $this->faker->domainName(),
         'email'   => $this->faker->email(),
            
         //'user_id'  => User::factory()
         //'user_id'    => User::pluck('id')->random()
      ];
   }
}