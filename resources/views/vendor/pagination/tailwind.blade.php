@if ($paginator->hasPages())
    <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}"
        class="flex items-center justify-between border-t border-neutral-200/60 py-6 dark:border-neutral-800">

        {{-- Mobile View (Simple Next/Prev) --}}
        <div class="flex flex-1 justify-between gap-2 sm:hidden">
            @if ($paginator->onFirstPage())
                <flux:button disabled icon="chevron-left" variant="ghost" size="sm" class="text-zinc-400">
                    {{ __('Previous') }}
                </flux:button>
            @else
                <flux:button href="{{ $paginator->previousPageUrl() }}" rel="prev" icon="chevron-left"
                    variant="outline" size="sm">
                    {{ __('Previous') }}
                </flux:button>
            @endif

            @if ($paginator->hasMorePages())
                <flux:button href="{{ $paginator->nextPageUrl() }}" rel="next" icon-trailing="chevron-right"
                    variant="outline" size="sm">
                    {{ __('Next') }}
                </flux:button>
            @else
                <flux:button disabled icon-trailing="chevron-right" variant="ghost" size="sm"
                    class="text-zinc-400">
                    {{ __('Next') }}
                </flux:button>
            @endif
        </div>

        {{-- Desktop View (Full Pagination) --}}
        <div class="hidden w-full sm:flex sm:items-center sm:justify-between">
            {{-- Info Text --}}
            <div>
                <p class="text-sm text-zinc-600 dark:text-zinc-400">
                    {{ __('Showing') }}
                    @if ($paginator->firstItem())
                        <span class="font-semibold text-zinc-900 dark:text-white">{{ $paginator->firstItem() }}</span>
                        {{ __('to') }}
                        <span class="font-semibold text-zinc-900 dark:text-white">{{ $paginator->lastItem() }}</span>
                    @else
                        {{ $paginator->count() }}
                    @endif
                    {{ __('of') }}
                    <span class="font-semibold text-zinc-900 dark:text-white">{{ $paginator->total() }}</span>
                    {{ __('results') }}
                </p>
            </div>

            {{-- Pagination Buttons --}}
            <div class="flex items-center gap-1.5">
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                    <button disabled
                        class="rounded-lg border border-neutral-200 bg-white p-2 text-zinc-400 cursor-not-allowed dark:border-neutral-800 dark:bg-zinc-900">
                        <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                    </button>
                @else
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev"
                        class="rounded-lg border border-neutral-200 bg-white p-2 text-zinc-700 hover:border-indigo-300 hover:bg-indigo-50/50 transition dark:border-neutral-800 dark:bg-zinc-900 dark:text-zinc-300 dark:hover:border-indigo-700 dark:hover:bg-indigo-950/30">
                        <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                    </a>
                @endif

                {{-- Pagination Elements --}}
                <div class="flex items-center gap-1">
                    @foreach ($elements as $element)
                        {{-- "Three Dots" Separator --}}
                        @if (is_string($element))
                            <span class="px-2 py-2 text-sm text-zinc-500 dark:text-zinc-400">
                                {{ $element }}
                            </span>
                        @endif

                        {{-- Array Of Links --}}
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <button aria-current="page"
                                        class="rounded-lg border-2 border-indigo-600 bg-indigo-600 px-3.5 py-2 text-sm font-semibold text-white transition shadow-sm dark:border-indigo-500 dark:bg-indigo-600">
                                        {{ $page }}
                                    </button>
                                @else
                                    <a href="{{ $url }}"
                                        aria-label="{{ __('Go to page :page', ['page' => $page]) }}"
                                        class="rounded-lg border border-neutral-200 bg-white px-3.5 py-2 text-sm font-medium text-zinc-700 hover:border-indigo-300 hover:bg-indigo-50/50 transition dark:border-neutral-800 dark:bg-zinc-900 dark:text-zinc-300 dark:hover:border-indigo-700 dark:hover:bg-indigo-950/30">
                                        {{ $page }}
                                    </a>
                                @endif
                            @endforeach
                        @endif
                    @endforeach
                </div>

                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next"
                        class="rounded-lg border border-neutral-200 bg-white p-2 text-zinc-700 hover:border-indigo-300 hover:bg-indigo-50/50 transition dark:border-neutral-800 dark:bg-zinc-900 dark:text-zinc-300 dark:hover:border-indigo-700 dark:hover:bg-indigo-950/30">
                        <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                @else
                    <button disabled
                        class="rounded-lg border border-neutral-200 bg-white p-2 text-zinc-400 cursor-not-allowed dark:border-neutral-800 dark:bg-zinc-900">
                        <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </button>
                @endif
            </div>
        </div>
    </nav>
@endif
