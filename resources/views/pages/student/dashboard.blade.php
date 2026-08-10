<x-layouts::app :title="__('Student Dashboard')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">

        <div class="space-y-4">
            <div class="rounded-xl border border-neutral-200 bg-white p-6 dark:border-neutral-700 dark:bg-zinc-900">
                <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                    <div>
                        <flux:heading size="xl" class="font-semibold text-zinc-900 dark:text-white">
                            {{ __('Student Dashboard') }}</flux:heading>
                        <flux:subheading class="mt-2 text-zinc-600 dark:text-zinc-400">
                            {{ __('Monitor your learning progress, access new modules, and review quiz results from one place.') }}
                        </flux:subheading>
                    </div>
                    <div class="flex flex-wrap items-center gap-2">
                        <flux:badge color="indigo" size="sm">{{ __('Active role') }}</flux:badge>
                        <flux:text size="sm" class="text-zinc-600 dark:text-zinc-400">
                            {{ auth()->user()->getPrimaryRoleName() ?? __('Student') }}</flux:text>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid auto-rows-min gap-4 md:grid-cols-3">
            <div
                class="flex flex-col justify-between rounded-xl border border-neutral-200 bg-white p-6 dark:border-neutral-700 dark:bg-zinc-900">
                <div class="space-y-3">
                    <div class="flex items-center justify-between">
                        <flux:badge color="indigo" size="sm" class="font-medium">{{ $studentClass ?? 'XII RPL 1' }}
                        </flux:badge>
                        <flux:icon name="book-open" class="size-5 text-indigo-600 dark:text-indigo-400" />
                    </div>
                    <flux:heading size="md" class="font-bold text-zinc-900 dark:text-white">
                        {{ auth()->user()->name ?? 'Student' }}</flux:heading>
                    <flux:subheading size="xs" class="text-zinc-500 dark:text-zinc-400">
                        {{ __('12 learning modules available') }}</flux:subheading>
                    <div class="rounded-3xl bg-zinc-50 p-4 text-sm text-zinc-700 dark:bg-zinc-800 dark:text-zinc-300">
                        <div class="flex items-center justify-between">
                            <span>{{ __('Current class') }}</span>
                            <span class="font-semibold">{{ $department ?? 'Software Engineering' }}</span>
                        </div>
                    </div>
                </div>
                <div
                    class="mt-6 flex items-center justify-between border-t border-neutral-100 pt-4 dark:border-neutral-800">
                    <flux:text size="xs" class="text-zinc-500">{{ __('Last updated') }} {{ now()->format('M d') }}
                    </flux:text>
                    <flux:button :href="route('student.material')" wire:navigate variant="filled" size="xs"
                        icon-trailing="arrow-right">{{ __('View modules') }}</flux:button>
                </div>
            </div>

            <div
                class="flex flex-col justify-between rounded-xl border border-neutral-200 bg-white p-6 dark:border-neutral-700 dark:bg-zinc-900">
                <div class="space-y-3">
                    <div class="flex items-center justify-between">
                        <flux:badge color="emerald" size="sm" class="font-medium">{{ __('Performance') }}
                        </flux:badge>
                        <flux:icon name="clipboard-document-check"
                            class="size-5 text-emerald-600 dark:text-emerald-400" />
                    </div>
                    <div class="flex items-baseline gap-2">
                        <flux:heading size="xl" class="text-2xl font-bold text-zinc-900 dark:text-white">
                            {{ $avgScore ?? '88.5' }}</flux:heading>
                        <flux:text size="xs" class="text-emerald-600 dark:text-emerald-400 font-semibold">
                            {{ __('Grade A') }}</flux:text>
                    </div>
                    <flux:subheading size="xs" class="text-zinc-500 dark:text-zinc-400">
                        {{ __('8 quizzes completed') }}</flux:subheading>
                    <div class="rounded-3xl bg-zinc-50 p-4 text-sm text-zinc-700 dark:bg-zinc-800 dark:text-zinc-300">
                        <div class="flex items-center justify-between">
                            <span>{{ __('Highest score') }}</span>
                            <span class="font-semibold">95 / 100</span>
                        </div>
                    </div>
                </div>
                <div
                    class="mt-6 flex items-center justify-between border-t border-neutral-100 pt-4 dark:border-neutral-800">
                    <flux:text size="xs" class="text-zinc-500">{{ __('Last quiz') }} 1 hour ago</flux:text>
                    <flux:button :href="route('student.quiz')" wire:navigate variant="primary" size="xs"
                        icon-trailing="arrow-right">{{ __('Open quiz') }}</flux:button>
                </div>
            </div>

            <div
                class="flex flex-col justify-between rounded-xl border border-indigo-200 bg-gradient-to-br from-indigo-50/50 to-white p-6 dark:border-indigo-900/60 dark:from-indigo-950/30 dark:to-zinc-900">
                <div class="space-y-3">
                    <div class="flex items-center justify-between">
                        <flux:badge color="violet" size="sm" class="font-medium">{{ __('Gemini AI') }}
                        </flux:badge>
                        <flux:icon name="sparkles" class="size-5 text-indigo-600 dark:text-indigo-400" />
                    </div>
                    <flux:heading size="md" class="font-bold text-zinc-900 dark:text-white">
                        {{ __('AI Tutor Assistant') }}</flux:heading>
                    <flux:subheading size="xs" class="text-zinc-600 dark:text-zinc-400 leading-relaxed">
                        {{ __('Summarize lessons, ask questions, and get instant study support anytime.') }}
                    </flux:subheading>
                    <div
                        class="rounded-3xl bg-white/90 p-4 text-sm text-zinc-700 dark:bg-zinc-950/70 dark:text-zinc-300">
                        <p>{{ __('Use AI to clarify concepts, practice exam questions, and review lecture notes quickly.') }}
                        </p>
                    </div>
                </div>
                <div
                    class="mt-6 flex items-center justify-between border-t border-indigo-100 pt-4 dark:border-indigo-950">
                    <flux:text size="xs" class="text-indigo-600 dark:text-indigo-400 font-semibold">
                        {{ __('Instant feedback') }}</flux:text>
                    <flux:button :href="route('student.material')" wire:navigate variant="primary" size="xs"
                        icon="chat-bubble-left-right">{{ __('Ask AI') }}</flux:button>
                </div>
            </div>
        </div>

        <div
            class="relative h-full flex-1 rounded-xl border border-neutral-200 bg-white p-6 dark:border-neutral-700 dark:bg-zinc-900">
            <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
                <div class="space-y-6 lg:col-span-2">
                    <div class="space-y-4">
                        <div
                            class="flex items-center justify-between border-b border-neutral-100 pb-3 dark:border-neutral-800">
                            <div>
                                <flux:heading size="md" class="font-bold text-zinc-900 dark:text-white">
                                    {{ __('Latest learning materials') }}</flux:heading>
                                <flux:subheading size="xs" class="text-zinc-500">
                                    {{ __('Newest modules published for your class') }}</flux:subheading>
                            </div>
                            <flux:link :href="route('student.material')" wire:navigate
                                class="text-xs font-semibold text-indigo-600 hover:text-indigo-700 dark:text-indigo-400">
                                {{ __('View all') }} →</flux:link>
                        </div>

                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                            @php
                                $recentMaterials = $materials ?? [
                                    [
                                        'title' => 'Introduction to Algorithms & Programming',
                                        'subject' => 'Basic Programming',
                                        'author' => 'Mr. Budi Santoso',
                                        'date' => '2 hours ago',
                                    ],
                                    [
                                        'title' => 'Relational Databases & ERD Concepts',
                                        'subject' => 'Database Systems',
                                        'author' => 'Ms. Siti Rahma',
                                        'date' => '1 day ago',
                                    ],
                                    [
                                        'title' => 'Stack & Queue Data Structures',
                                        'subject' => 'Basic Programming',
                                        'author' => 'Mr. Budi Santoso',
                                        'date' => '3 days ago',
                                    ],
                                    [
                                        'title' => 'Network Topology Fundamentals',
                                        'subject' => 'Computer Networks',
                                        'author' => 'Mr. Ahmad Subagyo',
                                        'date' => '4 days ago',
                                    ],
                                ];
                            @endphp

                            @foreach ($recentMaterials as $item)
                                <div
                                    class="flex flex-col justify-between rounded-lg border border-neutral-200/80 bg-neutral-50/60 p-4 dark:border-neutral-800 dark:bg-zinc-800/40 space-y-3">
                                    <div class="space-y-2">
                                        <div class="flex items-center justify-between">
                                            <flux:badge color="zinc" size="sm">{{ $item['subject'] }}
                                            </flux:badge>
                                            <flux:text size="xs" class="text-zinc-400">{{ $item['date'] }}
                                            </flux:text>
                                        </div>
                                        <flux:heading size="sm"
                                            class="font-bold text-zinc-900 dark:text-white line-clamp-2">
                                            {{ $item['title'] }}</flux:heading>
                                        <flux:text size="xs" class="text-zinc-500">{{ __('Instructor:') }}
                                            {{ $item['author'] }}</flux:text>
                                    </div>
                                    <div
                                        class="pt-2 border-t border-neutral-200/60 dark:border-neutral-700/60 flex items-center justify-between">
                                        <div class="flex items-center gap-1">
                                            <flux:icon name="sparkles" class="size-3.5 text-indigo-500" />
                                            <span
                                                class="text-xs font-semibold text-indigo-600 dark:text-indigo-400">{{ __('AI summary') }}</span>
                                        </div>
                                        <flux:button :href="route('student.material')" wire:navigate variant="subtle"
                                            size="xs" icon-trailing="arrow-right">{{ __('Read') }}
                                        </flux:button>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="space-y-4 pt-2">
                        <div
                            class="flex items-center justify-between border-b border-neutral-100 pb-3 dark:border-neutral-800">
                            <div>
                                <flux:heading size="md" class="font-bold text-zinc-900 dark:text-white">
                                    {{ __('Quiz evaluation history') }}</flux:heading>
                                <flux:subheading size="xs" class="text-zinc-500">
                                    {{ __('Self-assessment quiz scores and progress') }}</flux:subheading>
                            </div>
                            <flux:link :href="route('student.grade')" wire:navigate
                                class="text-xs font-semibold text-indigo-600 hover:text-indigo-700 dark:text-indigo-400">
                                {{ __('View transcript') }} →</flux:link>
                        </div>

                        <div class="space-y-2.5">
                            @php
                                $quizHistory = $attempts ?? [
                                    [
                                        'title' => 'Algorithm & Programming Evaluation',
                                        'subject' => 'Basic Programming',
                                        'attempt' => 1,
                                        'score' => 95,
                                        'status' => 'Passed',
                                        'color' => 'emerald',
                                    ],
                                    [
                                        'title' => 'ERD & Database Quiz',
                                        'subject' => 'Database Systems',
                                        'attempt' => 2,
                                        'score' => 88,
                                        'status' => 'Passed',
                                        'color' => 'emerald',
                                    ],
                                    [
                                        'title' => 'Stack & Queue Assessment',
                                        'subject' => 'Basic Programming',
                                        'attempt' => 1,
                                        'score' => 70,
                                        'status' => 'Remedial',
                                        'color' => 'amber',
                                    ],
                                ];
                            @endphp

                            @foreach ($quizHistory as $quiz)
                                <div
                                    class="flex items-center justify-between p-3.5 rounded-lg border border-neutral-200/70 dark:border-neutral-800 bg-neutral-50/50 dark:bg-zinc-800/40">
                                    <div class="space-y-0.5">
                                        <flux:heading size="sm"
                                            class="font-semibold text-zinc-900 dark:text-white">{{ $quiz['title'] }}
                                        </flux:heading>
                                        <div class="flex items-center gap-2 text-xs text-zinc-500">
                                            <span>{{ $quiz['subject'] }}</span>
                                            <span class="text-zinc-300 dark:text-zinc-700">•</span>
                                            <span>{{ __('Attempt') }} {{ $quiz['attempt'] }}</span>
                                        </div>
                                    </div>
                                    <div class="flex items-center gap-3">
                                        <div class="text-right">
                                            <span
                                                class="text-base font-bold text-zinc-900 dark:text-white">{{ $quiz['score'] }}</span>
                                            <span class="text-xs text-zinc-400">/100</span>
                                        </div>
                                        <flux:badge :color="$quiz['color']" size="sm">{{ $quiz['status'] }}
                                        </flux:badge>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="space-y-6">
                    <div class="space-y-4">
                        <div class="border-b border-neutral-100 pb-3 dark:border-neutral-800">
                            <flux:heading size="md" class="font-bold text-zinc-900 dark:text-white">
                                {{ __('Learning progress') }}</flux:heading>
                            <flux:subheading size="xs" class="text-zinc-500">
                                {{ __('Current module completion rates') }}</flux:subheading>
                        </div>
                        <div class="space-y-4">
                            <div class="space-y-1.5">
                                <div class="flex justify-between text-xs">
                                    <span
                                        class="font-medium text-zinc-700 dark:text-zinc-300">{{ __('Basic Programming') }}</span>
                                    <span class="font-bold text-indigo-600 dark:text-indigo-400">85%</span>
                                </div>
                                <div
                                    class="h-2 w-full overflow-hidden rounded-full bg-neutral-100 dark:bg-neutral-800">
                                    <div class="h-full rounded-full bg-indigo-600" style="width: 85%"></div>
                                </div>
                            </div>
                            <div class="space-y-1.5">
                                <div class="flex justify-between text-xs">
                                    <span
                                        class="font-medium text-zinc-700 dark:text-zinc-300">{{ __('Database Systems') }}</span>
                                    <span class="font-bold text-indigo-600 dark:text-indigo-400">65%</span>
                                </div>
                                <div
                                    class="h-2 w-full overflow-hidden rounded-full bg-neutral-100 dark:bg-neutral-800">
                                    <div class="h-full rounded-full bg-indigo-600" style="width: 65%"></div>
                                </div>
                            </div>
                            <div class="space-y-1.5">
                                <div class="flex justify-between text-xs">
                                    <span
                                        class="font-medium text-zinc-700 dark:text-zinc-300">{{ __('Computer Networks') }}</span>
                                    <span class="font-bold text-indigo-600 dark:text-indigo-400">40%</span>
                                </div>
                                <div
                                    class="h-2 w-full overflow-hidden rounded-full bg-neutral-100 dark:bg-neutral-800">
                                    <div class="h-full rounded-full bg-indigo-600" style="width: 40%"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="space-y-4 pt-2">
                        <div
                            class="flex items-center justify-between border-b border-neutral-100 pb-3 dark:border-neutral-800">
                            <flux:heading size="md" class="font-bold text-zinc-900 dark:text-white">
                                {{ __('Announcements') }}</flux:heading>
                            <flux:icon name="bell" variant="mini" class="size-4 text-zinc-400" />
                        </div>
                        <div class="space-y-3">
                            <div
                                class="rounded-lg border border-neutral-200/70 dark:border-neutral-800 bg-neutral-50/60 dark:bg-zinc-800/40 p-3.5 space-y-1.5">
                                <div class="flex items-center justify-between">
                                    <flux:badge color="amber" size="sm">{{ __('Important') }}</flux:badge>
                                    <flux:text size="xs" class="text-zinc-400">{{ __('Today') }}</flux:text>
                                </div>
                                <flux:heading size="xs" class="font-bold text-zinc-900 dark:text-white">
                                    {{ __('Midterm Quiz Schedule') }}</flux:heading>
                                <flux:text size="xs" class="text-zinc-500 leading-relaxed">
                                    {{ __('Online quiz opens next Monday for all active classes.') }}</flux:text>
                            </div>
                            <div
                                class="rounded-lg border border-neutral-200/70 dark:border-neutral-800 bg-neutral-50/60 dark:bg-zinc-800/40 p-3.5 space-y-1.5">
                                <div class="flex items-center justify-between">
                                    <flux:badge color="indigo" size="sm">{{ __('Update') }}</flux:badge>
                                    <flux:text size="xs" class="text-zinc-400">{{ __('Yesterday') }}</flux:text>
                                </div>
                                <flux:heading size="xs" class="font-bold text-zinc-900 dark:text-white">
                                    {{ __('New Web Programming Materials') }}</flux:heading>
                                <flux:text size="xs" class="text-zinc-500 leading-relaxed">
                                    {{ __('Livewire 3 and Flux UI course materials have been uploaded.') }}</flux:text>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts::app>
