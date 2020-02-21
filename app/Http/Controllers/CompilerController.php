<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CompilerController extends Controller
{
    public function analizador_lexico(Request $request)
    {
        $request->validate([ 'fileData' => 'required|file|mimetypes:text/plain', ]);

        $content = file_get_contents($request->file('fileData')->getRealPath());
        $tokens = explode(" ", $content);

        dd( $tokens );


      return back()->with('message', 'Your file is submitted Successfully');
    }
}
