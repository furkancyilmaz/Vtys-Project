@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <br />
            <h3>Edit Helmet Record</h3>
            <br />
            @if(count($errors) > 0)

                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                    @endif
                    <form method="post" action="{{action('HelmetController@update', $id)}}">
                        {{csrf_field()}}
                        <input type="hidden" name="_method" value="PATCH" />
                        <div class="form-group">
                            <input type="text" name="brand" class="form-control" value="{{$helmet->brand}}" placeholder="Enter Brand" />
                        </div>
                        <div class="form-group">
                            <input type="text" name="model" class="form-control" value="{{$helmet->model}}" placeholder="Enter Model" />
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Edit" />
                        </div>
                    </form>
                </div>
        </div>
    </div>
@endsection
