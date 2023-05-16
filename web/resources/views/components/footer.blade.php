<div class="fbd-footer mt-24 md:mt-40 bg-foreground">
    <div class="pt-8 pb-4">
        <x-frontend-container>
            <div class="flex justify-end flex-wrap gap-x-4 gap-y-1 text-white text-end">
                @foreach (__("fbd.footer.links") as $link)
                <a href="{{ $link['href'] }}" class="fbd-footer-link">{{ $link['text'] }}</a>
                @endforeach
            </div>
        </x-frontend-container>
    </div>
</div>
