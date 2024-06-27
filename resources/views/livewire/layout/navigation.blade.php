<?php

use App\Livewire\Actions\Logout;
use Livewire\Volt\Component;

new class extends Component
{
    /**
     * Log the current user out of the application.
     */
    public function logout(Logout $logout): void
    {
        $logout();

        $this->redirect('/');
    }
}; ?>

<nav>

    <button id="showNavigationButton" class="ml-10"  type="button">
        <svg height="40" width="40" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M4 12H20M4 8H20M4 16H12" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
    </button>


    <!-- drawer component -->
    <div id="drawer-navigation" class="fixed top-0 left-0 z-40 w-64 h-screen p-4  transition-transform -translate-x-full bg-white" tabindex="-1" aria-labelledby="drawer-navigation-label">

        <button id="closeMenuButton" type="button" data-drawer-hide="drawer-navigation" aria-controls="drawer-navigation" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 absolute top-2.5 end-2.5 inline-flex items-center ">
            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            <span class="sr-only">Close menu</span>
        </button>
        <div class="py-1 overflow-y-auto">
            <a href="/">
            <div class="justify-center flex mb-10">
                <img src="{{asset('atc logo.png')}}" class="h-20 w-20">
            </div>
            </a>
            <!-- Sidebar content -->
            <div class="overflow-y-auto" style="height: 70vh;">
            <ul class="font-medium space-y-2 ">

                <li>
                    <div class="  p-2 text-gray-900 rounded-lg
                     group">
                        <button class="w-full flex items-center ">
                            <div class=" text-start">
                                <svg height="30" width="30" fill="#000000" viewBox="0 0 1920 1920" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier"> <path d="M833.935 1063.327c28.913 170.315 64.038 348.198 83.464 384.79 27.557 51.84 92.047 71.944 144 44.387 51.84-27.558 71.717-92.273 44.16-144.113-19.426-36.593-146.937-165.46-271.624-285.064Zm-43.821-196.405c61.553 56.923 370.899 344.81 415.285 428.612 56.696 106.842 15.811 239.887-91.144 296.697-32.64 17.28-67.765 25.411-102.325 25.411-78.72 0-154.955-42.353-194.371-116.555-44.386-83.802-109.102-501.346-121.638-584.245-3.501-23.717 8.245-47.21 29.365-58.277 21.346-11.294 47.096-8.02 64.828 8.357ZM960.045 281.99c529.355 0 960 430.757 960 960 0 77.139-8.922 153.148-26.654 225.882l-10.39 43.144h-524.386v-112.942h434.258c9.487-50.71 14.231-103.115 14.231-156.084 0-467.125-380.047-847.06-847.059-847.06-467.125 0-847.059 379.935-847.059 847.06 0 52.97 4.744 105.374 14.118 156.084h487.454v112.942H36.977l-10.39-43.144C8.966 1395.137.044 1319.128.044 1241.99c0-529.243 430.645-960 960-960Zm542.547 390.686 79.85 79.85-112.716 112.715-79.85-79.85 112.716-112.715Zm-1085.184 0L530.123 785.39l-79.85 79.85L337.56 752.524l79.849-79.85Zm599.063-201.363v159.473H903.529V471.312h112.942Z" fill-rule="evenodd"></path>
                                    </g></svg>
                            </div>
                            <div class="flex-1 ms-3 whitespace-nowrap">
                            <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                                {{ __('dashboard') }}
                            </x-nav-link>
                            </div>
                        </button>
                    </div>
                </li>
                <li>
                    <div  class="  p-2 text-gray-900 rounded-lg
                     group">
                        <button class="w-full flex items-center ">
                            <div class=" text-start">
                                <svg viewBox="0 0 20 20" height="30" width="30" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>profile_round [#1342]</title> <desc>Created with Sketch.</desc> <defs> </defs> <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <g id="Dribbble-Light-Preview" transform="translate(-140.000000, -2159.000000)" fill="#000000"> <g id="icons" transform="translate(56.000000, 160.000000)">
                                                    <path d="M100.562548,2016.99998 L87.4381713,2016.99998 C86.7317804,2016.99998 86.2101535,2016.30298 86.4765813,2015.66198 C87.7127655,2012.69798 90.6169306,2010.99998 93.9998492,2010.99998 C97.3837885,2010.99998 100.287954,2012.69798 101.524138,2015.66198 C101.790566,2016.30298 101.268939,2016.99998 100.562548,2016.99998 M89.9166645,2004.99998 C89.9166645,2002.79398 91.7489936,2000.99998 93.9998492,2000.99998 C96.2517256,2000.99998 98.0830339,2002.79398 98.0830339,2004.99998 C98.0830339,2007.20598 96.2517256,2008.99998 93.9998492,2008.99998 C91.7489936,2008.99998 89.9166645,2007.20598 89.9166645,2004.99998 M103.955674,2016.63598 C103.213556,2013.27698 100.892265,2010.79798 97.837022,2009.67298 C99.4560048,2008.39598 100.400241,2006.33098 100.053171,2004.06998 C99.6509769,2001.44698 97.4235996,1999.34798 94.7348224,1999.04198 C91.0232075,1998.61898 87.8750721,2001.44898 87.8750721,2004.99998 C87.8750721,2006.88998 88.7692896,2008.57398 90.1636971,2009.67298 C87.1074334,2010.79798 84.7871636,2013.27698 84.044024,2016.63598 C83.7745338,2017.85698 84.7789973,2018.99998 86.0539717,2018.99998 L101.945727,2018.99998 C103.221722,2018.99998 104.226185,2017.85698 103.955674,2016.63598" id="profile_round-[#1342]"> </path> </g> </g> </g> </g></svg>
                            </div>
                            <div class="flex-1 ms-3 whitespace-nowrap">
                                <x-nav-link :href="route('profile')" :active="request()->routeIs('profile')">
                                    {{ __('Profile') }}
                                </x-nav-link>
                            </div>
                        </button>
                    </div>
                </li>
                @if(auth()->user()->role_id == 1)
                <li>
                    <div  class=" justify-buttom p-2 text-gray-900 rounded-lg
                     group">
                        <button class="w-full flex items-center ">
                            <div class=" text-start">
                                <svg viewBox="0 0 20 20" height="30" width="30" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>profile_plus_round [#1324]</title> <desc>Created with Sketch.</desc> <defs> </defs> <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <g id="Dribbble-Light-Preview" transform="translate(-60.000000, -2239.000000)" fill="#000000"> <g id="icons" transform="translate(56.000000, 160.000000)"> <path d="M24.0001371,2083 C24.0001371,2083.552 23.5521371,2084 23.0001371,2084 L21.0001371,2084 L21.0001371,2086 C21.0001371,2086.552 20.5521371,2087 20.0001371,2087 C19.4481371,2087 19.0001371,2086.552 19.0001371,2086 L19.0001371,2084 L17.0001371,2084 C16.4481371,2084 16.0001371,2083.552 16.0001371,2083 C16.0001371,2082.448 16.4481371,2082 17.0001371,2082 L19.0001371,2082 L19.0001371,2080 C19.0001371,2079.448 19.4481371,2079 20.0001371,2079 C20.5521371,2079 21.0001371,2079.448 21.0001371,2080 L21.0001371,2082 L23.0001371,2082 C23.5521371,2082 24.0001371,2082.448 24.0001371,2083 M15.7401371,2097 L7.6121371,2097 C6.8171371,2097 6.3141371,2096.099 6.7721371,2095.449 C7.8511371,2093.92 9.6251371,2092.916 11.6331371,2092.902 C11.6471371,2092.902 11.6611371,2092.906 11.6751371,2092.906 C11.6901371,2092.906 11.7031371,2092.902 11.7181371,2092.902 C13.7271371,2092.916 15.5021371,2093.919 16.5801371,2095.449 C17.0381371,2096.099 16.5361371,2097 15.7401371,2097 M11.6751371,2086.906 C12.7781371,2086.906 13.6751371,2087.803 13.6751371,2088.906 C13.6751371,2089.995 12.8001371,2090.879 11.7181371,2090.902 C11.7031371,2090.902 11.6901371,2090.9 11.6751371,2090.9 C11.6611371,2090.9 11.6471371,2090.902 11.6331371,2090.902 C10.5501371,2090.879 9.6751371,2089.995 9.6751371,2088.906 C9.6751371,2087.803 10.5731371,2086.906 11.6751371,2086.906 M14.7011371,2091.495 C15.5311371,2090.527 15.9311371,2089.18 15.5001371,2087.724 C15.1031371,2086.38 13.9731371,2085.319 12.6061371,2085.011 C9.9921371,2084.422 7.6751371,2086.393 7.6751371,2088.906 C7.6751371,2089.899 8.0501371,2090.796 8.6491371,2091.495 C6.5201371,2092.365 4.8481371,2094.181 4.1011371,2096.4 C3.6711371,2097.68 4.6691371,2099 6.0191371,2099 L17.3311371,2099 C18.6811371,2099 19.6801371,2097.68 19.2491371,2096.4 C18.5021371,2094.181 16.8311371,2092.365 14.7011371,2091.495" id="profile_plus_round-[#1324]"> </path> </g> </g> </g> </g></svg>
                            </div>
                            <div class="flex-1 ms-3 whitespace-nowrap">
                                <x-nav-link :href="route('add.user')" :active="request()->routeIs('add.user')">
                                    {{ __('Add User') }}
                                </x-nav-link>
                            </div>
                        </button>
                    </div>
                </li>
                    <li>
                        <div  class=" justify-buttom p-2 text-gray-900 rounded-lg
                     group">
                            <button class="w-full flex items-center ">
                                <div class=" text-start">
                                    <svg height="30" width="30" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M3 9.5H21M3 14.5H21M8 4.5V19.5M6.2 19.5H17.8C18.9201 19.5 19.4802 19.5 19.908 19.282C20.2843 19.0903 20.5903 18.7843 20.782 18.408C21 17.9802 21 17.4201 21 16.3V7.7C21 6.5799 21 6.01984 20.782 5.59202C20.5903 5.21569 20.2843 4.90973 19.908 4.71799C19.4802 4.5 18.9201 4.5 17.8 4.5H6.2C5.0799 4.5 4.51984 4.5 4.09202 4.71799C3.71569 4.90973 3.40973 5.21569 3.21799 5.59202C3 6.01984 3 6.57989 3 7.7V16.3C3 17.4201 3 17.9802 3.21799 18.408C3.40973 18.7843 3.71569 19.0903 4.09202 19.282C4.51984 19.5 5.07989 19.5 6.2 19.5Z" stroke="#000000" stroke-width="2"></path> </g></svg>
                                </div>
                                <div class="flex-1 ms-3 whitespace-nowrap">
                                    <x-nav-link :href="route('table')" :active="request()->routeIs('table')">
                                        {{ __('Table') }}
                                    </x-nav-link>
                                </div>
                            </button>
                        </div>
                    </li>
                @endif

                <li>
                    <div class="  p-2 text-gray-900 rounded-lg
                     group">
                        <button class="w-full flex items-center ">
                            <div class=" text-start">
                                <svg height="30" width="30" version="1.1" id="_x32_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve" fill="#000000">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier"> <style type="text/css">  .st0{fill:#000000;}  </style> <g> <path class="st0" d="M456.766,255.008c-6.297,0-12.109,1.797-17.297,4.203c-7.75,3.656-14.219,8.828-18.875,13.063 c-3.906,3.578-6.438,6.406-7.25,7.375c-1.25,1.188-2.313,1.938-3,2.281c-0.734,0.391-1.016,0.375-1.031,0.375L409,282.164 c-0.313-0.188-1-0.734-1.844-1.844l-0.125-0.156L407,280.117c-0.188-0.266-3.453-4.578-3.484-14.828V207.57 c-0.016-24.766-20.078-44.828-44.844-44.844h-57.719c-5.859,0-9.766-1.094-12.109-2.047c-1.156-0.469-1.938-0.922-2.359-1.188 l-0.359-0.234l-0.047-0.047l-0.156-0.125c-1.109-0.844-1.641-1.531-1.844-1.844l-0.141-0.313c0-0.016,0-0.297,0.375-1.031 c0.344-0.688,1.094-1.734,2.281-2.969c1.5-1.297,6.578-5.859,11.828-12.516c3.063-3.891,6.172-8.469,8.609-13.641 c2.406-5.172,4.188-11,4.203-17.297C311.219,78.977,286.5,54.258,256,54.242c-30.516,0.016-55.219,24.734-55.219,55.234 c0,6.297,1.781,12.125,4.188,17.297c3.672,7.75,8.813,14.203,13.063,18.891c3.609,3.938,6.453,6.469,7.391,7.266 c1.172,1.234,1.922,2.297,2.266,2.984c0.391,0.719,0.375,1,0.375,1.016l-0.125,0.297c-0.203,0.328-0.75,1.016-1.844,1.859 l-0.188,0.141l-0.031,0.031c-0.281,0.172-4.578,3.453-14.844,3.469h-57.688c-24.781,0.016-44.844,20.078-44.859,44.844v57.719 c-0.016,5.859-1.109,9.75-2.047,12.109c-0.469,1.172-0.906,1.953-1.188,2.375l-0.25,0.359l0,0l-0.016,0.031l-0.125,0.156 c-0.859,1.109-1.531,1.656-1.859,1.844l-0.313,0.141c-0.016,0-0.297,0.016-1.031-0.375c-0.688-0.344-1.75-1.109-3-2.281 c-1.281-1.5-5.844-6.578-12.5-11.828c-3.875-3.047-8.453-6.172-13.625-8.609c-5.188-2.406-11-4.203-17.297-4.203 C24.719,255.008,0,279.727,0,310.242s24.719,55.219,55.234,55.234c6.297-0.016,12.109-1.797,17.297-4.203 c7.75-3.656,14.219-8.828,18.875-13.063c3.906-3.563,6.438-6.391,7.266-7.359c1.234-1.188,2.297-1.953,2.984-2.297 c0.734-0.391,1.016-0.375,1.031-0.375L103,338.32c0.313,0.188,1,0.75,1.844,1.844l0.125,0.156l0.047,0.063 c0.219,0.328,3.438,4.641,3.469,14.813v57.719c0.016,24.766,20.078,44.828,44.859,44.844h57.688 c14.656,0.031,22.453-5.328,24.203-6.766l0,0c0.016-0.016,0.031-0.031,0.047-0.047c0.094-0.078,0.25-0.188,0.297-0.234 l-0.016-0.016c2.016-1.609,3.813-3.422,5.188-5.656c1.438-2.328,2.313-5.188,2.313-8.063s-0.844-5.594-2.094-7.984 s-2.938-4.547-4.938-6.609l-0.266-0.266l-0.297-0.25l-0.016-0.031c-0.422-0.328-5.672-4.891-10.578-11.266 c-2.469-3.188-4.813-6.813-6.5-10.469c-1.672-3.672-2.625-7.313-2.625-10.578c0-11.141,4.5-21.156,11.797-28.453 c7.297-7.313,17.313-11.797,28.453-11.797c11.125,0,21.156,4.484,28.453,11.797c7.297,7.297,11.797,17.313,11.797,28.453 c0,3.375-1,7.141-2.797,10.922c-2.641,5.672-6.922,11.203-10.563,15.156c-1.797,1.984-3.453,3.594-4.609,4.672l-1.344,1.234 l-0.328,0.281l-0.078,0.063l-0.313,0.266l-0.266,0.281c-1.984,2.063-3.672,4.203-4.922,6.594s-2.078,5.109-2.078,7.984 c-0.016,2.875,0.875,5.734,2.313,8.063c1.359,2.234,3.156,4.047,5.172,5.656l-0.016,0.016c0.047,0.047,0.203,0.156,0.297,0.234 c0.016,0.016,0.031,0.031,0.047,0.047l0,0c1.75,1.438,9.547,6.797,24.188,6.766h57.719c24.766-0.016,44.828-20.078,44.844-44.844 v-57.719c0.016-5.859,1.109-9.75,2.047-12.094c0.469-1.172,0.906-1.953,1.188-2.375l0.25-0.359l0,0l0.016-0.031l0.141-0.172 c0.844-1.109,1.531-1.656,1.859-1.844l0.297-0.141c0.016,0,0.297-0.016,1.031,0.375c0.688,0.344,1.75,1.094,2.984,2.281 c1.281,1.5,5.859,6.578,12.5,11.828c3.891,3.063,8.469,6.172,13.641,8.609c5.188,2.406,11,4.188,17.297,4.203 C487.281,365.461,512,340.758,512,310.242S487.281,255.008,456.766,255.008z M407,340.367L407,340.367L407,340.367L407,340.367z"></path>
                                        </g> </g></svg>
                            </div>
                            <div class="flex-1 ms-3 whitespace-nowrap">
                                <x-nav-link :href="route('add.lab1')" :active="request()->routeIs('add.lab1')">
                                    {{ __('Add lab') }}
                                </x-nav-link>
                            </div>
                        </button>
                    </div>
                </li>
            </ul>
            </div>
            <ul class="bottom-0">
                <li>
        <div wire:click="logout" class="  p-2 text-gray-900 rounded-lg  hover:border-2 hover:text-green-700 hover:border-green-700
                     group">
            <button class="w-full flex items-center ">
                <div class=" text-start">
                    <svg height="30" width="30" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M22 6.62219V17.245C22 18.3579 21.2857 19.4708 20.1633 19.8754L15.0612 21.7977C14.7551 21.8988 14.449 22 14.0408 22C13.5306 22 12.9184 21.7977 12.4082 21.4942C12.2041 21.2918 11.898 21.0895 11.7959 20.8871H7.91837C6.38776 20.8871 5.06122 19.6731 5.06122 18.0544V17.0427C5.06122 16.638 5.36735 16.2333 5.87755 16.2333C6.38776 16.2333 6.69388 16.5368 6.69388 17.0427V18.0544C6.69388 18.7626 7.30612 19.2684 7.91837 19.2684H11.2857V4.69997H7.91837C7.20408 4.69997 6.69388 5.20582 6.69388 5.91401V6.9257C6.69388 7.33038 6.38776 7.73506 5.87755 7.73506C5.36735 7.73506 5.06122 7.33038 5.06122 6.9257V5.91401C5.06122 4.39646 6.28572 3.08125 7.91837 3.08125H11.7959C12 2.87891 12.2041 2.67657 12.4082 2.47423C13.2245 1.96838 14.1429 1.86721 15.0612 2.17072L20.1633 4.09295C21.1837 4.39646 22 5.50933 22 6.62219Z" fill="#000000"></path> <path d="M4.85714 14.8169C4.65306 14.8169 4.44898 14.7158 4.34694 14.6146L2.30612 12.5912C2.20408 12.49 2.20408 12.3889 2.10204 12.3889C2.10204 12.2877 2 12.1865 2 12.0854C2 11.9842 2 11.883 2.10204 11.7819C2.10204 11.6807 2.20408 11.5795 2.30612 11.5795L4.34694 9.55612C4.65306 9.25261 5.16327 9.25261 5.46939 9.55612C5.77551 9.85963 5.77551 10.3655 5.46939 10.669L4.7551 11.3772H8.93878C9.34694 11.3772 9.7551 11.6807 9.7551 12.1865C9.7551 12.6924 9.34694 12.7936 8.93878 12.7936H4.65306L5.36735 13.5017C5.67347 13.8052 5.67347 14.3111 5.36735 14.6146C5.26531 14.7158 5.06122 14.8169 4.85714 14.8169Z" fill="#000000"></path>
                        </g></svg>

                </div>
                <span class="flex-1 ms-3 whitespace-nowrap">log out</span>
            </button>
        </div>
    </li>
</ul>
        </div>
    </div>

</nav>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const showNavigationButton = document.getElementById('showNavigationButton');
        const drawerNavigation = document.getElementById('drawer-navigation');
        const closeMenuButton = document.getElementById('closeMenuButton');

        showNavigationButton.addEventListener('click', function() {
            drawerNavigation.classList.toggle('translate-x-0');
        });

        closeMenuButton.addEventListener('click', function() {
            drawerNavigation.classList.remove('translate-x-0');
        });

        const drawerNavigationLabel = document.getElementById('drawer-navigation-label');
        drawerNavigationLabel.addEventListener('click', function() {
            drawerNavigation.classList.remove('translate-x-0');
        });
    });
</script>
