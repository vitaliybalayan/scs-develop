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

				{{Form::open([
					'route'		=>	['_emails.contacts', app()->getLocale()],
					'id'		=>	'form_upload',
				])}}

				<div class="contact_form">
					<input type="hidden" name="ip" value="{{ \Request::ip() }}">
					<div class="col-2 gap-30">
						<div class="form-control">
							<label for="name" class="custom_label">@lang('forms.titles.Introduce myself')</label>
							<input type="text" id="name" class="default_input" name="value[name]" placeholder="@lang('forms.placeholders.Your name')" required>
						</div>
						<div class="form-control">
							<label for="email" class="custom_label">@lang('forms.titles.Email')</label>
							<input type="text" id="email" class="default_input" name="value[email]" placeholder="example@mail.com" required>
						</div>
					</div>
					<div class="form-control">
						<label for="subject" class="custom_label">@lang('forms.titles.Message subject')</label>
						<input type="text" id="subject" class="default_input" name="value[subject]" placeholder="@lang('forms.placeholders.Enter a topic')" required>
					</div>
					<div class="form-control">
						<label for="text" class="custom_label">@lang('forms.titles.Message')</label>
						<textarea name="value[msg]" id="text" class="default_textarea" placeholder="@lang('forms.placeholders.Your message is here')" required></textarea>
					</div>
					<div class="col-1_a gap-30">
						<p class="notify">@lang('forms.rules')</p>
						<button type="submit" class="text__button white text-left" data-size="middle">@lang('forms.send')</button>
					</div>
				</div>
				
				{{ Form::close() }}

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

@section('scripts')
<script>
$('#form_upload').submit(function(event) {
	event.preventDefault();

	$('button').attr('disabled', true);
	
	$.ajax({
		type: $(this).attr('method'),
		url: $(this).attr('action'),
		data: new FormData(this),
		contentType: false,
		cache: false,
		processData: false,
		statusCode: {
			404: function() {
				alert( "Страница не найдена." );
			}
		},
		success: function(result){
			alert('@lang('titles.email')')
			
			$('button').attr('disabled', false);
		}, 
		error: function(result) {
			$('#dd').html(result);
			$('button').attr('disabled', false);
		}
	})
});
</script>
@endsection