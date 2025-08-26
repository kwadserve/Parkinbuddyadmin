<?php
use App\Models\User;
use App\Models\Pass;
?>
<div class="grid grid-cols-12 gap-6 mt-5">
    <!-- BEGIN: Data List -->
    <div class="intro-y col-span-12 2xl:overflow-visible" style="overflow-x: auto">
        <table class="table table-report -mt-2">
            <thead>
                <tr>
                    <th class="whitespace-nowrap">VEHICLE</th>
                    <th class="text-center whitespace-nowrap">VEHICLE NUMBER</th>
                    <th class="text-center whitespace-nowrap">USER</th>
                    <th class="text-center whitespace-nowrap">ADDRESS</th>
                    <th class="text-center whitespace-nowrap">PINCODE</th>
                    <th class="text-center whitespace-nowrap">CITY</th>
                    <th class="text-center whitespace-nowrap">CREATED AT</th>
                    <th class="text-right whitespace-nowrap">UPDATED AT</th>
                </tr>
            </thead>
            <tbody>
                @if ($userVehicleData && $userVehicleData->count() > 0)
                    @foreach ($userVehicleData as $userVehicle)
                        <?php
                        $userDetails = User::where('id', $userVehicle['user_id'])->first();
                        ?>
                        <tr class="intro-x">
                            <td class="text-center">
                                <div
                                    class="w-10 h-10 flex-none image-fit object-fit-contain-vehicle rounded-md overflow-hidden">
                                    @if ($userVehicle->type == 1)
                                        <img class="object-fit-contain-vehicle" alt="Car"
                                            src="{{ URL::asset('dist/images/car.svg') }}">
                                    @else
                                        <img class="object-fit-contain-vehicle" alt="Bike"
                                            src="{{ URL::asset('dist/images/bikeyellow.svg') }}">
                                    @endif
                                </div>
                            </td>
                            <td class="w-40 text-center !py-4 whitespace-nowrap text-primary">{{ $userVehicle->number }}
                            </td>
                            <td class="w-40 text-center font-medium whitespace-nowrap">
                                @if ($userVehicle->name != null)
                                    {{ $userVehicle->name }}
                                @else
                                    @if ($userDetails && $userDetails->name != null)
                                        {{ $userDetails->name }}
                                    @elseif($userDetails && $userDetails->phone != null)
                                        {{ $userDetails->phone }}
                                    @elseif($userDetails && $userDetails->email != null)
                                        {{ $userDetails->email }}
                                    @else
                                        {{ '-' }}
                                    @endif
                                @endif
                            </td>
                            <td class="text-center">
                                <div class="whitespace-nowrap">{{ $userVehicle->address }}</div>
                            </td>
                            <td class="text-center">
                                <div class="whitespace-nowrap">{{ $userVehicle->pincode }}</div>
                            </td>
                            <td class="text-center">
                                <div class="whitespace-nowrap">{{ $userVehicle->city }}</div>
                            </td>
                            <td class="text-center">
                                <div class="whitespace-nowrap">
                                    <?= date_format(date_create($userVehicle->created_at), 'h:m:s a') ?></div>
                                <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5">
                                    <?= date_format(date_create($userVehicle->created_at), 'd-m-Y') ?></div>
                            </td>
                            <td class="text-center">
                                <div class="whitespace-nowrap">
                                    <?= date_format(date_create($userVehicle->updated_at), 'h:m:s a') ?></div>
                                <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5">
                                    <?= date_format(date_create($userVehicle->updated_at), 'd-m-Y') ?></div>
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
    @if ($userVehicleData && $userVehicleData->count() > 0)
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center" id="userVehicles">
            {!! $userVehicleData->links('vendor.pagination.custom') !!}
        </div>
    @endif
    <!-- END: Pagination -->
</div>
