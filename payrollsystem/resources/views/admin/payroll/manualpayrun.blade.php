@extends('admin.layouts.sidebar')

@section('username')
{{$user->name}}
@endsection@section('content')

@section('content')
<div class="h-full ml-14 mt-14 mb-5 md:ml-64">
    <div class="flex items-center justify-between mt-5 ml-2">
        <h1 class="text-2xl flex-grow">Manual Payrun</h1>
    </div>

    <!-- <div class="mt-6 ml-2 flex space-x-4">
        <a class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600" onclick="showContent('payee'); return false;">Payee</a>
        <a class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">Payrun Period</a>
        <a class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">Payslip Note</a>
        <a class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">Beneficiary Badge</a>
    </div> -->
    <div class="border-t border-gray-300 w-full mt-4 mb-2"></div>

    <div class="col-span-3 bg-white shadow-lg rounded-md flex flex-col p-3">
        <div id="bigBoxContent" class="w-full flex-grow flex flex-col">
            <div class="mt-6 flex flex-col space-y-4">
                <!-- <div id="payee" class="flex flex-col space-y-4">
                    <p class="text-black-700">Who are allowed for the payrun?</p>
                    <p class="text-gray-700 italic text-sm mb-4">
                        You can add users by Department or Employee directly to generate payslips. If you select any department, it only includes active employees from that department. To include inactive or terminated employees, select from the "By User" field.
                    </p>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="flex flex-col">
                            <label for="department" class="text-gray-700 font-bold mb-2">By Department:</label>
                            <input type="text" id="department" name="department" class="border border-gray-300 rounded-md p-2" placeholder="+ Add">
                        </div>
                        <div class="flex flex-col">
                            <label for="user" class="text-gray-700 font-bold mb-2">By User:</label>
                            <input type="text" id="user" name="user" class="border border-gray-300 rounded-md p-2" placeholder="+ Add">
                        </div>
                    </div>
                </div> -->
                <form action="{{ route('adminpayrun') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div style="display: flex; gap: 1rem; align-items: flex-end;">
        <div class="form-group" style="flex: 1;">
            <label for="monthyear">Month and Year</label>
            <input class="form-control" name="monthyear" type="month" id="monthyear" required/>
        </div>

        

        <div class="form-group" style="flex: 1;">
            <label for="method">Payment Type</label>
            <select name="method" class="form-control" id="method">
                <option value="15 days">Semi-Monthly</option>
            </select>
        </div>

        <div class="form-group" style="flex: 1;">
            <label for="is_first" style="display: flex; align-items: center; gap: 0.5rem;">
                First Cut-off?
                <input name="is_first" type="checkbox" id="is_first" />
            </label>
        </div>
    </div>

    <div class="flex justify-center mt-4">
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none">
            Save
        </button>
    </div>
</form>

            </div>
        </div>
    </div>
</div>
@endsection
