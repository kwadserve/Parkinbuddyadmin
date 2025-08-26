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
        All Users
    </h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            <div class="hidden md:block mx-auto text-slate-500"></div>
            <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                <div class="w-56 relative text-slate-500">
                    <input type="text" id="userSearch" class="form-control w-56 box pr-10"
                        placeholder="Search by name...">
                    <i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-lucide="search"></i>
                </div>
            </div>
        </div>
    </div>
    <div id="users-list-container">
        @include('admin.user.user-list')
    </div>
    <input type="hidden" id="pageNumber" value="1" />

    <!-- END: Main Content -->
@endsection

@section('scripts')
    <script>
        let baseurl = $('#mainUrl').val();

        $(document).ready(function() {

            const loadUsers = (page, search_term, perpage) => {
                $.ajax({
                    method: 'GET',
                    url: `${baseurl}/pb-admin/users?page=${page}&seach_term=${search_term}&perpage=${perpage}`,
                    success: function(response) {
                        $('#users-list-container').html('');
                        $('#users-list-container').html(response);
                    }
                })
            }

            $(document).on('keyup', '#userSearch', function() {
                var seach_term = $('#userSearch').val();
                loadUsers(1, seach_term, 0);
            });

            $(document).on('click', '.pagination a', function(event) {
                event.preventDefault();
                let page = $(this).attr('href').split('page=')[1];
                $("#pageNumber").val(page);
                var search_term = $('#userSearch').val();
                loadUsers(page, search_term, 0);
            });

            $(document).on('change', '#userList select.perPageSelectBox', function(event) {
                let perpage = $(this).val();
                let search_term = $('#userSearch').val();
                loadUsers(1, search_term, perpage);
            });
        });

        // Handle pagination links click event
    </script>
@endsection
