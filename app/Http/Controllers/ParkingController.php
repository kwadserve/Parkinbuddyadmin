<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Parking;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Models\Booking;
use App\Models\UserPass;
use App\Models\Vehicle;
use Carbon\Carbon;
use App\Models\ParkingPass;
use App\Models\Refund;

class ParkingController extends Controller
{
    public function index(Request $request)
    {
        $configPerPage = Config::get('custom.perPageRecord');
        $perPage = ($request->input('perpage') && $request->filled('perpage')) ? $request->input('perpage') : $configPerPage;
        
        // $perPage = 1; //comment later

        $user = Auth::user();
        $userData = User::with('role')->where("id",$user['id'])->first(); 

        $parkingIdArray = [];
        if ($userData['role']['role'] == 'operator' || $userData['role']['role'] == 'manager') {
            $ids = DB::table('assign_parkings')
                ->select(DB::raw('GROUP_CONCAT(DISTINCT parking_id) as parking_ids'))
                ->where('manager_id', $user['id'])
                ->groupBy('manager_id')
                ->get();

            if ($ids->isNotEmpty()) {
                $parkingids = $ids[0]->parking_ids;
                $parkingIdArray = explode(',', $parkingids);
            } 
        }

        if($request->ajax()){
            $searchKey = $request->input('search_term');
            
            $query = Parking::query();

            if ($parkingIdArray && !empty($parkingIdArray)) {
                $query->where(function ($subquery) use ($parkingIdArray) {
                    $subquery->whereIn('id', $parkingIdArray);
                });
            }

            if ($searchKey && !empty($searchKey)) {
                $query->where(function ($subquery) use ($searchKey) {
                    $subquery->where('name', 'like', '%'.$searchKey.'%');
                });
            }

            $parkingsData = $query->paginate($perPage);
            return view('admin.parking.parking-list', compact('parkingsData'))->render();
        }else{
            $query = Parking::query();

            if ($parkingIdArray && !empty($parkingIdArray)) {
                $query->where(function ($subquery) use ($parkingIdArray) {
                    $subquery->whereIn('id', $parkingIdArray);
                });
            }
            $parkingsData = $query->paginate($perPage);
             // dd($query->toSql());
            return view('admin.parking.index', compact('parkingsData'));
        }
    }

