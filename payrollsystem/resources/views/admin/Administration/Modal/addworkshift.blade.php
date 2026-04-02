<!-- Modal Structure -->
<div id="addworkshift" class="fixed inset-0 bg-gray-800 bg-opacity-60 flex items-center justify-center hidden z-50">
<div class="bg-white p-6 rounded-lg shadow-lg relative flex flex-col max-w-2xl w-full h-full overflow-y-auto">
        <button onclick="closeAddWorkShift()" class="absolute top-2 right-2 text-gray-600 hover:text-gray-800 focus:outline-none" aria-label="Close">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>

        <h2 class="text-2xl font-semibold mb-1 text-gray-800">Add Work Shift</h2>
        <div class="mt-4">
            <label class="block mb-2">Employee Name:</label>
            <input type="text" placeholder="Enter employee's name" class="border rounded w-full px-3 py-2" />
        </div>

        <div class="flex space-x-4">
                <div>
                    <label class="block mb-1">Start Date:</label>
                    <input type="date" class="border rounded w-full px-3 py-2" />
                </div>
                <div>
                    <label class="block mb-1">End Date:</label>
                    <input type="date" class="border rounded w-full px-3 py-2" />
                </div>
            </div>

        <div class="mt-4">
            <label class="block mb-2">Working Shift Type:</label>
            <label class="flex items-center mr-4">
                <input type="radio" name="shiftType" value="Regular" class="mr-2" /> Regular
            </label>
            <label class="flex items-center">
                <input type="radio" name="shiftType" value="Scheduled" class="mr-2" /> Scheduled
            </label>
        </div>

        <div class="mt-4">
            <label class="block mb-2">Regular Week Time (set week with set time):</label>
            <div class="flex space-x-4">
                <div>
                    <label class="block mb-1">Start Time:</label>
                    <input type="time" class="border rounded w-full px-3 py-2" />
                </div>
                <div>
                    <label class="block mb-1">End Time:</label>
                    <input type="time" class="border rounded w-full px-3 py-2" />
                </div>
            </div>
        </div>

        <div class="mt-4">
            <label class="block mb-2">Select Weekend Dayoff
                :</label>
            <div class="flex flex-wrap">
                <label class="flex items-center mr-4">
                    <input type="checkbox" class="mr-2" /> Sunday
                </label>
                <label class="flex items-center mr-4">
                    <input type="checkbox" class="mr-2" /> Monday
                </label>
                <label class="flex items-center mr-4">
                    <input type="checkbox" class="mr-2" /> Tuesday
                </label>
                <label class="flex items-center mr-4">
                    <input type="checkbox" class="mr-2" /> Wednesday
                </label>
                <label class="flex items-center mr-4">
                    <input type="checkbox" class="mr-2" /> Thursday
                </label>
                <label class="flex items-center mr-4">
                    <input type="checkbox" class="mr-2" /> Friday
                </label>
                <label class="flex items-center mr-4">
                    <input type="checkbox" class="mr-2" /> Saturday
                </label>
            </div>
        </div>

        <div class="mt-4">
            <label class="block mb-2">Description:</label>
            <input type="text" placeholder="Add Description Here" class="border rounded w-full px-3 py-2" />
        </div>

        <div class="mt-4">
            <label class="block mb-2">Department:</label>
            <input type="text" placeholder="+Add" class="border rounded w-full px-3 py-2" />
        </div>

        <div class="mt-4">
            <label class="block mb-2">Employee:</label>
            <input type="text" placeholder="+Add" class="border rounded w-full px-3 py-2" />
        </div>

        <div class="mt-6 flex justify-between">
            <button onclick="clearSelections()" class="bg-gray-300 text-gray-800 px-4 py-2 rounded hover:bg-gray-400">Clear</button>
            <button onclick="applySelections()" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Save</button>
        </div>
    </div>
</div>
