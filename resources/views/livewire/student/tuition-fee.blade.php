<div class="min-h-full">
    <div class="flex flex-col min-h-0">
        <!-- Top nav-->
        <x-topbar-desktop>
            <li class="flex">
                <div class="flex items-center">
                    <svg class="flex-shrink-0 w-6 h-full text-gray-200" viewBox="0 0 24 44" preserveAspectRatio="none"
                        fill="currentColor" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path d="M.293 0l22 22-22 22h1.414l22-22-22-22H.293z" />
                    </svg>
                    <a href="{{ route('user-dashboard', ['user_id' => auth()->user()->id]) }}"
                        class="ml-4 text-sm font-medium text-white hover:text-blue-200">
                        Dashboard
                    </a>
                </div>
            </li>
            <li class="flex">
                <div class="flex items-center">
                    <svg class="flex-shrink-0 w-6 h-full text-gray-200" viewBox="0 0 24 44" preserveAspectRatio="none"
                        fill="currentColor" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path d="M.293 0l22 22-22 22h1.414l22-22-22-22H.293z" />
                    </svg>
                    <a href="#" class="ml-4 text-sm font-medium text-white hover:text-blue-200">
                        Tuition Fee
                    </a>
                </div>
            </li>
        </x-topbar-desktop>

        <!-- Bottom section -->
        <div class="flex-1 min-h-0 overflow-hidden">
            <!-- Main area -->
            <main class="flex-1 min-w-0 border-t border-gray-200 xl:flex">

                <div class="order-first xl:block xl:flex-shrink-0">
                    <div class="relative flex flex-col h-full bg-gray-100 border-r border-gray-200 w-96">
                        <div class="p-4 space-y-6 divide-y divide-gray-200 sm:space-y-5">
                            <h3 class="text-lg font-medium leading-6 text-gray-900">INFANT JESUS SCHOOL</h3>
                            <img src="{{ asset('images/ijs_building.png') }}" alt="Strandee photo"
                                class="object-cover object-center w-full p-2">
                        </div>
                    </div>
                </div>

                <section aria-labelledby="message-heading"
                    class="flex flex-col flex-1 h-full min-w-0 overflow-hidden xl:order-last">

                    <!-- RIGTH SIDE SPACE -->
                    <div class="flex-1 overflow-y-auto lg:block">
                        <div class="min-h-screen pb-6 bg-white shadow">
                            <div class="sm:items-baseline sm:justify-between">

                                <div class="p-4 space-y-6 divide-y divide-gray-200 sm:space-y-5">
                                    <!-- This example requires Tailwind CSS v2.0+ -->
                                    <div class="overflow-hidden bg-white shadow sm:rounded-lg">
                                        <div class="px-4 py-2 bg-green-500 sm:px-6">
                                            <h3 class="text-lg font-medium leading-6 text-white">
                                                TUITION FEE
                                            </h3>
                                            <p class="max-w-2xl mt-1 text-sm text-white">
                                                The generated fees is based on grade level.
                                            </p>
                                        </div>
                                        <div class="px-4 py-2 border-t border-gray-200 sm:p-0">
                                            <dl class="sm:divide-y sm:divide-gray-200">
                                                @forelse ($fees as $index => $fee)
                                                    <div class="py-1 sm:py-2 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                        <dt class="text-sm italic font-medium text-gray-500">
                                                            {{ $fee['name'] }}
                                                        </dt>
                                                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                            P {{ number_format($fee['kinder_pre_school'],2,'.',',') }}
                                                        </dd>
                                                    </div>
                                                <span class="sr-only">{{ $grand_total = $grand_total + $fee['kinder_pre_school'] }}</span>
                                                @empty

                                                @endforelse
                                                <div class="py-1 sm:py-2 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                    <dt class="text-lg italic font-medium text-gray-500">
                                                        {{ __('Grand Total') }}
                                                    </dt>
                                                    <dd class="mt-1 text-lg text-gray-900 sm:mt-0 sm:col-span-2">
                                                        P {{ number_format($grand_total,2,'.',',') }}
                                                    </dd>
                                                </div>
                                            </dl>
                                        </div>
                                    </div>

                                    <div class="overflow-hidden bg-white shadow sm:rounded-lg">
                                        <div class="px-4 py-2 bg-green-500 sm:px-6">
                                            <h3 class="text-lg font-medium leading-6 text-white">
                                                PAYMENT RECORDS
                                            </h3>
                                            <p class="max-w-2xl mt-1 text-sm text-white">
                                                Records of all payments.
                                            </p>
                                        </div>
                                        <div class="px-4 py-2 border-t border-gray-200 sm:p-0">
                                            <table class="min-w-full divide-y divide-gray-300">
                                                <thead class="bg-gray-200">
                                                    <tr>
                                                    <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">{{ __('Date') }}</th>
                                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">{{ __('Amount') }}</th>
                                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">{{ __('Form of Payment') }}</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="bg-white divide-y divide-gray-200">
                                                    <tr>
                                                    <td class="py-4 pl-4 pr-3 text-sm font-medium text-gray-900 whitespace-nowrap sm:pl-6">2023-05-20</td>
                                                    <td class="px-3 py-4 text-sm text-gray-600 whitespace-nowrap">P {{ number_format(3000,2,'.',',') }}</td>
                                                    <td class="px-3 py-4 text-sm text-gray-600 whitespace-nowrap">Cash</td>
                                                    </tr>
                                                    <tr class="bg-green-200">
                                                    <td class="py-4 pl-4 pr-3 text-sm font-medium text-gray-900 whitespace-nowrap sm:pl-6">{{ __('Total') }}</td>
                                                    <td class="px-3 py-4 text-lg font-semibold text-gray-900 whitespace-nowrap">P {{ number_format(3000,2,'.',',') }}</td>
                                                    <td class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap"></td>
                                                    </tr>
                                                    <tr class="bg-green-300">
                                                    <td class="py-4 pl-4 pr-3 text-sm font-medium text-gray-900 whitespace-nowrap sm:pl-6">{{ __('Balance') }}</td>
                                                    <td class="px-3 py-4 text-lg font-semibold text-gray-900 whitespace-nowrap">P {{ number_format(3000,2,'.',',') }}</td>
                                                    <td class="px-3 py-4 text-gray-500 whitespace-nowrap"></td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>


                </section>

            </main>
        </div>
    </div>
</div>
