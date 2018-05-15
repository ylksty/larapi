<html>
<head>
    <title>应用程序名称 - @yield('title')</title>
</head>
<body>
<table border="1">
    <tr>
        <td>
            @section('sidebar')
                这是主布局的侧边栏。
            @show
        </td>
        <td>
            <div class="container">
                @yield('content')
            </div>
        </td>
    </tr>
</table>
</body>
</html>