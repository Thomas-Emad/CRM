@props([
    'title' => '',
    'header' => '',
    'tabsHeader' => '',
    'tabsContent' => '',
    'modals' => '',
    'activity' => null,
    'notes' => null,
])
<div x-data="{ id: null, title: null }">
    <x-page-header title="{{ $title }}">
        <li class="breadcrumb-item"><a href="{{ route('home') }}" wire:navigate>Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('home') }}" wire:navigate>CRM</a></li>
        {{ $header }}
    </x-page-header>

    <div class="container-fluid " style="margin-top: 10rem;">
        <!-- Start::row-1 -->
        <div class="row content-top">
            <div class="col-xxl-9 col-xl-12">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card custom-card">
                            <div class="card-body p-0">
                                <div class="p-3 border-bottom border-block-end-dashed">
                                    <div>
                                        <ul class="nav nav-pills nav-justified tab-style-5 d-sm-flex d-block"
                                            id="pills-tab" role="tablist">
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link border " id="pills-customer-tab"
                                                    data-bs-toggle="pill" data-bs-target="#customer-tab-pane"
                                                    type="button" role="tab" aria-controls="customer-tab-pane"
                                                    aria-selected="false">Customer</button>
                                            </li>
                                            {{ $tabsHeader }}
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link border" id="notes-tab-tab" data-bs-toggle="pill"
                                                    data-bs-target="#notes-tab-pane" type="button" role="tab"
                                                    aria-controls="notes-tab-pane" aria-selected="false"
                                                    tabindex="-1">Notes</button>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="p-4">
                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane fade p-0 border-0" id="customer-tab-pane" role="tabpanel"
                                            aria-labelledby="customer-tab-pane" tabindex="0">
                                            <h6 class="fw-semibold">customer</h6>
                                            <div class="table-responsive mb-3 text-muted">
                                                <table class="table text-nowrap table-borderless">
                                                    <tbody>
                                                        <tr class="product-list">
                                                            <td class="text-muted">
                                                                <div class="fw-semibold">
                                                                    Customer Name
                                                                </div>
                                                            </td>
                                                            <td class="text-muted">
                                                                :
                                                            </td>
                                                            <td class="text-muted">{{ $activity->lead->name }}</td>
                                                        </tr>
                                                        <tr class="product-list">
                                                            <td class="text-muted">
                                                                <div class="fw-semibold">
                                                                    Address
                                                                </div>
                                                            </td>
                                                            <td class="text-muted">
                                                                :
                                                            </td>
                                                            <td class="text-muted">Itumay</td>
                                                        </tr>
                                                        <tr class="product-list">
                                                            <td class="text-muted">
                                                                <div class="fw-semibold">
                                                                    Email
                                                                </div>
                                                            </td>
                                                            <td class="text-muted">
                                                                :
                                                            </td>
                                                            <td class="text-muted">03 September 1990</td>
                                                        </tr>
                                                        <tr class="product-list">
                                                            <td class="text-muted">
                                                                <div class="fw-semibold">
                                                                    Phone
                                                                </div>
                                                            </td>
                                                            <td class="text-muted">
                                                                :
                                                            </td>
                                                            <td class="text-muted">Female</td>
                                                        </tr>
                                                        <tr class="product-list">
                                                            <td class="text-muted">
                                                                <div class="fw-semibold">
                                                                    Status
                                                                </div>
                                                            </td>
                                                            <td class="text-muted">
                                                                :
                                                            </td>
                                                            <td class="text-muted">Telugu ,Hindi , English</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        {{ $tabsContent }}
                                        <div class="tab-pane fade p-0 border-0" id="notes-tab-pane" role="tabpanel"
                                            aria-labelledby="followers-tab-pane" tabindex="0">
                                            <div class="card custom-card">
                                                <div class="card-body">
                                                    <div class="d-sm-flex align-items-center lh-1">
                                                        <div class="me-3">
                                                            <span class="avatar avatar-md avatar-rounded">
                                                                <span
                                                                    class="bg-secondary w-100 h-100 rounded-circle"></span>
                                                            </span>
                                                        </div>
                                                        <div class="flex-fill me-sm-2 mt-1 mt-sm-0">
                                                            <div class="input-group ">
                                                                <x-textarea-form id="content" name="Content"
                                                                    :withoutLabel="true" wireModel="noteForm.content"
                                                                    placeholder="Please Write your Notes" />
                                                                <div>
                                                                    <button class="btn btn-primary ms-2" type="button"
                                                                        wire:click="storeNote">Store</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @forelse ($notes as $item)
                                                <div class="card custom-card p-2">
                                                    <div class="me-3 d-flex justify-content-between">
                                                        <div class="me-3 wd-200 d-flex gap-3 align-items-center">
                                                            <span class="avatar avatar-md avatar-rounded">
                                                                <span
                                                                    class="bg-secondary w-100 h-100 rounded-circle"></span>
                                                            </span>
                                                            <div>
                                                                <h3>{{ $item->creator->name }}</h3>
                                                                <span>{{ $item->created_at->since() }}</span>
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <button type="button"
                                                                class="btn btn-outline-danger btn-wave"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#DeleteNoteModal"
                                                                x-on:click="noteId = {{ $item->id }}">
                                                                <i class="ti ti-trash"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <div class="flex-fill mt-1">
                                                        <x-textarea-form id="content" name="Content"
                                                            :withoutLabel="true" :disabled="true" :value="$item->content" />
                                                    </div>
                                                </div>
                                            @empty
                                                <p class="text-muted text-center">There are no Notes Here</p>
                                            @endforelse
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-3">
                {{ $sidebar }}
            </div>
        </div>
        <!--End::row-1 -->
    </div>

    <!-- Start::DeleteActivityModal -->
    <x-modal id="DeleteActivityModal">
        <x-slot:title>
            <i class="ti ti-trash text-danger me-1"></i>
            <span>
                Are you sure you want to delete this Activity?!
            </span>
        </x-slot:title>
        <x-slot:content>
            <div>
                <label for="activity-name" class="form-label">Activity</label>
                <input type="text" id="activity-title" class="form-control disabled" x-model="title" disabled
                    placeholder="Enter activity Name">
            </div>
        </x-slot:content>
        <x-slot:footer>
            <button type="button" class="btn btn-success" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-danger" wire:click="deleteActivity(id)">Delete</button>
        </x-slot:footer>
    </x-modal>
    <!-- End::DeleteActivityModal -->

    {{ $modals }}
</div>
