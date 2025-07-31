<?php
 
namespace App\Livewire;
 
use Livewire\Component;
use App\Models\PostModel;
 
class Post extends Component
{
    public $title = "";
    public $description = "";
    public $todos = [];
    public $status = 0;

    public function mount()
    {
        $this->todos = PostModel::where('completed', 0)->latest()->get();
    }

    public function submit()
    {
        $this->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        ]);

        PostModel::create([
        'title' => $this->title,
        'description' => $this->description,
        ]);

        // Reset both fields easily:
        // $this->reset(['title', 'description']);

        // Or using pull():
        $this->pull(['title', 'description']);

        $this->todos = PostModel::latest()->get();
    }

    public function delete($id)
    {
        PostModel::find($id)?->delete(); // Deletes the post safely

        // Refresh the list
        $this->todos = PostModel::where('completed', 0)->latest()->get();
    }

    public function toggleCompleted($id)
    {
        $todo = PostModel::find($id);
        if ($todo) {
            $todo->completed = !$todo->completed;
            $todo->save();
            $this->todos = PostModel::where('completed', 0)->latest()->get();
        }
    }

    public function assignStatus($status) {
        $this->status = $status;
        $this->todos = PostModel::where('completed', $status)->latest()->get();
    }
 
    public function render()
    {
        return view('livewire.post');
    }
}