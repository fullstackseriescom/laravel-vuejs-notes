<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Note;

class NotesController extends Controller
{
    public function index() {
      $user = \JWTAuth::parseToken()->authenticate();
      $notes = $user->notes()->get();
      return response()->json(['data' => $notes]);
    }

    public function store(Request $request) {
      $this->validate($request, [
        'note' => 'required',
      ]);

      $user = \JWTAuth::parseToken()->authenticate();

      // $note = $user->notes()->save(new Note([
      //   'note' => $request->note
      // ]));
      $note = Note::create([
        'note' => $request->note,
        'user_id' => $user->id
      ]);
      return response()->json(['data' => $note, 'msg' => 'Note created correctly!']);
    }

    public function destroy(Request $request, Note $note) {
      $note->delete();
      return response()->json(['msg' => 'Note deleted correctly!']);
    }
}
