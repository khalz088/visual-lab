<?php

use Livewire\Attributes\Layout;
use Livewire\Volt\Component;



new #[Layout('layouts.addlab')] class extends Component
{
    public $lab;
    public $input;
    public int $number = 1;
    public int $numberOfscript = 1;
    public $command = [];
    public $input_id1 = [];
    public $input_id2 = [];
    public $name= [];
    public $description= [];
    public $sess;


    public function addScript()
    {
        $this->numberOfscript++;
        array_push($this->input_id1, '');
        array_push($this->command, '');
    }

    public function removeScript($index)
    {
        unset($this->input_id1[$index]);
        unset($this->command[$index]);

        $this->input_id1 = array_values($this->input_id1);
        $this->command = array_values($this->command);
        $this->numberOfscript--;
    }


    public function add()
    {
        $this->number++;
        array_push($this->input_id2, '');
        array_push($this->name, '');
        array_push($this->description, '');
    }

    public function remove($index)
    {
        unset($this->input_id2[$index]);
        unset($this->name[$index]);
        unset($this->description[$index]);

        $this->input_id2 = array_values($this->input_id2);
        $this->name = array_values($this->name);
        $this->description = array_values($this->description);

        $this->number--;
    }





    public function mount(\App\Models\Labs $lab)
    {
        $this->lab = $lab;
        $this->input = \App\Models\Input::where('labs_id' , $lab->id)->get();
        $this->sess = \App\Models\lab_session::where('labs_id' , $lab->id)->get();
    }
    public function submit()
    {
        if (count($this->command) == count($this->input_id1)  && count($this->name) == count($this->input_id2) && count($this->name) == count($this->description) ) {
            $commands = [];
            foreach ($this->input_id1 as $index => $inid) {
                $commands[] = [
                    'name' => $this->command[$index],
                    'input_id' => $inid,
                ];
            }
            \App\Models\Command::insert($commands);

            $details = [];
            foreach ($this->input_id2 as $index => $inid2) {
                $details[] = [
                    'name' => $this->name[$index],
                    'description' => $this->description[$index],
                    'input_id' => $inid2,
                    'labs_id' => $this->lab->id,
                ];
            }
            \App\Models\Input_desc::insert($details);

            $this->redirectIntended(default: route('add.lab4', ['lab' => $this->lab->id], absolute: false));

            }
    }


};
?>

<div>
    <form  wire:submit="submit">
        <p class="mt-6 font-semibold text-center "> Lab Inputs Script</p>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            @for($i = 0; $i < $numberOfscript; $i++)
                <div>
                    <p class="mt-6 font-semibold text-center "> Input Script {{$i + 1}}</p>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 border-2 p-2 shadow-xl">
                        <div class="mt-4">
                            <x-input-label :for="'command-'.$i" :value="'Command '.($i+1)" />
                            <x-text-input wire:model="command.{{ $i }}" id="command-{{ $i }}" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required />
                        </div>
                        <div class="mt-4">
                            <x-input-label :for="'input_id1-'.$i" :value="'input_id '.($i+1)" />
                            <select wire:model="input_id1.{{ $i }}" id="input_id1-{{ $i }}" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>
                                <option>---choose your session ---</option>
                                @foreach($sess as $index => $se)
                                    @php

                                        $ipCount = 0; // Counter for inputs of type 1
                                        $stringCount = 0; // Counter for inputs of type not equal to 1
                                    @endphp
                                    @foreach($input as $index2 => $in)
                                        @if($se->id == $in->lab_session_id)
                                    <option value="{{ $in->id }}" id="input_id1-{{ $i }}">
                                       @if($in->type == 1)
                                         ip input type {{ ++$ipCount  }} - session{{ $index + 1 }}
                                       @else
                                            string input type {{ ++$stringCount}} - session{{ $index + 1 }}
                                       @endif

                                    </option>
                                        @endif
                                    @endforeach
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <p wire:click="removeScript({{ $i }})" class="text-red-500 hover:text-red-700">Remove Input Script </p>
                </div>
            @endfor
        </div>
        <p wire:click="addScript" class="mt-4 bg-green-500 hover:bg-green-700 text-white text-center w-40 font-bold py-2 px-4 rounded">Add input script</p>
        <p class="mt-6 font-semibold text-center "> Inputs Details</p>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            @for($i = 0; $i < $number; $i++)
                <div>
                    <p class="mt-6 font-semibold text-center "> Input details {{$i + 1}}</p>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 border-2 p-2 shadow-xl">
                        <div class="mt-4">
                            <x-input-label :for="'name-'.$i" :value="'Title '.($i+1)" />
                            <x-text-input wire:model="name.{{ $i }}" id="name-{{ $i }}" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required />
                        </div>
                        <div class="mt-4">
                            <x-input-label :for="'description-'.$i" :value="'Description '.($i+1)" />
                            <textarea wire:model="description.{{ $i }}" id="description-{{ $i }}" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required > </textarea>
                        </div>
                        <div class="mt-4">
                            <x-input-label :for="'input_id2-'.$i" :value="'input_id '.($i+1)" />
                            <select wire:model="input_id2.{{ $i }}" id="input_id2-{{ $i }}" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>
                                <option>---choose your session ---</option>
                                @foreach($sess as $index => $se)
                                    @php

                                        $ipCount = 0; // Counter for inputs of type 1
                                        $stringCount = 0; // Counter for inputs of type not equal to 1
                                    @endphp
                                    @foreach($input as $index2 => $in)
                                        @if($se->id == $in->lab_session_id)
                                            <option value="{{ $in->id }}" id="input_id1-{{ $i }}">
                                                @if($in->type == 1)
                                                    ip input type {{ ++$ipCount  }} - session{{ $index + 1 }}
                                                @else
                                                    string input type {{ ++$stringCount}} - session{{ $index + 1 }}
                                                @endif

                                            </option>
                                        @endif
                                    @endforeach
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <p wire:click="remove({{ $i }})" class="text-red-500 hover:text-red-700">Remove input detail</p>
                </div>
            @endfor
        </div>
        <p wire:click="add" class="mt-4 bg-green-500 hover:bg-green-700 text-white text-center w-40 font-bold py-2 px-4 rounded">Add input detail</p>

        <div class="flex mt-4 items-center gap-4">
            <x-primary-button class="w-full justify-center flex">{{ __('Next - confirmation') }}</x-primary-button>
        </div>
    </form>
</div>
