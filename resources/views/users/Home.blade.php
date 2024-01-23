<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Beranda-{{$dataPelajar['nama']}}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        #sidebarMenu {
            background-color: #f8f9fa;
            /* Ganti dengan warna yang diinginkan */
            height: 100vh;
            /* 100% tinggi halaman */
        }

        /* Styling untuk tombol di menu nav */
        .nav-link {
            padding: 0.5rem 1rem;
            /* Padding yang lebih kecil */
            font-size: 0.85rem;
            /* Ukuran font yang lebih kecil */
            color: #495057;
            /* Warna teks yang lebih gelap */
            transition: background-color 0.3s, color 0.3s;
            /* Efek transisi */
        }

        .nav-link:hover {
            background-color: #e9ecef;
            /* Warna latar belakang saat hover */
            color: #000;
            /* Warna teks saat hover */
        }

        .nav-link.active {
            background-color: #007bff;
            /* Warna latar belakang saat aktif */
            color: #fff;
            /* Warna teks saat aktif */
        }

        /* Menambahkan spasi antara ikon dan teks */
        .nav-link svg {
            margin-right: 0.5rem;
        }
    </style>
</head>

<body>

    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Company name</a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-nav">
            <div class="nav-item text-nowrap">
                <a class="nav-link px-3" href="{{ route('Log-Out') }}">Sign out</a>
            </div>
        </div>
    </header>

    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="position-sticky pt-3">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{route('User-Home')}}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"
                                    aria-hidden="true">
                                    <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                    <polyline points="9 22 9 12 15 12 15 22"></polyline>
                                </svg>
                                Beranda
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('User-Lampirkan')}}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-file"
                                    aria-hidden="true">
                                    <path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path>
                                    <polyline points="13 2 13 9 20 9"></polyline>
                                </svg>
                                Lampirkan Berkas
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart"
                                    aria-hidden="true">
                                    <circle cx="9" cy="21" r="1"></circle>
                                    <circle cx="20" cy="21" r="1"></circle>
                                    <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                                </svg>
                                Products
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"
                                    aria-hidden="true">
                                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="9" cy="7" r="4"></circle>
                                    <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                    <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                </svg>
                                Customers
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="feather feather-bar-chart-2" aria-hidden="true">
                                    <line x1="18" y1="20" x2="18" y2="10"></line>
                                    <line x1="12" y1="20" x2="12" y2="4"></line>
                                    <line x1="6" y1="20" x2="6" y2="14"></line>
                                </svg>
                                Reports
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-layers"
                                    aria-hidden="true">
                                    <polygon points="12 2 2 7 12 12 22 7 12 2"></polygon>
                                    <polyline points="2 17 12 22 22 17"></polyline>
                                    <polyline points="2 12 12 17 22 12"></polyline>
                                </svg>
                                Integrations
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="chartjs-size-monitor">
                    <div class="chartjs-size-monitor-expand">
                        <div class=""></div>
                    </div>
                    <div class="chartjs-size-monitor-shrink">
                        <div class=""></div>
                    </div>
                </div>
                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Beranda</h1>
                </div>
                <div class="row g-5">
                    <div class="col-md-5 col-lg-4 order-md-last">
                        <h4 class="d-flex justify-content-between align-items-center mb-3">
                            <span class="text-primary"></span>
                        </h4>
                        <form>
                            <div class="mb-3">
                                <img src="{{$dataPelajar['foto'] ? asset('data/images/' .$dataPelajar['foto']) : 'https://i.pinimg.com/736x/86/dd/f9/86ddf99c4b518f9d134c924cedbd2791.jpg'}}"
                                    class="img-fluid img-thumbnail" style="width: 250px; height: 300px;"
                                    alt="...">
                            </div>
                        </form>

                        @if ($dataPelajar['foto'] == null)
                            <form id="uploadForm" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3 text-center">
                                    <label for="photoUpload" class="form-label">Unggah Foto Profil (Max: 1MB, Format:
                                        JPEG)</label>
                                    <input type="file" class="form-control" id="photoUpload" name="photo"
                                        accept="image/jpeg" required>
                                    <small class="text-muted" id="error-message"></small>
                                </div>

                                <button type="button" onclick="validateImage()"
                                    class="btn btn-primary">Unggah</button>
                            </form>
                        @else
                            <div></div>
                        @endif


                    </div>

                    <!-- Formulir Pembayaran -->
                    <div class="col-md-7 col-lg-8">
                        <h4 class="mb-3">Profil Pengguna</h4>
                        <form class="needs-validation" novalidate="">

                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama:</label>
                                <input type="text" class="form-control" id="nama"
                                    value="{{ $dataPelajar['nama'] }}" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="Nisn" class="form-label">Nisn:</label>
                                <input type="text" class="form-control" id="Nisn"
                                    value="{{ $dataPelajar['nisn'] }}" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="tanggal_lahir" class="form-label">Tanggal Lahir:</label>
                                <input type="date" class="form-control" id="tanggal_lahir"
                                    value="{{ $dataPelajar['tanggal_lahir'] }}" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat:</label>
                                <textarea class="form-control" id="alamat" rows="3" readonly>{{ $dataPelajar['alamat'] }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="jenis_kelamin" class="form-label">Jenis Kelamin:</label>
                                <input type="text" class="form-control" id="jenis_kelamin"
                                    value="{{ $dataPelajar['jenis_kelamin'] }}" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email:</label>
                                <input type="email" class="form-control" id="email"
                                    value="{{ $user['email'] }}" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="jurusan" class="form-label">Jurusan Pilihan:</label>
                                <input type="text" class="form-control" id="jurusan"
                                    value="{{ $dataPelajar['jurusan'] }}" readonly>
                            </div>
                        </form>
                    </div>
                </div>


            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>


    <script>
        function validateImage() {
            var input = document.getElementById('photoUpload');
            var ImageURL = document.getElementById('')

            // Cek apakah file telah dipilih
            if (input.files.length === 0) {
                Swal.fire({
                    title: 'Peringatan',
                    text: 'Pilih file gambar terlebih dahulu.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
                return;
            }

            // Ambil file gambar
            var imageFile = input.files[0];

            // Cek format gambar (hanya mendukung JPEG)
            if (!imageFile.type.match('image/jpeg')) {
                Swal.fire({
                    title: 'Peringatan',
                    text: 'Format gambar harus JPEG.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
                return;
            }

            // Cek ukuran gambar (maksimum 1MB)
            if (imageFile.size > 1024 * 1024) {
                Swal.fire({
                    title: 'Peringatan',
                    text: 'Ukuran gambar maksimum adalah 1MB.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
                return;
            }

            // Membuat objek FormData untuk mengirim data ke server
            var formData = new FormData();
            formData.append('_token', '{{ csrf_token() }}');
            formData.append('photo', imageFile);

            // Membuat objek XMLHttpRequest
            var xhr = new XMLHttpRequest();

            // Mengonfigurasi metode POST, URL, dan asynchronous (true)
            xhr.open('POST', "{{ route('Upload-Foto') }}", true);
            xhr.setRequestHeader('Accept', 'application/json');

            // Mengatasi perubahan status permintaan
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4) {
                    // Tanggapan dari server
                    var response;
                    try {
                        response = JSON.parse(xhr.responseText);
                    } catch (e) {
                        // Tangkap kesalahan jika parsing JSON gagal
                        console.error('Error parsing JSON response:', e);
                        response = {
                            success: false,
                            message: 'Terjadi kesalahan saat mengunggah gambar.',
                            error: e // Tambahkan informasi kesalahan ke respons
                        };
                    }

                    if (xhr.status >= 200 && xhr.status < 300 && response.success) {
                        // Validasi sukses
                        Swal.fire({
                            title: 'Information',
                            text: 'Gambar berhasil diunggah!',
                            icon: 'success',
                            confirmButtonText: 'OK'
                        }).then((result) => {
                            /* Read more about isConfirmed, isDenied below */
                            if (result.isConfirmed) {
                                window.location.reload();
                            }
                        });

                        // Handle data dari JSON response jika diperlukan
                        console.log('Response Data:', response.data);
                    } else {
                        // Tanggapan dari server ketika terjadi kesalahan
                        Swal.fire({
                            title: 'Peringatan',
                            text: response.message || 'Terjadi kesalahan saat mengunggah gambar.',
                            icon: 'error',
                            confirmButtonText: 'OK'
                        });
                        console.log('Response Data:', response.data);
                    }
                }
            };

            // Mengirim data ke server
            xhr.send(formData);
        }
    </script>


</body>

</html>
