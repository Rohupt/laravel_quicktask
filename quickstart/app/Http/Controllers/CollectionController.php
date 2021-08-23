<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use App\Models\Word;
use Illuminate\Database\Eloquent\Builder;
use App\Http\Requests\CollectionRequest;

class CollectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $collections = Collection::all();

        return view('collections', ['collections' => $collections]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CollectionRequest $request)
    {
        $newCollection = new Collection;
        $newCollection->name = $request->name;
        $newCollection->save();

        return redirect()->route('collections.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Collection  $collection
     * @return \Illuminate\Http\Response
     */
    public function show(Collection $collection)
    {
        $words = $collection->words()->with('collections')->get();
        $notAttachedWord = Word::whereDoesntHave('collections', function (Builder $query)  use ($collection) {
            $query->where('id', $collection->id);
        })->get();

        return view('collection', ['collection' => $collection, 'words' => $words, 'notAttachedWord' => $notAttachedWord]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Collection  $collection
     * @return \Illuminate\Http\Response
     */
    public function edit(Collection $collection)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Collection  $collection
     * @return \Illuminate\Http\Response
     */
    public function update(CollectionRequest $request, Collection $collection)
    {
        $collection->name = $request->name;
        $collection->update();

        return redirect()->route('collections.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Collection  $collection
     * @return \Illuminate\Http\Response
     */
    public function destroy(Collection $collection)
    {
        $collection->delete();

        return redirect()->route('collections.index');
    }

    public function attach(Collection $collection, Word $word)
    {
        $collection->words()->attach($word->id);

        return redirect()->route('collections.show', ['collection' => $collection]);
    }

    public function detach(Collection $collection, Word $word)
    {
        $collection->words()->detach($word->id);

        return redirect()->route('collections.show', ['collection' => $collection]);
    }
}
