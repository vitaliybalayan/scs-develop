@extends('layout')

@section('title')
@lang('function.titles.news')
@endsection

@section('detalis')
@endsection

@section('content')

<div class="main-content blue__content clients-content">
	<div class="g-content">
		
		<div class="container">
			<h1 class="head__title">@lang('function.titles.news')</h1>
		</div>

		<div class="news-listing">
			
			@foreach($articles as $article)
			<article class="news-item">
				<div class="news-item_image" style="background: url('{{ $article->getImage() }}') 50% no-repeat; background-size: cover;"></div>
				<div class="news-item_content">
					<div class="f__c-s_f-s__item-title">
						<h2>{{ $article->getLocalize(app()->getLocale(), 'title') }}</h2>
					</div>
					<div class="f__c-s_f-s__item-subtitle">{{ $article->created_at->format('d.m.Y') }}</div>
					<div class="f__c-s_f-s__item-content">{{ $article->getLocalize(app()->getLocale(), 'desc') }}</div>
					<div class="f__c-s_f-s__item-footer"><a href="{{ route('_articles.show', ['locale' => app()->getLocale(), 'slug' => $article->getLocalize(app()->getLocale(), 'slug')]) }}" class="stadrt__button green">@lang('function.buttons.learn_more')</a></div>
				</div>
			</article>
			@endforeach

		</div>

	</div>

	<!-- Footer LINE -->
	<div class="footer_line"></div>
	<!-- Footer LINE -->
</div>

@section('footer')
<!-- Footer -->
<footer class="main__footer inner__index-page__footer">
	<div class="container">
		@include('blocks.footer')
	</div>
</footer>
<!-- Footer -->
@endsection
</html>
