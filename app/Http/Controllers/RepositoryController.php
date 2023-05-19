<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Repository;

class RepositoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return view('repositories.index', [
            'repositories' => $request->user()->repositories,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('repositories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'url' => 'required',
            'description' => 'required'
        ]);

        $request->user()->repositories()->create($request->all());

        return redirect()->route('repositories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Repository $repository)
    {
        if ($request->user()->id != $repository->user_id) {
            abort(403);
        }

        return view('repositories.show', compact('repository'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Repository $repository)
    {
        if ($request->user()->id != $repository->user_id) {
            abort(403);
        }

        return view('repositories.edit', compact('repository'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Repository $repository)
    {
        $request->validate([
            'url' => 'required',
            'description' => 'required'
        ]);

        if ($request->user()->id != $repository->user_id) {
            abort(403);
        }

        $repository->update($request->all());

        return redirect()->route('repositories.edit', $repository);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Repository $repository)
    {
        if ($request->user()->id != $repository->user_id) {
            abort(403);
        }

        $repository->delete();

        return redirect()->route('repositories.index');
    }
}
