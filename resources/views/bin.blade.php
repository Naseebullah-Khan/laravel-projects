<x-app-layout>
    <div class="main_content">
        <x-note.search-input :route="route('notes.showBinData')" />

        <div class="row">
            <x-note.note-card :notes="$notes" />
        </div>
    </div>
</x-app-layout>