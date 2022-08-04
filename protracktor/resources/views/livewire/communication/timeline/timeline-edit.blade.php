<div x-data="{
    event_selected_id: @entangle('event_selected_id'),
    sms_block: @entangle('sms_block'),
    sms_text: '',
    SMSModal: new bootstrap.Modal(document.querySelector(`#sms_modal`), {backdrop: `static`})
}"
x-init="
    @this.on('showModal', () => {
        sms_text = sms_block;
        SMSModal.show();
    });

    @this.on('hideModal', () => {
        SMSModal.hide();
    });
">
    <div class="card mb-10">
        <div class="card-body my-20 mx-10">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            <h1 class="mb-10">
                {{ $timeline->name}}
            </h1>
            <div class="container" wire:sortable="updateSort">
                @foreach ($timeline->last_version->event_versions_timeline_versions as $event_versions_timeline_version)
                <div class="draggable mb-10" wire:sortable.item="{{ $event_versions_timeline_version->id }}" wire:key="item-{{ $event_versions_timeline_version->id }}">
                    <div class="d-flex align-items-center">
                        <div class="me-4">
                            <i class="bi bi-arrows-move fs-2x" wire:sortable.handle></i>
                        </div>
                        <div class="col me-2">
                            <div class="d-flex align-items-center justify-content-between bg-secondary rounded p-3 border border-gray-900">
                                <button class="btn btn-sm me-1 p-1" type="button">
                                    <!--begin::Svg Icon | path: assets/media/icons/duotune/medicine/med005.svg-->
                                    <span class="svg-icon svg-icon-muted svg-icon-2x">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path d="M18.0129 8.60388L9.88066 16.7362L5.00359 11.8591L6.62545 10.2372L9.88066 13.4924L16.3911 6.98202L18.0129 8.60388ZM2.3005 11.445C2.3005 8.76491 3.47376 6.36089 5.31416 4.68152L8.05176 7.41912V0.517613H1.15025L3.6808 3.04817C1.42631 5.14162 0 8.12077 0 11.445C0 17.4148 4.54349 22.3149 10.3523 22.89V20.5665C5.82027 20.0029 2.3005 16.1265 2.3005 11.445ZM23.005 11.445C23.005 5.4752 18.4615 0.575126 12.6528 0V2.32351C17.1848 2.88713 20.7045 6.76348 20.7045 11.445C20.7045 14.1251 19.5313 16.5291 17.6909 18.2085L14.9533 15.4709V22.3724H21.8548L19.3242 19.8418C21.5787 17.7484 23.005 14.7692 23.005 11.445Z" fill="#181C32"/>
                                    </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </button>
                                <span class="text-primary fw-bold d-block fs-3">{{ $event_versions_timeline_version->event_version->event->name }}</span>
                                <div class="d-flex h-40px">
                                    @if ($event_versions_timeline_version->event_version->event->sms)
                                    <button class="btn btn-sm me-1 p-1" type="button" @click="$wire.showSMSModal({{ $event_versions_timeline_version->event_version->event->id }})" title="Set SMS">
                                        <i class="bi bi-phone-fill fs-2x"></i>
                                    </button>
                                    @endif
                                    @if ($event_versions_timeline_version->event_version->event->preview)
                                    <a class="btn btn-sm me-1 p-1" href="{{ route('communication.event.show', $event_versions_timeline_version->event_version->event)}}" title="Preview">
                                        <i class="bi bi-eye-fill fs-2x"></i>
                                    </a>
                                    @endif
                                    @if ($event_versions_timeline_version->event_version->event->edit)
                                    <a class="btn btn-sm me-1 p-1" href="{{ route('communication.event.edit', $event_versions_timeline_version->event_version->event)}}" title="Edit">
                                        <i class="bi bi-pencil-fill fs-2x"></i>
                                    </a>
                                    @endif
                                    @if ($event_versions_timeline_version->event_version->event->config)
                                    <div class="dropdown" style="cursor: pointer;">
                                        <button class="btn btn-sm me-1 p-1" type="button" 
                                            data-bs-toggle="dropdown" aria-expanded="false" title="Configuration">
                                            <i class="bi bi-gear-fill fs-2x"></i>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" wire:click="delete({{ $event_versions_timeline_version->id }})">Delete</a></li>
                                            <li>
                                                @if ($event_versions_timeline_version->publish)
                                                    <a class="dropdown-item" wire:click="unpublish({{ $event_versions_timeline_version->id }})">Unpublish</a>
                                                @else
                                                    <a class="dropdown-item" wire:click="publish({{ $event_versions_timeline_version->id }})">Publish</a>
                                                @endif
                                            </li>
                                            <li><a class="dropdown-item" href="#">Lock Order</a></li>
                                            <li>
                                                @if ($event_versions_timeline_version->event_version->event->sms)
                                                    <a class="dropdown-item" wire:click="removeSMS({{ $event_versions_timeline_version->event_version->event->id }})">Remove SMS</a>
                                                @else
                                                    <a class="dropdown-item" wire:click="addSMS({{ $event_versions_timeline_version->event_version->event->id }})">Add SMS</a>
                                                @endif
                                            </li>
                                        </ul>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col d-flex align-items-center justify-content-between ms-2">
                            <span>
                                Last Updated: {{ $event_versions_timeline_version->event_version->event->last_updated_at }} by {{ $event_versions_timeline_version->event_version->event->last_user_modifier->full_name }}
                                @if ($event_versions_timeline_version->event_version->event->event_version_id)
                                    (Version {{ $event_versions_timeline_version->event_version->event->active_version->name }}: {{ $event_versions_timeline_version->event_version->event->active_version->created_at->format('m/d/Y')}})
                                @endif
                            </span>
                            <a class="btn btn-dark" href="{{ route('communication.event.selectVersion', $event_versions_timeline_version->event_version->event->id)}}">Restore</a>
                        </div>
                    </div>
                </div>
                @endforeach
                <div id="create-email-button" class="d-flex p-3 ms-10">
                    <a href="{{ route('communication.event.create') }}" class="d-flex btn btn-sm me-1 p-0" type="button">
                        <i class="bi bi-plus-lg fs-2x"></i>
                        <span class="text-black fw-bold d-block fs-3">CREATE CUSTOM  EMAIL</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Modal -->
    <div class="modal fade" id="sms_modal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <form @submit.prevent="$wire.setSMS(event_selected_id, sms_text)">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title me-5">
                            Set SMS
                        </h2>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <textarea class="form-control" maxlength="140" rows="5" x-model="sms_text"></textarea>
                    </div>
                    <div class="modal-footer">
                        <div class="d-flex flex-row justify-content-end mt-5 mb-5">
                            <button type="submit" class="btn btn-secondary m-2 p-5">
                                Save Draft
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>