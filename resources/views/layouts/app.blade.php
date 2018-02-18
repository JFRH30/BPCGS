<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  @include('partials.head')
  {{-- Styles --}}
  @include('partials.styles')
</head>
<body>
  {{-- Navbar --}}
  @include('partials.nav')
  
  {{-- Content --}}
  @yield('content')
  {{-- Footer --}}
  @include('partials.footer')

  {{-- Scripts --}}
  @include('partials.scripts')
</body>
</html>