<!doctype html>
<!--
* Tabler - Premium and Open Source dashboard template with responsive and high quality UI.
* @version 1.0.0-beta19
* @link https://tabler.io
* Copyright 2018-2023 The Tabler Authors
* Copyright 2018-2023 codecalm.net Paweł Kuna
* Licensed under MIT (https://github.com/tabler/tabler/blob/master/LICENSE)
-->
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Dashboard - Tabler - Premium and Open Source dashboard template with responsive and high quality UI.</title>
    <!-- CSS files -->
    <link href="{{ asset('/vendor/obelaw/tabler.min.css') }}" rel="stylesheet" />
    <style>
        @import url('https://rsms.me/inter/inter.css');

        :root {
            --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
        }

        body {
            font-feature-settings: "cv03", "cv04", "cv11";
        }
    </style>

    @livewireStyles
</head>

<body>
    <script src="./dist/js/demo-theme.min.js?1684106062"></script>
    <div class="page">
        <!-- Navbar -->
        <header class="navbar navbar-expand-md d-print-none" data-bs-theme="dark">
            <div class="container-xl">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu"
                    aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
                    <a href="{{ route('obelaw.home') }}">
                        <svg width="110" height="32" viewBox="0 0 660 220" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M34.62 59.62C40.4867 46.42 47.3067 36.3733 55.08 29.48C62.8533 22.44 71.2867 18.92 80.38 18.92C82.4333 18.92 84.4133 19.0667 86.32 19.36C88.2267 19.6533 90.06 20.0933 91.82 20.68C82.4333 26.4 73.6333 40.3333 65.42 62.48C57.3533 84.6267 53.32 104.793 53.32 122.98C53.32 131.193 54.42 137.5 56.62 141.9C58.82 146.3 61.9733 148.5 66.08 148.5C72.0933 148.5 78.2533 144.613 84.56 136.84C90.8667 129.067 96.44 118.653 101.28 105.6C104.8 96.36 107.44 86.8267 109.2 77C111.107 67.0267 112.06 57.5667 112.06 48.62C112.06 33.9533 109.933 23.9067 105.68 18.48C101.427 12.9067 94.1667 10.12 83.9 10.12C65.86 10.12 50.7533 15.4733 38.58 26.18C26.5533 36.74 20.54 50.2333 20.54 66.66C20.54 68.7133 20.6133 70.5467 20.76 72.16C21.0533 73.6267 21.5667 75.1667 22.3 76.78C22.4467 77.3667 22.52 77.8067 22.52 78.1C22.6667 78.2467 22.74 78.3933 22.74 78.54C15.26 78.54 9.68667 77.0733 6.02 74.14C2.35333 71.06 0.52 66.3667 0.52 60.06C0.52 51.8467 3.38 43.78 9.1 35.86C14.9667 27.7933 23.0333 20.7533 33.3 14.74C41.5133 10.0467 50.3867 6.45332 59.92 3.95999C69.6 1.31999 79.3533 -1.3113e-05 89.18 -1.3113e-05C106.487 -1.3113e-05 119.467 4.76665 128.12 14.3C136.92 23.6867 141.32 37.6933 141.32 56.32C141.32 68.4933 139.56 81.0333 136.04 93.94C132.52 106.847 127.68 118.36 121.52 128.48C114.04 140.8 105.093 150.187 94.68 156.64C84.2667 163.093 72.7533 166.32 60.14 166.32C47.2333 166.32 37.4067 162.58 30.66 155.1C24.06 147.62 20.76 136.62 20.76 122.1C20.76 112.713 22.0067 102.373 24.5 91.08C26.9933 79.64 30.3667 69.1533 34.62 59.62ZM172.569 166.32C162.742 166.32 155.115 163.9 149.689 159.06C144.409 154.073 141.769 147.107 141.769 138.16C141.769 136.107 141.915 134.053 142.209 132C142.502 129.947 142.869 127.82 143.309 125.62L166.849 15.4L199.409 11L188.849 60.5C192.369 58.3 195.449 56.76 198.089 55.88C200.875 54.8533 203.809 54.34 206.889 54.34C215.542 54.34 221.995 57.4933 226.249 63.8C230.649 69.96 232.849 79.3467 232.849 91.96C232.849 100.613 231.529 109.487 228.889 118.58C226.249 127.673 222.582 135.593 217.889 142.34C212.462 150.26 205.935 156.273 198.309 160.38C190.682 164.34 182.102 166.32 172.569 166.32ZM173.229 134.86C173.229 138.233 174.182 140.8 176.089 142.56C178.142 144.173 181.075 144.98 184.889 144.98C191.489 144.98 197.429 139.187 202.709 127.6C207.989 116.013 210.629 103.84 210.629 91.08C210.629 84.92 209.529 79.86 207.329 75.9C205.275 71.94 202.489 69.96 198.969 69.96C196.622 69.96 194.129 70.3267 191.489 71.06C188.849 71.7933 187.015 72.7467 185.989 73.92L173.889 129.8C173.742 130.68 173.595 131.56 173.449 132.44C173.302 133.32 173.229 134.127 173.229 134.86ZM277.803 144.98C281.469 144.98 284.769 143.44 287.703 140.36C290.636 137.28 293.056 132.807 294.963 126.94L310.363 55H342.043L320.263 157.08C327.596 154.44 333.316 150.773 337.423 146.08C341.676 141.24 345.196 134.42 347.983 125.62H357.222C353.849 136.767 349.009 145.713 342.703 152.46C336.543 159.207 328.403 163.973 318.283 166.76L314.983 182.6C312.343 194.92 307.723 204.233 301.123 210.54C294.523 216.847 285.943 220 275.383 220C267.903 220 261.889 218.093 257.343 214.28C252.943 210.467 250.743 205.26 250.743 198.66C250.743 191.473 253.676 185.093 259.543 179.52C265.556 174.093 274.576 169.547 286.603 165.88L289.243 154C285.576 158.107 281.543 161.187 277.143 163.24C272.889 165.293 268.123 166.32 262.843 166.32C255.509 166.32 249.716 164.047 245.463 159.5C241.356 154.807 239.302 148.28 239.302 139.92C239.302 138.013 239.449 135.887 239.742 133.54C240.036 131.047 240.476 128.407 241.062 125.62L256.023 55H287.703L271.863 129.8C271.716 130.68 271.569 131.633 271.423 132.66C271.276 133.54 271.203 134.42 271.203 135.3C271.203 138.38 271.716 140.8 272.743 142.56C273.916 144.173 275.603 144.98 277.803 144.98ZM284.403 176.88C277.069 179.667 271.643 182.527 268.123 185.46C264.603 188.54 262.843 191.913 262.843 195.58C262.843 197.487 263.576 199.173 265.043 200.64C266.509 202.107 268.269 202.84 270.323 202.84C272.816 202.84 275.236 201.08 277.583 197.56C279.929 194.04 281.763 189.273 283.083 183.26L284.403 176.88ZM346.295 139.92C346.295 138.013 346.441 135.887 346.735 133.54C347.028 131.047 347.468 128.407 348.055 125.62L371.595 15.4L404.155 11L378.855 129.8C378.561 131.12 378.341 132.367 378.195 133.54C378.048 134.567 377.975 135.667 377.975 136.84C377.975 139.773 378.635 141.9 379.955 143.22C381.421 144.393 383.768 144.98 386.995 144.98C391.101 144.98 394.988 143.22 398.655 139.7C402.321 136.033 405.035 131.34 406.795 125.62H416.035C411.341 138.967 405.035 149.087 397.115 155.98C389.195 162.873 380.101 166.32 369.835 166.32C362.501 166.32 356.708 164.047 352.455 159.5C348.348 154.807 346.295 148.28 346.295 139.92ZM472.621 65.12V66.66L475.041 55H506.721L490.881 129.8C490.588 131.12 490.368 132.367 490.221 133.54C490.074 134.567 490.001 135.667 490.001 136.84C490.001 140.067 490.734 142.487 492.201 144.1C493.668 145.567 495.941 146.3 499.021 146.3C502.834 146.3 506.281 144.54 509.361 141.02C512.441 137.353 514.934 132.22 516.841 125.62H526.081C521.388 139.113 515.301 149.307 507.821 156.2C500.341 162.947 491.688 166.32 481.861 166.32C475.554 166.32 470.494 164.56 466.681 161.04C463.014 157.52 460.888 152.533 460.301 146.08C455.754 152.827 450.694 157.887 445.121 161.26C439.694 164.633 433.828 166.32 427.521 166.32C418.428 166.32 411.241 163.24 405.961 157.08C400.828 150.92 398.261 142.193 398.261 130.9C398.261 122.687 399.508 114.107 402.001 105.16C404.494 96.2133 407.941 88.0733 412.341 80.74C417.768 72.0867 424.074 65.4867 431.261 60.94C438.448 56.2467 446.294 53.9 454.801 53.9C460.521 53.9 464.921 54.9267 468.001 56.98C471.081 58.8867 472.621 61.6 472.621 65.12ZM470.641 75.9C470.641 73.7 469.834 71.7933 468.221 70.18C466.608 68.42 464.408 67.54 461.621 67.54C453.554 67.54 446.368 74.2867 440.061 87.78C433.901 101.273 430.821 114.62 430.821 127.82C430.821 133.54 431.628 137.867 433.241 140.8C434.854 143.587 437.714 144.98 441.821 144.98C445.634 144.98 449.301 143.147 452.821 139.48C456.488 135.813 458.908 131.193 460.081 125.62L470.641 75.9ZM515.162 139.92C515.162 138.013 515.309 135.887 515.602 133.54C515.895 131.047 516.335 128.407 516.922 125.62L531.882 55H563.562L547.722 129.8C547.575 130.68 547.429 131.633 547.282 132.66C547.135 133.54 547.062 134.42 547.062 135.3C547.062 138.38 547.575 140.8 548.602 142.56C549.775 144.173 551.462 144.98 553.662 144.98C557.475 144.98 560.849 143.367 563.782 140.14C566.862 136.767 569.355 131.927 571.262 125.62L586.222 55H617.902L602.062 129.8C601.769 131.413 601.475 132.953 601.182 134.42C601.035 135.74 600.962 136.84 600.962 137.72C600.962 140.067 601.549 141.9 602.722 143.22C604.042 144.393 605.949 144.98 608.442 144.98C613.575 144.98 618.562 142.34 623.402 137.06C628.389 131.633 632.862 124.007 636.822 114.18C639.755 107.14 642.102 99.7333 643.862 91.96C645.622 84.1867 646.502 77.3667 646.502 71.5C646.209 72.0867 645.255 72.6 643.642 73.04C642.175 73.48 640.782 73.7 639.462 73.7C637.115 73.7 635.209 72.6 633.742 70.4C632.275 68.0533 631.542 65.4133 631.542 62.48C631.542 58.8133 632.715 55.9533 635.062 53.9C637.555 51.7 640.929 50.6 645.182 50.6C649.729 50.6 653.175 52.2867 655.522 55.66C657.869 59.0333 659.042 63.7267 659.042 69.74C659.042 79.7133 657.722 90.2 655.082 101.2C652.589 112.053 649.142 121.953 644.742 130.9C638.875 142.487 631.835 151.287 623.622 157.3C615.409 163.313 606.315 166.32 596.342 166.32C589.009 166.32 583.069 164.78 578.522 161.7C574.122 158.473 571.262 153.853 569.942 147.84C565.689 154 560.995 158.62 555.862 161.7C550.875 164.78 545.155 166.32 538.702 166.32C531.369 166.32 525.575 164.047 521.322 159.5C517.215 154.807 515.162 148.28 515.162 139.92Z"
                                fill="white" />
                        </svg>
                    </a>
                </h1>
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <div class="d-flex flex-column flex-md-row flex-fill align-items-stretch align-items-md-center">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('obelaw.home') }}">
                                    <span class="nav-link-icon d-md-none d-lg-inline-block">
                                        <!-- Download SVG icon from http://tabler-icons.io/i/home -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24"
                                            height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M5 12l-2 0l9 -9l9 9l-2 0" />
                                            <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                                            <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
                                        </svg>
                                    </span>
                                    <span class="nav-link-title">
                                        Home
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#navbar-help" data-bs-toggle="dropdown"
                                    data-bs-auto-close="outside" role="button" aria-expanded="false">
                                    <span class="nav-link-icon d-md-none d-lg-inline-block">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="icon icon-tabler icon-tabler-puzzle" width="24" height="24"
                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path
                                                d="M4 7h3a1 1 0 0 0 1 -1v-1a2 2 0 0 1 4 0v1a1 1 0 0 0 1 1h3a1 1 0 0 1 1 1v3a1 1 0 0 0 1 1h1a2 2 0 0 1 0 4h-1a1 1 0 0 0 -1 1v3a1 1 0 0 1 -1 1h-3a1 1 0 0 1 -1 -1v-1a2 2 0 0 0 -4 0v1a1 1 0 0 1 -1 1h-3a1 1 0 0 1 -1 -1v-3a1 1 0 0 1 1 -1h1a2 2 0 0 0 0 -4h-1a1 1 0 0 1 -1 -1v-3a1 1 0 0 1 1 -1">
                                            </path>
                                        </svg>
                                    </span>
                                    <span class="nav-link-title">
                                        Modules
                                    </span>
                                </a>
                                <div class="dropdown-menu">
                                    @foreach ($modules as $module)
                                        <a class="dropdown-item" href="{{ route($module['href']) }}">
                                            @svg('tabler-' . $module['icon'], 'me-1')
                                            {{ $module['name'] }}
                                        </a>
                                    @endforeach
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="navbar-nav flex-row order-md-last">
                    <div class="d-none d-md-flex">
                        <a href="?theme=dark" class="nav-link px-0 hide-theme-dark" title="Enable dark mode"
                            data-bs-toggle="tooltip" data-bs-placement="bottom">
                            <!-- Download SVG icon from http://tabler-icons.io/i/moon -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path
                                    d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 0 0 7.92 12.446a9 9 0 1 1 -8.313 -12.454z" />
                            </svg>
                        </a>
                        <a href="?theme=light" class="nav-link px-0 hide-theme-light" title="Enable light mode"
                            data-bs-toggle="tooltip" data-bs-placement="bottom">
                            <!-- Download SVG icon from http://tabler-icons.io/i/sun -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M12 12m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
                                <path
                                    d="M3 12h1m8 -9v1m8 8h1m-9 8v1m-6.4 -15.4l.7 .7m12.1 -.7l-.7 .7m0 11.4l.7 .7m-12.1 -.7l-.7 .7" />
                            </svg>
                        </a>
                        <div class="nav-item dropdown d-none d-md-flex me-3">
                            <a href="#" class="nav-link px-0" data-bs-toggle="dropdown" tabindex="-1"
                                aria-label="Show notifications">
                                <!-- Download SVG icon from http://tabler-icons.io/i/bell -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path
                                        d="M10 5a2 2 0 1 1 4 0a7 7 0 0 1 4 6v3a4 4 0 0 0 2 3h-16a4 4 0 0 0 2 -3v-3a7 7 0 0 1 4 -6" />
                                    <path d="M9 17v1a3 3 0 0 0 6 0v-1" />
                                </svg>
                                <span class="badge bg-red"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-end dropdown-menu-card">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Last updates</h3>
                                    </div>
                                    <div class="list-group list-group-flush list-group-hoverable">
                                        <div class="list-group-item">
                                            <div class="row align-items-center">
                                                <div class="col-auto"><span
                                                        class="status-dot status-dot-animated bg-red d-block"></span>
                                                </div>
                                                <div class="col text-truncate">
                                                    <a href="#" class="text-body d-block">Example 1</a>
                                                    <div class="d-block text-muted text-truncate mt-n1">
                                                        Change deprecated html tags to text decoration classes (#29604)
                                                    </div>
                                                </div>
                                                <div class="col-auto">
                                                    <a href="#" class="list-group-item-actions">
                                                        <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="icon text-muted" width="24" height="24"
                                                            viewBox="0 0 24 24" stroke-width="2"
                                                            stroke="currentColor" fill="none"
                                                            stroke-linecap="round" stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                            <path
                                                                d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" />
                                                        </svg>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="list-group-item">
                                            <div class="row align-items-center">
                                                <div class="col-auto"><span class="status-dot d-block"></span></div>
                                                <div class="col text-truncate">
                                                    <a href="#" class="text-body d-block">Example 2</a>
                                                    <div class="d-block text-muted text-truncate mt-n1">
                                                        justify-content:between ⇒ justify-content:space-between (#29734)
                                                    </div>
                                                </div>
                                                <div class="col-auto">
                                                    <a href="#" class="list-group-item-actions show">
                                                        <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="icon text-yellow" width="24" height="24"
                                                            viewBox="0 0 24 24" stroke-width="2"
                                                            stroke="currentColor" fill="none"
                                                            stroke-linecap="round" stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                            <path
                                                                d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" />
                                                        </svg>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="list-group-item">
                                            <div class="row align-items-center">
                                                <div class="col-auto"><span class="status-dot d-block"></span></div>
                                                <div class="col text-truncate">
                                                    <a href="#" class="text-body d-block">Example 3</a>
                                                    <div class="d-block text-muted text-truncate mt-n1">
                                                        Update change-version.js (#29736)
                                                    </div>
                                                </div>
                                                <div class="col-auto">
                                                    <a href="#" class="list-group-item-actions">
                                                        <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="icon text-muted" width="24" height="24"
                                                            viewBox="0 0 24 24" stroke-width="2"
                                                            stroke="currentColor" fill="none"
                                                            stroke-linecap="round" stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                            <path
                                                                d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" />
                                                        </svg>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="list-group-item">
                                            <div class="row align-items-center">
                                                <div class="col-auto"><span
                                                        class="status-dot status-dot-animated bg-green d-block"></span>
                                                </div>
                                                <div class="col text-truncate">
                                                    <a href="#" class="text-body d-block">Example 4</a>
                                                    <div class="d-block text-muted text-truncate mt-n1">
                                                        Regenerate package-lock.json (#29730)
                                                    </div>
                                                </div>
                                                <div class="col-auto">
                                                    <a href="#" class="list-group-item-actions">
                                                        <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="icon text-muted" width="24" height="24"
                                                            viewBox="0 0 24 24" stroke-width="2"
                                                            stroke="currentColor" fill="none"
                                                            stroke-linecap="round" stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                            <path
                                                                d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" />
                                                        </svg>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown"
                            aria-label="Open user menu">
                            <span class="avatar avatar-sm"
                                style="background-image: url(https://www.gravatar.com/avatar/)"></span>
                            <div class="d-none d-xl-block ps-2">
                                <div>{{ auth()->user()->name }}</div>
                                <div class="mt-1 small text-muted">CTO</div>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            <a href="#" class="dropdown-item">Status</a>
                            <a href="./profile.html" class="dropdown-item">Profile</a>
                            <a href="#" class="dropdown-item">Feedback</a>
                            <div class="dropdown-divider"></div>
                            <a href="./settings.html" class="dropdown-item">Settings</a>
                            <a href="./sign-in.html" class="dropdown-item">Logout</a>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        @if (isset($nav))
            <header class="navbar-expand-md">
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <div class="navbar">
                        <div class="container-xl">
                            <ul class="navbar-nav">
                                {{ $nav ?? null }}
                            </ul>
                        </div>
                    </div>
                </div>
            </header>
        @endif

        <div class="page-wrapper">
            {{ $slot }}
            <footer class="footer footer-transparent d-print-none">
                <div class="container-xl">
                    <div class="row text-center align-items-center flex-row-reverse">
                        <div class="col-lg-auto ms-lg-auto">
                            <ul class="list-inline list-inline-dots mb-0">
                                <li class="list-inline-item"><a href="https://tabler.io/docs" target="_blank"
                                        class="link-secondary" rel="noopener">Documentation</a></li>
                                <li class="list-inline-item"><a href="./license.html"
                                        class="link-secondary">License</a></li>
                                <li class="list-inline-item"><a href="https://github.com/tabler/tabler"
                                        target="_blank" class="link-secondary" rel="noopener">Source code</a></li>
                                {{-- <li class="list-inline-item">
                                    <a href="https://github.com/sponsors/codecalm" target="_blank"
                                        class="link-secondary" rel="noopener">
                                        <!-- Download SVG icon from http://tabler-icons.io/i/heart -->
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="icon text-pink icon-filled icon-inline" width="24"
                                            height="24" viewBox="0 0 24 24" stroke-width="2"
                                            stroke="currentColor" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path
                                                d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" />
                                        </svg>
                                        Sponsor
                                    </a>
                                </li> --}}
                            </ul>
                        </div>
                        <div class="col-12 col-lg-auto mt-3 mt-lg-0">
                            <ul class="list-inline list-inline-dots mb-0">
                                <li class="list-inline-item">
                                    Copyright &copy; 2023
                                    <a href="." class="link-secondary">Obelaw</a>.
                                    All rights reserved.
                                </li>
                                <li class="list-inline-item">
                                    <a href="./changelog.html" class="link-secondary" rel="noopener">
                                        v1.0
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
</body>

<script src="{{ asset('/vendor/obelaw/tabler.min.js') }}"></script>
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
@livewireScripts
</html>
