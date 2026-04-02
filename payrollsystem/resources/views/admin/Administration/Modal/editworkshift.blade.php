<!-- Modal Structure -->
<div id="editworkshift" class="fixed inset-0 bg-gray-800 bg-opacity-60 flex items-center justify-center hidden z-50">
<div class="bg-white p-6 rounded-lg shadow-lg relative flex flex-col max-w-2xl w-full h-full overflow-y-auto">
        <button onclick="closeEditWorkingShift()" class="absolute top-2 right-2 text-gray-600 hover:text-gray-800 focus:outline-none" aria-label="Close">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>

        <h2 class="text-2xl font-semibold mb-1 text-gray-800">View Work Shift</h2>

        <div class="flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
            </svg>
            <p class="ml-1">Note</p>
        </div>

        <div class="bg-yellow-100 rounded-md p-4 mt-4">
            <p class="ml-1 mt-4 text-gray-600">This work shift is read only due to attendance history.</p>
            
        </div>

        <div class="mt-4">
            <label class="block mb-2">Employee Name:</label>
            <input type="text" placeholder="Enter employee's name" class="border rounded w-full px-3 py-2" />
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
            <label class="block mb-2">Weekday:</label>
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

        <div class="mt-6 flex justify-between">
            <button onclick="closeEditWorkingShift()" class="bg-gray-300 text-gray-800 px-4 py-2 rounded hover:bg-gray-400">Close</button>
        </div>
    </div>
</div>
