@extends('layout.app')
@section('content')
    <div class="container">
        <div class="alert alert-danger d-none mt-2" role="alert">
            Error! Can't Delete Journal
        </div>
        <div class=" col-2 mt-2 mb-2">
            <a href="{{ url('authors/create') }}" class="btn btn-success">ADD</a>
        </div>
       <table id="authors-table" class="table table-bordered table-hover">
           <thead>
                <tr>
                    <th>First name</th>
                    <th>Last name</th>
                    <th>Fatherland</th>
                    <th>Actions</th>
                </tr>
           </thead>
           <tbody>
                @foreach($authors as $author)
                    <tr>
                        <td>{{ $author->first_name }}</td>
                        <td>{{ $author->last_name }}</td>
                        <td>{{ $author->father_land }}</td>
                        <td>
                            <div class="row">
                                <div class="col-8"><a class="btn btn-info" href="{{ url('authors/'.$author->id) }}">Show</a></div>
                                <div class="col-4"><button class="btn btn-danger delete-author" data-id="{{ $author->id }}" data-toggle="modal" data-target=".bd-example-modal-sm">Delete</button></div>
                            </div>
                        </td>
                    </tr>
                @endforeach
           </tbody>
       </table>
    </div>

    <div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Deleting</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure to delete journal?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger delete-author-sure" data-dismiss="modal" data-id="">Delete</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection