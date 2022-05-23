<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title')</title>
    <meta name="description" content="Universitas Esa Unggul">
    <meta name="keywords" content="School Universitas Esa Unggul, Universitas Esa Unggul">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
            
    @include('layouts.components.css-source')

  </head>

  <body>
      
    @include('layouts.components.sidebar')
    
    <div class="main-content" id="panel">

        @include('layouts.components.header')

        @yield('section-subheader')

        <div class="container-fluid mt--6">
            @yield('section-content')

            @include('layouts.components.footer')
        </div>

    </div>
    
    @include('layouts.components.js-source')
    @yield('script')

  </body>
</html>