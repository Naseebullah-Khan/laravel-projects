<x-app-layout>
    <div class="main_content">
        <x-note.search-input :route="route('note.index')" />

        <div class="create_note">
            <i class="far fa-plus"></i>
        </div>

        <x-note.create-modal />

        <div class="row">
            <x-note.note-card :notes="$notes" />
        </div>
    </div>
</x-app-layout>