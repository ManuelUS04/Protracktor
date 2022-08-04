@extends('layouts.theme.app')
@section('mainSection', 'Orders')
@section('pageTitle', 'Dashboard - Orders')
@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div>
        <div class="">
            <div class="">
                <div class="">
                    <h2 class="">
                        Welcome
                    </h2>
                    <div class="row">
                        <div class="col-12 col-lg-1 p-2">
                            <label for="">Buller</label>
                            <input type="radio">
                        </div>
                        <div class="col-12 col-lg-1 p-2">
                            <label for="">Seller</label>
                            <input type="radio">
                        </div>
                    </div>
                    <button id="save-draft" class="btn" type="button">
                        <i class="bi bi-save-fill fs-2x"></i>
                        Save Draft
                    </button>
                    <button class="btn" type="button">
                        <i class="bi bi-eye-fill fs-2x"></i>
                        Preview Email
                    </button>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="d-flex gap-2 my-2">
                        <a class="btn btn-link w-30px">To:</a>
                        <input type="text" class="form-control" placeholder="Name" value="Jim Smith">
                    </div>
                    <div class="d-flex gap-2 my-2">
                        <a class="btn btn-link w-30px">CC:</a>
                        <input type="text" class="form-control" placeholder="Name" value="Carla Jackson, Tom Barnes, Jill Anderson, Barb Watson">
                    </div>
                    <div>
                        <input type="text" class="form-control" placeholder="Name" value="Welcome -1335 Main Street Woodbury">
                    </div>
                    <div>
                        <button class="btn btn-link mx-2" type="button">
                            <i class="bi bi-paperclip fs-2x"></i>
                            Document title here
                        </button>
                        <button class="btn btn-link mx-2" type="button">
                            Another Document here
                        </button>
                    </div>
                    <div>
                        <textarea id="editor-text">
                        <p>
                            Enter additional information if necessary. It will appear above the message seen below.
                        </p>
                    </textarea>
                    </div>
                    <div class="position-relative">
                        <div id="edit-container" class="d-flex block-action-container flex-column p-6">
                            <div class="d-flex align-items-center justify-content-center flex-column-fluid">
                                <button id="btn-edit-email" class="btn btn-sm me-1 p-1 fs-2hx" type="button">
                                    <i class="bi bi-pencil-square fs-2x"></i>
                                    Edit
                                </button>
                            </div>
                        </div>
                        <div id="email-container" class="border border-gray-500 border-active active opacity-25">
                            <div class="card card-flush shadow-sm m-5 h-300px">
                                <!--<div class="card-body" style="background-image:url('/images/background.png')">-->
                                <div class="card-body">
                                    <div class="border border-gray-500 border-active active w-200px h-150px 
                                    d-flex align-items-center justify-content-center bg-secondary">
                                        <h1>
                                            Insert Logo
                                            <button class="btn btn-sm me-1 p-1" type="button">
                                                <i class="bi bi-pencil-fill fs-2x"></i>
                                            </button>
                                        </h1>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-center block-name-container">
                                        <h1>
                                            Image Background
                                            <button class="btn btn-sm me-1 p-1" type="button">
                                                <i class="bi bi-pencil-fill fs-2x"></i>
                                            </button>
                                        </h1>
                                    </div>
                                </div>
                            </div>
                            <div data-component="block" class="card card-flush shadow-sm m-5">
                                <div class="card-body">
                                    <div class="d-flex block-action-container flex-column p-6">
                                        <div class="d-flex align-items-center justify-content-center flex-column-fluid">
                                            <h1>Block 1</h1>
                                        </div>
                                    </div>
                                    <div data-component="content" id="block1">
                                        @if(isset($event))
                                        <div class="bg-white rounded my-10">
                                            <div class="d-flex align-items-center flex-column">
                                                <div class="pt-10 position-relative">
                                                    @if ($event->active_version->logo_block_image)
                                                    <img src="{{ $event->active_version->logo_block_image }}" alt="home">
                                                    @endif
                                                </div>
                                                <div class="py-4 position-relative">
                                                    @if ($event->active_version->title_block)
                                                    <h1 class="display-1">
                                                        {{ $event->active_version->title_block }}
                                                    </h1>
                                                    @endif
                                                </div>
                                                <div class="mb-15 position-relative">
                                                    @if ($event->active_version->subtitle_block)
                                                    <h6 class="display-6 fw-light">
                                                        {{ $event->active_version->subtitle_block }}
                                                    </h6>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="position-relative">
                                                @if ($event->active_version->bg_block_image)
                                                <img src="{{ $event->active_version->bg_block_image }}" alt="image-lg" class="img-fluid rounded-bottom">
                                                @endif
                                            </div>
                                        </div>
                                        <div>
                                            @foreach ($event->active_version->text_blocks as $event_block)
                                            {!! $event_block->block_content !!}
                                            @endforeach
                                        </div>
                                        @else
                                        <div class="pt-10 position-relative">
                                            <h1>no existe</h1>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div data-component="block" class="card card-flush shadow-sm m-5">
                                <div class="card-body">
                                    <div class="d-flex block-action-container flex-column p-6">
                                        <div class="d-flex align-items-center justify-content-center flex-column-fluid">
                                            <h1>Block 2</h1>
                                        </div>
                                    </div>
                                    <div data-component="content" id="block2">

                                    </div>
                                </div>
                            </div>
                            <div data-component="block" class="card card-flush shadow-sm m-5">
                                <div class="card-body">
                                    <div class="d-flex block-action-container flex-column p-6">
                                        <div class="d-flex align-items-center justify-content-center flex-column-fluid">
                                            <h1>Block 3</h1>
                                        </div>
                                    </div>
                                    <div data-component="content" id="block3">

                                    </div>
                                </div>
                            </div>
                            <div class="card card-flush shadow-sm m-5 d-flex w-250px">
                                <div class="card-body">
                                    <p>Thank you</p>
                                    <br>
                                    <p>&#60;Contact Name&#62;</p>
                                    <p>&#60;Business Name&#62;</p>
                                    <p>&#60;Business Address&#62;</p>
                                    <p>&#60;City&#62; &#60;St&#62; &#60;Zip&#62;</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="d-flex flex-row justify-content-end mt-5 mb-5">
                        <a href="{{route("document.mail",$event)}}">
                            <button class="btn btn-info m-2 p-5">
                                Send
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
@endsection