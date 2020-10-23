@extends('layouts.dashboard.app')

@section('content')
    <h2>Players</h2>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.players.index')}}">Players</a></li>
            <li class="breadcrumb-item active">Add</li>
        </ol>
    </nav>
    <div class="tile mb-4">
        <form method="POST" action="{{ route('admin.player.store')}}" enctype="multipart/form-data">
            @csrf
            @include('dashboard.partials._errors')

            <div class="form-group">
                <label for="gender">Gender</label>
                <select name="gender" class="form-control">
                    <option value="choose">kies optie...</option>
                    <option value="Male">Heer</option>
                    <option value="Female">Mevrouw</option>
                </select>
            </div>
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" class="form-control" value="{{ old('name')}}">
            </div>
            <div class="form-group">
                <label>Handicap</label>
                <input type="double" name="handicap" class="form-control" value="{{ old('handicap')}}">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i>Add</button>
            </div>
        </form>
    </div> <!-- end of tile -->
@endsection