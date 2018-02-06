<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    @include('partials.head')
    {{-- Styles --}}
    @include('partials.styles')
</head>
<body>
    <div class="wrapper">
        {{-- Aside --}}
        @include('partials.aside')
        
        {{-- Content --}}
        <main>
            
        </main>

    {{-- Scripts --}}
    @include('partials.scripts')
</body>
</html>
