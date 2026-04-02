<!-- Modal Structure -->
<div id="deductionEmp" class="fixed inset-0 bg-gray-800 bg-opacity-60 flex items-center justify-center hidden z-50">
    <div class="bg-white p-4 rounded-lg shadow-lg relative w-full max-w-2xl">
        
        <!-- Close Button -->
        <button onclick="closeDedEmployee()" 
                class="absolute top-2 right-2 text-gray-600 hover:text-gray-800 focus:outline-none">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" 
                 stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>

        <h2 class="text-2xl font-semibold mb-4 text-gray-800">Employee Deductions</h2>

        <!-- TABLE OF EXISTING DEDUCTIONS -->
        <div class="mb-4 max-h-48 overflow-y-auto border rounded-lg">
            <table class="min-w-full text-sm text-left text-gray-700">
                <thead class="bg-gray-100 text-gray-900">
                    <tr>
                        <th class="px-3 py-2 font-semibold">Name</th>
                        <th class="px-3 py-2 font-semibold">Amount</th>
                        <th class="px-3 py-2 font-semibold">End Date</th>
                        <th class="px-3 py-2 font-semibold ">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($deductions as $ded)
                        <tr class="border-b">
                            <td class="px-3 py-2">{{ $ded->deduction_name }}</td>
                            <td class="px-3 py-2">₱{{ number_format($ded->amount, 2) }}</td>
                            <td class="px-3 py-2">{{ $ded->expected_end_date }}</td>
                            <td class="px-3 py-2 ">
                                <a href="{{ route('delete_deduction', $ded->id) }}" onclick="return confirm('Are you sure you want to delete this deduction item?');"
                                class="text-red-600 hover:text-red-800 inline-flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" 
                                        class="w-5 h-5 cursor-pointer" 
                                        fill="currentColor" viewBox="0 0 16 16">
                                        <path d="M4.54.146A.5.5 0 0 1 4.893 0h6.214a.5.5 0 0 1 .353.146l4.394 4.394a.5.5 0 0 1 .146.353v6.214a.5.5 0 0 1-.146.353l-4.394 4.394a.5.5 0 0 1-.353.146H4.893a.5.5 0 0 1-.353-.146L.146 11.46A.5.5 0 0 1 0 11.107V4.893a.5.5 0 0 1 .146-.353zM5.1 1 1 5.1v5.8L5.1 15h5.8l4.1-4.1V5.1L10.9 1z"/>
                                        <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708"/>
                                    </svg>
                                </a>
                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-3 py-2 text-center text-gray-500">
                                No deductions found for this employee.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- FORM -->
        <form method="POST" action="{{ route('add_deduction') }}">
            @csrf

            <!-- ONE-ROW INPUTS -->
            <div class="grid grid-cols-3 gap-3 mb-4">

                <input type="hidden" name="employee_id" value="{{$employee->id}}">
                <!-- Name -->
                <div>
                    <label class="block text-xs text-gray-600 mb-1">Name</label>
                    <input type="text" id="ded_name" name="ded_name" 
                        class="w-full p-2 border rounded-lg focus:border-blue-500" required>
                </div>

                <!-- Amount -->
                <div>
                    <label class="block text-xs text-gray-600 mb-1">Monthly Payment</label>
                    <input type="number" step="any" id="ded_amount" name="ded_amount" 
                        class="w-full p-2 border rounded-lg focus:border-blue-500" required>
                </div>

                <!-- End Date -->
                <div>
                    <label class="block text-xs text-gray-600 mb-1">End Date</label>
                    <input type="date" id="ded_date" name="ded_date" 
                        class="w-full p-2 border rounded-lg focus:border-blue-500" required>
                </div>

            </div>

            <!-- Buttons -->
            <div class="flex justify-end gap-2">
                <button type="button" onclick="closeDedEmployee()" 
                    class="bg-gray-200 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-300">
                    Cancel
                </button>

                <button type="submit" 
                    class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                    Save
                </button>
            </div>
        </form>
    </div>
</div>
