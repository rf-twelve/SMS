<div class="px-4 mt-2 sm:px-6 lg:px-8">
    <h2 class="text-xs font-medium tracking-wide text-gray-500 uppercase italic">
        Status
    </h2>
    <ul role="list" class="grid grid-cols-1 gap-4 mt-3 sm:gap-6 sm:grid-cols-2 xl:grid-cols-4"
        x-max="1">
        {{-- NUMBER OF ADDMISSION --}}
        <li class="relative flex col-span-1 rounded-md shadow-sm">
            <div class="flex items-center justify-center flex-shrink-0 w-16 text-sm font-medium text-white bg-green-600 rounded-l-md">
                <x-icon.users class="flex-shrink-0 w-6 h-6 text-white" />
            </div>
            <div class="flex items-center justify-between flex-1 truncate bg-white border-t border-b border-r border-gray-200 rounded-r-md">
                <div class="flex-1 px-4 py-2 text-sm truncate">
                    <a href="#" class="font-medium text-gray-900 hover:text-gray-600">
                        Total Admission
                    </a>
                    <p class="text-gray-500">{{ 0 }} Records</p>
                </div>
            </div>
        </li>

        {{-- NUMBER OF STAFF --}}
        <li class="relative flex col-span-1 rounded-md shadow-sm">
            <div class="flex items-center justify-center flex-shrink-0 w-16 text-sm font-medium text-white bg-green-600 rounded-l-md">
                <x-icon.users class="flex-shrink-0 w-6 h-6 text-white" />
            </div>
            <div class="flex items-center justify-between flex-1 truncate bg-white border-t border-b border-r border-gray-200 rounded-r-md">
                <div class="flex-1 px-4 py-2 text-sm truncate">
                    <a href="#" class="font-medium text-gray-900 hover:text-gray-600">
                        Faculty Staff
                    </a>
                    <p class="text-gray-500">{{ 0 }} Records</p>
                </div>
            </div>
        </li>

        {{-- NUMBER OF STUDENTS --}}
        <li class="relative flex col-span-1 rounded-md shadow-sm">
            <div class="flex items-center justify-center flex-shrink-0 w-16 text-sm font-medium text-white bg-green-600 rounded-l-md">
                <x-icon.users class="flex-shrink-0 w-6 h-6 text-white" />
            </div>
            <div class="flex items-center justify-between flex-1 truncate bg-white border-t border-b border-r border-gray-200 rounded-r-md">
                <div class="flex-1 px-4 py-2 text-sm truncate">
                    <a href="#" class="font-medium text-gray-900 hover:text-gray-600">
                        Total Students
                    </a>
                    <p class="text-gray-500">{{ $student_count }} Records</p>
                </div>
            </div>
        </li>

        {{-- NUMBER OF STUDENTS --}}
        <li class="relative flex col-span-1 rounded-md shadow-sm">
            <div class="flex items-center justify-center flex-shrink-0 w-16 text-sm font-medium text-white bg-green-600 rounded-l-md">
                <x-icon.users class="flex-shrink-0 w-6 h-6 text-white" />
            </div>
            <div class="flex items-center justify-between flex-1 truncate bg-white border-t border-b border-r border-gray-200 rounded-r-md">
                <div class="flex-1 px-4 py-2 text-sm truncate">
                    <a href="#" class="font-medium text-gray-900 hover:text-gray-600">
                        Total Teachers
                    </a>
                    <p class="text-gray-500">{{ $teacher_count }} Records</p>
                </div>
            </div>
        </li>

    </ul>
</div>
