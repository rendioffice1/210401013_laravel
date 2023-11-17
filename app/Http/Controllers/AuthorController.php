<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthorRequest;
use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $authors = Author::all();

       return view('pages.author', compact('authors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AuthorRequest $request)
    {
        Author::create($request->all());

        return redirect()->back()->with(['message' => 'berhasil menambahkan data author']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Author::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AuthorRequest $request, string $id)
    {
        $author = Author::findOrFail($id);
        $author->update($request->all());
        return redirect()->back()->with(['message' => 'berhasil merubah data author']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $author = Author::findOrFail($id);
        try {
           $author->delete();
        }catch (\Exception $err)
        {
            throw ValidationException::withMessages([
                'message' => "Tidak Bisa Hapus author {$author->name} Masih Terhubung Dengan Article"
            ]);
        }
        return redirect()->back()->with(['message' => 'berhasil menghapus data author']);
    }
}
