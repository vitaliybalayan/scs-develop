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
								<a href="{{ route('_services.show', ['locale' => app()->getLocale(), 'slug' => $service->getLocalize(app()->getLocale(), 'slug')]) }}" class="stadrt__button green">@lang('buttons.more')</a>
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

	<section class="blue__content">
		
		<div class="parallelogram__content">
			<div class="c-container">

				<div class="col-2_top">
					<div class="parallelogram__item first">
						<div class="parallelogram-item__title">
							@if (app()->getLocale() != 'kz')
								<h4>@lang('titles.About company') {{ $about->company_name }}</h4>
								@else
								<h4>{{ $about->company_name }} @lang('titles.About company')</h4>
							@endif
						</div>
						{!! $about->getLocalize(app()->getLocale(), 'preview_content') !!}
					</div>

					<div class="parallelogram__item second">
						<div class="parallelogram-item__title"><h4>@lang('titles.Facts & Figures')</h4></div>
						<div class="parallelogram-item__content p-i__content-second">
							
							<div class="owl-carousel parallelogram__content-slider">

								@foreach($facts as $fact)
								<div class="parallelogram__content-item">
									<div class="parallelogram__content-block">
										<div class="bigger_count">
											<div class="bigger__number">{{ $fact->getLocalize(app()->getLocale(), 'title') }}</div>
											<div class="bigger__text">{{ $fact->getLocalize(app()->getLocale(), 'subtitle') }}</div>
										</div>
										<p class="stock_blue-p" data-size="large">{{ $fact->getLocalize(app()->getLocale(), 'desc') }}</p>
									</div>

									<div class="parallelogram-links">
										<a href="{{ $fact->getLocalize(app()->getLocale(), 'link') }}" class="text__button green" data-size="middle">{{ $fact->getLocalize(app()->getLocale(), 'text_link') }}</a>
									</div>
								</div>
								@endforeach

							</div>

						</div>
					</div>
				</div>				

			</div>
		</div>

		<section class="main__service-slider">
			<div class="container">
				<div class="custom-section__title">
					<h4>@lang('titles.clients')</h4>
				</div>
			</div>
			<div class="main__service-slider-container">

				@foreach($services as $service)
				<a href="{{ route('_clients.show', ['locale' => app()->getLocale(), 'slug' => $client->slug]) }}" class="main__service-slider-item" style="background: linear-gradient(0deg, rgba(0, 21, 44, 0.6), rgba(0, 21, 44, 0.6)), url('{{ $client->getImage() }}') 50% no-repeat; background-size: cover;">
					<div class="main__service-slider-content">
						<div class="main__service-slider-title">{{ $client->name }}</div>
						<div class="main__service-slider-subtitle">{{ $client->getLocalize(app()->getLocale(), 'object') }}</div>
					</div>
				</a>
				@endforeach

			</div>
			<div class="container">
				<div class="main__service-slider-footer" data-text_align="right">
					<a href="{{ route('_clients.index', app()->getLocale()) }}" class="stadrt__button green">@lang('buttons.all_object')</a>
				</div>
			</div>
		</section>


	</section>

	<section class="advantages">
		<div class="section-title__hightlight">
			<h4>@lang('titles.advantages')</h4>
		</div>
		<div class="section-advan__container">
			<div class="container">
				<div class="col-4 gap-30">

					@foreach($advantages as $advantage)
					<div class="section-advan__item">
						<div class="section-advan__item-image"><img src="{{ $advantage->getImage() }}" alt="{{ $advantage->getLocalize(app()->getLocale(), 'title') }}" style="max-height: 48px;"></div>
						<div class="section-advan__item-title">{{ $advantage->getLocalize(app()->getLocale(), 'title') }}</div>
						<div class="section-advan__item-desc">{{ $advantage->getLocalize(app()->getLocale(), 'desc') }}</div>
					</div>
					@endforeach

				</div>
			</div>
		</div>
	</section>

	<section class="fullwidht_video" style="background: linear-gradient(288.47deg, rgba(215, 237, 118, 0.9) -2.3%, rgba(195, 233, 165, 0.9) 59.17%, rgba(156, 224, 255, 0.9) 91.37%), url('{{ $about->getImage() }}') 50% no-repeat; background-size: cover;">
		<a href="{{ $about->video }}" class="popup-link_video">
			<div class="container">
				<div class="video__container inline-middle">
					<div class="video__title">@lang('titles.video')</div>
					<div class="video__icon">
						<div class="video__icon-block pulse">
							<img src="/assets/frontend/img/icons/play.svg" alt="Посмотреть">
						</div>
					</div>
				</div>
			</div>
		</a>
	</section>

	<!-- Footer MAIN Page -->
	<section class="footer__custom-section">
		<div class="g-content">
			

			<div class="footer__custom-section_first-container">
				<div class="footer__custom-section_first f__c-s_f-footer">
					<div class="owl-carousel f__c-section_first-slider">

						@foreach($articles as $article)
						<div class="f__c-section_f-slider__item">
							<div class="f__c-s_f-s__item-title">
								<h2>{{ $article->getLocalize(app()->getLocale(), 'title') }}</h2>
							</div>
							<div class="f__c-s_f-s__item-subtitle">{{ $article->created_at->format('d.m.Y') }}</div>
							<div class="f__c-s_f-s__item-content">{{ $article->getLocalize(app()->getLocale(), 'desc') }}</div>
							<div class="f__c-s_f-s__item-footer">
								<a href="{{ route('_articles.show', ['locale' => app()->getLocale(), 'slug' => $article->getLocalize(app()->getLocale(), 'slug')]) }}" class="stadrt__button green">@lang('buttons.learn_more')</a>
							</div>
						</div>
						@endforeach

					</div>
				</div>
				<div class="footer__custom-section_second">
					<div class="f__c-section_second-title">
						<h4>@lang('titles.сareer')</h4>
					</div>
					<div class="f__c-section_second-content" style="background: linear-gradient(0deg, rgba(0, 91, 150, 0.75), rgba(0, 91, 150, 0.75)), url('/assets/frontend/img/backgrounds/index-page-career-background.jpg') 50% no-repeat; background-size: cover;">
						<div class="f__c-s_s-c__title">@lang('titles.Team')</div>
						<div class="f__c-s_s-c__content">@lang('titles.Team subtitle')</div>
						<div class="f__c-s_s-c__footer"><a href="{{ route('_career.index', app()->getLocale()) }}" class="text__button white">@lang('buttons.vacancy')</a></div>
					</div>
				</div>
			</div>


		</div>
	</section>
	<!-- Footer MAIN Page -->

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