@extends('layouts.main')

@section('content')
    <div class="card">
        <div class="d-flex justify-content-between align-items-center mb-2">
            <h5 class="card-title">Sub Category List</h5>
            <div>
                <a href="{{ route('subcategory.create') }}">
                    <button type="button" class="btn btn-primary btn-sm mt-1" id="addCategoryBtn"><i class="bi bi-plus-lg"></i>
                        Add Sub Category</button>
                </a>
            </div>
        </div>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if (session('danger'))
            <div class="alert alert-danger">
                {{ session('success') }}
            </div>
        @endif
        <div class="card-body pb-0">
            <div class="table-responsive mt-3">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="text-center">ID</th>
                            <th class="text-center">Category Name</th>
                            <th class="text-center">Sub Category Name</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($subcategorys as $index => $subcategory)
                            <tr class="">
                                <td class="text-center">{{ $index + 1 }}</td>
                                <td class="text-center">{{ $subcategory->category->category_name }}</td>
                                <td class="text-center">{{ $subcategory->subcategory_name }}</td>
                                <td class="text-center">
                                    <a href="{{ route('edit.subcategory', $subcategory->id) }}" class="btn btn-info btn-sm"><i
                                            class="bi bi-pencil-square"></i></a>
                                    <a href="{{ route('destroy.subcategory', $subcategory->id) }}" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Are you sure you want to delete this ?');"><i
                                            class="bi bi-trash3-fill"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            setTimeout(function() {
                $(".alert-success").fadeOut(1000);
            }, 1000);
        });
    </script>
@endpush
