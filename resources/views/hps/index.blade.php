@extends('layouts.app')
@section('content')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">
    <div class="col-lg-12 mt-3">
        <h2>Data HP</h2>
        <a class="btn btn-success mt-3 mb-3" href="{{ route('hp.create') }}">Buat Data HP</a>
    </div>
</div>

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>Merk</th>
        <th>Type</th>
        <th>Warna</th>
        <th>Harga</th>
        <th width="280px">Action</th>
    </tr>

    @foreach ($hps as $hp)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $hp->merk }}</td>
        <td>{{ $hp->type }}</td>
        <td>{{ $hp->warna }}</td>
        <td>{{ $hp->harga }}</td>
        <td>
            <form action="{{ route('hp.destroy',$hp->id) }}" method="POST">
                @csrf
                <a class="btn btn-info" href="{{ route('hp.show',$hp->id) }}">Show</a>
                <a class="btn btn-primary" href="{{ route('hp.edit',$hp->id) }}">Edit</a>
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@endsection