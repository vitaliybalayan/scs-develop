@extends('admin.layout')

@section('title')
Услуги
@endsection

@section('content')

<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

	<!-- begin:: Content Head -->
	<div class="kt-subheader   kt-grid__item" id="kt_subheader">
		<div class="kt-container  kt-container--fluid ">
			<div class="kt-subheader__main">
				<h3 class="kt-subheader__title">
					Услуги
				</h3>
				<span class="kt-subheader__separator kt-subheader__separator--v"></span>
				<div class="kt-subheader__group" id="kt_subheader_search">
					<span class="kt-subheader__desc" id="kt_subheader_total">{{ $services->count() }} услуг</span>
					<form class="kt-margin-l-20" id="kt_subheader_search_form">
						<div class="kt-input-icon kt-input-icon--right kt-subheader__search">
							<input type="text" class="form-control" placeholder="Search..." id="generalSearch">
							<span class="kt-input-icon__icon kt-input-icon__icon--right">
								<span>
									<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
										<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
											<rect x="0" y="0" width="24" height="24" />
											<path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
											<path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" fill="#000000" fill-rule="nonzero" />
										</g>
									</svg>

									<!--<i class="flaticon2-search-1"></i>-->
								</span>
							</span>
						</div>
					</form>
				</div>
				<div class="kt-subheader__group kt-hidden" id="kt_subheader_group_actions">
					<div class="kt-subheader__desc"><span id="kt_subheader_group_selected_rows"></span> Selected:</div>
					<div class="btn-toolbar kt-margin-l-20">
						<div class="dropdown" id="kt_subheader_group_actions_status_change">
							<button type="button" class="btn btn-label-brand btn-bold btn-sm dropdown-toggle" data-toggle="dropdown">
								Update Status
							</button>
							<div class="dropdown-menu">
								<ul class="kt-nav">
									<li class="kt-nav__section kt-nav__section--first">
										<span class="kt-nav__section-text">Change status to:</span>
									</li>
									<li class="kt-nav__item">
										<a href="#" class="kt-nav__link" data-toggle="status-change" data-status="1">
											<span class="kt-nav__link-text"><span class="kt-badge kt-badge--unified-success kt-badge--inline kt-badge--bold">Approved</span></span>
										</a>
									</li>
									<li class="kt-nav__item">
										<a href="#" class="kt-nav__link" data-toggle="status-change" data-status="2">
											<span class="kt-nav__link-text"><span class="kt-badge kt-badge--unified-danger kt-badge--inline kt-badge--bold">Rejected</span></span>
										</a>
									</li>
									<li class="kt-nav__item">
										<a href="#" class="kt-nav__link" data-toggle="status-change" data-status="3">
											<span class="kt-nav__link-text"><span class="kt-badge kt-badge--unified-warning kt-badge--inline kt-badge--bold">Pending</span></span>
										</a>
									</li>
									<li class="kt-nav__item">
										<a href="#" class="kt-nav__link" data-toggle="status-change" data-status="4">
											<span class="kt-nav__link-text"><span class="kt-badge kt-badge--unified-info kt-badge--inline kt-badge--bold">On Hold</span></span>
										</a>
									</li>
								</ul>
							</div>
						</div>
						<button class="btn btn-label-success btn-bold btn-sm btn-icon-h" id="kt_subheader_group_actions_fetch" data-toggle="modal" data-target="#kt_datatable_records_fetch_modal">
							Fetch Selected
						</button>
						<button class="btn btn-label-danger btn-bold btn-sm btn-icon-h" id="kt_subheader_group_actions_delete_all">
							Delete All
						</button>
					</div>
				</div>
			</div>
			<div class="kt-subheader__toolbar">
				<a href="{{ route('services.create') }}" class="btn btn-label-brand btn-bold">Добавить услугу</a>
				<div class="kt-subheader__wrapper">
					<div class="dropdown dropdown-inline" data-toggle="kt-tooltip-" title="Quick actions" data-placement="left">
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
									Add New:
									<i class="flaticon2-information" data-toggle="kt-tooltip" data-placement="right" title="Click to learn more..."></i>
								</li>
								<li class="kt-nav__separator"></li>
								<li class="kt-nav__item">
									<a href="#" class="kt-nav__link">
										<i class="kt-nav__link-icon flaticon2-drop"></i>
										<span class="kt-nav__link-text">Orders</span>
									</a>
								</li>
								<li class="kt-nav__item">
									<a href="#" class="kt-nav__link">
										<i class="kt-nav__link-icon flaticon2-new-email"></i>
										<span class="kt-nav__link-text">Members</span>
										<span class="kt-nav__link-badge">
											<span class="kt-badge kt-badge--brand kt-badge--rounded">15</span>
										</span>
									</a>
								</li>
								<li class="kt-nav__item">
									<a href="#" class="kt-nav__link">
										<i class="kt-nav__link-icon flaticon2-calendar-8"></i>
										<span class="kt-nav__link-text">Reports</span>
									</a>
								</li>
								<li class="kt-nav__item">
									<a href="#" class="kt-nav__link">
										<i class="kt-nav__link-icon flaticon2-link"></i>
										<span class="kt-nav__link-text">Finance</span>
									</a>
								</li>
								<li class="kt-nav__separator"></li>
								<li class="kt-nav__foot">
									<a class="btn btn-label-brand btn-bold btn-sm" href="#">More options</a>
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

		@if($services->count() == 0)
		<div class="alert alert-secondary" role="alert">
			<div class="alert-icon"><i class="flaticon-questions-circular-button"></i></div>
			<div class="alert-text">Вы еще не добавляли услуг. <a href="{{ route('services.create') }}">Добавить?</a></div>
		</div>
		@endif

		<!--Begin::Section-->
		<div class="row">

			@foreach($services as $service)
			<div class="col-xl-6">
				<!--begin:: Portlet-->
				<div class="kt-portlet kt-portlet--height-fluid">
					<div class="kt-portlet__body kt-portlet__body--fit">

						<!--begin::Widget -->
						<div class="kt-widget kt-widget--project-1">
							<div class="kt-widget__head">
								<div class="kt-widget__label">
									<div class="kt-widget__media">
										<span class="kt-media kt-media--lg kt-media--circle">
											<img src="assets/media/project-logos/3.png" alt="image">
										</span>
									</div>
									<div class="kt-widget__info kt-margin-t-5">
										<a href="#" class="kt-widget__title">
											Nexa - Next generation SAAS
										</a>
										<span class="kt-widget__desc">
											Creates Limitless possibilities
										</span>
									</div>
								</div>
								<div class="kt-portlet__head-toolbar">
									<a href="#" class="btn btn-clean btn-sm btn-icon btn-icon-md" data-toggle="dropdown">
										<i class="flaticon-more-1"></i>
									</a>
									<div class="dropdown-menu dropdown-menu-fit dropdown-menu-right">
										<ul class="kt-nav">
											<li class="kt-nav__item">
												<a href="#" class="kt-nav__link">
													<i class="kt-nav__link-icon flaticon2-line-chart"></i>
													<span class="kt-nav__link-text">Reports</span>
												</a>
											</li>
											<li class="kt-nav__item">
												<a href="#" class="kt-nav__link">
													<i class="kt-nav__link-icon flaticon2-send"></i>
													<span class="kt-nav__link-text">Messages</span>
												</a>
											</li>
											<li class="kt-nav__item">
												<a href="#" class="kt-nav__link">
													<i class="kt-nav__link-icon flaticon2-pie-chart-1"></i>
													<span class="kt-nav__link-text">Charts</span>
												</a>
											</li>
											<li class="kt-nav__item">
												<a href="#" class="kt-nav__link">
													<i class="kt-nav__link-icon flaticon2-avatar"></i>
													<span class="kt-nav__link-text">Members</span>
												</a>
											</li>
											<li class="kt-nav__item">
												<a href="#" class="kt-nav__link">
													<i class="kt-nav__link-icon flaticon2-settings"></i>
													<span class="kt-nav__link-text">Settings</span>
												</a>
											</li>
										</ul>
									</div>
								</div>
							</div>
							<div class="kt-widget__body">
								<div class="kt-widget__stats">
									<div class="kt-widget__item">
										<span class="kt-widget__date">
											Start Date
										</span>
										<div class="kt-widget__label">
											<span class="btn btn-label-brand btn-sm btn-bold btn-upper">07 may, 18</span>
										</div>
									</div>
									<div class="kt-widget__item">
										<span class="kt-widget__date">
											Due Date
										</span>
										<div class="kt-widget__label">
											<span class="btn btn-label-danger btn-sm btn-bold btn-upper">07 0ct, 18</span>
										</div>
									</div>
									<div class="kt-widget__item flex-fill">
										<span class="kt-widget__subtitel">Progress</span>
										<div class="kt-widget__progress d-flex  align-items-center">
											<div class="progress" style="height: 5px;width: 100%;">
												<div class="progress-bar kt-bg-warning" role="progressbar" style="width: 78%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
											</div>
											<span class="kt-widget__stat">
												78%
											</span>
										</div>
									</div>
								</div>
								<span class="kt-widget__text">
									I distinguish three main text objecttives.First, your objective could
									be merely to inform people.A second be to persuade people.
								</span>
								<div class="kt-widget__content">
									<div class="kt-widget__details">
										<span class="kt-widget__subtitle">Budget</span>
										<span class="kt-widget__value"><span>$</span>249,500</span>
									</div>
									<div class="kt-widget__details">
										<span class="kt-widget__subtitle">Expances</span>
										<span class="kt-widget__value"><span>$</span>76,810</span>
									</div>
									<div class="kt-widget__details">
										<span class="kt-widget__subtitle">Members</span>
										<div class="kt-media-group">
											<a href="#" class="kt-media kt-media--sm kt-media--circle" data-toggle="kt-tooltip" data-skin="brand" data-placement="top" title="" data-original-title="John Myer">
												<img src="assets/media/users/100_7.jpg" alt="image">
											</a>
											<a href="#" class="kt-media kt-media--sm kt-media--circle" data-toggle="kt-tooltip" data-skin="brand" data-placement="top" title="" data-original-title="Alison Brandy">
												<img src="assets/media/users/100_3.jpg" alt="image">
											</a>
											<a href="#" class="kt-media kt-media--sm kt-media--circle" data-toggle="kt-tooltip" data-skin="brand" data-placement="top" title="" data-original-title="Selina Cranson">
												<img src="assets/media/users/100_2.jpg" alt="image">
											</a>
											<a href="#" class="kt-media kt-media--sm kt-media--circle" data-toggle="kt-tooltip" data-skin="brand" data-placement="top" title="" data-original-title="Luke Walls">
												<img src="assets/media/users/100_13.jpg" alt="image">
											</a>
											<a href="#" class="kt-media kt-media--sm kt-media--circle" data-toggle="kt-tooltip" data-skin="brand" data-placement="top" title="" data-original-title="Micheal York">
												<img src="assets/media/users/100_4.jpg" alt="image">
											</a>
											<a href="#" class="kt-media kt-media--sm kt-media--circle" data-toggle="kt-tooltip" data-skin="brand" data-placement="top" title="" data-original-title="Micheal York">
												<span>+3</span>
											</a>
										</div>
									</div>
								</div>
							</div>
							<div class="kt-widget__footer">
								<div class="kt-widget__wrapper">
									<div class="kt-widget__section">
										<div class="kt-widget__blog">
											<i class="flaticon2-list-1"></i>
											<a href="#" class="kt-widget__value kt-font-brand">72 Tasks</a>
										</div>
										<div class="kt-widget__blog">
											<i class="flaticon2-talk"></i>
											<a href="#" class="kt-widget__value kt-font-brand">648 Comments</a>
										</div>
									</div>
									<div class="kt-widget__section">
										<button type="button" class="btn btn-brand btn-sm btn-upper btn-bold">details</button>
									</div>
								</div>
							</div>
						</div>

						<!--end::Widget -->
					</div>
				</div>
				<!--end:: Portlet-->
			</div>
			@endforeach


		</div>
		<!--End::Section-->

	</div>

	<!-- end:: Content -->
</div>

@endsection