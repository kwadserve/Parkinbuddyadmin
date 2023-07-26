@extends('admin.container')
@section('content')
 <!-- BEGIN: Top Bar -->
 <div class="top-bar">
    <!-- BEGIN: Breadcrumb -->
    <nav aria-label="breadcrumb" class="-intro-x mr-auto hidden sm:flex">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Parkinbuddy</a></li>
            <li class="breadcrumb-item active" aria-current="page">Users</li>
        </ol>
    </nav>
    <!-- END: Breadcrumb -->
    @include('admin.topbar')
</div>
<!-- END: Top Bar -->
<!-- BEGIN: Main Content -->
<h2 class="intro-y text-lg font-medium mt-10">
    All Userssss
</h2>
<div class="grid grid-cols-12 gap-6 mt-5">
    <div id="users-list">
        <!-- Product listing will be dynamically updated here -->
    </div>
    <div id="pagination-links">
        <!-- Empty div for pagination links -->
    </div>
</div>
<!-- END: Main Content -->
@endsection

<!-- @section('scripts') -->
<script>
    function loadProducts(page = 1) {
        $.ajax({
            url: `/pb-admin/users/filter?page=${page}`,
            type: 'GET',
            success: function(response) {
                // Update the product listing with the new data
                $('#users-list').html(response.data);

                // Update the pagination links
                $('#pagination-links').html(response.pagination);
            },
            error: function(error) {
                console.error(error);
            }
        });
    }

    $(document).ready(function() {
        alert(11111);
        loadProducts();

        // Handle pagination links click event
        // $(document).on('click', '.pagination a', function(event) {
        //     event.preventDefault();
        //     let page = $(this).attr('href').split('page=')[1];
        //     loadProducts(page);
        // });
    });
</script>
<!-- @endsection -->