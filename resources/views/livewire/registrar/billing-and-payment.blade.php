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
                        Billing & Payment
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

                            @if (isset($student))
                            <h3 class="text-lg font-medium leading-6 text-gray-900">Student Information</h3>
                                <img src="{{ $student->imageUrl() }}" alt="Strandee photo"
                                    class="object-cover object-center w-full p-2">

                                <dl class="sm:divide-y sm:divide-gray-200">
                                    <div class="py-1 sm:py-2 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm italic font-medium text-gray-500">
                                            {{ __('First Name') }}
                                        </dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                           : {{ $student['first_name'] }}
                                        </dd>
                                    </div>
                                    <div class="py-1 sm:py-2 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm italic font-medium text-gray-500">
                                            {{ __('Middle Name') }}
                                        </dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                           : {{ $student['middle_name'] }}
                                        </dd>
                                    </div>
                                    <div class="py-1 sm:py-2 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm italic font-medium text-gray-500">
                                            {{ __('Last Name') }}
                                        </dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                           : {{ $student['last_name'] }}
                                        </dd>
                                    </div>
                                    <div class="py-1 sm:py-2 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm italic font-medium text-gray-500">
                                            {{ __('Grade Level') }}
                                        </dt>
                                        <dd class="mt-1 text-sm text-gray-900 uppercase sm:mt-0 sm:col-span-2">
                                           : {{ $student['grade_level'] }}
                                        </dd>
                                    </div>
                                    <div class="py-1 sm:py-2 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm italic font-medium text-gray-500">
                                            {{ __('Strand') }}
                                        </dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                           : {{ $student['strand'] }}
                                        </dd>
                                    </div>
                                    <div class="py-1 sm:py-2 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm italic font-medium text-gray-500">
                                            {{ __('Section') }}
                                        </dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                           : {{ $student['section'] }}
                                        </dd>
                                    </div>
                                </dl>
                            @else
                                <h3 class="text-lg font-medium leading-6 text-gray-900">Infant Jesus School</h3>
                                <img src="{{ asset('images/ijs_building.png') }}" alt="Strandee photo"
                                    class="object-cover object-center w-full p-2">
                            @endif

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
                                    <div class="overflow-hidden bg-white shadow sm:rounded-lg">
                                        <div class="px-4 py-2 bg-green-500 sm:px-6">
                                            <div class="flex items-center flex-1 my-2">
                                                <div class="w-full lg:max-w-xs">
                                                    <label for="search" class="sr-only">Search</label>
                                                    <div class="relative w-full pl-2 pr-2">
                                                        <div class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none">
                                                            <x-icon.search class="w-5 h-5 text-gray-500" />
                                                        </div>
                                                        <x-input wire:model.debounce.500ms="scan_or_search"
                                                            autofocus
                                                            class="block w-full py-2 pl-10 pr-3 leading-5 placeholder-gray-500 bg-white border border-gray-300 rounded-xl focus:outline-none focus:placeholder-gray-400 focus:ring-1 focus:ring-green-200 focus:border-green-200 sm:text-sm"
                                                            placeholder="Search" placeholder="Scan or Type keyword..." type="search" />
                                                    </div>
                                                </div>
                                                <p class="max-w-2xl mt-1 ml-3 text-sm text-white">
                                                    Please scan the ID barcode or type student LRN.
                                                </p>
                                            </div>

                                        </div>
                                        <div class="px-4 py-2 border-t border-gray-200 sm:p-0">
                                            <dl class="sm:divide-y sm:divide-gray-200">
                                                {{-- @forelse ($fees as $index => $fee)
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

                                                @endforelse --}}
                                                {{-- <div class="py-1 sm:py-2 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                    <dt class="text-lg italic font-medium text-gray-500">
                                                        {{ __('Grand Total') }}
                                                    </dt>
                                                    <dd class="mt-1 text-lg text-gray-900 sm:mt-0 sm:col-span-2">
                                                        P {{ number_format($grand_total,2,'.',',') }}
                                                    </dd>
                                                </div> --}}
                                            </dl>
                                        </div>
                                    </div>

                                    @if (isset($student))
                                    <div class="overflow-hidden bg-white shadow sm:rounded-lg">
                                        <div class="px-4 py-2 bg-green-500 sm:px-6">
                                            <div class="flex justify-between py-0">
                                                <h3 class="text-lg font-medium leading-6 text-white">
                                                    PAYMENT RECORDS <br>
                                                    <span class="text-sm italic">List of payment transactions.</span>
                                                </h3>
                                                <x-button wire:click="openPaymentModal()" class="flex py-3">
                                                    <x-icon.plus class="w-5"/>
                                                    Add Payment
                                                </x-button>
                                            </div>
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
                                                    @forelse ($payment_records as $key => $payment)
                                                    <tr>
                                                        <td class="py-4 pl-4 pr-3 text-sm font-medium text-gray-900 whitespace-nowrap sm:pl-6">{{ $payment['date'] }}</td>
                                                        <td class="px-3 py-4 text-sm text-gray-600 whitespace-nowrap">P {{ number_format($payment['amount'],2,'.',',') }}</td>
                                                        <td class="px-3 py-4 text-sm text-gray-600 whitespace-nowrap">{{ $payment['form_of_payment'] }}</td>
                                                        <?php $total = $total + $payment['amount']; ?>
                                                    </tr>
                                                    @empty

                                                    @endforelse

                                                    <tr class="bg-green-200">
                                                    <td class="py-4 pl-4 pr-3 text-sm font-medium text-gray-900 whitespace-nowrap sm:pl-6">{{ __('Total') }}</td>
                                                    <td class="px-3 py-4 text-lg font-semibold text-gray-900 whitespace-nowrap">P {{ number_format($total,2,'.',',') }}</td>
                                                    <td class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap"></td>
                                                    </tr>
                                                    <tr class="bg-green-300">
                                                    <td class="py-4 pl-4 pr-3 text-sm font-medium text-gray-900 whitespace-nowrap sm:pl-6">{{ __('Balance') }}</td>
                                                    <td class="px-3 py-4 text-lg font-semibold text-gray-900 whitespace-nowrap">P {{ number_format($total_tuition_fee - $total,2,'.',',') }}</td>
                                                    <td class="px-3 py-4 text-gray-500 whitespace-nowrap"></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    @else
                                        @if(!empty($scan_or_search) || is_null($scan_or_search))
                                        <div class="overflow-hidden bg-white shadow sm:rounded-lg">
                                            <div class="flex px-4 py-2 text-center bg-gray-400 sm:px-6">
                                                <x-icon.exclamation-inside-triangle class="w-6 h-6 text-white" />
                                                <h3 class="ml-2 text-lg font-medium leading-6 text-white">
                                                    Student Record not found!
                                                </h3>
                                            </div>
                                        </div>
                                        @endif
                                    @endif


                                </div>
                            </div>
                        </div>
                    </div>


                </section>

                <div>
                    <x-modal.dialog wire:model="showFormModal" maxWidth="sm">
                        <x-slot name="title">
                            <div class="flex">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                                </svg>
                                <span>PAYMENT FORM</span>
                            </div>
                        </x-slot>

                        <x-slot name="content">
                            <div class="p-1 mb-4 space-y-3 overflow-y-auto max-h-96">
                                <div class="space-y-1 sm:col-span-2">
                                    <label for="date" class="text-sm">DATE :</label>
                                    <x-input wire:model.lazy="date" id="date" type="date"/>
                                    @error('date')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
                                </div>
                                <div class="space-y-1 sm:col-span-2">
                                    <label for="amount" class="text-sm">AMOUNT :</label>
                                    <x-input wire:model.lazy="amount" id="amount" type="text"/>
                                    @error('amount')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
                                </div>
                                <div class="space-y-1 sm:col-span-2">
                                    <label for="form_of_payment" class="text-sm">Form of Payment :</label>
                                    <x-select wire:model.lazy="form_of_payment" id="form_of_payment" class="w-full focus:ring-green-500">
                                        <option value="">-Select Payment-</option>
                                        <option>Cash</option>
                                        <option>Check</option>
                                    </x-select>
                                    @error('form_of_payment')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
                                </div>
                            </div>

                        </x-slot>

                        <x-slot name="footer">
                            <x-button wire:click="closeRecord()" type="button" class="text-white bg-gray-400 hover:bg-gray-500">
                                {{ __('Cancel') }}
                            </x-button>
                            <x-button wire:click="saveRecord()" type="button" class="hover:bg-blue-500 hover:text-white">
                                {{ __('Save') }}
                            </x-button>
                        </x-slot>
                    </x-modal.dialog>
                </div>

            </main>
        </div>

        {{-- Modal --}}

    </div>
</div>
