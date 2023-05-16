<div class="fbd-footer mt-25 md:mt-40 bg-foreground">
    <div class="pt-8 pb-4">
        <x-frontend-container>
            <div class="flex justify-end flex-col md:flex-row gap-x-4 gap-y-2 text-white">
                @foreach (__("fbd.footer.links") as $link)
                <a href="{{ $link['href'] }}" class="fbd-footer-link">{{ $link['text'] }}</a>
                @endforeach
            </div>
        </x-frontend-container>
    </div>
</div>
