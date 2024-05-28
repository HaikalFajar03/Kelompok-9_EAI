@extends('layouts.kalogakbisa')

@section('content')
<head>
    <link id="" href="/assets/css/custom.css" rel="stylesheet" />
</head>
<body>
    <div class="container-fluid py-4 px-5">
        <div class="row">
            <div class="col-12">
                <div class="card border shadow-xs mb-4">
                    <div class="card-header border-bottom pb-0">
                        <div class="d-sm-flex align-items-center">
                            <div>
                                <h6 class="font-weight-semibold text-lg mb-0">Wilayah Terkait</h6>
                                <p class="text-sm">Ringkasan persebaran data penduduk di aplikasi Get-in berdasarkan pengelompokkan kelurahan</p>
                            </div>

                        </div>
                    </div>
                    <div class="card-body px-0 py-0">
                        <button class="accordion" style="margin: 15px;">Toggle Table</button>
                        <div class="panel">
                            <div class="ms-auto d-flex">
                                <button onclick="filterRows('all')" class="btn btn-sm btn-dark me-2">All</button>
                                <button onclick="filterRows('men')" class="btn btn-sm btn-dark me-2">Men</button>
                                <button onclick="filterRows('women')" class="btn btn-sm btn-dark me-2">Women</button>
                                {{-- <button onclick="sortTable('asc')">Sort by Age Ascending</button>
                                <button onclick="sortTable('desc')">Sort by Age Descending</button> --}}
                            </div>

                            <table id="genderTable">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Gender</th>
                                        <th>Age</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>John Doe</td>
                                        <td>men</td>
                                        <td>28</td>
                                    </tr>
                                    <tr>
                                        <td>Jane Smith</td>
                                        <td>women</td>
                                        <td>32</td>
                                    </tr>
                                    <tr>
                                        <td>Sam Brown</td>
                                        <td>men</td>
                                        <td>22</td>
                                    </tr>
                                    <tr>
                                        <td>Emily White</td>
                                        <td>women</td>
                                        <td>27</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <button class="accordion" style="margin: 15px;">Toggle Table</button>
                        <div class="panel">
                            <div class="ms-auto d-flex">
                                <button onclick="filterRows('all')" class="btn btn-sm btn-dark me-2">All</button>
                                <button onclick="filterRows('men')" class="btn btn-sm btn-dark me-2">Men</button>
                                <button onclick="filterRows('women')" class="btn btn-sm btn-dark me-2">Women</button>
                                {{-- <button onclick="sortTable('asc')">Sort by Age Ascending</button>
                                <button onclick="sortTable('desc')">Sort by Age Descending</button> --}}
                            </div>

                            <table id="genderTable">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Gender</th>
                                        <th>Age</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>John Doe</td>
                                        <td>men</td>
                                        <td>28</td>
                                    </tr>
                                    <tr>
                                        <td>Jane Smith</td>
                                        <td>women</td>
                                        <td>32</td>
                                    </tr>
                                    <tr>
                                        <td>Sam Brown</td>
                                        <td>men</td>
                                        <td>22</td>
                                    </tr>
                                    <tr>
                                        <td>Emily White</td>
                                        <td>women</td>
                                        <td>27</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <button class="accordion" style="margin: 15px;">Toggle Table</button>
                        <div class="panel">
                            <div>
                                <button onclick="filterRows('all')">All</button>
                                <button onclick="filterRows('men')">Men</button>
                                <button onclick="filterRows('women')">Women</button>
                                <button onclick="sortTable('asc')">Sort by Age Ascending</button>
                                <button onclick="sortTable('desc')">Sort by Age Descending</button>
                            </div>

                            <table id="genderTable">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Gender</th>
                                        <th>Age</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>John Doe</td>
                                        <td>men</td>
                                        <td>28</td>
                                    </tr>
                                    <tr>
                                        <td>Jane Smith</td>
                                        <td>women</td>
                                        <td>32</td>
                                    </tr>
                                    <tr>
                                        <td>Sam Brown</td>
                                        <td>men</td>
                                        <td>22</td>
                                    </tr>
                                    <tr>
                                        <td>Emily White</td>
                                        <td>women</td>
                                        <td>27</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="/assets/js/custom.js"></script>
    </body>
@endsection
