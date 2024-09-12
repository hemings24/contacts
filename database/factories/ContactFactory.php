<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Company;
use App\Contact;
use Illuminate\Database\Eloquent\Factories\Factory;


class ContactFactory extends Factory
{
   /**
    * Define the model's default state.
    *
    * @return array
   */
   public function definition()
   {
      return[
         'first_name' => $this->faker->firstName(),
         'last_name'  => $this->faker->lastName(),
         'phone'      => $this->faker->phoneNumber(),
         'email'      => $this->faker->email(),
         'address'    => $this->faker->address(),

         //'company_id' => Company::pluck('id')->random()   
         //'user_id'    => User::factory()
         //'user_id'    => Company::find(Company::pluck('id')->random())->user_id
      ];
   }
}