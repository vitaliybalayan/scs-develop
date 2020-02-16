@extends('admin.layout')

@section('title')
Факты
@endsection

@section('vendor_styles')
<link href="/assets/admin/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
@endsection

@section('content')
<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

	<!-- begin:: Content Head -->
	<div class="kt-subheader  kt-grid__item" id="kt_subheader">
		<div class="kt-container  kt-container--fluid ">
			<div class="kt-subheader__main">
				<h3 class="kt-subheader__title">Факты</h3>
				<span class="kt-subheader__separator kt-subheader__separator--v"></span>
				<span class="kt-subheader__desc">{{ $facts->count() }} языков</span>
				<a href="{{ route('facts.create') }}" class="btn btn-label-warning btn-bold btn-sm btn-icon-h kt-margin-l-10">
					Добавить факт
				</a>
				<div class="kt-input-icon kt-input-icon--right kt-subheader__search kt-hidden">
					<input type="text" class="form-control" placeholder="Search order..." id="generalSearch">
					<span class="kt-input-icon__icon kt-input-icon__icon--right">
						<span><i class="flaticon2-search-1"></i></span>
					</span>
				</div>
			</div>
			@include('admin.blocks.quick_jump')
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
						Список фактов
					</h3>
				</div>
				<div class="kt-portlet__head-toolbar">
					<div class="kt-portlet__head-wrapper">
						<div class="kt-portlet__head-actions">
							<a href="{{ route('facts.create') }}" class="btn btn-brand btn-elevate btn-icon-sm">
								<i class="la la-plus"></i>
								Добавить факт
							</a>
						</div>
					</div>
				</div>
			</div>
			<div class="kt-portlet__body">

				<!--begin: Datatable -->
				<table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_menu">
					<thead>
						<tr>
							<th>ID</th>
							<th>Заголовок</th>
							<th>Подзаголовок</th>
							<th>Описание</th>
							<th>Позиция</th>
							<th class="is_public">Отоброжение</th>
							<th>Действие</th>
						</tr>
					</thead>
					<tbody>
						@foreach($facts as $fact)
						<tr>
							<td>{{ $fact->id }}</td>
							<td>{{ $fact->getLocalize($default_lang, 'title') }}</td>
							<td>{{ $fact->getLocalize($default_lang, 'subtitle') }}</td>
							<td>{{ $fact->getLocalize($default_lang, 'desc') }}</td>
							<td>{{ $fact->position }}</td>
							<td>{{ $fact->is_public }}</td>
							<td nowrap>
								<a href="{{ route('facts.edit', $fact->id) }}" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Редактировать"><i class="la la-edit"></i></a>
								
								<span class="dropdown">
									<a href="#" class="btn btn-sm btn-clean btn-icon btn-icon-md" data-toggle="dropdown" aria-expanded="true"><i class="la la-ellipsis-h"></i></a>
									<div class="dropdown-menu dropdown-menu-right">
										<a class="dropdown-item" href="#" data-toggle="modal" data-target="#menu_destroy-{{$fact->id}}"><i class="la la-trash"></i> Удалить</a>
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

@foreach($facts as $fact)
<div class="modal fade" id="menu_destroy-{{$fact->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">Подтвердить действие</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				</button>
			</div>
			<div class="modal-body">
				<p>Вы действительно хотите удалить запись <span class="kt-badge kt-badge--dark  kt-badge--inline kt-badge--pill">{{ $fact->getLocalize($default_lang, 'desc') }}</span>?</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Отменить</button>

				{{Form::open(['route'=>['facts.destroy', $fact->id], 'method'=>'delete'])}}
				<button type="submit" class="btn btn-primary">Удалить запись</button>
                {{Form::close()}}
			</div>
		</div>
	</div>
</div>
@endforeach

@endsection

@section('vendor_scripts')
<script src="/assets/admin/plugins/custom/datatables/datatables.bundle.js" type="text/javascript"></script>
<script src="/assets/admin/js/pages/crud/datatables/basic/paginations.js" type="text/javascript"></script>
@endsection