<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CompilerController extends Controller
{
    private $token_types;

    public function __construct()
    {
        // tipos de token
        $this->token_types = [
            1 => [ 'name' => "Numero",      'regex' => '/^[0-9]+([,|.][0-9]+)?$/' ],
            2 => [ 'name' => "Variable",    'regex' => '/^[A-Z]+$/' ],
            3 => [ 'name' => "Operador",    'regex' => '/^[+|\-|*|=|\/]$/'] ,
            4 => [ 'name' => "Parentesis",  'regex' => '/^[\(|\)]$/'] ,
            5 => [ 'name' => "Corchete",    'regex' => '/^[\[|\])]$/'] ,
            6 => [ 'name' => "Llave",       'regex' => '/^[\{|\})]$/'] ,
        ];
    }

    public function analizador_lexico(Request $request)
    {
        //validar que el archivo sea txt
        $request->validate([ 'fileData' => 'required|file|mimetypes:text/plain', ]);

        //obtener contenido de archivo
        $content = file_get_contents($request->file('fileData')->getRealPath());

        //crear array de tokens
        $tokens = explode(" ", $content);

        $table = [];

        //separar tokens por tipos
        foreach ($tokens as $key => $token) {
            foreach ($this->token_types as $key => $type) {
                //revisar el tipo de token que es
                if (preg_match($type['regex'], $token)) {
                    array_push ( $table , ['value' => $token, 'type' => $type['name']] );
                }
            }
        }

        //dd( $table );
        return view('compiler.token-table')->with('tokens', $table);
    }
}
