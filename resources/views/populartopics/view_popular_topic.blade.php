@extends('layouts.main')
@section('content')
    <style>
        .search-container {
            position: relative;
            display: inline-block;
        }

        .search-container i {
            position: absolute;
            left: 10px;
            top: 50%;
            transform: translateY(-50%);
        }

        .search-container input {
            padding-left: 30px;
            /* Add padding to the left to make space for the icon */
        }
    </style>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <h5 class="card-title">Popular Topic List</h5>
                    <div>
                        <a href="{{ route('populartopic.create') }}">
                            <button type="button" class="btn btn-primary btn-sm mt-1" id="addCategoryBtn"><i
                                    class="bi bi-plus-lg"></i>
                                Add Popular Topic</button>
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
                        <table class="table datatable1">
                            <thead>
                                <tr>
                                    <th class="text-center">ID</th>
                                    <th class="text-center">Category Name</th>
                                    <th class="text-center">Sub Category Name</th>
                                    <th class="text-center">Popular Topic Name</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($populartopics as $index => $populartopic)
                                    <tr class="">
                                        <td class="text-center">{{ $index + 1 }}</td>
                                        <td class="text-center">{{ $populartopic->category->category_name }}</td>
                                        <td class="text-center">{{ $populartopic->subCategory->subcategory_name }}</td>
                                        <td class="text-center">{{ $populartopic->popular_topics_name }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('edit.populartopic', $populartopic->id) }}"
                                                class="btn btn-info btn-sm"><i class="bi bi-pencil-square"></i></a>
                                            <a href="{{ route('destroy.populartopic', $populartopic->id) }}"
                                                class="btn btn-danger btn-sm"
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
            <div class="card-body">
            </div>
        @endsection
        @push('scripts')
            <script>
                $(document).ready(function() {
                    let datatable = new simpleDatatables.DataTable($(".datatable1")[0])
                    setTimeout(function() {
                        $(".alert-success").fadeOut(1000);
                    }, 1000);
                    setTimeout(function() {
                        $(".alert-dager").fadeOut(1000);
                    }, 1000);
                    datatable.on('datatable.init', function() {
                        // Create a search container
                        let searchContainer = $('<div class="search-container"></div>');
                        let searchIcon = $('<i class="bi bi-search"></i>');
                        let searchInput = $(".datatable-input");

                        // Append the icon and the input to the search container
                        searchContainer.append(searchInput).append(searchIcon);

                        // Replace the original search input with the search container
                        $('.datatable-top').find('.datatable-search').html(searchContainer);
                    });
                });
            </script>
        @endpush
