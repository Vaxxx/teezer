<div>
    <form wire:submit.prevent="channelCreate()">

         <div class="form-group">
             <label for="name">Channel Name</label>
             <input type="text" wire:model="name" class="form-control">
             @error('name') <span class="error">{{ $message }}</span> @enderror
         </div>
        <div class="form-group">
             <label for="slug">Channel Slug</label>
             <input type="text" wire:model="slug" class="form-control">
            @error('slug') <span class="error">{{ $message }}</span> @enderror
         </div>
        <div class="form-group">
             <label for="description">Description</label>
            <textarea wire:model="description" class="form-control">
                 @error('description') <span class="error">{{ $message }}</span> @enderror
            </textarea>
         </div>
        <div class="form-group">
            @if ($image)
                <img src="{{ $image->temporaryUrl() }}" width="300">
            @endif
            <label for="image">Add Channel Logo</label>
             <input type="file" wire:model="image" class="form-control">
            @error('image') <span class="error">{{ $message }}</span> @enderror
         </div>
        <div class="form-group">
            <input type="submit" value="Create Channel" class="btn btn-outline-primary">
        </div>
    </form>
</div>
