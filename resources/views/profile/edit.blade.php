<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-2">
            <div class="h-4 w-1 bg-amber-500 rounded-full"></div>
            <h2 class="font-black text-xl text-black tracking-tight uppercase">
                {{ __('Pengaturan Profil') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-8 md:py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">

            <div class="p-5 sm:p-8 bg-gray-900/60 border border-gray-800/80 rounded-2xl shadow-xl backdrop-blur-md transition duration-300 hover:border-gray-800">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-5 sm:p-8 bg-gray-900/60 border border-gray-800/80 rounded-2xl shadow-xl backdrop-blur-md transition duration-300 hover:border-gray-800">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-5 sm:p-8 bg-gray-900/40 border border-red-950/30 rounded-2xl shadow-xl backdrop-blur-md transition duration-300 hover:border-red-900/20">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
