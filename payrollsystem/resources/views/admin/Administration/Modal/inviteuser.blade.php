<!-- Modal Structure -->
<div id="invite-user" class="fixed inset-0 bg-gray-800 bg-opacity-60 flex items-center justify-center hidden z-50">
<div class="bg-white p-6 rounded-lg shadow-lg relative flex flex-col max-w-2xl w-full h-full overflow-y-auto">
        <button onclick="closeinviteuser()" class="absolute top-2 right-2 text-gray-600 hover:text-gray-800 focus:outline-none" aria-label="Close">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
        
        <h2 class="text-2xl font-semibold mb-4 text-gray-800">Invite User</h2>
        
        <div class="space-y-4">
            <!-- Email Input -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" id="email" placeholder="Enter email" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500" />
            </div>

            <!-- Gender Radio Buttons -->
            <div>
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
            </div>

            <!-- Employee ID and Department -->
            <div class="flex gap-4">
                <!-- Employee ID Input -->
                <div class="flex-1">
                    <label for="employee-id" class="block text-sm font-medium text-gray-700">Employee ID</label>
                    <input type="text" id="employee-id" placeholder="Enter employee ID" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500" />
                </div>

                <!-- Department Dropdown -->
                <div class="flex-1">
                    <label for="department" class="block text-sm font-medium text-gray-700">Department</label>
                    <select id="department" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">
                        <option value="" disabled selected>Select department</option>
                        <option value="hr">HR</option>
                        <option value="it">IT</option>
                        <option value="finance">Finance</option>
                        <!-- Add more options as needed -->
                    </select>
                </div>
            </div>

            <!-- Designation and Employment Status -->
            <div class="flex gap-4">
                <!-- Designation Dropdown -->
                <div class="flex-1">
                    <label for="designation" class="block text-sm font-medium text-gray-700">Designation</label>
                    <select id="designation" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">
                        <option value="" disabled selected>Select designation</option>
                        <option value="director">Director</option>
                        <option value="vp">Vice President</option>
                        <option value="manager">Manager</option>
                        <!-- Add more options as needed -->
                    </select>
                </div>

                <!-- Employment Status Dropdown -->
                <div class="flex-1">
                    <label for="employment-status" class="block text-sm font-medium text-gray-700">Employment Status</label>
                    <select id="employment-status" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">
                        <option value="" disabled selected>Select employment status</option>
                        <option value="full-time">Full-time</option>
                        <option value="part-time">Part-time</option>
                        <option value="contract">Contract</option>
                        <!-- Add more options as needed -->
                    </select>
                </div>
            </div>

            <!-- Roles Input -->
            <div>
                <label for="roles" class="block text-sm font-medium text-gray-700">Roles</label>
                <input type="text" id="roles" placeholder="Enter roles" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500" />
            </div>

            <!-- Salary Input -->
            <div>
                <label for="salary" class="block text-sm font-medium text-gray-700">Salary</label>
                <input type="number" id="salary" placeholder="Enter salary" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500" />
            </div>

              
            <div>
                <label for="date" class="block text-sm font-medium text-gray-700">Joining Date</label>
                <input type="date" id="date" placeholder = "Enter joining date" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500" />
            </div>

            <div class="flex items-center">
                <input type="checkbox" id="exampleCheckbox" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded" />
                <label for="exampleCheckbox" class="ml-2 block text-sm text-gray-700">Do not show in employee list</label>
            </div>


        </div>

        <div class="flex justify-end mt-4 gap-2">
            <button onclick="closeinviteuser()" class="bg-gray-200 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-500">Cancel</button>
            <button onclick="inviteEmployee()" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">Invite</button>
        </div>
    </div>
</div>
