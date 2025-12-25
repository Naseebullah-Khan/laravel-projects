<x-app-layout>
    <div class="main_content">
        <x-note.search-input :route="route('notes.archived')" />

        <x-note.create-modal />

        <div class="row">
            <x-note.note-card :notes="$notes" />
        </div>
    </div>
</x-app-layout>