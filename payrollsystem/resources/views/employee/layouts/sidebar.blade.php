<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width,
                   initial-scale=1.0">
    <title>Payroll System</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


        <script src="https://cdn.tailwindcss.com"></script>

<style>
    html, body {
    height: 100%;
    font-family: 'Ubuntu', sans-serif;
}

.gfg {
    height: 50px;
    width: 50px;

}

.mynav {
    color: #fff;
}

.mynav li a {
    color: #fff;
    text-decoration: none;
    width: 100%;
    display: block;
    border-radius: 5px;
    padding: 8px 5px;
}

.mynav li a.active {
    background: rgba(255, 255, 255, 0.2);
}

.mynav li a:hover {
    background: rgba(255, 255, 255, 0.2);
}

.mynav li a i {
    width: 25px;
    text-align: center;
}

.notification-badge {
    background-color: rgba(255, 255, 255, 0.7);
    float: right;
    color: #222;
    font-size: 14px;
    padding: 0px 8px;
    border-radius: 2px;
}

.main{
    transition: all 0.35s ease-in-out;
}

#bdSidebar {
    transition: all 0.35s ease-in-out;
}

#bdSidebar.offcanvas-md {
    width: 232px;
}

#bdSidebar.collapsed {
    width: 360px !important;
}


</style>
</head>

<body>
<style>
  /* Compiled dark classes from Tailwind */
  .dark .dark\:divide-gray-700 > :not([hidden]) ~ :not([hidden]) {
    border-color: rgba(55, 65, 81);
  }
  .dark .dark\:bg-gray-50 {
    background-color: rgba(249, 250, 251);
  }
  .dark .dark\:bg-gray-100 {
    background-color: rgba(243, 244, 246);
  }
  .dark .dark\:bg-gray-600 {
    background-color: rgba(75, 85, 99);
  }
  .dark .dark\:bg-gray-700 {
    background-color: rgba(55, 65, 81);
  }
  .dark .dark\:bg-gray-800 {
    background-color: rgba(31, 41, 55);
  }
  .dark .dark\:bg-gray-900 {
    background-color: rgba(17, 24, 39);
  }
  .dark .dark\:bg-red-700 {
    background-color: rgba(185, 28, 28);
  }
  .dark .dark\:bg-green-700 {
    background-color: rgba(4, 120, 87);
  }
  .dark .dark\:hover\:bg-gray-200:hover {
    background-color: rgba(229, 231, 235);
  }
  .dark .dark\:hover\:bg-gray-600:hover {
    background-color: rgba(75, 85, 99);
  }
  .dark .dark\:hover\:bg-gray-700:hover {
    background-color: rgba(55, 65, 81);
  }
  .dark .dark\:hover\:bg-gray-900:hover {
    background-color: rgba(17, 24, 39);
  }
  .dark .dark\:border-gray-100 {
    border-color: rgba(243, 244, 246);
  }
  .dark .dark\:border-gray-400 {
    border-color: rgba(156, 163, 175);
  }
  .dark .dark\:border-gray-500 {
    border-color: rgba(107, 114, 128);
  }
  .dark .dark\:border-gray-600 {
    border-color: rgba(75, 85, 99);
  }
  .dark .dark\:border-gray-700 {
    border-color: rgba(55, 65, 81);
  }
  .dark .dark\:border-gray-900 {
    border-color: rgba(17, 24, 39);
  }
  .dark .dark\:hover\:border-gray-800:hover {
    border-color: rgba(31, 41, 55);
  }
  .dark .dark\:text-white {
    color: rgba(255, 255, 255);
  }
  .dark .dark\:text-gray-50 {
    color: rgba(249, 250, 251);
  }
  .dark .dark\:text-gray-100 {
    color: rgba(243, 244, 246);
  }
  .dark .dark\:text-gray-200 {
    color: rgba(229, 231, 235);
  }
  .dark .dark\:text-gray-400 {
    color: rgba(156, 163, 175);
  }
  .dark .dark\:text-gray-500 {
    color: rgba(107, 114, 128);
  }
  .dark .dark\:text-gray-700 {
    color: rgba(55, 65, 81);
  }
  .dark .dark\:text-gray-800 {
    color: rgba(31, 41, 55);
  }
  .dark .dark\:text-red-100 {
    color: rgba(254, 226, 226);
  }
  .dark .dark\:text-green-100 {
    color: rgba(209, 250, 229);
  }
  .dark .dark\:text-blue-400 {
    color: rgba(96, 165, 250);
  }
  .dark .group:hover .dark\:group-hover\:text-gray-500 {
    color: rgba(107, 114, 128);
  }
  .dark .group:focus .dark\:group-focus\:text-gray-700 {
    color: rgba(55, 65, 81);
  }
  .dark .dark\:hover\:text-gray-100:hover {
    color: rgba(243, 244, 246);
  }
  .dark .dark\:hover\:text-blue-500:hover {
    color: rgba(59, 130, 246);
  }

  /* Custom style */
  .header-right {
      width: calc(100% - 3.5rem);
  }
  .sidebar:hover {
      width: 16rem;
  }
  .dropdown-item {
  display: flex;
  align-items: center;
}



