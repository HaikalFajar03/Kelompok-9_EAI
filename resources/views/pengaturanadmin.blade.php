@extends('layouts.kalogakbisa')
@section('content')
<div class="container-fluid py-4 px-5">
    <div class="row">
        <div class="col-12">
            <div class="card border shadow-xs mb-4">
                <div class="card-header border-bottom pb-0">
                    <div class="d-sm-flex align-items-center">
                        <div>
                            <h6 class="font-weight-semibold text-lg mb-0">Account list</h6>
                            <p class="text-sm">See information about all account</p>
                        </div>
                        <div class="ms-auto d-flex">
                            <button type="button" class="btn btn-sm btn-white me-2">
                                View all
                            </button>
                            <a href="/tambahadmin" class="btn btn-sm btn-dark btn-icon d-flex align-items-center me-2">
                                <span class="btn-inner--icon">
                                    <svg width="16" height="16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="d-block me-2">
                                        <path d="M6.25 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM3.25 19.125a7.125 7.125 0 0114.25 0v.003l-.001.119a.75.75 0 01-.363.63 13.067 13.067 0 01-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 01-.364-.63l-.001-.122zM19.75 7.5a.75.75 0 00-1.5 0v2.25H16a.75.75 0 000 1.5h2.25v2.25a.75.75 0 001.5 0v-2.25H22a.75.75 0 000-1.5h-2.25V7.5z" />
                                    </svg>
                                </span>
                                <span class="btn-inner--text">Add member</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body px-0 py-0">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead class="bg-gray-100">
                                <tr>
                                <th class="text-secondary text-xs font-weight-semibold opacity-7" style="width: 30%">Nama</th>
                                <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2" style="width: 20%">Function</th>
                                <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2" >Username</th>
                                <th class="text-secondary opacity-7"></th>
                                <th class="text-secondary opacity-7" style="width: 3%"></th>
                                <th class="text-secondary opacity-7"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div class="d-flex align-items-center">
                                                <?php
                                                    $images = [
                                                        "team-2.jpg",
                                                        "team-3.jpg",
                                                        "team-1.jpg",
                                                        "team-4.jpg",
                                                        "team-5.jpg",                                                      "team-5.jpg",
                                                        "team-6.jpg",
                                                        "team-7.jpg",
                                                        "team-8.jpg"
                                                    ];
                                                    // Get a random index from the array
                                                    $randomIndex = array_rand($images);

                                                    // Get the random image file name
                                                    $randomImage = $images[$randomIndex];
                                                ?>
                                                <img src="../assets/img/<?php echo $randomImage; ?>" class="avatar avatar-sm rounded-circle me-2" alt="random-user-image">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center ms-1">
                                                <h6 class="mb-0 text-sm font-weight-semibold">{{ $user->fullname }}</h6>
                                                {{-- <p class="text-sm text-secondary mb-0">john@creative-tim.com</p> --}}
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="text-sm text-dark font-weight-semibold mb-0">{{ $user->user_type}}</p>
                                    </td>
                                    <td>
                                        <p class="text-sm text-dark font-weight-semibold mb-0">{{ $user->username }}</p>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <form action="{{ route('reset-password', $user) }}" method="POST">
                                            @csrf
                                            @method('POST')
                                            <button type="submit" class="btn-transparent rounded-pill text-sm text-light font-weight-semibold mb-0" style="background-color:cadetblue; border-color: rgba(0, 128, 0, 0);">Reset Password</button>
                                        </form>
                                    </td>
                                    <td class="align-middle" style="text-align: left;">
                                        {{-- <a href="{{ route('editadmin', $user->id) }}" class="text-secondary font-weight-bold text-xs" data-bs-toggle="tooltip" data-bs-title="Edit user">
                                        <svg width="14" height="14" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M11.2201 2.02495C10.8292 1.63482 10.196 1.63545 9.80585 2.02636C9.41572 2.41727 9.41635 3.05044 9.80726 3.44057L11.2201 2.02495ZM12.5572 6.18502C12.9481 6.57516 13.5813 6.57453 13.9714 6.18362C14.3615 5.79271 14.3609 5.15954 13.97 4.7694L12.5572 6.18502ZM11.6803 1.56839L12.3867 2.2762L12.3867 2.27619L11.6803 1.56839ZM14.4302 4.31284L15.1367 5.02065L15.1367 5.02064L14.4302 4.31284ZM3.72198 15V16C3.98686 16 4.24091 15.8949 4.42839 15.7078L3.72198 15ZM0.999756 15H-0.000244141C-0.000244141 15.5523 0.447471 16 0.999756 16L0.999756 15ZM0.999756 12.2279L0.293346 11.5201C0.105383 11.7077 -0.000244141 11.9624 -0.000244141 12.2279H0.999756ZM9.80726 3.44057L12.5572 6.18502L13.97 4.7694L11.2201 2.02495L9.80726 3.44057ZM12.3867 2.27619C12.7557 1.90794 13.3549 1.90794 13.7238 2.27619L15.1367 0.860593C13.9869 -0.286864 12.1236 -0.286864 10.9739 0.860593L12.3867 2.27619ZM13.7238 2.27619C14.0917 2.64337 14.0917 3.23787 13.7238 3.60504L15.1367 5.02064C16.2875 3.8721 16.2875 2.00913 15.1367 0.860593L13.7238 2.27619ZM13.7238 3.60504L3.01557 14.2922L4.42839 15.7078L15.1367 5.02065L13.7238 3.60504ZM3.72198 14H0.999756V16H3.72198V14ZM1.99976 15V12.2279H-0.000244141V15H1.99976ZM1.70617 12.9357L12.3867 2.2762L10.9739 0.86059L0.293346 11.5201L1.70617 12.9357Z" fill="#64748B" />
                                        </svg>
                                        </a> --}}
                                        {{-- <a href="{{ route('editadmin', $user->id) }}" class="edit-button">Edit</a> --}}
                                    </td>
                                    <td class="">
                                        <form action="{{ route('deleteadmin', $user->id) }}" method="POST"  >
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="hapus-button" data-delete-id="{{ $user->id }}" style="border: none; background-color: transparent;">
                                                <!-- Your button content -->
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16" style="margin-right: 10px;">
                                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                                                    <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                                                </svg>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <?php

                        use App\Models\User;

                        // Get the total number of items from the 'users' table
                        $totalItems = User::count();

                        // Number of items per page
                        $itemsPerPage = 5;

                        // Calculate the total number of pages
                        $totalPages = ceil($totalItems / $itemsPerPage);

                        // Determine the current page number
                        $currentPage = request()->query('page', 1);

                        // Calculate the offset for the current page
                        $offset = ($currentPage - 1) * $itemsPerPage;

                        // Fetch items for the current page
                        $items = User::skip($offset)->take($itemsPerPage)->get();

                        // Display items for the current page
                        foreach ($items as $item) {
                            // echo "Item: $item->id - $item->name<br>";
                        }

                        // Display pagination controls
                    ?>
                    <div class="border-top py-3 px-3 d-flex align-items-center">
                        <p class="font-weight-semibold mb-0 text-dark text-sm">Page <?php echo $currentPage; ?> of <?php echo $totalPages; ?></p>
                        <div class="ms-auto">
                            <?php if ($currentPage > 1) : ?>
                                <a href="?page=<?php echo $currentPage - 1; ?>" class="btn btn-sm btn-white mb-0">Previous</a>
                            <?php endif; ?>
                            <?php if ($currentPage < $totalPages) : ?>
                                <a href="?page=<?php echo $currentPage + 1; ?>" class="btn btn-sm btn-white mb-0">Next</a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    @parent
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        // Script untuk menampilkan SweetAlert setelah berhasil mengedit admin
        @if(session('success'))
            Swal.fire({
                title: 'Berhasil!',
                text: '{{ session('success') }}',
                icon: 'success',
                confirmButtonText: 'OK'
            });
        @endif
    </script>
@endsection
