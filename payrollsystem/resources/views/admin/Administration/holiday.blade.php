@extends('admin.layouts.sidebar')
@section('content')
@include('admin.Administration.Modal.holidayModal')

<div class="h-full ml-14 mt-14 mb-5 md:ml-64">
    <div class="flex items-center justify-between mt-5 ml-2">
        <h1 class="text-2xl flex-grow">Holiday Calendar</h1>
    </div>

    <div class="border-t border-gray-300 w-full mt-4 mb-4"></div>

    <div id="calendar" class="mt-6 ml-10 mr-10"></div>

</div>

@endsection
