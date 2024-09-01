<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Account</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Include your custom CSS if needed -->
    <style>
        .modal-content {
            border-radius: 0.5rem;
        }
        .modal-header {
            border-bottom: none;
        }
        .modal-body {
            padding: 2rem;
        }
        .modal-footer {
            border-top: none;
        }
        .form-control, .form-control:focus {
            border-radius: 0.375rem;
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <!-- Delete Account Section -->
        <section class="space-y-6">
            <header>
                <h2 class="h5 mb-2 text-dark">
                    {{ __('Cancella Account') }}
                </h2>
                <p class="text-muted">
                    {{ __('Una volta scelto di cancellare il tuo account, ogni cosa associato a esso verrà cancellata, inserisci la tua password se vuoi continuare con la cancellazione account.') }}
                </p>
            </header>

            <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmUserDeletion">
                {{ __('Cancella Account') }}
            </button>

            <!-- Modal -->
            <div class="modal fade" id="confirmUserDeletion" tabindex="-1" aria-labelledby="confirmUserDeletionLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="confirmUserDeletionLabel">
                                {{ __('Sei sicuro che vuoi cancellare il tuo account?') }}
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p class="text-muted">
                                {{ __('Una volta scelto di cancellare il tuo account, ogni cosa associato a esso verrà cancellata, inserisci la tua password se vuoi continuare con la cancellazione account.') }}
                            </p>
                            <form method="post" action="{{ route('profile.destroy') }}">
                                @csrf
                                @method('delete')

                                <div class="mb-3">
                                    <label for="password" class="form-label">{{ __('Password') }}</label>
                                    <input type="password" id="password" name="password" class="form-control" placeholder="{{ __('Password') }}">
                                    <div class="form-text text-danger">
                                        @error('password') {{ $message }} @enderror
                                    </div>
                                </div>

                                <div class="d-flex justify-content-end">
                                    <button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal">{{ __('Annulla') }}</button>
                                    <button type="submit" class="btn btn-danger">{{ __('Cancella account') }}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Include Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>