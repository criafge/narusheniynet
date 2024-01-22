<x-header />
<div class="container">
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
                    <th scope="row">{{$item->id}}</th>
                    <td>{{$item->number}}</td>
                    <td>{{$item->status}}</td>
                    <td>{{$item->created_at}}</td>
                    <td><a href="{{route('delete-application', $item->id)}}" class="btn btn-danger">Удалить заявку</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
</body>

</html>
