<div>
    {{-- Stop trying to control. --}}
    <h2>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Add a Video <i class="fas fa-film"></i>
        </button>
        {{$channel->name}}</h2>


    <!---create video modal form----->
    <div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1"
         role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

        <div class="modal-dialog" role="document">

            <div class="modal-content">

                <div class="modal-header">

                    <h5 class="modal-title" id="exampleModalLabel">Add a Video</h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                        <span aria-hidden="true close-btn">×</span>

                    </button>

                </div>
                <form x-show="!isUploading" wire:submit.prevent="store()">
                    <div class="modal-body"
                         x-data="{ isUploading: false, progress: 0 }"
                         x-on:livewire-upload-start="isUploading = true"
                         x-on:livewire-upload-finish="isUploading = false "
                         x-on:livewire-upload-error="isUploading = false"
                         x-on:livewire-upload-progress="progress = $event.detail.progress"
                    >
                        <!---progress bar-  only show if uploading--------->
                        <div class="progress my-4" x-show="isUploading">
                            <div class="progress-bar" role="progressbar" :style="`width: ${progress}%`">  </div>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlInput1">Title of Video</label>
                            <input type="text" wire:model="title" class="form-control">
                            @error('title') <span class="text-danger error">{{ $message }}</span>@enderror

                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput2">Details of the video</label>
                            <textarea class="form-control" wire:model="description"></textarea>
                            @error('description') <span class="text-danger error">{{ $message }}</span>@enderror

                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput2">Video Visibility</label>
                            <select wire:model="visibility" class="form-control">
                                <option value="">Choose an Option</option>
                                <option value="public">Public</option>
                                <option value="private">Private</option>
                                <option value="unlisted">Unlisted</option>
                            </select>
                            @error('title') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput3">Choose Video</label>
                            <input type="file" wire:model="videoFile" class="form-control">
                            @error('videoFile') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button"  class="btn btn-secondary close-btn" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary close-modal">Upload Video</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
    <!---////create video modal form----->
</div>
