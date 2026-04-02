@extends('payroll_officer.layouts.sidebar')

@section('username')
{{$users->name}}
@endsection

@section('content')

<div class="h-full ml-14 mt-14 mb-5 md:ml-64">
    <div class="flex items-center justify-between mt-5 ml-2">
        <h1 class="text-2xl flex-grow">Emergency Contacts</h1>
    </div>
    <div class="border-t border-gray-300 w-full mt-4 mb-47"></div>
    
        <div class="overflow-x-auto mt-6 ml-10 mr-10">
            <table class="min-w-full divide-y divide-gray-200">
                <tbody class="bg-white divide-y divide-gray-200">
                @if($user->count() > 0)
                @foreach($user as $user)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class = "m-3">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M18 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0ZM3 19.235v-.11a6.375 6.375 0 0 1 12.75 0v.109A12.318 12.318 0 0 1 9.374 21c-2.331 0-4.512-.645-6.374-1.766Z" />
                                </svg>



</div>

                                Contact Name: {{$user->e_name}}
                            </div>
                        </td>
                        <td class="text-gray-300">Number: {{$user->e_number}}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center justify-between">
                                <button onclick="toggleAccordion(event)" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none">
                                    Add
                                </button>
                            </div>
                        </td>
                    </tr>
                  @endforeach
                  @else
                  <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class = "m-3">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M18 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0ZM3 19.235v-.11a6.375 6.375 0 0 1 12.75 0v.109A12.318 12.318 0 0 1 9.374 21c-2.331 0-4.512-.645-6.374-1.766Z" />
                                </svg>



</div>

                                Emergency Contact
                            </div>
                        </td>
                        <td class="text-gray-300">You can add multiple contacts</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center justify-between">
                                <button onclick="toggleAccordion(event)" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none">
                                    Add
                                </button>
                            </div>
                        </td>
                    </tr>
                  @endif
                </tbody>
            </table>
        </div>
        
    </div>
</div>

@endsection
