@extends('layouts.app') @section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h2 class="card-title">Add District</h2>
        </div>
        <div class="card-body">


            <form
                method="POST"
                action="{{route('areas.store')}}">


                {!! csrf_field() !!} 
                <div class="form-group">
                    <label for="district">District Name</label>
                    <input type="text" name="district" class="form-control" id="district" placeholder="District Name">
                </div>

                <button type="submit" class="btn btn-primary float-right">Add District</button>

            </form>


        </div>
    </div>
</div>

@endsection