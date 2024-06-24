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
            padding-left: 30px; /* Add padding to the left to make space for the icon */
        }
    </style>
    <div class="col-lg-12">

        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">Subscription Sell List</h5>
                    <a href="{{ route('subscriptionsell.create') }}"><button type="button" class="button-color"><i
                                class="bi bi-plus-lg me-1"></i>Add Subscription Sell</button></a>
                </div>
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                @if (session('danger'))
                    <div class="alert alert-danger">
                        {{ session('danger') }}
                    </div>
                @endif
                <table class="table datatable1">
                    <thead>
                        <tr>
                            <th class="text-center">ID</th>
                            <th class="text-center">Subscription Name</th>
                            <th class="text-center">User Name</th>
                            <th class="text-center">Group Name</th>
                            <th class="text-center">Video Name</th>
                            <th class="text-center">Validity</th>
                            <th class="text-center">Price</th>
                            <th class="text-center">Payment ID</th>
                            <th class="text-center">Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($subscriptionsells as $index => $subscriptionsell)
                            <tr class="">
                                <td class="text-center">{{ $index + 1 }}</td>
                                <td class="text-center">{{ $subscriptionsell->subscription->plan_name }}</td>
                                <td class="text-center">{{ $subscriptionsell->user->name }}</td>
                                <td class="text-center">{{ $subscriptionsell->videoGroup->group_name }}</td>
                                <td class="text-center">{{ $subscriptionsell->video->video_course_name }}</td>
                                <td class="text-center">{{ $subscriptionsell->validity }}</td>
                                <td class="text-center">{{ $subscriptionsell->price }}</td>
                                <td class="text-center">{{ $subscriptionsell->payment_id }}</td>
                                <td class="text-center">
                                    <a href="{{ route('edit.subscriptionsell', $subscriptionsell->id) }}" class="btn btn-info btn-sm"><i
                                            class="bi bi-pencil-square"></i></a>
                                    <a href="{{ route('destroy.subscriptionsell', $subscriptionsell->id) }}" class="btn btn-danger btn-sm"
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
