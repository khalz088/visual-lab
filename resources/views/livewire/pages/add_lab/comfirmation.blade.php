<?php

use Livewire\Attributes\Layout;
use Livewire\Volt\Component;



new #[Layout('layouts.addlab')] class extends Component
{
    public $sess;
    public $input;
    public $details;


    public function mount(\App\Models\Labs $lab)
    {
        $this->lab = $lab;
        $this->sess = \App\Models\lab_session::where('labs_id' , $lab->id)->get();
        $this->input = \App\Models\Input::where('labs_id', $lab->id)->get();



    }

    public function submit()
    {
        $this->redirectIntended(default: route('dashboard', absolute: false));
    }


};
?>

<div >
    @foreach($sess as $index => $se)

    <div>
        <p class="mt-6 font-semibold text-center "> Lab Session {{$index + 1}}</p>
        <div class="bg-black rounded-md p-4 max-w-md mx-auto mt-6">
            <div class="flex items-center mb-2">
                <div class="h-3 w-3 rounded-full mr-2 bg-red-500 "></div>
                <div class="h-3 w-3 rounded-full mr-2 bg-yellow-500 "></div>
                <div class="h-3 w-3 rounded-full bg-green-500 "></div>
            </div>
            <div class="text-white">
                <span class="font-bold">Atc@lab:</span><span class="ml-1">~$</span>
                <span class="ml-2">
                    @foreach($input as $in)
                        @php

                            $ipCount = 0; // Counter for inputs of type 1
                            $stringCount = 0; // Counter for inputs of type not equal to 1
                        @endphp

                        @if($in->lab_session_id == $se->id)
                            @if($in->type == 1)
                                @foreach($in->comd as $command)
                                    {{ $command->name }}
                                @endforeach
                                    $(ip-input {{++$ipCount}})
                            @else
                                @foreach($in->comd as $command)
                                {{ $command->name }}
                                @endforeach
                                    $(string-input{{++$stringCount}})
                            @endif
                        @endif

                    @endforeach
                </span>
            </div>
        </div>

    </div>
    @endforeach
        <div class="flex mt-4 items-center gap-4">
            <x-primary-button wire:click="submit" class="w-full justify-center flex">{{ __('Done') }}</x-primary-button>
        </div>
</div>
