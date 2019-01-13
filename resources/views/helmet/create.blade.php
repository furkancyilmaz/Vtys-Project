@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <br />
            <h3 aling="center">Add Helmet</h3>
            <br />
            @if(count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if(\Session::has('success'))
                <div class="alert alert-success">
                    <p>{{ \Session::get('success') }}</p>
                </div>
            @endif

            <form method="post" action="{{url('helmet')}}">
                {{csrf_field()}}
                <div class="form-group">
                    <input type="text" name="brand" class="form-control" placeholder="Brand" />
                </div>
                <div class="form-group">
                    <input type="text" name="model" class="form-control" placeholder="Model" />
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" />
                </div>
            </form>
        </div>
    </div>
@endsection
