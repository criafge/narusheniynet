<x-header />
<div class="container">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Номер машины</th>
                <th scope="col">Статус заявки</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($applications as $item)
                <tr>
                    <th scope="row">{{$item->id}}</th>
                    <td>{{$item->number}}</td>
                    <td>{{$item->status_id}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
</body>

</html>
