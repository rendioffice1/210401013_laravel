@extends('layouts.template')

@section('content')
    <main class="container">

        <div> <center>
                <p></p>
                <h2 style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">Pusat Publikasi Artikel</h2>
            </center>
        </div>

        <!-- START DATA -->
        <div class="my-3 p-3 bg-body rounded shadow-sm">


            <!-- TOMBOL TAMBAH DATA -->
            <div class="pb-3">
                <a href='{{route('article.create')}}' class="btn btn-primary">+ Tambah Data</a>
            </div>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th class="col-md-1">Judul</th>
                        <th class="col-md-1">Publikasi</th>
                        <th class="col-md-4">isi</th>
                        <th class="col-md-2">media</th>
                        <th class="col-md-2">Kategori</th>
                        <th class="col-md-2">Author</th>
                        <th class="col-md-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                @forelse($articles as $article)
                    <tr>
                        <td class="text-truncate" style="max-width: 250px;">{{$article->judul}}</td>
                        <td>{{$article->publikasi}}</td>
{{--                        <td>{!! html_entity_decode($article->description) !!}</td>--}}
                        <td class="text-truncate" style="max-width: 250px;">{{$article->description}}</td>
                        <td>
                            <a href="{{ Storage::url($article->image) }}" _blank="">
                                <img src="{{ Storage::url($article->image) }}" style="width: 150px" class="img-thumbnail" >
                            </a>
                        </td>
                        <td>{{$article?->category?->name}}</td>
                        <td>{{$article?->author?->name}}</td>

                        <td>
                            <a href='{{route('article.edit',$article->id)}}' class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{route('article.destroy', $article->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr class="text-center">
                        <td colspan="7">Tidak Ada Data Article</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
        <!-- AKHIR DATA -->
    </main>
@endsection
