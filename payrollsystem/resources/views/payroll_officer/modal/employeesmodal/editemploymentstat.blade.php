<!-- Modal Structure -->
<div id="editemstat" class="fixed inset-0 bg-gray-800 bg-opacity-60 flex items-center justify-center hidden z-50">
    <div class="bg-white p-4 rounded-lg shadow-lg relative w-full max-w-md">
        <button onclick="closeEditmployementstat()" class="absolute top-2 right-2 text-gray-600 hover:text-gray-800 focus:outline-none" aria-label="Close">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
        
        <h2 class="text-2xl font-semibold mb-4 text-gray-800">Edit Employement Status</h2>
        
        <form class="space-y-4" method="POST" action="{{route('hr_edit_employment_status')}}">
            @csrf
            <input type="hidden" id="emp_id" name="emp_id" />
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" id="emp_name" disabled name="emp_name" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500" required />
            </div>

           
            <div class="flex-1">
                    <label for="employment-status" class="block text-sm font-medium text-gray-700">Color Value</label>
                    <select id="employment-status" name="emp_stat" required class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">
                        <option value="" disabled selected>Select</option>
                        @if($emp_stat)
                            @foreach($emp_stat as $stat)
                                <option value="{{$stat->id}}">{{$stat->status}}</option>
                            @endforeach
                        @endif
                        
                    </select>
                </div>
                

      
            <div class="flex justify-end mt-4 gap-2">
                <button type="button" onclick="closeDesignationAE()" class="bg-gray-200 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-500">Cancel</button>
                <button type="submit" onclick="saveDesignation()" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">Save</button>
            </div>
        </form>
    </div>
</div>

