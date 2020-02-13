@extends('layout')

@section('title')
{{ $article->getLocalize(app()->getLocale(), 'title') }}
@endsection

@section('detalis')
@endsection

@section('content')
<!-- Main content -->
<main class="inner-content">

	<section class="inner-page_banner-container">
		<div class="inner-page_banner-item" style="background: linear-gradient(0deg, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('{{$article->getImage()}}') 50% no-repeat; background-size: cover;">
			<div class="g-content">
				<div class="container">
					<div class="inner-page_banner-content">
						<div class="inner_banner-desc">
							<h1>{{ $article->getLocalize(app()->getLocale(), 'title') }}</h1>
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
				<div class="inner-page">
					{!! $article->getLocalize(app()->getLocale(), 'content') !!}
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

		<div class="infooter-block">
			
			<div class="contact__infooter-block">
				<a href="{{ route('_articles.show', ['locale' => app()->getLocale(), 'slug' => $article_next->getLocalize(app()->getLocale(), 'slug')]) }}" onclick="return false;" class="contact__infooter-block_link" style="background: linear-gradient(0deg, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('{{ $article_next->getImage() }}') 50% no-repeat; background-size: cover;">
					<span class="text__button white" data-size="middle">{{ $article_next->getLocalize(app()->getLocale(), 'title') }}</span>
				</a>
			</div>

		</div>

		@include('blocks.footer')
	</div>
</footer>
<!-- Footer -->
@endsection