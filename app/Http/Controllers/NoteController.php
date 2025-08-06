<?php

    namespace App\Http\Controllers;

    use App\Models\Note;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth; // Import the Auth facade

    class NoteController extends Controller
    {
        /**
         * Display a listing of the resource (all notes for the authenticated user).
         *
         * @return \Illuminate\Http\Response
         */
        public function index()
        {
            // Retrieve all notes belonging to the currently authenticated user, ordered by creation date.
            $notes = Auth::user()->notes()->orderBy('created_at', 'desc')->get();
            // Pass the notes to the 'notes.index' view.
            return view('notes.index', compact('notes'));
        }

        /**
         * Show the form for creating a new resource (note).
         *
         * @return \Illuminate\Http\Response
         */
        public function create()
        {
            return view('notes.create');
        }

        /**
         * Store a newly created resource (note) in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @return \Illuminate\Http\Response
         */
        public function store(Request $request)
        {
            // Validate the incoming request data
            $request->validate([
                'title' => 'required|max:255', // Title is required and max 255 characters
                'content' => 'required',       // Content is required
            ]);

            // Create a new note associated with the authenticated user
            Auth::user()->notes()->create([
                'title' => $request->title,
                'content' => $request->content,
            ]);

            // Redirect to the notes index page with a success message
            return redirect()->route('notes.index')->with('success', 'Note created successfully!');
        }

        /**
         * Display the specified resource (single note).
         *
         * @param  \App\Models\Note  $note
         * @return \Illuminate\Http\Response
         */
        public function show(Note $note)
        {
            // Security check: Ensure the authenticated user owns this note
            if (Auth::id() !== $note->user_id) {
                // If not, abort with a 403 Forbidden error
                abort(403, 'Unauthorized action.');
            }
            return view('notes.show', compact('note'));
        }

        /**
         * Show the form for editing the specified resource (note).
         *
         * @param  \App\Models\Note  $note
         * @return \Illuminate\Http\Response
         */
        public function edit(Note $note)
        {
            // Security check: Ensure the authenticated user owns this note
            if (Auth::id() !== $note->user_id) {
                abort(403, 'Unauthorized action.');
            }
            return view('notes.edit', compact('note'));
        }

        /**
         * Update the specified resource (note) in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @param  \App\Models\Note  $note
         * @return \Illuminate\Http\Response
         */
        public function update(Request $request, Note $note)
        {
            // Security check: Ensure the authenticated user owns this note
            if (Auth::id() !== $note->user_id) {
                abort(403, 'Unauthorized action.');
            }

            // Validate the incoming request data
            $request->validate([
                'title' => 'required|max:255',
                'content' => 'required',
            ]);

            // Update the note attributes
            $note->update([
                'title' => $request->title,
                'content' => $request->content,
            ]);

            return redirect()->route('notes.index')->with('success', 'Note updated successfully!');
        }

        /**
         * Remove the specified resource (note) from storage.
         *
         * @param  \App\Models\Note  $note
         * @return \Illuminate\Http\Response
         */
        public function destroy(Note $note)
        {
            // Security check: Ensure the authenticated user owns this note
            if (Auth::id() !== $note->user_id) {
                abort(403, 'Unauthorized action.');
            }

            $note->delete(); // Delete the note

            return redirect()->route('notes.index')->with('success', 'Note deleted successfully!');
        }
    }
