@if($service)
<div class="infooter-block">
	<div class="contact__infooter-block">
		<a href="{{ route('_services.show', ['locale' => app()->getLocale(), 'slug' => $service->getLocalize(app()->getLocale(), 'slug')]) }}" class="contact__infooter-block_link" style="background: linear-gradient(0deg, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url({{ $service->getImage() }}) 50% no-repeat; background-size: cover;">
			<span class="text__button white" data-size="middle">{{ $service->getLocalize(app()->getLocale(), 'title') }}</span>
		</a>
	</div>
</div>
@endif