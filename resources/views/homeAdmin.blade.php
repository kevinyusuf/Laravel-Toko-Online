@extends('layouts.headerAdmin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body text-center">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                   <div class="card-title">{{ __('You are logged in!') }}</div> 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
