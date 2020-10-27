@extends('layouts.dashboard.app')

@section('content')

    <div>
        <h2>Groups</h2>
    </div>

    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
        <li class="breadcrumb-item active">Groups</li>
        {{--<li class="breadcrumb-item active">Data</li>--}}
    </ul>

    <div class="row">

        <div class="col-md-12">

            <div class="tile mb-4">

                <div class="row">

                    <div class="col-12">

                        

                    </div><!-- end of col 12 -->

                </div><!-- end of row -->
        
                <div class="row">
                    <div class="col-md-12">

                        @if ($players->count() > 0)
                        <form action="{{ route('admin.flights.store')}}" method="post">
                        @csrf
                            <table class="table table-hover">

                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Gender</th>
                                    <th>Name</th>
                                    <th>Handicap</th>
                                    <th>Select</th>
                                </tr>
                                </thead>

                                <tbody>
                                                    @foreach ($players as $index=>$player)
                                                        <tr>
                                                            <td>{{ $index+1 }}</td>

                                                            <td>{{ $player->gender }}</td>
                                                            <td>{{ $player->name }}</td>
                                                            <td>{{ $player->handicap }}</td>

                                                            <td>

                                                                <input type="checkbox" name="Player[]" value="{{$player->id}}">
    
                                                            </td>
                                                        </tr>
                                                    @endforeach


                                                    </tbody>


                                                </table>
                                                {{ $players->links() }}


                                                
                                            @else
                                                <h3 style="font-weight: 400;">Sorry no records found</h3>
                                            @endif
                                        </div>
                                    </div>
                                </div><!-- end of tile -->
                                <!-- <div class="form-group">
                                        <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i>Add</button>
                                </div> -->
                                <div class="tile mb-4">
                                    <div class="form-group">
                                        <label for="NumberOfGroups">How many groups would you like to form?</label>
                                        <input type="number" name="NumberOfGroups" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="MinimumNumber">What is the minimum number of players per group?</label>
                                        <input type="number" name="MinimumNumber" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="MaximumNumber">What is the maximum number of players per group?</label>
                                        <input type="number" name="MaximumNumber" class="form-control">
                                    </div>
                                </div>

                                <div class="tile mb-4">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i>Add</button>
                                    </div>
                                </div>
                    </form>

        </div><!-- end of col -->

    </div><!-- end of row -->




@endsection