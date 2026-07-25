<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">

<head>
    @include('partials.head')
</head>

<body class="min-h-screen bg-white dark:bg-zinc-800">
    @php
        $userRole = auth()->user()?->getPrimaryRoleName();
    @endphp
    <flux:sidebar sticky collapsible="mobile"
        class="border-e border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900">

        <flux:sidebar.header>
            <x-app-logo :sidebar="true" href="{{ route($userRole . '.dashboard') }}" wire:navigate />
            <flux:sidebar.collapse class="lg:hidden" />
        </flux:sidebar.header>

        <flux:sidebar.nav>
            <flux:sidebar.item icon="home" :href="route($userRole.
                '.dashboard')"
                :current="request()->routeIs($userRole. '.dashboard')" wire:navigate>
                {{ __('Dashboard') }}
            </flux:sidebar.item>
        </flux:sidebar.nav>

        {{-- Role-based Sidebar --}}
        @if ($userRole === 'student')
            <flux:sidebar.nav>
                <flux:sidebar.group :heading="__(Str::ucfirst($userRole))" class="grid">
                    <flux:sidebar.item icon="book-open" :href="route('student.material')"
                        :current="request()->routeIs('student.material')" wire:navigate>
                        {{ __('Module') }}
                    </flux:sidebar.item>
                    <flux:sidebar.item icon="academic-cap" :href="route('student.quiz')"
                        :current="request()->routeIs('student.quiz')" wire:navigate>
                        {{ __('Quiz') }}
                    </flux:sidebar.item>
                    <flux:sidebar.item icon="chart-bar" :href="route('student.grade')"
                        :current="request()->routeIs('student.grade')" wire:navigate>
                        {{ __('Grade') }}
                    </flux:sidebar.item>
                </flux:sidebar.group>
            </flux:sidebar.nav>
        @elseif ($userRole === 'teacher')
            <flux:sidebar.nav>
                <flux:sidebar.group :heading="__(Str::ucfirst($userRole))" class="grid">
                    <flux:sidebar.item icon="home" :href="route('teacher.dashboard')"
                        :current="request()->routeIs('teacher.dashboard')" wire:navigate>
                        {{ __('Dashboard') }}
                    </flux:sidebar.item>
                    <flux:sidebar.item icon="document-text" :href="route('teacher.materials')"
                        :current="request()->routeIs('teacher.materials')" wire:navigate>
                        {{ __('Materials') }}
                    </flux:sidebar.item>
                    <flux:sidebar.item icon="clipboard-document-list" :href="route('teacher.quizzes')"
                        :current="request()->routeIs('teacher.quizzes')" wire:navigate>
                        {{ __('Quizzes') }}
                    </flux:sidebar.item>
                </flux:sidebar.group>
            </flux:sidebar.nav>
        @elseif ($userRole === 'admin')
            <flux:sidebar.nav>
                <flux:sidebar.group :heading="__(Str::ucfirst($userRole))" class="grid">
                    <flux:sidebar.item icon="home" :href="route('admin.dashboard')"
                        :current="request()->routeIs('admin.dashboard')" wire:navigate>
                        {{ __('Dashboard') }}
                    </flux:sidebar.item>
                    <flux:sidebar.item icon="users" :href="route('admin.users')"
                        :current="request()->routeIs('admin.users')" wire:navigate>
                        {{ __('Users') }}
                    </flux:sidebar.item>
                    <flux:sidebar.item icon="building-office" :href="route('admin.departments')"
                        :current="request()->routeIs('admin.departments')" wire:navigate>
                        {{ __('Departments') }}
                    </flux:sidebar.item>
                </flux:sidebar.group>
            </flux:sidebar.nav>
        @endif

        <flux:spacer />

        <flux:sidebar.nav>
            <flux:sidebar.item icon="folder-git-2" href="https://github.com/laravel/livewire-starter-kit"
                target="_blank">
                {{ __('Repository') }}
            </flux:sidebar.item>

            <flux:sidebar.item icon="book-open-text" href="https://laravel.com/docs/starter-kits#livewire"
                target="_blank">
                {{ __('Documentation') }}
            </flux:sidebar.item>
        </flux:sidebar.nav>
        <x-desktop-user-menu class="hidden lg:block" :name="auth()->user()->name" />

    </flux:sidebar>

    <!-- Mobile User Menu -->
    <flux:header class="lg:hidden">
        <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left" />

        <flux:spacer />

        <flux:dropdown position="top" align="end">
            <flux:profile :initials="auth()->user()->initials()" icon-trailing="chevron-down" />

            <flux:menu>
                <flux:menu.radio.group>
                    <div class="p-0 text-sm font-normal">
                        <div class="flex items-center gap-2 px-1 py-1.5 text-start text-sm">
                            <flux:avatar :name="auth()->user()->name" :initials="auth()->user()->initials()" />

                            <div class="grid flex-1 text-start text-sm leading-tight">
                                <flux:heading class="truncate">{{ auth()->user()->name }}</flux:heading>
                                <flux:text class="truncate">{{ auth()->user()->email }}</flux:text>
                            </div>
                        </div>
                    </div>
                </flux:menu.radio.group>

                <flux:menu.separator />

                <flux:menu.radio.group>
                    <flux:menu.item :href="route('profile.edit')" icon="cog" wire:navigate>
                        {{ __('Settings') }}
                    </flux:menu.item>
                </flux:menu.radio.group>

                <flux:menu.separator />

                <form method="POST" action="{{ route('logout') }}" class="w-full">
                    @csrf
                    <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle"
                        class="w-full cursor-pointer" data-test="logout-button">
                        {{ __('Log out') }}
                    </flux:menu.item>
                </form>
            </flux:menu>
        </flux:dropdown>
    </flux:header>

    {{ $slot }}

    @persist('toast')
        <flux:toast.group>
            <flux:toast />
        </flux:toast.group>
    @endpersist

    @fluxScripts
</body>

</html>
