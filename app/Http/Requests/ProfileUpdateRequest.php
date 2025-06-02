<?php

   namespace App\Http\Requests;

   use App\Models\User;
   use Illuminate\Foundation\Http\FormRequest;
   use Illuminate\Validation\Rule;

   class ProfileUpdateRequest extends FormRequest
   {
       public function authorize()
       {
           return true;
       }

       public function rules()
       {
           return [
               'name' => ['string', 'max:255'],
               'email' => ['email', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
               'role' => ['required', 'in:user,admin'], // Validasi peran
               'password' => ['nullable', 'confirmed', 'min:8'],
           ];
       }
   }