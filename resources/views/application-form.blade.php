<x-header />

<div class="container">
    <div>
        <h1>Создать заявку</h1>
        <form action="{{ route('application-create') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="number" class="form-label">Номер машины</label>
                <input type="text" class="form-control" name="number">
                @error('number')
                    <div class="alert alert-danger" role="alert">
                        {{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Опишите проблему</label>
                <textarea class="form-control" name="description"></textarea>
                @error('description')
                    <div class="alert alert-danger" role="alert">
                        {{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-danger">Submit</button>
        </form>
    </div>
</div>
</body>

</html>
