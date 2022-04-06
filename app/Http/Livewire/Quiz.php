<?php

namespace App\Http\Livewire;

use App\Models\Question;
use Livewire\Component;

class Quiz extends Component
{
    public $status;
    public $question;
    public $priority;
    public $total_quiz;

    public $mySelected;
    public $correct;

    public function mount()
    {
        $this->status = 'instruction';
        $this->priority = 1;
        $this->total_quiz = Question::count();
        $this->correct = 0;
        $this->mySelected = NULL;
    }

    public function changeStatus($status)
    {
        $this->status = $status;
    }

    public function choiceOption($index)
    {
        $this->mySelected = $index;
    }
    
    public function render()
    {
        $this->question = Question::where('priority',$this->priority)->first();
        return view('livewire.quiz');
    }

    public function nextQuestion()
    {
        if ($this->mySelected == $this->question->correct) {
            $this->correct++;
        }

        if ($this->priority < $this->total_quiz) {
            $this->priority++;
            $this->mySelected = NULL;
        }else {
            $this->status = 'finish';
        }
    }
}
