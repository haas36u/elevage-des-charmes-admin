<!--
=========================================================
* Soft UI Dashboard - v1.0.3
=========================================================

* Product Page: https://www.creative-tim.com/product/soft-ui-dashboard
* Copyright 2021 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)

* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>

@if (\Request::is('rtl'))
<html dir="rtl" lang="ar">
    @else
    <html lang="en">
        @endif

        <head>
            <meta charset="utf-8" />
            <meta
                name="viewport"
                content="width=device-width, initial-scale=1, shrink-to-fit=no"
            />

            <link
                rel="icon"
                type="image/png"
                href="{{ asset('assets/img/favicon.png') }}"
            />
            <title>Soft UI Dashboard by Creative Tim</title>
            <!--     Fonts and icons     -->
            <link
                href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700"
                rel="stylesheet"
            />
            <!-- Nucleo Icons -->
            <link
                href="{{ asset('assets/css/nucleo-icons.css') }}"
                rel="stylesheet"
            />
            <link
                href="{{ asset('assets/css/nucleo-svg.css') }}"
                rel="stylesheet"
            />
            <!-- Font Awesome Icons -->
            <script
                src="https://kit.fontawesome.com/42d5adcbca.js"
                crossorigin="anonymous"
            ></script>
            <link
                href="{{ asset('assets/css/nucleo-svg.css') }}"
                rel="stylesheet"
            />
            <!-- CSS Files -->
            <link
                href="{{ asset('assets/css/soft-ui-dashboard.css') }}"
                rel="stylesheet"
                type="text/css"
            />
        </head>

        <body
            class="g-sidenav-show  bg-gray-100 {{ (\Request::is('rtl') ? 'rtl' : (Request::is('virtual-reality') ? 'virtual-reality' : '')) }} "
        >
            @auth @yield('auth') @endauth @guest @yield('guest') @endguest
            @if(session()->has('success'))
            <div
                x-data="{ show: true}"
                x-init="setTimeout(() => show = false, 4000)"
                x-show="show"
                class="position-fixed bg-success rounded right-3 text-sm py-2 px-4"
            >
                <p class="m-0">{{ session("success") }}</p>
            </div>
            @endif
            <!--   Core JS Files   -->
            <script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
            <script src="{{
                    asset('assets/js/core/bootstrap.min.js')
                }}"></script>
            <script src="{{
                    asset('assets/js/plugins/perfect-scrollbar.min.js')
                }}"></script>
            <script src="{{
                    asset('assets/js/plugins/smooth-scrollbar.min.js')
                }}"></script>
            <script src="{{
                    asset('assets/js/plugins/fullcalendar.min.js')
                }}"></script>
            <script src="{{
                    asset('assets/js/plugins/chartjs.min.js')
                }}"></script>
            @stack('rtl') @stack('dashboard')
            <script>
                var win = navigator.platform.indexOf("Win") > -1;
                if (win && document.querySelector("#sidenav-scrollbar")) {
                    var options = {
                        damping: "0.5",
                    };
                    Scrollbar.init(
                        document.querySelector("#sidenav-scrollbar"),
                        options
                    );
                }
            </script>
        </body>
    </html>
</html>
