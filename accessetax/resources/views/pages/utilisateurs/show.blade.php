@extends('layouts.conntected')
@section('subcontent')
    <div class="p-16">
        <div class="p-8 bg-white shadow  ">
            <div class="grid grid-cols-1 md:grid-cols-3">
                <div class="grid grid-cols-3 text-center order-last md:order-first my-20 md:mt-0">


                </div>
                <div class="  flex justify-between  md:mt-0 md:justify-center">

                </div>
                <div class="relative">
                    <div
                        class="w-48 h-48 bg-indigo-100 mx-auto rounded-full shadow-2xl absolute inset-x-0 top-0 -mt-24 flex items-center justify-center text-indigo-500">
                        <img src="{{ $Utilisateur->profile }}" alt="" class="w-48 h-48 rounded-full" srcset="">
                    </div>
                </div>

            </div>
            <div class="mt-20 text-center border-b pb-12">
                <h4 class="text-2xl font-medium text-emerald-400 p-2 bg-indigo-50">
                    {{ $Utilisateur->firstName . ' ' . $Utilisateur->lastName }}
                    <span class="font-light text-gray-500"> </span>
                </h4>
                <p class="font-light text-gray-600 mt-3">{{ $Utilisateur->siren }}</p>
                <p class="mt-8 text-gray-500">{{ $Utilisateur->job }} - {{ $Utilisateur->siren }}</p>
                <p class="mt-2 text-gray-500">{{ $Utilisateur->tel }}</p>
            </div>
            <div class="mt-12 flex flex-col justify-center">
                <button class=" bg-slate-50  text-slate-500 py-2 px-4  font-bold mt-4">
                    {{ $Utilisateur->role }}</button>
            </div>
        </div>
    </div>
@endsection
