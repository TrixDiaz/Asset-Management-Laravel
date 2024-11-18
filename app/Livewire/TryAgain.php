<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Sample;

class TryAgain extends Component
{
    public $firstName = '';
    public $lastName = '';
    public $search = '';

    public function store(Sample $sample)
    {
        $sample->create([
            'first_name' => $this->firstName,
            'last_name' => $this->lastName,
        ]);
        return redirect()->route('dashboard')->with('success', 'User created successfully');
    }

    public function edit($id)
    {
        $sample = Sample::find($id);
        if ($sample) {
            $sample->update([
                'first_name' => $this->firstName,
                'last_name' => $this->lastName,
            ]);
        }
        return redirect()->route('dashboard')->with('success', 'User updated successfully');
    }

    public function delete($id)
    {
        Sample::find($id)->delete();
        return redirect()->route('dashboard')->with('success', 'User deleted successfully');
    }

    public function render()
    {
        $datas = Sample::all();
        $filteredDatas = Sample::where('first_name', 'like', '%' . $this->search . '%')->get();
        return view('livewire.try-again', compact('datas', 'filteredDatas'));
    }
}
