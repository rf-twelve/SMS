<div class="flex flex-col flex-1 mt-1 overflow-y-auto bg-green-500">
    <!-- User account dropdown -->
    <div x-data="{userDropdown:false}" class="relative inline-block px-3 my-1 text-left">
        <div>
            <button x-on:click="userDropdown=!userDropdown" type="button"
                class="group w-full bg-gray-100 rounded-md px-3.5 py-2 text-sm text-left font-medium text-gray-700 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-purple-500"
                id="options-menu-button" aria-expanded="false" aria-haspopup="true">
                <span class="flex items-center justify-between w-full">
                    <span class="flex items-center justify-between min-w-0 space-x-3">
                        <img class="flex-shrink-0 w-10 h-10 bg-gray-300 rounded-full"
                            src="{{ asset('img/users/avatar.png') }}" alt="User profile">
                        <span class="flex flex-col flex-1 min-w-0">
                            <span class="text-sm font-medium text-gray-900 truncate">{{ Auth::user()->fullname }}</span>
                            <span class="text-sm text-gray-500 truncate">{{ Auth::user()->getRoleNames()->first() }}</span>
                        </span>
                    </span>
                    <!-- Heroicon name: solid/selector -->
                    <svg class="flex-shrink-0 w-5 h-5 text-gray-400 group-hover:text-gray-500"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd"
                            d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
                            clip-rule="evenodd" />
                    </svg>
                </span>
            </button>
        </div>

        {{-- PROFILE SETTINGS --}}
        <div x-show="userDropdown" @click.outside="userDropdown = false"
            class="absolute left-0 right-0 z-10 mx-3 mt-1 origin-top bg-white divide-y divide-gray-200 rounded-md shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
             aria-orientation="vertical" aria-labelledby="options-menu-button" tabindex="-1">
            <div class="py-1" >
                <!-- Active: "bg-gray-100 text-gray-900", Not Active: "text-gray-700" -->
                <a onclick="window.open('{{ route('profile-settings',['user_id'=>Auth::user()->id]) }}','_blank')" href="#"
                    class="block px-4 py-2 text-sm text-gray-700"  tabindex="-1"
                    id="options-menu-item-0">View profile</a>
                <a href="#" class="block px-4 py-2 text-sm text-gray-700"  tabindex="-1"
                    id="options-menu-item-2">Notifications</a>
                <a wire:click='logout()' href="#" class="block px-4 py-2 text-sm text-gray-700" hasanyrole="menuitem" tabindex="-1"
                    id="options-menu-item-5">Logout</a>
            </div>
        </div>
    </div>

    <nav class="flex-1 px-2 space-y-1 uppercase" aria-label="Sidebar">
        <div>
            <!-- Current: "bg-gray-100 text-gray-900", Default: "bg-white text-gray-600 hover:bg-gray-50 hover:text-gray-900" -->
            <a href="{{ route('user-dashboard',['user_id'=>Auth::user()->id]) }}"
                class="flex items-center w-full py-2 pl-2 text-sm font-medium text-green-700 bg-green-200 rounded-md group">
                <x-icon.home class="flex-shrink-0 w-6 h-6 mr-3" />
                DASHBOARD
            </a>
        </div>

        {{-- ACCOUNTING SECTION --}}
        @hasanyrole('Accounting|Super Admin')
        <div x-data="{open:false}" class="space-y-1">
            <button x-on:click="open =! open" type="button" class="flex items-center w-full py-2 pl-2 pr-1 text-sm font-medium text-left text-green-700 bg-green-200 rounded-md hover:bg-gray-50 hover:text-gray-900 group focus:outline-none focus:ring-2 focus:ring-white">
                <x-icon.document class="flex-shrink-0 w-6 h-6 mr-3" />
                <span class="flex-1"> ACCOUNTING</span>
                <!-- Expanded: "text-gray-400 rotate-90", Collapsed: "text-gray-300" -->
                <x-icon.arrow-head class="flex-shrink-0 w-5 h-5 ml-3 text-gray-300 transition-colors duration-150 ease-in-out transform rotate-90 group-hover:text-gray-400"/>
            </button>
            <div x-show="open" class="space-y-1 text-xs font-medium text-green-100" id="sub-menu-4">
                <a href="{{ route('guest/school-history',['user_id'=>Auth::user()->id]) }}"
                    class="flex items-center w-full py-2 pr-2 rounded-md group pl-6 hover:text-green-700 hover:bg-gray-50">
                    <x-icon.folder-open class="flex-shrink-0 w-5 h-5 mr-1"/>
                <span class="flex-1"> Tuition Fee </span></a>
                <a href="{{ route('guest/mission-and-vision',['user_id'=>Auth::user()->id]) }}"
                    class="flex items-center w-full py-2 pr-2 rounded-md group pl-6 hover:text-green-700 hover:bg-gray-50">
                    <x-icon.folder-open class="flex-shrink-0 w-5 h-5 mr-1"/>
                <span class="flex-1"> Billing/Payment </span></a>
                <a href="{{ route('guest/enrollment-steps',['user_id'=>Auth::user()->id]) }}"
                    class="flex items-center w-full py-2 pr-2 rounded-md group pl-6 hover:text-green-700 hover:bg-gray-50">
                    <x-icon.folder-open class="flex-shrink-0 w-5 h-5 mr-1"/>
                <span class="flex-1"> Contribution </span></a>
            </div>
        </div>
        @endhasanyrole

        {{-- ADMIN SECTION --}}
        @hasanyrole('admin|Super Admin')
        <div x-data="{open:false}" class="space-y-1">
            <button x-on:click="open =! open" type="button" class="flex items-center w-full py-2 pl-2 pr-1 text-sm font-medium text-left text-green-700 bg-green-200 rounded-md hover:bg-gray-50 hover:text-gray-900 group focus:outline-none focus:ring-2 focus:ring-white">
                <x-icon.document class="flex-shrink-0 w-6 h-6 mr-3" />
                <span class="flex-1"> ADMINISTRATION</span>
                <!-- Expanded: "text-gray-400 rotate-90", Collapsed: "text-gray-300" -->
                <x-icon.arrow-head class="flex-shrink-0 w-5 h-5 ml-3 text-gray-300 transition-colors duration-150 ease-in-out transform rotate-90 group-hover:text-gray-400"/>
            </button>
            <div x-show="open" class="space-y-1 text-xs font-medium text-green-100" id="sub-menu-4">
                <a href="{{ route('guest/school-history',['user_id'=>Auth::user()->id]) }}"
                    class="flex items-center w-full py-2 pr-2 rounded-md group pl-6 hover:text-green-700 hover:bg-gray-50">
                    <x-icon.folder-open class="flex-shrink-0 w-5 h-5 mr-1"/>
                <span class="flex-1"> Student List </span></a>
                <a href="{{ route('guest/mission-and-vision',['user_id'=>Auth::user()->id]) }}"
                    class="flex items-center w-full py-2 pr-2 rounded-md group pl-6 hover:text-green-700 hover:bg-gray-50">
                    <x-icon.folder-open class="flex-shrink-0 w-5 h-5 mr-1"/>
                <span class="flex-1"> Faculty List </span></a>
                <a href="{{ route('guest/enrollment-steps',['user_id'=>Auth::user()->id]) }}"
                    class="flex items-center w-full py-2 pr-2 rounded-md group pl-6 hover:text-green-700 hover:bg-gray-50">
                    <x-icon.folder-open class="flex-shrink-0 w-5 h-5 mr-1"/>
                <span class="flex-1"> Teacher List </span></a>
            </div>
        </div>
        @endhasanyrole

        {{-- CASHIER SECTION --}}
        @hasanyrole('Cashier|Super Admin')
        <div x-data="{open:false}" class="space-y-1">
            <button x-on:click="open =! open" type="button" class="flex items-center w-full py-2 pl-2 pr-1 text-md font-medium text-left text-green-700 bg-green-200 rounded-md hover:bg-gray-50 hover:text-gray-900 group focus:outline-none focus:ring-2 focus:ring-white">
                <x-icon.document class="flex-shrink-0 w-6 h-6 mr-3" />
                <span class="flex-1"> CASHIER</span>
                <!-- Expanded: "text-gray-400 rotate-90", Collapsed: "text-gray-300" -->
                <x-icon.arrow-head class="flex-shrink-0 w-5 h-5 ml-3 text-gray-300 transition-colors duration-150 ease-in-out transform rotate-90 group-hover:text-gray-400"/>
            </button>
            <div x-show="open" class="space-y-1 text-xs font-medium text-green-100" id="sub-menu-4">
                <a href="{{ route('cashier/payment-and-collection',['user_id'=>Auth::user()->id]) }}"
                    class="flex items-center w-full py-2 pr-2 rounded-md group pl-6 hover:text-green-700 hover:bg-gray-50">
                    <x-icon.folder-open class="flex-shrink-0 w-5 h-5 mr-1"/>
                <span class="flex-1"> Payment & Collection </span></a>
            </div>
        </div>
        @endhasanyrole

        {{-- GUEST SECTION --}}
        @hasanyrole('Guest|Super Admin')
        <div x-data="{open:false}" class="space-y-1">
            <button x-on:click="open =! open" type="button" class="flex items-center w-full py-2 pl-2 pr-1 text-md font-medium text-left text-green-700 bg-green-200 rounded-md hover:bg-gray-50 hover:text-gray-900 group focus:outline-none focus:ring-2 focus:ring-white">
                <x-icon.document class="flex-shrink-0 w-6 h-6 mr-3" />
                <span class="flex-1"> GUEST PORTAL</span>
                <!-- Expanded: "text-gray-400 rotate-90", Collapsed: "text-gray-300" -->
                <x-icon.arrow-head class="flex-shrink-0 w-5 h-5 ml-3 text-gray-300 transition-colors duration-150 ease-in-out transform rotate-90 group-hover:text-gray-400"/>
            </button>
            <div x-show="open" class="space-y-1 text-xs font-medium text-green-100" id="sub-menu-4">
                <a href="{{ route('guest/school-history',['user_id'=>Auth::user()->id]) }}"
                    class="flex items-center w-full py-2 pr-2 rounded-md group pl-6 hover:text-green-700 hover:bg-gray-50">
                    <x-icon.folder-open class="flex-shrink-0 w-5 h-5 mr-1"/>
                <span class="flex-1"> School History </span></a>
                <a href="{{ route('guest/mission-and-vision',['user_id'=>Auth::user()->id]) }}"
                    class="flex items-center w-full py-2 pr-2 rounded-md group pl-6 hover:text-green-700 hover:bg-gray-50">
                    <x-icon.folder-open class="flex-shrink-0 w-5 h-5 mr-1"/>
                <span class="flex-1"> Mission & Vision </span></a>
                <a href="{{ route('guest/enrollment-steps',['user_id'=>Auth::user()->id]) }}"
                    class="flex items-center w-full py-2 pr-2 rounded-md group pl-6 hover:text-green-700 hover:bg-gray-50">
                    <x-icon.folder-open class="flex-shrink-0 w-5 h-5 mr-1"/>
                <span class="flex-1"> Enrollment Steps </span></a>
                <a href="{{ route('guest/enrollment-steps',['user_id'=>Auth::user()->id]) }}"
                    class="flex items-center w-full py-2 pr-2 rounded-md group pl-6 hover:text-green-700 hover:bg-gray-50">
                    <x-icon.folder-open class="flex-shrink-0 w-5 h-5 mr-1"/>
                <span class="flex-1"> Make Reservation </span></a>
                <a href="{{ route('guest/enrollment-steps',['user_id'=>Auth::user()->id]) }}"
                    class="flex items-center w-full py-2 pr-2 rounded-md group pl-6 hover:text-green-700 hover:bg-gray-50">
                    <x-icon.folder-open class="flex-shrink-0 w-5 h-5 mr-1"/>
                <span class="flex-1"> Entrance Exam </span></a>
            </div>
        </div>
        @endhasanyrole

        {{-- GUIDANCE AND ADMISSION SECTION --}}
        @hasanyrole('Guidance|Super Admin')
        <div x-data="{open:false}" class="space-y-1">
            <button x-on:click="open =! open" type="button" class="flex items-center w-full py-2 pl-2 pr-1 text-xs font-medium text-left text-green-700 bg-green-200 rounded-md hover:bg-gray-50 hover:text-gray-900 group focus:outline-none focus:ring-2 focus:ring-white">
                <x-icon.document class="flex-shrink-0 w-6 h-6 mr-3" />
                <span class="flex-1"> GUIDANCE & ADMISSION</span>
                <!-- Expanded: "text-gray-400 rotate-90", Collapsed: "text-gray-300" -->
                <x-icon.arrow-head class="flex-shrink-0 w-5 h-5 ml-3 text-gray-300 transition-colors duration-150 ease-in-out transform rotate-90 group-hover:text-gray-400"/>
            </button>
            <div x-show="open" class="space-y-1 text-xs font-medium text-green-100" id="sub-menu-4">
                <a href="{{ route('guest/school-history',['user_id'=>Auth::user()->id]) }}"
                    class="flex items-center w-full py-2 pr-2 rounded-md group pl-6 hover:text-green-700 hover:bg-gray-50">
                    <x-icon.folder-open class="flex-shrink-0 w-5 h-5 mr-1"/>
                <span class="flex-1"> Reservation/Appointments </span></a>
            </div>
            <div x-show="open" class="space-y-1 text-xs font-medium text-green-100" id="sub-menu-4">
                <a href="{{ route('guest/school-history',['user_id'=>Auth::user()->id]) }}"
                    class="flex items-center w-full py-2 pr-2 rounded-md group pl-6 hover:text-green-700 hover:bg-gray-50">
                    <x-icon.folder-open class="flex-shrink-0 w-5 h-5 mr-1"/>
                <span class="flex-1"> Reports </span></a>
            </div>
        </div>
        @endhasanyrole

        {{-- FACULTY STAFF SECTION --}}
        @hasanyrole('Faculty|Super Admin')
        <div x-data="{open:false}" class="space-y-1">
            <button x-on:click="open =! open" type="button" class="flex items-center w-full py-2 pl-2 pr-1 text-md font-medium text-left text-green-700 bg-green-200 rounded-md hover:bg-gray-50 hover:text-gray-900 group focus:outline-none focus:ring-2 focus:ring-white">
                <x-icon.document class="flex-shrink-0 w-6 h-6 mr-3" />
                <span class="flex-1"> FACULTY STAFF</span>
                <!-- Expanded: "text-gray-400 rotate-90", Collapsed: "text-gray-300" -->
                <x-icon.arrow-head class="flex-shrink-0 w-5 h-5 ml-3 text-gray-300 transition-colors duration-150 ease-in-out transform rotate-90 group-hover:text-gray-400"/>
            </button>
            <div x-show="open" class="space-y-1 text-xs font-medium text-green-100" id="sub-menu-4">
                <a href="{{ route('guest/school-history',['user_id'=>Auth::user()->id]) }}"
                    class="flex items-center w-full py-2 pr-2 rounded-md group pl-6 hover:text-green-700 hover:bg-gray-50">
                    <x-icon.folder-open class="flex-shrink-0 w-5 h-5 mr-1"/>
                <span class="flex-1"> Profile </span></a>
            </div>
        </div>
        @endhasanyrole

        {{-- TEACHER SECTION --}}
        @hasanyrole('Teacher|Super Admin')
        <div x-data="{open:false}" class="space-y-1">
            <button x-on:click="open =! open" type="button" class="flex items-center w-full py-2 pl-2 pr-1 text-md font-medium text-left text-green-700 bg-green-200 rounded-md hover:bg-gray-50 hover:text-gray-900 group focus:outline-none focus:ring-2 focus:ring-white">
                <x-icon.document class="flex-shrink-0 w-6 h-6 mr-3" />
                <span class="flex-1"> TEACHER</span>
                <!-- Expanded: "text-gray-400 rotate-90", Collapsed: "text-gray-300" -->
                <x-icon.arrow-head class="flex-shrink-0 w-5 h-5 ml-3 text-gray-300 transition-colors duration-150 ease-in-out transform rotate-90 group-hover:text-gray-400"/>
            </button>
            <div x-show="open" class="space-y-1 text-xs font-medium text-green-100" id="sub-menu-4">
                <a href="{{ route('teacher/class-record',['user_id'=>Auth::user()->id]) }}" class="flex items-center w-full py-2 pr-2 rounded-md group pl-6 hover:text-green-700 hover:bg-gray-50">
                    <x-icon.folder-open class="flex-shrink-0 w-5 h-5 mr-1"/>
                <span class="flex-1"> Class Record </span></a>
            </div>
            <div x-show="open" class="space-y-1 text-xs font-medium text-green-100" id="sub-menu-4">
                <a href="{{ route('teacher/class-schedule',['user_id'=>Auth::user()->id]) }}" class="flex items-center w-full py-2 pr-2 rounded-md group pl-6 hover:text-green-700 hover:bg-gray-50">
                    <x-icon.folder-open class="flex-shrink-0 w-5 h-5 mr-1"/>
                <span class="flex-1"> Class Schedule </span></a>
            </div>
            <div x-show="open" class="space-y-1 text-xs font-medium text-green-100" id="sub-menu-4">
                <a href="{{ route('teacher/weekly-workload',['user_id'=>Auth::user()->id]) }}" class="flex items-center w-full py-2 pr-2 rounded-md group pl-6 hover:text-green-700 hover:bg-gray-50">
                    <x-icon.folder-open class="flex-shrink-0 w-5 h-5 mr-1"/>
                <span class="flex-1"> Weekly Workload </span></a>
            </div>
        </div>
        @endhasanyrole

        {{-- PARENT AND STUDENT SECTION --}}
        @hasanyrole('Student|Super Admin')
        <div x-data="{open:false}" class="space-y-1">
            <button x-on:click="open =! open" type="button" class="flex items-center w-full py-2 pl-2 pr-1 text-sm font-medium text-left text-green-700 bg-green-200 rounded-md hover:bg-gray-50 hover:text-gray-900 group focus:outline-none focus:ring-2 focus:ring-white">
                <x-icon.document class="flex-shrink-0 w-6 h-6 mr-3" />
                <span class="flex-1"> PARENT & STUDENT</span>
                <x-icon.arrow-head class="flex-shrink-0 w-5 h-5 ml-3 text-gray-300 transition-colors duration-150 ease-in-out transform rotate-90 group-hover:text-gray-400"/>
            </button>
            <div x-show="open" class="space-y-1 text-xs font-medium text-green-100" id="sub-menu-4">

                <a href="{{ route('student/academic-grades',['user_id'=>Auth::user()->id]) }}"
                    class="flex items-center w-full py-2 pr-2 rounded-md group pl-6 hover:text-gray-900 hover:bg-gray-50">
                    <x-icon.folder-open class="flex-shrink-0 w-5 h-5 mr-1"/>
                <span class="flex-1"> Academic Grades </span></a>

                <a href="{{ route('student/attendance',['user_id'=>Auth::user()->id]) }}"
                    class="flex items-center w-full py-2 pr-2 rounded-md group pl-6 hover:text-gray-900 hover:bg-gray-50">
                    <x-icon.folder-open class="flex-shrink-0 w-5 h-5 mr-1"/>
                <span class="flex-1"> Attendance </span></a>

                <a href="{{ route('student/statement-of-account',['user_id'=>Auth::user()->id]) }}"
                    class="flex items-center w-full py-2 pr-2 rounded-md group pl-6 hover:text-gray-900 hover:bg-gray-50">
                    <x-icon.folder-open class="flex-shrink-0 w-5 h-5 mr-1"/>
                <span class="flex-1"> Statemane of Account </span></a>

                <a href="{{ route('student/student-profile',['user_id'=>Auth::user()->id]) }}"
                    class="flex items-center w-full py-2 pr-2 rounded-md group pl-6 hover:text-gray-900 hover:bg-gray-50">
                    <x-icon.folder-open class="flex-shrink-0 w-5 h-5 mr-1"/>
                <span class="flex-1"> Student Profile </span></a>

                <a href="{{ route('student/tuition-fee',['user_id'=>Auth::user()->id]) }}"
                    class="flex items-center w-full py-2 pr-2 rounded-md group pl-6 hover:text-gray-900 hover:bg-gray-50">
                    <x-icon.folder-open class="flex-shrink-0 w-5 h-5 mr-1"/>
                <span class="flex-1"> Tuition Fee </span></a>
            </div>
        </div>
        @endhasanyrole

        {{-- SETTINGS SECTION --}}
        @hasanyrole('Super Admin')
        <div x-data="{open:false}" class="space-y-1">
            <button x-on:click="open =! open" type="button" class="flex items-center w-full py-2 pl-2 pr-1 text-md font-medium text-left text-green-700 bg-green-200 rounded-md hover:bg-gray-50 hover:text-gray-900 group focus:outline-none focus:ring-2 focus:ring-white">
                <x-icon.settings class="flex-shrink-0 w-6 h-6 mr-3" />
                <span class="flex-1"> SETTINGS </span>
                <!-- Expanded: "text-gray-400 rotate-90", Collapsed: "text-gray-300" -->
                <x-icon.arrow-head class="flex-shrink-0 w-5 h-5 ml-3 text-gray-300 transition-colors duration-150 ease-in-out transform rotate-90 group-hover:text-gray-400"/>
            </button>
            <!-- Expandable link section, show/hide based on state. -->
            <div x-show="open" class="space-y-1 text-xs font-medium text-green-100" id="sub-menu-4">

                <a href="{{ route('user-management',['user_id'=>Auth::user()->id]) }}"
                    class="flex items-center w-full py-2 pr-2 rounded-md group pl-6 hover:text-gray-900 hover:bg-gray-50">
                    <x-icon.users class="flex-shrink-0 w-5 h-5 mr-1"/>
                <span class="flex-1"> User Management </span></a>

                <a href="{{ route('user-management',['user_id'=>Auth::user()->id]) }}"
                    class="flex items-center w-full py-2 pr-2 rounded-md group pl-6 hover:text-gray-900 hover:bg-gray-50">
                    <x-icon.users class="flex-shrink-0 w-5 h-5 mr-1"/>
                <span class="flex-1"> Role & Permission </span></a>

                <a href="{{ route('company-profile',['user_id'=>Auth::user()->id]) }}"
                    class="flex items-center w-full py-2 pr-2 rounded-md group pl-6 hover:text-gray-900 hover:bg-gray-50">
                    <x-icon.users class="flex-shrink-0 w-5 h-5 mr-1"/>
                <span class="flex-1"> System Config </span></a>

            </div>
        </div>
        @endhasanyrole

    </nav>
</div>
