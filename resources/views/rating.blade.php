@extends('layouts.kalogakbisa')
@section('content')
@if($userType !== 'Super Admin')
<div class="container-fluid py-4 px-5">
    <div class="row">
        <div class="col-12">
            <div class="card border shadow-xs mb-4">
                <div class="card-header border-bottom pb-0">
                    <div class="d-sm-flex align-items-center justify-content-center">
                        <div>
                        <h6 class="font-weight-semibold text-lg mb-0">Review</h6>
                        <p class="text-sm">Masukkan Feedback Anda</p>
                        </div>
                    </div>
                </div>
                <div class="card-body px-0 py-0">
                    {{-- isi --}}
                    @if(!empty($value->star_rating))
                        <div class="container">
                            <div class="row">
                                <div class="col mt-4">
                                    <div class="form-group row">
                                        <input type="hidden" name="booking_id" value="{{ $value->id }}">
                                        <div class="col">
                                            <div class="rated">
                                                @for($i=1; $i<=$value->star_rating; $i++)
                                                    <label class="star-rating-complete" title="text">{{ $i }} stars</label>
                                                @endfor
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row mt-4">
                                        <div class="col">
                                            <p>{{ $value->comments }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="container">
                            <div class="row">
                                <div class="col mt-4">
                                    <form action="{{route('admin.review.store')}}"  method="POST" autocomplete="off">
                                        @csrf
                                        <div class="form-group row">
                                            @php
                                                $value = new stdClass();
                                                $value->id = 'some_id';
                                            @endphp
                                            <input type="hidden" name="booking_id" value="{{ $value->id }}">
                                            <div class="col">
                                                <div class="rate">
                                                    <input type="radio" id="star5" class="rate" name="rating" value="5"/>
                                                    <label for="star5" title="text">5 stars</label>
                                                    <input type="radio" checked id="star4" class="rate" name="rating" value="4"/>
                                                    <label for="star4" title="text">4 stars</label>
                                                    <input type="radio" id="star3" class="rate" name="rating" value="3"/>
                                                    <label for="star3" title="text">3 stars</label>
                                                    <input type="radio" id="star2" class="rate" name="rating" value="2">
                                                    <label for="star2" title="text">2 stars</label>
                                                    <input type="radio" id="star1" class="rate" name="rating" value="1"/>
                                                    <label for="star1" title="text">1 star</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row mt-4">
                                            <div class="col">
                                                <textarea class="form-control" name="comment" rows="6 " placeholder="Comment" maxlength="200"></textarea>
                                            </div>
                                        </div>
                                        <div class="mt-3 text-right">
                                            <button class="btn btn-sm py-2 px-3 btn-info">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endif
                    {{-- end isi --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endif


<div style="margin-top: 50px;"></div>
{{-- dua --}}
@if(!empty($reviewRatings))
    <div class="container-fluid py-4 px-5">
        <div class="row">
            <div class="col-12">
                <div class="card border shadow-xs mb-4">
                <div class="card-header border-bottom pb-0">
                    <div class="d-sm-flex align-items-center justify-content-center">
                        <div>
                        <h6 class="font-weight-semibold text-lg mb-0"></h6>
                        <p class="text-sm">Review rating</p>
                        </div>
                    </div>
                    </div>
                    <div class="card-body px-0 py-0">
                        <div class="table-responsive p-0">

                        @if($reviewRatings->isEmpty())
                            <p class="text-center text-sm">Tidak ada review yang tersedia saat ini.</p>
                        @else
                            <table class="table align-items-center mb-0">
                                <thead class="bg-gray-100">
                                    <tr>
                                        <th class="text-secondary text-xs font-weight-semibold opacity-7" style="width: 60%">Review</th>
                                        <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2" style="width: 40%">Rating</th>
                                        <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2" ></th>
                                        <th class="text-secondary opacity-7" ></th>
                                        <th class="text-secondary opacity-7" ></th>
                                        <th class="text-secondary opacity-7 ps-0" ></th>
                                    </tr>
                                </thead>
                                <tbody>
                                        @foreach ($reviewRatings as $reviewRating)
                                            <tr>
                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <div class="d-flex align-items-center">
                                                        </div>
                                                        <div class="d-flex flex-column justify-content-center ms-1">
                                                            <p class="text-sm text-dark font-weight-semibold mb-0">{{ $reviewRating->comments }}</p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td >
                                                    <p class="text-sm text-dark font-weight-semibold mb-0">{{ $reviewRating->star_rating }} stars</p>
                                                </td>
                                                <td class="align-middle text-center text-sm">

                                                </td>
                                                <td class="align-middle" style="text-align: left;">

                                                </td>
                                                <td class="">
                                                    @if($userType === 'Super Admin')
                                                        <form action="{{ route('review_ratings.destroy', $reviewRating->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn-delete">Delete</button>
                                                        </form>
                                                    @endif
                                                </td>

                                            </tr>
                                        @endforeach
                                </tbody>

                            </table>
                        @endif
                        </div>
                        {{-- isi --}}
                        {{-- end isi --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
    <div class="container mt-4">
        <div class="row">
            <div class="col text-center">
                <a href="{{ url('/dashboard') }}" class="btn btn-primary">Kembali</a>
            </div>
        </div>
    </div>
@endsection
<style>
        .rate {
            float: left;
            height: 20px;
            padding: 0px 10 px;

            }
            .rate:not(:checked) > input {
            position:absolute;
            display: none;
            }
            .rate:not(:checked) > label {
            float:right;
            width:1em;
            overflow:hidden;
            white-space:nowrap;
            cursor:pointer;
            font-size:30px;
            color:#ccc;
            }
            .rated:not(:checked) > label {
            float:right;
            width:1em;
            overflow:hidden;
            white-space:nowrap;
            cursor:pointer;
            font-size:30px;
            color:#ccc;
            }
            .rate:not(:checked) > label:before {
            content: '★ ';
            }
            .rate > input:checked ~ label {
            color: #ffc700;
            }
            .rate:not(:checked) > label:hover,
            .rate:not(:checked) > label:hover ~ label {
            color: #deb217;
            }
            .rate > input:checked + label:hover,
            .rate > input:checked + label:hover ~ label,
            .rate > input:checked ~ label:hover,
            .rate > input:checked ~ label:hover ~ label,
            .rate > label:hover ~ input:checked ~ label {
            color: #c59b08;
            }
            .star-rating-complete{
                color: #c59b08;
            }
            .rating-container .form-control:hover, .rating-container .form-control:focus{
            background: #fff;
            border: 1px solid #ced4da;
            }
            .rating-container textarea:focus, .rating-container input:focus {
            color: #000;
            }

            .rated {
            float: left;
            height: 20px;
            padding: 0px 10 px;
            }
            .rated:not(:checked) > input {
            position:absolute;
            display: none;
            }
            .rated:not(:checked) > label {
            float:right;
            width:1em;
            overflow:hidden;
            white-space:nowrap;
            cursor:pointer;
            font-size:30px;
            color:#ffc700;
            }
            .rated:not(:checked) > label:before {
            content: '★ ';
            }
            .rated > input:checked ~ label {
            color: #ffc700;
            }
            .rated:not(:checked) > label:hover,
            .rated:not(:checked) > label:hover ~ label {
            color: #deb217;
            }
            .rated > input:checked + label:hover,
            .rated > input:checked + label:hover ~ label,
            .rated > input:checked ~ label:hover,
            .rated > input:checked ~ label:hover ~ label,
            .rated > label:hover ~ input:checked ~ label {
            color: #c59b08;
            }
            .card-header {
            text-align: center;
            }
            .btn-delete {
                background-color: RGB(220, 53, 69);
                border-color: rgba(0, 128, 0, 0);
                color: white;
                padding: 10px 24px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 16px;
                margin: 4px 2px;
                transition-duration: 0.4s;
                cursor: pointer;
                border-radius: 12px;
            }

            .btn-delete:hover {
                background-color: white;
                color: black;
                border: 2px solid RGB(220, 53, 69);
            }
</style>