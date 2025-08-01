<x-navbar />
<x-main />
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form class="p-5 border rounded" action="{{ route('register') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Nome
                        utente</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                        id="name" value="{{ old('name') }}">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email
                        utente</label>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                        id="email" value="{{ old('email') }}">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                        id="password">
                </div>
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Conferma
                        password</label>
                    <input type="password" name="password_confirmation"
                        class="form-control @error('password_confirmation') is-invalid @enderror"
                        id="password_confirmation">
                </div>

                <button type="submit" class="btn btn-dark">Registrati</button>
                <a href="{{ route('login') }}" class="btn btn-outline-dark">Gia'
                    iscritto?</a>
            </form>
        </div>
    </div>
</div>
<x-footer />
