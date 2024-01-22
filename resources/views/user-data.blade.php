<x-header />
<div class="container">
    <form action="{{ route('change') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control"name="email" value="{{$user->email}}">
            @error('email')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" value="{{$user->name}}">
            @error('name')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="login" class="form-label">Login</label>
            <input type="text" class="form-control" name="login" value="{{$user->login}}">
            @error('login')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="surname" class="form-label">Surname</label>
            <input type="text" class="form-control" name="surname" value="{{$user->surname}}">
            @error('surname')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Number</label>
            <input type="phone" class="form-control" name="phone" value="{{$user->phone}}">
            @error('phone')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" name="password">
            @error('password')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-danger">Сохранить</button>
    </form>
</div>
</body>

</html>
