@extends('backend.master')

@section('content')
<div class="container">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> {{ session()->get('success') }}.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">Update Category</div>
                    <div class="card-body">
                        <form action="{{ url('/category/update/'.$category->id) }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" value="{{ $category->name }}" class="form-control" placeholder="Enter category name" />
                            </div>
                            <div class="form-group">
                                <label>Publication Status</label>
                                <select class="form-control" name="status">
                                    <option selected disabled> ------ Select A Status ------- </option>
                                    <option value="1" {{ $category->status == 1 ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ $category->status == 0 ? 'selected' : '' }}>InActive</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-block btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
</div>
@endsection