    public function viewDetail($id){
        $configPerPage = Config::get('custom.perPageRecord');
        $perPage = $configPerPage;
        // $perPage = 2;
        $parkingDetails = Parking::where('id', $id)->first(); 
        $bookingData = Booking::where("parking_id",$parkingDetails['id'])->paginate($perPage);
        $userBookingCount = $bookingData->total();
       
        $allBookingData = Booking::where("parking_id",$parkingDetails['id']);
        $userBookingCashCollection = $allBookingData->sum('cash_collection');
        $userBookingChargeCollection = $allBookingData->sum('charges');
       
        $parkingAssignPass = ParkingPass::where("parking_id",$parkingDetails['id'])->pluck('pass_id')->first();

        $userPassData = UserPass::select('user_passes.*', 'passes.code as code', 'passes.title as title','passes.vehicle_type as vehicle_type','passes.expiry_time as expiry_time','passes.amount as amount','passes.total_hours as total_hours')
        ->join('passes', 'user_passes.pass_id', '=', 'passes.id')
        ->where('user_passes.pass_id', $parkingAssignPass) 
        ->paginate($perPage);

        $totalParkingsCount = Parking::all()->count();
       
        // Get the current total sales and total parking calc
        $currentDate = Carbon::now();
        $firstDayOfMonth = $currentDate->firstOfMonth()->toDateTimeString();
        $lastDayOfMonth = $currentDate->lastOfMonth()->endOfDay()->toDateTimeString();
      
        $graphTotalBookingsOfMonth = $this->calculateMonthSale($parkingDetails['id'],$firstDayOfMonth,$lastDayOfMonth,true,null);
        $totalSales = $graphTotalBookingsOfMonth['totalSales'];
        $totalParkingBookings = $graphTotalBookingsOfMonth['totalParkingBookings'];
        $totalRefundRaised = $graphTotalBookingsOfMonth['totalRefundRaised'] ?? 0;

        $lastMonthFirstDay = $currentDate->subMonthNoOverflow()->firstOfMonth()->toDateTimeString();
        $currentDateCalc = Carbon::now();
        $lastMonthLastDay = $currentDateCalc->subMonthNoOverflow()->lastOfMonth()->endOfDay()->toDateTimeString();
        
        $graphTotalBookingsOfLastMonth = $this->calculateMonthSale($parkingDetails['id'],$lastMonthFirstDay,$lastMonthLastDay,false,null);
        $totalSalesLastMonth = $graphTotalBookingsOfLastMonth['totalSales'];
        $totalParkingBookingsLastMonth = $graphTotalBookingsOfLastMonth['totalParkingBookings'];
       
        $salesGrowth = $this->growthCalculator($totalSales,$totalSalesLastMonth);
        $totalSalesGrowth = $salesGrowth['growth'];
        $totalSalesIsHigher = $salesGrowth['isHigher'];
        
        $totalParkingGrowthData = $this->growthCalculator($totalParkingBookings,$totalParkingBookingsLastMonth);
        $totalParkingGrowth = $totalParkingGrowthData['growth'];
        $totalParkingGrowthIsHigher = $totalParkingGrowthData['isHigher'];
        // Get the current total sales and total parking calc

        //total pass sold calc
        $getSoldPassData = $this->calculateMonthSoldPass($parkingAssignPass,$firstDayOfMonth,$lastDayOfMonth);
        $totalPassSold = $getSoldPassData['total'];
        
        $getSoldPassDataOfLastMonth = $this->calculateMonthSoldPass($parkingAssignPass,$lastMonthFirstDay,$lastMonthLastDay);
        $totalPassSoldLastMonth = $getSoldPassDataOfLastMonth['total'];
        
        $totalPassSoldGrowthData = $this->growthCalculator($totalPassSold,$totalPassSoldLastMonth);
        $totalPassSoldGrowth = $totalPassSoldGrowthData['growth'];
        $totalPassSoldGrowthIsHigher = $totalPassSoldGrowthData['isHigher'];
        //total pass sold calc

        //total users
        $usersTotalCount = User::where("role_id",2)->count(); 
        //total users

        //sales report
        $extraFilter = array("salesReport" => true);
        $salesReportData = $this->calculateYearlySale($parkingDetails['id'],$extraFilter);
        $salesReportData = $salesReportData['salesReport'];
        //sales report

        //vehicle sale graph
        $vechicleGraphSales = $this->calculateVechicleSales($graphTotalBookingsOfMonth['fourWheelerCount'], $graphTotalBookingsOfMonth['twoWheelerCount']);
        $vechicleSalesGraphFeed = array($vechicleGraphSales['fourWheelerSold'],$vechicleGraphSales['twoWheelerSold']);
        //vehicle sale graph

        //vehicle bookings line chart
        $extraFilter = array("vehicleBookingsChart" => true);
        $vehicleBookingsChart = $this->calculateYearlySale($parkingDetails['id'],$extraFilter);
        $vehicleBookingsChartFourWheel = $vehicleBookingsChart['vehicleBookingsChart']['fourWheelerCount'];
        $vehicleBookingsChartTwoWheel = $vehicleBookingsChart['vehicleBookingsChart']['twoWheelerCount'];
        //vehicle bookings line chart

        //vehicle sales line chart
        $extraFilter = array("vehicleSalesChart" => true);
        $vechicleSalesChart = $this->calculateYearlySale($parkingDetails['id'],$extraFilter);
        $vechicleSalesChartFourWheel = $vechicleSalesChart['vehicleSalesChart']['fourWheelerSales'];
        $vechicleSalesChartTwoWheel = $vechicleSalesChart['vehicleSalesChart']['twoWheelerSales'];
        
        //vehicle sales line chart

        return view('admin.parking.detail', compact('parkingDetails','userBookingCount','userBookingCashCollection','userBookingChargeCollection','bookingData','userPassData','totalParkingBookings','totalSales','totalParkingsCount','totalSalesGrowth','totalSalesIsHigher','totalParkingGrowth','totalParkingGrowthIsHigher','totalPassSold','totalPassSoldGrowthIsHigher','totalPassSoldGrowth','totalSalesLastMonth','totalRefundRaised','vechicleGraphSales','vechicleSalesGraphFeed','usersTotalCount','salesReportData','vehicleBookingsChartFourWheel','vehicleBookingsChartTwoWheel','vechicleSalesChartFourWheel','vechicleSalesChartTwoWheel'));
    }

