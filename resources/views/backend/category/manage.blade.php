@extends('backend.master')

@section('content')
    <div class="container">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Category List</h6>
            </div>
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> {{ session()->get('success') }}.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Name</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>{{ $category->name }}</td>
                                <td>
                                    @if ($category->status == 1)
                                        <span>Active</span>
                                    @else
                                        <span>Inactive</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ url('/category/edit/'.$category->id) }}" class="btn btn-sm btn-info">Edit</a>
                                    @if ($category->status == 1)
                                        <a href="{{ url('/category/active/'.$category->id) }}" class="btn btn-sm btn-primary">Active</a>
                                    @else
                                        <a href="{{ url('/category/inactive/'.$category->id) }}" class="btn btn-sm btn-warning">Inactive</a>
                                    @endif
                                    <a href="{{ url('/category/delete/'.$category->id) }}" onclick="return confirm('Are you sure delete this info ?')" class="btn btn-sm btn-danger">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
