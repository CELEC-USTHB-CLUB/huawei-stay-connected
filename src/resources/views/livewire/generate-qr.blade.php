<div>
    <form action="#" wire:submit.prevent="submit">
        <div class="input-info">
            <input type="email" id="email" placeholder=" " class="form-input" name="email" wire:model.debounce.500ms="email" required />
            <label for="email">Your registration Email</label>
        </div>
        @error('email')
        <div class="alert alert-danger" role="alert">
            {{$message}}
        </div>
        @enderror
        @if($userErr)
        <div class="alert alert-danger" role="alert">
            {{$userErr}}
        </div>
        @endif
        <div class="submit-btn">
            <button type="submit" value="Submit">
                <h5>
                    Generate
                    <div wire:loading wire:target="submit">
                        <div class="spinner-border text-danger" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </div>
                </h5>
            </button>

        </div>
    </form>
</div>