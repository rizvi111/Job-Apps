@extends('layouts.main')

@section('content')
    <hr>
    <div class="site-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <form action="{{route('alljobs')}}" method="get">
                        <div class="form-inline">
                            <div class="form-group">
                                <input placeholder="Keyword" type="text" name="title" class="form-control">
                            </div>&nbsp;&nbsp;&nbsp;
                            <div class="form-group">
                                <select name="type" class="form-control">
                                    <option>Select Type</option>
                                    <option value="fulltime">Full time</option>
                                    <option value="parttime">Part time</option>
                                    <option value="casual">Casual</option>
                                </select>
                            </div>&nbsp;&nbsp;&nbsp;
                            <div class="form-group">
                                <select name="category_id" class="form-control">
                                    <option>Select Category</option>
                                    @foreach(App\Category::all() as $cat)
                                        <option value="{{$cat->id}}">{{$cat->name}}</option>
                                    @endforeach
                                </select>
                            </div>&nbsp;&nbsp;&nbsp;
                            <div class="form-group">
                                <input placeholder="Address" type="text" name="address" class="form-control">
                            </div>&nbsp;&nbsp;&nbsp;
                            <div class="form-group">
                                <button class="btn btn-warning">Search</button>
                            </div>
                        </div>
                    </form>
                </div>
                <table class="table">
                    <thead>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    </thead>
                    <tbody>
                    @foreach($jobs as $job)
                        <tr>
                            <td>
                                <img width="80" src="{{asset('avatar/apple.png')}}">
                            </td>
                            <td>
                                Position: {{$job->position}}<br>
                                Job Type: <i class="fa fa-clock"></i>&nbsp;{{$job->type}}

                            </td>
                            <td>
                                <i class="fa fa-map-marker"></i>&nbsp;Address: {{$job->address}}
                            </td>
                            <td>
                                <i class="fa fa-calendar-check"></i>&nbsp;Date: {{$job->created_at->diffForHumans()}}
                            </td>
                            <td>
                                <a href="{{route('jobs.show',[$job->id,$job->slug])}}">
                                    <button class="btn btn-success btn-sm">Apply</button>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="pagination justify-content-center">
                {{$jobs->links()}}
            </div>

        </div>
    </div>

@endsection
