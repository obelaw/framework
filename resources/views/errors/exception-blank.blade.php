<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Obelaw - Exception</title>
    <!-- CSS files -->
    <link rel="stylesheet" href="https://preview.tabler.io/dist/css/tabler.min.css?1695847769">

    @livewireStyles

    <style>
        @import url('https://rsms.me/inter/inter.css');

        :root {
            --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
        }

        body {
            font-feature-settings: "cv03", "cv04", "cv11";
        }
    </style>
</head>

<body class=" border-top-wide border-primary d-flex flex-column">
    <div class="page page-center">
        <div class="container-tight py-4">
            <div class="empty">
                <img width="199px" height="auto" class="mb-5"
                    src="{{ asset('/vendor/obelaw/images/logo-dark.svg') }}" alt="">
                <div class="empty-header">Code: #{{ $code }}</div>
                <p class="empty-title">Oops… Exception</p>
                <p class="empty-subtitle text-muted">
                    {{ $message }}
                </p>
                <div class="empty-action">
                    <a href="{{ route('obelaw.home') }}" class="btn btn-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-home" width="24"
                            height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M5 12l-2 0l9 -9l9 9l-2 0" />
                            <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                            <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
                        </svg>
                        Go To Home
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>

@livewireScripts

</html>
