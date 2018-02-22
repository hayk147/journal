@extends('layout.app')
@section('content')
    <div class="container">
        <div class="alert alert-success d-none mt-2" role="alert">
            Author Created!
        </div>
        <div class="alert alert-danger d-none mt-2" role="alert">
            Error! Can't Create Author
        </div>
        <form id="author_creator" name="author_creator">
            <div class="form-group">
                <label for="first_name">First name</label>
                <input type="text" class="form-control" id="first_name" placeholder="Enter First name" name="first_name" required>
            </div>
            <div class="form-group">
                <label for="last_name">Last name</label>
                <input type="text" class="form-control" id="last_name" placeholder="Enter Last name" name="last_name" required>
            </div>
            <div class="form-group">
                <label for="father_land">Fatherland</label>
                <input type="text" class="form-control" id="father_land" placeholder="Enter Fatherland" name="father_land">
            </div>

            <button type="submit" class="btn btn-success create-author">Create</button>
        </form>
    </div>
@endsection