@extends('layouts.app')

@section('title', 'Archivo')

@section('content')
    <div class="card">
        <div class="card-header">
            Compilador
        </div>
        <div class="card-body">
            <form action="{{ route('analizador_lexico') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="fileData">Analizar arcivo</label>
                    <input type="file" class="form-control-file" name="fileData" class="form-control">
                    {!! $errors->first('fileData', '<p class="text-danger">:message</p>') !!}
                  </div>
                <button type="submit" class="btn btn-primary">Analizar</button>
            </form>
        </div>
    </div>
@endsection
