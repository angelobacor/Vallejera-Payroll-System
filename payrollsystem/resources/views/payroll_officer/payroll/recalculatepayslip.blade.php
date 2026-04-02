@extends('payroll_officer.layouts.sidebar')

@section('username')
{{$user->name}}
@endsection

@section('content')

@include('payroll_officer.modal.sendmonthlypayslip')
@include('payroll_officer.modal.ViewPayslip')

<div class="h-full ml-14 mt-14 mb-5 md:ml-64">
    <!-- Header Section -->
    <div class="flex items-center justify-between mt-5 ml-2">
        <h1 class="text-2xl flex-grow">Payslip</h1>

        <!-- Action Buttons -->
        <!-- <div class="flex space-x-4 m-2">
            <div>
                <button onclick="toggleAccordion(event)" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600 focus:outline-none">
                    Export All
                </button>
            </div>
            <div>
                <button onclick="toggleAccordion(event)" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600 focus:outline-none">
                    Send Filtered Payslip
                </button>
            </div>
            <div>
                <button onclick="sendmonthlymodal(event)" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none">
                    Send Monthly Payslip
                </button>
            </div>
        </div> -->
    </div>

    <!-- Current Date and Navigation -->
    <div class="mt-6 ml-2 flex flex-wrap gap-2">
        <div class="flex items-center">
            <button class="outline-none focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </button>
            <span class="ml-2">{{ \Carbon\Carbon::now()->format('F j, Y') }}</span>
        </div>
    </div>

    <!-- Payslip Edit Form -->
    <div class="bg-white p-6 mt-6 mx-2 rounded-lg shadow-md">
        <h2 class="text-xl font-semibold mb-4">Recalculate Payslip</h2>

        <!-- Form for Editing Payslip -->
        <form action="{{route('saverecalculate', $payslip->id)}}" method="POST">
            @csrf            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <!-- Employee Information -->
                <div>
                    <label for="employee_name" class="block text-gray-700">Employee Name</label>
                    <input type="text" id="employee_name" name="employee_name" value="{{ $payslip->employee->name }}" class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div>
                    <label for="employee_id" class="block text-gray-700">Employee ID</label>
                    <input type="text" id="employee_id" name="employee_id" value="{{ $payslip->employee->id }}" class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
            </div>

            <!-- Payslip Details -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                <div>
                    <label for="basic_salary" class="block text-gray-700">Basic Salary</label>
                    <input type="text" id="basic_salary" name="basic_salary" value="{{ $basicsalary }}" class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div>
                    <label for="deductions" class="block text-gray-700">Net Salary</label>
                    <input type="number" id="deductions" name="deductions" value="{{ $payslip->total_salary }}" class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div>
                    <label class="flex items-center space-x-2 cursor-pointer">
                        <input type="checkbox" name="remove_deductions" id="remove_deductions" class="form-checkbox">
                        <span>Remove Deductions</span>
                    </label>
                    <label for="net_salary" class="mb-2 block text-gray-900">Deductions:</label>
                    <h2 class="mb-2 block text-gray-500">SSS: {{$payslip->sss}}</h2>
                    <h2 class="mb-2 block text-gray-500">Pagibig: {{$payslip->pagibig}}</h2>
                    <h2 class="mb-2 block text-gray-500">Philhealth: {{$payslip->philhealth}}</h2>
                </div>

                <!-- <div>
                    <h1 class="mb-4">Deduction Options <a href='#' id='clear-radio' style='color:blue'>Clear</a></h1>
                    <div class="flex space-x-4"> -->
                        <!-- Column 1: SSS Options -->
                        <!-- <div class="flex-1">
                            <label class="flex items-center space-x-2 cursor-pointer">
                                <input type="radio" value='fsss' name="sss_option" class="form-checkbox">
                                <span>Full Payment SSS</span>
                            </label> -->
                            <!-- <label class="flex items-center space-x-2 cursor-pointer">
                                <input type="radio" value='hsss' name="sss_option" class="form-checkbox">
                                <span>1/2 Payment SSS</span>
                            </label>
                            <label class="flex items-center space-x-2 cursor-pointer">
                                <input type="radio" value='frsss' name="sss_option" class="form-checkbox">
                                <span>1/4 Payment SSS</span>
                            </label> -->
                        <!-- </div> -->

                        <!-- Column 2: Pagibig Options -->
                        <!-- <div class="flex-1">
                            <label class="flex items-center space-x-2 cursor-pointer">
                                <input type="radio" value='fpagibig' name="pagibig_option" class="form-checkbox">
                                <span>Full Payment Pagibig</span>
                            </label> -->
                            <!-- <label class="flex items-center space-x-2 cursor-pointer">
                                <input type="radio" value='hpagibig' name="pagibig_option" class="form-checkbox">
                                <span>1/2 Payment Pagibig</span>
                            </label>
                            <label class="flex items-center space-x-2 cursor-pointer">
                                <input type="radio" value='frpagibig' name="pagibig_option" class="form-checkbox">
                                <span>1/4 Payment Pagibig</span>
                            </label> -->
                        <!-- </div> -->

                        <!-- Column 3: Philhealth Options -->
                        <!-- <div class="flex-1">
                            <label class="flex items-center space-x-2 cursor-pointer">
                                <input type="radio" value='fphilhealth' name="philhealth_option" class="form-checkbox">
                                <span class="text-sm">Full Payment Philhealth</span>
                            </label> -->
                            <!-- <label class="flex items-center space-x-2 cursor-pointer">
                                <input type="radio" value='hphilhealth' name="philhealth_option" class="form-checkbox">
                                <span class="text-sm">1/2 Payment Philhealth</span>
                            </label>
                            <label class="flex items-center space-x-2 cursor-pointer">
                                <input type="radio" value='frphilhealth' name="philhealth_option" class="form-checkbox">
                                <span class="text-sm">1/4 Payment Philhealth</span>
                            </label> -->
                        <!-- </div>
                    </div>
                </div> -->

            </div>

            <!-- Recalculate Button -->
            <div class="mt-4 text-right">
                <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-md hover:bg-blue-600 focus:outline-none">
                    Save Changes
                </button>
            </div>
        </form>
    </div>

    <!-- Full Width Horizontal Line -->
    <div class="border-t border-gray-300 w-full mb-4"></div>

    <!-- Payslip Table -->
    <div class="overflow-x-auto">
        <!-- Table contents can be added here -->
    </div>
