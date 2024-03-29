<x-header />
<div class="container">
    <div class="w-100 d-flex justify-content-between align-items-center">
        <form action="{{ route('signup') }}" method="post">
            <h1>Регистрация</h1>
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control"name="email">
                @error('email')
                    <div class="alert alert-danger" role="alert">
                        {{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" name="name">
                @error('name')
                    <div class="alert alert-danger" role="alert">
                        {{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="login" class="form-label">Login</label>
                <input type="text" class="form-control" name="login">
                @error('login')
                    <div class="alert alert-danger" role="alert">
                        {{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="surname" class="form-label">Surname</label>
                <input type="text" class="form-control" name="surname">
                @error('surname')
                    <div class="alert alert-danger" role="alert">
                        {{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Number</label>
                <input type="phone" class="form-control" name="phone">
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
            <button type="submit" class="btn btn-danger">Зарегистрироваться</button>
        </form>
        <form action="{{ route('signin') }}" method="post">
            <h1>Вход</h1>
            @csrf
            <div class="mb-3">
                <label for="loginSignin" class="form-label">Login</label>
                <input type="text" class="form-control" name="loginSignin">
                @error('loginSignin')
                    <div class="alert alert-danger" role="alert">
                        {{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="passwordSignin" class="form-label">Password</label>
                <input type="password" class="form-control" name="passwordSignin">
                @error('passwordSignin')
                    <div class="alert alert-danger" role="alert">
                        {{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-danger">Войти</button>
            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show my-3" role="alert">
                    {{ session('error') }}
                </div>
            @endif
        </form>

    </div>
</div>
</body>

</html>
