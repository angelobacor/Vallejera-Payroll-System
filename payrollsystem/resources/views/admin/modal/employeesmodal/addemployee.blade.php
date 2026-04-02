<!-- Modal Structure -->
<div id="addemployee" class="fixed inset-0 bg-gray-800 bg-opacity-60 flex items-center justify-center hidden z-50">
    <div class="bg-white p-2 rounded-lg shadow-lg relative p-3 w-full max-w-3xl max-h-full">
        <button onclick="closeAddEmployee()" class="absolute top-2 right-2 text-gray-600 hover:text-gray-800 focus:outline-none" aria-label="Close">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
        
        <h2 class="text-2xl font-semibold mb-1 text-gray-800">Add Employee</h2>
        
        <form action="{{route('addEmployee')}}" method='POST' enctype="multipart/form-data">
            @csrf
        <div class="space-y-4">
            <div class="flex gap-4">
                <div class="flex-1">
                <label for="first-name" class="block text-sm font-medium text-gray-700 mb-1">
                    Employee ID
                </label>

                <div class="flex space-x-2">
                    <input
                    type="text"
                    name="employee_id"
                    placeholder="Enter Employee ID"
                    class="flex-1 p-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500"
                    />
                </div>
                </div>

            </div>

            <!-- First Name and Last Name Inputs -->
            <div class="flex gap-4">
                <!-- First Name Input -->
                <div class="flex-1">
                <label for="first-name" class="block text-sm font-medium text-gray-700 mb-1">
                    Full Name
                </label>

                <div class="flex space-x-2">
                    <input
                    type="text"
                    name="fname"
                    placeholder="First name"
                    class="flex-1 p-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500"
                    />
                    <input
                    type="text"
                    name="mname"
                    placeholder="Middle name"
                    class="flex-1 p-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500"
                    />
                    <input
                    type="text"
                    name="lname"
                    placeholder="Last name"
                    class="flex-1 p-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500"
                    />
                </div>
                </div>

            </div>

            <!-- Email Input -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name='email' id="email" placeholder="Enter email" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500" />
            </div>

            <!-- Gender Radio Buttons -->
            <!-- <div>
                <span class="block text-sm font-medium text-gray-700">Gender</span>
                <div class="flex items-center space-x-4 mt-2">
                    <label class="flex items-center space-x-2">
                        <input type="radio" name="gender" value="male" class="form-radio text-blue-600" />
                        <span>Male</span>
                    </label>
                    <label class="flex items-center space-x-2">
                        <input type="radio" name="gender" value="female" class="form-radio text-blue-600" />
                        <span>Female</span>
                    </label>
                    <label class="flex items-center space-x-2">
                        <input type="radio" name="gender" value="female" class="form-radio text-blue-600" />
                        <span>Others</span>
                    </label>
                </div>
            </div> -->

            <!-- Employee ID and Department -->
            <div class="flex gap-4">
                <!-- Employee ID Input -->
                <!-- <div class="flex-1">
                    <label for="employee-id" class="block text-sm font-medium text-gray-700">Employee ID</label>
                    <input type="text" id="employee-id" placeholder="Enter employee ID" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500" />
                </div> -->

                <!-- Shift Dropdown -->
                <div class="flex-1">
                    <label for="shift" class="block text-sm font-medium text-gray-700">Shift</label>
                    <select name='shift' id="shift" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">
                        <option value="" disabled selected>Select Shift</option>
                        <!-- Add more options as needed -->
                    </select>
                </div>

                <!-- Department Dropdown -->
                <div class="flex-1">
                    <label for="department" class="block text-sm font-medium text-gray-700">Department</label>
                    <select name='department' id="departmentw" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">
                        <option value="" disabled selected>Select department</option>
                        <!-- Add more options as needed -->
                    </select>
                </div>
            </div>

            <!-- Designation and Employment Status -->
            <div class="flex gap-4">
                <!-- Designation Dropdown -->
                <div class="flex-1">
                    <label for="designation" class="block text-sm font-medium text-gray-700">Designation</label>
                    <select name='designation' id="ddesignation" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">
                        <option value="" disabled selected>Select designation</option>
                        <!-- Add more options as needed -->
                    </select>
                </div>

                <!-- Employment Status Dropdown -->
                <div class="flex-1">
                    <label for="employment-status" class="block text-sm font-medium text-gray-700">Employment Status</label>
                    <select name='status' id="esestatus" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">
                        <option value="" disabled selected>Select employment status</option>
                        <!-- Add more options as needed -->
                    </select>
                </div>
            </div>

            <!-- Roles Input -->
            <!-- <div>
                <label for="roles" class="block text-sm font-medium text-gray-700">Roles</label>
                <input type="text" id="roles" placeholder="Enter roles" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500" />
            </div> -->

            <!-- Salary Input -->
            <div class="flex-1">
                <label for="salary" class="block text-sm font-medium text-gray-700">Salary</label>
                <input name='salary' type="number" id="salary" placeholder="Enter salary" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500" />
            </div>
            <div class="flex gap-4">
                <div class="flex-1">
                    <label for="method" class="block text-sm font-medium text-gray-700">Payment</label>
                    <select name='method' id="method" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">
                        <option value="" disabled selected>Select Payment Type</option>
                        <option value='15 days'>Semi-Monthly</option>
                        <option value='Weekly'>Weekly</option>
                    </select>
                </div>

                <div class="flex-1">
                    <label for="employment-status" class="block text-sm font-medium text-gray-700">Role</label>
                    <select required name='role' id="role" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">
                        <option value=""  selected>Select user role</option>
                        <option value="0" >Admin</option>
                        <option value="4" >Payroll Officer</option>
                        <option value="3" >IT Admin</option>
                        <option value="1" >Employee</option>
                    </select>
                </div>
            </div>
            <div>
                <label for="salary" class="block text-sm font-medium text-gray-700">Joining Date</label>
                <input name='joining_date' type="date" id="joining_date" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500" />
            </div>
        </div>

        <div class="flex justify-end mt-4 gap-2">
            <a onclick="closeAddEmployee()" style="cursor:pointer" class="bg-gray-200 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-500">Cancel</a>
            <button type='submit' class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">Add</button>
        </div>
    </div>
    </form>
</div>
