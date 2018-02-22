@extends('layout.app')
@section('content')
    <div class="container">
        <div class="alert alert-success d-none mt-2" role="alert">
            Journal Updated!
        </div>
        <div class="alert alert-danger d-none mt-2" role="alert">
            Error! Can't Update Journal
        </div>
        <div class="text-center mt-2">
            <img width="100px" height="100px" class="journal-image" src="{{ asset('images/'.$journal->image) }}" alt="">
        </div>
        <form id="journal_updater" name="journal_updater">
            <div class="form-group">
                <label for="journal-name">Name</label>
                <input type="text" class="form-control" id="journal-name" placeholder="Enter Name" value="{{ $journal->name }}" name="name" required>
            </div>
            <div class="form-group">
                <label for="journal-description">Description</label>
                <input type="text" class="form-control" id="journal-description" placeholder="Enter Description" value="{{ $journal->description }}" name="description">
            </div>
            <div class="form-group">
                <label for="journal-date">Date</label>
                <input type="date" class="form-control" id="journal-date" value="{{ $journal->created_date }}" name="created_date" required>
            </div>
            <div class="form-group">
                <label for="journal-author">Author</label>
                <select multiple class="form-control" id="journal-author" name="author[]" required>
                    @foreach($authors as $author)
                        <option value="{{ $author->id }}" {{ (in_array($author->id, $journal_authors) ? "selected='selected'" : '') }}>{{ $author->first_name }} {{ $author->last_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <input type="file" id="journal-image" name="image">
            </div>

            <input type="hidden" name="_method" value="PUT">
            <button type="submit" data-id="{{ $journal->id }}" class="btn btn-success update-journal">Update</button>
        </form>
    </div>
@endsection