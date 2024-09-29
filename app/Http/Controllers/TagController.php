<?php

namespace App\Http\Controllers;

use App\Http\Requests\Tags\StoreRequest;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags = Tag::all();
        return view('tags.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tags.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $tag = Tag::create($request->validated());
        return redirect()->route('tags.show', compact('tag'))->with('message', trans('tags.actions.saved'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Tag $tag)
    {
        return view('tags.show', compact('tag'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tag $tag)
    {
        return view('tags.create', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreRequest $request, Tag $tag)
    {
        $tag->update($request->validated());
        return redirect()->route('tags.show', compact('tag'))->with('message', trans('tags.actions.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();
        return redirect()->route('tags.index');
    }
}
