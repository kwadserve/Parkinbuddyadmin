@extends('admin.container')
@section('content')
 <!-- BEGIN: Top Bar -->
<div class="top-bar">
    <!-- BEGIN: Breadcrumb -->
    <nav aria-label="breadcrumb" class="-intro-x mr-auto hidden sm:flex">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Parkinbuddy</a></li>
            <li class="breadcrumb-item active" aria-current="page">Bookings</li>
        </ol>
    </nav>
    <!-- END: Breadcrumb -->
    @include('admin.topbar')
</div>
<!-- END: Top Bar -->
<!-- BEGIN: Main Content -->
<div class="intro-y flex items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">All Bookings</h2>
</div>
<div id="example-tab-3" class="tab-pane leading-relaxed" role="tabpanel" aria-labelledby="example-3-tab"> 
     <!-- BEGIN: bookings -->
    <div class="">
        <input type="hidden" id="vehiclePageNumber" value="1" />
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
            @include('admin.booking.booking-list')
        </div>
    </div>
</div>

<!-- END: Main Content -->
@endsection

@section('scripts')
<script>
    let baseurl = $('#mainUrl').val();
    $(document).ready(function() {
        //==========================user vehicle listing start=================
        //=====================booking listing start===============
        const loadUserBookings = (page,search_term,userBookStatus,perpage) => {
            $.ajax({ 
                method: 'GET',
                url:`${baseurl}/pb-admin/bookings?page=${page}&seach_term=${search_term}&userBookStatus=${userBookStatus}&perpage=${perpage}`,
                success:function(response){
                    console.log(23232)
                    $('#booking-list-container').html('');
                    $('#booking-list-container').html(response);
                }
            })
        }
  
        $(document).on('keyup', '#userBookSearch', function(){
            var search_term = $('#userBookSearch').val();
            let userBookStatus = $("#userBookStatus").val();
            loadUserBookings(1,search_term,userBookStatus,0);
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
        
        
        // const refreshUserListing = () => {
        //     var search_term = $('#userVehicleSearch').val();
        //     loadUserVehicles(1,search_term,0); // Load the first page of users
        // }
        // setInterval(refreshUserListing, 10000);
         //================booking listing end===================
    });
    
</script>
@endsection