</div>

<script>
    // JavaScript to clear selected radio buttons when the "Clear" link is clicked
    document.getElementById("clear-radio").addEventListener("click", function(e) {
        e.preventDefault(); // Prevent default link behavior
        let radios = document.querySelectorAll('input[type="radio"][name="sss_option"], input[type="radio"][name="pagibig_option"], input[type="radio"][name="philhealth_option"]');
        radios.forEach(radio => {
            radio.checked = false; // Uncheck each radio button
        });

        // Re-enable the remove deductions checkbox when "Clear" is clicked
        const removeDeductionsCheckbox = document.getElementById("remove_deductions");
        removeDeductionsCheckbox.disabled = false; // Enable checkbox
    });

    // Handle checkbox and radio button interactions
    const removeDeductionsCheckbox = document.getElementById("remove_deductions");
    const radioButtons = document.querySelectorAll('input[type="radio"][name="sss_option"], input[type="radio"][name="pagibig_option"], input[type="radio"][name="philhealth_option"]');

    // Disable/Enable radio buttons based on checkbox
    removeDeductionsCheckbox.addEventListener('change', function() {
        const isChecked = removeDeductionsCheckbox.checked;
        radioButtons.forEach(radio => {
            radio.disabled = isChecked; // Disable if checkbox is checked
        });
    });

    // Disable checkbox if any radio button is selected
    radioButtons.forEach(radio => {
        radio.addEventListener('change', function() {
            removeDeductionsCheckbox.disabled = true; // Disable checkbox when a radio button is selected
        });
    });
</script>


@endsection
