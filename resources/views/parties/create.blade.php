@extends('layouts.app') @section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            Party Registration
        </div>
        <div class="card-body">


            <form
                method="POST"
                action="{{route('parties.store')}}"
                enctype="multipart/form-data">


                {!! csrf_field() !!} 

                @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.
                    <br>
                    <br>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
                @endif

                <div class="form-group">
                    <label for="title">Party Title</label>
                    <input type="text" name="title" class="form-control" id="title" placeholder="Party Title">
                </div>

                <div class="form-group">
                    <label for="party_symbol">Party Symbol</label>
                    <input type="file" name="image" id="party_symbol" class="form-control">
                </div>

                <button type="submit" class="btn btn-primary float-right">Register</button>

            </form>


        </div>
    </div>
</div>

@endsection