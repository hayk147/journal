@extends('layout.app')
@section('content')
    <div class="container">
        <div class="w-50 ">
            <div class="row">
                <div class="col-6">First Name</div>
                <div class="col-6">{{ $author->first_name }}</div>
            </div>
            <div class="row">
                <div class="col-6">Last Name</div>
                <div class="col-6">{{ $author->last_name }}</div>

            </div>
            <div class="row">
                <div class="col-6">Fatherland</div>
                <div class="col-6">{{ $author->father_land }}</div>
            </div>
            <div class="row">
                <div class="col-6">Journals</div>
                <div class="col-6">
                    @foreach($author->journals as $journal)
                        <div><span>Name: </span><span> {{ $journal->name }}</span></div>
                        <div><span>Created Date: </span><span> {{ $journal->created_date }}</span></div>
                    @endforeach
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <a class="btn btn-info" href="{{ url('authors/'. $author->id .'/edit') }}">Edit</a>
                </div>
            </div>
        </div>
    </div>
@endsection