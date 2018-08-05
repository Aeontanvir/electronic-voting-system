@extends('layouts.app') 
@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h2 class="card-title float-left">Voter Varification</h2>
        </div>
        <div class="card-body">
            <form
                method="POST"
                action="/ballots/voter">


                {!! csrf_field() !!} 
                
                <div class="form-group">
                    <label for="nid">National ID</label>
                    <input type="number" name="nid" class="form-control" id="nid" placeholder="NID" autocomplete="off" value="{{ old('nid') }}" required>
                </div>


                <button type="submit" class="btn btn-primary float-right">Find</button>

            </form>
        </div>
    </div>
</div>

@endsection