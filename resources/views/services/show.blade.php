@extends('layout')

@section('title')
{{ $service->getLocalize($lang, 'title') }}
@endsection

@section('detalis')
<meta name="description" content="{{ $service->getLocalize($lang, 'desc') }}">
@endsection

@section('content')
<!-- Main content -->
<main class="inner-content">

	<section class="inner-page_banner-container">
		<div class="inner-page_banner-item" style="background: linear-gradient(0deg, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('{{$service->getImage()}}') 50% no-repeat; background-size: cover;">
			<div class="g-content">
				<div class="container">
					<div class="inner-page_banner-content">
						<div class="inner_banner-desc">
							<h1>{!! $service->getLocalize($lang, 'sub_title') !!}</h1>
						</div>
						<a href="#page" class="arrow-down_link anchor_link"></a>
					</div>
				</div>
			</div>
		</div>
	</section>

	<div class="white__content" id="page">
		<div class="g-content">
			<div class="container">
				<div class="blockquote-right">
					<blockquote>{{ $service->getLocalize($lang, 'blockquote') }}</blockquote>
				</div>
				<div class="inner-page">
					{!! $service->getLocalize($lang, 'content') !!}
				</div>

			</div>
		</div>
	</div>


</main>
<!-- Main content -->
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