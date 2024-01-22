<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <nav class="d-flex align-items-center justify-content-end gap-3 fs-5 m">

            @if (auth()->user())
                @if (auth()->user()->role === 'client')
                    <a class="link-body-emphasis" href="{{ route('application') }}">Добавить заявку</a>
                    <a class="link-body-emphasis" href="{{ route('data') }}">Изменить данные</a>
                @endif
                <a class="link-body-emphasis" href="/home">Кабинет</a>
                <a class="btn btn-danger" href="{{ route('logout') }}">Выход</a>
            @endif
        </nav>
    </div>
