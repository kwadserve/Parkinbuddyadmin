@extends('admin.container')
@section('content')
 <!-- BEGIN: Top Bar -->
<div class="top-bar">
    <!-- BEGIN: Breadcrumb -->
    <nav aria-label="breadcrumb" class="-intro-x mr-auto hidden sm:flex">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Parkinbuddy</a></li>
            <li class="breadcrumb-item active" aria-current="page">User Profile</li>
        </ol>
    </nav>
    <!-- END: Breadcrumb -->
    @include('admin.topbar')
</div>
<!-- END: Top Bar -->
<!-- BEGIN: Main Content -->
<div class="intro-y flex items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">
        Profile Page
    </h2>
</div>
<input type="hidden" id="userProfileId" value="{{$userDetails->id}}" />
<div class="intro-y box px-5 pt-5 mt-5">
    <div class="flex flex-col lg:flex-row border-b border-slate-200/60 dark:border-darkmode-400 pb-5 -mx-5">
        <div class="flex flex-1 px-5 items-center justify-center lg:justify-start">
            <div class="w-20 h-20 sm:w-24 sm:h-24 flex-none lg:w-32 lg:h-32 image-fit relative">
                <img alt="Midone - HTML Admin Template" class="rounded-full" src="{{ URL::asset('dist/images/pblogobw.png') }}">
            </div>
            <div class="ml-5">
                <div class="w-24 sm:w-40 truncate sm:whitespace-normal font-medium text-lg">
                    @if($userDetails && $userDetails->name != null) {{$userDetails->name}}
                    @else {{'-'}}
                    @endif
                </div>
            </div>
        </div>
        <div class="mt-6 lg:mt-0 flex-1 px-5 border-l border-r border-slate-200/60 dark:border-darkmode-400 border-t lg:border-t-0 pt-5 lg:pt-0">
            <div class="font-medium text-center lg:text-left lg:mt-3">Contact Details</div>
            <div class="flex flex-col justify-center items-center lg:items-start mt-4">
                
                <div class="truncate sm:whitespace-normal flex items-center"> <i data-lucide="mail" class="w-4 h-4 mr-2"></i>
                    @if($userDetails && $userDetails->email != null) {{$userDetails->email}}
                    @else {{'-'}}
                    @endif
                </div>
                <div class="truncate sm:whitespace-normal flex items-center mt-3"> <i data-lucide="phone" class="w-4 h-4 mr-2"></i>
                    @if($userDetails && $userDetails->phone != null) {{$userDetails->phone}}
                    @else {{'-'}} 
                    @endif
                </div>
            </div>
        </div>
        <div class="mt-6 lg:mt-0 flex-1 flex items-center justify-center px-5 border-t lg:border-0 border-slate-200/60 dark:border-darkmode-400 pt-5 lg:pt-0">
            <div class="text-center rounded-md w-20 py-3">
                <div class="font-medium text-primary text-xl">{{$userBookingCount}}</div>
                <div class="text-slate-500">Total Bookings</div>
            </div>
            <div class="text-center rounded-md w-20 py-3">
                <div class="font-medium text-primary text-xl">{{$userBookingCashCollection + $userBookingChargeCollection}}</div>
                <div class="text-slate-500">Total Collection</div>
            </div>
            
        </div>
    </div>
    <ul class="nav nav-link-tabs flex-col sm:flex-row justify-center lg:justify-start text-center" role="tablist" >
        <li id="example-3-tab" class="nav-item" role="presentation">
            <a href="javascript:;" class="nav-link py-4 flex items-center active" data-tw-toggle="pill" data-tw-target="#example-tab-3" type="button" role="tab" aria-controls="example-tab-3"
            aria-selected="true" > <i class="w-4 h-4 mr-2" data-lucide="list"></i> Bookings </a>
        </li>
        <li id="example-4-tab" class="nav-item" role="presentation">
            <a href="javascript:;" class="nav-link py-4 flex items-center" data-tw-toggle="pill" data-tw-target="#example-tab-4" type="button" role="tab" aria-controls="example-tab-4"
            aria-selected="false"> <i class="w-4 h-4 mr-2" data-lucide="film"></i> Passes </a>
        </li>
        <li id="example-5-tab" class="nav-item" role="presentation">
            <a href="javascript:;" class="nav-link py-4 flex items-center" data-tw-toggle="pill" data-tw-target="#example-tab-5" type="button" role="tab" aria-controls="example-tab-4"
            aria-selected="false"> <i class="w-4 h-4 mr-2" data-lucide="anchor"></i> User Vehicles </a>
        </li>
    </ul>
