<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="{{ asset('img/logo.png') }}">
    <title>{{ $title }} | SISURAT BPS</title>

    <link rel="stylesheet" href="{{ asset('css/app.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app-login.css') }}">

    {{-- <link rel="stylesheet" href="{{ asset('css/login.css') }}"> --}}
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"
        integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
</head>

<body>
    <div class="relative min-h-screen flex ">
        <div
            class="flex flex-col sm:flex-row items-center md:items-start sm:justify-center md:justify-start flex-auto min-w-0 bg-white">
            {{-- <div class="sm:w-1/2 xl:w-2/5 h-full hidden md:flex flex-auto items-center justify-start p-10 overflow-hidden bg-purple-900 text-white bg-no-repeat bg-cover relative"
                style="background-image: url(https://source.unsplash.com/1000x1000?scenery);"> --}}
            <div class="sm:w-1/2 xl:w-2/5 h-full hidden md:flex flex-auto items-center justify-start p-10 overflow-hidden bg-purple-900 text-white bg-no-repeat bg-cover relative bg-center"
                style="background-image: url({{ asset('img/bg-login.jpg') }});">

                <div class="absolute bg-gradient-to-b from-blue-700 to-yellow-700 opacity-40 inset-0 z-0"></div>
                <div class="absolute triangle  min-h-screen right-0 w-16" style=""></div>
                <a href="https://github.com/putrijuliasafira" target="_blank" title="Putri Julia Safira"
                    class="flex absolute top-5 text-center text-gray-100 focus:outline-none">
                    <p class="text-xl ml-3">SISURAT | BPS</p>
                </a>
            </div>

            <div
                class="flex items-center justify-center w-full sm:w-2/4 h-full xl:w-2/5 px-[8px]  md:px-[10px] lg:px-[14px] sm:rounded-lg md:rounded-none bg-white mt-6 md:mt-0">
                <div class="max-w-md w-full justify-center">
                    <a href="{{ url('/') }}">
                        <img src="{{ asset('img/logo.png') }}" alt="PNL" class="mx-auto w-36 h-36">
                    </a>
                    <div class="text-center">
                        <h2 class="mt-6 text-3xl font-bold text-gray-900">
                            Welcome Back!
                        </h2>
                        <p class="mt-2 text-sm text-gray-500">Please sign in to your account</p>
                    </div>

                    <form action="{{ url('') }}/login" method="POST" autocomplete="off" autocapitalize="off">
                        @csrf
                        <?php $err = 'border-b border-rose-600 focus:border-red-500'; ?>
                        <input type="hidden" name="remember" value="true">
                        <div class="relative">
                            <label class="ml-3 text-sm font-bold text-gray-700 tracking-wide"
                                for="username">Username</label>
                            <input
                                class=" w-full text-base px-4 py-2 border-b border-gray-300 focus:outline-none rounded-2xl focus:border-indigo-500 @error('username') {{ $err }} @enderror"
                                type="text" placeholder="Inputkan Username" id="username" name="username" required
                                value="{{ old('username') }}"
                                onfocus="var val=this.value; this.value=''; this.value= val;" autofocus>
                            @error('username')
                                <span class="text-rose-600 dark:text-rose-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mt-4 content-center">
                            <label class="ml-3 text-sm font-bold text-gray-700 tracking-wide" for="password">
                                Password
                            </label>
                            <input
                                class="w-full content-center text-base px-4 py-2 border-b rounded-2xl border-gray-300 focus:outline-none focus:border-indigo-500"
                                type="password" placeholder="Inputkan Password" id="password" name="password" required>
                        </div>
                        <div class="flex items-center justify-between mt-3">
                            <div class="flex items-center">
                                <input id="showPassword" name="showPassword" type="checkbox"
                                    class="h-4 w-4 bg-blue-500 focus:ring-blue-400 border-gray-300 rounded">
                                <label for="showPassword" class="ml-2 block text-sm text-gray-900">
                                    Show Password
                                </label>
                            </div>
                        </div>
                        <div class="mt-4">
                            <button type="submit"
                                class="w-full flex justify-center bg-gradient-to-r from-blue-500 to-indigo-600 hover:transition hover:to-indigo-700 hover:from-blur-700 hover:bg-gradient-to-l  text-gray-100 p-4  rounded-full tracking-wide font-semibold shadow-md cursor-pointer transition ease-in duration-500">
                                Sign in
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#showPassword').click(function() {
                $(this).is(':checked') ? $('#password').attr('type', 'text') : $('#password').attr('type',
                    'password');
            });
        });
    </script>
</body>

</html>
