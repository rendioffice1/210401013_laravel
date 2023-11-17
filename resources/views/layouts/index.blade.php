<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Artikel Kita</title>
    <link rel="shortcut icon" href="icon.png" type="image/x-icon">

    <!-- Sertakan file Bootstrap CSS -->
    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
    <!-- Skrip Anda yang menggunakan CKEditor -->
    <script>
        // Gunakan CKEditor disini
        CKEDITOR.replace('description', {
            // Konfigurasi CKEditor
        });
    </script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <!-- Sertakan file Bootstrap JavaScript (Popper.js dan jQuery juga diperlukan) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <style>
        body {
            background-color: #f8f9fa;
        }

        .navbar {
            background-color: #63778d;
        }

        .navbar-dark .navbar-nav .nav-link {
            color: #fff;
        }

        .navbar-dark .navbar-toggler-icon {
            background-color: #fff;
        }

        .container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-top: 20px;
        }
        /*.img-fluid {*/
        /*    max-width: 100%;*/
        /*    height: auto;*/
        /*}*/

        /*.ckeditor-content .image{*/
        /*    max-width: 100px; !* Sesuaikan dengan lebar maksimum yang diinginkan *!*/
        /*    margin: 0 auto; !* Untuk membuat konten berada di tengah jika lebar layar lebih besar dari max-width *!*/
        /*}*/
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand" href="#">Logo</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Artikel</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Tentang Kami</a>
                </li>
            </ul>
        </div>
    </nav>



    <!-- Isi Konten -->
    <div class="container mt-4">
        <div class="row">
            @forelse($articles as $article)
                <div class="col-md-8 offset-md-2">
                    <h1 class="text-center">{{$article->judul}}</h1>
                    <p class="text-muted text-center">Tanggal Publikasi: {{$article->created_at->format('d F Y')}}</p>
                    <hr>

                    <!-- Isi Artikel -->
                    <p>{{$article->description}}</p>
{{--                                    <p>{!! html_entity_decode($article->description) !!}</p>--}}

                    <!-- Gambar Artikel -->
                    <img src="{{Storage::url($article->image)}}" class="img-fluid" alt="Gambar Artikel">

                    <!-- Lanjutan Isi Artikel -->

                    <!-- Penutup Artikel -->
                    <hr>
                    <p class="text-muted text-center">Penulis: {{$article?->author?->name}}</p>
                </div>
            @empty
                <div class="col-md-8 offset-md-2">
                    <h1 class="text-center">Belum Ada Data Article</h1>
                </div>
            @endforelse
        </div>
    </div>

    <script>
        $(document).ready(function() {
            CKEDITOR.replace('description', {
                image2_maxWidth: 2, // Sesuaikan dengan lebar maksimum yang diinginkan
                image2_alignClasses: ['image-left', 'image-center', 'image-right'], // Opsi tambahan
                extraAllowedContent: 'img{width,height,max-width,max-height}', // Tambahan aturan CKEditor
                allowedContent: true // Hati-hati dengan pengaturan ini, sesuaikan sesuai kebutuhan
            });
        });
    </script>

</body>
</html>