</div>
<div class="tab-content mt-5">
    <div id="example-tab-3" class="tab-pane leading-relaxed active" role="tabpanel" aria-labelledby="example-3-tab">
        <!-- BEGIN: bookings -->
        <div class="">
            <input type="hidden" id="bookPageNumber" value="1" />
            <div class="grid grid-cols-12 gap-6 mt-5">
                <div class="intro-y col-span-12 flex flex-wrap xl:flex-nowrap items-center mt-2">
                    <div class="flex w-full sm:w-auto">
                        <div class="w-48 relative text-slate-500">
                            <input type="text" id="userBookSearch" class="form-control w-48 box pr-10" placeholder="Search by Booking Id..">
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
                        <button class="btn btn-primary shadow-md mr-2"> <i data-lucide="file-text" class="w-4 h-4 mr-2"></i> Export to Excel </button>
                    </div>
                </div>
            </div>
            <div class="booking-list-container" id="booking-list-container">
                @include('admin.user.booking-list')
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
                        <input type="text" id="userPassSearch" class="form-control w-48 box pr-10" placeholder="Search by Pass Name">
                        <i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-lucide="search"></i> 
                    </div>    
                </div>
                <div class="hidden xl:block mx-auto text-slate-500"></div>
                <div class="w-full xl:w-auto flex items-center mt-3 xl:mt-0">
                    <button class="btn btn-primary shadow-md mr-2"> <i data-lucide="file-text" class="w-4 h-4 mr-2"></i> Export to Excel </button>
                </div>
            </div>
        </div>
        <div class="pass-list-container" id="pass-list-container">
            @include('admin.user.pass-list')
        </div>
    </div>
       <!-- END: passes -->
    </div>
    <div id="example-tab-5" class="tab-pane leading-relaxed" role="tabpanel" aria-labelledby="example-4-tab">
        <!-- BEGIN: passes -->
        <div class="">
            <input type="hidden" id="vehiclePageNumber" value="1" />
            <div class="grid grid-cols-12 gap-6 mt-5">
                <div class="intro-y col-span-12 flex flex-wrap xl:flex-nowrap items-center mt-2">
                    <div class="flex w-full sm:w-auto">
                        <div class="w-48 relative text-slate-500">
                            <input type="text" class="form-control w-48 box pr-10" id="userVehicleSearch" placeholder="Search by Vehicle Number">
                            <i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-lucide="search"></i> 
                        </div>    
                    </div>
                    <div class="hidden xl:block mx-auto text-slate-500"></div>
                    <div class="w-full xl:w-auto flex items-center mt-3 xl:mt-0">
                        <button class="btn btn-primary shadow-md mr-2"> <i data-lucide="file-text" class="w-4 h-4 mr-2"></i> Export to Excel </button>
                    </div>
                </div>
            </div>
            <div class="vehicle-list-container" id="vehicle-list-container">
                @include('admin.user.vehicle-list')
            </div>
        </div>
        <!-- END: passes -->
    </div>
</div>
<!-- END: Main Content -->
@endsection

