<x-layouts.public title="faqs" seotitle="faqs">

    <h2>{{ __('admin/titles.faqs') }}</h2>
    <div class="faqs-container">
        @foreach ($faqs as $faq)
            @if ($faq->locale[app()->getLocale()]['question'] && $faq->locale[app()->getLocale()]['answer'])
                <div class="faq-item">
                    <div class="faq-question">
                        {{ $faq->locale[app()->getLocale()]['question'] }}
                    </div>
                    <div class="faq-answer">
                        <p>{{ $faq->locale[app()->getLocale()]['answer'] }}</p>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
</x-layouts.public>
