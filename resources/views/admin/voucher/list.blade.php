<div class="grid grid-cols-12 gap-6 mt-5">
    <!-- BEGIN: Data List -->
    <div class="intro-y col-span-12 2xl:overflow-visible" style="overflow-x: auto">
        <table class="table table-report -mt-2">
            <thead>
                <tr>
                    <th class="whitespace-nowrap">VEHICLE TYPE</th>
                    <th class="whitespace-nowrap">CODE</th>
                    <th class="text-center whitespace-nowrap">TITLE</th>
                    <th class="text-center whitespace-nowrap">EXPIRY</th>
                    <th class="text-center whitespace-nowrap">DISCOUNT</th>
                    <th class="text-center whitespace-nowrap">TYPE</th>
                </tr>
            </thead>
            <tbody>
                @if ($vouchers->count() > 0)
                    @foreach($vouchers as $voucher)
                        <tr class="intro-x">
                            <td class="text-center">
                                <div
                                    class="w-10 h-10 flex-none image-fit object-fit-contain-vehicle rounded-md overflow-hidden">
                                    @if ($voucher->vehicle_type == 1)
                                        <img class="object-fit-contain-vehicle" alt="Car"
                                            src="{{ URL::asset('dist/images/car.svg') }}">
                                    @else
                                        <img class="object-fit-contain-vehicle" alt="Bike"
                                            src="{{ URL::asset('dist/images/bikeyellow.svg') }}">
                                    @endif
                                </div>
                            </td>
                            <td class="w-40 whitespace-nowrap text-primary">{{ $voucher->code }}
                            </td>
                            <td class="text-center">
                                <div class="whitespace-nowrap">{{ $voucher->title }}</div>
                            </td>
                            <td class="text-center">
                                <div class="whitespace-nowrap">
                                    <?= date_format(date_create($voucher->expiry), 'd-m-Y') ?>
                                </div>
                            </td>
                            <td class="text-center">
                                <div class="whitespace-nowrap">{{ $voucher->discount }}</div>
                            </td>
                            <td class="text-center">
                                <div class="whitespace-nowrap">
                                    @if ($voucher->type == 'percentage')
                                        %
                                    @else
                                        ₹
                                    @endif
                                </div>
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
    @if ($vouchers && $vouchers->count() > 0)
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center" id="uservoucher">
            {!! $vouchers->links('vendor.pagination.custom') !!}
        </div>
    @endif
    <!-- END: Pagination -->
</div>