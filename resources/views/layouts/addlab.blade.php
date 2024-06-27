<x-AppLayout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
         <ol class="hidden sm:flex  items-center overflow-y-auto w-full text-sm font-medium text-center text-gray-500 sm:text-base">
             @if(Route::currentRouteName() == 'add.lab1')
        <li class="flex md:w-full items-center text-green-600 sm:after:content-[''] after:w-full after:h-1 after:border-b after:border-gray-200 after:border-1 after:hidden sm:after:inline-block after:mx-6 xl:after:mx-10 ">
        <span class="flex items-center after:content-['/'] sm:after:hidden after:mx-2 after:text-gray-200 ">
            <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
            </svg>
            Add <span class="hidden sm:inline-flex sm:ms-2">lab</span>
        </span>
        </li>
             @else
                 <li class="flex md:w-full items-center after:content-[''] after:w-full after:h-1 after:border-b after:border-gray-200 after:border-1 after:hidden sm:after:inline-block after:mx-6 xl:after:mx-10 ">
        <span class="flex items-center after:content-['/'] sm:after:hidden after:mx-2 after:text-gray-200">
            <span class="me-2">1</span>
           Add <span class="hidden sm:inline-flex sm:ms-2">Lab</span>
        </span>
                 </li>
             @endif

             @if(Route::currentRouteName() == 'add.lab2')
                     <li class="flex md:w-full items-center text-green-600 sm:after:content-[''] after:w-full after:h-1 after:border-b after:border-gray-200 after:border-1 after:hidden sm:after:inline-block after:mx-6 xl:after:mx-10 ">
        <span class="flex items-center after:content-['/'] sm:after:hidden after:mx-2 after:text-gray-200 ">
            <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
            </svg>
            Add <span class="hidden sm:inline-flex sm:ms-2">Input</span>
        </span>
                     </li>
             @else
                     <li class="flex md:w-full items-center after:content-[''] after:w-full after:h-1 after:border-b after:border-gray-200 after:border-1 after:hidden sm:after:inline-block after:mx-6 xl:after:mx-10 ">
        <span class="flex items-center after:content-['/'] sm:after:hidden after:mx-2 after:text-gray-200">
            <span class="me-2">2</span>
           Add <span class="hidden sm:inline-flex sm:ms-2">inputs</span>
        </span>
                     </li>
             @endif

                 @if(Route::currentRouteName() == 'add.lab3')
                     <li class="flex md:w-full items-center text-green-600 sm:after:content-[''] after:w-full after:h-1 after:border-b after:border-gray-200 after:border-1 after:hidden sm:after:inline-block after:mx-6 xl:after:mx-10 ">
        <span class="flex items-center after:content-['/'] sm:after:hidden after:mx-2 after:text-gray-200 ">
            <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
            </svg>
            Add <span class="hidden sm:inline-flex sm:ms-2">Script</span>
        </span>
                     </li>

                 @else
                     <li class="flex md:w-full items-center after:content-[''] after:w-full after:h-1 after:border-b after:border-gray-200 after:border-1 after:hidden sm:after:inline-block after:mx-6 xl:after:mx-10 ">
        <span class="flex items-center after:content-['/'] sm:after:hidden after:mx-2 after:text-gray-200">
            <span class="me-2">3</span>
            Add<span class="hidden sm:inline-flex sm:ms-2">Script</span>
        </span>
                     </li>
                 @endif

                 @if(Route::currentRouteName() == 'add.lab4')
                     <li class="flex md:w-full items-center text-green-600 sm:after:content-[''] after:w-full after:h-1 after:border-b after:border-gray-200 after:border-1 after:hidden sm:after:inline-block after:mx-6 xl:after:mx-10 ">
        <span class="flex items-center after:content-['/'] sm:after:hidden after:mx-2 after:text-gray-200 ">
            <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
            </svg>
               Confirmation
        </span>
                     </li>
                 @else
                     <li class="flex items-center">
                         <span class="me-2">4</span>
                         Confirmation
                     </li>

                 @endif


        </ol>
                  {{ $slot }}
            </div>
        </div>
    </div>
</x-AppLayout>
