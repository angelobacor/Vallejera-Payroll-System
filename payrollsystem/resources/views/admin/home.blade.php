@extends('admin.layouts.sidebar')

@section('username')
{{$user->name}}
@endsection
@section('username')
{{$user->name}}
@endsection

@section('content')
<div>

<div class="h-full ml-14 mt-14 mb-5 md:ml-64">
    
        <!-- Statistics Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 p-4 gap-4">
          <div class="bg-blue-500 dark:bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-blue-600 dark:border-gray-600 text-white font-medium group">
            <div class="flex justify-center items-center w-14 h-14 bg-white rounded-full transition-all duration-300 transform group-hover:rotate-12">
              <svg width="30" height="30" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="stroke-current text-blue-800 dark:text-gray-800 transform transition-transform duration-500 ease-in-out"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z"></path></svg>
            </div>
            <div class="text-right">
              <p class="text-2xl">{{$employees->count()}}</p>
              <p>Total Employees</p>
            </div>
          </div>
          <div class="bg-blue-500 dark:bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-blue-600 dark:border-gray-600 text-white font-medium group">
            <div class="flex justify-center items-center w-14 h-14 bg-white rounded-full transition-all duration-300 transform group-hover:rotate-12">
            <svg width="30" height="30" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="stroke-current text-blue-800 dark:text-gray-800 transform transition-transform duration-500 ease-in-out"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21M3 3h12m-.75 4.5H21m-3.75 3.75h.008v.008h-.008v-.008Zm0 3h.008v.008h-.008v-.008Zm0 3h.008v.008h-.008v-.008Z"></path></svg>

            </div>
            <div class="text-right">
              <p class="text-2xl">{{$departments->count()}}</p>
              <p>Total Departments</p>
            </div>
          </div>
          <div class="bg-blue-500 dark:bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-blue-600 dark:border-gray-600 text-white font-medium group">
            <div class="flex justify-center items-center w-14 h-14 bg-white rounded-full transition-all duration-300 transform group-hover:rotate-12">
              <svg width="30" height="30" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="stroke-current text-blue-800 dark:text-gray-800 transform transition-transform duration-500 ease-in-out"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10"></path></svg>
            </div>
            <div class="text-right">
              <p class="text-2xl">0</p>
              <p>Total Leave Request</p>
            </div>
          </div>
          <div class="bg-blue-500 dark:bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-blue-600 dark:border-gray-600 text-white font-medium group">
            <div class="flex justify-center items-center w-14 h-14 bg-white rounded-full transition-all duration-300 transform group-hover:rotate-12">
              <svg width="30" height="30" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="stroke-current text-blue-800 dark:text-gray-800 transform transition-transform duration-500 ease-in-out"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M22 10.5h-6m-2.25-4.125a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0ZM4 19.235v-.11a6.375 6.375 0 0 1 12.75 0v.109A12.318 12.318 0 0 1 10.374 21c-2.331 0-4.512-.645-6.374-1.766Z"></path></svg>
            </div>
            <div class="text-right">
              <p class="text-2xl">0</p>
              <p>On Leave Today</p>
            </div>
          </div>
        </div>
        <!-- ./Statistics Cards -->

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="grid grid-cols-4 p-4 gap-4">
                    
                    <div class="col-span-3 bg-white-500 shadow-lg rounded-md flex flex-col items-center justify-center p-3 border-b-4 border-blue-600 dark:border-gray-600 text-white font-medium group">
                        <div class="w-full h-96"> 
                            <canvas id="employeeStatisticsChart"></canvas>
                            
                        </div>
                        
                            
                        
                    </div>

                    
          <div class="col-span-1 bg-blue-500 dark:bg-gray-800 shadow-lg flex flex-col justify-between p-3 border-b-4 border-blue-600 dark:border-gray-600 text-white font-medium group">
              
              <div class="text-top">
                  <p class="text-2xl">Total Attendance</p>
                  <p>Today - 0</p>
              </div>
              <div>
                  <div class="flex items-center">
                      <span class="w-4 h-4 bg-orange-500 squared-full inline-block mr-2"></span>
                      <span>Early</span>
                  </div>
                  <div class="flex items-center mt-2">
                      <span class="w-4 h-4 bg-red-500 squared-full inline-block mr-2"></span>
                      <span>Late</span>
                  </div>
                  <div class="flex items-center mt-2">
                      <span class="w-4 h-4 bg-green-500 squared-full inline-block mr-2"></span>
                      <span>Regular</span>
                  </div>
              </div>
          </div>

                    </div>
                </div>

                <!-- Include Chart.js library for bar graph -->
                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                <script>
                  const ctx = document.getElementById('employeeStatisticsChart').getContext('2d');
                  const employeeStatisticsChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                      labels: ['Probation', 'Regular', 'Terminated'],
                      datasets: [{
                        label: 'Employee Statistics',
                        data: [{{$probations->count()}}, {{$regulars->count()}}, {{$terminated->count()}}],
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                      }]
                    },
                    options: {
                      indexAxis: 'y', 
                      responsive: true,
                      maintainAspectRatio: false, 
                      scales: {
                        x: {
                          beginAtZero: true,
                          max: 20,
                          ticks: {
                            callback: function(value) {
                              return value;
                            }
                          }
                        }
                      }
                    }
                  });
                </script>

            </div>
        </div>
    </div>
</div>
@endsection
