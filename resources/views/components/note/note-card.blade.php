@foreach ($notes as $note)
    <div class="col-xxl-3 col-md-6 col-xl-4">
        <div class="single_note" @if ($note->appearance_type == "image")
        style="background: url({{ asset($note->image_path) }}) center/cover no-repeat" @else
            style="background:{{$note->color_name}}" @endif>
            <a class="single_note_check" href="#"><i class="far fa-check"></i></a>
            <div class="single_note_content" data-modal="modal_{{ $note->id }}">
                <h2>{{ $note->title }}</h2>
                <p>{{ $note->content }}</p>
            </div>

            <div class="ions_area">
                <ul>
                    <li>
                        <a class="modal_drop_theme"><i class="far fa-palette"></i></a>
                        <div class="theme_area">
                            <ul class="theme_color">
                                <li><a class="white active" href="#"><i class="far fa-tint-slash"></i></a>
                                </li>
                                @foreach (config("appearance.colors") as $color)
                                    <li class="appearance" data-color_name="{{ $color }}" data-appearance_type="color"
                                        data-id="{{ $note->id }}">
                                        <a class="red" style="background: {{ $color }}" href="javascript:;"></a>
                                    </li>
                                @endforeach
                            </ul>
                            <ul class="theme_img">
                                <li><a class="img_1 close active" href="#"></a></li>
                                @foreach (config("appearance.images") as $image)
                                    <li class="appearance" data-image_path="{{ $image }}" data-appearance_type="image"
                                        data-id="{{ $note->id }}">
                                        <a style="background:url({{ asset($image) }})" class="img_2" href="javascript:;"></a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a href="{{ route("notes.put-archived", $note->id) }}"><i class="far fa-box-alt"></i></a>
                    </li>
                    @php
                        $routeName = $note->deleted_at ? 'notes.forceDestroy' : 'note.destroy';
                    @endphp
                    <form action="{{ route($routeName, $note->id) }}" method="POST" class="delete-form-{{ $note->id }}">
                        @csrf
                        @method("DELETE")
                        <li>
                            <a class="modal_drop_list"><i class="far fa-ellipsis-v"></i></a>
                            <ul class="drop_list">
                                <li><a href="javascript:;" onclick="$('.delete-form-{{ $note->id }}').submit();">delete
                                        note</a></li>
                                @if($note->deleted_at)
                                    <li><a href="{{ route("notes.restore-note", $note->id) }}">restore note</a></li>
                                @endif
                            </ul>
                        </li>
                    </form>
                </ul>
                <!-- <a class="cancel_modal" href="#">cancel</a> -->
            </div>
        </div>
    </div>
    <div class="custom_modal_area" data-modal="modal_{{ $note->id }}">
        <div class="custom_modal_content" @if ($note->appearance_type == "image")
        style="background: url({{ asset($note->image_path) }}) center/cover no-repeat" @else
            style="background:{{$note->color_name}}" @endif>
            <div class="pin_icon">
                <img src="{{ asset("assets/images/pin_icons.png") }}" alt="pin" class="img-fluid">
            </div>
            <form action="{{ route("note.update", $note->id) }}" method="POST" class="update-note-{{ $note->id }}">
                @csrf
                @method("PUT")
                <input type="text" placeholder="Title" name="title" id="title" value="{{ $note->title }}">
                <textarea rows="4" placeholder="Note" id="editorjs" name="content">{!! $note->content !!}</textarea>
            </form>
            <div class="ions_area">
                <ul></ul>
                <a href="javascript:;" onclick="$('.update-note-{{ $note->id }}').submit()"
                    class="btn btn-sm btn-dark">Save</a>
            </div>
        </div>
    </div>
@endforeach