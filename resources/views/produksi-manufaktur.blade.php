@extends('layouts.kalogakbisa')

@section('content')
<div class="card mb-3 m-lg-6 p-4"> 
    <form id="jobForm" action="{{route('update-kategori', $datadetail->id)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="card mb-3 m-lg-6 p-8 shadow-none" style="background-color: #F3FAFF;">
            <h2 class="text-center">{{$datadetail->nama_kategori}}</h2>
            <div id="jobDescriptionContainer">
                <p id="jobDescription">
                    {{$datadetail->deskripsi}}
                </p>
            </div>
    
            <!-- Hidden Trix Editor for Editing -->
                    {{-- <div class=""> --}}
                        <input id="x" type="hidden" name="deskripsi" required>
                        <trix-editor input="x" id="trixEditor" class="d-none"></trix-editor>
                    {{-- </div> --}}
            <!-- Buttons for Edit, Save, and Cancel -->
            <div class="text-center">
                <button type="button" id="editButton" class="btn btn-primary">Edit</button>
                <button type="submit" id="saveButton" class="btn btn-success d-none">Save</button>
                <button type="button" id="cancelButton" class="btn btn-secondary d-none">Cancel</button>
            </div>
        </div>
    </form>
    <form action="{{route('kategoripekerjaan.destroy', $datadetail->id)}}" method="POST">
        @csrf
        @method('DELETE')
        <button type="Submit" id="editButton" class="btn btn-primary">Delete</button>
    </form>
</div>

<!-- Include Trix Editor CSS and JS -->
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.css">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const editButton = document.getElementById('editButton');
        const saveButton = document.getElementById('saveButton');
        const cancelButton = document.getElementById('cancelButton');
        const jobDescriptionContainer = document.getElementById('jobDescriptionContainer');
        const jobDescription = document.getElementById('jobDescription');
        const trixEditor = document.getElementById('trixEditor');
        const trixInput = document.getElementById('x');

        editButton.addEventListener('click', function () {
            jobDescription.classList.add('d-none');
            trixInput.value = jobDescription.innerHTML.trim();
            trixEditor.classList.remove('d-none');
            trixEditor.editor.loadHTML(trixInput.value);
            editButton.classList.add('d-none');
            saveButton.classList.remove('d-none');
            cancelButton.classList.remove('d-none');
        });

        saveButton.addEventListener('click', function () {
            jobDescription.innerHTML = trixEditor.editor.getDocument().toString();
            jobDescription.classList.remove('d-none');
            trixEditor.classList.add('d-none');
            editButton.classList.remove('d-none');
            saveButton.classList.add('d-none');
            cancelButton.classList.add('d-none');
        });

        cancelButton.addEventListener('click', function () {
            jobDescription.classList.remove('d-none');
            trixEditor.classList.add('d-none');
            editButton.classList.remove('d-none');
            saveButton.classList.add('d-none');
            cancelButton.classList.add('d-none');
        });
    });
</script>
@endsection
