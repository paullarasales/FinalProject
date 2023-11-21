<x-admin-layout>
    <div class="flex flex-col h-screen items-center w-full bg-gray-100">
        <div class="flex justify-start w-full h-16 p-5">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Overview') }}
            </h2>
        </div>
    
        <div class="py-12 mt-5 h-1/4 w-full">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 shadow-2xl h-100 w-full bg-white-700">
                        {{ __('Welcome Back' . ', ' . Auth::user()->name. '👋' )}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
