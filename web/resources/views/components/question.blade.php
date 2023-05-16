<div class="fbd-question">
	<div class="fbd-question py-8 border-b border-b-accent">
		<span class="fbd-question__title flex justify-between text-lg items-center cursor-pointer text-accent">
			<p class="pr-8 text-lg md:text-xl">{{$question}}</p>
			<i class="icofont-rounded-down"></i>
		</span>
		<div class="fbd-question__answer max-h-0 overflow-hidden">
			<div class="fbd-question__answerinner pt-4">
				@foreach ($answer as $paragraph)
                    <p class="fbd-paragraph">{!! $paragraph !!}</p>
                @endforeach
			</div>
		</div>
	</div>
</div>
