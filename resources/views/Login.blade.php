<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- Styles -->
    <style>
    </style>
</head>

<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">

                <!-- Company Logo and Name -->
                <div class="text-center mb-4">
                    <img src="path/to/your/logo.png" alt="Company Logo" class="img-fluid" style="max-height: 100px;">
                    <h4 class="mt-2">Company Name</h4>
                </div>
                <!-- Login Form -->
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-center mb-4">Login</h5>
                        <!-- Form -->
                        <form action="{{ route('Proses-Login') }}" method="POST">
                            @csrf
                            <!-- Username Input -->
                            <div class="mb-3">
                                <label for="nisn" class="form-label">NISN</label>
                                <input type="text" class="form-control" id="nisn" name="nisn" required>
                            </div>

                            <!-- Password Input -->
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>

                            <!-- Submit Button -->
                            <button type="submit" class="btn btn-primary w-100">Login</button>
                        </form>
                        <!-- End Form -->

                    </div>
                </div>
                <!-- End Login Form -->
                <div class="text-center mt-3">
                    <p>Belum punya akun? <a href="{{ route('Register') }}">Daftar di sini</a></p>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script>
        // Periksa apakah ada pesan error dari server
        var errorMessage = @json($errors->first('error'));

        // Panggil fungsi showErrorMessage jika ada pesan error
        if (errorMessage) {
            Swal.fire({
                title: 'Peringatan',
                text: errorMessage,
                icon: 'warning',
                confirmButtonText: 'OK'
            });
        }
    </script>
</body>

</html>
