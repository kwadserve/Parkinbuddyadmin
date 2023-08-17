@extends('admin.container')
@section('content')
 <!-- BEGIN: Top Bar -->
<div class="top-bar">
    <!-- BEGIN: Breadcrumb -->
    <nav aria-label="breadcrumb" class="-intro-x mr-auto hidden sm:flex">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Parkinbuddy</a></li>
            <li class="breadcrumb-item active" aria-current="page">Vehicles</li>
        </ol>
    </nav>
    <!-- END: Breadcrumb -->
    @include('admin.topbar')
</div>
<!-- END: Top Bar -->
<!-- BEGIN: Main Content -->
<div class="intro-y flex items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">All Vehicles</h2>
</div>
<div id="example-tab-5" class="tab-pane leading-relaxed" role="tabpanel" aria-labelledby="example-5-tab"> 
     <!-- BEGIN: bookings -->
    <div class="">
        <input type="hidden" id="vehiclePageNumber" value="1" />
        <div class="grid grid-cols-12 gap-6 mt-5">
            <div class="intro-y col-span-12 flex flex-wrap xl:flex-nowrap items-center mt-2">
                <div class="flex w-full sm:w-auto">
                    <div class="w-48 relative text-slate-500">
                        <input type="text" id="userVehicleSearch" class="form-control w-48 box pr-10" placeholder="Search by Vehicle Number">
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
            @include('admin.vehicle.vehicle-list')
        </div>
    </div>
</div>
<input type="hidden" id="pageNumber" value="1" />

<!-- END: Main Content -->
@endsection

@section('scripts')
<script>
    let baseurl = $('#mainUrl').val();
    $(document).ready(function() {
        //==========================user vehicle listing start=================
        const loadUserVehicles = (page,search_term,perpage) => {
            $.ajax({ 
                method: 'GET',
                url:`${baseurl}/pb-admin/vehicles?page=${page}&seach_term=${search_term}&perpage=${perpage}`,
                success:function(response){
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

        $("#userVehicles select.perPageSelectBox").change(function() {
            let perpage = $(this).val();
            let search_term = $('#userVehicleSearch').val();
            loadUserVehicles(1,search_term,perpage);
        });
        //==========================user vehicle listing end=================
    });
    
</script>
@endsection