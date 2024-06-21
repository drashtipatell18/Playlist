@extends('layouts.main')

@section('content')
    <div class="card">
        <div class="d-flex justify-content-between align-items-center mb-2">
            <h5 class="card-title">Category List</h5>
            <div>
                <a href="{{ route('category.create') }}">
                    <button type="button" class="btn btn-primary btn-sm mt-1" id="addCategoryBtn"><i class="bi bi-plus-lg"></i> Add Category</button>
                </a>
            </div>
        </div>
        
        <div class="card-body pb-0">

            <table class="table table-borderless">
                <thead>
                    <tr>
                        <th class="text-center">ID</th>
                        <th class="text-center">Name</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>

        </div>
    </div>
@endsection
