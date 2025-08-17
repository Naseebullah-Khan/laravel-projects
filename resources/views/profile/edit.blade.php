<x-app-layout>
    <section class="wsus__product mt_145 pb_100">
        <div class="container">
            @include('profile.partials.update-profile-information-form')
            <br />
            <br />
            @include('profile.partials.update-password-form')
        </div>
    </section>
</x-app-layout>