.org-chart {
        display: flex;
        flex-direction: column;
        align-items: center;
        margin: 20px 0;
    }
    .node {
        background: #f7fafc;
        padding: 15px;
        border-radius: 5px;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        text-align: center;
        margin: 10px 0;
        position: relative;
    }
    .children {
        display: flex;
        justify-content: center;
        margin-top: 20px;
    }
    .children .node {
        margin: 0 20px;
    }
    .node::before {
        content: '';
        position: absolute;
        left: 50%;
        top: -20px;
        border-left: 2px solid #ccc;
        height: 20px;
        width: 0;
    }

.bullet::before {
  content: '•';
  color: white; 
  margin-right: 8px; 
  display: inline-block;
}
.border-r {
    border-right-width: px;
}
.w-full {
    width: 100%;
}
.flex-1 {
    flex: 1;
}


  
  @media only screen and (min-width: 768px) {
      .header-right {
          width: calc(100% - 16rem);
      }        
  }
</style>
<div x-data="setup()" :class="{ 'dark': isDark }">
    <div class="min-h-screen flex flex-col flex-auto flex-shrink-0 antialiased bg-white dark:bg-gray-700 text-black dark:text-white">

      <!-- Header -->
      <div class="fixed w-full flex items-center justify-between h-14 text-white z-10">
        <div class="flex items-center justify-start md:justify-center pl-3 w-14 md:w-64 h-14 bg-blue-800 dark:bg-gray-800 border-none">
          <img class="w-10 h-10 rounded-full object-cover" style="margin-right:2px;" src="{{ asset('profiles/' . Auth::user()->profile_img) ?? 'https://cdn3.iconfinder.com/data/icons/avatars-round-flat/33/man5-512.png' }}"/>
          <span class="hidden md:block">@yield('username')</span>
        </div>
        <div class="flex justify-between items-center h-14 bg-blue-800 dark:bg-gray-800 header-right">
          <div class="bg-white rounded flex items-center w-full max-w-xl mr-4 p-2 shadow-sm border border-gray-200">
            <button class="outline-none focus:outline-none">
              <svg class="w-5 text-gray-600 h-5 cursor-pointer" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24"><path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
            </button>
            <input type="search" name="" id="" placeholder="Search" class="w-full pl-3 text-sm text-black outline-none focus:outline-none bg-transparent" />
          </div>
          <ul class="flex items-center">
            <li>
              <button
                aria-hidden="true"
                @click="toggleTheme"
                class="group p-2 transition-colors duration-200 rounded-full shadow-md bg-blue-200 hover:bg-blue-200 dark:bg-gray-50 dark:hover:bg-gray-200 text-gray-900 focus:outline-none"
              >
                <svg
                  x-show="isDark"
                  width="24"
                  height="24"
                  class="fill-current text-gray-700 group-hover:text-gray-500 group-focus:text-gray-700 dark:text-gray-700 dark:group-hover:text-gray-500 dark:group-focus:text-gray-700"
                  xmlns="http://www.w3.org/2000/svg"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke=""
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"
                  />
                </svg>
                <svg
                  x-show="!isDark"
                  width="24"
                  height="24"
                  class="fill-current text-gray-700 group-hover:text-gray-500 group-focus:text-gray-700 dark:text-gray-700 dark:group-hover:text-gray-500 dark:group-focus:text-gray-700"
                  xmlns="http://www.w3.org/2000/svg"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke=""
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"
                  />
                </svg>
              </button>
            </li>
            <li>
              <div class="block w-px h-6 mx-3 bg-gray-400 dark:bg-gray-700"></div>
            </li>

            <li class="flex items-center relative mr-5">
            <button 
    onclick="toggleAccordion(event)" 
    class="flex items-center bg-green-500 text-white px-2 py-1 rounded-full hover:bg-green-800 focus:outline-none text-sm"
    style="width: fit-content; height: fit-content;"
>
    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14c-3.33 0-6-2.67-6-6s2.67-6 6-6 6 2.67 6 6-2.67 6-6 6zm0 2c3.33 0 10 1.67 10 5v2H2v-2c0-3.33 6.67-5 10-5z"></path>
    </svg>
    <span>Employee</span>
</button>

   
    <ul id="accordionContent" style="margin-top: 150px;" class="hidden absolute right-0 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none">
        <div class="py-1" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
            <a href="/employee/settings" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 flex items-center space-x-2" role="menuitem">
                <span>Settings</span>
            </a>
            <!-- <a href="/employee/settings" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 flex items-center space-x-2" role="menuitem">
                <span>Settings</span>
            </a> -->
        </div>
    </ul>
</li>

            <li>
            <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button onclick="event.preventDefault(); this.closest('form').submit();" class="flex items-center mr-4 hover:text-blue-100">
            <span class="inline-flex mr-1">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                </svg>
            </span>
            Logout
        </button>
    </form>
</li>




          </ul>
        </div>
      </div>
      <!-- ./Header -->
    
      <!-- Sidebar -->
      <div class="fixed flex flex-col top-14 left-0 w-14 hover:w-64 md:w-64 bg-blue-900 dark:bg-gray-900 h-full text-white transition-all duration-300 border-none z-10 sidebar">
        <div class="overflow-y-auto overflow-x-hidden flex flex-col justify-between flex-grow">
          <ul class="flex flex-col py-4 space-y-1">
            <li class="px-5 hidden md:block">
              <div class="flex items-center justify-center h-40" style="margin-top:-18px;">
                <img class="w-40 h-40 rounded-full" src="{{ asset('logo/logo.jpg') }}" alt="Logo" />
              </div>
            </li>
            <li>
              <a href = "/employee-dashboard" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
                <span class="inline-flex justify-center items-center ml-4">
                  <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25"></path></svg>
                </span>
                <span class="ml-2 text-sm tracking-wide truncate">Dashboard</span>
              </a>
            </li>
            <li class="relative">
  <a href="/employee/jobdesk" class="flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
    <span class="inline-flex justify-center items-center ml-4">
      <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z"></path>
      </svg>
    </span>
    <span class="ml-2 text-sm tracking-wide truncate">Job Desk</span>
  </a>
  <button onclick="toggleAccordion(event)" class="absolute right-0 top-0 h-11 w-11 flex items-center justify-center focus:outline-none">
    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
    </svg>
  </button>
  <ul id="accordionContent" class="hidden accordion-content pl-12">
    <li class="dropdown-item">
      <a href="/employee/leave-allowance" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
        <span class="bullet"></span><span class="ml-2 text-sm tracking-wide truncate">Contribution Table</span>
      </a>
    </li>
    <!-- <li class="dropdown-item">
      <a href="/employee/attendance"  class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
        <span class="bullet"></span><span class="ml-2 text-sm tracking-wide truncate">Attendance</span>
      </a>
    </li> -->
    <li class="dropdown-item">
      <a href="/employee/leave"  class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
        <span class="bullet"></span><span class="ml-2 text-sm tracking-wide truncate">Leave</span>
      </a>
    </li>
    <!-- <li class="dropdown-item">
      <a href="/employee/documents"  class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
        <span class="bullet"></span><span class="ml-2 text-sm tracking-wide truncate">Documents</span>
      </a>
    </li>
    <li class="dropdown-item">
      <a href="/employee/assets"  class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
        <span class="bullet"></span><span class="ml-2 text-sm tracking-wide truncate">Assets</span>
      </a>
    </li> -->
    <li class="dropdown-item">
      <a href="/employee/job-history"  class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
        <span class="bullet"></span><span class="ml-2 text-sm tracking-wide truncate">Job History</span>
      </a>
    </li>
    <li class="dropdown-item">
      <a href="/employee/salary-overview"  class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
        <span class="bullet"></span><span class="ml-2 text-sm tracking-wide truncate">Salary Overview</span>
      </a>
    </li>
    <!-- <li class="dropdown-item">
      <a href="/employee/payrun-badge"  class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
        <span class="bullet"></span><span class="ml-2 text-sm tracking-wide truncate">Payrun and Badge</span>
      </a>
    </li> -->
    <li class="dropdown-item">
      <a href="/employee/payslip"  class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
        <span class="bullet"></span><span class="ml-2 text-sm tracking-wide truncate">Payslip</span>
      </a>
    </li>
    <!-- <li class="dropdown-item">
      <a href="/employee/address-details"  class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
        <span class="bullet"></span><span class="ml-2 text-sm tracking-wide truncate">Address Details</span>
      </a>
    </li>
    <li class="dropdown-item">
      <a href="/employee/emergency-contact"  class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
        <span class="bullet"></span><span class="ml-2 text-sm tracking-wide truncate">Emergency Contacts</span>
      </a>
    </li>
    <li class="dropdown-item">
      <a href="/employee/social-link"  class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
        <span class="bullet"></span><span class="ml-2 text-sm tracking-wide truncate">Social Links</span>
      </a>
    </li> -->
  </ul>
</li>



            
            <li class = "relative">
              <a href="/employee/attendance" onclick="showNextPage()" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
                <span class="inline-flex justify-center items-center ml-4">
                  <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5"/>
              <path />
            </svg>
                </span>
                <span class="ml-2 text-sm tracking-wide truncate">Attendance</span>
              </a>
              <!-- <button onclick="toggleAccordion(event)" class="absolute right-0 top-0 h-11 w-11 flex items-center justify-center focus:outline-none">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
              </button>
              <ul id="accordionContent" class="hidden accordion-content pl-12">
                <li class="dropdown-item">
                  <a href="/employee/daily-log"  class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
                    <span class="bullet"></span><span class="ml-2 text-sm tracking-wide truncate">Time Log</span>
                  </a>
                </li> -->
                <!-- <li class="dropdown-item">
                  <a href="/employee/attendance-request"  class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
                    <span class="bullet"></span><span class="ml-2 text-sm tracking-wide truncate">Attendance Request</span>
                  </a>
                </li> -->
                <!-- <li class="dropdown-item">
                  <a href="/employee/summary-attendance"  class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
                    <span class="bullet"></span><span class="ml-2 text-sm tracking-wide truncate">Summary</span>
                  </a>
                </li> -->
            <!-- </ul> -->
            </li>
            <li class = "relative">
              <a href="/employee/daily-log" onclick="showNextPage()" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
                <span class="inline-flex justify-center items-center ml-4">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-building-check" viewBox="0 0 16 16">
                    <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m1.679-4.493-1.335 2.226a.75.75 0 0 1-1.174.144l-.774-.773a.5.5 0 0 1 .708-.708l.547.548 1.17-1.951a.5.5 0 1 1 .858.514"/>
                    <path d="M2 1a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v6.5a.5.5 0 0 1-1 0V1H3v14h3v-2.5a.5.5 0 0 1 .5-.5H8v4H3a1 1 0 0 1-1-1z"/>
                    <path d="M4.5 2a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm3 0a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm3 0a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm-6 3a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm3 0a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm3 0a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm-6 3a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm3 0a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5z"/>
                  </svg>
                </span>
                <span class="ml-2 text-sm tracking-wide truncate">Time logs</span>
              </a>
            </li>
            <li class = "relative">
              <a href="#" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
                <span class="inline-flex justify-center items-center ml-4">
                  <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"></path></svg>
                </span>
                <span class="ml-2 text-sm tracking-wide truncate">Leave</span>
              </a>
              <button onclick="toggleAccordion(event)" class="absolute right-0 top-0 h-11 w-11 flex items-center justify-center focus:outline-none">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
              </button>
              <ul id="accordionContent" class="hidden accordion-content pl-12">
                <li class="dropdown-item">
                  <a href="/employee/leavestat" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
                    <span class="bullet"></span><span class="ml-2 text-sm tracking-wide truncate">Leave Status</span>
                  </a>
                </li>
                <li class="dropdown-item">
                  <a href="/employee/leave-request" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
                    <span class="bullet"></span><span class="ml-2 text-sm tracking-wide truncate">Leave Request</span>
                  </a>
                </li>
                <!-- <li class="dropdown-item">
                  <a href="/employee/leave-calendar" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
                    <span class="bullet"></span><span class="ml-2 text-sm tracking-wide truncate">Calendar</span>
                  </a>
                </li> -->
           
                <!-- <li class="dropdown-item">
                  <a href="/employee/leave-summ" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
                    <span class="bullet"></span><span class="ml-2 text-sm tracking-wide truncate">Summary</span>
                  </a>
                </li> -->
            </ul>
            </li>
            <li class = "relative">
              <a href="#" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
                <span class="inline-flex justify-center items-center ml-4">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="20" fill="currentColor" class="bi bi-card-list" viewBox="0 0 16 16">
                  <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2z"/>
                  <path d="M5 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 5 8m0-2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m0 5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m-1-5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0M4 8a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0m0 2.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0"/>
                </svg>                </span>
                <span class="ml-2 text-sm tracking-wide truncate">Requests</span>
              </a>
              <button onclick="toggleAccordion(event)" class="absolute right-0 top-0 h-11 w-11 flex items-center justify-center focus:outline-none">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
              </button>
              <ul id="accordionContent" class="hidden accordion-content pl-12">
                <li class="dropdown-item">
                  <a href="/employee/overtimes" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
                    <span class="bullet"></span><span class="ml-2 text-sm tracking-wide truncate">Overtime</span>
                  </a>
                </li>
                <li class="dropdown-item">
                  <a href="/employee/undertimes" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
                    <span class="bullet"></span><span class="ml-2 text-sm tracking-wide truncate">Undertime</span>
                  </a>
                </li>
                <!-- <li class="dropdown-item">
                  <a href="/employee/leave-calendar" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
                    <span class="bullet"></span><span class="ml-2 text-sm tracking-wide truncate">Calendar</span>
                  </a>
                </li> -->
           
                <!-- <li class="dropdown-item">
                  <a href="/employee/leave-summ" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
                    <span class="bullet"></span><span class="ml-2 text-sm tracking-wide truncate">Summary</span>
                  </a>
                </li> -->
            </ul>
            </li>
            
            
            
            </li>
          </ul>
        </div>
      </div>
      <!-- ./Sidebar -->
    
      
    
        <main class="content px-0 py-2">
            @yield('content')
        </main>
      </div>
    </div>
  </div>   
  
  
  <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
<script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>
  <link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.css' rel='stylesheet' />
  <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js'></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>  <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.0/dist/alpine.min.js" defer></script>
  <script>

document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay'
        },
        events: [
            // Example holidays
            { title: 'New Year’s Day', date: '2024-01-01' },
            { title: 'EDSA People Power Revolution', date: '2024-02-25' },
            { title: 'Maundy Thursday', date: '2024-03-28' },
            { title: 'Good Friday', date: '2024-03-29' },
            { title: 'Araw ng Kagitingan', date: '2024-04-09' },
            { title: 'Labor Day', date: '2024-05-01' },
            { title: 'Independence Day', date: '2024-06-12' },
            { title: 'National Heroes Day', date: '2024-08-26' },
            { title: 'Bonifacio Day', date: '2024-11-30' },
            { title: 'Christmas Day', date: '2024-12-25' },
            { title: 'Rizal Day', date: '2024-12-30' }
        ],
        editable: true,
        droppable: true,
        dateClick: function(info) {
            openHolidayModal(info.dateStr);
        }
    });

    calendar.render();

    function openHolidayModal(date) {
        const modal = document.getElementById('holidayModal');
        if (!modal) {
            console.error('Modal element not found');
            return; // Exit if modal is not found
        }
        modal.classList.remove('hidden'); // Show the modal

        const saveButton = document.getElementById('saveHoliday');
        if (!saveButton) {
            console.error('Save button not found');
            return; // Exit if save button is not found
        }

        saveButton.onclick = function() {
            const title = document.getElementById('holidayTitle').value;
            if (title) {
                calendar.addEvent({
                    title: title,
                    date: date
                });
                closeHolidayModal();
            }
        };

        const closeButton = document.getElementById('closeModal');
        if (!closeButton) {
            console.error('Close button not found');
            return; // Exit if close button is not found
        }

        closeButton.onclick = closeHolidayModal;
    }
});

function closeHolidayModal() {
    document.getElementById('holidayModal').classList.add('hidden');
}


    const setup = () => {
      const getTheme = () => {
        if (window.localStorage.getItem('dark')) {
          return JSON.parse(window.localStorage.getItem('dark'))
        }
        return !!window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches
      }

      const setTheme = (value) => {
        window.localStorage.setItem('dark', value)
      }

      return {
        loading: true,
        isDark: getTheme(),
        toggleTheme() {
          this.isDark = !this.isDark
          setTheme(this.isDark)
        },
      }
    }
    function toggleAccordion(event) {
    event.stopPropagation(); 
    const accordionContent = event.currentTarget.nextElementSibling;
    accordionContent.classList.toggle('hidden');
  }
  function toggleModal() {
    const modal = document.getElementById('crud-modal');
    modal.style.display = modal.style.display === 'none' ? 'block' : 'none';
}


