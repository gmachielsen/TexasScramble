@extends('layouts.dashboard.app')

@section('content')

    <div>
        <h2>Players</h2>
    </div>

    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
        <li class="breadcrumb-item active">Players</li>
        {{--<li class="breadcrumb-item active">Data</li>--}}
    </ul>

    <div class="row">

        <div class="col-md-12">

            <div class="tile mb-4">

                <div class="row">

                    <div class="col-12">

                        <form action="">
                            <div class="row">

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <!-- <input type="text" name="search" autofocus class="form-control" placeholder="search" value="{{ request()->search }}"> -->
                                    </div>
                                </div><!-- end of col -->

                                <div class="col-md-4">
                                    <!-- <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Search</button> -->
                                    
                                        <a href="{{ route('admin.groups.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i> Add</a>

                                </div>
                            </div><!-- end of row -->

                        </form><!-- end of form -->

                    </div><!-- end of col 12 -->

                </div><!-- end of row -->
        
                <div class="row">
                    <div class="col-md-12">

                    </div>
                </div>
            </div><!-- end of tile -->

        </div><!-- end of col -->

    </div><!-- end of row -->




@endsection