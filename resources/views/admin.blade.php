<x-header />
<div class="container">
    <ul class="list-group list-group-horizontal" style="height: 30xp">
        <li class="list-group-item"><a href="/admin"><img style="width: 30px;" src="img/asc-sort.png" alt="<"></a></li>
        <li class="list-group-item"><a href="/admin?sort=desc"><img style="width: 30px;" src="img/desc-sort.png" alt=">"></a></li>
    </ul>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Номер машины</th>
                <th scope="col">Статус заявки</th>
                <th scope="col">Дата добавления</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($applications as $item)
                <tr>
                    <th scope="row">{{ $item->id }}</th>
                    <td>{{ $item->number }}</td>
                    <td>{{ $item->status }}</td>
                    <td>{{ $item->created_at }}</td>
                    <td>
                        @if ($item->status_id === 1)
                            <a href="{{ route('confirm', $item->id) }}" class="btn btn-danger">Подтвердить</a>
                            <a href="{{ route('refuse', $item->id) }}" class="btn btn-danger">Отказать</a>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
</body>

</html>
