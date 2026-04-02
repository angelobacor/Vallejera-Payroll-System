<!-- Modal Structure -->
<div id="updateemployee" class="fixed inset-0 bg-gray-800 bg-opacity-60 flex items-center justify-center hidden z-50">
    <div class="bg-white p-2 rounded-lg shadow-lg relative p-3 w-full max-w-3xl max-h-full">
        <button onclick="closeUpdEmployee()" class="absolute top-2 right-2 text-gray-600 hover:text-gray-800 focus:outline-none" aria-label="Close">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
        
        <h2 class="text-2xl font-semibold mb-1 text-gray-800">Update User</h2>
        
        <form action="{{route('UpdateUser',$employee->id)}}" method='POST' enctype="multipart/form-data">
            @csrf
        <div class="space-y-4">
            <div class="flex gap-4">
                <!-- First Name Input -->
                <div class="flex-1">
                    <label for="employee_id" class="block text-sm font-medium text-gray-700">Employee ID</label>
                    <input type="text" name='employee_id' id="employee_id" value="{{$employee->employee_id}}" placeholder="Enter Employee ID" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500" />
                </div>

            </div>

            <!-- First Name and Last Name Inputs -->
            <div class="flex gap-4">
                <!-- First Name Input -->
                <div class="flex-1">
                    <label for="first-name" class="block text-sm font-medium text-gray-700">Full Name</label>
                    <input type="text" name='name' id="first-name" value="{{$employee->name}}" placeholder="Enter first name" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500" />
                </div>

            </div>

            <!-- Email Input -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name='email' id="email" value="{{$employee->email}}" placeholder="Enter email" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500" />
            </div>

            

            <!-- Employee ID and Department -->
            <div class="flex gap-4">
                <!-- Employee ID Input -->
                <!-- <div class="flex-1">
                    <label for="employee-id" class="block text-sm font-medium text-gray-700">Employee ID</label>
                    <input type="text" id="employee-id" placeholder="Enter employee ID" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500" />
                </div> -->

                <!-- Shift Dropdown -->
                <!-- <div class="flex-1">
                    <label for="shift" class="block text-sm font-medium text-gray-700">Shift</label>
                    <select name='shift' id="shift" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">
                        <option value="" disabled selected>Select Shift</option>
                    </select>
                </div> -->

                <!-- Department Dropdown -->
                <div class="flex-1">
                    <label for="department" class="block text-sm font-medium text-gray-700">Department</label>
                    <select name='department' id="departmentw" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">
                        <option value="" disabled selected>Select department</option>
                        @foreach($departments as $department)
                            <option value="{{ $department->id }}"
                                {{ $employee->department_id == $department->id ? 'selected' : '' }}>
                                {{ $department->department_name }}
                            </option>
                        @endforeach
                        <!-- Add more options as needed -->
                    </select>
                </div>

                <div class="flex-1">
                    <label for="designation" class="block text-sm font-medium text-gray-700">Designation</label>
                    <select name='designation' id="ddesignation" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">
                        <option value="" disabled selected>Select designation</option>
                        @foreach($designations as $designation)
                            <option value="{{ $designation->id }}"
                                {{ $employee->designation_id == $designation->id ? 'selected' : '' }}>
                                {{ $designation->designation_name }}
                            </option>
                        @endforeach
                        <!-- Add more options as needed -->
                    </select>
                </div>
            </div>

            <!-- Designation and Employment Status -->
            <div class="flex gap-4">
                <!-- Designation Dropdown -->
                

                <!-- Employment Status Dropdown -->
                <div class="flex-1">
                    <label for="employment-status" class="block text-sm font-medium text-gray-700">Employment Status</label>
                    <select name='status' id="esestatus" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">
                        <option value="" disabled selected>Select employment status</option>
                        @foreach($status as $status)
                        <option value="{{$status->id}}" {{ $employee->employment_id == $status->id ? 'selected' : '' }}>{{$status->status}}</option>
                        @endforeach
                        <!-- Add more options as needed -->
                    </select>
                </div>

                <div class="flex-1">
                    <label for="employment-status" class="block text-sm font-medium text-gray-700">Role</label>
                    <select name='role' id="role" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">
                        <option value=""  selected>Select user role</option>
                        <option value="0" {{ $employee->role == 'admin' ? 'selected' : '' }}>Admin</option>
                        <option value="4" {{ $employee->role == 'payroll officer' ? 'selected' : '' }}>Payroll Officer</option>
                        <option value="3" {{ $employee->role == 'it admin' ? 'selected' : '' }}>IT Admin</option>
                        <option value="1" {{ $employee->role == 'employee' ? 'selected' : '' }}>Employee</option>
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
                <input name='salary' type="number" id="salary" value="{{(int) str_replace(',', '', $employee->salary) }}" placeholder="Enter salary" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500" />
            </div>
            
            <!-- <div>
                <label for="salary" class="block text-sm font-medium text-gray-700">Joining Date</label>
                <input name='joining_date' type="date" id="joining_date" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500" />
            </div> -->
        </div>

        <div class="flex justify-end mt-4 gap-2">
            <a onclick="closeUpdEmployee()" style="cursor:pointer" class="bg-gray-200 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-500">Cancel</a>
            <button type='submit' class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">Add</button>
        </div>
    </div>
    </form>
</div>
