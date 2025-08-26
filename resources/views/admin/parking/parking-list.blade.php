<?php
use App\Models\User;
use App\Models\Parking;
use App\Models\ParkingPass;
?>
<div class="grid grid-cols-12 gap-6 mt-5">
    <div class="intro-y col-span-12 2xl:overflow-visible" style="overflow-x: auto">
        <table class="table table-report -mt-2" id="bookingTable">
            <thead>
                <tr>
                    <th class="whitespace-nowrap">PARKING NAME</th>
                    <th class="text-center whitespace-nowrap">CITY</th>
                    <th class="text-center whitespace-nowrap">STATE</th>
                    <th class="text-center whitespace-nowrap">ADDRESS</th>
                    <th class="text-center whitespace-nowrap">PINCODE</th>
                    <th class="text-center whitespace-nowrap">LATITUDE</th>
                    <th class="text-center whitespace-nowrap">LONGITUDE</th>
                    <th class="text-center whitespace-nowrap">OPERATOR</th>
                    <th class="text-center whitespace-nowrap">MANAGER</th>
                    <th class="text-center whitespace-nowrap">CREATED AT</th>
                    <th class="text-right whitespace-nowrap">UPDATED AT</th>
                </tr>
            </thead>
            <tbody>
                @if ($parkingsData->count() > 0)
                    @foreach ($parkingsData as $parking)
                        <?php
                        $operatorName = User::where('id', $parking['operator_id'])->first();
                        $managerName = User::where('id', $parking['manager_id'])->first();
                        ?>
                        <tr class="intro-x">
                            <td class="w-40 !py-4 whitespace-nowrap font-bold text-primary"><a
                                    href="{{ url('pb-admin/parkings') }}/{{ $parking->id }}/view">{{ $parking->name }}</a>
                            </td>
                            <td class="w-40 text-center font-medium whitespace-nowrap">{{ $parking->city }}</td>
                            <td class="text-center">
                                <div class="whitespace-nowrap">{{ $parking->state }}</div>
                            </td>
                            <td class="text-center">
                                <div class="whitespace-nowrap">{{ $parking->address }}</div>
                            </td>
                            <td class="text-center">
                                <div class="whitespace-nowrap">{{ $parking->pin_code }}</div>
                            </td>
                            <td class="text-center">
                                <div class="whitespace-nowrap">{{ $parking->latitude }}</div>
                            </td>
                            <td class="text-center">
                                <div class="whitespace-nowrap">{{ $parking->longitude }}</div>
                            </td>
                            <td class="text-center">
                                <div class="whitespace-nowrap">
                                    @if ($operatorName && $operatorName->name != null)
                                        {{ $operatorName->name }}
                                    @else
                                        {{ '-' }}
                                    @endif
                                </div>
                            </td>
                            <td class="text-center">
                                <div class="whitespace-nowrap">
                                    @if ($managerName && $managerName->name != null)
                                        {{ $managerName->name }}
                                    @else
                                        {{ '-' }}
                                    @endif
                                </div>
                            </td>
                            <td class="text-center">
                                <div class="whitespace-nowrap">
                                    <?= date_format(date_create($parking->created_at), 'h:m:s a') ?></div>
                                <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5">
                                    <?= date_format(date_create($parking->created_at), 'd-m-Y') ?></div>
                            </td>
                            <td class="text-center">
                                <div class="whitespace-nowrap">
                                    <?= date_format(date_create($parking->updated_at), 'h:m:s a') ?></div>
                                <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5">
                                    <?= date_format(date_create($parking->updated_at), 'd-m-Y') ?></div>
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
    @if ($parkingsData->count() > 0)
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center" id="parkings">
            {!! $parkingsData->links('vendor.pagination.custom') !!}
        </div>
    @endif
</div>
