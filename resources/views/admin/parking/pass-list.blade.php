<?php
    use App\Models\User;
    use App\Models\Pass;
?>
<div class="grid grid-cols-12 gap-6 mt-5">
            <!-- BEGIN: Data List -->
    <div class="intro-y col-span-12 overflow-y-auto 2xl:overflow-visible">
        <table class="table table-report -mt-2">
            <thead>
                <tr>
                    <th class="whitespace-nowrap">VEHICLE</th>
                    <th class="text-center whitespace-nowrap">PASS</th>
                    <th class="text-center whitespace-nowrap">USER</th>
                    <th class="text-center whitespace-nowrap">DATE OF PURCHASE</th>
                    <th class="text-center whitespace-nowrap">EXPIRY DATE</th>
                    <th class="text-center whitespace-nowrap">HOURS LEFT</th>
                    <th class="text-center whitespace-nowrap">AMOUNT PAID</th>
                    <th class="text-center whitespace-nowrap">PAYMENT ID</th>
                    <th class="text-center whitespace-nowrap">CREATED AT</th>
                    <th class="text-right whitespace-nowrap">UPDATED AT</th>
                </tr>
            </thead>
            <tbody>
            @if($userPassData->count() > 0)
                @foreach ($userPassData as $userPass)
                <?php 
                    $userDetails =  User::where('id', $userPass['user_id'])->first();
                ?>
                <tr class="intro-x">
                    <td class="text-center">
                        <div class="w-10 h-10 flex-none image-fit object-fit-contain-vehicle rounded-md overflow-hidden">
                            @if($userPass->vehicle_type == 1)
                                <img class="object-fit-contain-vehicle" alt="Car" src="{{ URL::asset('dist/images/car.svg') }}">
                            @else
                                <img class="object-fit-contain-vehicle" alt="Bike" src="{{ URL::asset('dist/images/bikeyellow.svg') }}">
                            @endif
                        </div>
                    </td>
                    <td class="w-40 text-center !py-4 whitespace-nowrap text-primary">{{$userPass->title}}</td>
                    <td class="w-40 text-center font-medium whitespace-nowrap">
                        @if($userDetails && $userDetails->name != null) {{$userDetails->name}}
                        @else {{'-'}}
                        @endif
                    </td>
                    <td class="text-center"><div class="whitespace-nowrap"><?=date_format(date_create($userPass->start_time), "d-m-Y")?></div></td>
                    <td class="text-center"><div class="whitespace-nowrap"><?=date_format(date_create($userPass->end_time), "d-m-Y")?></div></td>
                    <td class="text-center"><div class="whitespace-nowrap">{{$userPass->remaining_hours}}</div></td>
                    <td class="w-40 text-center font-medium whitespace-nowrap">₹ {{$userPass->amount}}</td>
                    <td class="text-center">
                        <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5">{{$userPass->payment_id}}</div>
                        <!-- <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5">pay_MFKXGtRAHwyGNL</div> -->
                    </td>
                    <td class="text-center">
                        <div class="whitespace-nowrap"><?=date_format(date_create($userPass->created_at), "h:m:s a")?></div>
                        <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5"><?=date_format(date_create($userPass->created_at), "d-m-Y")?></div>
                    </td>
                    <td class="text-center">
                        <div class="whitespace-nowrap"><?=date_format(date_create($userPass->updated_at), "h:m:s a")?></div>
                        <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5"><?=date_format(date_create($userPass->updated_at), "d-m-Y")?></div>
                    </td> 
                </tr>
                @endforeach
                @else
                <tr class="intro-x">
                    <td class="text-center" colspan=10>
                        No record found.
                    </td>
                </tr>
            @endif  
            </tbody>
        </table>
    </div>
    <!-- END: Data List -->
    <!-- BEGIN: Pagination -->
    @if($userPassData && $userPassData->count() > 0)
    <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center" id="userPasses">
        {!! $userPassData->links('vendor.pagination.custom') !!}
    </div>
    @endif
    <!-- END: Pagination -->
</div>
