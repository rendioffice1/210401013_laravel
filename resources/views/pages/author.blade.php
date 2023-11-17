@extends('layouts.template')

@section('content')
    <main class="container">

        <div> <center>
                <p></p>
                <h2 style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">Pusat Data Author</h2>
            </center>
        </div>

        <!-- START DATA -->
        <div class="my-3 p-3 bg-body rounded shadow-sm">


            <!-- TOMBOL TAMBAH DATA -->
            <div class="pb-3">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Tambah Data
                </button>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Create Author</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action='{{route('author.store')}}' method='post'>
                                @csrf
                            <div class="modal-body">
                                <!-- START FORM -->
                                    <div class="my-3 p-3 bg-body rounded shadow-sm">
                                        <div class="mb-3 row">
                                            <label for="nim" class="col-sm-2 col-form-label">Nama</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name='name' id="name">
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label for="jurusan" class="col-sm-2 col-form-label">Status</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name='status' id="status">
                                            </div>
                                        </div>
                                    </div>
                                <!-- AKHIR FORM -->
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>

                        </div>
                    </div>
                </div>
            </div>

            <table class="table table-striped">
                <thead>
                <tr class="text-center">
                    <th class="col-md-1">No</th>
                    <th class="col-md-4">Nama</th>
                    <th class="col-md-2">Status</th>
                    <th class="col-md-2">Aksi</th>
                </tr>
                </thead>
                <tbody>
                @forelse($authors as $author)
                    <tr class="text-center">
                        <td>{{$loop->iteration }}</td>
                        <td>{{$author->name}}</td>
                        <td>{{$author->status}}</td>
                        <td class="d-flex justify-content-center">
                            <div>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal{{$author->id}}">
                                    Edit
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal{{$author->id}}" tabindex="-1" aria-labelledby="exampleModalLabel{{$author->id}}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel{{$author->id}}">Edit Data</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form action="{{route('author.update', $author->id)}}" method='post'>
                                                @csrf
                                                @method('PUT')
                                                <div class="modal-body">
                                                    <!-- START FORM -->
                                                    <div class="my-3 p-3 bg-body rounded shadow-sm">
                                                        <div class="mb-3 row">
                                                            <label for="nim" class="col-sm-2 col-form-label">Nama</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" class="form-control" name='name' id="name" value="{{$author->name}}">
                                                            </div>
                                                        </div>

                                                        <div class="mb-3 row">
                                                            <label for="jurusan" class="col-sm-2 col-form-label">Status</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" class="form-control" name='status' id="status" value="{{$author->status}}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- AKHIR FORM -->
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Edit</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <form action="{{route('author.destroy', $author->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr class="text-center">
                        <td colspan="4">Tidak Ada Data Author</td>
                    </tr>
                @endforelse
                </tbody>
            </table>


        </div>
        <!-- AKHIR DATA -->
    </main>
@endsection
