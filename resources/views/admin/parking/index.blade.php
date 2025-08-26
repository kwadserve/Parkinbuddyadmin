@extends('admin.container')
@section('content')
    <!-- BEGIN: Top Bar -->
    <div class="top-bar">
        <!-- BEGIN: Breadcrumb -->
        <nav aria-label="breadcrumb" class="-intro-x mr-auto hidden sm:flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Parkinbuddy</a></li>
                <li class="breadcrumb-item active" aria-current="page">Parkings</li>
            </ol>
        </nav>
        <!-- END: Breadcrumb -->
        @include('admin.topbar')
    </div>
    <!-- END: Top Bar -->
    <!-- BEGIN: Main Content -->
    <h2 class="intro-y text-lg font-medium mt-10">
        Parkings
    </h2>
    <div id="example-tab-5" class="tab-pane leading-relaxed" role="tabpanel" aria-labelledby="example-4-tab">
        <div class="">
            <div class="grid grid-cols-12 gap-6 mt-5">
                <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
                    <div class="flex w-full sm:w-auto">
                        <div class="w-48 relative text-slate-500">
                            <input type="text" class="form-control w-48 box pr-10" id="parkingSearch"
                                placeholder="Search by Parking Name">
                            <i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-lucide="search"></i>
                        </div>
                    </div>
                    <div class="hidden xl:block mx-auto text-slate-500"></div>
                    <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
                        <button class="btn btn-primary shadow-md mr-2" style="display:none;">
                            <i data-lucide="file-text" class="w-4 h-4 mr-2"></i> Export to Excel
                        </button>
                        <div class="dropdown ml-auto sm:ml-0">
                            <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#header-footer-modal-preview">
                                <button class="dropdown-toggle btn px-2 box" href="#" aria-expanded="false"
                                    data-tw-toggle="dropdown">
                                    <span class="w-5 h-5 flex items-center justify-center"> <i class="w-4 h-4"
                                            data-lucide="plus"></i> </span>
                                </button>
                            </a>
                        </div>
                    </div>
                    <div id="header-footer-modal" class="p-5">
                        <div class="preview">
                            <!-- BEGIN: Modal Content -->
                            <div id="header-footer-modal-preview" class="modal" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <!-- BEGIN: Modal Header -->
                                        <div class="modal-header">
                                            <h2 class="font-medium text-base mr-auto">
                                                Add Parking
                                            </h2>
                                            <div class="dropdown sm:hidden">
                                                <a class="dropdown-toggle w-5 h-5 block" href="javascript:;"
                                                    aria-expanded="false" data-tw-toggle="dropdown"> <i
                                                        data-lucide="more-horizontal" class="w-5 h-5 text-slate-500"></i>
                                                </a>
                                                <div class="dropdown-menu w-40">
                                                    <ul class="dropdown-content">
                                                        <li>
                                                            <a href="javascript:;" class="dropdown-item"> <i
                                                                    data-lucide="file" class="w-4 h-4 mr-2"></i> Download
                                                                Docs </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- END: Modal Header -->
                                        <form class="validate-form">
                                            <!-- BEGIN: Modal Body -->
                                            <div class="modal-body intro-y box">
                                                <div id="form-validation">
                                                    <div class="preview">
                                                        <!-- BEGIN: Validation Form -->

                                                        <div class="input-form">
                                                            <label for="validation-form-1"
                                                                class="form-label w-full flex flex-col sm:flex-row"> Name on
                                                                Parking <span
                                                                    class="sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">Required,
                                                                    at least 8 characters</span> </label>
                                                            <input id="validation-form-1" type="text" name="name"
                                                                class="form-control" placeholder="Name of Parking"
                                                                minlength="8" required>
                                                        </div>
                                                        <div class="input-form mt-3">
                                                            <label for="validation-form-2"
                                                                class="form-label w-full flex flex-col sm:flex-row"> Email
                                                                <span
                                                                    class="sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">Required,
                                                                    email address format</span> </label>
                                                            <input id="validation-form-2" type="email" name="email"
                                                                class="form-control" placeholder="example@gmail.com"
                                                                required>
                                                        </div>
                                                        <div class="input-form mt-3">
                                                            <label for="validation-form-3"
                                                                class="form-label w-full flex flex-col sm:flex-row">
                                                                Password <span
                                                                    class="sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">Required,
                                                                    at least 6 characters</span> </label>
                                                            <input id="validation-form-3" type="password" name="password"
                                                                class="form-control" placeholder="secret" minlength="6"
                                                                required>
                                                        </div>
                                                        <div class="input-form mt-3">
                                                            <label for="validation-form-4"
                                                                class="form-label w-full flex flex-col sm:flex-row"> Age
                                                                <span
                                                                    class="sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">Required,
                                                                    integer only & maximum 3 characters</span> </label>
                                                            <input id="validation-form-4" type="number" name="age"
                                                                class="form-control" placeholder="21" required>
                                                        </div>
                                                        <div class="input-form mt-3">
                                                            <label for="validation-form-5"
                                                                class="form-label w-full flex flex-col sm:flex-row">
                                                                Profile URL <span
                                                                    class="sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">Optional,
                                                                    URL format</span> </label>
                                                            <input id="validation-form-5" type="url" name="url"
                                                                class="form-control" placeholder="https://google.com">
                                                        </div>
                                                        <div class="input-form mt-3">
                                                            <label for="validation-form-6"
                                                                class="form-label w-full flex flex-col sm:flex-row">
                                                                Comment <span
                                                                    class="sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">Required,
                                                                    at least 10 characters</span> </label>
                                                            <textarea id="validation-form-6" class="form-control" name="comment" placeholder="Type your comments"
                                                                minlength="10" required></textarea>
                                                        </div>

                                                        <!-- END: Validation Form -->
                                                        <!-- BEGIN: Success Notification Content -->
                                                        <div id="success-notification-content"
                                                            class="toastify-content hidden flex">
                                                            <i class="text-success" data-lucide="check-circle"></i>
                                                            <div class="ml-4 mr-4">
                                                                <div class="font-medium">Registration success!</div>
                                                                <div class="text-slate-500 mt-1"> Please check your e-mail
                                                                    for further info! </div>
                                                            </div>
                                                        </div>
                                                        <!-- END: Success Notification Content -->
                                                        <!-- BEGIN: Failed Notification Content -->
                                                        <div id="failed-notification-content"
                                                            class="toastify-content hidden flex">
                                                            <i class="text-danger" data-lucide="x-circle"></i>
                                                            <div class="ml-4 mr-4">
                                                                <div class="font-medium">Registration failed!</div>
                                                                <div class="text-slate-500 mt-1"> Please check the fileld
                                                                    form. </div>
                                                            </div>
                                                        </div>
                                                        <!-- END: Failed Notification Content -->
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- END: Modal Body -->
                                            <!-- BEGIN: Modal Footer -->
                                            <div class="modal-footer">
                                                <button type="button" data-tw-dismiss="modal"
                                                    class="btn btn-outline-secondary w-20 mr-1">Cancel</button>
                                                <button type="submit" class="btn btn-primary mt-5">Register</button>
                                            </div>
                                            <!-- END: Modal Footer -->
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- END: Modal Content -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="parking-list-container">
            @include('admin.parking.parking-list')
        </div>
    </div>

    <!-- END: Main Content -->
@endsection

@section('scripts')
    <script>
        let baseurl = $('#mainUrl').val();

        $(document).ready(function() {

            const loadParkings = (page, search_term, perpage) => {
                $.ajax({
                    method: 'GET',
                    url: `${baseurl}/pb-admin/parkings?page=${page}&search_term=${search_term}&perpage=${perpage}`,
                    success: function(response) {
                        // $('#parking-list-container').html('');
                        $('#parking-list-container').empty().html(response);
                    }
                })
            }

            $(document).on('keyup', '#parkingSearch', function() {
                var search_term = $('#parkingSearch').val();
                loadParkings(1, search_term, 0);
            });

            $(document).on('click', '#parkings .pagination a', function(event) {
                event.preventDefault();
                let page = $(this).attr('href').split('page=')[1];
                var search_term = $('#parkingSearch').val();
                loadParkings(page, search_term, 0);
            });

            $(document).on('change', '#parkings select.perPageSelectBox', function(event) {
                let perpage = $(this).val();
                let search_term = $('#parkingSearch').val();
                loadParkings(1, search_term, perpage);
            });
        });

        // Handle pagination links click event
    </script>
@endsection
