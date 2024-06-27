<x-app-layout>

        <div class="mx-auto sm:px-6 lg:px-8">
            <div class=" bg-gray-50 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="px-4 py-16 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8 lg:py-20">
                        @if(auth()->user()->role_id == 1)
                        <div class="grid grid-cols-1 gap-8 sm:grid-cols-2">
                            <div class="text-center md:border-r">
                                <h6 class="text-4xl font-bold lg:text-5xl xl:text-6xl">{{\App\Models\User::count()}}</h6>
                                <p class="text-sm font-medium tracking-widest text-gray-800 uppercase lg:text-base">
                                    Users
                                </p>
                            </div>
                            <div class="text-center md:border-r">
                                <h6 class="text-4xl font-bold lg:text-5xl xl:text-6xl">{{auth()->user()->labs()->count()}}</h6>
                                <p class="text-sm font-medium tracking-widest text-gray-800 uppercase lg:text-base">
                                    Labs
                                </p>
                            </div>
                        </div>
                        @else
                            <div class="grid grid-cols-1 gap-8 ">
                                <div class="text-center md:border-r">
                                    <h6 class="text-4xl font-bold lg:text-5xl xl:text-6xl">{{auth()->user()->labs()->count()}}</h6>
                                    <p class="text-sm  font-medium tracking-widest text-gray-800 uppercase lg:text-base">
                                        Labs
                                    </p>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

</x-app-layout>
