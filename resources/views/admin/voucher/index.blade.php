@extends('admin.container')
@section('content')
    <!-- BEGIN: Top Bar -->
    <div class="top-bar">
        <!-- BEGIN: Breadcrumb -->
        <nav aria-label="breadcrumb" class="-intro-x mr-auto hidden sm:flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Parkinbuddy</a></li>
                <li class="breadcrumb-item active" aria-current="page">Vouchers</li>
            </ol>
        </nav>
        <!-- END: Breadcrumb -->
        @include('admin.topbar')
    </div>
    <!-- END: Top Bar -->
    <!-- BEGIN: Main Content -->
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">All Vouchers</h2>
    </div>
    <div id="example-tab-5" class="tab-pane leading-relaxed" role="tabpanel" aria-labelledby="example-5-tab">
        <!-- BEGIN: bookings -->
        <div class="">
            <input type="hidden" id="voucherPageNumber" value="1" />
            <div class="grid grid-cols-12 gap-6 mt-5">
                <div class="intro-y col-span-12 flex flex-wrap xl:flex-nowrap items-center mt-2">
                    {{-- <div class="flex w-full sm:w-auto">
                        <div class="w-48 relative text-slate-500">
                            <input type="text" id="userVoucherSearch" class="form-control w-48 box pr-10"
                                placeholder="Search by Voucher Title">
                            <i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-lucide="search"></i>
                        </div>
                    </div> --}}
                    <div class="hidden xl:block mx-auto text-slate-500"></div>
                    <div class="w-full xl:w-auto flex items-center mt-3 xl:mt-0">
                        <button class="btn btn-primary shadow-md mr-2" style="display:none;"> <i data-lucide="file-text"
                                class="w-4 h-4 mr-2"></i> Export to Excel </button>
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
                                        </div>
                                        <!-- END: Modal Header -->
                                        <form action="{{ url('pb-admin/vouchers') }}" method="POST">
                                            @csrf
                                            <!-- BEGIN: Modal Body -->
                                            <div class="modal-body intro-y box">
                                                <div id="form-validation">
                                                    <div class="preview">
                                                        <!-- BEGIN: Validation Form -->
                                                        <div class="input-form">
                                                            <label for="validation-form-1"
                                                                class="form-label w-full flex flex-col sm:flex-row"> Voucher
                                                                Title <span
                                                                    class="sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">Required,
                                                                    at least 8 characters</span> </label>
                                                            <input id="validation-form-1" type="text" name="title"
                                                                class="form-control" placeholder="Get a Discount of 20%"
                                                                minlength="8" required>
                                                        </div>
                                                        <div class="input-form mt-3">
                                                            <label for="validation-form-2"
                                                                class="form-label w-full flex flex-col sm:flex-row">Voucher
                                                                Code
                                                                <span
                                                                    class="sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">Required</span>
                                                            </label>
                                                            <input id="validation-form-2" type="text" name="code"
                                                                class="form-control" placeholder="FLAT20" required>
                                                        </div>
                                                        <div class="input-form mt-3">
                                                            <label for="validation-form-7"
                                                                class="form-label w-full flex flex-col sm:flex-row">Discount
                                                                <span
                                                                    class="sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">Required</span>
                                                            </label>
                                                            <input id="validation-form-7" type="number" name="discount"
                                                                class="form-control" placeholder="20">
                                                        </div>
                                                        <div class="input-form mt-3">
                                                            <label for="validation-form-3"
                                                                class="form-label w-full flex flex-col sm:flex-row">
                                                                Discount Type <span
                                                                    class="sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">Required</span>
                                                            </label>
                                                            <div class="flex flex-col sm:flex-row mt-2">
                                                                <div class="form-check mr-5"> <input id="checkbox-switch-4"
                                                                        class="form-check-input" type="checkbox"
                                                                        value="number" name="type"> <label
                                                                        class="form-check-label"
                                                                        for="checkbox-switch-4">Rupees</label> </div>
                                                                <div class="form-check mr-2 mt-2 sm:mt-0"> <input
                                                                        id="checkbox-switch-5" class="form-check-input"
                                                                        type="checkbox" value="percentage" name="type">
                                                                    <label class="form-check-label"
                                                                        for="checkbox-switch-5">Percentage</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="input-form mt-3">
                                                            <label for="validation-form-3"
                                                                class="form-label w-full flex flex-col sm:flex-row">
                                                                Vehicle Type <span
                                                                    class="sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">Required</span>
                                                            </label>
                                                            <div class="flex flex-col sm:flex-row mt-2">
                                                                <div class="form-check mr-5" style="display: flex; align-items: center;"> <input
                                                                        id="checkbox-switch-4" class="form-check-input mr-2"
                                                                        type="checkbox" value="0"
                                                                        name="vehicle_type"> <label
                                                                        class="form-check-label"
                                                                        for="checkbox-switch-4"><img width="50"
                                                                            class="object-fit-contain-vehicle"
                                                                            alt="Bike"
                                                                            src="{{ URL::asset('dist/images/bikeyellow.svg') }}"></label>
                                                                </div>
                                                                <div class="form-check mr-2 mt-2 sm:mt-0" style="display: flex; align-items: center;"> <input
                                                                        id="checkbox-switch-5" class="form-check-input mr-2"
                                                                        type="checkbox" value="1"
                                                                        name="vehicle_type"> <label
                                                                        class="form-check-label"
                                                                        for="checkbox-switch-5"><img width="50"
                                                                            class="object-fit-contain-vehicle"
                                                                            alt="Car"
                                                                            src="{{ URL::asset('dist/images/car.svg') }}"></label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="input-form mt-3">
                                                            <label for="validation-form-6"
                                                                class="form-label w-full flex flex-col sm:flex-row">Expiry
                                                                <span
                                                                    class="sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">Required</span>
                                                            </label>
                                                            <input id="validation-form-6" type="date" name="expiry"
                                                                step="any" class="form-control"
                                                                placeholder="12-12-12" required>
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
            <div class="voucher-list-container" id="voucher-list-container">
                @include('admin.voucher.list')
            </div>
        </div>
    </div>

    <!-- END: Main Content -->
@endsection

@section('scripts')
    <script>
        let baseurl = $('#mainUrl').val();
        $(document).ready(function() {
            //==========================user voucher listing start=================
            const loadUservouchers = (page, search_term, perpage) => {
                $.ajax({
                    method: 'GET',
                    url: `${baseurl}/pb-admin/vouchers?page=${page}&seach_term=${search_term}&perpage=${perpage}`,
                    success: function(response) {
                        $('#voucher-list-container').html(response);
                    }
                })
            }

            $(document).on('keyup', '#userVoucherSearch', function() {
                var search_term = $('#userVoucherSearch').val();
                loadUservouchers(1, search_term, 0);
            });

            $(document).on('click', '#example-tab-5 .pagination a', function(event) {
                event.preventDefault();
                let page = $(this).attr('href').split('page=')[1];
                $("#voucherPageNumber").val(page);
                var search_term = $('#userVoucherSearch').val();
                loadUservouchers(page, search_term, 0);
            });

            $(document).on('change', '#uservouchers select.perPageSelectBox', function(event) {
                let perpage = $(this).val();
                let search_term = $('#userVoucherSearch').val();
                loadUservouchers(1, search_term, perpage);
            });
        });
    </script>
@endsection
