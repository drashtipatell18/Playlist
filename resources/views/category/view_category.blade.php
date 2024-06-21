@extends('layouts.main')
@section('content')
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

    </div>
@endsection
