<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
</x-app-layout>

    <a class="btn btn-secondary" href="{{ route('logout') }}"
        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
        {{ __('LOGOUT') }}
    </a>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("Admin logged in!") }}
                </div>
                <div class="p-6 text-gray-900">
                    Total schedule hour: {{ $hours }}
                </div>
                <div class="p-6 text-gray-900">
                    Total Active hour: {{ $totalActiveHours }}
                </div>
                <div class="p-6 text-gray-900">
                    Remaining hour: {{ $balanceHours }}
                </div>

                <form action="{{route('adminpunchin')}}" method="Post" enctype="multipart/form-data">
                    @csrf
                    <button type="submit">Punch in</button>
                </form>

                <form action="{{route('adminpunchout')}}" method="Post" enctype="multipart/form-data">
                    @csrf
                    <button type="submit">Punch out</button>
                </form>

                <form action="{{route('adminpayrun')}}" method="Post" enctype="multipart/form-data">
                    @csrf
                    <div class="row form-group">
                        <select style="width:100px;" name='method' class="form-control " id="exampleFormControlSelect1">
                            <option value=''>Select</option>
                            <option value='Weekly'>Weekly</option>
                            <option value='15 days'>15 days</option>
                        </select>
                    </div>
                    <button class="col" type="submit">Generate Payrun</button>
                </form>

                <form action="{{route('admin.leave')}}" method="Get" enctype="multipart/form-data">
                    @csrf
                    <button type="submit">*Leave Request</button>
                </form>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Customize Payment Increase
                </button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
      </div>
      <div class="modal-body">
        <form action="{{route('payment.increase')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="text" name='custompay' placeholder="Percent increased">
            <select style="width:400px; margin-top:20px;" name='custom' class="form-control " id="exampleFormControlSelect1">
                <option value=''>Or Select from the values</option>
                <option value='30'>30%</option>
                <option value='50'>50%</option>
            </select>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- END modal -->
                <table class="table table-bordered">
  <thead>
    <tr><th scope="col" colspan='7' class="text-center">ATTENDANCE</th></tr>
    <tr>
      <th scope="col">Date</th>
      <th scope="col">Punch in</th>
      <th scope="col">Punch out</th>
      <th scope="col">Behavior</th>
      <th scope="col">Type</th>
      <th scope="col">Total Hours</th>
      <th scope="col">Entry</th>
    </tr>
  </thead>
  <tbody>
    @if($getAttendance->count() > 0 )
    @foreach($getAttendance as $attendance)
        <tr>
        <th scope="row">{{date('M d, Y', strtotime($attendance->date))}}</th>
        <td>{{ date('h:i A', strtotime($attendance->punched_in)) }}</td>
        @if($attendance->punched_out != '')
        <td>{{ date('h:i A', strtotime($attendance->punched_out)) }}</td>
        @else
        <td>Not Punched Out</td>
        @endif
        <td>{{$attendance->behavior}}</td>
        <td>{{$attendance->type}}</td>
        <td>{{$attendance->total_hours}}</td>
        <td>{{$attendance->entry}}</td>
        </tr>
    @endforeach
    @endif
  </tbody>
</table>

<table class="table table-bordered mt-5">
<thead class="text-center">
    <tr><th scope="col" colspan='3' class="text-center">PAYRUNS</th></tr>
    <tr>
      <th scope="col">Date</th>
      <th scope="col">Generated ID</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody class="text-center">
        @if($payruns->count() > 0)
            @foreach($payruns as $payrun)
                <tr>
                    <td>{{date('M d, Y', strtotime($payrun->date))}}</td>
                    <td>{{$payrun->generated_id}}</td>
                    <td><a href="{{route('adminpayslip', $payrun->id)}}" class="sidebar-link">
                    <i class="fas fa-box-open pe-2"></i>
                    View
                </a></td>
                </tr>
            @endforeach
        @else
        <tr>
            <td colspan='3'>No Payruns</td>
        </tr>
        @endif
  </tbody>
</table>
            </div>
        </div>
    </div>

