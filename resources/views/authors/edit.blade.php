@extends('layout.app')
@section('content')
    <div class="container">
        <div class="alert alert-success d-none mt-2" role="alert">
            Author Updated!
        </div>
        <div class="alert alert-danger d-none mt-2" role="alert">
            Error! Can't Update Author
        </div>
        <form id="author_updater" name="author_updater">
            <div class="form-group">
                <label for="first_name">First name</label>
                <input type="text" class="form-control" id="first_name" value="{{ $author->first_name }}" name="first_name" required>
            </div>
            <div class="form-group">
                <label for="last_name">Last name</label>
                <input type="text" class="form-control" id="last_name" value="{{ $author->last_name }}" name="last_name" required>
            </div>
            <div class="form-group">
                <label for="father_land">Fatherland</label>
                <input type="text" class="form-control" id="father_land" value="{{ $author->father_land }}" name="father_land">
            </div>

            <input type="hidden" name="_method" value="PUT">

            <button type="submit" data-id="{{ $author->id }}" class="btn btn-success update-author">Update</button>
        </form>
    </div>
@endsection