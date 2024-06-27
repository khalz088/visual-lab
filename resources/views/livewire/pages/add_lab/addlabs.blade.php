<?php

use Livewire\Attributes\Layout;
use Livewire\Volt\Component;



new #[Layout('layouts.addlab')] class extends Component
{
    public string $name = '';
    public string $description = '';
    public int $numberOfSteps = 1;
    public array $steps = [];
    public int $session = 1;

    public function addStep()
    {
        $this->numberOfSteps++;
        array_push($this->steps, '');
    }

    public function removeStep($index)
    {
        unset($this->steps[$index]);
        $this->steps = array_values($this->steps);
        $this->numberOfSteps--;
    }
    public function submit(): void
    {


        $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'session' => ['required',],
        ]);
      $lab = \App\Models\Labs::create([
       'name'=>$this->name,
          'description' => $this->description,
          'user_id' => auth()->user()->id,

       ]);

        $stps = [];
        $num = 1;
        foreach ($this->steps as $step) {
            $stps[] = [
                'labs_id' => $lab->id,
                'name' => 'Step'.$num++,
                'description' => $step,

            ];
        }
        \App\Models\Steps::insert($stps);


        $ses = [];
        $sessions = $this->session;
        $labId = $lab->id;

        for ($i = 0; $i < $sessions; $i++) {
            $ses[] = [
                'labs_id' => $labId,
            ];
        }

        \App\Models\lab_session::insert($ses);


        $this->redirectIntended(default: route('add.lab2', ['lab' => $labId], absolute: false));

    }
};
?>

<div>
    <form  wire:submit="submit">
        <div>
            <p class="mt-3 font-semibold text-center "> Lab Details</p>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div class="mt-4">
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input wire:model="name" id="name" class="block mt-1 w-full" type="text" name="name"   />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                <p class="italic">Here you will put your lab name</p>
            </div>
            <div class="mt-4">
                <x-input-label for="name" :value="__('Description')" />
                <textarea wire:model="description"  class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"  ></textarea>
                <x-input-error :messages="$errors->get('description')" class="mt-2" />
                <p class="italic">Here you will put your lab description, mostly what your lab does in general</p>
            </div>
        </div>
        </div>
        <div>
            <p class="mt-6 font-semibold text-center "> Lab Steps</p>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                @for($i = 0; $i < $numberOfSteps; $i++)
                    <div class="mt-4">
                        <x-input-label :for="'step-'.$i" :value="'Step '.($i+1)" />
                        <textarea wire:model="steps.{{ $i }}" id="step-{{ $i }}" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required ></textarea>
                        <p wire:click="removeStep({{ $i }})" class="text-red-500 hover:text-red-700">Remove Step</p>
                    </div>
                @endfor
            </div>
            <p wire:click="addStep" class="mt-4 bg-green-500 w-40 hover:bg-green-700 text-center text-white font-bold py-2 px-4 rounded">Add Step</p>
        </div>

        <div>
            <p class="mt-6 font-semibold text-center "> Lab Sessions</p>
            <div class="mt-4">
                <x-input-label for="name" :value="__('session ')" />
                <x-text-input wire:model="session" id="name" class="block mt-1 w-full " type="number" min="0"  />
                <x-input-error :messages="$errors->get('session')" class="mt-2" />
                <p class="italic">Here you will put how many session your lab has</p>
            </div>
        </div>
        <div class="flex mt-4 items-center gap-4">
            <x-primary-button class="w-full justify-center flex">{{ __('Next - Add input') }}</x-primary-button>
        </div>
    </form>

</div>
