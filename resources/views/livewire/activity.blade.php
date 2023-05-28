<div class="container mx-auto mt-5">
    <div class="row justify-content-center mt-5">
        <div class="col-lg-6 mt-5">
            <div class="card">
                <div class="card-body">
                    <form wire:submit.prevent="store">
                        <div class="mb-3">
                            <label for="email" class="form-label">Input Activity</label>
                            <input type="text" class="form-control @error('body') is-invalid
                            @enderror" name="body" wire:model="body" id="body">
                            @error('body')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>


            <ul class="list-group mt-3" wire:sortable="updateTaskOrder">
                @foreach ($activity as $item)
                <li wire:sortable.item="{{ $item->id }}" wire:key="activity-{{ $item->id }}" class="list-group-item d-flex justify-content-between align-items-center">
                    <span wire:sortable.handle role="button">{{ $item->body }}</span>
                    <button class="btn btn-sm btn-danger text-decoration-none"
                        wire:click="delete({{ $item->id }})">delete</button>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>