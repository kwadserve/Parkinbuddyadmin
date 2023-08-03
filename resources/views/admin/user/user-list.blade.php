 <!-- BEGIN: Users Layout -->
 <div class="grid grid-cols-12 gap-6 mt-5" >
@if($users->count() > 0)
@foreach ($users as $user)
    <div class="intro-y col-span-12 md:col-span-6">
        <div class="box">
            <div class="flex flex-col lg:flex-row items-center p-5">
                <div class="w-24 h-24 lg:w-12 lg:h-12 image-fit lg:mr-1">
                    <img alt="Midone - HTML Admin Template" class="rounded-full" src="{{ URL::asset('dist/images/profile-1.jpg') }}">
                </div>
                <div class="lg:ml-2 lg:mr-auto text-center lg:text-left mt-3 lg:mt-0">
                    <a href="" class="font-medium">{{$user->name}}</a> 
                    <div class="text-slate-500 text-xs mt-0.5">{{$user->phone}}</div>
                </div>
                <div class="flex mt-4 lg:mt-0">
                    <button class="btn btn-primary py-1 px-2 mr-2"> <a href="{{ url('pb-admin/user') }}/{{ $user->id }}/view">View Profile</a></button>
                </div>
            </div>
        </div>
    </div>
@endforeach
<div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center">
{!! $users->links('vendor.pagination.custom') !!}
</div>
@else
<div class="intro-y col-span-12 md:col-span-12">
    <div class="box">
        <div class="flex flex-col lg:flex-row items-center p-5">
            No record found.
        </div>
    </div>
</div>
@endif
</div>
