@extends('layouts.dashboard.app')

@section('content')
    <h2>Players</h2>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.players.index')}}">Players</a></li>
            <li class="breadcrumb-item active">Edit</li>
        </ol>
    </nav>
    <div class="tile mb-4">
        <form method="POST" action="{{ route('admin.player.update', $player->id)}}" enctype="multipart/form-data">
            @csrf

            @include('dashboard.partials._errors')
            <div class="form-group">
                <label for="gender">Gender</label>
                <select name="gender" class="form-control">
                    <option value="choose">kies optie...</option>
                    <option value="Male"{{$player->gender=='Male'?'selected':''}}>Heer</option>
                    <option value="Female"{{$player->gender=='Female'?'selected':''}}>Mevrouw</option>
                </select>
            </div>
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $player->name)}}">
            </div>
            <div class="form-group">
                <label>Handicap</label>
                <input type="double" name="handicap" class="form-control" value="{{ old('name', $player->handicap)}}">
            </div>
            
            <div class="form-group">
                <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i>Edit</button>
            </div>
        </form>
    </div> <!-- end of tile -->
@endsection