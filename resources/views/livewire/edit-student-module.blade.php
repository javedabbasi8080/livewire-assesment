<div>

    @if ($studentId)
    <form wire:submit.prevent="update">
        <input type="hidden" wire:model="studentId">
        <div class="form-row">

            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label for="validationServer03">Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="edit-name" placeholder="Name" wire:model="name">
                    @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>


            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label for="validationServer03">Grade</label>
                    <input type="text" class="form-control @error('grade') is-invalid @enderror" id="edit-grade" wire:model="grade">
                    @error('grade')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>


            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label for="validationServer03">Department</label>
                    <input type="text" class="form-control @error('department') is-invalid @enderror" id="edit-department" wire:model="department">
                    @error('department')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>


            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label for="photo">Photo</label>
                    <input type="file" class="form-control @error('photo') is-invalid @enderror" id="photo" wire:model="photo">
                    @error('photo')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <button class="btn btn-primary sm" type="submit" style="background:blue;">Update</button>
    </form>
    @endif
</div>