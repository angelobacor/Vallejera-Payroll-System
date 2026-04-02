<!-- Main modal -->
<div id="view-payslip" style="display: none;" tabindex="-1" aria-hidden="true" class="items-center modal hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-3xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Payroll System
                </h3>
                <button type="button" onclick="closePayslip()" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" id="close-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5">
               
                <div class="grid grid-cols-3 gap-4 items-center mb-6">
                   
                    <div class="flex items-center">
                        <div class="w-16 h-16 rounded-full overflow-hidden mr-4">
                            <img src="https://therminic2018.eu/wp-content/uploads/2018/07/dummy-avatar.jpg" alt="Profile Picture" class="w-full h-full object-cover rounded-full">
                        </div>
                        <div class="flex flex-col">
                            <span name='name' class="text-blue-500 text-xs font-medium">Angelo Bacor</span>
                            <span name='email' class="text-gray-500 text-xs">mikeysantianes@gmail.com</span>
                        </div>
                    </div>
                   
                    <div class="text-left">
                        <div name='created_at' class="text-gray-500 text-xs">
                            Created at: 7 July, 2024
                        </div>
                    </div>
                 
                    <div class="text-left">
                        <div class="text-gray-700 text-xs font-medium">
                            Designation: <span name='designation' class="text-blue-500">Software Engineer</span>
                        </div>
                        <div class="text-gray-500 text-xs">
                            Department: <span name='department' class="text-blue-500">Main Department</span>
                        </div>
                    </div>
                </div>
                
                <!-- New section for salary details -->
                <div class="mb-6">
                    <div class="grid gap-4">
                        <div class="flex justify-between text-gray-700 text-xs font-medium">
                            <span>Basic Salary:</span>
                            <span name='basic_salary' class="text-blue-500">₱3,500.00</span>
                        </div>
                        <div class="flex justify-between text-gray-700 text-xs font-medium">
                            <span>Total Earning:</span>
                            <span name='total_earning' class="text-blue-500">₱3,500.00</span>
                        </div>
                        <div class="flex justify-between text-gray-700 text-xs font-medium">
                            <span>Deductions:</span>
                            <span name='none' class="text-blue-500">---------</span>
                        </div>
                        <div class="flex justify-between text-gray-700 text-xs font-medium">
                            <span>SSS:</span>
                            <span name='sss' class="text-blue-500">₱3,500.00</span>
                        </div>
                        <div class="flex justify-between text-gray-700 text-xs font-medium">
                            <span>Pagibig:</span>
                            <span name='pagibig' class="text-blue-500">₱3,500.00</span>
                        </div>
                        <div class="flex justify-between text-gray-700 text-xs font-medium">
                            <span>Philhealth:</span>
                            <span name='philhealth' class="text-blue-500">₱3,500.00</span>
                        </div>
                        <div class="flex justify-between text-gray-700 text-xs font-medium">
                            <span>Net Payable Salary:</span>
                            <span name='net_salary' class="text-blue-500">₱00.00</span>
                        </div>
                    </div>
                </div>

                <form class="mt-6">
                    <div class="flex justify-end gap-4">
                        <button onclick="closePayslip()" type="button" class="text-gray-600 bg-gray-200 hover:bg-gray-300 rounded-lg text-xs px-5 py-2.5 text-center dark:bg-gray-700 dark:hover:bg-gray-600 dark:text-gray-300 dark:hover:text-gray-200" id="cancel-btn">
                            Close
                        </button>
                        
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
