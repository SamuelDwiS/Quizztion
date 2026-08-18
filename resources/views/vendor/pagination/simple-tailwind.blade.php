@if ($paginator->hasPages())
    <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}"
        class="flex items-center justify-between border-t border-neutral-200/60 py-6 dark:border-neutral-800">

        @if ($paginator->onFirstPage())
            <button disabled
                class="inline-flex items-center gap-2 rounded-lg border border-neutral-200 bg-white px-4 py-2 text-sm font-medium text-zinc-400 cursor-not-allowed transition dark:border-neutral-800 dark:bg-zinc-900 dark:text-zinc-500">
                <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
                {{ __('Previous') }}
            </button>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" rel="prev"
                class="inline-flex items-center gap-2 rounded-lg border border-neutral-200 bg-white px-4 py-2 text-sm font-medium text-zinc-700 hover:border-indigo-300 hover:bg-indigo-50/50 transition dark:border-neutral-800 dark:bg-zinc-900 dark:text-zinc-300 dark:hover:border-indigo-700 dark:hover:bg-indigo-950/30">
                <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
                {{ __('Previous') }}
            </a>
        @endif

        <div class="text-sm text-zinc-600 dark:text-zinc-400">
            {{ __('Page') }}
            <span class="font-semibold text-zinc-900 dark:text-white">{{ $paginator->currentPage() }}</span>
        </div>

        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" rel="next"
                class="inline-flex items-center gap-2 rounded-lg border border-neutral-200 bg-white px-4 py-2 text-sm font-medium text-zinc-700 hover:border-indigo-300 hover:bg-indigo-50/50 transition dark:border-neutral-800 dark:bg-zinc-900 dark:text-zinc-300 dark:hover:border-indigo-700 dark:hover:bg-indigo-950/30">
                {{ __('Next') }}
                <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </a>
        @else
            <button disabled
                class="inline-flex items-center gap-2 rounded-lg border border-neutral-200 bg-white px-4 py-2 text-sm font-medium text-zinc-400 cursor-not-allowed transition dark:border-neutral-800 dark:bg-zinc-900 dark:text-zinc-500">
                {{ __('Next') }}
                <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </button>
        @endif

    </nav>
@endif
