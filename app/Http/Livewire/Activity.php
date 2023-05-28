<?php

namespace App\Http\Livewire;

use App\Models\Activity as ModelsActivity;
use Livewire\Component;

class Activity extends Component
{
    public $body;
    public $activity;
    public $count_activity;

    public function render()
    {
        $this->activity = ModelsActivity::orderBy('position', 'asc')->get();
        $this->count_activity = ModelsActivity::count();

        return view('livewire.activity');
    }

    public function store()
    {
        $this->validate([
            'body' => 'required'
        ]);

        ModelsActivity::create([
            'position' => $this->count_activity + 1,
            'body' => $this->body
        ]);

        $this->body = null;
    }

    public function updateTaskOrder($activity)
    {
        foreach ($activity as $ac ) {
            ModelsActivity::where('id',$ac['value'])->update([
                'position' => $ac['order']
            ]);
        }
    }

    public function delete($id)
    {
       $activity  = ModelsActivity::findOrFail($id);
       $activity->delete();

    }
}
