<x-layouts::app :title="__('Learning Materials')">
    <div class="flex h-full w-full flex-1 flex-col gap-4">
        {{-- Page Header --}}
        <div>
            <flux:heading size="lg" class="font-semibold text-zinc-900 dark:text-white">{{ __('Learning Materials') }}</flux:heading>
            <flux:text size="sm" class="text-zinc-500 dark:text-zinc-400">{{ __('Browse and access all course materials') }}</flux:text>
        </div>

        {{-- Search & Filters --}}
        <div class="rounded-lg border border-neutral-200 bg-white p-4 dark:border-neutral-700 dark:bg-zinc-900">
            <div class="grid grid-cols-1 gap-3 md:grid-cols-4">
                <div class="md:col-span-2">
                    <input type="text" placeholder="{{ __('Search materials...') }}" class="w-full px-3 py-2 rounded-lg border border-neutral-200 bg-white text-sm dark:border-neutral-700 dark:bg-zinc-800 dark:text-white" />
                </div>
                <select class="rounded-lg border border-neutral-200 bg-white px-3 py-2 text-sm dark:border-neutral-700 dark:bg-zinc-800 dark:text-white">
                    <option>{{ __('All Subjects') }}</option>
                    <option>{{ __('Basic Programming') }}</option>
                    <option>{{ __('Database Systems') }}</option>
                    <option>{{ __('Computer Networks') }}</option>
                </select>
                <select class="rounded-lg border border-neutral-200 bg-white px-3 py-2 text-sm dark:border-neutral-700 dark:bg-zinc-800 dark:text-white">
                    <option>{{ __('All Status') }}</option>
                    <option>{{ __('Completed') }}</option>
                    <option>{{ __('In Progress') }}</option>
                    <option>{{ __('Not Started') }}</option>
                </select>
            </div>
        </div>

        {{-- Materials Grid --}}
        <div class="space-y-4">
            <div class="flex items-center justify-between">
                <flux:text size="sm" class="text-zinc-600 dark:text-zinc-400">{{ __('Showing 12 materials') }}</flux:text>
            </div>

            <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3">
                @php
                    $materials = [
                        [
                            'id' => 1,
                            'title' => 'Introduction to Algorithms & Programming',
                            'subject' => 'Basic Programming',
                            'instructor' => 'Mr. Budi Santoso',
                            'date' => 'Aug 10, 2026',
                            'progress' => 100,
                            'status' => 'completed',
                        ],
                        [
                            'id' => 2,
                            'title' => 'Relational Databases & ERD Concepts',
                            'subject' => 'Database Systems',
                            'instructor' => 'Ms. Siti Rahma',
                            'date' => 'Aug 08, 2026',
                            'progress' => 65,
                            'status' => 'in-progress',
                        ],
                        [
                            'id' => 3,
                            'title' => 'Stack & Queue Data Structures',
                            'subject' => 'Basic Programming',
                            'instructor' => 'Mr. Budi Santoso',
                            'date' => 'Aug 05, 2026',
                            'progress' => 45,
                            'status' => 'in-progress',
                        ],
                        [
                            'id' => 4,
                            'title' => 'Network Topology Fundamentals',
                            'subject' => 'Computer Networks',
                            'instructor' => 'Mr. Ahmad Subagyo',
                            'date' => 'Jul 28, 2026',
                            'progress' => 0,
                            'status' => 'not-started',
                        ],
                        [
                            'id' => 5,
                            'title' => 'Object-Oriented Programming Principles',
                            'subject' => 'Basic Programming',
                            'instructor' => 'Mr. Budi Santoso',
                            'date' => 'Jul 20, 2026',
                            'progress' => 80,
                            'status' => 'in-progress',
                        ],
                        [
                            'id' => 6,
                            'title' => 'Advanced SQL Queries',
                            'subject' => 'Database Systems',
                            'instructor' => 'Ms. Siti Rahma',
                            'date' => 'Jul 15, 2026',
                            'progress' => 100,
                            'status' => 'completed',
                        ],
                    ];
                @endphp

                @foreach ($materials as $material)
                    <a href="#" class="group rounded-lg border border-neutral-200 bg-white p-4 transition hover:border-indigo-300 hover:shadow-md dark:border-neutral-700 dark:bg-zinc-900 dark:hover:border-indigo-700">
                        {{-- Status Badge --}}
                        <div class="mb-3 flex items-start justify-between">
                            <flux:badge 
                                :color="$material['status'] === 'completed' ? 'emerald' : ($material['status'] === 'in-progress' ? 'amber' : 'zinc')"
                                size="sm"
                            >
                                {{ $material['status'] === 'completed' ? __('Completed') : ($material['status'] === 'in-progress' ? __('In Progress') : __('Not Started')) }}
                            </flux:badge>
                            <flux:icon name="document-text" class="size-5 text-indigo-600 dark:text-indigo-400" />
                        </div>

                        {{-- Material Info --}}
                        <div class="mb-3 space-y-2">
                            <flux:badge color="zinc" size="sm">{{ $material['subject'] }}</flux:badge>
                            <flux:heading size="sm" class="font-bold text-zinc-900 dark:text-white line-clamp-2 group-hover:text-indigo-600 dark:group-hover:text-indigo-400">
                                {{ $material['title'] }}
                            </flux:heading>
                            <div class="space-y-1 text-xs text-zinc-500 dark:text-zinc-400">
                                <div class="flex items-center gap-2">
                                    <flux:icon name="user" class="size-3" />
                                    <span>{{ $material['instructor'] }}</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <flux:icon name="calendar" class="size-3" />
                                    <span>{{ $material['date'] }}</span>
                                </div>
                            </div>
                        </div>

                        {{-- Progress Bar --}}
                        <div class="mb-4 space-y-1">
                            <div class="flex justify-between text-xs">
                                <span class="text-zinc-600 dark:text-zinc-400">{{ __('Progress') }}</span>
                                <span class="font-bold text-indigo-600 dark:text-indigo-400">{{ $material['progress'] }}%</span>
                            </div>
                            <div class="h-1.5 w-full rounded-full bg-neutral-200 dark:bg-neutral-800">
                                <div class="h-full rounded-full bg-indigo-600 transition" style="width: {{ $material['progress'] }}%"></div>
                            </div>
                        </div>

                        {{-- Action Buttons --}}
                        <div class="flex gap-2">
                            <flux:button variant="subtle" size="xs" icon="book-open" class="flex-1">{{ __('Read') }}</flux:button>
                            <flux:button variant="subtle" size="xs" icon="arrow-down-tray"></flux:button>
                        </div>
                    </a>
                @endforeach
            </div>

            {{-- Pagination --}}
            <div class="flex items-center justify-center gap-2 py-4">
                <button class="rounded-lg border border-neutral-200 px-3 py-2 text-sm dark:border-neutral-700">{{ __('Previous') }}</button>
                <button class="rounded-lg bg-indigo-600 px-3 py-2 text-sm font-medium text-white">1</button>
                <button class="rounded-lg border border-neutral-200 px-3 py-2 text-sm dark:border-neutral-700">2</button>
                <button class="rounded-lg border border-neutral-200 px-3 py-2 text-sm dark:border-neutral-700">3</button>
                <button class="rounded-lg border border-neutral-200 px-3 py-2 text-sm dark:border-neutral-700">{{ __('Next') }}</button>
            </div> 

            {{-- Future Implementation after the data dummy on the database is already exist --}}
            {{-- {{ $paginate->links()}} --}}
        </div>
    </div>
</x-layouts::app>