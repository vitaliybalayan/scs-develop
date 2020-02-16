@extends('layout')

@section('title')
@lang('titles.сareer')
@endsection

@section('content')

<div class="blue__content" style="padding-top: 125px;">
	<div class="g-content">
		<div class="container">
			
			<div class="callback_form">
				
				<h1 class="head__title">@lang('titles.Send us your resume')</h1>

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