@props(['id' => '', 'title' => '', 'content' => '', 'footer' => '', 'size' => 'md'])
<div class="modal fade" id="{{ $id }}" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="{{ $id }}Label" aria-hidden="true" wire:ignore.self>
    <div class="modal-dialog modal-{{ $size }}">
        <form class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="{{ $id }}Label">
                    {{ $title }}
                </h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {{ $content }}
            </div>
            <div class="modal-footer">
                {{ $footer }}
            </div>
        </form>
    </div>
</div>
