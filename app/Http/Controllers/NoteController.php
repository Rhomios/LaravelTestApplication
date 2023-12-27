<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/notes/list",
     *     tags={"Notes"},
     *     summary="Get list of notes in Data base",
     *     @OA\Response(response="200", description="Successfully fetched the notes from the DataBase"),
     *     @OA\Response(response="404", description="Notes not found or some error occured"),
     * )
     */
    public function index() {
        $notes = Note::all();
        return response()->json($notes);
    }
    /**
     * @OA\Post(
     *     path="/api/notes/create",
     *     tags={"Notes"},
     *     summary="Add note to the DataBase",
     *          @OA\Parameter(
     *          name="title",
     *          in="query",
     *          description="Note's title",
     *          required=true,
     *          @OA\Schema(type="string")
     *      ),
     *      @OA\Parameter(
     *          name="content",
     *          in="query",
     *          description="Note's content",
     *          required=true,
     *          @OA\Schema(type="string")
     *      ),
     *     @OA\Response(response="201", description="Successfully added a note to the DataBase"),
     *     @OA\Response(response="404", description="Notes not found or some error occured"),
     * )
     */
    public function store(Request $request) {
        $validatedData = $request->validate([
            'title' => 'required|string',
            'content' => 'required|string'
        ]);
        $note = Note::create($validatedData);

        return response()->json($note, 201);
    }

    /**
     * @OA\Get(
     *      path="/api/notes/{id}",
     *      tags={"Notes"},
     *      summary="Get specified note by its Id",
     *      @OA\Parameter(
     *          name="id",
     *          description="Note id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *       ),
     *      @OA\Response(
     *          response=404,
     *          description="Notes have been not found"
     *      ),
     * )
     */
    public function show(Note $note) {
        return response()->json($note);
    }

    /**
     * @OA\Put(
     *      path="/api/notes/{id}/update",
     *      tags={"Notes"},
     *      summary="Update existing note",
     *      description="Returns updated note's data",
     *      @OA\Parameter(
     *          name="id",
     *          description="Note id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Parameter(
     *           name="title",
     *           in="query",
     *           description="Note's title",
     *           @OA\Schema(type="string")
     *       ),
     *       @OA\Parameter(
     *           name="content",
     *           in="query",
     *           description="Note's content",
     *           @OA\Schema(type="string")
     *       ),
     *      @OA\Response(
     *          response=202,
     *          description="Successful operation",
     *       ),
     *      @OA\Response(
     *          response=404,
     *          description="Resource Not Found"
     *      )
     * )
     */
    public function update(Note $note, Request $request) {
        $validatedData = $request->validate([
            'title' => 'required|string',
            'content' => 'required|string'
        ]);
        $note->update($validatedData);

        return response()->json($note, 202);
    }

    /**
     * @OA\Delete(
     *      path="/api/notes/{id}/delete",
     *      tags={"Notes"},
     *      summary="Delete existing notes from DataBase",
     *      @OA\Parameter(
     *          name="id",
     *          description="Note id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=204,
     *          description="Successful operation",
     *          @OA\JsonContent()
     *       ),
     *      @OA\Response(
     *          response=404,
     *          description="Resource Not Found"
     *      )
     * )
     */
    public function destroy(Note $note) {
        $note->delete();

        return response()->json(null, 204);
    }

    public function showAll() {
        $notes = Note::all();
        return view('notes.index', compact('notes'));
    }
    public function showOne($id) {
        $note = Note::findOrFail($id);
        return view('notes.show', ['note' => $note]);
    }
    public function addNewNote() {
        return view('notes.add');
    }
}
