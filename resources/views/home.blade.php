@extends('layouts.app')

@section('content')
<div id="content">
    <div class="inner">
        <div class="row">
            <div class="col-lg-12">
                <h2> Dashboard </h2>
            </div>
        </div>

        <hr />
        <div class="row">
            <div class="col-lg-12">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                You are logged in!
            </div>
        </div>
    </div>
</div>
@endsection
