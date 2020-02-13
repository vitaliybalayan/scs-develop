@extends('layout')

@section('title')
@lang('titles.clients')
@endsection

@section('detalis')
@endsection

@section('content')
<div class="main-content blue__content clients-content">
	<div class="g-content">
		
		<div class="container">
			<h1 class="head__title">@lang('titles.clients')</h1>
		</div>

		<div class="col-3 clients-grid">
			
			@foreach($clients as $client)
			<div class="clients_block grid-block" style="background: url('{{ $client->getImage()  }}') 50% no-repeat; background-size: cover;">
				<div class="client-grid_block">
					<h4 class="c-g_b__title">{{ $client->name }}</h4>
					<p class="c-g_b__desc">{{ $client->getLocalize($lang, 'object') }}</p>
					<div class="c-g_b__desc-hover">
						{!! $client->getLocalize($lang, 'preview_content') !!}
					</div>
					<div class="c-g_b__footer">
						<div class="c-g_b__footer-block">{{ $client->service->getLocalize($lang, 'title') }}</div>
						<div class="c-g_b__footer-block hover"><a href="{{ route('_clients.show', ['locale' => $lang, 'slug' => $client->slug]) }}" class="stadrt__button green">@lang('function.more')</a></div>
					</div>
				</div>
			</div>
			@endforeach

		</div>

	</div>

</div>
@endsection

@section('footer')
<!-- Footer -->
<footer class="main__footer inner__index-page__footer">
	<div class="container">
		@include('blocks.footer')
	</div>
</footer>
<!-- Footer -->
@endsection