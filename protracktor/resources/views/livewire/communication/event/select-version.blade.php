<div>
    @if($status === 'OK')
        <div class="alert alert-success">
            The event version was successfully restored
        </div>
    @endif
    <div class="d-flex flex-row border border-gray-500 border-active active p-5">
        <div class="w-350px p-5">
            <div class="d-flex align-items-center justify-content-center bg-success p-3 mb-4"
                style="cursor: pointer;" wire:click="setCurrentVersion">
                <span class="text-white fw-bold d-block fs-3">Current Version</span>
            </div>
            <div class="card-body pt-2 bg-white">
                @foreach ($event->event_versions as $event_version)
                    <!--begin::Item-->
                    <label style="cursor: pointer;">
                        <div class="d-flex align-items-center mb-8">
                            <!--begin::Bullet-->
                            <span class="bullet bullet-vertical h-40px bg-success"></span>
                            <!--end::Bullet-->
                            <!--begin::Checkbox-->
                            <div class="form-check form-check-custom form-check-solid mx-5">
                                <input class="form-check-input" wire:model="event_version_id_selected" type="radio"
                                    name="event_version_id_selected"
                                    value="{{$event_version->id}}"
                                    wire:change="$emit('fadeOutPreview')">
                            </div>
                            <!--end::Checkbox-->
                            <!--begin::Description-->
                            <div class="flex-grow-1">
                                <a href="#" class="text-gray-800 text-hover-primary fw-bolder fs-6">{{ $event_version->user_creator->name }}</a>
                                <div class="d-flex flex-column">
                                    <span class="text-muted fw-bold d-block">Created {{ $event_version->created_at->diffForHumans(); }}</span>
                                    <span class="text-muted fw-bold d-block">{{ $event_version->created_at_formated }}</span>
                                    <span class="text-muted fw-bold d-block">
                                        <button id="edit-block-button" class="btn btn-link btn-sm" type="button">Edit current version</a>    
                                    </span>
                                </div>
                            </div>
                            <!--end::Description-->
                        </div>
                    </label>
                    <!--end:Item-->
                @endforeach
            </div>
        </div>
        <div class="col"
            x-data="{ shown: true }"
            x-init="
            @this.on('fadeOutPreview', () => {
                shown = false;
                Livewire.emit('selectVersion');
            });
            @this.on('fadeInPreview', () => {
                shown = true;
                window.scrollTo(0, 0);
            });
            @this.on('scrollUp', () => {
                window.scrollTo(0, 0);
            });"
            x-show="shown"
            x-transition.duration.500ms>
            @if ($event_version_selected)
            <div class="bg-primary px-10 py-12 scroll h-600px">
                <div class="d-flex justify-content-between align-items-center mb-10">
                    <div>
                        <img src="/assets/media/event-show/brand.png" alt="brand" style="width: 30em">
                    </div>
                    <div>
                        <a class="text-white" href="#">View this email in your browser</a>
                    </div>
                </div>
                <div class="bg-white rounded my-10">
                    <div class="d-flex align-items-center flex-column">
                        <div class="pt-10 position-relative">
                            @if ($event_version_selected->logo_block_image)
                                <img src="{{ $event_version_selected->logo_block_image }}" alt="home" 
                                    style="width: 5.5em;">
                            @endif
                        </div>
                        <div class="py-4 position-relative">
                            @if ($event_version_selected->title_block)
                                <h1 class="display-1">
                                    {{ $event_version_selected->title_block }}
                                </h1>
                            @endif
                        </div>
                        <div class="mb-15 position-relative">
                            @if ($event_version_selected->subtitle_block)
                                <h6 class="display-6 fw-light">
                                    {{ $event_version_selected->subtitle_block }}
                                </h6>
                            @endif
                        </div>
                    </div>
                    <div class="position-relative">
                        @if ($event_version_selected->bg_block_image)
                            <img src="{{ $event_version_selected->bg_block_image }}" alt="image-lg" class="img-fluid rounded-bottom">
                        @endif
                    </div>
                </div>
                <div>
                    @foreach ($event_version_selected->text_blocks as $event_block)
                        {!! $event_block->block_content !!}
                    @endforeach
                </div>
                <div class="bg-white rounded my-10 px-15 pt-10 pb-15">
                    <div class="d-flex justify-content-center my-15">
                        <h6 class="display-5">{{ $event_version_selected->team_intro_block }}</h6>
                    </div>
                    <div class="d-flex justify-content-around">
                        <div class="w-280px">
                            <img src="/assets/media/event-show/avatar.png" alt="avatar" class="img-fluid">
                            <div class="bg-secondary p-5">
                                <div>
                                    <span class="display-6">
                                        <span class="text-primary">Lori Joe</span> Roberts</span>
                                </div>
                                <h1 class="fw-lighter">Closing Coordinator</h1>
                                <div>
                                    <svg width="9" height="9" viewBox="0 0 9 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M2.5 7.875C2.1 7.875 1.7 7.48125 1.5 7.3125C0.5 6.525 0.2 6.24375 0 6.075V8.4375C0 8.74811 0.223906 9 0.5 9H4.5C4.77609 9 5 8.74811 5 8.4375V6.075C4.8 6.24375 4.5 6.525 3.5 7.3125C3.3 7.48125 2.9 7.875 2.5 7.875ZM4.5 4.5H0.5C0.223906 4.5 0 4.75189 0 5.0625V5.34375C0.4 5.68125 0.35 5.68125 1.8 6.8625C1.95 6.975 2.25 7.3125 2.5 7.3125C2.75 7.3125 3.05 6.975 3.2 6.91875C4.65 5.7375 4.6 5.7375 5 5.4V5.0625C5 4.75189 4.77609 4.5 4.5 4.5ZM8.5 2.8125H3.5C3.22391 2.8125 3 3.06439 3 3.375V3.9375H4.5C5.01891 3.9375 5.44672 4.38434 5.49547 4.95387L5.5 4.95V7.3125H8.5C8.77609 7.3125 9 7.06061 9 6.75V3.375C9 3.06439 8.77609 2.8125 8.5 2.8125ZM8 5.0625H7V3.9375H8V5.0625ZM2.5 3.375C2.5 2.75467 2.94859 2.25 3.5 2.25H7V0.5625C7 0.251895 6.77609 0 6.5 0H1.5C1.22391 0 1 0.251895 1 0.5625V3.9375H2.5V3.375Z" fill="black"/>
                                    </svg>
                                    <span>lj@trademarktitle.com</span>
                                </div>
                                <div>
                                    <svg width="9" height="8" viewBox="0 0 9 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M8.74334 5.65308L6.77455 4.90307C6.69045 4.87121 6.59697 4.8645 6.50821 4.88394C6.41944 4.90339 6.34018 4.94794 6.28236 5.01089L5.41047 5.95778C4.04211 5.3843 2.94091 4.40545 2.29574 3.18913L3.361 2.41412C3.43196 2.36282 3.48218 2.29236 3.50407 2.21342C3.52595 2.13448 3.51831 2.05135 3.48229 1.97661L2.63852 0.226581C2.59899 0.146019 2.52907 0.0802419 2.44083 0.0405932C2.35258 0.000944572 2.25154 -0.0100909 2.15512 0.00938974L0.326959 0.384396C0.233999 0.403478 0.151059 0.450004 0.0916777 0.516381C0.032296 0.582758 -2.14142e-05 0.665066 1.06459e-08 0.749872C1.06459e-08 4.75776 3.65456 8 8.15639 8C8.25183 8.00006 8.34447 7.97134 8.41918 7.91856C8.49389 7.86577 8.54625 7.79203 8.56773 7.70937L8.98961 6.08434C9.01138 5.99822 8.99871 5.90804 8.95376 5.82933C8.90881 5.75062 8.8344 5.68829 8.74334 5.65308Z" fill="black"/>
                                    </svg>
                                    <span>(777) 234-5678</span>
                                </div>
                            </div>
                        </div>
                        <div class="w-280px">
                            <img src="/assets/media/event-show/avatar.png" alt="avatar" class="img-fluid">
                            <div class="bg-secondary p-5">
                                <div>
                                    <span class="display-6">
                                        <span class="text-primary">Lori Joe</span> Roberts</span>
                                </div>
                                <h1 class="fw-lighter">Closing Coordinator</h1>
                                <div>
                                    <svg width="9" height="9" viewBox="0 0 9 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M2.5 7.875C2.1 7.875 1.7 7.48125 1.5 7.3125C0.5 6.525 0.2 6.24375 0 6.075V8.4375C0 8.74811 0.223906 9 0.5 9H4.5C4.77609 9 5 8.74811 5 8.4375V6.075C4.8 6.24375 4.5 6.525 3.5 7.3125C3.3 7.48125 2.9 7.875 2.5 7.875ZM4.5 4.5H0.5C0.223906 4.5 0 4.75189 0 5.0625V5.34375C0.4 5.68125 0.35 5.68125 1.8 6.8625C1.95 6.975 2.25 7.3125 2.5 7.3125C2.75 7.3125 3.05 6.975 3.2 6.91875C4.65 5.7375 4.6 5.7375 5 5.4V5.0625C5 4.75189 4.77609 4.5 4.5 4.5ZM8.5 2.8125H3.5C3.22391 2.8125 3 3.06439 3 3.375V3.9375H4.5C5.01891 3.9375 5.44672 4.38434 5.49547 4.95387L5.5 4.95V7.3125H8.5C8.77609 7.3125 9 7.06061 9 6.75V3.375C9 3.06439 8.77609 2.8125 8.5 2.8125ZM8 5.0625H7V3.9375H8V5.0625ZM2.5 3.375C2.5 2.75467 2.94859 2.25 3.5 2.25H7V0.5625C7 0.251895 6.77609 0 6.5 0H1.5C1.22391 0 1 0.251895 1 0.5625V3.9375H2.5V3.375Z" fill="black"/>
                                    </svg>
                                    <span>lj@trademarktitle.com</span>
                                </div>
                                <div>
                                    <svg width="9" height="8" viewBox="0 0 9 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M8.74334 5.65308L6.77455 4.90307C6.69045 4.87121 6.59697 4.8645 6.50821 4.88394C6.41944 4.90339 6.34018 4.94794 6.28236 5.01089L5.41047 5.95778C4.04211 5.3843 2.94091 4.40545 2.29574 3.18913L3.361 2.41412C3.43196 2.36282 3.48218 2.29236 3.50407 2.21342C3.52595 2.13448 3.51831 2.05135 3.48229 1.97661L2.63852 0.226581C2.59899 0.146019 2.52907 0.0802419 2.44083 0.0405932C2.35258 0.000944572 2.25154 -0.0100909 2.15512 0.00938974L0.326959 0.384396C0.233999 0.403478 0.151059 0.450004 0.0916777 0.516381C0.032296 0.582758 -2.14142e-05 0.665066 1.06459e-08 0.749872C1.06459e-08 4.75776 3.65456 8 8.15639 8C8.25183 8.00006 8.34447 7.97134 8.41918 7.91856C8.49389 7.86577 8.54625 7.79203 8.56773 7.70937L8.98961 6.08434C9.01138 5.99822 8.99871 5.90804 8.95376 5.82933C8.90881 5.75062 8.8344 5.68829 8.74334 5.65308Z" fill="black"/>
                                    </svg>
                                    <span>(777) 234-5678</span>
                                </div>
                            </div>
                        </div>
                        <div class="w-280px">
                            <img src="/assets/media/event-show/avatar.png" alt="avatar" class="img-fluid">
                            <div class="bg-secondary p-5">
                                <div>
                                    <span class="display-6">
                                        <span class="text-primary">Lori Joe</span> Roberts</span>
                                </div>
                                <h1 class="fw-lighter">Closing Coordinator</h1>
                                <div>
                                    <svg width="9" height="9" viewBox="0 0 9 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M2.5 7.875C2.1 7.875 1.7 7.48125 1.5 7.3125C0.5 6.525 0.2 6.24375 0 6.075V8.4375C0 8.74811 0.223906 9 0.5 9H4.5C4.77609 9 5 8.74811 5 8.4375V6.075C4.8 6.24375 4.5 6.525 3.5 7.3125C3.3 7.48125 2.9 7.875 2.5 7.875ZM4.5 4.5H0.5C0.223906 4.5 0 4.75189 0 5.0625V5.34375C0.4 5.68125 0.35 5.68125 1.8 6.8625C1.95 6.975 2.25 7.3125 2.5 7.3125C2.75 7.3125 3.05 6.975 3.2 6.91875C4.65 5.7375 4.6 5.7375 5 5.4V5.0625C5 4.75189 4.77609 4.5 4.5 4.5ZM8.5 2.8125H3.5C3.22391 2.8125 3 3.06439 3 3.375V3.9375H4.5C5.01891 3.9375 5.44672 4.38434 5.49547 4.95387L5.5 4.95V7.3125H8.5C8.77609 7.3125 9 7.06061 9 6.75V3.375C9 3.06439 8.77609 2.8125 8.5 2.8125ZM8 5.0625H7V3.9375H8V5.0625ZM2.5 3.375C2.5 2.75467 2.94859 2.25 3.5 2.25H7V0.5625C7 0.251895 6.77609 0 6.5 0H1.5C1.22391 0 1 0.251895 1 0.5625V3.9375H2.5V3.375Z" fill="black"/>
                                    </svg>
                                    <span>lj@trademarktitle.com</span>
                                </div>
                                <div>
                                    <svg width="9" height="8" viewBox="0 0 9 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M8.74334 5.65308L6.77455 4.90307C6.69045 4.87121 6.59697 4.8645 6.50821 4.88394C6.41944 4.90339 6.34018 4.94794 6.28236 5.01089L5.41047 5.95778C4.04211 5.3843 2.94091 4.40545 2.29574 3.18913L3.361 2.41412C3.43196 2.36282 3.48218 2.29236 3.50407 2.21342C3.52595 2.13448 3.51831 2.05135 3.48229 1.97661L2.63852 0.226581C2.59899 0.146019 2.52907 0.0802419 2.44083 0.0405932C2.35258 0.000944572 2.25154 -0.0100909 2.15512 0.00938974L0.326959 0.384396C0.233999 0.403478 0.151059 0.450004 0.0916777 0.516381C0.032296 0.582758 -2.14142e-05 0.665066 1.06459e-08 0.749872C1.06459e-08 4.75776 3.65456 8 8.15639 8C8.25183 8.00006 8.34447 7.97134 8.41918 7.91856C8.49389 7.86577 8.54625 7.79203 8.56773 7.70937L8.98961 6.08434C9.01138 5.99822 8.99871 5.90804 8.95376 5.82933C8.90881 5.75062 8.8344 5.68829 8.74334 5.65308Z" fill="black"/>
                                    </svg>
                                    <span>(777) 234-5678</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    <div>
                        <h2 class="text-white text-center my-10">FAST, COMFORTABLE and ACCURATE, it???s our TRADEMARK!</h2>
                        <h6 class="text-white text-center my-10 fw-light lh-lg">
                            Cyber Crime is real. Protect yourself! - Before wiring any funds or sending account information via email, call the intended recipient at a phone number you know is valid to confirm the instructions. In addition, be wary of changes to wiring instructions via email. All emails containing account numbers or statements that include disbursements for your real estate transaction will be sent securely.
                        </h6>
                        <h6 class="text-white text-center my-10 fw-light lh-lg">
                            Electronic Privacy Notice. This e-mail, and any attachments, contains information that is, or may be, covered by the Electronic Communications Privacy Act, 18 U.S.C. 2510-2521, and is also confidential and proprietary in nature. If you are not the intended recipient, please be advised that you are legally prohibited from retaining, using, copying, distributing, or otherwise disclosing this information in any manner. Instead, please reply to the sender that you have received this communication in error, and then immediately delete it. Thank you in advance for your cooperation.
                        </h6>
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    <div class="w-400px d-flex justify-content-between">
                        <a href="#">
                            <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M16 0C11.6547 0 11.1098 0.018417 9.40324 0.096283C7.70023 0.173958 6.53711 0.444453 5.51939 0.840007C4.46725 1.24883 3.57498 1.79593 2.68542 2.68541C1.79594 3.57497 1.24883 4.46725 0.840007 5.51939C0.444453 6.53711 0.173968 7.70021 0.0962931 9.40322C0.0184271 11.1098 0 11.6547 0 16C0 20.3453 0.0184271 20.8902 0.0962931 22.5968C0.173968 24.2998 0.444453 25.4629 0.840007 26.4806C1.24883 27.5328 1.79594 28.425 2.68542 29.3146C3.57498 30.2041 4.46725 30.7512 5.51939 31.1601C6.53711 31.5555 7.70023 31.826 9.40324 31.9037C11.1098 31.9816 11.6547 32 16 32C20.3453 32 20.8902 31.9816 22.5968 31.9037C24.2998 31.826 25.4629 31.5555 26.4806 31.1601C27.5327 30.7512 28.425 30.2041 29.3146 29.3146C30.2041 28.425 30.7511 27.5328 31.16 26.4806C31.5555 25.4629 31.8261 24.2998 31.9037 22.5968C31.9816 20.8902 32 20.3453 32 16C32 11.6547 31.9816 11.1098 31.9037 9.40322C31.8261 7.70021 31.5555 6.53711 31.16 5.51939C30.7511 4.46725 30.2041 3.57497 29.3146 2.68541C28.425 1.79593 27.5327 1.24883 26.4806 0.840007C25.4629 0.444453 24.2998 0.173958 22.5968 0.096283C20.8902 0.018417 20.3453 0 16 0ZM16 2.88287C20.2722 2.88287 20.7782 2.8992 22.4654 2.97618C24.0254 3.04731 24.8726 3.30796 25.4364 3.52708C26.1832 3.81733 26.7162 4.16405 27.276 4.72397C27.836 5.28383 28.1827 5.81682 28.4729 6.56366C28.692 7.12746 28.9527 7.97464 29.0238 9.53463C29.1008 11.2218 29.1171 11.7278 29.1171 16C29.1171 20.2722 29.1008 20.7782 29.0238 22.4654C28.9527 24.0254 28.692 24.8725 28.4729 25.4363C28.1827 26.1832 27.836 26.7162 27.276 27.276C26.7162 27.836 26.1832 28.1827 25.4364 28.4729C24.8726 28.692 24.0254 28.9527 22.4654 29.0238C20.7785 29.1008 20.2725 29.1171 16 29.1171C11.7275 29.1171 11.2216 29.1008 9.53463 29.0238C7.97464 28.9527 7.12746 28.692 6.56366 28.4729C5.81682 28.1827 5.28382 27.836 4.72396 27.276C4.1641 26.7162 3.81733 26.1832 3.52708 25.4363C3.30796 24.8725 3.04731 24.0254 2.97618 22.4654C2.8992 20.7782 2.88287 20.2722 2.88287 16C2.88287 11.7278 2.8992 11.2218 2.97618 9.53463C3.04731 7.97464 3.30796 7.12746 3.52708 6.56366C3.81733 5.81682 4.16404 5.28383 4.72396 4.72397C5.28382 4.16405 5.81682 3.81733 6.56366 3.52708C7.12746 3.30796 7.97464 3.04731 9.53463 2.97618C11.2218 2.8992 11.7278 2.88287 16 2.88287ZM16 7.78379C11.4623 7.78379 7.78379 11.4623 7.78379 16C7.78379 20.5377 11.4623 24.2162 16 24.2162C20.5377 24.2162 24.2162 20.5377 24.2162 16C24.2162 11.4623 20.5377 7.78379 16 7.78379ZM16 21.3333C13.0545 21.3333 10.6667 18.9455 10.6667 16C10.6667 13.0545 13.0545 10.6667 16 10.6667C18.9455 10.6667 21.3333 13.0545 21.3333 16C21.3333 18.9455 18.9455 21.3333 16 21.3333ZM26.4609 7.45918C26.4609 8.51958 25.6012 9.37915 24.5408 9.37915C23.4805 9.37915 22.6208 8.51958 22.6208 7.45918C22.6208 6.39878 23.4805 5.53914 24.5408 5.53914C25.6012 5.53914 26.4609 6.39878 26.4609 7.45918Z" fill="white"/>
                            </svg>
                        </a>
                        <a href="#">
                            <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M17.0922 32H1.76615C0.790448 32 0 31.2091 0 30.2337V1.76614C0 0.79057 0.790572 0 1.76615 0H30.234C31.2093 0 32 0.79057 32 1.76614V30.2337C32 31.2092 31.2092 32 30.234 32H22.0795V19.6078H26.239L26.8618 14.7784H22.0795V11.6951C22.0795 10.2969 22.4678 9.344 24.4729 9.344L27.0302 9.34289V5.0234C26.5879 4.96454 25.0699 4.83305 23.3037 4.83305C19.6166 4.83305 17.0922 7.08368 17.0922 11.2168V14.7784H12.9221V19.6078H17.0922V32Z" fill="white"/>
                            </svg>
                        </a>
                        <a href="#">
                            <svg width="32" height="30" viewBox="0 0 32 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M32 29.0909H24.9276V18.8643C24.9276 16.1875 23.8213 14.3601 21.3885 14.3601C19.5278 14.3601 18.4929 15.5933 18.0113 16.7817C17.8307 17.2083 17.8589 17.8025 17.8589 18.3967V29.0909H10.8523C10.8523 29.0909 10.9426 10.9755 10.8523 9.32877H17.8589V12.4303C18.2728 11.0742 20.5117 9.13876 24.0847 9.13876C28.5174 9.13876 32 11.9814 32 18.1024V29.0909ZM3.76669 6.85687H3.72155C1.46379 6.85687 0 5.34615 0 3.43122C0 1.47903 1.50705 0 3.80997 0C6.111 0 7.52587 1.47533 7.57102 3.42565C7.57102 5.34058 6.111 6.85687 3.76669 6.85687ZM0.807129 9.32877H7.04421V29.0909H0.807129V9.32877Z" fill="white"/>
                            </svg>
                        </a>
                        <a href="#">
                            <svg width="32" height="27" viewBox="0 0 32 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M32 3.15686C30.8242 3.69231 29.5583 4.05442 28.2303 4.21621C29.5864 3.38414 30.627 2.06477 31.1172 0.493083C29.8475 1.26352 28.4445 1.824 26.9456 2.12447C25.751 0.816658 24.0437 0 22.1541 0C18.531 0 15.5915 3.01432 15.5915 6.73167C15.5915 7.25942 15.6478 7.77176 15.7605 8.26484C10.3042 7.98363 5.46763 5.30637 2.22762 1.22884C1.66226 2.22655 1.33919 3.38414 1.33919 4.61683C1.33919 6.95125 2.4981 9.01216 4.25991 10.2198C3.18554 10.1871 2.17127 9.88083 1.28473 9.38004V9.46286C1.28473 12.7256 3.54804 15.4472 6.55326 16.0636C6.00293 16.2215 5.42255 16.3005 4.82338 16.3005C4.40077 16.3005 3.98755 16.26 3.58748 16.181C4.42331 18.8545 6.84627 20.8017 9.72001 20.8537C7.47361 22.6604 4.64119 23.7371 1.56647 23.7371C1.0368 23.7371 0.512766 23.7063 0 23.6446C2.90568 25.5515 6.35792 26.6667 10.0637 26.6667C22.141 26.6667 28.7431 16.4103 28.7431 7.51366C28.7431 7.2209 28.7374 6.92813 28.7262 6.64114C30.009 5.69158 31.1229 4.50705 32 3.15686Z" fill="white"/>
                            </svg>
                        </a>
                    </div>
                </div>
                <div class="d-flex justify-content-center my-5">
                    <div class="w-450px d-flex justify-content-between">
                        <h5 class="text-white text-center my-10 fw-light lh-lg">
                            Unsubscribe
                        </h5>
                        <h5 class="text-white text-center my-10 fw-light lh-lg">
                            |
                        </h5>
                        <h5 class="text-white text-center my-10 fw-light lh-lg">
                            Terms of use
                        </h5>
                        <h5 class="text-white text-center my-10 fw-light lh-lg">
                            |
                        </h5>
                        <h5 class="text-white text-center my-10 fw-light lh-lg">
                            Privacy Policy
                        </h5>
                    </div>
                </div>
                <div class="d-flex justify-content-center my-5">
                    <h5 class="text-white text-center fw-light lh-lg">
                        ???2022 Trademark Title. All rights reserved.
                    </h5>
                </div>
            </div>
            @endif
        </div>
    </div>
    <div class="d-flex flex-row justify-content-end mt-5 mb-5">
        <button class="btn btn-info m-2 p-5" wire:click="restoreVersion">
            <span wire:loading wire:target="restoreVersion" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
            Restore this Version
        </button>
    </div>
</div>