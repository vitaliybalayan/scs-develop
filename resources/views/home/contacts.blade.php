@extends('layout')

@section('title')
@lang('titles.contacts')
@endsection

@section('content')
<!-- Maps cities -->
<div class="footer_line contact_city-container">
	<iframe src="https://snazzymaps.com/embed/157391" width="100%" height="600px" style="border:none;"></iframe>
	<div class="g-content">
		<div class="container">
			
			<div class="col-4 gap-30">
				
				@foreach ($locations as $location)
					<a href="javascript:void(0)" class="contact_city-link tab_block @if($location->id == $locations->first()->id) active @endif" data-tab_block="{{ $location->id }}_address" onclick="showBlock('{{ $location->id }}_address');">{{ $location->getLocalize(app()->getLocale(), 'city') }}</a>
				@endforeach

			</div>

		</div>
	</div>
</div>
<!-- Maps cities -->

<div class="white__content">
	<div class="g-content">
		<div class="container">
			
			@foreach ($locations as $location)
			<div class="contact_city-data @if($location->id == $locations->first()->id) active @endif" data-tab="{{ $location->id }}_address">
				<p class="city__address">{{ $location->getLocalize(app()->getLocale(), 'address') }}</p>
				<p class="city_phone">{{ $location->getLocalize(app()->getLocale(), 'phone') }}</p>
				<p class="city_email">{{ $location->getLocalize(app()->getLocale(), 'email') }}</p>
			</div>
			@endforeach

		</div>
	</div>
</div>

<div class="blue__content">
	<div class="g-content">
		<div class="container">
			
			<div class="callback_form">
				
				<h1 class="head__title">@lang('titles.send us msg')</h1>

				<div class="contact_form">

					<div class="col-2 gap-30">
						<div class="form-control">
							<label for="name" class="custom_label">@lang('forms.titles.Introduce myself')</label>
							<input type="text" id="name" class="default_input" placeholder="@lang('forms.placeholders.Your name')">
						</div>
						<div class="form-control">
							<label for="email" class="custom_label">@lang('forms.titles.Email')</label>
							<input type="text" id="email" class="default_input" placeholder="example@mail.com">
						</div>
					</div>

					<div class="form-control">
						<label for="subject" class="custom_label">@lang('forms.titles.Message subject')</label>
						<input type="text" id="subject" class="default_input" placeholder="@lang('forms.placeholders.Enter a topic')">
					</div>

					<div class="form-control">
						<label for="text" class="custom_label">@lang('forms.titles.Message')</label>
						<textarea name="text" id="text" class="default_textarea" placeholder="@lang('forms.placeholders.Your message is here')"></textarea>
					</div>

					<div class="col-1_a gap-30">
						<p class="notify">@lang('forms.rules')</p>
						<button type="submit" class="text__button white text-left" data-size="middle">@lang('forms.send')</button>
					</div>

				</div>


			</div>

		</div>
	</div>
</div>

<div class="footer_line"></div>
@endsection

@section('footer')
<!-- Footer -->
<footer class="main__footer inner-page__footer">
	<div class="container">

		@include('blocks.footer_service')

		@include('blocks.footer')
	</div>
</footer>
<!-- Footer -->
@endsection