<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login | Animebliz</title>

    @vite('resources/css/tailwind.css')
    {{-- <link rel="stylesheet" href="{{ asset('build/assets/tailwind-DHt2DbN5.css') }}"> --}}

</head>

<body class="bg-[#111827]">


    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8 ">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <img class="mx-auto size-16" src="{{ asset('img/192x192.png') }}" alt="Your Company" />
            <h2 class="mt-1 text-center text-2xl font-bold leading-9 tracking-tight text-white">Admin Dashboard</h2>
        </div>

        <div class="mt-4 sm:mx-auto sm:w-full sm:max-w-sm">

            <div class="error hidden w-full text-center text-white bg-rose-700 rounded-lg px-4 py-2 items-center">
                <h1 class="flex-1"></h1>
               
                <div class="hover:bg-slate-700 rounded-full cursor-pointer p-0.5 transition-all" onclick="this.parentNode.classList.add('hidden')">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                  </svg>
                </div>       
            </div>

            <form class="space-y-6" action="/admin/login" method="POST">
                @csrf

                <div>
                    <label for="email" class="block text-sm leading-6 font-semibold text-white">Email address</label>
                    <div class="mt-2">
                        <input id="email" name="email" type="email" autocomplete="email" required
                            class="block w-full rounded-md border-0 py-1.5 bg-gray-800 text-white shadow-sm ring-1 ring-inset ring-gray-600 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-500 sm:text-sm sm:leading-6" />
                    </div>
                </div>

                <div>
                    <div class="flex items-center justify-between">
                        <label for="password" class="block text-sm leading-6 font-semibold text-white">Password</label>
                        <div class="text-sm">
                            <a href="javascript:void" class="font-semibold text-indigo-400 hover:text-indigo-300">Forgot
                                password?</a>
                        </div>
                    </div>
                    <div class="mt-2">
                        <input id="password" name="password" type="password" autocomplete="current-password" required
                            class="block w-full rounded-md border-0 py-1.5 bg-gray-800 text-white shadow-sm ring-1 ring-inset ring-gray-600 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                    </div>
                </div>

                <div>
                    <button type="submit"
                        class="flex w-full justify-center rounded-md bg-indigo-500 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm transition-colors hover:bg-indigo-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Login</button>
                </div>
            </form>

        </div>
    </div>


    @vite('/resources/js/adminLogin.js')
    {{-- <script src="{{ asset('build/assets/adminLogin-z4Bi24eY.js') }}"></script> --}}
</body>

</html>
