@extends('layouts.admin')

@section('title', 'Index')

@section('content')

<div class="container">
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Titolo</th>
                <th scope="col">Slug</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
            <tr>
                <th scope="row">{{ $post->id }}</th>
                <th scope="row">{{ $post->title }}</th>
                <td>{{ $post->slug }}</td>
                <td>
                    <a class="btn btn-primary" href="{{ route('admin.posts.edit', $post->id) }}">Edit</a>
                </td>
                <td>
                    <button class="btn btn-danger delete-button" data-id="{{ $post->id }}">Delete</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $posts->links() }}
</div>
<div id="background" class="d-none"></div>
<div id="alert-window" class="d-flex flex-column justify-content-evenly d-none">
    <h1 class="text-blue text-center">Confermi l'eliminazione?</h1>
    <div class="w-75 mx-auto d-flex justify-content-around">
        <form id="confirmation-form" method="POST" data-base="{{ route('admin.posts.index') }}">
            @csrf
            @method('DELETE')
            <button id="confirm-button" class="btn btn-outline-danger">Conferma</button>
        </form>
        <button id="cancel-button" class="btn btn-outline-secondary">Annulla</button>
    </div>
</div>
    
@endsection