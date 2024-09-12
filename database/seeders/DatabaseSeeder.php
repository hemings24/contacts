<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Company;
use App\Models\Contact;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
   public function run()
   {
      //\App\Models\User::factory(10)->create();
      //$this->call(UsersTableSeeder::class);
      //$this->call(CompaniesTableSeeder::class);
      /*$this->call([
         CompaniesTableSeeder::class,
         ContactsTableSeeder::class
      ]);*/

      //Contact::factory()->count(50)->create();
      //Company::factory()->count(10)->create();
      //Company::factory()->hasContacts(5)->count(10)->create();
      //Company::factory()->hasContacts(5)->count(50)->create();
      //User::factory()->count(5)->create();

      User::factory()->count(5)->create()->each(function($user){
         Company::factory()->has(Contact::factory()->count(5)->state(function($attributes,Company $company){
            return ['user_id' => $company->user_id];
         }))
         ->count(10)->create([
            'user_id' => $user->id
         ]);
      });
   }
}