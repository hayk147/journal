@extends('layout.app')
@section('content')
    <div class="container">
        <div class="image" style="background-image: url(../../../images/{{ $journal->image }})"></div>
        <div class="w-50">
            <div class="row">
                <div class="col-6">Name</div>
                <div class="col-6">{{ $journal->name }}</div>
            </div>
            <div class="row">
                <div class="col-6">Authors</div>
                <div class="col-6">
                    @foreach($journal->authors as $author)
                        <div>
                            <span> {{ $author->first_name }} {{ $author->last_name }} {{ ($author->father_land ? $author->father_land : '') }} </span>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="row">
                <div class="col-6">Description</div>
                <div class="col-6">{{ $journal->description }}</div>

            </div>
            <div class="row">
                <div class="col-6">Created Date</div>
                <div class="col-6">{{ $journal->created_date }}</div>
            </div>
            <div class="row">
                <div class="col-6">
                    <a class="btn btn-info" href="{{ url('journals/'. $journal->id .'/edit') }}">Edit</a>
                </div>
            </div>
        </div>
    </div>
@endsection