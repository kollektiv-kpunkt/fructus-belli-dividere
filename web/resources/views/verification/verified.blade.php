<x-frontend-layout>
    <div class="min-h-screen bg-secondary flex justify-center items-center">
        <x-frontend-container size="sm" class="w-full text-center">
            <h1 class="fbd-section-title !text-5xl">
                {{__("fbd.verification.verified.title")}}
            </h1>
            <p class="mt-4">
                {{__("fbd.verification.verified.text")}}
            </p>
            <a href="/" class="fbd-button mt-4 inline-block">{{__("fbd.verification.verified.tohome")}}</a>
        </x-frontend-container>
    </div>
</x-frontend-layout>
