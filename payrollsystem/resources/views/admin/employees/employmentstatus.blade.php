@extends('admin.layouts.sidebar')

@section('username')
{{$user->name}}
@endsection@section('content')

@section('content')
@include('admin.modal.employeesmodal.addemploymentstat')
@include('admin.modal.employeesmodal.editemploymentstat')
<style>
    #flash-message {
        position: fixed;
        top: 20px;
        right: 20px;
        z-index: 9999;
        padding: 15px 25px;
        border-radius: 4px;
        background-color: #85e2a4ff; /* red */
        color: black;
        box-shadow: 0 2px 6px rgba(84, 84, 84, 1);
        opacity: 1;
        transition: opacity 0.5s ease;
    }
</style>


@if (session('success'))
    <div id="flash-message" class="alert alert-danger">
        {{ session('success') }}
    </div>
@endif

<div class="h-full ml-14 mt-14 mb-5 md:ml-64">
    <div class="flex items-center justify-between mt-5 ml-2">
        <h1 class="text-2xl flex-grow">Employment Status</h1>
        <div class="flex space-x-4 items-center m-2">
            <button onclick="Addmployementstat(event)" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none">
                Add Employment Status
            </button>
        </div>
    </div>

    <div class="border-t border-gray-300 w-full mt-4 mb-4"></div>

    <div class="flex justify-end items-center m-2" style="margin-top:-20px;">
        <form action="{{ route('employee_search') }}" method="GET" enctype="multipart/form-data" class="flex items-center space-x-2">
            @csrf
            <input type="text" name="employee_search" class="form-control px-3 py-2 border border-gray-300 rounded-md" style="width: 200px;" placeholder="Name..." />
            <button type="submit" class="btn btn-primary px-4 py-2" style="font-size: 12px; text-align: center;height:40px;">Search</button>

        </form>
    </div>



    <div class="overflow-x-auto mt-6 ml-10 mr-10">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Preview</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
            @if($employees->count() > 0)
                @foreach($employees as $employee)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">{{$employee->name}}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @if($employee->employment->status == 'Regular')
                            <div class="bg-green-500 text-xs text-center px-2 py-1 rounded-full inline-block w-[90px] h-5">
                                {{$employee->employment->status}}
                            </div>
                            @elseif($employee->employment->status == 'Probation')
                            <div class="bg-yellow-500 text-xs text-center px-2 py-1 rounded-full inline-block w-[90px] h-5">
                                {{$employee->employment->status}}
                            </div>
                            @elseif($employee->employment->status == 'Terminated')
                            <div class="bg-red-500 text-xs text-center px-2 py-1 rounded-full inline-block w-[90px] h-5">
                                {{$employee->employment->status}}
                            </div>
                            @else
                            <div class="bg-blue-400 text-xs text-center px-2 py-1 rounded-full inline-block w-[90px] h-5">
                                {{$employee->employment->status}}
                            </div>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">-</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center justify-between">
                                <div class="relative flex items-center">
                                    <button class="focus:outline-none" onclick="Editmployementstat('{{$employee->id}}','{{$employee->name}}')">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @else
            <tr>
                <td colspan="4" class="text-center">No Employee Found</td>
            </tr>
            @endif
            </tbody>
        </table>
    </div>
</div>

<script>
    // Wait for the page to fully load
    window.addEventListener('DOMContentLoaded', (event) => {
        const flash = document.getElementById('flash-message');
        if (flash) {
            // Wait 4 seconds then fade out
            setTimeout(() => {
                flash.style.opacity = '0';
                // Remove the element from the DOM after fade-out
                setTimeout(() => flash.remove(), 500);
            }, 1500);
        }
    });
</script>

@endsection

