<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.header')
</head>
<body>

    <div class="container">
        @yield('content')
    </div>

    @include('layouts.scripts')
</body>
</html>
