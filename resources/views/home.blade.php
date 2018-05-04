@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Jobs</div>

                    <div class="panel-body">

                        @foreach($jobs as $job)
                            <div class="job">
                                <p>{{$job->created_at->toDayDateTimeString()}}</p>
                                <h3>{{ $job->title }}</h3>
                                <p>{{ $job->email }}</p>
                                <p>{{ $job->description }}</p><hr>
                            </div>
                        @endforeach


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
