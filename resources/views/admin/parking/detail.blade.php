@extends('admin.container')
@section('content')
    <?php
    use App\Models\User;
    ?>
    <!-- BEGIN: Top Bar -->
    <div class="top-bar">
        <!-- BEGIN: Breadcrumb -->
        <nav aria-label="breadcrumb" class="-intro-x mr-auto hidden sm:flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Parkinbuddy</a></li>
                <li class="breadcrumb-item active" aria-current="page">Parking Profile</li>
            </ol>
        </nav>
        <!-- END: Breadcrumb -->
        @include('admin.topbar')
    </div>
    <!-- END: Top Bar -->
    <!-- BEGIN: Main Content -->
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Parking Profile Page
        </h2>
    </div>
    <input type="hidden" id="parkingProfileId" value="{{ $parkingDetails->id }}" />
    <input type="hidden" id="parkingUserId" value="{{ $parkingDetails->user_id }}" />
    <input type="hidden" id="vechicleSalesGraphFeed" value=<?= json_encode($vechicleSalesGraphFeed) ?> />
    <input type="hidden" id="salesReportData" value=<?= json_encode($salesReportData) ?> />
    <input type="hidden" id="vehicleBookingsChartFourWheel" value=<?= json_encode($vehicleBookingsChartFourWheel) ?> />
    <input type="hidden" id="vehicleBookingsChartTwoWheel" value=<?= json_encode($vehicleBookingsChartTwoWheel) ?> />
    <input type="hidden" id="vechicleSalesChartFourWheel" value=<?= json_encode($vechicleSalesChartFourWheel) ?> />
    <input type="hidden" id="vechicleSalesChartTwoWheel" value=<?= json_encode($vechicleSalesChartTwoWheel) ?> />

    <!-- BEGIN: Official Store -->
    <!-- <div class="col-span-12 lg:col-span-8 mt-6">
        <div class="intro-y box p-5 mt-12 sm:mt-5">
            <div>Latitude : 18.2432 | Longitude : 78.3490</div>
            <div class="report-maps mt-5 bg-slate-200 rounded-md" data-center="-6.2425342, 106.8626478" data-sources="{{ URL::asset('dist/json/location.json') }}"></div>
        </div>
    </div> -->
    <!-- END: Official Store -->
    <!-- BEGIN: Profile Info -->
    <div class="intro-y box px-5 pt-5 mt-5">
        <div class="flex flex-col lg:flex-row border-b border-slate-200/60 dark:border-darkmode-400 pb-5 -mx-5">
            <div class="flex flex-1 px-5 items-center justify-center lg:justify-start">

                <div class="ml-5">
                    <div class="w-24 sm:w-56 truncate sm:whitespace-normal font-medium text-lg">
                        @if ($parkingDetails && $parkingDetails->name != null)
                            {{ $parkingDetails->name }}
                        @else
                            {{ '-' }}
                        @endif
                    </div>
                    <div class="truncate sm:whitespace-normal flex items-center">
                        @if ($parkingDetails && $parkingDetails->address != null)
                            {{ $parkingDetails->address }}
                        @else
                            {{ '-' }}
                        @endif
                    </div>

                </div>
            </div>
            <div
                class="mt-6 lg:mt-0 flex-1 px-5 border-l border-r border-slate-200/60 dark:border-darkmode-400 border-t lg:border-t-0 pt-5 lg:pt-0">
                <?php
                $userDetails = User::whereIn('id', [$parkingDetails['manager_id'], $parkingDetails['operator_id']])->get();
                // dd($userDetails);
                ?>
                <div class="flex flex-col justify-center items-center lg:items-start mt-4">
                    <div class="truncate sm:whitespace-normal flex items-center"> <i data-lucide="map-pin"
                            class="w-4 h-4 mr-2"></i> {{ $parkingDetails->city }}, {{ $parkingDetails->state }} </div>
                    @foreach ($userDetails as $userDetail)
                        <div class="truncate sm:whitespace-normal flex items-center mt-3"> <i data-lucide="user"
                                class="w-4 h-4 mr-2"></i>
                            @if ($parkingDetails->operator_id == $userDetail->id)
                                Operator:
                            @elseif($parkingDetails->manager_id == $userDetail->id)
                                Manager:
                            @endif
                            {{ $userDetail->name }}
                        </div>
                    @endforeach
                </div>
            </div>
            <div
                class="mt-6 lg:mt-0 flex-1 flex items-center justify-center px-5 border-t lg:border-0 border-slate-200/60 dark:border-darkmode-400 pt-5 lg:pt-0">
                <div class="text-center rounded-md w-20 py-3">
                    <div class="font-medium text-primary text-xl">{{ $userBookingCount }}</div>
                    <div class="text-slate-500">Total Bookings</div>
                </div>
                <div class="text-center rounded-md w-20 py-3">
                    <div class="font-medium text-primary text-xl">
                        {{ $userBookingCashCollection + $userBookingChargeCollection }}</div>
                    <div class="text-slate-500">Total Collection</div>
                </div>

            </div>
        </div>
        <ul class="nav nav-link-tabs flex-col sm:flex-row justify-center lg:justify-start text-center" role="tablist">
            <li id="example-7-tab" class="nav-item" role="presentation">
                <a href="javascript:;" class="nav-link py-4 flex items-center active" data-tw-toggle="pill"
                    data-tw-target="#example-tab-7" type="button" role="tab" aria-controls="example-tab-7"
                    aria-selected="true"> <i class="w-4 h-4 mr-2" data-lucide="list"></i> Overview </a>
            </li>
            <li id="example-3-tab" class="nav-item" role="presentation">
                <a href="javascript:;" class="nav-link py-4 flex items-center" data-tw-toggle="pill"
                    data-tw-target="#example-tab-3" type="button" role="tab" aria-controls="example-tab-3"
                    aria-selected="false"> <i class="w-4 h-4 mr-2" data-lucide="list"></i> Bookings </a>
            </li>
            <li id="example-4-tab" class="nav-item" role="presentation">
                <a href="javascript:;" class="nav-link py-4 flex items-center" data-tw-toggle="pill"
                    data-tw-target="#example-tab-4" type="button" role="tab" aria-controls="example-tab-4"
                    aria-selected="false"> <i class="w-4 h-4 mr-2" data-lucide="film"></i> Passes </a>
            </li>
        </ul>
    </div>
    <div class="tab-content mt-5">
        <div id="example-tab-7" class="tab-pane leading-relaxed active" role="tabpanel" aria-labelledby="example-7-tab">
            <!-- BEGIN: Content -->
            <div class="grid grid-cols-12 gap-6">
                <div class="col-span-12 2xl:col-span-9">
                    <div class="grid grid-cols-12 gap-6">
                        <!-- BEGIN: General Report -->
                        <div class="col-span-12">

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                                    <div class="report-box zoom-in">
                                        <div class="box p-5">
                                            <div class="flex">
                                                <i data-lucide="shopping-cart" class="report-box__icon text-primary"></i>
                                                <div class="ml-auto">
                                                    @if ($totalSalesIsHigher)
                                                        <div class="report-box__indicator bg-success tooltip cursor-pointer"
                                                            title="{{ $totalSalesGrowth }}% Higher than last month">
                                                            {{ $totalSalesGrowth }}% <i data-lucide="chevron-up"
                                                                class="w-4 h-4 ml-0.5"></i> </div>
                                                    @else
                                                        <div class="report-box__indicator bg-danger tooltip cursor-pointer"
                                                            title="{{ $totalSalesGrowth }}% Lower than last month">
                                                            {{ $totalSalesGrowth }}% <i data-lucide="chevron-down"
                                                                class="w-4 h-4 ml-0.5"></i> </div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="text-3xl font-medium leading-8 mt-6">{{ $totalSales }}</div>
                                            <div class="text-base text-slate-500 mt-1">Total Sales</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                                    <div class="report-box zoom-in">
                                        <div class="box p-5">
                                            <div class="flex">
                                                <i data-lucide="credit-card" class="report-box__icon text-pending"></i>
                                                <div class="ml-auto">
                                                    @if ($totalParkingGrowthIsHigher)
                                                        <div class="report-box__indicator bg-success tooltip cursor-pointer"
                                                            title="{{ $totalParkingGrowth }}% Higher than last month">
                                                            {{ $totalParkingGrowth }}% <i data-lucide="chevron-up"
                                                                class="w-4 h-4 ml-0.5"></i> </div>
                                                    @else
                                                        <div class="report-box__indicator bg-danger tooltip cursor-pointer"
                                                            title="{{ $totalParkingGrowth }}% Lower than last month">
                                                            {{ $totalParkingGrowth }}% <i data-lucide="chevron-down"
                                                                class="w-4 h-4 ml-0.5"></i> </div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="text-3xl font-medium leading-8 mt-6">{{ $totalParkingBookings }}
                                            </div>
                                            <div class="text-base text-slate-500 mt-1">Total Parking Bookings</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                                    <div class="report-box zoom-in">
                                        <div class="box p-5">
                                            <div class="flex">
                                                <i data-lucide="monitor" class="report-box__icon text-warning"></i>
                                                <div class="ml-auto">
                                                    @if ($totalPassSoldGrowthIsHigher)
                                                        <div class="report-box__indicator bg-success tooltip cursor-pointer"
                                                            title="{{ $totalPassSoldGrowth }}% Higher than last month">
                                                            {{ $totalPassSoldGrowth }}% <i data-lucide="chevron-up"
                                                                class="w-4 h-4 ml-0.5"></i> </div>
                                                    @else
                                                        <div class="report-box__indicator bg-danger tooltip cursor-pointer"
                                                            title="{{ $totalPassSoldGrowth }}% Higher than last month">
                                                            {{ $totalPassSoldGrowth }}% <i data-lucide="chevron-down"
                                                                class="w-4 h-4 ml-0.5"></i> </div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="text-3xl font-medium leading-8 mt-6">{{ $totalPassSold }}</div>
                                            <div class="text-base text-slate-500 mt-1">Total Passes Sold</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                                    <div class="report-box zoom-in">
                                        <div class="box p-5">
                                            <div class="flex">
                                                <i data-lucide="user" class="report-box__icon text-success"></i>
                                                <div class="ml-auto">
                                                    <div class="report-box__indicator bg-success tooltip cursor-pointer"
                                                        title="22% Higher than last month" style="display:none;"> 22% <i
                                                            data-lucide="chevron-up" class="w-4 h-4 ml-0.5"></i> </div>
                                                </div>
                                            </div>
                                            <div class="text-3xl font-medium leading-8 mt-6">{{ $usersTotalCount }}</div>
                                            <div class="text-base text-slate-500 mt-1">Total Users</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END: General Report -->
                        <!-- BEGIN: Sales Report -->
                        <div class="col-span-12 lg:col-span-6 mt-8">
                            <div class="intro-y block sm:flex items-center h-10">
                                <h2 class="text-lg font-medium truncate mr-5">
                                    Sales Report
                                </h2>
                                <div class="sm:ml-auto mt-3 sm:mt-0 relative text-slate-500" style="display:none;">
                                    <i data-lucide="calendar"
                                        class="w-4 h-4 z-10 absolute my-auto inset-y-0 ml-3 left-0"></i>
                                    <input type="text" class="datepicker form-control sm:w-56 box pl-10">
                                </div>
                            </div>
                            <div class="intro-y box p-5 mt-12 sm:mt-5">
                                <div class="flex flex-col md:flex-row md:items-center">
                                    <div class="flex">
                                        <div>
                                            <div class="text-primary dark:text-slate-300 text-lg xl:text-xl font-medium">
                                                {{ $totalSales }}</div>
                                            <div class="mt-0.5 text-slate-500">This Month</div>
                                        </div>
                                        <div
                                            class="w-px h-12 border border-r border-dashed border-slate-200 dark:border-darkmode-300 mx-4 xl:mx-5">
                                        </div>
                                        <div>
                                            <div class="text-slate-500 text-lg xl:text-xl font-medium">
                                                {{ $totalSalesLastMonth }}</div>
                                            <div class="mt-0.5 text-slate-500">Last Month</div>
                                        </div>
                                    </div>

                                </div>
                                <div class="report-chart">
                                    <div class="h-[275px]">
                                        <canvas id="report-line-chart" class="mt-6 -mb-6"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END: Sales Report -->
                        <!-- BEGIN: Weekly Top Seller -->
                        <div class="col-span-12 sm:col-span-6 lg:col-span-3 mt-8">
                            <div class="intro-y flex items-center h-10">
                                <h2 class="text-lg font-medium truncate mr-5">
                                    Vehicle Sales Graph
                                </h2>

                            </div>
                            <div class="intro-y box p-5 mt-5">
                                <div class="mt-3">
                                    <div class="h-[213px]">
                                        <canvas id="report-pie-chart"></canvas>
                                    </div>
                                </div>
                                <div class="w-52 sm:w-auto mx-auto mt-8">
                                    <div class="flex items-center">
                                        <div class="w-2 h-2 bg-primary rounded-full mr-3"></div>
                                        <span class="truncate">4 - Wheeler</span> <span
                                            class="font-medium ml-auto">{{ $vechicleGraphSales['fourWheelerSold'] }}%</span>
                                    </div>
                                    <div class="flex items-center mt-4">
                                        <div class="w-2 h-2 bg-pending rounded-full mr-3"></div>
                                        <span class="truncate">2 - Wheeler</span> <span
                                            class="font-medium ml-auto">{{ $vechicleGraphSales['twoWheelerSold'] }}%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END: Weekly Top Seller -->
                        <!-- BEGIN: Sales Report -->
                        <div class="col-span-12 sm:col-span-6 lg:col-span-3 mt-8">
                            <div class="intro-y flex items-center h-10">
                                <h2 class="text-lg font-medium truncate mr-5">
                                    Passes Sales Graph
                                </h2>

                            </div>
                            <div class="intro-y box p-5 mt-5">
                                <div class="mt-3">
                                    <div class="h-[213px]">
                                        <canvas id="report-donut-chart"></canvas>
                                    </div>
                                </div>
                                <div class="w-52 sm:w-auto mx-auto mt-8">
                                    <div class="flex items-center">
                                        <div class="w-2 h-2 bg-primary rounded-full mr-3"></div>
                                        <span class="truncate">Basic Buddy Pass</span> <span
                                            class="font-medium ml-auto">62%</span>
                                    </div>
                                    <div class="flex items-center mt-4">
                                        <div class="w-2 h-2 bg-pending rounded-full mr-3"></div>
                                        <span class="truncate">Premium Buddy Pass</span> <span
                                            class="font-medium ml-auto">33%</span>
                                    </div>
                                    <div class="flex items-center mt-4">
                                        <div class="w-2 h-2 bg-warning rounded-full mr-3"></div>
                                        <span class="truncate">Standard Buddy Pass</span> <span
                                            class="font-medium ml-auto">10%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END: Sales Report -->
                        <div class="col-span-12 lg:col-span-6">
                            <!-- BEGIN: Vertical Bar Chart -->
                            <div class="intro-y box">
                                <div
                                    class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                                    <h2 class="font-medium text-base mr-auto">
                                        4 Wheeler V/s 2 Wheeler Bookings
                                    </h2>

                                </div>
                                <div id="vertical-bar-chart" class="p-5">
                                    <div class="preview">
                                        <div class="h-[400px]">
                                            <canvas id="vertical-bar-chart-widget"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-12 lg:col-span-6">
                            <!-- BEGIN: Stacked Bar Chart -->
                            <div class="intro-y box">
                                <div
                                    class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                                    <h2 class="font-medium text-base mr-auto">
                                        Four Wheeler Vs Two Wheeler Sales
                                    </h2>

                                </div>
                                <div id="stacked-bar-chart" class="p-5">
                                    <div class="preview">
                                        <div class="h-[400px]">
                                            <canvas id="stacked-bar-chart-widget"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- BEGIN: General Report -->
                        <div class="col-span-12 grid grid-cols-12 gap-6 mt-8">
                            <div class="col-span-12 sm:col-span-6 2xl:col-span-3 intro-y">
                                <div class="box p-5 zoom-in">
                                    <div class="flex items-center">
                                        <div class="w-2/4 flex-none">
                                            <div class="text-lg font-medium truncate">Total Parkings</div>
                                            <div class="text-slate-500 mt-1">{{ $totalParkingsCount }}</div>
                                        </div>
                                        <div class="flex-none ml-auto relative">
                                            <div class="w-[90px] h-[90px]">
                                                <canvas id="report-donut-chart-1"></canvas>
                                            </div>
                                            <div
                                                class="font-medium absolute w-full h-full flex items-center justify-center top-0 left-0">
                                                {{ $totalParkingsCount }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-12 sm:col-span-6 2xl:col-span-3 intro-y">
                                <div class="box p-5 zoom-in">
                                    <div class="flex items-center">
                                        <div class="w-2/4 flex-none">
                                            <div class="text-lg font-medium truncate">Refunds Raised</div>
                                            <div class="text-slate-500 mt-1">{{ $totalRefundRaised }}</div>
                                        </div>
                                        <div class="flex-none ml-auto relative">
                                            <div class="w-[90px] h-[90px]">
                                                <canvas id="report-donut-chart-2"></canvas>
                                            </div>
                                            <div
                                                class="font-medium absolute w-full h-full flex items-center justify-center top-0 left-0">
                                                {{ $totalRefundRaised }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- END: General Report -->
                        <!-- BEGIN: Weekly Top Products -->
                    </div>
                </div>
            </div>
            <!-- END: Content -->
        </div>
        <div id="example-tab-3" class="tab-pane leading-relaxed" role="tabpanel" aria-labelledby="example-3-tab">
            <!-- BEGIN: bookings -->
            <div class="">
                <input type="hidden" id="bookPageNumber" value="1" />
                <div class="grid grid-cols-12 gap-6 mt-5">
                    <div class="intro-y col-span-12 flex flex-wrap xl:flex-nowrap items-center mt-2">
                        <div class="flex w-full sm:w-auto">
                            <div class="w-48 relative text-slate-500">
                                <input type="text" id="userBookSearch" class="form-control w-48 box pr-10"
                                    placeholder="Search by Booking Id..">
                                <i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-lucide="search"></i>
                            </div>
                            <select class="form-select box ml-2" id="userBookStatus">
                                <option value="">Status</option>
                                <option value="Yet to Start">Yet to Start</option>
                                <option value="On Going">On Going</option>
                                <option value="Completed">Completed</option>
                            </select>
                        </div>
                        <div class="hidden xl:block mx-auto text-slate-500"></div>
                        <div class="w-full xl:w-auto flex items-center mt-3 xl:mt-0">
                            <button class="btn btn-primary shadow-md mr-2" style="display:none;"> <i
                                    data-lucide="file-text" class="w-4 h-4 mr-2"></i> Export to Excel </button>
                        </div>
                    </div>
                </div>
                <div class="booking-list-container" id="booking-list-container">
                    @include('admin.parking.booking-list')
                </div>
            </div>
            <!-- END: bookings -->
        </div>
        <div id="example-tab-4" class="tab-pane leading-relaxed" role="tabpanel" aria-labelledby="example-4-tab">
            <!-- BEGIN: passes -->
            <div class="">
                <input type="hidden" id="passPageNumber" value="1" />
                <div class="grid grid-cols-12 gap-6 mt-5">
                    <div class="intro-y col-span-12 flex flex-wrap xl:flex-nowrap items-center mt-2">
                        <div class="flex w-full sm:w-auto">
                            <div class="w-48 relative text-slate-500">
                                <input type="text" id="userPassSearch" class="form-control w-48 box pr-10"
                                    placeholder="Search by Pass Name">
                                <i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-lucide="search"></i>
                            </div>
                        </div>
                        <div class="hidden xl:block mx-auto text-slate-500"></div>
                        <div class="w-full xl:w-auto flex items-center mt-3 xl:mt-0">
                            <button class="btn btn-primary shadow-md mr-2" style="display:none;"> <i
                                    data-lucide="file-text" class="w-4 h-4 mr-2"></i> Export to Excel </button>
                        </div>
                    </div>
                </div>
                <div class="pass-list-container" id="pass-list-container">
                    @include('admin.parking.pass-list')
                </div>
            </div>
            <!-- END: passes -->
        </div>
    </div>
    <!-- END: Profile Info -->
    <!-- END: Main Content -->
@endsection

@section('scripts')
    <script>
        let baseurl = $('#mainUrl').val();
        let parkingProfileId = $("#parkingProfileId").val();
        let parkingUserId = $("#parkingUserId").val();

        $(document).ready(function() {

            //=====================booking listing start===============
            const loadParkingBookings = (page, search_term, userBookStatus, perpage) => {
                $.ajax({
                    method: 'GET',
                    url: `${baseurl}/pb-admin/parking/bookings?page=${page}&seach_term=${search_term}&parkingProfileId=${parkingProfileId}&userBookStatus=${userBookStatus}&perpage=${perpage}`,
                    success: function(response) {
                        $('#booking-list-container').html(response);
                    }
                })
            }

            $(document).on('keyup', '#userBookSearch', function() {
                var search_term = $('#userBookSearch').val();
                let userBookStatus = $("#userBookStatus").val();
                loadParkingBookings(1, search_term, userBookStatus, 0);
            });

            $(document).on('click', '.booking-list-container .pagination a', function(event) {
                event.preventDefault();
                let page = $(this).attr('href').split('page=')[1];
                $("#bookPageNumber").val(page);
                var search_term = $('#userBookSearch').val();
                let userBookStatus = $("#userBookStatus").val();
                loadParkingBookings(page, search_term, userBookStatus, 0);
            });

            $("#userBookStatus").change(function() {
                let search_term = $('#userBookSearch').val();
                let userBookStatus = $("#userBookStatus").val();
                loadParkingBookings(1, search_term, userBookStatus, 0);
            });
            $(document).on('change', '#parkingBook select.perPageSelectBox', function(event) {
                let perpage = $(this).val();
                let search_term = $('#userBookSearch').val();
                let userBookStatus = $("#userBookStatus").val();
                loadParkingBookings(1, search_term, userBookStatus, perpage);
            });
            //================booking listing end===================

            //==========================user pass listing start=================
            const loadParkingUserPasses = (page, search_term, perpage) => {
                $.ajax({
                    method: 'GET',
                    url: `${baseurl}/pb-admin/parking/passes?page=${page}&seach_term=${search_term}&parkingUserId=${parkingUserId}&perpage=${perpage}`,
                    success: function(response) {
                        // $('#pass-list-container').html('');
                        $('#pass-list-container').html(response);
                    }
                })
            }

            $(document).on('keyup', '#userPassSearch', function() {
                var search_term = $('#userPassSearch').val();
                loadParkingUserPasses(1, search_term, 0);
            });

            $(document).on('click', '#example-tab-4 .pagination a', function(event) {
                event.preventDefault();
                let page = $(this).attr('href').split('page=')[1];
                $("#passPageNumber").val(page);
                var search_term = $('#userPassSearch').val();
                loadParkingUserPasses(page, search_term, 0);
            });

            $(document).on('change', '#parkingUserPasses select.perPageSelectBox', function(event) {
                let perpage = $(this).val();
                let search_term = $('#userPassSearch').val();
                loadParkingUserPasses(1, search_term, perpage);
            });
            //================user pass listing end=================================
        });
    </script>
@endsection
