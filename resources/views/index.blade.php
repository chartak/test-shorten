<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="{{ asset('js/short.js') }}" defer></script>

    <!-- Styles -->
<style>
    .show-message {
        color: #db1111;
        font-weight: 600;
        font-size: large;
    }
    .loader{
        position: absolute;
        top: 25%;
        left: 20%;
        transform: translate(-50%, -50%);
        z-index: 9999;
        visibility: hidden;
        overflow:hidden;
        background:url(../image/loader.svg) no-repeat center;
        background-size: contain;
        width: 100px;
        height: 100px;
    }
</style>
</head>
<body class="antialiased">
    <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">

        <div class="max-w-7xl mx-auto p-6 lg:p-8">
            <div class="flex justify-center">

                <div class="mt-16">
                    <div class="grid grid-cols-1 md:grid-cols-1 gap-6 lg:gap-8">

                        <div class="scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                            <div>
                                <div class="loader"></div>
                                <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">Link Shortening</h2>
                                <form class="form" method="post">
                                    {{--<input type="hidden" name="_token" value="{{ csrf_token() }}">--}}
                                    <input type="tetx" value="" name="full_link" class="form-control" placeholder="Enter URL" style="width: 450px;">
                                    <button type="submit">Short</button>
                                </form>
                                <span class="show-message"></span>
                            </div>

                        </div>
                        <div id="shorterList">
                            @if(isset($data))
                                <ul>
                                    @foreach($data as $key => $values)
                                        <li><a href="{{ url('shortenLink/'.$values["short_code"]) }}" target="_blank">{{$values['short_url']}}/{{$values['short_code']}}</a></li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>