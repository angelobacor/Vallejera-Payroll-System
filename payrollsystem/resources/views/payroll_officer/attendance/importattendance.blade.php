@extends('layouts.sidebar')
@section('content')

<div class="h-full ml-14 mt-14 mb-5 md:ml-64">
    <div class="flex items-center justify-between mt-5 ml-2">
        <h1 class="text-2xl flex-grow">Import Attendance</h1>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-4 p-4 gap-4">
                <div class="col-span-1 bg-white shadow-lg rounded-md flex flex-col items-start p-3">
                    <div class="flex flex-col w-full">
                        <div class="flex flex-col items-center mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" width="48" height="48">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.325.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 0 1 1.37.49l1.296 2.247a1.125 1.125 0 0 1-.26 1.431l-1.003.827c-.293.241-.438.613-.43.992a7.723 7.723 0 0 1 0 .255c-.008.378.137.75.43.991l1.004.827c.424.35.534.955.26 1.43l-1.298 2.247a1.125 1.125 0 0 1-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.47 6.47 0 0 1-.22.128c-.331.183-.581.495-.644.869l-.213 1.281c-.09.543-.56.94-1.11.94h-2.594c-.55 0-1.019-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 0 1-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 0 1-1.369-.49l-1.297-2.247a1.125 1.125 0 0 1 .26-1.431l1.004-.827c.292-.24.437-.613.43-.991a6.932 6.932 0 0 1 0-.255c.007-.38-.138-.751-.43-.992l-1.004-.827a1.125 1.125 0 0 1-.26-1.43l1.297-2.247a1.125 1.125 0 0 1 1.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.086.22-.128.332-.183.582-.495.644-.869l.214-1.28Z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg>
                        </div>
                        <a href="#" class="m-2 text-black" onclick="showContent('employee'); return false;">Employee</a>
                        <a href="#" class="m-2 text-black" onclick="showContent('attendance'); return false;">Attendance</a>
                    </div>
                </div>
                <div class="col-span-3 bg-white shadow-lg rounded-md flex flex-col p-3">
                    <div id="bigBoxContent" class="w-full flex-grow flex flex-col">
                        
                        <div id="employee" class="content-section hidden">

                        
                                            
                    </div>

                        
                        <div id="attendance" class="content-section hidden">

                        <div class="flex items-center justify-between mt-2 ml-2">
                            <h1 class="text-2xl flex-grow">Import Attendance</h1>
                        </div>
                        <div class="border-t border-gray-300 w-full mt-4 mb-47"></div>
                        <div class="m-4">
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
                                </svg>
                                <p class="ml-1">CSV Format Guideline</p>
                            </div>

                            <div class="bg-yellow-100 rounded-md p-4 mt-4">
                                <p class="ml-1 text-gray-600">1. Format your CSV the same way as the sample file.</p>
                                <p class="ml-1 text-gray-600">2. Your CSV columns should be separated by commas, not semi-colons or any other characters.</p>
                                <p class="ml-1 text-gray-600">3. The names and the number of the column in your CSV should be the same as the sample.</p>
                                <p class="ml-1 text-gray-600">4. Required fields (employee_id, time in/out) column cell must not be empty.</p>
                                <p class="ml-1 text-gray-600">5. The column: employee_id value must  be the same value exists  on the application and the time in/out column must be a date format of Y-m-d Hm:s (the hour should 24 hours format)</p>
                                <p class="ml-1 text-gray-600">6. Recommended CSV file should not contain more than 500 rows with  default serve configuration.</p>
                            </div>
                            <p>We would like to provide you a sample .CSV file - <a class="text-blue-500 hover:underline">Download sample file</a></p>
                            <div class="border-2 border-dashed border-gray-300 p-4 mt-4 rounded-md">
                                    <p class="text-gray-600">Drag and drop your CSV file here, or</p>
                                    <label for="file-upload" class="text-blue-500 cursor-pointer hover:underline">Browse Files</label>
                                    <input id="file-upload" type="file" accept=".csv" class="hidden" onchange="handleFileUpload(event)">
                                    <p id="file-name" class="text-gray-600 mt-2"></p>
                                </div>
                                                    
                        </div>

                       
                        
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
