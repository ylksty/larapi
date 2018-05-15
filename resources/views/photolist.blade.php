@extends('layouts.help')

@section('content')
    <p>photo.list</p>
    <ul>
        <li><a href="/photos">/photos</a></li>
        <li><a href="/photos/create">/photos/create</a></li>
        <li>
            POST: /photos
            <form action="/photos" method="POST">
                @csrf
                <input name="username" value="joe">
                <button type="submit">submit</button>
            </form>
        </li>
        <li>
            <a href="/photos/22">/photos/22</a>
        </li>
        <li>
            <a href="/photos/22/edit">/photos/22/edit</a>
        </li>
        <li>
            PUT/PATCH: /photos/22
            <form action="/photos/22" method="POST">
                @csrf
                @method('PUT')
                <input name="username" value="joe">
                <button type="submit">submit</button>
            </form>
        </li>
        <li>
            DELETE: /photos/22
            <form action="/photos/22" method="POST">
                @csrf
                @method('DELETE')
                <input name="username" value="joe">
                <button type="submit">submit</button>
            </form>
        </li>
    </ul>
@endsection