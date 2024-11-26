@extends('layouts.app')

@section('content')
    <div class="mx-auto rounded-lg p-5 m-5">

        @guest
            <div class="flex items-center justify-between">
                <h1 class="mb-4 text-2xl font-extrabold leading-none tracking-tight text-gray-900 md:text-3xl lg:text-4xl">
                    Veuillez vous
                    <mark class="px-2 text-white bg-blue-600 rounded">connecter</mark>
                    pour accéder au contenu.
                </h1>
            </div>
        @endguest

        @auth
        <div class="flex items-center justify-between">
            <h1 class="mb-4 text-2xl font-extrabold leading-none tracking-tight text-gray-900 md:text-3xl lg:text-4xl">
                Bonjour
                <mark class="px-2 text-white bg-blue-600 rounded">{{Auth::user()->name}}</mark>

            </h1>

            <h4>
                Le {{now()->toDateString()}}
            </h4>
        </div>
        @endauth

        <div class="p-10 m-10 mt-9 flex justify-center items-center shadow-sm rounded-md">
            <div class="p-5 m-5 text-2xl font-semibold">
                <p>
                    Email :
                </p>
            </div>

            <div class="p-5 m-5 text-2xl ">
                <p>
                    {{Auth::user()->email}}
                </p>
            </div>
        </div>


    </div>

@endsection





