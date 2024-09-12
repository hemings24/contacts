<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Http\FormRequest;


class ProfileUpdateRequest extends FormRequest
{
   public function authorize()
   {
      return true;
   }

   public function rules()
   {
      return[
         'first_name'    => ['required', 'string', 'max:255'],
         'last_name'     => ['required', 'string', 'max:255'],
         'company'       => ['nullable'],
         'bio'           => ['nullable'],   
         'profile_image' => ['nullable', 'mimes:jpeg,bmp,png']
      ];
   }

   public function handleRequest()    
   {
      $profileData = $this->validated();
      $profile     = $this->user();

      if($this->hasFile('profile_image'))    
      {
         $image = $this->profile_image;
         $fileName = "profile-image-{$profile->id}." . $image->getClientOriginalExtension();

         $fileName = $image->storeAs('public',$fileName);
         $profileData['profile_image'] = $fileName;
      }
      
      return $profileData;    
   }
}