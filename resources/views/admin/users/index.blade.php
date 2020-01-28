@extends('admin.layout')

@section('title')
Пользователи
@endsection

@section('vendor_styles')
<link href="{{ env('APP_URL') }}/assets/admin/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
@endsection

@section('content')
<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

	<!-- begin:: Content Head -->
	<div class="kt-subheader  kt-grid__item" id="kt_subheader">
		<div class="kt-container  kt-container--fluid ">
			<div class="kt-subheader__main">
				<h3 class="kt-subheader__title">Пользователи</h3>
				<span class="kt-subheader__separator kt-subheader__separator--v"></span>
				<span class="kt-subheader__desc">{{ $users->count() }} пользователей</span>
				<a href="{{ route('users.create') }}" class="btn btn-label-warning btn-bold btn-sm btn-icon-h kt-margin-l-10">
					Добавить пользователя
				</a>
				<div class="kt-input-icon kt-input-icon--right kt-subheader__search kt-hidden">
					<input type="text" class="form-control" placeholder="Search order..." id="generalSearch">
					<span class="kt-input-icon__icon kt-input-icon__icon--right">
						<span><i class="flaticon2-search-1"></i></span>
					</span>
				</div>
			</div>
			<div class="kt-subheader__toolbar">
				<div class="kt-subheader__wrapper">
					<div class="dropdown dropdown-inline" data-toggle-="kt-tooltip" title="Quick actions" data-placement="left">
						<a href="#" class="btn btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon kt-svg-icon--success kt-svg-icon--md">
								<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
									<polygon points="0 0 24 0 24 24 0 24" />
									<path d="M5.85714286,2 L13.7364114,2 C14.0910962,2 14.4343066,2.12568431 14.7051108,2.35473959 L19.4686994,6.3839416 C19.8056532,6.66894833 20,7.08787823 20,7.52920201 L20,20.0833333 C20,21.8738751 19.9795521,22 18.1428571,22 L5.85714286,22 C4.02044787,22 4,21.8738751 4,20.0833333 L4,3.91666667 C4,2.12612489 4.02044787,2 5.85714286,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
									<path d="M11,14 L9,14 C8.44771525,14 8,13.5522847 8,13 C8,12.4477153 8.44771525,12 9,12 L11,12 L11,10 C11,9.44771525 11.4477153,9 12,9 C12.5522847,9 13,9.44771525 13,10 L13,12 L15,12 C15.5522847,12 16,12.4477153 16,13 C16,13.5522847 15.5522847,14 15,14 L13,14 L13,16 C13,16.5522847 12.5522847,17 12,17 C11.4477153,17 11,16.5522847 11,16 L11,14 Z" fill="#000000" />
								</g>
							</svg>

							<!--<i class="flaticon2-plus"></i>-->
						</a>
						<div class="dropdown-menu dropdown-menu-fit dropdown-menu-md dropdown-menu-right">

							<!--begin::Nav-->
							<ul class="kt-nav">
								<li class="kt-nav__head">
									Add anything or jump to:
									<i class="flaticon2-information" data-toggle="kt-tooltip" data-placement="right" title="Click to learn more..."></i>
								</li>
								<li class="kt-nav__separator"></li>
								<li class="kt-nav__item">
									<a href="#" class="kt-nav__link">
										<i class="kt-nav__link-icon flaticon2-drop"></i>
										<span class="kt-nav__link-text">Order</span>
									</a>
								</li>
								<li class="kt-nav__item">
									<a href="#" class="kt-nav__link">
										<i class="kt-nav__link-icon flaticon2-calendar-8"></i>
										<span class="kt-nav__link-text">Ticket</span>
									</a>
								</li>
								<li class="kt-nav__item">
									<a href="#" class="kt-nav__link">
										<i class="kt-nav__link-icon flaticon2-telegram-logo"></i>
										<span class="kt-nav__link-text">Goal</span>
									</a>
								</li>
								<li class="kt-nav__item">
									<a href="#" class="kt-nav__link">
										<i class="kt-nav__link-icon flaticon2-new-email"></i>
										<span class="kt-nav__link-text">Support Case</span>
										<span class="kt-nav__link-badge">
											<span class="kt-badge kt-badge--brand kt-badge--rounded">5</span>
										</span>
									</a>
								</li>
								<li class="kt-nav__separator"></li>
								<li class="kt-nav__foot">
									<a class="btn btn-label-brand btn-bold btn-sm" href="#">Upgrade plan</a>
									<a class="btn btn-clean btn-bold btn-sm kt-hidden" href="#" data-toggle="kt-tooltip" data-placement="right" title="Click to learn more...">Learn more</a>
								</li>
							</ul>

							<!--end::Nav-->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- end:: Content Head -->

	<!-- begin:: Content -->
	<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">

		@if(session('status'))
			<div class="alert alert-danger fade show" role="alert">
				<div class="alert-icon"><i class="flaticon-warning"></i></div>
				<div class="alert-text">{{session('status')}}</div>
				<div class="alert-close">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true"><i class="la la-close"></i></span>
					</button>
				</div>
			</div>
        @endif

		<div class="kt-portlet kt-portlet--mobile">
			<div class="kt-portlet__head kt-portlet__head--lg">
				<div class="kt-portlet__head-label">
					<span class="kt-portlet__head-icon">
						<i class="kt-font-brand flaticon2-line-chart"></i>
					</span>
					<h3 class="kt-portlet__head-title">
						Список пользователей
					</h3>
				</div>
				<div class="kt-portlet__head-toolbar">
					<div class="kt-portlet__head-wrapper">
						<div class="kt-portlet__head-actions">
							<a href="{{ route('users.create') }}" class="btn btn-brand btn-elevate btn-icon-sm">
								<i class="la la-plus"></i>
								Новый пользователь
							</a>
						</div>
					</div>
				</div>
			</div>
			<div class="kt-portlet__body">

				<!--begin: Datatable -->
				<table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_users">
					<thead>
						<tr>
							<th>ID</th>
							<th>Изображение</th>
							<th>Имя</th>
							<th>Фамлиия</th>
							<th>Email</th>
							<th>Дата регистрации</th>
							<th class="user_status">Статус</th>
							<th>Действие</th>
						</tr>
					</thead>
					<tbody>
						@foreach($users as $user)
						<tr>
							<td>{{ $user->id }}</td>
							<td>
								<a href="{{ route('users.show', $user->id) }}" class="kt-media">
									<img src="{{ $user->getImage() }}" alt="{{ $user->first_name }} {{ $user->last_name }}">
								</a>
							</td>
							<td>{{ $user->first_name }}</td>
							<td>{{ $user->last_name }}</td>
							<td>{{ $user->email }}</td>
							<td>{{ $user->created_at->format('d.m.Y') }}</td>
							<td>{{ $user->admin }}</td>
							<td nowrap>
								<a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Просмотреть"><i class="la la-edit"></i></a>
								
								<span class="dropdown">
									<a href="#" class="btn btn-sm btn-clean btn-icon btn-icon-md" data-toggle="dropdown" aria-expanded="true"><i class="la la-ellipsis-h"></i></a>
									<div class="dropdown-menu dropdown-menu-right">
										<a class="dropdown-item" href="{{ route('users.show', $user->id) }}"><i class="la la-external-link"></i> Просмотреть</a>
										<a class="dropdown-item" href="#" data-toggle="modal" data-target="#user_destroy-{{$user->id}}"><i class="la la-trash"></i> Удалить</a>
									</div>
								</span>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>

				<!--end: Datatable -->
			</div>
		</div>
	</div>

	<!-- end:: Content -->
</div>

@foreach($users as $user)
<div class="modal fade" id="user_destroy-{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">Подтвердить действие</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				</button>
			</div>
			<div class="modal-body">
				<p>Вы действительно хотите удалить аккаунт <span class="kt-badge kt-badge--dark  kt-badge--inline kt-badge--pill">{{ $user->first_name }} {{ $user->last_name }}</span>?</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Отменить</button>

				{{Form::open(['route'=>['users.destroy', $user->id], 'method'=>'delete'])}}
				<button type="submit" class="btn btn-primary">Удалить аккаунт</button>
                {{Form::close()}}
			</div>
		</div>
	</div>
</div>
@endforeach

@endsection

@section('vendor_scripts')
<script src="{{ env('APP_URL') }}/assets/admin/plugins/custom/datatables/datatables.bundle.js" type="text/javascript"></script>
<script src="{{ env('APP_URL') }}/assets/admin/js/pages/crud/datatables/basic/paginations.js" type="text/javascript"></script>
@endsection