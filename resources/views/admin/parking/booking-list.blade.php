<?php
use App\Models\User;
use App\Models\Parking;
use App\Models\UserPass;
use App\Models\Pass;
?>
<div class="grid grid-cols-12 gap-6 mt-5">
    <div class="intro-y col-span-12 overflow-y-auto 2xl:overflow-visible">
        <table class="table table-report -mt-2" id="bookingTable">
            <thead>
                <tr>
                    <th class="whitespace-nowrap">VEHICLE</th>
                    <th class="text-center whitespace-nowrap">BOOKING ID</th>
                    <th class="text-center whitespace-nowrap">USER</th>
                    <th class="text-center whitespace-nowrap">PARKING</th>
                    <th class="text-center whitespace-nowrap">STATUS</th>
                    <th class="text-center whitespace-nowrap">START D&T</th>
                    <th class="text-center whitespace-nowrap">END D&T</th>
                    <th class="text-center whitespace-nowrap">BOOKING AMT</th>
                    <th class="text-center whitespace-nowrap">PASS USED</th>
                    <th class="text-center whitespace-nowrap">ENTRY D&T</th>
                    <th class="text-center whitespace-nowrap">EXIT D&T</th>
                    <th class="text-center whitespace-nowrap">EXIT MOP</th>
                    <th class="text-center whitespace-nowrap">EXIT AMT</th>
                    <th class="text-center whitespace-nowrap">PAYMENT ID'S</th>
                    <th class="text-center whitespace-nowrap">CODE</th>
                    <th class="text-center whitespace-nowrap">CREATED AT</th>
                    <th class="text-right whitespace-nowrap">UPDATED AT</th>
                </tr>
            </thead>
            <tbody>
                @if ($bookingData->count() > 0)
                    @foreach ($bookingData as $booking)
                        <?php $userDetails = User::where('id', $booking['user_id'])->first();
                        $parkingDetails = Parking::where('id', $booking['parking_id'])->first();
                        
                        $userPassName = '-';
                        if ($booking['user_pass_id'] != null) {
                            $userPassData = UserPass::where('id', $booking['user_pass_id'])->first();
                            if ($userPassData) {
                                $passData = Pass::where('id', $userPassData['pass_id'])->first();
                                $userPassName = $passData['title'];
                            }
                        }
                        
                        ?>
                        <tr class="intro-x">
                            <td class="text-center">
                                <div
                                    class="w-10 h-10 flex-none image-fit object-fit-contain-vehicle rounded-md overflow-hidden">
                                    @if ($booking->vehicle_type == 1)
                                        <img class="object-fit-contain-vehicle" alt="Car"
                                            src="{{ URL::asset('dist/images/car.svg') }}">
                                    @else
                                        <img class="object-fit-contain-vehicle" alt="Bike"
                                            src="{{ URL::asset('dist/images/bikeyellow.svg') }}">
                                    @endif
                                </div>
                            </td>
                            <td class="w-40 text-center !py-4 whitespace-nowrap">{{ $booking->booking_id }}</td>
                            <td class="w-40 text-center font-medium whitespace-nowrap">
                                @if ($userDetails && $userDetails->name != null)
                                    {{ $userDetails->name }}
                                @elseif($userDetails && $userDetails->phone != null)
                                    {{ $userDetails->phone }}
                                @elseif($userDetails && $userDetails->email != null)
                                    {{ $userDetails->email }}
                                @else
                                    {{ '-' }}
                                @endif
                            </td>
                            <td class="text-center">
                                <div class="whitespace-nowrap">{{ $parkingDetails->address }}</div>
                                <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5">
                                    {{ $parkingDetails->city }}, {{ $parkingDetails->state }}</div>
                            </td>
                            <td class="text-center">
                                @if ($booking->status == 'success')
                                    <div class="flex items-center justify-center whitespace-nowrap text-success">
                                        <i data-lucide="check-square" class="w-4 h-4 mr-2"></i>{{ $booking->status }}
                                    </div>
                                @elseif($booking->status == 'Yet to Start')
                                    <div class="flex items-center justify-center whitespace-nowrap text-pending">
                                        <i data-lucide="x-circle" class="w-4 h-4 mr-2"></i>
                                        {{ $booking->status }}
                                    </div>
                                @else
                                    <div class="flex items-center justify-center whitespace-nowrap text-slate-600">
                                        <i data-lucide="toggle-right" class="w-4 h-4 mr-2"></i> {{ $booking->status }}
                                    </div>
                                @endif
                            </td>
                            <td class="text-center">
                                <div class="whitespace-nowrap">
                                    <?= date_format(date_create($booking->start_time), 'h:m:s a') ?></div>
                                <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5">
                                    <?= date_format(date_create($booking->start_time), 'd-m-Y') ?></div>
                            </td>
                            <td class="text-center">
                                <div class="whitespace-nowrap">
                                    <?= date_format(date_create($booking->end_time), 'h:m:s a') ?></div>
                                <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5">
                                    <?= date_format(date_create($booking->end_time), 'd-m-Y') ?></div>
                            </td>
                            <td class="w-40 text-center font-medium whitespace-nowrap">₹ {{ $booking->charges }}</td>
                            <td class="w-40 text-center text-primary whitespace-nowrap">{{ $userPassName }}</td>
                            <td class="text-center">
                                @if ($booking->entry_time != null)
                                    <div class="whitespace-nowrap">
                                        <?= date_format(date_create($booking->entry_time), 'h:m:s a') ?></div>
                                    <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5">
                                        <?= date_format(date_create($booking->entry_time), 'd-m-Y') ?>
                                    </div>
                                @else
                                    {{ '-' }}
                                @endif
                            </td>
                            <td class="text-center">
                                @if ($booking->exit_time != null)
                                    <div class="whitespace-nowrap">
                                        <?= date_format(date_create($booking->exit_time), 'h:m:s a') ?></div>
                                    <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5">
                                        <?= date_format(date_create($booking->exit_time), 'd-m-Y') ?>
                                    </div>
                                @else
                                    {{ '-' }}
                                @endif
                            </td>
                            <td class="w-40 text-center text-primary whitespace-nowrap">
                                @if ($booking->amount_paid_by == 1)
                                    {{ 'Cash' }}
                                @else
                                    {{ 'Online' }}
                                @endif
                            </td>
                            <td class="w-40 text-center font-medium whitespace-nowrap">₹
                                {{ $booking->cash_collection }}</td>
                            <td class="text-center">
                                <?php $paymentIds = json_decode($booking->payment_ids); ?>
                                @if ($paymentIds)
                                    @foreach ($paymentIds as $payId)
                                        <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5">
                                            {{ $payId }}</div>
                                    @endforeach
                                @endif
                            </td>
                            <td class="w-40 text-center text-primary whitespace-nowrap">{{ $booking->parking_code }}
                            </td>
                            <td class="text-center">
                                <div class="whitespace-nowrap">
                                    <?= date_format(date_create($booking->created_at), 'h:m:s a') ?></div>
                                <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5">
                                    <?= date_format(date_create($booking->created_at), 'd-m-Y') ?></div>
                            </td>
                            <td class="text-center">
                                <div class="whitespace-nowrap">
                                    <?= date_format(date_create($booking->updated_at), 'h:m:s a') ?></div>
                                <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5">
                                    <?= date_format(date_create($booking->updated_at), 'd-m-Y') ?></div>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr class="intro-x">
                        <td class="text-center" colspan=17>
                            No record found.
                        </td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
    @if ($bookingData->count() > 0)
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center" id="parkingBook">
            {!! $bookingData->links('vendor.pagination.custom') !!}
        </div>
    @endif
</div>
