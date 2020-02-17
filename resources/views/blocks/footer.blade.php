<div class="col-2">
	<div class="footer__block">

		<div class="footer__head inline-middle">
			<div class="footer__logotype">
				<img src="/assets/frontend/img/SCS-footer-logo.svg" alt="SCS">
			</div>
			<div class="footer__phone inline-middle"><a href="tel:{{ str_replace(' ', '', $about->phone) }}">{{ substr($about->phone, 0, 10) }} <span class="hightlight">{{ substr($about->phone, 10) }}</span><img src="/assets/frontend/img/icons/call-white.svg" alt="Телефон"></a></div>
		</div>

		<div class="footer__content">
			<div class="col-2 gap-50">
				<div class="footer_copyrite">
					© 2019–{{ Carbon\Carbon::today()->year }} <br> {{ $about->company_name }} 
				</div>
				<div class="footer__address">
					
					<div class="footer__address-head inline-middle">
						@foreach($locations as $location)
						<a href="javascript:void(0)" class="tab_block @if($location->id == $locations->first()->id) active @endif" data-tab_block="{{ $location->id }}_address" onclick="showBlock('{{ $location->id }}_address');">{{ $location->getLocalize(app()->getLocale(), 'city') }}</a>
						@endforeach
					</div>
					
					@foreach($locations as $location)
					<div class="footer__address-content @if($location->id == $locations->first()->id) active @endif" id="f__a-content" data-tab="{{ $location->id }}_address">{{ $location->getLocalize(app()->getLocale(), 'address') }}</div>
					@endforeach

				</div>

			</div>
			<div class="footer__foo">
				<div class="col-2">
					<span class="custom_tooltip-container" data-custom_tooltip="develop">
						<div class="custom_tooltip-item" data-custom_tooltip_item="develop">
							<div class="col-2 gap-30">
								<div>
									<h5>@lang('titles.development')</h5>
									<span>PARALLAX PRO</span>
									<a href="https://parallax.pro/" target="_blank">https://parallax.pro/</a>
								</div>
								<div>
									<h5>@lang('titles.design')</h5>
									<span>a.shine</span>
									<a href="tel:+77779126669">+7 (777) 912-66-69</a>
								</div>
							</div>
						</div>
						<span class="footer__link">@lang('titles.developers')</span>
					</span>
					<a href="#" class="footer__link">{{ $about->email }}</a>
				</div>
			</div>
		</div>

	</div>
	<div class="footer__block">
		<div class="footer__block-logotypes">
			<div class="inline-middle">
				@foreach($certificates as $certificate)
				<div class="footer__block-logo_item">
					<a href="{{ $certificate->getImage() }}" class="popup-link_image">
						<img src="{{ $certificate->getIcon() }}" alt="{{ $certificate->title }}">
					</a>
				</div>
				@endforeach
			</div>
		</div>
	</div>
</div>