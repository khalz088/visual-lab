<?php

use App\Models\Labs;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;


new #[Layout('layouts.weldash')] class extends Component {
    public $labs = [];
    public $currentPage = 1;
    public $lastPage;
    public $search = '';

    public function mount()
    {
        $this->loadLabs();

    }

    public function loadLabs()
    {
        $paginatedLabs = Labs::paginate(5, ['*'], 'page', $this->currentPage);
        $this->labs = $paginatedLabs->items();
        $this->lastPage = $paginatedLabs->lastPage();
    }

    public function nextPage()
    {
        if ($this->currentPage < $this->lastPage) {
            $this->currentPage++;
            $this->loadLabs();
        }
    }

    public function previousPage()
    {
        if ($this->currentPage > 1) {
            $this->currentPage--;
            $this->loadLabs();
        }
    }

};
?>
<div>
    <div class="px-4 py-16 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8 lg:py-20">
        <p class="justify-center flex mb-6"> All Labs Available</p>
        <div class="mb-10 border-t border-b divide-y">
            @foreach($labs as $lab)
                <a href="{{ route('lab', ['lab' => $lab->id]) }}">
                    <div class="grid mb-4 py-8 hover:shadow-xl sm:grid-cols-4">
                        <div class="mb-4 sm:mb-0">
                            <div class="space-y-1 text-xs font-semibold tracking-wide uppercase">
                                <p class="transition-colors duration-200 text-deep-purple-accent-400 hover:text-deep-purple-800"
                                   aria-label="Category">Lab</p>
                                <p class="text-gray-600">{{ \Carbon\Carbon::parse($lab['created_at'])->format('d M Y') }}</p>
                            </div>
                        </div>
                        <div class="sm:col-span-3 lg:col-span-2">
                            <div class="mb-3">
                                <a href="{{ route('lab', ['lab' => $lab->id]) }}" aria-label="Article"
                                   class="inline-block text-black transition-colors duration-200 hover:text-green-700">
                                    <p class="text-3xl font-extrabold leading-none sm:text-4xl xl:text-4xl">
                                        {{ $lab['name'] }}
                                    </p>
                                </a>
                            </div>
                            @php
                                $text = $lab['description'];
                                $words = explode(' ', $text);
                                $firstFiftyWords = array_slice($words, 0, 50);
                                $truncatedText = implode(' ', $firstFiftyWords);

                                if (count($words) > 50) {
                                    $truncatedText .= '...';
                                }
                            @endphp

                            <p class="text-gray-700">
                                {{ $truncatedText }}
                            </p>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>

        <div class="flex justify-center mt-4">

                <button wire:click="previousPage"
                        class="flex items-center justify-center px-3 h-8 me-3 font-medium text-gray-500 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 hover:text-gray-700">
                    <svg class="w-3.5 h-3.5 me-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                         fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M13 5H1m0 0 4 4M1 5l4-4"/>
                    </svg>
                    Previous
                </button>
            <span class="flex items-center justify-center px-3 h-8 font-medium text-gray-500  rounded-lg">
                Page {{ $currentPage }} of {{ $lastPage }}
            </span>
                <button wire:click="nextPage"
                        class="flex items-center justify-center px-3 h-8 font-medium text-gray-500 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 hover:text-gray-700">
                    Next
                    <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                         fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M1 5h12m0 0L9 1m4 4L9 9"/>
                    </svg>
                </button>

        </div>
    </div>
</div>
