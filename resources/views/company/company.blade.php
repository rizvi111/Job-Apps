@extends('layouts.main')
@section('content')
    <hr>
    <div class="site-section bg-light">
        <div class="container">
            <div class="row">
                @foreach($companies as $company)
                <div class="col-md-3">
                <div class="card" style="width: 18rem;">
                    @if(empty(Auth::user()->company->logo))
                        <img class="card-img-top" style="width: 100%" src="{{asset('avatar/apple.png')}}" width="100" height="200">
                    @else
                        <img class="card-img-top" src="{{asset('uploads/avatar')}}/{{Auth::user()->company->logo}}" width="100" height="200">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{$company->cname}}</h5>
                        <p class="card-text">{{str_limit($company->description,20)}}</p>
                        <a href="{{route('company.index',[$company->id,$company->slug])}}" class="btn btn-primary">Visit Company</a>
                    </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection