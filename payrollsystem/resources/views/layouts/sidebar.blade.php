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
          <img class="w-7 h-7 md:w-10 md:h-10 mr-2 rounded-md overflow-hidden" src="https://therminic2018.eu/wp-content/uploads/2018/07/dummy-avatar.jpg" />
          <span class="hidden md:block">ADMIN</span>
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
<li class="flex items-center relative">
<button onclick="toggleAccordion(event)" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-800 focus:outline-none">
                    Profile
                    <svg class="w-5 h-5 inline ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <ul id="accordionContent" class="hidden absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none">
    <div class="py-1" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
        <a href="/importattendance" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 flex items-center space-x-2" role="menuitem">
            <span>My Account</span>
        </a>
        <a href="/appsettings" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 flex items-center space-x-2" role="menuitem">
            <span>Settings</span>
        </a>
    </div>
</ul>
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
              <div class="flex flex-row items-center h-8">
                <div class="text-sm font-light tracking-wide text-gray-400 uppercase">Main</div>
              </div>
            </li>
            <li>
              <a href = "/admin-dashboard"  class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
                <span class="inline-flex justify-center items-center ml-4">
                  <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25"></path></svg>
                </span>
                <span class="ml-2 text-sm tracking-wide truncate">Dashboard</span>
              </a>
            </li>
            <li class="relative">
  <a href="jobdesk" onclick="showNextPage()" class="flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
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
      <a href="leaveallowance" onclick="showNextPage()" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
        <span class="bullet"></span><span class="ml-2 text-sm tracking-wide truncate">Leave Allowance</span>
      </a>
    </li>
    <li class="dropdown-item">
      <a href="attendance" onclick="showNextPage()" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
        <span class="bullet"></span><span class="ml-2 text-sm tracking-wide truncate">Attendance</span>
      </a>
    </li>
    <li class="dropdown-item">
      <a href="jobdeskleave" onclick="showNextPage()" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
        <span class="bullet"></span><span class="ml-2 text-sm tracking-wide truncate">Leave</span>
      </a>
    </li>
    <li class="dropdown-item">
      <a href="documents" onclick="showNextPage()" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
        <span class="bullet"></span><span class="ml-2 text-sm tracking-wide truncate">Documents</span>
      </a>
    </li>
    <li class="dropdown-item">
      <a href="/assets" onclick="showNextPage()" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
        <span class="bullet"></span><span class="ml-2 text-sm tracking-wide truncate">Assets</span>
      </a>
    </li>
    <li class="dropdown-item">
      <a href="jobhistory" onclick="showNextPage()" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
        <span class="bullet"></span><span class="ml-2 text-sm tracking-wide truncate">Job History</span>
      </a>
    </li>
    <li class="dropdown-item">
      <a href="/salaryoverview" onclick="showNextPage()" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
        <span class="bullet"></span><span class="ml-2 text-sm tracking-wide truncate">Salary Overview</span>
      </a>
    </li>
    <li class="dropdown-item">
      <a href="payrunandbadge" onclick="showNextPage()" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
        <span class="bullet"></span><span class="ml-2 text-sm tracking-wide truncate">Payrun and Badge</span>
      </a>
    </li>
    <li class="dropdown-item">
      <a href="payslip" onclick="showNextPage()" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
        <span class="bullet"></span><span class="ml-2 text-sm tracking-wide truncate">Payslip</span>
      </a>
    </li>
    <li class="dropdown-item">
      <a href="addressdetails" onclick="showNextPage()" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
        <span class="bullet"></span><span class="ml-2 text-sm tracking-wide truncate">Address Details</span>
      </a>
    </li>
    <li class="dropdown-item">
      <a href="emergencycontact" onclick="showNextPage()" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
        <span class="bullet"></span><span class="ml-2 text-sm tracking-wide truncate">Emergency Contacts</span>
      </a>
    </li>
    <li class="dropdown-item">
      <a href="sociallink" onclick="showNextPage()" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
        <span class="bullet"></span><span class="ml-2 text-sm tracking-wide truncate">Social Links</span>
      </a>
    </li>
  </ul>
