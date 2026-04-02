@extends('it_admin.layouts.sidebar')
@section('username')
{{$user->name}}
@endsection
@section('content')

<div class="h-full ml-14 mt-14 mb-5 md:ml-64">
    <div class="flex items-center justify-between mt-5 ml-2">
        <h1 class="text-2xl flex-grow">Payroll Settings</h1>
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
                        <a href="#" class="m-2 text-black" onclick="showContent('default-payrun'); return false;">Default Payrun</a>
                        <a href="#" class="m-2 text-black" onclick="showContent('badge-value'); return false;">Badge Value</a>
                        <a href="#" class="m-2 text-black" onclick="showContent('manage-audience'); return false;">Manage Audience</a>
                        <a href="#" class="m-2 text-black" onclick="showContent('payslip'); return false;">Payslip</a>
                    </div>
                </div>
                <div class="col-span-3 bg-white shadow-lg rounded-md flex flex-col p-3">
                    <div id="bigBoxContent" class="w-full flex-grow flex flex-col">
                        <div id="default-payrun" class="content-section hidden">
                        <div class="flex ml-2">
                                <h1 class="text-2xl flex-grow">Default Payrun</h1>
                            </div>
                            <div class="border-t border-gray-300 w-full mt-4 mb-4"></div>
                            <div class="m-4">
                                <div class="flex items-center mb-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
                                    </svg>
                                    <p class="ml-1">How payrun works?</p>
                                </div>
                                <div class="bg-yellow-100 rounded-md p-4 mt-4">
                                    <p class="ml-1 text-gray-600">1. Default payrun is applicable to generate payslip for all employees (Except those are updated individually) whenever it execute from<a class="text-blue-500 hover:underline">Payrun</a> module.</p>
                                    <p class="ml-1 text-gray-600">2. You can set payrun individually over the default from the<a class="text-blue-500 hover:underline">Employees</a> details.</p>
                                </div>
                                </div>
                                <div>
                                    <label for="payrun_period" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Payrun Period</label>
                                    <select id="payrun_period" name="payrun_period" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                        <option selected disabled>Choose Payrun Period</option>
                                        <option value="weekly">Weekly</option>
                                        <option value="monthly">Monthly</option>
                                    </select>
                                    <p class="text-gray-400 text-sm mt-1" style="font-style: italic;">Always run for last month</p>
                                </div>
                                <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Payrun Generating Type</label>
                        <div class="flex items-center space-x-4">
                            <label class="flex items-center">
                                <input type="radio" name="payrun_type" value="hour" class="text-primary-500 focus:ring-primary-500 dark:focus:ring-primary-500">
                                <span class="ml-2 text-sm text-gray-900 dark:text-white">Hour</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" name="payrun_type" value="daily_log" class="text-primary-500 focus:ring-primary-500 dark:focus:ring-primary-500">
                                <span class="ml-2 text-sm text-gray-900 dark:text-white">Daily Log</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" name="payrun_type" value="none" class="text-primary-500 focus:ring-primary-500 dark:focus:ring-primary-500">
                                <span class="ml-2 text-sm text-gray-900 dark:text-white">None</span>
                            </label>
                        </div>
                        </div>
                    <div>
                        <label for="consider_overtime" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Consider Overtime</label>
                        <div class="flex items-center">
                            <input type="checkbox" id="consider_overtime" name="consider_overtime" class="hidden">
                            <button type="button" id="consider_overtime_button" class="focus:outline-none relative w-12 h-6 bg-gray-400 rounded-full cursor-pointer">
                                <div id="toggleCircle" class="absolute left-1 top-1 w-4 h-4 bg-white rounded-full shadow-md transition-transform"></div>
                            </button>
                           
                        </div>
                        <p class="text-gray-400 text-sm mt-1" style="font-style: italic;">(Overtime will be calculated after the end of the total schedule time.)</p>
                    </div>
                    <div class="flex justify-center m-2">
                                    <button class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none">
                                        Save
                                    </button>

                                    </div>
                </div>
                        </div>
                        <div id="badge-value" class="content-section hidden">
                            <div class="flex ml-2">
                                <h1 class="text-2xl flex-grow">Badge Value</h1>
                            </div>
                            <div class="border-t border-gray-300 w-full mt-4 mb-4"></div>
                            <div class="m-4">
                                <div class="flex items-center mb-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
                                    </svg>
                                    <p class="ml-1">How badge value works?</p>
                                </div>
                                <div class="bg-yellow-100 rounded-md p-4 mt-4">
                                    <p class="ml-1 text-gray-600">1. Create a badge for allowance or deduction from <a class="text-blue-500 hover:underline">Beneficiary Badge</a> module.</p>
                                    <p class="ml-1 text-gray-600">2. Select a badge and assign a value that will apply to all employees (except those updated individually) during payrun.</p>
                                    <p class="ml-1 text-gray-600">3. You can set beneficiaries individually over the default from the <a class="text-blue-500 hover:underline">Employees</a> details.</p>
                                    <p class="ml-1 text-gray-600">4. You can also update beneficiaries in the <a class="text-blue-500 hover:underline">Payslip</a> generated for each employee.</p>
                                </div>
                                <div class="mt-6 flex flex-col space-y-4">
                                    <div class="flex items-center space-x-4">
                                        <label for="allowance" class="text-gray-700 w-32">Allowance:</label>
                                        <input type="text" id="allowance" name="allowance" class="border border-gray-300 rounded-md p-2 w-full" placeholder="+ Add">
                                    </div>
                                    <div class="flex items-center space-x-4">
                                        <label for="deduction" class="text-gray-700 w-32">Deduction:</label>
                                        <input type="text" id="deduction" name="deduction" class="border border-gray-300 rounded-md p-2 w-full" placeholder="+ Add">
                                    </div>
                                    <div class="flex justify-center m-2">
                                    <button class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none">
                                        Save
                                    </button>

                                    </div>
                                </div>

                            </div>
                        </div>
                        <div id="manage-audience" class="content-section hidden">
                            <div class="flex ml-2">
                                <h1 class="text-2xl flex-grow">Manage Audience</h1>
                            </div>
                            <div class="border-t border-gray-300 w-full mt-4 mb-4"></div>
                            <div class="m-4">
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
                                    </svg>
                                    <p class="ml-1">Restriction Note</p>
                                </div>
                                <div class="bg-yellow-100 rounded-md p-4 mt-4">
                                    <p class="ml-1 text-gray-600">1. Set restriction rules for audience access.</p>
                                    <p class="ml-1 text-gray-600">2. Control visibility based on role or department.</p>
                                    <p class="ml-1 text-gray-600">3. Ensure correct data access for different user levels.</p>
                                </div>
                                <div class="flex flex-col space-y-4">
   
                                    <div class="flex space-x-3">
                                        <div class="flex flex-col w-1/4 space-y-1">
                                            <label for="restricted-user-1" class="text-gray-700">Restricted User:</label>
                                            <p class="text-gray-500 text-sm">(For Payrun)</p>
                                        </div>
                                        <div class="flex flex-col w-3/4 space-y-1">
                                            <label for="department-preference-1" class="text-gray-700">Department Preference:</label>
                                            <input type="text" id="department-preference-1" name="department-preference-1" class="border border-gray-300 rounded-md p-2 w-full" placeholder="+ Add">
                                            
                                            <label for="user-preference-1" class="text-gray-700">User Preference:</label>
                                            <input type="text" id="user-preference-1" name="user-preference-1" class="border border-gray-300 rounded-md p-2 w-full" placeholder="+ Add">
                                        </div>
                                    </div>

                                    
                                    <div class="flex space-x-3">
                                        <div class="flex flex-col w-1/4 space-y-1">
                                            <label for="restricted-user-2" class="text-gray-700">Restricted User:</label>
                                            <p class="text-gray-500 text-sm">(For Beneficiary Badge)</p>
                                        </div>
                                        <div class="flex flex-col w-3/4 space-y-1">
                                            <label for="department-preference-2" class="text-gray-700">Employment Status Preference:</label>
                                            <input type="text" id="department-preference-2" name="department-preference-2" class="border border-gray-300 rounded-md p-2 w-full" placeholder="+ Add">
                                            
                                            <label for="user-preference-2" class="text-gray-700">Department Preference:</label>
                                            <input type="text" id="user-preference-2" name="user-preference-2" class="border border-gray-300 rounded-md p-2 w-full" placeholder="+ Add">
                                        
                                            <label for="user-preference-2" class="text-gray-700">User Preference:</label>
                                            <input type="text" id="user-preference-2" name="user-preference-2" class="border border-gray-300 rounded-md p-2 w-full" placeholder="+ Add">
                                        </div>

                                    </div>
                                    <div class="flex justify-center m-2">
                                    <button class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none">
                                        Save
                                    </button>
                                    </div>
                                </div>


                                
                                
                        </div>
                        </div>
                        <div id="payslip" class="content-section hidden">
    <div class="flex ml-2">
        <h1 class="text-2xl flex-grow">Payslip</h1>
    </div>
    <div class="border-t border-gray-300 w-full mt-4 mb-4"></div>
    <div class="m-4 row">
        <div class="flex items-center mb-2">
            <label class="ml-1 text-black-600">Payslip Logo</label>
            <input type="radio" id="logo1" name="payslip-logo" value="logo1" class="mr-2 ml-4">
            <label  class="ml-1 text-black-600">Use default logo</label>
            <input type="radio" id="logo2" name="payslip-logo" value="logo2" class="mr-2 ml-4">
            <label  class="ml-1 text-black-600">Customize</label>
        </div>
        <div class="flex items-center mb-2">
            <label class="ml-1 text-black-600">Payslip Title</label>
            <input type="radio" id="title1" name="payslip-title" value="title1" class="mr-2 ml-4">
            <label  class="ml-1 text-black-600">Use default title</label>
            <input type="radio" id="title1" name="payslip-title" value="title1" class="mr-2 ml-4">
            <label  class="ml-1 text-black-600">Customize</label>
        </div>
        <div class="flex items-center mb-2">
            <label class="ml-1 text-black-600">Payslip <A></A>Address</label>
            <input type="radio" id="add1" name="payslip-title" value="add1" class="mr-2 ml-4">
            <label class="ml-1 text-black-600">Use default address</label>
            <input type="radio" id="add2" name="payslip-title" value="add2" class="mr-2 ml-4">
            <label class="ml-1 text-black-600">Customize</label>
        </div>
    </div>
    <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                        Save
                    </button>
</div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