@section('scripts')
<script>
    let baseurl = $('#mainUrl').val();
    let userProfileId= $("#userProfileId").val();
    

    $(document).ready(function() {

        //=====================booking listing start===============
        const loadUserBookings = (page,search_term,userBookStatus,perpage) => {
            $.ajax({ 
                method: 'GET',
                url:`${baseurl}/pb-admin/user/bookings?page=${page}&seach_term=${search_term}&userProfileId=${userProfileId}&userBookStatus=${userBookStatus}&perpage=${perpage}`,
                success:function(response){
                    console.log(23232)
                    $('#booking-list-container').html('');
                    $('#booking-list-container').html(response);
                }
            })
        }
  
        $(document).on('keyup', '#userBookSearch', function(){
            var seach_term = $('#userBookSearch').val();
            let userBookStatus = $("#userBookStatus").val();
            loadUserBookings(1,seach_term,userBookStatus,0);
        });

        $(document).on('click', '.booking-list-container .pagination a', function(event) {
            event.preventDefault();
            let page = $(this).attr('href').split('page=')[1];
            $("#bookPageNumber").val(page);
            var search_term = $('#userBookSearch').val();
            let userBookStatus = $("#userBookStatus").val();
            loadUserBookings(page,search_term,userBookStatus,0);
        }); 
        
        $("#userBookStatus").change(function() { 
            let search_term = $('#userBookSearch').val();
            let userBookStatus = $("#userBookStatus").val();
            loadUserBookings(1,search_term,userBookStatus,0);
        });
        $(document).on('change', '#userBook select.perPageSelectBox', function(event) {
            let perpage = $(this).val(); 
            let search_term = $('#userBookSearch').val();
            let userBookStatus = $("#userBookStatus").val();
            loadUserBookings(1,search_term,userBookStatus,perpage);
        });
         //================booking listing end===================
        //==========================user pass listing start=================
        const loadUserPasses = (page,search_term,perpage) => {
            $.ajax({ 
                method: 'GET',
                url:`${baseurl}/pb-admin/user/passes?page=${page}&seach_term=${search_term}&userProfileId=${userProfileId}&perpage=${perpage}`,
                success:function(response){
                    // $('#pass-list-container').html('');
                    $('#pass-list-container').html(response);
                }
            })
        }

        $(document).on('keyup', '#userPassSearch', function(){
            var seach_term = $('#userPassSearch').val();
            loadUserPasses(1,seach_term,0);
        });

        $(document).on('click', '#example-tab-4 .pagination a', function(event) {
            event.preventDefault();
            let page = $(this).attr('href').split('page=')[1];
            $("#passPageNumber").val(page);
            var search_term = $('#userPassSearch').val();
            loadUserPasses(page,search_term,0);
        });

        $(document).on('change', '#userPasses select.perPageSelectBox', function(event) {
            let perpage = $(this).val();
            let search_term = $('#userPassSearch').val();
            loadUserPasses(1,search_term,perpage);
        });
        //================user pass listing end=================================
        //==========================user vehicle listing start=================
        const loadUserVehicles = (page,search_term,perpage) => {
            $.ajax({ 
                method: 'GET',
                url:`${baseurl}/pb-admin/user/vehicles?page=${page}&seach_term=${search_term}&userProfileId=${userProfileId}&perpage=${perpage}`,
                success:function(response){
                    // $('#pass-list-container').html('');
                    $('#vehicle-list-container').html(response);
                }
            })
        }

        $(document).on('keyup', '#userVehicleSearch', function(){
            var seach_term = $('#userVehicleSearch').val();
            loadUserVehicles(1,seach_term,0);
        });
        
        $(document).on('click', '#example-tab-5 .pagination a', function(event) {
            event.preventDefault();
            let page = $(this).attr('href').split('page=')[1];
            $("#vehiclePageNumber").val(page);
            var search_term = $('#userVehicleSearch').val();
            loadUserVehicles(page,search_term,0);
        });

        $(document).on('change', '#userVehicles select.perPageSelectBox', function(event) {
            let perpage = $(this).val();
            let search_term = $('#userVehicleSearch').val();
            loadUserVehicles(1,search_term,perpage);
        });
        //==========================user vehicle listing end=================
    });    
</script>
@endsection