
@extends('it_admin.employees.details.jobdesk')
@section('jobdesk')
<div id="update" style="width: 500px; margin-left: 20px;">
    <div>
    @if ($errors->has('password'))
        <div class="text-red-500">
            <ul>
                @foreach ($errors->get('password') as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif


    @if ($errors->has('confirm_password'))
        <div class="text-red-500">
            <ul>
                @foreach ($errors->get('confirm_password') as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form class="form-control" method="POST" action="{{ route('it_employeesaveupdateaccount', $employee->id) }}" enctype="multipart/form-data">
        @csrf
        <!-- Left Side: Labels for Inputs -->
        <div class="bg-white shadow-md rounded-md p-4">
            <h2 class="text-xl font-semibold mb-4">Update User Details</h2>
            <div class="space-y-2">
                <p class="font-medium">My Name:</p>
                <input type="text" name="name" value="{{$employee->name}}" id="edit-company-name" class="form-control border p-2 w-full">
                
                <p class="font-medium">Email:</p>
                <input type="email" name="email" value="{{$employee->email}}" id="edit-company-logo" class="form-control border p-2 w-full">
                
                <p class="font-medium">Password:</p>
                <input type="password" name="password" id="edit-company-icon" class="form-control border p-2 w-full">
                
                <p class="font-medium">Confirm Password:</p>
                <input type="password" name="confirm_password" id="edit-company-icon" class="form-control border p-2 w-full">
            </div>
            <button type="submit" style="margin-left:300px; margin-top:20px;" class="bg-blue-500 text-white p-2 rounded">Save Changes</button>
        </div>
    </form>

</div>
@endsection