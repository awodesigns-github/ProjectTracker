<!doctype html>
<html lang="en">

<head>
    <title>SPCS| Student Project Collaboration System</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="spcs">
    <meta name="spcs" content="spcs">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="icon" href="" type="image/x-icon">
    
    @include('components.header')
    
    <style>
        .blink_me {
          animation: blinker 1s linear infinite;
        }
        
        @keyframes blinker {
          50% {
            opacity: 0;
          }
        }
        
          .notify {
            /* defaults */
            --notify-error: #eb5757;
            --notify-success: #2C3D87;
            --notify-warning: #f2c94c;
            --notify-gray: #333333;
            --notify-gray-2: #4d4d4d;
            --notify-gray-3: #828282;
            --notify-white: #fff;
            --notify-white-2: rgba(255, 255, 255, 0.8);
            --notify-padding: 0.75rem;
            --notify-icon-size: 32px;
            --notify-close-icon-size: 16px;
            width: 100%;
          }
    </style>
</head>
<body data-theme="light" class="font-nunito">
    <div id="wrapper" class="theme-cyan">
    
        <!-- Page Loader -->
        @include('components.CustomPageLoader')
        {{-- end of page loader --}}
        <!-- Top navbar div start -->
        @include('components.CustomNavigationBar')
        {{-- end of navbar --}}

        <!-- main left menu -->
        @include('components.LeftSideBar')
        {{-- end of left --}}

        {{-- main content --}}
        <main class="py-4">
            <div id="main-content">
                <div class="container-fluid">
            @yield('content')
                </div>
            </div>
        </main>
        {{-- End of main content --}}


        <!-- rightbar icon div -->
        {{-- @include('components.CustomRightSideBar') --}}
        {{-- end of right --}} 
        </div>

        @include('components.footer')

      
        @yield('contentScripts')

</body>
</html>