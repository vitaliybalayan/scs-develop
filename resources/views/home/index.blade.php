@extends('layout')

@section('title')
{{ $site->name }}
@endsection

@section('detalis')
<meta name="description" content="{{ $site->desc }}">
@endsection

@section('content')

<!-- Big slider -->
<section class="big__slider">
	<div class="big__slider-container">

		@foreach($services as $service)
		<div class="big__slider-item" style="background: linear-gradient(0deg, rgba(0, 21, 44, 0.6), rgba(0, 21, 44, 0.6)), url('{{ $service->getImage() }}') 50% no-repeat; background-size: cover;">
			<div class="big__slider-content">
				<div class="container">
					<div class="big__slider-content_container">
						<div class="big__slider-title">{{ $service->getLocalize(app()->getLocale(), 'title') }}</div>
						<div class="big__slider-content">{{ $service->getLocalize(app()->getLocale(), 'desc') }}</div>
						<div class="big__slider-buttons inline-middle">
							<div class="big__slider-button">
								<a href="{{ route('_services.show', ['locale' => app()->getLocale(), 'slug' => $service->getLocalize(app()->getLocale(), 'slug')]) }}" class="stadrt__button green">@lang('function.more')</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		@endforeach

	</div>
	<div class="big__slider-dots">
		<div class="big__slider-dots_container">

			@foreach($services as $service)
			<div class="big__slider-dot_item">
				<div class="big__slider-dot_line"></div>
				<div class="big__slider-dot_title">{{ $service->getLocalize(app()->getLocale(), 'sub_title') }}</div>
			</div>
			@endforeach

		</div>
	</div>
</section>
<!-- Big slider -->

<section class="fullframe__images">
	<div class="fullframe-section">
		<div class="fullframe-slider">

			@foreach($clients as $client)
				@if ($client->getLogo())
					<div class="ff-images__block">
						<a href="{{ route('_clients.show', ['locale' => app()->getLocale(), 'slug' => $client->slug]) }}"><img src="{{ $client->getLogo() }}" alt="{{ $client->name }}"></a>
					</div>
				@endif
			@endforeach

		</div>
	</div>
</section>



@endsection

@section('footer')
<!-- Footer -->
<footer class="main__footer main__index-page__footer">
	<div class="container">
		@include('blocks.footer')
	</div>
</footer>
<!-- Footer -->
@endsection