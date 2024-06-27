<?php

use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.weldash')] class extends Component
{
    public $input;
    public $sess = [];
    public $lab;
    public $steps;
    public $currentPage = 1;
    public $lastPage;
    public $parts = []; // Using an associative array for dynamic parts
    public $string = [];
    public $inputCount = 0;
    public $desc;

    public function mount(\App\Models\Labs $lab)
    {
        $this->lab = $lab;
        $this->loadLabs();
        $this->steps = \App\Models\Steps::where('labs_id', $lab->id)->get();
        $this->input = \App\Models\Input::where('labs_id', $lab->id)->get();
        foreach ($this->sess as $ind => $ses) {
            foreach ($this->input as $index => $in) {
                if ($ses->id === $in->lab_session_id) {
                    if ($in->type == 1) {
                        for ($partNumber = 1; $partNumber <= 4; $partNumber++) {
                            $key = 'part' . $partNumber . ($ind + 1) . ($index + 1);
                            $this->parts[$key] = isset($this->parts[$key]) ? $this->parts[$key] : '';
                        }

                    } else {
                        $key = 'string' . ($ind + 1) . ($index + 1);
                        $this->string[$key] = isset($this->string[$key]) ? $this->string[$key] : '';
                    }
                }
            }
        }

        $this->desc = $lab->input_desc()->get();

    }


    public function loadLabs()
    {
        $paginatedLabs = \App\Models\lab_session::where('labs_id' , $this->lab->id)->paginate(1, ['*'], 'page', $this->currentPage);
        $this->sess = $paginatedLabs->items();
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



}
?>

<div class="min-h-screen">

    <div x-data="{ selectedTab: 'Overview', tabItems: [
        {
            icon: `<svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke-width='1.5' stroke='currentColor' class='w-5 h-5'>
                  <path stroke-linecap='round' stroke-linejoin='round' d='M6 6.878V6a2.25 2.25 0 012.25-2.25h7.5A2.25 2.25 0 0118 6v.878m-12 0c.235-.083.487-.128.75-.128h10.5c.263 0 .515.045.75.128m-12 0A2.25 2.25 0 004.5 9v.878m13.5-3A2.25 2.25 0 0119.5 9v.878m0 0a2.246 2.246 0 00-.75-.128H5.25c-.263 0-.515.045-.75.128m15 0A2.25 2.25 0 0121 12v6a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 18v-6c0-.98.626-1.813 1.5-2.122' />
               </svg>`,
            name: 'Overview'
        },
        {
            icon: `<svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke-width='1.5' stroke='currentColor' class='w-5 h-5'>
                  <path stroke-linecap='round' stroke-linejoin='round' d='M14.25 6.087c0-.355.186-.676.401-.959.221-.29.349-.634.349-1.003 0-1.036-1.007-1.875-2.25-1.875s-2.25.84-2.25 1.875c0 .369.128.713.349 1.003.215.283.401.604.401.959v0a.64.64 0 01-.657.643 48.39 48.39 0 01-4.163-.3c.186 1.613.293 3.25.315 4.907a.656.656 0 01-.658.663v0c-.355 0-.676-.186-.959-.401a1.647 1.647 0 00-1.003-.349c-1.036 0-1.875 1.007-1.875 2.25s.84 2.25 1.875 2.25c.369 0 .713-.128 1.003-.349.283-.215.604-.401.959-.401v0c.31 0 .555.26.532.57a48.039 48.039 0 01-.642 5.056c1.518.19 3.058.309 4.616.354a.64.64 0 00.657-.643v0c0-.355-.186-.676-.401-.959a1.647 1.647 0 01-.349-1.003c0-1.035 1.008-1.875 2.25-1.875 1.243 0 2.25.84 2.25 1.875 0 .369-.128.713-.349 1.003-.215.283-.4.604-.4.959v0c0 .333.277.599.61.58a48.1 48.1 0 005.427-.63 48.05 48.05 0 00.582-4.717.532.532 0 00-.533-.57v0c-.355 0-.676.186-.959.401-.29.221-.634.349-1.003.349-1.035 0-1.875-1.007-1.875-2.25s.84-2.25 1.875-2.25c.37 0 .713.128 1.003.349.283.215.604.401.96.401v0a.656.656 0 00.658-.663 48.422 48.422 0 00-.37-5.36c-1.886.342-3.81.574-5.766.689a.578.578 0 01-.61-.58v0z' />
               </svg>`,
            name: 'Lab'
        }
    ] }">
        <div class="max-w-screen-xl mx-auto px-4 md:px-8">
            <div class="w-full border-b flex items-center justify-center gap-x-3 overflow-x-auto text-sm" aria-label="Manage your account">
                <template x-for="(item, index) in tabItems" :key="index">
                    <button
                        @click="selectedTab = item.name"
                        :class="{'border-green-600 text-green-600': selectedTab === item.name, 'border-white text-gray-500': selectedTab !== item.name}"
                        class="group outline-none py-1.5 border-b-2"
                    >
                        <div class="flex items-center gap-x-2 py-1.5 px-3 rounded-lg duration-150 group-hover:text-green-600 group-hover:bg-gray-50 group-active:bg-gray-100 font-medium">
                            <div x-html="item.icon"></div>
                            <span x-text="item.name"></span>
                        </div>
                    </button>
                </template>
            </div>

            <div x-show="selectedTab === 'Lab'" class="py-6">
            @foreach($sess as $ind => $see)
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:pl-10 pt-10">
                    <div class="max-w-md pb-4">
                        @foreach($see->input_ses as $index => $in)
                            @if($see->id === $in->lab_session_id)


                                @if($in->type == 1)

                                    <div class="m-4">
                                        <div>
                                            <p class="justify-center flex text-2xl font-semibold font-sans "> {{ $in->Input_desc === null ? 'Ip address' : $in->Input_desc->name }} </p>
                                            <p class="justify-center flex  "> {{ $in->Input_desc === null ? '' : $in->Input_desc->description }} </p>
                                            <input id="part1{{ $ind + 1 }}{{ $index + 1 }}" oninput="validateAndSetPart('part1', {{ $ind + 1 }}, {{ $index + 1 }})" type="text" class="w-14 focus:border-blue-500" maxlength="3" />
                                            <input id="part2{{ $ind + 1 }}{{ $index + 1 }}" oninput="validateAndSetPart('part2', {{ $ind + 1 }}, {{ $index + 1 }})" type="text" class="w-14 focus:border-blue-500" maxlength="3" />
                                            <input id="part3{{ $ind + 1 }}{{ $index + 1 }}" oninput="validateAndSetPart('part3', {{ $ind + 1 }}, {{ $index + 1 }})" type="text" class="w-14 focus:border-blue-500" maxlength="3" />
                                            <input id="part4{{ $ind + 1 }}{{ $index + 1 }}" oninput="validateAndSetPart('part4', {{ $ind + 1 }}, {{ $index + 1 }})" type="text" class="w-14 focus:border-blue-500" maxlength="3" />
                                        </div>
                                    </div>
                                @else
                                    <div class="m-4">
                                        <div>
                                            <p class="justify-center flex text-2xl font-semibold font-sans ">{{ $in->Input_desc === null ? 'string' : $in->Input_desc->name }} </p>
                                            <p class="justify-center flex mb-6  "> {{ $in->Input_desc === null ? '' : $in->Input_desc->description }} </p>
                                            <input id="string{{ $ind + 1 }}{{ $index + 1 }}" oninput="setString({{ $ind + 1 }}, {{ $index + 1 }})" type="text" class="w-full focus:border-blue-500" />
                                        </div>
                                    </div>
                                @endif
                            @endif
                        @endforeach
                    </div>

                    <div>
                        <div class="relative mx-auto border-gray-800 dark:border-gray-800 bg-gray-800 border-[8px] rounded-t-xl h-[172px] max-w-[301px] md:h-[294px] md:max-w-[512px]">
                            <div class="rounded-lg overflow-hidden h-[156px] md:h-[278px] bg-black">
                                <div id="terminal-input" class="m-2">
                                    <div class="text-light-green ml-1">
                                <span class="font-semibold">
                                    $ @foreach($see->input_ses as $index => $ie)
                                        @if($ie->type == 1)
                                            <span id="command{{ $ind + 1 }}{{ $index + 1 }}" style="display: none;">
                                                @foreach($ie->comd as $command)
                                                    {{ $command->name }}
                                                @endforeach
                                            </span>
                                        @else
                                            <span id="command{{ $ind + 1 }}{{ $index + 1 }}" style="display: none;">
                                                @foreach($ie->comd as $command)
                                                    {{ $command->name }}
                                                @endforeach
                                            </span>
                                        @endif
                                    @endforeach
                                </span>
                                        @foreach($see->input_ses as $index => $ie)
                                            @if($ie->type == 1)
                                                <span id="display-part1{{ $ind + 1 }}{{ $index + 1 }}"></span>
                                                <span id="dot1{{ $ind + 1 }}{{ $index + 1 }}" style="display: none;">.</span>
                                                <span id="display-part2{{ $ind + 1 }}{{ $index + 1 }}"></span>
                                                <span id="dot2{{ $ind + 1 }}{{ $index + 1 }}" style="display: none;">.</span>
                                                <span id="display-part3{{ $ind + 1 }}{{ $index + 1 }}"></span>
                                                <span id="dot3{{ $ind + 1 }}{{ $index + 1 }}" style="display: none;">.</span>
                                                <span id="display-part4{{ $ind + 1 }}{{ $index + 1 }}"></span>
                                            @else
                                                <span id="display-string{{ $ind + 1 }}{{ $index + 1 }}"></span>
                                            @endif
                                        @endforeach
                                        <span id="cursor" class="pl-2 animate-blink">_</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="relative mx-auto bg-gray-900 dark:bg-gray-700 rounded-b-xl rounded-t-sm h-[17px] max-w-[351px] md:h-[21px] md:max-w-[597px]">
                            <div class="absolute left-1/2 top-0 -translate-x-1/2 rounded-b-xl w-[56px] h-[5px] md:w-[96px] md:h-[8px] bg-gray-800"></div>
                        </div>
                    </div>
                </div>
            @endforeach

                    <div class="flex justify-center mt-6">

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
              session {{ $currentPage }} of {{ $lastPage }}
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


            <div x-show="selectedTab === 'Overview'" class="py-6">

            <div class="px-4 py-2 mx-auto sm:max-w-xl md:max-w-full ">
                <div class="max-w-xl mb-10 md:mx-auto sm:text-center lg:max-w-2xl md:mb-12">
                    <h2 class="max-w-lg mb-6  font-sans text-3xl font-bold leading-none tracking-tight text-gray-900 sm:text-4xl md:mx-auto">
                       {{$lab->name}}
                    </h2>
                    <p class="text-base text-gray-700 md:text-lg">
                      {{$lab->description}}
                    </p>
                </div>
                <div class="grid gap-10 lg:grid-cols-4 sm:grid-cols-2">
                    @foreach($steps as $step)
                        <div>
                            <div class="flex items-center justify-between mb-6">
                                <p class="text-2xl font-bold">{{$step->name}}</p>

                            </div>
                            <p class="text-gray-600">
                                {{$step->description}}
                            </p>
                        </div>
                    @endforeach

                </div>
            </div>
            </div>
        </div>
    </div>

</div>

<script>

    function validateAndSetPart(part, ind, index) {
        const input = document.getElementById(part + ind + index).value.replace(/[^0-9]/g, '');
        const validatedInput = input !== '' && parseInt(input) > 255 ? '255' : input;
        document.getElementById(part + ind + index).value = validatedInput;
        updateTerminalDisplay(part, ind, index, validatedInput);
    }

    function updateTerminalDisplay(part, ind, index, value) {
        const displayId = 'display-' + part + ind + index;
        const dotId = 'dot' + (part.slice(-1)) + ind + index;
        document.getElementById(displayId).innerText = value;
        document.getElementById(dotId).style.display = value ? 'inline' : 'none';
        toggleCommandDisplay(ind, index);
    }

    function setString(ind, index) {
        const value = document.getElementById('string' + ind + index).value;
        document.getElementById('display-string' + ind + index).innerText = value;
        toggleCommandDisplay(ind, index);
    }

    function toggleCommandDisplay(ind, index) {
        const part1 = document.getElementById('part1' + ind + index)?.value || '';
        const part2 = document.getElementById('part2' + ind + index)?.value || '';
        const part3 = document.getElementById('part3' + ind + index)?.value || '';
        const part4 = document.getElementById('part4' + ind + index)?.value || '';
        const string = document.getElementById('string' + ind + index)?.value || '';
        const commandId = 'command' + ind + index;

        if (part1 || part2 || part3 || part4 || string) {
            document.getElementById(commandId).style.display = 'inline';
        } else {
            document.getElementById(commandId).style.display = 'none';
        }
    }
</script>
