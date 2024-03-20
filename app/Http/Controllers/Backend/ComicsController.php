<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Validation\Rule;
use App\Models\Comic;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ComicsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comics = Comic::all();

        return view('pages.comicsView.index', compact('comics'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.comicsView.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        //validation
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'thumb' => [
                'required',
                'string',
                Rule::requiredIf(function () use ($request) {
                    // Richiedi "https://" solo se il campo thumb è stato fornito
                    return !empty($request->thumb);
                }),
                function ($attribute, $value, $fail) {
                    // Verifica se l'URL inizia con "https://"
                    if (strpos($value, 'https://') !== 0) {
                        $fail('Il campo Thumb deve iniziare con "https://".');
                    }
                },
            ],
            'price' => 'required|numeric',
            'series' => 'required|string',
            'sale_date' => 'required|date',
        ]);




        $formData = $request->all();

        $newComic = new Comic();
        $newComic->fill($formData);

        // $newComic->title = $formData['title'];
        // $newComic->description = $formData['description'];
        // $newComic->thumb = $formData['thumb'];
        // $newComic->price = $formData['price'];
        // $newComic->series = $formData['series'];
        // $newComic->sale_date = $formData['sale_date'];

        $newComic->save();

        return redirect()->route('comics.index', ['comic' => $newComic->id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $comic = Comic::find($id);

        return view('pages.comicsView.show', compact('comic'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $comic = Comic::findOrFail($id);
        return view('pages.comicsView.edit', compact('comic'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $formData = $request->all();

        $comic = Comic::find($id);

        $comic->update($formData);

        return redirect()->route('comics.index', ['comic' => $comic->id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $comic = Comic::find($id);
        $comic->delete();

        return redirect()->route('comics.index');
    }
}
