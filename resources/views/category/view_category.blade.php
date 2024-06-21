@extends('layouts.main')
@section('content')
<<<<<<< HEAD
    <div class="col-lg-12">

        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">Category</h5>
                    <a href="{{ route('category.create') }}"><button type="button" class="button-color"><i class="bi bi-plus-lg me-1"></i>Add Category</button></a>
                </div>

                <table class="table datatable">
                    <thead>
                        <tr>
                            <th>
                                <b>N</b>ame
                            </th>
                            <th>Ext.</th>
                            <th>City</th>
                            <th data-type="date" data-format="YYYY/DD/MM">Start Date</th>
                            <th>Completion</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Unity Pugh</td>
                            <td>9958</td>
                            <td>Curicó</td>
                            <td>2005/02/11</td>
                            <td>37%</td>
                            <td>
                                <a href="http://" class="btn btn-info btn-sm">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <a href="http://" class="btn btn-danger btn-sm">
                                    <i class="bi bi-trash"></i>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>Unity Pugh</td>
                            <td>9958</td>
                            <td>Curicó</td>
                            <td>2005/02/11</td>
                            <td>37%</td>
                            <td>
                                <a href="http://" class="btn btn-info btn-sm">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <a href="http://" class="btn btn-danger btn-sm">
                                    <i class="bi bi-trash"></i>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>


            </div>
        </div>

=======
    <div class="card">
        <div class="d-flex justify-content-between align-items-center mb-2">
            <h5 class="card-title">Category List</h5>
            <div>
                <a href="{{ route('category.create') }}">
                    <button type="button" class="btn btn-primary btn-sm mt-1" id="addCategoryBtn"><i class="bi bi-plus-lg"></i>
                        Add Category</button>
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
                            <th class="text-center">Name</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categorys as $index => $category)
                            <tr class="">
                                <td class="text-center">{{ $index + 1 }}</td>
                                <td class="text-center">{{ $category->category_name }}</td>
                                <td class="text-center">
                                    <a href="{{ route('edit.category', $category->id) }}" class="btn btn-info btn-sm"><i
                                            class="bi bi-pencil-square"></i></a>
                                    <a href="{{ route('destroy.category', $category->id) }}" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Are you sure you want to delete this ?');"><i
                                            class="bi bi-trash3-fill"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
>>>>>>> f46be3286872edf01b97b5d2b7603607a41babb0
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
