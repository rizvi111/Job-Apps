@extends('layouts.main')

@section('content')
    <div class="site-section bg-light">
        <div class="container">
            <div class="row" id="app">

                <div class="col-md-12 col-lg-8 mb-5">
                    @if(Session::has('message'))
                        <div class="alert alert-success">
                            {{Session::get('message')}}
                        </div>
                    @endif

                    <div class="p-5 bg-white">

                        <div class="mb-4 mb-md-5 mr-5">
                            <div class="job-post-item-header d-flex align-items-center">
                                <h2 class="mr-3 text-black h4">{{$job->position}}</h2>
                                <div class="badge-wrap">
                                    <span class="border border-warning text-warning py-2 px-4 rounded">{{$job->type}}</span>
                                </div>
                            </div>
                            <div class="job-post-item-body d-block d-md-flex">
                                <div class="mr-3"><span class="fl-bigmug-line-portfolio23"></span>
                                    <a href="#">{{$job->address}}</a></div>

                            </div>
                        </div>



                        <div class="img-border mb-5">
                            <a>
                                <img src="{{asset('partial/images/hero_2.jpg')}}" alt="Image" class="img-fluid rounded">
                            </a>
                        </div>

                        <p>
                            <h2>
                                Description
                                <a href="" data-toggle="modal" data-target="#exampleModal1">
                                    <i style="font-size: 40px;float: right;color: red" class="fa fa-envelope-square"></i>
                                </a>
                            </h2>
                            {{$job->description}}
                        </p>
                        <p class="mt-5">
                            <a href="#" class="btn btn-primary  py-2 px-4">Apply Job</a></p>
                    </div>
                </div>

                <div class="col-lg-4">


                    <div class="p-4 mb-3 bg-white">
                        <h3 class="h5 text-black mb-3">Company Details</h3>
                        <p>Company: <a href="{{route('company.index',[$job->company->id,$job->company->slug])}}">
                                {{$job->company->cname}}
                            </a></p>
                        <p>Address: {{$job->address}}</p>
                        <p>Position: {{$job->position}}</p>
                        <p>Type: {{$job->type}}</p>
                        <p>Last Date: {{$job->last_date}}</p>
                        <p><a href="{{route('company.index',[$job->company->id,$job->company->slug])}}" class="btn btn-primary  py-2 px-4">Visit Company</a></p>
                    </div>
                    @if(Auth::check()&&Auth::user()->user_type=='seeker')
                        @if(!$job->checkApplication())
                            <apply-component :jobid={{$job->id}}></apply-component>
                        @endif<br>
                        <favorites-component :jobid={{$job->id}} :faborited={{$job->checkSaved() ? 'true':'false'}}></favorites-component>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Send Job To Your Mitro</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('mail')}}" method="post">@csrf
                <div class="modal-body">
                    <input type="hidden" name="job_id" value="{{$job->id}}">
                    <input type="hidden" name="job_slug" value="{{$job->slug}}">
                    <div class="form-group">
                        <label>Your Name</label>
                        <input type="text" name="your_name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Your Email</label>
                        <input type="text" name="your_email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Friend Name</label>
                        <input type="text" name="friend_name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Friend Email</label>
                        <input type="text" name="friend_email" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Send Job</button>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection
