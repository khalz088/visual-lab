<?php

use Livewire\Attributes\Layout;
use Livewire\Volt\Component;



new #[Layout('layouts.addlab')] class extends Component
{
    public $lab;
    public $type = [];
    public $sess_id = [];
    public $sess;
   public int $numberOfinputs = 1;


    public function addStep()
    {
        $this->numberOfinputs++;
        array_push($this->sess_id, '');
        array_push($this->type, '');
    }

    public function removeStep($index)
    {
        unset($this->sess_id[$index]);
        unset($this->type[$index]);

        $this->sess_id = array_values($this->sess_id);
        $this->type = array_values($this->type);
        $this->numberOfinputs--;
    }

    public function mount(\App\Models\Labs $lab)
    {
        $this->lab = $lab;
        $this->sess = \App\Models\lab_session::where('labs_id' , $lab->id)->get();

    }

    public function submit()
    {
        $inputs = [];
        if (count($this->sess_id) == count($this->type)) {
            foreach ($this->sess_id as $index => $sid) {
                $inputs[] = [
                    'labs_id' => $this->lab->id,
                    'type' => $this->type[$index],
                    'lab_session_id' => $sid,
                ];
            }



            \App\Models\Input::insert($inputs);

            $this->redirectIntended(default: route('add.lab3', ['lab' => $this->lab->id], absolute: false));
        }


    }




};
?>

<div>
    <form wire:submit="submit">
            <p class="mt-6 font-semibold text-center "> Lab Inputs</p>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mt-6">
                @for($i = 0; $i < $numberOfinputs; $i++)
                    <div>
                <p class="mt-6 font-semibold text-center "> Input {{$i + 1}}</p>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 border-2 p-2 shadow-xl">
                    <div class="mt-4">
                        <x-input-label :for="'type-'.$i" :value="'input-type '.($i+1)" />
                    <select wire:model="type.{{ $i }}" id="type-{{ $i }}" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>
                         <option>---choose your input ---</option>
                        <option value="1"  id="type-{{ $i }}">Ip address</option>
                        <option value="2"  id="type-{{ $i }}">String</option>
                    </select>

                    </div>
                    <div class="mt-4">
                        <x-input-label :for="'sess_id-'.$i" :value="'input-session '.($i+1)" />
                        <select wire:model="sess_id.{{ $i }}" id="sess_id-{{ $i }}" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>
                            <option>---choose your session ---</option>
                            @foreach($sess as $index => $se)
                                <option value="{{ $se->id }}" id="sess_id-{{ $i }}">
                                    session{{ $index + 1 }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                <p wire:click="removeStep({{ $i }})" class="text-red-500 hover:text-red-700">Remove Step</p>
                    </div>
                    </div>
                @endfor
        </div>
            <p wire:click="addStep" class="mt-4 bg-green-500 hover:bg-green-700 text-white text-center w-40 font-bold py-2 px-4 rounded">Add input</p>


        <div class="flex mt-4 items-center gap-4">
            <x-primary-button class="w-full justify-center flex">{{ __('Next - Add script') }}</x-primary-button>
        </div>
    </form>
</div>
