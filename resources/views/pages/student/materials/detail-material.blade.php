<x-layouts::app :title="__('Material Details')">
    <div class="flex h-full w-full flex-1 flex-col gap-4">
        {{-- Breadcrumb --}}
        <div class="flex items-center gap-2 text-sm">
            <flux:link href="#" class="text-indigo-600 hover:text-indigo-700 dark:text-indigo-400">
                {{ __('Materials') }}</flux:link>
            <span class="text-zinc-400">/</span>
            <span class="text-zinc-600 dark:text-zinc-400">{{ __('Material Details') }}</span>
        </div>

        {{-- Header Section --}}
        <div class="rounded-lg border border-neutral-200 bg-white p-6 dark:border-neutral-700 dark:bg-zinc-900">
            <div class="mb-4 flex items-start justify-between">
                <div class="flex-1">
                    <div class="mb-2 flex items-center gap-2">
                        <flux:badge color="indigo" size="sm">{{ __('Basic Programming') }}</flux:badge>
                        <flux:badge color="emerald" size="sm">{{ __('Completed') }}</flux:badge>
                    </div>
                    <flux:heading size="xl" class="mb-2 font-bold text-zinc-900 dark:text-white">
                        {{ __('Introduction to Algorithms & Programming') }}
                    </flux:heading>
                    <flux:text size="sm" class="text-zinc-600 dark:text-zinc-400">
                        {{ __('Learn the fundamentals of algorithmic thinking and programming concepts that form the foundation of computer science.') }}
                    </flux:text>
                </div>
                <flux:icon name="document-text" class="size-12 text-indigo-600 dark:text-indigo-400" />
            </div>

            {{-- Metadata --}}
            <div class="border-t border-neutral-100 pt-4 dark:border-neutral-800">
                <div class="grid grid-cols-2 gap-4 md:grid-cols-4">
                    <div>
                        <flux:text size="xs" class="text-zinc-500 dark:text-zinc-400">{{ __('Instructor') }}
                        </flux:text>
                        <flux:heading size="sm" class="font-semibold text-zinc-900 dark:text-white">
                            {{ __('Mr. Budi Santoso') }}</flux:heading>
                    </div>
                    <div>
                        <flux:text size="xs" class="text-zinc-500 dark:text-zinc-400">{{ __('Published') }}
                        </flux:text>
                        <flux:heading size="sm" class="font-semibold text-zinc-900 dark:text-white">
                            {{ __('Aug 10, 2026') }}</flux:heading>
                    </div>
                    <div>
                        <flux:text size="xs" class="text-zinc-500 dark:text-zinc-400">{{ __('Last Updated') }}
                        </flux:text>
                        <flux:heading size="sm" class="font-semibold text-zinc-900 dark:text-white">
                            {{ __('Aug 10, 2026') }}</flux:heading>
                    </div>
                    <div>
                        <flux:text size="xs" class="text-zinc-500 dark:text-zinc-400">{{ __('Reading Time') }}
                        </flux:text>
                        <flux:heading size="sm" class="font-semibold text-zinc-900 dark:text-white">
                            {{ __('12 min') }}</flux:heading>
                    </div>
                </div>
            </div>
        </div>

        {{-- Main Content --}}
        <div class="grid grid-cols-1 gap-4 lg:grid-cols-3">
            {{-- Left: Content & Sections --}}
            <div class="space-y-4 lg:col-span-2">
                {{-- Tabs/Navigation --}}
                <div class="flex gap-2 border-b border-neutral-200 dark:border-neutral-700">
                    <button
                        class="border-b-2 border-indigo-600 px-4 py-3 text-sm font-medium text-indigo-600 dark:text-indigo-400">
                        {{ __('Content') }}
                    </button>
                    <button
                        class="border-b-2 border-transparent px-4 py-3 text-sm font-medium text-zinc-600 hover:text-zinc-900 dark:text-zinc-400 dark:hover:text-white">
                        {{ __('Resources') }}
                    </button>
                    <button
                        class="border-b-2 border-transparent px-4 py-3 text-sm font-medium text-zinc-600 hover:text-zinc-900 dark:text-zinc-400 dark:hover:text-white">
                        {{ __('Quizzes') }}
                    </button>
                </div>

                {{-- Content Section --}}
                <div class="rounded-lg border border-neutral-200 bg-white p-6 dark:border-neutral-700 dark:bg-zinc-900">
                    <flux:heading size="md" class="mb-4 font-bold text-zinc-900 dark:text-white">
                        {{ __('Material Content') }}</flux:heading>

                    <div
                        class="prose prose-sm max-w-none dark:prose-invert mb-6 space-y-4 text-zinc-700 dark:text-zinc-300">
                        <p>{{ __('Algorithms are step-by-step procedures for solving a problem or accomplishing a task. In programming, we use algorithms to break down problems into logical sequences that computers can execute.') }}
                        </p>
                        <p>{{ __('This material covers fundamental concepts including:') }}</p>
                        <ul class="list-inside list-disc space-y-2">
                            <li>{{ __('Algorithm design and analysis') }}</li>
                            <li>{{ __('Time and space complexity') }}</li>
                            <li>{{ __('Data structures and their applications') }}</li>
                            <li>{{ __('Programming best practices') }}</li>
                        </ul>
                        <p>{{ __('[Content preview - Full content available in PDF]') }}</p>
                    </div>

                    {{-- AI Summarize Feature --}}
                    <div
                        class="rounded-lg border border-indigo-200 bg-gradient-to-r from-indigo-50/50 to-white p-4 dark:border-indigo-900/40 dark:from-indigo-950/20 dark:to-zinc-900">
                        <div class="flex items-start justify-between">
                            <div class="flex items-start gap-3">
                                <flux:icon name="sparkles" class="mt-0.5 size-5 text-indigo-600 dark:text-indigo-400" />
                                <div>
                                    <flux:heading size="sm" class="font-semibold text-zinc-900 dark:text-white">
                                        {{ __('AI Summary') }}</flux:heading>
                                    <flux:text size="xs" class="text-zinc-600 dark:text-zinc-400">
                                        {{ __('Get an AI-generated summary of this material') }}</flux:text>
                                </div>
                            </div>
                            <flux:button variant="primary" size="xs" icon="sparkles">{{ __('Summarize') }}
                            </flux:button>
                        </div>
                    </div>
                </div>

                {{-- Related Quizzes --}}
                <div class="rounded-lg border border-neutral-200 bg-white p-6 dark:border-neutral-700 dark:bg-zinc-900">
                    <flux:heading size="md" class="mb-4 font-bold text-zinc-900 dark:text-white">
                        {{ __('Related Quizzes') }}</flux:heading>

                    <div class="space-y-3">
                        @php
                            $quizzes = [
                                [
                                    'title' => 'Quiz 1: Algorithm Basics',
                                    'questions' => 10,
                                    'status' => 'completed',
                                    'score' => 95,
                                ],
                                [
                                    'title' => 'Quiz 2: Complexity Analysis',
                                    'questions' => 15,
                                    'status' => 'completed',
                                    'score' => 88,
                                ],
                                [
                                    'title' => 'Practice: Algorithm Design',
                                    'questions' => 20,
                                    'status' => 'not-started',
                                    'score' => null,
                                ],
                            ];
                        @endphp

                        @foreach ($quizzes as $quiz)
                            <div
                                class="flex items-center justify-between rounded-lg border border-neutral-200/60 bg-neutral-50/30 p-3 dark:border-neutral-800 dark:bg-zinc-800/30">
                                <div>
                                    <flux:heading size="sm" class="font-semibold text-zinc-900 dark:text-white">
                                        {{ $quiz['title'] }}</flux:heading>
                                    <flux:text size="xs" class="text-zinc-500 dark:text-zinc-400">
                                        {{ $quiz['questions'] }} {{ __('questions') }}</flux:text>
                                </div>
                                <div class="flex items-center gap-2">
                                    @if ($quiz['status'] === 'completed')
                                        <div class="text-right">
                                            <span
                                                class="text-sm font-bold text-zinc-900 dark:text-white">{{ $quiz['score'] }}/100</span>
                                        </div>
                                        <flux:badge color="emerald" size="xs">{{ __('Done') }}</flux:badge>
                                    @else
                                        <flux:button variant="primary" size="xs">{{ __('Start') }}</flux:button>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            {{-- Right Sidebar --}}
            <div class="space-y-4">
                {{-- Quick Stats --}}
                <div class="rounded-lg border border-neutral-200 bg-white p-4 dark:border-neutral-700 dark:bg-zinc-900">
                    <flux:heading size="md" class="mb-4 font-bold text-zinc-900 dark:text-white">
                        {{ __('Progress') }}</flux:heading>

                    <div class="space-y-3">
                        <div>
                            <div class="mb-1 flex justify-between text-xs">
                                <span class="text-zinc-600 dark:text-zinc-400">{{ __('Completion') }}</span>
                                <span class="font-bold text-emerald-600 dark:text-emerald-400">100%</span>
                            </div>
                            <div class="h-2 w-full rounded-full bg-neutral-200 dark:bg-neutral-800">
                                <div class="h-full rounded-full bg-emerald-600" style="width: 100%"></div>
                            </div>
                        </div>
                        <div>
                            <div class="mb-1 flex justify-between text-xs">
                                <span class="text-zinc-600 dark:text-zinc-400">{{ __('Quizzes Passed') }}</span>
                                <span class="font-bold text-indigo-600 dark:text-indigo-400">2/3</span>
                            </div>
                            <div class="h-2 w-full rounded-full bg-neutral-200 dark:bg-neutral-800">
                                <div class="h-full rounded-full bg-indigo-600" style="width: 66.67%"></div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Actions --}}
                <div class="rounded-lg border border-neutral-200 bg-white p-4 dark:border-neutral-700 dark:bg-zinc-900">
                    <flux:heading size="md" class="mb-4 font-bold text-zinc-900 dark:text-white">
                        {{ __('Actions') }}</flux:heading>

                    <div class="space-y-2">
                        <flux:button variant="primary" size="sm" icon="arrow-down-tray" class="w-full">
                            {{ __('Download Material') }}</flux:button>
                        <flux:button variant="subtle" size="sm" icon="share-2" class="w-full">
                            {{ __('Share') }}</flux:button>
                        <flux:button variant="subtle" size="sm" icon="bookmark" class="w-full">
                            {{ __('Save for Later') }}</flux:button>
                    </div>
                </div>

                {{-- AI Tutor --}}
                <div
                    class="rounded-lg border border-indigo-200 bg-gradient-to-br from-indigo-50/50 to-white p-4 dark:border-indigo-900/40 dark:from-indigo-950/20 dark:to-zinc-900">
                    <div class="mb-3 flex items-center gap-2">
                        <flux:icon name="sparkles" class="size-5 text-indigo-600 dark:text-indigo-400" />
                        <flux:heading size="sm" class="font-semibold text-zinc-900 dark:text-white">
                            {{ __('AI Tutor') }}</flux:heading>
                    </div>

                    <flux:text size="xs" class="mb-3 text-zinc-600 dark:text-zinc-400">
                        {{ __('Ask questions about this material and get instant answers from AI.') }}
                    </flux:text>

                    <flux:button variant="primary" size="sm" icon="chat-bubble-left-right" class="w-full">
                        {{ __('Chat with AI') }}</flux:button>
                </div>

                {{-- Material Info --}}
                <div
                    class="rounded-lg border border-neutral-200 bg-white p-4 dark:border-neutral-700 dark:bg-zinc-900">
                    <flux:heading size="md" class="mb-4 font-bold text-zinc-900 dark:text-white">
                        {{ __('File Info') }}</flux:heading>

                    <div class="space-y-3 text-sm">
                        <div class="flex justify-between">
                            <span class="text-zinc-600 dark:text-zinc-400">{{ __('Format') }}</span>
                            <span class="font-medium text-zinc-900 dark:text-white">PDF</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-zinc-600 dark:text-zinc-400">{{ __('Size') }}</span>
                            <span class="font-medium text-zinc-900 dark:text-white">2.4 MB</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-zinc-600 dark:text-zinc-400">{{ __('Pages') }}</span>
                            <span class="font-medium text-zinc-900 dark:text-white">24</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts::app>