    public function parkingBookingListing(Request $request){
        $configPerPage = Config::get('custom.perPageRecord');
        $perPage = ($request->input('perpage') && $request->filled('perpage')) ? $request->input('perpage') : $configPerPage;
        // $perPage = 2;
        $bookingData = Booking::query()
                        ->where("parking_id",$request->parkingProfileId)
                        ->when($request->filled('userBookStatus'), function ($query) use ($request) {
                            return $query->where('status', $request->userBookStatus);
                        })
                        ->when($request->seach_term, function($q)use($request){
                            $q->where('booking_id', 'like', '%'.$request->seach_term.'%');
                        })
                        ->paginate($perPage);
            return view('admin.parking.booking-list', compact('bookingData'))->render();
    }

    public function parkingUserPassesListing(Request $request){
        $configPerPage = Config::get('custom.perPageRecord');
        $perPage = ($request->input('perpage') && $request->filled('perpage')) ? $request->input('perpage') : $configPerPage;
        $searchKey = $request->input('seach_term');
        $parkingUserId = $request->input('parkingUserId');
        
        $query  = UserPass::select('user_passes.*', 'passes.code as code', 'passes.title as title','passes.vehicle_type as vehicle_type','passes.expiry_time as expiry_time','passes.amount as amount','passes.total_hours as total_hours')
        ->join('passes', 'user_passes.pass_id', '=', 'passes.id')
        ->where('user_passes.user_id', $parkingUserId);
        
        if ($searchKey) {
            $query->where(function ($subquery) use ($searchKey) {
                $subquery->where('passes.title', 'like', '%' . $searchKey . '%');
            });
        }

        $userPassData = $query->paginate($perPage);

        return view('admin.parking.pass-list', compact('userPassData'))->render();
    }

    public function calculateMonthSale($parkingId,$startdate,$enddate,$iscurrentMonth,$extras=array()) {
        
        $graphTotalBookingsOfMonth = Booking::where('parking_id',$parkingId)->whereBetween('created_at', [$startdate, $enddate])->get();

        if(isset($extras['filterFourWheelerSale']) && $extras['filterFourWheelerSale'])
        {
            $graphTotalBookingsOfMonth = Booking::where('parking_id',$parkingId)->whereBetween('created_at', [$startdate, $enddate])->where('vehicle_type',1)->get();
        }else if(isset($extras['filterFourWheelerSale']) && $extras['filterFourWheelerSale']){
            $graphTotalBookingsOfMonth = Booking::where('parking_id',$parkingId)->whereBetween('created_at', [$startdate, $enddate])->where('vehicle_type',0)->get();
        }

        $totalParkingBookings = count($graphTotalBookingsOfMonth);
        $totalSales = 0;
        $bookingIds = array();
        $fourWheelerCount = 0;
        $twoWheelerCount = 0;

        foreach ($graphTotalBookingsOfMonth as $bookingKey => $bookingValue) {
            $bookingIds[] = $bookingValue['id'];
            if($bookingValue['vehicle_type'] == 1)
                $fourWheelerCount++;
            else
                $twoWheelerCount++;
            $totalSales += $bookingValue['charges'] + $bookingValue['cash_collection'];
        }
        
        $response = array(
            'totalSales' => $totalSales,
            'totalParkingBookings' => $totalParkingBookings
        );

        if($iscurrentMonth){
            $getRefundRaisedData = Refund::where('status',0)->whereIn('booking_id', $bookingIds)->count();
            $response['totalRefundRaised'] = $getRefundRaisedData;
            $response['fourWheelerCount'] = $fourWheelerCount;
            $response['twoWheelerCount'] = $twoWheelerCount;

        }

        return $response;
    }

    public function growthCalculator($currentMonth,$previousMonth)
    {
        $isPlusOrMinus = $currentMonth - $previousMonth;
        // dd($isPlusOrMinus,$currentMonth,$previousMonth);
        if($previousMonth != 0){
            $devideByPrevious = $isPlusOrMinus/$previousMonth;
            $growthRate = $devideByPrevious * 100;
        }else{
            $growthRate = $isPlusOrMinus;
        }
       
        
        $isHigher = true;
        if($isPlusOrMinus < 0){ //if decrement
            $isHigher = false;
        }

        $response = array (
            'growth' =>  explode('.', abs(round($growthRate,0)))[0],
            'isHigher' => $isHigher
        );
        return $response;
    }