var quill = new Quill('#editor', {
        theme: 'snow',
        modules: {
            toolbar: [
                [{ 'header': [1, 2, false] }],
                ['bold', 'italic', 'underline'],
                ['link', 'image'],
                [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                ['clean'] // remove formatting button
            ]
        }
    });


function PayrunPeriod() {
        document.getElementById('payrun').classList.remove('hidden');
       
  }

  function ClosePayrunPeriod() {
        document.getElementById('payrun').classList.add('hidden');
  }



function showDetailsMessage() {
        document.getElementById('details-message').classList.remove('hidden');
    }

    function hideDetailsMessage() {
        document.getElementById('details-message').classList.add('hidden');
    }

function SocialLinks(button) {
    const row = button.closest('tr');
    const input = row.querySelector('.social-input');
    if (button.textContent === 'Add') {
        input.classList.remove('hidden');
        button.textContent = 'Save';
    } else {
        input.classList.add('hidden');
        button.textContent = 'Add';
    }
}

function showCalendarModal() {
        document.getElementById('calendarModal').classList.remove('hidden');
       
    }

    function closeCalendarModal() {
        document.getElementById('calendarModal').classList.add('hidden');
    }

function JoiningDate() {
        document.getElementById('joiningdate').classList.remove('hidden');
       
  }

function closeJoiningDateModal() {
        document.getElementById('joiningdate').classList.add('hidden');
  }

  function DesignationAE() {
        document.getElementById('designationModal').classList.remove('hidden');
       
  }

function closeDesignationAE() {
        document.getElementById('designationModal').classList.add('hidden');
  }

  function EmploymentStat() {
        document.getElementById('employmentstat').classList.remove('hidden');
       
  }

function closeEmploymentStat() {
        document.getElementById('employmentstat').classList.add('hidden');
  }

  function DepartmentModal() {
        document.getElementById('departmentModal').classList.remove('hidden');
       
  }

function closeDepartmentModal() {
        document.getElementById('departmentModal').classList.add('hidden');
  }

  function InviteEmployee() {
        document.getElementById('inviteemployee').classList.remove('hidden');
       
  }

function closeInviteEmployee() {
        document.getElementById('inviteemployee').classList.add('hidden');
  }
  

  function AddEmployee() {
        document.getElementById('addemployee').classList.remove('hidden');
       
  }

function closeAddEmployee() {
        document.getElementById('addemployee').classList.add('hidden');
  }

  function DesignationAE() {
        document.getElementById('designationAE').classList.remove('hidden');
       
  }

function closeDesignationAE() {
        document.getElementById('designationAE').classList.add('hidden');
  }

  function DesignationEdit() {
        document.getElementById('designationEdit').classList.remove('hidden');
       
  }

function closeDesignationEdit() {
        document.getElementById('designationEdit').classList.add('hidden');
  }

  function Editmployementstat() {
        document.getElementById('editemstat').classList.remove('hidden');
       
  }

  function closeEditmployementstat() {
        document.getElementById('editemstat').classList.add('hidden');
  }

  function Addmployementstat() {
        document.getElementById('addemstat').classList.remove('hidden');
       
  }

  function closeAddmployementstat() {
        document.getElementById('addemstat').classList.add('hidden');
  }

  function AssignLeave() {
        document.getElementById('assign-leave').classList.remove('hidden');
       
  }

  function closeAssignLeave() {
        document.getElementById('assign-leave').classList.add('hidden');
  }

  function AddAttendance() {
        document.getElementById('add-attendance').classList.remove('hidden');
       
  }

  function closeAddAttendance() {
        document.getElementById('add-attendance').classList.add('hidden');
  }

  function RequestType() {
        document.getElementById('request-type').classList.remove('hidden');
       
  }

  function closeRequestType() {
        document.getElementById('request-type').classList.add('hidden');
  }

  function EmStat() {
        document.getElementById('em-stat').classList.remove('hidden');
       
  }

  function closeEmStat() {
        document.getElementById('em-stat').classList.add('hidden');
  }

  function DefaultPay() {
        document.getElementById('def-pay').classList.remove('hidden');
       
  }

  function closeDefaultPay() {
        document.getElementById('def-pay').classList.add('hidden');
  }

  
  function SendingPayslip() {
        document.getElementById('send-pay').classList.remove('hidden');
       
  }

  function closeSendingPayslip() {
        document.getElementById('send-pay').classList.add('hidden');
  }
 
  function Sendmonthly() {
        document.getElementById('sendmonthly').classList.remove('hidden');
       
  }

  function closeSendmonthly() {
        document.getElementById('sendmonthly').classList.add('hidden');
  }

  function ViewPayslip() {
        document.getElementById('view-payslip').classList.remove('hidden');
       
  }

  function closeViewPayslip() {
        document.getElementById('view-payslip').classList.add('hidden');
  }

  function AddBadge() {
        document.getElementById('addbadge').classList.remove('hidden');
       
  }

  function closeAddBadge() {
        document.getElementById('addbadge').classList.add('hidden');
  }

  function Documents() {
        document.getElementById('documents').classList.remove('hidden');
       
  }

  function closeDocuments() {
        document.getElementById('documents').classList.add('hidden');
  }
  function Department() {
        document.getElementById('department').classList.remove('hidden');
       
  }

  function closeDepartment() {
        document.getElementById('department').classList.add('hidden');
  }
  function WorkingShift() {
        document.getElementById('workshiftModal').classList.remove('hidden');
       
  }

  function closeWorkingShift() {
        document.getElementById('workshiftModal').classList.add('hidden');
  }

  function designation() {
        document.getElementById('designationModal').classList.remove('hidden');
       
  }

  function closedesignation() {
        document.getElementById('designationModal').classList.add('hidden');
  }
  function employmentstatus() {
        document.getElementById('employment-status').classList.remove('hidden');
       
  }

  function closeemploymentstatus() {
        document.getElementById('employment-status').classList.add('hidden');
  }

  function roles() {
        document.getElementById('roles').classList.remove('hidden');
       
  }

  function closeroles() {
        document.getElementById('roles').classList.add('hidden');
  }
  function joiningdate() {
        document.getElementById('joiningdate').classList.remove('hidden');
       
  }

  function closejoiningdate() {
        document.getElementById('joiningdate').classList.add('hidden');
  }

  function manageusers() {
        document.getElementById('manage-users').classList.remove('hidden');
       
  }

  function closemanageusers() {
        document.getElementById('manage-users').classList.add('hidden');
  }

  function adduser() {
        document.getElementById('add-user').classList.remove('hidden');
       
  }

  function closeadduser() {
        document.getElementById('add-user').classList.add('hidden');
  }
  function inviteuser() {
        document.getElementById('invite-user').classList.remove('hidden');
       
  }

  function closeinviteuser() {
        document.getElementById('invite-user').classList.add('hidden');
  }
  function TypeAdmin() {
        document.getElementById('type').classList.remove('hidden');
       
  }

  function closeTypeAdmin() {
        document.getElementById('type').classList.add('hidden');
  }

  function EditWorkingShift() {
        document.getElementById('editworkshift').classList.remove('hidden');
       
  }

  function closeEditWorkingShift() {
        document.getElementById('editworkshift').classList.add('hidden');
  }

  function AddWorkShift() {
        document.getElementById('addworkshift').classList.remove('hidden');
       
  }

  function closeAddWorkShift() {
        document.getElementById('addworkshift').classList.add('hidden');
  }

  function adddepartment() {
        document.getElementById('adddepartment').classList.remove('hidden');
       
  }

  function closeadddepartment() {
        document.getElementById('adddepartment').classList.add('hidden');
  }

  function editdept() {
        document.getElementById('editdept').classList.remove('hidden');
       
  }

  function closeeditdept() {
        document.getElementById('editdept').classList.add('hidden');
  }
  function addannouncement() {
        document.getElementById('addannouncement').classList.remove('hidden');
       
  }

  function closeaddannouncement() {
        document.getElementById('addannouncement').classList.add('hidden');
  }
  function editsalary() {
        document.getElementById('edit-salary').classList.remove('hidden');
       
  }

  function closeeditsalary() {
        document.getElementById('edit-salary').classList.add('hidden');
  }

  function addattendance() {
        document.getElementById('add-attendance').classList.remove('hidden');
       
  }

  function closeaddattendance() {
        document.getElementById('add-attendance').classList.add('hidden');
  }
  function assignleave() {
        document.getElementById('assign-leave').classList.remove('hidden');
       
  }

  function closeassignleave() {
        document.getElementById('assign-leave').classList.add('hidden');
  }

  function workshiftModal() {
        document.getElementById('workshift-Modal').classList.remove('hidden');
       
  }

  function closeworkshiftModal() {
        document.getElementById('workshift-Modal').classList.add('hidden');
  }

  function rolesModal() {
        document.getElementById('roles-Modal').classList.remove('hidden');
       
  }

  function closerolesModal() {
        document.getElementById('roles-Modal').classList.add('hidden');
  }

  function toggleEditButton(event) {
    const editButton = document.getElementById('editButton');
    editButton.classList.toggle('hidden');
    event.stopPropagation();
}

  function handleFileUpload(event) {
    const fileInput = event.target;
    const fileName = fileInput.files.length ? fileInput.files[0].name : 'No file chosen';
    document.getElementById('file-name').textContent = `Selected file: ${fileName}`;
}
const dropZone = document.querySelector('.border-dashed');
dropZone.addEventListener('dragover', function(event) {
    event.preventDefault();
    dropZone.classList.add('bg-gray-100');
});
dropZone.addEventListener('dragleave', function(event) {
    event.preventDefault();
    dropZone.classList.remove('bg-gray-100');
});
dropZone.addEventListener('drop', function(event) {
    event.preventDefault();
    dropZone.classList.remove('bg-gray-100');
    const files = event.dataTransfer.files;
    if (files.length > 0) {
      document.getElementById('file-upload').files = files;
        handleFileUpload({ target: document.getElementById('file-upload') });
    }
});


    function toggleManageUsersMenu() {
        const menu = document.getElementById('manage-users-menu');
        menu.classList.toggle('hidden');
    }

    function manageUsersEdit() {
        // Logic for editing user
        alert('Edit User');
        toggleManageUsersMenu(); // Close the menu after selection
    }

    function manageUsersDeactivate() {
        // Logic for deactivating user
        alert('Deactivate User');
        toggleManageUsersMenu(); // Close the menu after selection
    }

    function manageUsersRole() {
        // Logic for managing user role
        alert('Manage Role');
        toggleManageUsersMenu(); // Close the menu after selection
    }

    function manageUsersRemove() {
        // Logic for removing user from list
        alert('Remove from Employee List');
        toggleManageUsersMenu(); // Close the menu after selection
    }




function showContent(id) {
    // Hide all content sections
    const sections = document.querySelectorAll('.content-section');
    sections.forEach(section => section.classList.add('hidden'));

    // Show the selected content section
    const contentToShow = document.getElementById(id);
    if (contentToShow) {
        contentToShow.classList.remove('hidden');
    }
}

    function showNextPage() {
            // Hide the previous page
            document.getElementById("previousPage").style.display = "none";
            // Show the next page
            document.getElementById("nextPage").style.display = "block";
            // Scroll to the next page
            document.getElementById("nextPage").scrollIntoView();
        }

    function toggleEditMenu(event) {
    const editMenu = event.currentTarget.nextElementSibling;
    editMenu.classList.toggle('hidden');
    }

    function changeButtonColor(button) {
        // Reset the color of all buttons
        document.querySelectorAll('button').forEach(btn => {
            btn.classList.remove('text-blue-500');
            btn.classList.add('text-black');
        });
        // Set the clicked button to blue
        button.classList.remove('text-black');
        button.classList.add('text-blue-500');
    }
    
    const cancelButton = document.getElementById('cancel-btn');
    const closeModalButton = document.getElementById('close-modal');
    const modal = document.getElementById('crud-modal');
    
    const closeModal = () => {
        modal.style.display = 'none';
    };
    cancelButton.addEventListener('click', () => {
        closeModal();
    });
    closeModalButton.addEventListener('click', () => {
        closeModal();
    });
    window.addEventListener('click', (event) => {
        if (event.target === modal) {
            closeModal();
        }
    });

    window.addEventListener('keydown', (event) => {
        if (event.key === 'Escape') {
            closeModal();
        }
    });
    function showContentP(section) {
    const sections = ['payee', 'payrunperiod', 'payslipNote', 'beneficiaryBadge'];
    sections.forEach(sec => {
        document.getElementById(sec).classList.add('hidden');
    });
    document.getElementById(section).classList.remove('hidden');
}


    
  
  </script>

</body>

</html>