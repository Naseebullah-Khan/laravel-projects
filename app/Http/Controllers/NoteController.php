<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notes = Note::where("user_id", Auth::user()->id)
            ->where("archived", 0)
            ->latest()
            ->get();
        return view("dashboard", compact("notes"));
    }

    public function setAppearance(Request $request): JsonResponse
    {
        $note = Note::where("id", $request->note_id)
            ->where("user_id", Auth::user()->id)
            ->first();

        $note->update([
            "appearance_type" => $request->appearance_type,
            "color_name" => $request->color_name,
            "image_path" => $request->image_path,
        ]);

        return response()->json(['status' => 'success', "data" => $note], 200);
    }

    public function archivedNotes()
    {
        $notes = Note::where("user_id", Auth::user()->id)
            ->where("archived", 1)
            ->latest()
            ->get();
        return view("archived", compact("notes"));
    }

    public function putArchived(Note $note): RedirectResponse
    {
        if ($note->user_id != Auth::user()->id) {
            return redirect()->back();
        }

        $note->update([
            "archived" => !$note->archived,
        ]);

        return redirect()->back();
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
    public function store(Request $request): RedirectResponse
    {
        Note::create([
            "user_id" => Auth::user()->id,
            "title" => $request->title,
            "content" => $request->input("content"),
        ]);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
    public function update(Request $request, Note $note): RedirectResponse
    {
        $note->update([
            "user_id" => Auth::user()->id,
            "title" => $request->title,
            "content" => $request->input("content"),
        ]);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Note $note): RedirectResponse
    {
        if ($note->user_id != Auth::user()->id) {
            return redirect()->back();
        }
        $note->delete();
        return redirect()->back();
    }

    public function showBinData()
    {
        $notes = Note::where("user_id", Auth::user()->id)
            ->onlyTrashed()
            ->latest()
            ->get();
        return view("bin", compact("notes"));
    }

    public function forceDestroy(string $id): RedirectResponse
    {
        $note = Note::where("user_id", Auth::user()->id)
            ->withTrashed()
            ->findOrFail($id);

        $note->forceDelete();

        return redirect()->back();
    }

    public function restore(string $id): RedirectResponse
    {
        $note = Note::where("user_id", Auth::user()->id)
            ->withTrashed()
            ->findOrFail($id);

        $note->restore();

        return redirect()->back();
    }
}
