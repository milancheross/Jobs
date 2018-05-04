@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Create Job</div>

                    <div class="panel-body">
                        @if(
                         \Illuminate\Support\Facades\Auth::user()->is_moderator==1
                         )

                            {!! $datatable->show(); !!}
                        @else
                            <h3>You don't have permission!</h3>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
