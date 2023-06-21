
@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <form action="{{route('locations.create')}}" method="get">
                <input name="name">


                <button type="submit" class="btn btn-primary">Add New Location</button>
            </form>
        </div>
    </div>

