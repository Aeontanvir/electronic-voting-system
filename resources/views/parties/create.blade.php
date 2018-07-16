@extends('layouts.app') @section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h2 class="card-title float-left">Party Registration</h2>
        </div>
        <div class="card-body">


            <form
                method="POST"
                action="{{route('parties.store')}}"
                enctype="multipart/form-data">


                {!! csrf_field() !!} 
                <div class="form-group">
                    <label for="title">Party Title</label>
                    <input type="text" name="title" class="form-control" id="title" placeholder="Party Title">
                </div>

                <div class="form-group">
                    <label for="short">Short Title</label>
                    <input type="text" name="short" class="form-control" id="short" placeholder="Short Title">
                </div>

                <div class="form-group">
                    <label for="description">Short Description</label>
                    <textarea type="text" name="description" class="form-control" id="short"></textarea>
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