<div class="custom_modal_area">
    <div class="custom_modal_content">
        <div class="pin_icon">
            <img src="{{ asset("assets/images/pin_icons.png") }}" alt="pin" class="img-fluid">
        </div>
        <form action="{{ route("note.store") }}" method="POST" class="create-note">
            @csrf
            <input type="text" placeholder="Title" name="title" id="title">
            <textarea rows="4" placeholder="Note" id="editorjs" name="content"></textarea>
        </form>
        <div class="ions_area">
            <ul>

            </ul>
            <a href="javascript:;" onclick="$('.create-note').submit()" class="btn btn-sm btn-dark">Save</a>
        </div>
    </div>
</div>