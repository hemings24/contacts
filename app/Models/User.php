<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Storage;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable implements MustVerifyEmail
{
   use HasApiTokens,HasFactory,Notifiable;

   protected $fillable = [
      'first_name',
      'last_name',
      'email',
      'password',
      'company',
      'bio',
      'profile_image'
   ];

   protected $hidden = [
      'password',
      'remember_token',
   ];

   protected $casts = [
      'email_verified_at' => 'datetime',
   ];


   public function contacts()
   {
      return $this->hasMany(Contact::class);
   }

   public function companies()
   {
      return $this->hasMany(Company::class);
   }

   public function fullName()
   {        
      return $this->first_name." ".$this->last_name;
   }
   
   public function profileUrl()
   {
      return $this->profile_image != null ? Storage::url($this->profile_image) : asset('assets/img/profile-default.png');
   }
}