@extends('layouts.app')

@section('title', 'Tokens Table')

@section('content')
    <div class="card">
        <div class="card-header">
            Tokens

            <a href="/" class="float-right btn btn-sm btn-danger">X</a>
        </div>
        <div class="card-body">
            <table class="table table-sm table-bordered">
                <tr>
                    <th>Token</th>
                    <th>Tipo</th>
                </tr>

                @foreach ($tokens as $token)
                    <tr>
                        <td>{{ $token['value'] }}</td>
                        <td>{{ $token['type'] }}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection
