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


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("Admin logged in!") }}
                <form action="{{route('admin.home')}}" method="Get" enctype="multipart/form-data">
                    @csrf
                    <button type="submit">*Back</button>
                </form>

                <table class="table">
  <thead>
    <tr><th scope="col" colspan='7' class="text-center">PAYSLIPS</th></tr>
    <tr>
      <th scope="col">Employee</th>
      <th scope="col">Payrun</th>
      <th scope="col">Payrun Period</th>
      <th scope="col">Payrun Type</th>
      <th scope="col">Status</th>
      <th scope="col">Total Salary</th>
      <th scope="col">Net Salary</th>
    </tr>
  </thead>
  <tbody>
    @if($payslips->count() > 0)
        @foreach($payslips as $payslip)
            <tr>
                <td>{{$payslip->employee->name}}</td>
                <td>1 - 31 {{date('F Y', strtotime($payslip->payrun->date))}}</td>
                <td>{{$payslip->payrun_period}}</td>
                <td>{{$payslip->payrun_type}}</td>
                <td>{{$payslip->status}}</td>
                <td>{{$payslip->total_salary}}</td>
                <td>{{$payslip->net_salary}}</td>
            </tr>
        @endforeach
    @else
    <tr>
        <td>No Payslips</td>
    </tr>
    @endif
  </tbody>
</table>
            </div>
        </div>
    </div>