    public function calculateMonthSoldPass($parkingAssignPass,$startdate,$enddate){
        $parkingUserPassData = UserPass::where('pass_id', $parkingAssignPass) 
        ->whereBetween('created_at', [$startdate, $enddate])
        ->get();

        $response = array(
            'total' => count($parkingUserPassData)
        );
        return $response;
    }

    public function calculateVechicleSales($fourWheeler,$twoWheeler){
        $totalUnitsSold = $fourWheeler+$twoWheeler;
        
        $percentageFourWheelerSold = 0;
        $percentageTwoWheelerSold = 0;
        if(!empty($totalUnitsSold))
        {
            $percentageFourWheelerSold = ($fourWheeler != 0) ? round(($fourWheeler / $totalUnitsSold) * 100) : 0;
            $percentageTwoWheelerSold = ($twoWheeler != 0) ? round(($twoWheeler / $totalUnitsSold) * 100) : 0;
        }
        
        $response = array(
            'fourWheelerCount' => $fourWheeler,
            'fourWheelerSold' => (int) $percentageFourWheelerSold,
            'twoWheelerCount' => $twoWheeler,
            'twoWheelerSold' => (int) $percentageTwoWheelerSold,
        );
        return $response;
    }

    public function calculateYearlySale($parkingId,$extraFilter)
    {
        $currentYear = Carbon::now()->year;;
        $montlySalesReportData = array();
        $monthlyVechicleBookingsData = array(
            'fourWheelerCount' => array(),
            'twoWheelerCount' => array(),
        );
        $monthlyVechicleSalesData = array(
            'fourWheelerSales' => array(),
            'twoWheelerSales' => array(),
        );
        for ($month = 1; $month <= 12; $month++) {
            // Create a Carbon instance for the first day of the current month
            $monthWiseStartDate = Carbon::create($currentYear, $month, 1)->startOfDay();
            $monthWiseStartDate = $monthWiseStartDate->format('Y-m-d H:i:s');

            // Create a Carbon instance for the last day of the current month
            $monthWiseEndDate = Carbon::create($currentYear, $month, 1)->endOfMonth()->endOfDay();
            $monthWiseEndDate = $monthWiseEndDate->format('Y-m-d H:i:s');
            
            $extras = array();
            $togetVehicleCount = false;
            if(isset($extraFilter['vehicleBookingsChart']) && $extraFilter['vehicleBookingsChart'])
            {
              $togetVehicleCount = true;
              $getMonthVechicleData = $this->calculateMonthSale($parkingId,$monthWiseStartDate,$monthWiseEndDate,$togetVehicleCount,$extras);
              
              $monthlyVechicleBookingsData['fourWheelerCount'][] = $getMonthVechicleData['fourWheelerCount'];
              $monthlyVechicleBookingsData['twoWheelerCount'][] = $getMonthVechicleData['twoWheelerCount'];
            }else if(isset($extraFilter['vehicleSalesChart']) && $extraFilter['vehicleSalesChart']){
                $extras = array('filterFourWheelerSale' => true);
                $getMonthlyFourWheelSaleData = $this->calculateMonthSale($parkingId,$monthWiseStartDate,$monthWiseEndDate,$togetVehicleCount,$extras);
                $monthlyVechicleSalesData['fourWheelerSales'][] = $getMonthlyFourWheelSaleData['totalSales'];

                $extras = array('filterTwoWheelerSale' => true);
                $getMonthlyTwoWheelSaleData = $this->calculateMonthSale($parkingId,$monthWiseStartDate,$monthWiseEndDate,$togetVehicleCount,$extras);
                $monthlyVechicleSalesData['twoWheelerSales'][] = $getMonthlyTwoWheelSaleData['totalSales'];
            }else{
                $getMonthSaleData = $this->calculateMonthSale($parkingId,$monthWiseStartDate,$monthWiseEndDate,$togetVehicleCount,$extras);
                $montlySalesReportData[] = $getMonthSaleData['totalSales'];
            }
           
        }

        $response = array(
            'salesReport' => $montlySalesReportData,
            'vehicleBookingsChart' => $monthlyVechicleBookingsData,
            'vehicleSalesChart' => $monthlyVechicleSalesData
        );
        return $response;
    }   
}
