<!-- Modal Structure -->
<div id="type" class="fixed inset-0 bg-gray-800 bg-opacity-60 flex items-center justify-center hidden z-50">
    <div class="bg-white p-6 rounded-lg shadow-lg relative flex flex-col w-full max-w-md">
        <button onclick="closeTypeAdmin()" class="absolute top-2 right-2 text-gray-600 hover:text-gray-800 focus:outline-none" aria-label="Close">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>

        <div class="flex items-center mt-4">
            <label class="flex items-center mr-4">
                <input type="checkbox" class="mr-2" /> Regular
            </label>
            <label class="flex items-center">
                <input type="checkbox" class="mr-2" /> Schedule
            </label>
        </div>

        <div class="mt-6 flex justify-between">
            <button onclick="clearSelections()" class="bg-gray-300 text-gray-800 px-4 py-2 rounded hover:bg-gray-400">Clear</button>
            <button onclick="applySelections()" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Apply</button>
        </div>
    </div>
</div>
