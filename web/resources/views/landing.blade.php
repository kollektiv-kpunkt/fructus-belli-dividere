<x-frontend-layout>
    <x-navbar />
    <x-frontend-container>
        <div class="fbd-pagecontents-wrapper grid grid-cols-12 md:gap-x-12 lg:gap-x-16">
            <main class="col-span-12 lg:col-span-7">

                <x-main-content />
            </main>
            <aside class="col-span-12 lg:col-span-5"></aside>
        </div>
    </x-frontend-container>


    <div style="height: 200vh; background-image: linear-gradient(white, black); margin-top: calc(var(--navheight) + 5rem)"></div>
</x-frontend-layout>