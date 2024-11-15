@extends('admin.container')
@section('content')
 <!-- BEGIN: Top Bar -->
 <div class="top-bar">
    <!-- BEGIN: Breadcrumb -->
    <nav aria-label="breadcrumb" class="-intro-x mr-auto hidden sm:flex">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Parkinbuddy</a></li>
            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
        </ol>
    </nav>
    <!-- END: Breadcrumb -->
    @include('admin.topbar')
</div>
<!-- END: Top Bar -->
<div class="grid grid-cols-12 gap-6">
    <div class="col-span-12 2xl:col-span-9">
        <div class="grid grid-cols-12 gap-6">
            <!-- BEGIN: General Report -->
            <div class="col-span-12 mt-8">
                <div class="intro-y flex items-center h-10">
                    <h2 class="text-lg font-medium truncate mr-5">
                        General Overview
                    </h2>
                    <a href="" class="ml-auto flex items-center text-primary"> <i data-lucide="refresh-ccw" class="w-4 h-4 mr-3"></i> Reload Data </a>
                </div>
                <div class="grid grid-cols-12 gap-6 mt-5">
                    <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                        <div class="report-box zoom-in">
                            <div class="box p-5">
                                <div class="flex">
                                    <i data-lucide="shopping-cart" class="report-box__icon text-primary"></i> 
                                    <div class="ml-auto">
                                        <div class="report-box__indicator bg-success tooltip cursor-pointer" title="33% Higher than last month"> 33% <i data-lucide="chevron-up" class="w-4 h-4 ml-0.5"></i> </div>
                                    </div>
                                </div>
                                <div class="text-3xl font-medium leading-8 mt-6">4.710</div>
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
                                        <div class="report-box__indicator bg-danger tooltip cursor-pointer" title="2% Lower than last month"> 2% <i data-lucide="chevron-down" class="w-4 h-4 ml-0.5"></i> </div>
                                    </div>
                                </div>
                                <div class="text-3xl font-medium leading-8 mt-6">3.721</div>
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
                                        <div class="report-box__indicator bg-success tooltip cursor-pointer" title="12% Higher than last month"> 12% <i data-lucide="chevron-up" class="w-4 h-4 ml-0.5"></i> </div>
                                    </div>
                                </div>
                                <div class="text-3xl font-medium leading-8 mt-6">2.149</div>
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
                                        <div class="report-box__indicator bg-success tooltip cursor-pointer" title="22% Higher than last month"> 22% <i data-lucide="chevron-up" class="w-4 h-4 ml-0.5"></i> </div>
                                    </div>
                                </div>
                                <div class="text-3xl font-medium leading-8 mt-6">152.040</div>
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
                    <div class="sm:ml-auto mt-3 sm:mt-0 relative text-slate-500">
                        <i data-lucide="calendar" class="w-4 h-4 z-10 absolute my-auto inset-y-0 ml-3 left-0"></i> 
                        <input type="text" class="datepicker form-control sm:w-56 box pl-10">
                    </div>
                </div>
                <div class="intro-y box p-5 mt-12 sm:mt-5">
                    <div class="flex flex-col md:flex-row md:items-center">
                        <div class="flex">
                            <div>
                                <div class="text-primary dark:text-slate-300 text-lg xl:text-xl font-medium">15,000</div>
                                <div class="mt-0.5 text-slate-500">This Month</div>
                            </div>
                            <div class="w-px h-12 border border-r border-dashed border-slate-200 dark:border-darkmode-300 mx-4 xl:mx-5"></div>
                            <div>
                                <div class="text-slate-500 text-lg xl:text-xl font-medium">10,000</div>
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
                            <span class="truncate">4 - Wheeler</span> <span class="font-medium ml-auto">62%</span> 
                        </div>
                        <div class="flex items-center mt-4">
                            <div class="w-2 h-2 bg-pending rounded-full mr-3"></div>
                            <span class="truncate">2 - Wheeler</span> <span class="font-medium ml-auto">33%</span> 
                        </div>
                        <div class="flex items-center mt-4">
                            <div class="w-2 h-2 bg-warning rounded-full mr-3"></div>
                            <span class="truncate">Other</span> <span class="font-medium ml-auto">10%</span> 
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
                            <span class="truncate">Basic Buddy Pass</span> <span class="font-medium ml-auto">62%</span> 
                        </div>
                        <div class="flex items-center mt-4">
                            <div class="w-2 h-2 bg-pending rounded-full mr-3"></div>
                            <span class="truncate">Premium Buddy Pass</span> <span class="font-medium ml-auto">33%</span> 
                        </div>
                        <div class="flex items-center mt-4">
                            <div class="w-2 h-2 bg-warning rounded-full mr-3"></div>
                            <span class="truncate">Standard Buddy Pass</span> <span class="font-medium ml-auto">10%</span> 
                        </div>
                    </div>
                </div>
            </div>
            <!-- END: Sales Report -->
            <div class="col-span-12 lg:col-span-6">
                <!-- BEGIN: Vertical Bar Chart -->
                <div class="intro-y box">
                    <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
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
                    <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                        <h2 class="font-medium text-base mr-auto">
                            Two Wheeler Vs Four Wheeler Sales
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
                                <div class="text-slate-500 mt-1">25</div>
                            </div>
                            <div class="flex-none ml-auto relative">
                                <div class="w-[90px] h-[90px]">
                                    <canvas id="report-donut-chart-1"></canvas>
                                </div>
                                <div class="font-medium absolute w-full h-full flex items-center justify-center top-0 left-0">25</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-span-12 sm:col-span-6 2xl:col-span-3 intro-y">
                    <div class="box p-5 zoom-in">
                        <div class="flex items-center">
                            <div class="w-2/4 flex-none">
                                <div class="text-lg font-medium truncate">Refunds Raised</div>
                                <div class="text-slate-500 mt-1">50</div>
                            </div>
                            <div class="flex-none ml-auto relative">
                                <div class="w-[90px] h-[90px]">
                                    <canvas id="report-donut-chart-2"></canvas>
                                </div>
                                <div class="font-medium absolute w-full h-full flex items-center justify-center top-0 left-0">50</div>
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
@endsection