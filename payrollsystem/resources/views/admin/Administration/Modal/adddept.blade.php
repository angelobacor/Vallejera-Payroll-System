<!-- Modal Structure -->
<div id="adddepartment" class="fixed inset-0 bg-gray-800 bg-opacity-60 flex items-center justify-center hidden z-50">
    <div class="bg-white p-6 rounded-lg shadow-lg relative flex flex-col max-w-2xl w-full h-full overflow-y-auto">
        <button onclick="closeadddepartment()" class="absolute top-2 right-2 text-gray-600 hover:text-gray-800 focus:outline-none" aria-label="Close">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>

        <h2 class="text-2xl font-semibold mb-1 text-gray-800">Add Department</h2>

        <div class="mt-4">
            <label class="block mb-2">Employee Name:</label>
            <input type="text" placeholder="Enter employee's name" class="border rounded w-full px-3 py-2" />
        </div>

        <div class="mt-4">
            <label class="block mb-2">Manager:</label>
            <select class="border rounded w-full px-3 py-2">
                <option value="">Select Manager</option>
                <option value="manager1">Manager 1</option>
                <option value="manager2">Manager 2</option>
                <!-- Add more managers as needed -->
            </select>
        </div>

        <div class="mt-4">
            <label class="block mb-2">Parent's Department:</label>
            <select class="border rounded w-full px-3 py-2">
                <option value="">Select Department</option>
                <option value="department1">Department 1</option>
                <option value="department2">Department 2</option>
                <!-- Add more departments as needed -->
            </select>
        </div>

        <div class="mt-4">
            <label class="block mb-2">Enter Location:</label>
            <input type="text" placeholder="Enter location" class="border rounded w-full px-3 py-2" />
        </div>

        <div class="mt-4">
            <label class="block mb-2">Choose Working Shift:</label>
            <select class="border rounded w-full px-3 py-2">
                <option value="">Select Shift</option>
                <option value="morning">Morning Shift</option>
                <option value="evening">Evening Shift</option>
                <option value="night">Night Shift</option>
                <!-- Add more shifts as needed -->
            </select>
        </div>

        <div class="mt-4">
            <label class="block mb-2">Description:</label>
            <textarea placeholder="Enter description" class="border rounded w-full px-3 py-2" rows="4"></textarea>
        </div>

        <div class="mt-6 flex justify-between">
            <button onclick="clearSelections()" class="bg-gray-300 text-gray-800 px-4 py-2 rounded hover:bg-gray-400">Clear</button>
            <button onclick="applySelections()" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Save</button>
        </div>
    </div>
</div>
