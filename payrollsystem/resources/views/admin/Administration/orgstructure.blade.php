@extends('admin.layouts.sidebar')
@section('content')
@include('admin.Administration.Modal.adddept')

<div class="h-full ml-14 mt-14 mb-5 md:ml-64">
    <div class="flex items-center justify-between mt-5 ml-2">
        <h1 class="text-2xl flex-grow">Org. Structure</h1>
        <div class="flex space-x-4 items-center m-2">
            <button onclick="adddepartment()" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none">
                Add Department
            </button>
        </div>
    </div>

    <div class="border-t border-gray-300 w-full mt-4 mb-4"></div>

    <div class="mt-6 ml-10 mr-10">
        <div class="org-chart">
            <div class="node">
                <h2>Main Department</h2>
                <p>Name: John Doe</p>
            </div>
            <div class="children">
                <div class="node">
                    <h3>Recruitment</h3>
                </div>
                <div class="node">
                    <h3>Employee Relations</h3>
                </div>
                <div class="node">
                    <h3>Training & Development</h3>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
