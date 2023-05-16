<div class="fbd-faq mt-12 md:mt-20 py-8 md:py-12">
    <h2 class="fbd-section-title">{{__("fbd.faq.title")}}</h2>
    <div class="fbd-faq__questions">
        @foreach (__("fbd.faq.questions") as $question)
        <x-question :question="$question['question']" :answer="$question['answer']" ></x-question>
        @endforeach
    </div>
    <div class="fbd-ribbon"></div>
</div>
