@extends('employee.layouts.sidebar')
@section('username')
{{$user->name}}
@endsection
@section('content')

<div class="h-full ml-14 mt-14 mb-5 md:ml-64">
    <div class="flex items-center justify-between mt-5 ml-2">
        <h1 class="text-2xl flex-grow">Attendance Settings</h1>
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
                        <a href="#" class="m-2 text-black" onclick="showContent('preference'); return false;">Preference</a>
                        <a href="#" class="m-2 text-black" onclick="showContent('definition'); return false;">Definition</a>
                        <a href="#" class="m-2 text-black" onclick="showContent('Geo-IP'); return false;">Geolocation and IP</a>
                    </div>
                </div>
                <div class="col-span-3 bg-white shadow-lg rounded-md flex flex-col p-3">
                    <div id="bigBoxContent" class="w-full flex-grow flex flex-col">
                        <div id="preference" class="content-section">
                            <label for="auto_approval" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Auto-Approval</label>
                            <div class="flex items-center">
                                <input type="checkbox" id="auto_approval" name="auto_approval" class="hidden">
                                <button type="button" id="auto_approval_button" class="focus:outline-none relative w-12 h-6 bg-gray-400 rounded-full cursor-pointer">
                                    <div id="toggleCircle" class="absolute left-1 top-1 w-4 h-4 bg-white rounded-full shadow-md transition-transform"></div>
                                </button>
                            </div>
                            <p class="text-black-400 text-sm mt-1">In the enabled state, all the attendance requests will be approved automatically without any reviews. As default, the app considers all employees for approval. Note that it is possible to manage employees for auto approval.</p>
                        </div>

                        <div id="definition" class="content-section hidden">
                            <div class="flex ml-2">
                                <h1 class="text-2xl flex-grow">Definition</h1>
                            </div>
                            <div class="border-t border-gray-300 w-full mt-4 mb-4"></div>
                            <div>
                                <label class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Punch In Time Tolerance (Minutes)</label>
                                <p class="block text-xs font-medium text-gray-400 dark:text-white italic">The adjustment considers the punch in time based on a work shift</p>
                                <div class="flex space-x-2 mt-2 justify-end">
                                    <span class="inline-flex items-center px-3 py-1 text-xs font-semibold text-white bg-orange-500 rounded-full">Early</span>
                                    <span class="inline-flex items-center px-3 py-1 text-xs font-semibold text-white bg-green-500 rounded-full">Regular</span>
                                    <span class="inline-flex items-center px-3 py-1 text-xs font-semibold text-white bg-red-500 rounded-full">Late</span>
                                </div>
                                <div class="flex space-x-2 mt-2 justify-end">
                                    <p class="text-xs text-gray-400">Before on time</p>
                                    <p class="text-xs text-gray-400">On time to tolerance</p>
                                    <p class="text-xs text-gray-400">After tolerance</p>
                                </div>
                                <div class="border-t border-gray-300 w-full mt-4 mb-4"></div>
                                <div>
                                    <label class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Work Availability Definition (Percentage)</label>
                                    <p class="block text-xs font-medium text-gray-400 dark:text-white italic">The attendance percentage that defines an employee as Good or Bad</p>
                                    <div class="flex space-x-2 mt-2 justify-end">
                                        <span class="inline-flex items-center px-3 py-1 text-xs font-semibold text-white bg-green-500 rounded-full">Good</span>
                                        <span class="inline-flex items-center px-3 py-1 text-xs font-semibold text-white bg-red-500 rounded-full">Bad</span>
                                    </div>
                                    <div class="flex space-x-2 mt-2 justify-end">
                                        <p class="text-xs text-gray-400">Equal or above the percent</p>
                                        <p class="text-xs text-gray-400">Below the Percent</p>
                                    </div>
                                    <div class="border-t border-gray-300 w-full mt-4 mb-4"></div>
                                    <div>
                                        <label class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Punch In/Out Alert</label>
                                        <p class="block text-xs font-medium text-gray-400 dark:text-white italic">System will show a pop-up message in a defined interval if a user does not punch in or out according to their work shift</p>
                                        <div class="flex space-x-2 mt-2 justify-end">
                                            <input type="checkbox" id="alert_toggle" name="alert_toggle" class="hidden">
                                            <button type="button" id="alert_toggle_button" class="focus:outline-none relative w-12 h-6 bg-gray-400 rounded-full cursor-pointer">
                                                <div id="alertToggleCircle" class="absolute left-1 top-1 w-4 h-4 bg-white rounded-full shadow-md transition-transform"></div>
                                            </button>
                                        </div>
                                        <div class="border-t border-gray-300 w-full mt-4 mb-4"></div>
                                        <div>
                                            <label class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Alert Area</label>
                                            <p class="block text-xs font-medium text-gray-400 dark:text-white italic">Selecting "Web" will only show pop-ups on the browser tab, while selecting "System" will show alerts in your system</p>
                                            <div class="flex space-x-2 mt-2 justify-end">
                                                <div class="flex items-center">
                                                    <input type="checkbox" id="web" name="web" class="mr-1" />
                                                    <label for="web" class="text-sm text-gray-700">Web</label>
                                                </div>
                                                <div class="flex items-center">
                                                    <input type="checkbox" id="system" name="system" class="mr-1" />
                                                    <label for="system" class="text-sm text-gray-700">System</label>
                                                </div>
                                            </div>
                                            <div class="border-t border-gray-300 w-full mt-4 mb-4"></div>
                                            <div>
                                                <label class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Punch Alert Interval</label>
                                                <p class="block text-xs font-medium text-gray-400 dark:text-white italic">In Seconds</p>
                                                <div class="flex space-x-2 mt-2 justify-end">
                                                    <input id="alert_interval" name="alert_interval" type="text" placeholder="30" class="w-30 p-2 border border-gray-300 rounded-md text-sm">
                                                </div>
                                            </div>

                                            <button type="submit" class="text-white inline-flex bg-blue-700 hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                Save
                                            </button>
                                                                </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="Geo-IP" class="content-section hidden">
    <div class="flex ml-2">
        <h1 class="text-2xl flex-grow">Geolocation and IP</h1>
    </div>
    <div class="border-t border-gray-300 w-full mt-4 mb-4"></div>
    
    <div class="flex items-center mt-4">
        <p class="text-black-400 text-sm mr-4">Choose Geolocation Service:</p>
        <form class="flex">
            <div class="flex items-center mr-4">
                <input type="radio" id="service1" name="geolocation-service" value="service1" class="mr-2">
                <label for="service1" class="text-sm">Service 1</label>
            </div>
            <div class="flex items-center mr-4">
                <input type="radio" id="service2" name="geolocation-service" value="service2" class="mr-2">
                <label for="service2" class="text-sm">Service 2</label>
            </div>
            <div class="flex items-center">
                <input type="radio" id="service3" name="geolocation-service" value="service3" class="mr-2">
                <label for="service3" class="text-sm">Service 3</label>
            </div>
        </form>
       
    </div>
    <p class="text-black-400 text-sm mr-4 mt-2">Api key</p>
    <button type="submit" class="text-white inline-flex bg-blue-700 hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                Save
                                            </button>
</div>

</div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
