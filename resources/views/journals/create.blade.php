@extends('layout.app')
@section('content')
    <div class="container">
        <div class="alert alert-success d-none mt-2" role="alert">
            Journal Created!
        </div>
        <div class="alert alert-danger d-none mt-2" role="alert">
            Error! Can't Create Journal
        </div>
        <form id="journal_creator" name="journal_creator">
            <div class="form-group">
                <label for="journal-name">Name</label>
                <input type="text" class="form-control" id="journal-name" placeholder="Enter Name" name="name" required>
            </div>
            <div class="form-group">
                <label for="journal-description">Description</label>
                <input type="text" class="form-control" id="journal-description" placeholder="Enter Description" name="description">
            </div>
            <div class="form-group">
                <label for="journal-date">Date</label>
                <input type="date" class="form-control" id="journal-date" name="created_date" required>
            </div>
            <div class="form-group">
                <label for="journal-author">Author</label>
                <select multiple class="form-control" id="journal-author" name="author[]" required>
                    @foreach($authors as $author)
                        <option value="{{ $author->id }}">{{ $author->first_name }} {{ $author->last_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <input type="file" id="journal-image" name="image" required>
            </div>

            <button type="submit" class="btn btn-success create-journal">Create</button>
        </form>
    </div>
@endsection