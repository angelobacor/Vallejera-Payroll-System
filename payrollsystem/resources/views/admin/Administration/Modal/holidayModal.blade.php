<!-- Modal Structure -->
<div id="holidayModal" class="fixed inset-0 bg-gray-800 bg-opacity-60 flex items-center justify-center hidden z-50">
<div class="bg-white p-6 rounded-lg shadow-lg relative flex flex-col max-w-2xl w-full h-full overflow-y-auto">
        <button onclick="closeHolidayModal()" class="absolute top-2 right-2 text-gray-600 hover:text-gray-800 focus:outline-none" aria-label="Close">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>

        <h2 class="text-2xl font-semibold mb-1 text-gray-800">Add Holiday</h2>

        <div class="mt-4">
            <label class="block mb-2">Employee Name:</label>
            <input type="text" placeholder="Enter employee's name" class="border rounded w-full px-3 py-2" />
        </div>

        <div class="mt-4">
            <label class="block mb-2">Start Date:</label>
            <input type="date" class="border rounded w-full px-3 py-2" />
        </div>

        <div class="mt-4">
            <label class="block mb-2">End Date:</label>
            <input type="date" class="border rounded w-full px-3 py-2" />
        </div>

        <div class="mt-4">
            <label class="block mb-2">Available For:</label>
            <div class="flex items-center mb-2">
                <input type="text" placeholder="+Add" class="border rounded w-full px-3 py-2" />
            </div>
        </div>

        <div class="mt-4">
            <label class="block mb-2">Description:</label>
            <textarea placeholder="Enter shift description" class="border rounded w-full px-3 py-2" rows="3"></textarea>
        </div>

        <div class="mt-4 flex items-center">
            <input type="checkbox" class="mr-2" id="repeatAnnually" />
            <label for="repeatAnnually">Repeat Annually</label>
        </div>

        <div class="mt-6 flex justify-between">
            <button id="saveModal" class="bg-blue-500 text-white px-4 py-2 rounded">Save</button>
            <button onclick="closeHolidayModal()" class="bg-gray-300 text-black px-4 py-2 rounded ml-2">Close</button>
        </div>
    </div>
</div>
