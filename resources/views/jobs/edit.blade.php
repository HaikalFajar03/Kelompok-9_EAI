@extends('layouts.kalogakbisa')

@section('content')
<div class="container">
    <h2>Edit Job</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('jobs.update', $job->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="job_title">Job Title:</label>
            <input type="text" class="form-control" id="job_title" name="job_title" value="{{ $job->job_title }}" required>
        </div>
        <div class="form-group">
            <label for="monthly_salary">Monthly Salary:</label>
            <input type="text" class="form-control" id="monthly_salary" name="monthly_salary" value="{{ $job->monthly_salary }}" required>
        </div>
        <div class="form-group">
            <label for="start_date">Start Date:</label>
            <input type="date" class="form-control" id="start_date" name="start_date" value="{{ $job->start_date }}" required>
        </div>
        <div class="form-group">
            <label for="end_date">End Date:</label>
            <input type="date" class="form-control" id="end_date" name="end_date" value="{{ $job->end_date }}" required>
        </div>
        <div class="form-group">
            <label for="location">Location:</label>
            <input type="text" class="form-control" id="location" name="location" value="{{ $job->location }}" required>
        </div>
        <div class="form-group">
            <label for="contact">Contact:</label>
            <input type="text" class="form-control" id="contact" name="contact" value="{{ $job->contact }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
