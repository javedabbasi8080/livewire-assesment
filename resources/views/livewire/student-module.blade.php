<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">{{$type}} student <button class="btn btn-primary sm float-right" type="submit" style="background:blue;" wire:click="addForm">Create</button>
            </div>


            <div class="card-body">

                @if(session()->has('message'))
                <div class="valid-feedback">
                    {{ session('message') }}
                </div>
                @endif



                @if ($type === "add")
                @include("livewire.add-student-module")

                @endif


                @if ($type === "edit")
                @include("livewire.edit-student-module")
                @endif


                @if ($type === "list")
                @include("livewire.list-student-module")
                @endif

            </div>
        </div>
    </div>
</div>