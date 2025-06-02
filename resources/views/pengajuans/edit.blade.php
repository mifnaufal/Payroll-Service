@extends('layouts.app')
@section('content')
       <x-slot name="header">
           <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
               {{ __('Profile') }}
           </h2>
       </x-slot>

       <div class="py-6">
           <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
               <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                   <div class="p-6">
                       <form method="POST" action="{{ route('profile.update') }}">
                           @csrf
                           @method('patch')

                           <div>
                               <x-input-label for="name" :value="__('Name')" />
                               <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name', $user->name)" required autofocus autocomplete="name" />
                               <x-input-error :messages="$errors->get('name')" class="mt-2" />
                           </div>

                           <div class="mt-4">
                               <x-input-label for="email" :value="__('Email')" />
                               <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $user->email)" required autocomplete="username" />
                               <x-input-error :messages="$errors->get('email')" class="mt-2" />
                           </div>

                           <div class="mt-4">
                               <x-input-label for="role" :value="__('Role')" />
                               <select id="role" name="role" class="block mt-1 w-full border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-700 dark:text-gray-200">
                                   <option value="user" {{ $user->role === 'user' ? 'selected' : '' }}>User</option>
                                   <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                               </select>
                               <x-input-error :messages="$errors->get('role')" class="mt-2" />
                           </div>

                           <div class="mt-4">
                               <x-input-label for="password" :value="__('Password')" />
                               <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" autocomplete="new-password" />
                               <x-input-error :messages="$errors->get('password')" class="mt-2" />
                           </div>

                           <div class="mt-4">
                               <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                               <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" autocomplete="new-password" />
                               <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                           </div>

                           <div class="flex items-center justify-end mt-4">
                               <x-primary-button>
                                   {{ __('Save') }}
                               </x-primary-button>
                           </div>
                       </form>
                   </div>
               </div>
           </div>
       </div>
   @endsection