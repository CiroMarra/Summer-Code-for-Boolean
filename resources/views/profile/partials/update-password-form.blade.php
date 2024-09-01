<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Password</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Include your custom CSS if needed -->
    <style>
        .form-label {
            font-weight: 500;
        }
        .form-text {
            color: #6c757d;
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <section>
            <header>
                <h2 class="h5 mb-3 text-dark">
                    {{ __('Aggiorna password') }}
                </h2>
                <p class="text-muted">
                    {{ __('Assicurati che il tuo account utilizzi una password lunga e casuale per rimanere sicuro') }}
                </p>
            </header>

            <form method="post" action="{{ route('password.update') }}" class="mt-4">
                @csrf
                @method('put')

                <div class="mb-3">
                    <label for="current_password" class="form-label">{{ __('Password corrente') }}</label>
                    <input id="current_password" name="current_password" type="password" class="form-control" autocomplete="current-password" />
                    @error('current_password')
                        <div class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">{{ __('Nuova Password') }}</label>
                    <input id="password" name="password" type="password" class="form-control" autocomplete="new-password" />
                    @error('password')
                        <div class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">{{ __('Conferma password') }}</label>
                    <input id="password_confirmation" name="password_confirmation" type="password" class="form-control" autocomplete="new-password" />
                    @error('password_confirmation')
                        <div class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-between align-items-center">
                    <button type="submit" class="btn btn-primary">{{ __('Salva') }}</button>

                    @if (session('status') === 'password-updated')
                        <p class="text-success mb-0">
                            {{ __('Saved.') }}
                        </p>
                    @endif
                </div>
            </form>
        </section>
    </div>

    <!-- Include Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>