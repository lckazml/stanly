<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Application's Name - @yield('title')</title>
</head>
<body>
    @section('sidebar')
        这是master 的侧边栏。
    @show
    <div >
        @yield('content')
    </div>
</body>
</html>