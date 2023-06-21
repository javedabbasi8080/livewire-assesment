<?php

namespace App\Http\Livewire;

use App\Models\Student;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class StudentModule extends Component
{
    use WithFileUploads;

    public $students;
    public $name;
    public $grade;
    public $department;
    public $studentId;
    public $photo;
    public $type = "list";

    protected $rules = [
        'name' => 'required',
        'grade' => 'required|numeric',
        'department' => 'required',
        'photo' => 'required',
    ];

    public function mount()
    {
        $this->resetForm();
    }

    public function render()
    {
        $this->students = Student::getStudents();
        return view('livewire.student-module');
    }

    public function addForm()
    {
        $this->type = "add";
    }

    public function create()
    {
        $this->validate();

        $photoPath = $this->photo->store('photos', 'public');

        Student::create([
            'name' => $this->name,
            'grade' => $this->grade,
            'department' => $this->department,
            'photo' => $photoPath,
        ]);

        session()->flash('message', 'Student created successfully.');
        $this->type = "list";
        $this->reset();
    }

    public function edit($id)
    {
        $student = Student::findOrFail($id);
        $this->name = $student->name;
        $this->grade = $student->grade;
        $this->department = $student->department;
        $this->studentId = $id;
        $this->type  = "edit";
    }

    public function update()
    {
        $this->validate();

        $student = Student::findOrFail($this->studentId);
        $student->name = $this->name;
        $student->grade = $this->grade;
        $student->department = $this->department;

        if ($this->photo) {
            // Delete the old file
            Storage::disk('public')->delete($student->photo);
            // Store the new file
            $pic = $this->photo->store('photos', 'public');
            // Update the photo path in the database
            $student->photo = $pic;
        }

        $student->save();
        $this->type  = "list";


        $this->resetForm();
    }

    public function delete($id)
    {
        $student = Student::findOrFail($id);
        // Delete the file
        Storage::disk('public')->delete($student->photo);
        $student->delete();
    }

    private function resetForm()
    {
        $this->name = '';
        $this->grade = null;
        $this->department = '';
        $this->studentId = null;
    }
}
