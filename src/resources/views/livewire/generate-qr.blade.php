<div>
    <form action="#" wire:submit.prevent="submit">
        <div class="input-info">
            <input type="email" id="email" placeholder=" " class="form-input" name="email" wire:model.debounce.500ms="email" required />
            <label for="email">Your registration Email</label>
        </div>
        @if(session()->has('error'))
            <div class="alert alert-danger" role="alert">
                {{  session('error') }}
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