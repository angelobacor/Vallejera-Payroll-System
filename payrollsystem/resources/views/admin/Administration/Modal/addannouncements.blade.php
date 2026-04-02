<!-- Modal Structure -->
<div id="addannouncement" class="fixed inset-0 bg-gray-800 bg-opacity-60 flex items-center justify-center hidden z-50">
<div class="bg-white p-6 rounded-lg shadow-lg relative flex flex-col max-w-2xl w-full h-full overflow-y-auto">
        <button onclick="closeaddannouncement()" class="absolute top-2 right-2 text-gray-600 hover:text-gray-800 focus:outline-none" aria-label="Close">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>

        <h2 class="text-2xl font-semibold mb-1 text-gray-800">Add Work Shift</h2>
        <div class="mt-4">
            <label class="block mb-2">Title:</label>
            <input type="text" placeholder="Enter name" class="border rounded w-full px-3 py-2" />
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
            <label class="block mb-2">Department:</label>
            <input type="text" placeholder="+Add" class="border rounded w-full px-3 py-2" />
        </div>


        <div class="mt-4">
    <label class="block mb-2">Description:</label>
    <div id="editor" class="border rounded w-full" style="height: 300px;"></div>
</div>


      

        <div class="mt-6 flex justify-between">
            <button onclick="closeaddannouncement()" class="bg-gray-300 text-gray-800 px-4 py-2 rounded hover:bg-gray-400">Close</button>
            <button onclick="applySelections()" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Save</button>
        </div>
    </div>
</div>
