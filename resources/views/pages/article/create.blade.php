@extends('layouts.template')

{{--@push('script')--}}
{{--    <script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>--}}
{{--@endpush--}}

@section('content')
    <main class="container">

        <div> <center>
                <p></p>
                <h2 style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">Pusat Data Artikel</h2>
            </center>
        </div>

        <!-- START DATA -->
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <!-- START FORM -->
            <form action='{{route('article.store')}}' method='post' enctype="multipart/form-data">
                @csrf
                <div class="my-3 p-3 bg-body rounded shadow-sm">
                    <div class="mb-3 row">
                        <label for="nim" class="col-sm-2 col-form-label">Judul</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name='judul' id="judul">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="Publikasi" class="col-sm-2 col-form-label">Publikasi</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" name='publikasi' id="publikasi">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="jurusan" class="col-sm-2 col-form-label">Isi Artikel</label>
                        <div class="col-sm-10">
                            <textarea name="description" id="description" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="jurusan" class="col-sm-2 col-form-label">media/gambar</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" name='image' id="image">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="jurusan" class="col-sm-2 col-form-label">Kategori</label>
                        <div class="col-sm-10">
                            <select name="category_id" id=""  class="form-control">
                                @foreach($categories as $key => $category)
                                    <option value="{{$key}}">{{$category}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="jurusan" class="col-sm-2 col-form-label">Penulis/Author</label>
                        <div class="col-sm-10">
                            <select name="author_id" id=""  class="form-control">
                                @foreach($authors as $key => $author)
                                    <option value="{{$key}}">{{$author}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="jurusan" class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button></div>
                    </div>
                </div>
            </form>

        </div>
        <!-- AKHIR DATA -->
    </main>


{{--    <script>--}}
{{--        ClassicEditor.create( document.querySelector( '#description' ),--}}
{{--            {--}}
{{--                ckfinder:{--}}
{{--                    uploadUrl:"{{route('ckeditor.upload',['_token'=>csrf_token()])}}"--}}
{{--                },--}}
{{--                image: {--}}
{{--                    styles: [--}}
{{--                        'alignLeft', 'alignCenter', 'alignRight'--}}
{{--                    ],--}}
{{--                    // Pengaturan ukuran default--}}
{{--                    toolbar: [--}}
{{--                        'imageStyle:alignLeft', 'imageStyle:alignCenter', 'imageStyle:alignRight',--}}
{{--                        '|',--}}
{{--                        'imageResize'--}}
{{--                    ],--}}
{{--                    // Ukuran default--}}
{{--                    resizeOptions: [--}}
{{--                        {--}}
{{--                            name: 'custom',--}}
{{--                            label: 'Ukuran Custom',--}}
{{--                            value: '200px'--}}
{{--                        }--}}
{{--                    ]--}}
{{--                },--}}
{{--            })--}}
{{--            .catch( error => {--}}
{{--                console.error( error );--}}
{{--            } );--}}
{{--    </script>--}}
@endsection