</li>



            <li class = "relative">
              <a href="/employee" onclick="showNextPage()" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
                <span class="inline-flex justify-center items-center ml-4">
                  <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z"/>
                  <path/>
                </svg>
                </span>
                <span class="ml-2 text-sm tracking-wide truncate">Employee</span>
              </a>
              <button onclick="toggleAccordion(event)" class="absolute right-0 top-0 h-11 w-11 flex items-center justify-center focus:outline-none">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
              </button>
              <ul id="accordionContent" class="hidden accordion-content pl-12">
                <li class="dropdown-item">
                  <a href="allemployee" onclick="showNextPage()" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
                    <span class="bullet"></span><span class="ml-2 text-sm tracking-wide truncate">All Employees</span>
                  </a>
                </li>
                <li class="dropdown-item">
                  <a href="designation" onclick="showNextPage()" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
                    <span class="bullet"></span><span class="ml-2 text-sm tracking-wide truncate">Designation</span>
                  </a>
                </li>
                <li class="dropdown-item">
                  <a href="employmentstat" onclick="showNextPage()" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
                    <span class="bullet"></span><span class="ml-2 text-sm tracking-wide truncate">Employment Status</span>
                  </a>
                </li>
            </ul>
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
                  <a href="leavestat" onclick="showNextPage()" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
                    <span class="bullet"></span><span class="ml-2 text-sm tracking-wide truncate">Leave Status</span>
                  </a>
                </li>
                <li class="dropdown-item">
                  <a href="/admin/leave-request" onclick="showNextPage()" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
                    <span class="bullet"></span><span class="ml-2 text-sm tracking-wide truncate">Leave Request</span>
                  </a>
                </li>
                <li class="dropdown-item">
                  <a href="/admin/leave-summ" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
                    <span class="bullet"></span><span class="ml-2 text-sm tracking-wide truncate">Calendar</span>
                  </a>
                </li>
           
                <li class="dropdown-item">
                  <a href="dailylog" onclick="showNextPage()" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
                    <span class="bullet"></span><span class="ml-2 text-sm tracking-wide truncate">Summary</span>
                  </a>
                </li>
            </ul>
            </li>
            <li class = "relative">
              <a href="/attend" onclick="showNextPage()" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
                <span class="inline-flex justify-center items-center ml-4">
                  <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5"/>
              <path />
            </svg>
                </span>
                <span class="ml-2 text-sm tracking-wide truncate">Attendance</span>
              </a>
              <button onclick="toggleAccordion(event)" class="absolute right-0 top-0 h-11 w-11 flex items-center justify-center focus:outline-none">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
              </button>
              <ul id="accordionContent" class="hidden accordion-content pl-12">
                <li class="dropdown-item">
                  <a href="/dailylog" onclick="showNextPage()" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
                    <span class="bullet"></span><span class="ml-2 text-sm tracking-wide truncate">Daily Log</span>
                  </a>
                </li>
                <li class="dropdown-item">
                  <a href="/attendancereq" onclick="showNextPage()" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
                    <span class="bullet"></span><span class="ml-2 text-sm tracking-wide truncate">Attendance Request</span>
                  </a>
                </li>
                <li class="dropdown-item">
                  <a href="/attendancedetails" onclick="showNextPage()" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
                    <span class="bullet"></span><span class="ml-2 text-sm tracking-wide truncate">Attendance Details</span>
                  </a>
                </li>
                <li class="dropdown-item">
                  <a href="/attendancesummary" onclick="showNextPage()" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
                    <span class="bullet"></span><span class="ml-2 text-sm tracking-wide truncate">Summary</span>
                  </a>
                </li>
            </ul>
            </li>
            <li class = "relative">
              <a href="/sales" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
                <span class="inline-flex justify-center items-center ml-4">
                  <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.25 12.75V12A2.25 2.25 0 0 1 4.5 9.75h15A2.25 2.25 0 0 1 21.75 12v.75m-8.69-6.44-2.12-2.12a1.5 1.5 0 0 0-1.061-.44H4.5A2.25 2.25 0 0 0 2.25 6v12a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9a2.25 2.25 0 0 0-2.25-2.25h-5.379a1.5 1.5 0 0 1-1.06-.44Z"/>
              <path />
            </svg>
                </span>
                <span class="ml-2 text-sm tracking-wide truncate">Payroll</span>
              </a>
              <button onclick="toggleAccordion(event)" class="absolute right-0 top-0 h-11 w-11 flex items-center justify-center focus:outline-none">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
              </button>
              <ul id="accordionContent" class="hidden accordion-content pl-12">
                <li class="dropdown-item">
                  <a href="payrunpayroll" onclick="showNextPage()" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
                    <span class="bullet"></span><span class="ml-2 text-sm tracking-wide truncate">Payrun</span>
                  </a>
                </li>
                <li class="dropdown-item">
                  <a href="payslippayroll" onclick="showNextPage()" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
                    <span class="bullet"></span><span class="ml-2 text-sm tracking-wide truncate">Payslip</span>
                  </a>
                </li>
                <li class="dropdown-item">
                  <a href="summarypayroll" onclick="showNextPage()" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
                    <span class="bullet"></span><span class="ml-2 text-sm tracking-wide truncate">Summary</span>
                  </a>
                </li>
                <li class="dropdown-item">
                  <a href="dailylog" onclick="showNextPage()" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
                    <span class="bullet"></span><span class="ml-2 text-sm tracking-wide truncate">Beneficiary Badge</span>
                  </a>
                </li>
            </ul>
            </li>
            <li class = "relative">
              <a href="/sales" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
                <span class="inline-flex justify-center items-center ml-4">
                  <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 0 0 .75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 0 0-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0 1 12 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 0 1-.673-.38m0 0A2.18 2.18 0 0 1 3 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 0 1 3.413-.387m7.5 0V5.25A2.25 2.25 0 0 0 13.5 3h-3a2.25 2.25 0 0 0-2.25 2.25v.894m7.5 0a48.667 48.667 0 0 0-7.5 0M12 12.75h.008v.008H12v-.008Z"/>
              <path />
            </svg>
                </span>
                <span class="ml-2 text-sm tracking-wide truncate">Administration</span>
              </a>
              <button onclick="toggleAccordion(event)" class="absolute right-0 top-0 h-11 w-11 flex items-center justify-center focus:outline-none">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
              </button>
              <ul id="accordionContent" class="hidden accordion-content pl-12">
                <li class="dropdown-item">
                  <a href="dailylog" onclick="showNextPage()" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
                    <span class="bullet"></span><span class="ml-2 text-sm tracking-wide truncate">Daily Log</span>
                  </a>
                </li>
            </ul>
            </li>
            
            </li>
          </ul>
          <p class="mb-14 px-5 py-3 hidden md:block text-center text-xs">Copyright @2021</p>
        </div>
      </div>
      <!-- ./Sidebar -->
    
      
    
        <main class="content px-0 py-2">
            @yield('content')
        </main>
      </div>
    </div>
  </div>    

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>  <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.0/dist/alpine.min.js" defer></script>
  <script>
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

function WorkingShift() {
    const modal = document.getElementById('workshiftModal');
    modal.style.display = modal.style.display === 'none' ? 'block' : 'none';
}

function designation() {
    const modal = document.getElementById('designationModal');
    modal.style.display = modal.style.display === 'none' ? 'block' : 'none';
}


function PayrunPeriod() {
        document.getElementById('payrun').classList.remove('hidden');
       
  }

  function ClosePayrunPeriod() {
        document.getElementById('payrun').classList.add('hidden');
  }


function employmentstatus() {
    const modal = document.getElementById('employment-status');
    modal.style.display = modal.style.display === 'none' ? 'block' : 'none';
}

function sendmonthlymodal() {
    const modal = document.getElementById('sendmonthly');
    modal.style.display = modal.style.display === 'none' ? 'block' : 'none';
}

function ViewPayslip() {
    const modal = document.getElementById('view-payslip');
    modal.style.display = modal.style.display === 'none' ? 'block' : 'none';
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


    
  
  </script>

</body>

</html>