<!--<!DOCTYPE html><!--
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 4
Version: 5.0.3
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
Renew Support: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
{{--@php dd('======'); @endphp--}}
<html lang="en" >
<!-- begin::Head -->
<head>
	<meta charset="utf-8" />
	<title>
		Pre Approval Purchase Request
    </title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<meta name="description" content="Latest updates and statistic charts">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!--begin::Web font -->
	<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
	<script>
        WebFont.load({
            google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
            active: function() {
                sessionStorage.fonts = true;
            }
        });
	</script>
	<!--end::Web font -->
	<!--begin::Base Styles -->
	<!--begin::Page Vendors -->
	<link href="{{ asset('/metronic/theme/dist/html/default/assets/vendors/custom/fullcalendar/fullcalendar.bundle.css') }}" rel="stylesheet" type="text/css" />
	<!--end::Page Vendors -->
	<link href="{{ asset('/metronic/theme/dist/html/default/assets/vendors/base/vendors.bundle.css') }}" rel="stylesheet" type="text/css" />

	<link href="{{asset('/plugins/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />


    <link href="{{ asset('/metronic/theme/dist/html/default/assets/demo/default/base/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Base Styles -->

    {{-- <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css"> --}}

	<link rel="shortcut icon" href="{{ asset('/metronic/theme/dist/html/default/assets/demo/default/media/img/logo/favicon.ico') }}" />
	<style>
		.has-danger label.col-form-label, .has-danger label.form-control-label, .has-danger label:not(.m-checkbox):not(.m-radio){
			color: inherit;
		}

		.has-success label.col-form-label, .has-success label.form-control-label, .has-success label:not(.m-checkbox):not(.m-radio){
			color: inherit;
		}

		#dor-error{
			position: absolute;
			top: 37px;
		}
	</style>
</head>
<!-- end::Head -->
<!-- end::Body -->
<body class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default"  >
<!-- begin:: Page -->
<div class="m-grid m-grid--hor m-grid--root m-page">
	<!-- BEGIN: Header -->
	<header class="m-grid__item    m-header "  data-minimize-offset="200" data-minimize-mobile-offset="200" >
		<div class="m-container m-container--fluid m-container--full-height">
			<div class="m-stack m-stack--ver m-stack--desktop">
				<!-- BEGIN: Brand -->
				<div class="m-stack__item m-brand  m-brand--skin-dark ">
					<div class="m-stack m-stack--ver m-stack--general">
						<div class="m-stack__item m-stack__item--middle m-brand__logo">
							<a href="index.html" class="m-brand__logo-wrapper">
								<img alt="" src="assets/demo/default/media/img/logo/logo_default_dark.png"/>
							</a>
						</div>
						<div class="m-stack__item m-stack__item--middle m-brand__tools">
							<!-- BEGIN: Left Aside Minimize Toggle -->
							<a href="javascript:;" id="m_aside_left_minimize_toggle" class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-desktop-inline-block
					 ">
								<span></span>
							</a>
							<!-- END -->
							<!-- BEGIN: Responsive Aside Left Menu Toggler -->
							<a href="javascript:;" id="m_aside_left_offcanvas_toggle" class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-tablet-and-mobile-inline-block">
								<span></span>
							</a>
							<!-- END -->
							<!-- BEGIN: Responsive Header Menu Toggler -->
							<a id="m_aside_header_menu_mobile_toggle" href="javascript:;" class="m-brand__icon m-brand__toggler m--visible-tablet-and-mobile-inline-block">
								<span></span>
							</a>
							<!-- END -->
							<!-- BEGIN: Topbar Toggler -->
							<a id="m_aside_header_topbar_mobile_toggle" href="javascript:;" class="m-brand__icon m--visible-tablet-and-mobile-inline-block">
								<i class="flaticon-more"></i>
							</a>
							<!-- BEGIN: Topbar Toggler -->
						</div>
					</div>
				</div>
				<!-- END: Brand -->
				<div class="m-stack__item m-stack__item--fluid m-header-head" id="m_header_nav">
					<!-- BEGIN: Topbar -->
					<div id="m_header_topbar" class="m-topbar  m-stack m-stack--ver m-stack--general">
						<div class="m-stack__item m-topbar__nav-wrapper">
							<ul class="m-topbar__nav m-nav m-nav--inline">
								{{--<li class="m-nav__item m-topbar__user-profile m-topbar__user-profile--img  m-dropdown m-dropdown--medium m-dropdown--arrow m-dropdown--header-bg-fill m-dropdown--align-right m-dropdown--mobile-full-width m-dropdown--skin-light" data-dropdown-toggle="click">--}}
                                <li class="m-nav__item m-topbar__user-profile m-topbar__user-profile--img  m-dropdown m-dropdown--medium m-dropdown--arrow m-dropdown--header-bg-fill m-dropdown--align-right m-dropdown--mobile-full-width m-dropdown--skin-light" data-dropdown-toggle="click">

									<a href="#" class="m-nav__link m-dropdown__toggle">
												<span class="m-topbar__userpic">
													<img src="metronic/theme/src/media/app/img/users/user4.jpg" class="m--img-rounded m--marginless m--img-centered" alt=""/>
												</span>
										<span class="m-topbar__username m--hide">
													Nick
												</span>
									</a>
									<div class="m-dropdown__wrapper">
										<span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
										<div class="m-dropdown__inner">
											{{-- <div class="m-dropdown__header m--align-center" style="background: url(assets/app/media/img/misc/user_profile_bg.jpg); background-size: cover;">
												<div class="m-card-user m-card-user--skin-dark">
													<div class="m-card-user__pic">
														<img src="assets/app/media/img/users/user4.jpg" class="m--img-rounded m--marginless" alt=""/>
													</div>
													<div class="m-card-user__details">
																<span class="m-card-user__name m--font-weight-500">
																	Mark Andre
																</span>
														<a href="" class="m-card-user__email m--font-weight-300 m-link">
															mark.andre@gmail.com
														</a>
													</div>
												</div>
											</div> --}}
											<div class="m-dropdown__body">
												<div class="m-dropdown__content">
													<ul class="m-nav m-nav--skin-light">
														<li class="m-nav__section m--hide">
																	<span class="m-nav__section-text">
																		Section
																	</span>
														</li>
														<li class="m-nav__item">
															<a href="profile" class="m-nav__link">
																<i class="m-nav__link-icon flaticon-profile-1"></i>
																<span class="m-nav__link-title">
																			<span class="m-nav__link-wrap">
																				<span class="m-nav__link-text">
																					My Profile
																				</span>
																				{{-- <span class="m-nav__link-badge">
																					<span class="m-badge m-badge--success">
																						2
																					</span>
																				</span> --}}
																			</span>
																		</span>
															</a>
														</li>
														{{-- <li class="m-nav__item">
															<a href="header/profile.html" class="m-nav__link">
																<i class="m-nav__link-icon flaticon-share"></i>
																<span class="m-nav__link-text">
																			Activity
																		</span>
															</a>
														</li> --}}
														{{-- <li class="m-nav__item">
															<a href="header/profile.html" class="m-nav__link">
																<i class="m-nav__link-icon flaticon-chat-1"></i>
																<span class="m-nav__link-text">
																			Messages
																		</span>
															</a>
														</li> --}}
														{{-- <li class="m-nav__separator m-nav__separator--fit"></li>
														<li class="m-nav__item">
															<a href="header/profile.html" class="m-nav__link">
																<i class="m-nav__link-icon flaticon-info"></i>
																<span class="m-nav__link-text">
																			FAQ
																		</span>
															</a>
														</li> --}}
														{{-- <li class="m-nav__item">
															<a href="header/profile.html" class="m-nav__link">
																<i class="m-nav__link-icon flaticon-lifebuoy"></i>
																<span class="m-nav__link-text">
																			Support
																		</span>
															</a>
														</li> --}}
														<li class="m-nav__separator m-nav__separator--fit"></li>
														<li class="m-nav__item">
															{{--<a href="logout" class="btn m-btn--pill    btn-secondary m-btn m-btn--custom m-btn--label-brand m-btn--bolder">--}}
															<a href="{{ url('logout') }}" class="btn m-btn--pill    btn-secondary m-btn m-btn--custom m-btn--label-brand m-btn--bolder">
																Logout
															</a>
														</li>
													</ul>
												</div>
											</div>
										</div>
									</div>
								</li>
								{{-- <li id="m_quick_sidebar_toggle" class="m-nav__item">
									<a href="#" class="m-nav__link m-dropdown__toggle">
												<span class="m-nav__link-icon">
													<i class="flaticon-grid-menu"></i>
												</span>
									</a>
								</li> --}}
								<li id="m_quick_sidebar_toggle" class="m-nav__item">
                                    <a href="{{ url('logout') }}" class="m-nav__link m-dropdown__toggle">
                                    </a>
								</li>
							</ul>
						</div>
					</div>
					<!-- END: Topbar -->
				</div>
			</div>
		</div>
	</header>
	<!-- END: Header -->
	<!-- begin::Body -->
	<div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">
		<!-- BEGIN: Left Aside -->
		<button class="m-aside-left-close  m-aside-left-close--skin-dark " id="m_aside_left_close_btn">
			<i class="la la-close"></i>
		</button>
		<div id="m_aside_left" class="m-grid__item	m-aside-left  m-aside-left--skin-dark ">
			<!-- BEGIN: Aside Menu -->
			<div
					id="m_ver_menu"
					class="m-aside-menu  m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark "
					data-menu-vertical="true"
					data-menu-scrollable="false" data-menu-dropdown-timeout="500"
			>
				@include('layouts.sidebar')
			</div>
			<!-- END: Aside Menu -->
		</div>
		<!-- END: Left Aside -->
		<div class="m-grid__item m-grid__item--fluid m-wrapper">

                @if(session()->has('message'))
                @php
                    $message=session()->get('message')
                @endphp
				<br/>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-dismissible alert-{{$message['type']}}" id="success">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close"></a>
                                    <strong>{{ucfirst($message['type'])}}!! </strong>
                                    {{$message['text']}}
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                {{--<div class="container">--}}
                {{-- <div class="container">
>>>>>>> 57e26aa8936280eead566e4d4ac0ef70bc0b3ece
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-dismissible alert-success">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close"></a>
                                    <strong>Success!! </strong>
                                    message
                            </div>
                        </div>
                    </div>
<<<<<<< HEAD
                </div>
=======
                </div> --}}


			@section('body')
				@show
		</div>
	</div>
	<!-- end:: Body -->
	<!-- begin::Footer -->
	{{--<footer class="m-grid__item		m-footer ">--}}
		{{--<div class="m-container m-container--fluid m-container--full-height m-page__container">--}}
			{{--<div class="m-stack m-stack--flex-tablet-and-mobile m-stack--ver m-stack--desktop">--}}
				{{--<div class="m-stack__item m-stack__item--left m-stack__item--middle m-stack__item--last">--}}
							{{--<span class="m-footer__copyright">--}}
								{{--2017 &copy; Metronic theme by--}}
								{{--<a href="#" class="m-link">--}}
									{{--Keenthemes--}}
								{{--</a>--}}
							{{--</span>--}}
				{{--</div>--}}
				{{--<div class="m-stack__item m-stack__item--right m-stack__item--middle m-stack__item--first">--}}
					{{--<ul class="m-footer__nav m-nav m-nav--inline m--pull-right">--}}
						{{--<li class="m-nav__item">--}}
							{{--<a href="#" class="m-nav__link">--}}
										{{--<span class="m-nav__link-text">--}}
											{{--About--}}
										{{--</span>--}}
							{{--</a>--}}
						{{--</li>--}}
						{{--<li class="m-nav__item">--}}
							{{--<a href="#"  class="m-nav__link">--}}
										{{--<span class="m-nav__link-text">--}}
											{{--Privacy--}}
										{{--</span>--}}
							{{--</a>--}}
						{{--</li>--}}
						{{--<li class="m-nav__item">--}}
							{{--<a href="#" class="m-nav__link">--}}
										{{--<span class="m-nav__link-text">--}}
											{{--T&C--}}
										{{--</span>--}}
							{{--</a>--}}
						{{--</li>--}}
						{{--<li class="m-nav__item">--}}
							{{--<a href="#" class="m-nav__link">--}}
										{{--<span class="m-nav__link-text">--}}
											{{--Purchase--}}
										{{--</span>--}}
							{{--</a>--}}
						{{--</li>--}}
						{{--<li class="m-nav__item m-nav__item">--}}
							{{--<a href="#" class="m-nav__link" data-toggle="m-tooltip" title="Support Center" data-placement="left">--}}
								{{--<i class="m-nav__link-icon flaticon-info m--icon-font-size-lg3"></i>--}}
							{{--</a>--}}
						{{--</li>--}}
					{{--</ul>--}}
				{{--</div>--}}
			{{--</div>--}}
		{{--</div>--}}
	{{--</footer>--}}
	<!-- end::Footer -->
</div>
<!-- end:: Page -->
<!-- begin::Quick Sidebar -->
{{--<div id="m_quick_sidebar" class="m-quick-sidebar m-quick-sidebar--tabbed m-quick-sidebar--skin-light">--}}
	{{--<div class="m-quick-sidebar__content m--hide">--}}
				{{--<span id="m_quick_sidebar_close" class="m-quick-sidebar__close">--}}
					{{--<i class="la la-close"></i>--}}
				{{--</span>--}}
		{{--<ul id="m_quick_sidebar_tabs" class="nav nav-tabs m-tabs m-tabs-line m-tabs-line--brand" role="tablist">--}}
			{{--<li class="nav-item m-tabs__item">--}}
				{{--<a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_quick_sidebar_tabs_messenger" role="tab">--}}
					{{--Messages--}}
				{{--</a>--}}
			{{--</li>--}}
			{{--<li class="nav-item m-tabs__item">--}}
				{{--<a class="nav-link m-tabs__link" 		data-toggle="tab" href="#m_quick_sidebar_tabs_settings" role="tab">--}}
					{{--Settings--}}
				{{--</a>--}}
			{{--</li>--}}
			{{--<li class="nav-item m-tabs__item">--}}
				{{--<a class="nav-link m-tabs__link" data-toggle="tab" href="#m_quick_sidebar_tabs_logs" role="tab">--}}
					{{--Logs--}}
				{{--</a>--}}
			{{--</li>--}}
		{{--</ul>--}}
		{{--<div class="tab-content">--}}
			{{--<div class="tab-pane active m-scrollable" id="m_quick_sidebar_tabs_messenger" role="tabpanel">--}}
				{{--<div class="m-messenger m-messenger--message-arrow m-messenger--skin-light">--}}
					{{--<div class="m-messenger__messages">--}}
						{{--<div class="m-messenger__message m-messenger__message--in">--}}
							{{--<div class="m-messenger__message-pic">--}}
								{{--<img src="assets/app/media/img//users/user3.jpg" alt=""/>--}}
							{{--</div>--}}
							{{--<div class="m-messenger__message-body">--}}
								{{--<div class="m-messenger__message-arrow"></div>--}}
								{{--<div class="m-messenger__message-content">--}}
									{{--<div class="m-messenger__message-username">--}}
										{{--Megan wrote--}}
									{{--</div>--}}
									{{--<div class="m-messenger__message-text">--}}
										{{--Hi Bob. What time will be the meeting ?--}}
									{{--</div>--}}
								{{--</div>--}}
							{{--</div>--}}
						{{--</div>--}}
						{{--<div class="m-messenger__message m-messenger__message--out">--}}
							{{--<div class="m-messenger__message-body">--}}
								{{--<div class="m-messenger__message-arrow"></div>--}}
								{{--<div class="m-messenger__message-content">--}}
									{{--<div class="m-messenger__message-text">--}}
										{{--Hi Megan. It's at 2.30PM--}}
									{{--</div>--}}
								{{--</div>--}}
							{{--</div>--}}
						{{--</div>--}}
						{{--<div class="m-messenger__message m-messenger__message--in">--}}
							{{--<div class="m-messenger__message-pic">--}}
								{{--<img src="assets/app/media/img//users/user3.jpg" alt=""/>--}}
							{{--</div>--}}
							{{--<div class="m-messenger__message-body">--}}
								{{--<div class="m-messenger__message-arrow"></div>--}}
								{{--<div class="m-messenger__message-content">--}}
									{{--<div class="m-messenger__message-username">--}}
										{{--Megan wrote--}}
									{{--</div>--}}
									{{--<div class="m-messenger__message-text">--}}
										{{--Will the development team be joining ?--}}
									{{--</div>--}}
								{{--</div>--}}
							{{--</div>--}}
						{{--</div>--}}
						{{--<div class="m-messenger__message m-messenger__message--out">--}}
							{{--<div class="m-messenger__message-body">--}}
								{{--<div class="m-messenger__message-arrow"></div>--}}
								{{--<div class="m-messenger__message-content">--}}
									{{--<div class="m-messenger__message-text">--}}
										{{--Yes sure. I invited them as well--}}
									{{--</div>--}}
								{{--</div>--}}
							{{--</div>--}}
						{{--</div>--}}
						{{--<div class="m-messenger__datetime">--}}
							{{--2:30PM--}}
						{{--</div>--}}
						{{--<div class="m-messenger__message m-messenger__message--in">--}}
							{{--<div class="m-messenger__message-pic">--}}
								{{--<img src="assets/app/media/img//users/user3.jpg"  alt=""/>--}}
							{{--</div>--}}
							{{--<div class="m-messenger__message-body">--}}
								{{--<div class="m-messenger__message-arrow"></div>--}}
								{{--<div class="m-messenger__message-content">--}}
									{{--<div class="m-messenger__message-username">--}}
										{{--Megan wrote--}}
									{{--</div>--}}
									{{--<div class="m-messenger__message-text">--}}
										{{--Noted. For the Coca-Cola Mobile App project as well ?--}}
									{{--</div>--}}
								{{--</div>--}}
							{{--</div>--}}
						{{--</div>--}}
						{{--<div class="m-messenger__message m-messenger__message--out">--}}
							{{--<div class="m-messenger__message-body">--}}
								{{--<div class="m-messenger__message-arrow"></div>--}}
								{{--<div class="m-messenger__message-content">--}}
									{{--<div class="m-messenger__message-text">--}}
										{{--Yes, sure.--}}
									{{--</div>--}}
								{{--</div>--}}
							{{--</div>--}}
						{{--</div>--}}
						{{--<div class="m-messenger__message m-messenger__message--out">--}}
							{{--<div class="m-messenger__message-body">--}}
								{{--<div class="m-messenger__message-arrow"></div>--}}
								{{--<div class="m-messenger__message-content">--}}
									{{--<div class="m-messenger__message-text">--}}
										{{--Please also prepare the quotation for the Loop CRM project as well.--}}
									{{--</div>--}}
								{{--</div>--}}
							{{--</div>--}}
						{{--</div>--}}
						{{--<div class="m-messenger__datetime">--}}
							{{--3:15PM--}}
						{{--</div>--}}
						{{--<div class="m-messenger__message m-messenger__message--in">--}}
							{{--<div class="m-messenger__message-no-pic m--bg-fill-danger">--}}
										{{--<span>--}}
											{{--M--}}
										{{--</span>--}}
							{{--</div>--}}
							{{--<div class="m-messenger__message-body">--}}
								{{--<div class="m-messenger__message-arrow"></div>--}}
								{{--<div class="m-messenger__message-content">--}}
									{{--<div class="m-messenger__message-username">--}}
										{{--Megan wrote--}}
									{{--</div>--}}
									{{--<div class="m-messenger__message-text">--}}
										{{--Noted. I will prepare it.--}}
									{{--</div>--}}
								{{--</div>--}}
							{{--</div>--}}
						{{--</div>--}}
						{{--<div class="m-messenger__message m-messenger__message--out">--}}
							{{--<div class="m-messenger__message-body">--}}
								{{--<div class="m-messenger__message-arrow"></div>--}}
								{{--<div class="m-messenger__message-content">--}}
									{{--<div class="m-messenger__message-text">--}}
										{{--Thanks Megan. I will see you later.--}}
									{{--</div>--}}
								{{--</div>--}}
							{{--</div>--}}
						{{--</div>--}}
						{{--<div class="m-messenger__message m-messenger__message--in">--}}
							{{--<div class="m-messenger__message-pic">--}}
								{{--<img src="assets/app/media/img//users/user3.jpg"  alt=""/>--}}
							{{--</div>--}}
							{{--<div class="m-messenger__message-body">--}}
								{{--<div class="m-messenger__message-arrow"></div>--}}
								{{--<div class="m-messenger__message-content">--}}
									{{--<div class="m-messenger__message-username">--}}
										{{--Megan wrote--}}
									{{--</div>--}}
									{{--<div class="m-messenger__message-text">--}}
										{{--Sure. See you in the meeting soon.--}}
									{{--</div>--}}
								{{--</div>--}}
							{{--</div>--}}
						{{--</div>--}}
					{{--</div>--}}
					{{--<div class="m-messenger__seperator"></div>--}}
					{{--<div class="m-messenger__form">--}}
						{{--<div class="m-messenger__form-controls">--}}
							{{--<input type="text" name="" placeholder="Type here..." class="m-messenger__form-input">--}}
						{{--</div>--}}
						{{--<div class="m-messenger__form-tools">--}}
							{{--<a href="" class="m-messenger__form-attachment">--}}
								{{--<i class="la la-paperclip"></i>--}}
							{{--</a>--}}
						{{--</div>--}}
					{{--</div>--}}
				{{--</div>--}}
			{{--</div>--}}
			{{--<div class="tab-pane  m-scrollable" id="m_quick_sidebar_tabs_settings" role="tabpanel">--}}
				{{--<div class="m-list-settings">--}}
					{{--<div class="m-list-settings__group">--}}
						{{--<div class="m-list-settings__heading">--}}
							{{--General Settings--}}
						{{--</div>--}}
						{{--<div class="m-list-settings__item">--}}
									{{--<span class="m-list-settings__item-label">--}}
										{{--Email Notifications--}}
									{{--</span>--}}
							{{--<span class="m-list-settings__item-control">--}}
										{{--<span class="m-switch m-switch--outline m-switch--icon-check m-switch--brand">--}}
											{{--<label>--}}
												{{--<input type="checkbox" checked="checked" name="">--}}
												{{--<span></span>--}}
											{{--</label>--}}
										{{--</span>--}}
									{{--</span>--}}
						{{--</div>--}}
						{{--<div class="m-list-settings__item">--}}
									{{--<span class="m-list-settings__item-label">--}}
										{{--Site Tracking--}}
									{{--</span>--}}
							{{--<span class="m-list-settings__item-control">--}}
										{{--<span class="m-switch m-switch--outline m-switch--icon-check m-switch--brand">--}}
											{{--<label>--}}
												{{--<input type="checkbox" name="">--}}
												{{--<span></span>--}}
											{{--</label>--}}
										{{--</span>--}}
									{{--</span>--}}
						{{--</div>--}}
						{{--<div class="m-list-settings__item">--}}
									{{--<span class="m-list-settings__item-label">--}}
										{{--SMS Alerts--}}
									{{--</span>--}}
							{{--<span class="m-list-settings__item-control">--}}
										{{--<span class="m-switch m-switch--outline m-switch--icon-check m-switch--brand">--}}
											{{--<label>--}}
												{{--<input type="checkbox" name="">--}}
												{{--<span></span>--}}
											{{--</label>--}}
										{{--</span>--}}
									{{--</span>--}}
						{{--</div>--}}
						{{--<div class="m-list-settings__item">--}}
									{{--<span class="m-list-settings__item-label">--}}
										{{--Backup Storage--}}
									{{--</span>--}}
							{{--<span class="m-list-settings__item-control">--}}
										{{--<span class="m-switch m-switch--outline m-switch--icon-check m-switch--brand">--}}
											{{--<label>--}}
												{{--<input type="checkbox" name="">--}}
												{{--<span></span>--}}
											{{--</label>--}}
										{{--</span>--}}
									{{--</span>--}}
						{{--</div>--}}
						{{--<div class="m-list-settings__item">--}}
									{{--<span class="m-list-settings__item-label">--}}
										{{--Audit Logs--}}
									{{--</span>--}}
							{{--<span class="m-list-settings__item-control">--}}
										{{--<span class="m-switch m-switch--outline m-switch--icon-check m-switch--brand">--}}
											{{--<label>--}}
												{{--<input type="checkbox" checked="checked" name="">--}}
												{{--<span></span>--}}
											{{--</label>--}}
										{{--</span>--}}
									{{--</span>--}}
						{{--</div>--}}
					{{--</div>--}}
					{{--<div class="m-list-settings__group">--}}
						{{--<div class="m-list-settings__heading">--}}
							{{--System Settings--}}
						{{--</div>--}}
						{{--<div class="m-list-settings__item">--}}
									{{--<span class="m-list-settings__item-label">--}}
										{{--System Logs--}}
									{{--</span>--}}
							{{--<span class="m-list-settings__item-control">--}}
										{{--<span class="m-switch m-switch--outline m-switch--icon-check m-switch--brand">--}}
											{{--<label>--}}
												{{--<input type="checkbox" name="">--}}
												{{--<span></span>--}}
											{{--</label>--}}
										{{--</span>--}}
									{{--</span>--}}
						{{--</div>--}}
						{{--<div class="m-list-settings__item">--}}
									{{--<span class="m-list-settings__item-label">--}}
										{{--Error Reporting--}}
									{{--</span>--}}
							{{--<span class="m-list-settings__item-control">--}}
										{{--<span class="m-switch m-switch--outline m-switch--icon-check m-switch--brand">--}}
											{{--<label>--}}
												{{--<input type="checkbox" name="">--}}
												{{--<span></span>--}}
											{{--</label>--}}
										{{--</span>--}}
									{{--</span>--}}
						{{--</div>--}}
						{{--<div class="m-list-settings__item">--}}
									{{--<span class="m-list-settings__item-label">--}}
										{{--Applications Logs--}}
									{{--</span>--}}
							{{--<span class="m-list-settings__item-control">--}}
										{{--<span class="m-switch m-switch--outline m-switch--icon-check m-switch--brand">--}}
											{{--<label>--}}
												{{--<input type="checkbox" name="">--}}
												{{--<span></span>--}}
											{{--</label>--}}
										{{--</span>--}}
									{{--</span>--}}
						{{--</div>--}}
						{{--<div class="m-list-settings__item">--}}
									{{--<span class="m-list-settings__item-label">--}}
										{{--Backup Servers--}}
									{{--</span>--}}
							{{--<span class="m-list-settings__item-control">--}}
										{{--<span class="m-switch m-switch--outline m-switch--icon-check m-switch--brand">--}}
											{{--<label>--}}
												{{--<input type="checkbox" checked="checked" name="">--}}
												{{--<span></span>--}}
											{{--</label>--}}
										{{--</span>--}}
									{{--</span>--}}
						{{--</div>--}}
						{{--<div class="m-list-settings__item">--}}
									{{--<span class="m-list-settings__item-label">--}}
										{{--Audit Logs--}}
									{{--</span>--}}
							{{--<span class="m-list-settings__item-control">--}}
										{{--<span class="m-switch m-switch--outline m-switch--icon-check m-switch--brand">--}}
											{{--<label>--}}
												{{--<input type="checkbox" name="">--}}
												{{--<span></span>--}}
											{{--</label>--}}
										{{--</span>--}}
									{{--</span>--}}
						{{--</div>--}}
					{{--</div>--}}
				{{--</div>--}}
			{{--</div>--}}
			{{--<div class="tab-pane  m-scrollable" id="m_quick_sidebar_tabs_logs" role="tabpanel">--}}
				{{--<div class="m-list-timeline">--}}
					{{--<div class="m-list-timeline__group">--}}
						{{--<div class="m-list-timeline__heading">--}}
							{{--System Logs--}}
						{{--</div>--}}
						{{--<div class="m-list-timeline__items">--}}
							{{--<div class="m-list-timeline__item">--}}
								{{--<span class="m-list-timeline__badge m-list-timeline__badge--state-success"></span>--}}
								{{--<a href="" class="m-list-timeline__text">--}}
									{{--12 new users registered--}}
									{{--<span class="m-badge m-badge--warning m-badge--wide">--}}
												{{--important--}}
											{{--</span>--}}
								{{--</a>--}}
								{{--<span class="m-list-timeline__time">--}}
											{{--Just now--}}
										{{--</span>--}}
							{{--</div>--}}
							{{--<div class="m-list-timeline__item">--}}
								{{--<span class="m-list-timeline__badge m-list-timeline__badge--state-info"></span>--}}
								{{--<a href="" class="m-list-timeline__text">--}}
									{{--System shutdown--}}
								{{--</a>--}}
								{{--<span class="m-list-timeline__time">--}}
											{{--11 mins--}}
										{{--</span>--}}
							{{--</div>--}}
							{{--<div class="m-list-timeline__item">--}}
								{{--<span class="m-list-timeline__badge m-list-timeline__badge--state-danger"></span>--}}
								{{--<a href="" class="m-list-timeline__text">--}}
									{{--New invoice received--}}
								{{--</a>--}}
								{{--<span class="m-list-timeline__time">--}}
											{{--20 mins--}}
										{{--</span>--}}
							{{--</div>--}}
							{{--<div class="m-list-timeline__item">--}}
								{{--<span class="m-list-timeline__badge m-list-timeline__badge--state-warning"></span>--}}
								{{--<a href="" class="m-list-timeline__text">--}}
									{{--Database overloaded 89%--}}
									{{--<span class="m-badge m-badge--success m-badge--wide">--}}
												{{--resolved--}}
											{{--</span>--}}
								{{--</a>--}}
								{{--<span class="m-list-timeline__time">--}}
											{{--1 hr--}}
										{{--</span>--}}
							{{--</div>--}}
							{{--<div class="m-list-timeline__item">--}}
								{{--<span class="m-list-timeline__badge m-list-timeline__badge--state-success"></span>--}}
								{{--<a href="" class="m-list-timeline__text">--}}
									{{--System error--}}
								{{--</a>--}}
								{{--<span class="m-list-timeline__time">--}}
											{{--2 hrs--}}
										{{--</span>--}}
							{{--</div>--}}
							{{--<div class="m-list-timeline__item">--}}
								{{--<span class="m-list-timeline__badge m-list-timeline__badge--state-info"></span>--}}
								{{--<a href="" class="m-list-timeline__text">--}}
									{{--Production server down--}}
									{{--<span class="m-badge m-badge--danger m-badge--wide">--}}
												{{--pending--}}
											{{--</span>--}}
								{{--</a>--}}
								{{--<span class="m-list-timeline__time">--}}
											{{--3 hrs--}}
										{{--</span>--}}
							{{--</div>--}}
							{{--<div class="m-list-timeline__item">--}}
								{{--<span class="m-list-timeline__badge m-list-timeline__badge--state-success"></span>--}}
								{{--<a href="" class="m-list-timeline__text">--}}
									{{--Production server up--}}
								{{--</a>--}}
								{{--<span class="m-list-timeline__time">--}}
											{{--5 hrs--}}
										{{--</span>--}}
							{{--</div>--}}
						{{--</div>--}}
					{{--</div>--}}
					{{--<div class="m-list-timeline__group">--}}
						{{--<div class="m-list-timeline__heading">--}}
							{{--Applications Logs--}}
						{{--</div>--}}
						{{--<div class="m-list-timeline__items">--}}
							{{--<div class="m-list-timeline__item">--}}
								{{--<span class="m-list-timeline__badge m-list-timeline__badge--state-info"></span>--}}
								{{--<a href="" class="m-list-timeline__text">--}}
									{{--New order received--}}
									{{--<span class="m-badge m-badge--info m-badge--wide">--}}
												{{--urgent--}}
											{{--</span>--}}
								{{--</a>--}}
								{{--<span class="m-list-timeline__time">--}}
											{{--7 hrs--}}
										{{--</span>--}}
							{{--</div>--}}
							{{--<div class="m-list-timeline__item">--}}
								{{--<span class="m-list-timeline__badge m-list-timeline__badge--state-success"></span>--}}
								{{--<a href="" class="m-list-timeline__text">--}}
									{{--12 new users registered--}}
								{{--</a>--}}
								{{--<span class="m-list-timeline__time">--}}
											{{--Just now--}}
										{{--</span>--}}
							{{--</div>--}}
							{{--<div class="m-list-timeline__item">--}}
								{{--<span class="m-list-timeline__badge m-list-timeline__badge--state-info"></span>--}}
								{{--<a href="" class="m-list-timeline__text">--}}
									{{--System shutdown--}}
								{{--</a>--}}
								{{--<span class="m-list-timeline__time">--}}
											{{--11 mins--}}
										{{--</span>--}}
							{{--</div>--}}
							{{--<div class="m-list-timeline__item">--}}
								{{--<span class="m-list-timeline__badge m-list-timeline__badge--state-danger"></span>--}}
								{{--<a href="" class="m-list-timeline__text">--}}
									{{--New invoices received--}}
								{{--</a>--}}
								{{--<span class="m-list-timeline__time">--}}
											{{--20 mins--}}
										{{--</span>--}}
							{{--</div>--}}
							{{--<div class="m-list-timeline__item">--}}
								{{--<span class="m-list-timeline__badge m-list-timeline__badge--state-warning"></span>--}}
								{{--<a href="" class="m-list-timeline__text">--}}
									{{--Database overloaded 89%--}}
								{{--</a>--}}
								{{--<span class="m-list-timeline__time">--}}
											{{--1 hr--}}
										{{--</span>--}}
							{{--</div>--}}
							{{--<div class="m-list-timeline__item">--}}
								{{--<span class="m-list-timeline__badge m-list-timeline__badge--state-success"></span>--}}
								{{--<a href="" class="m-list-timeline__text">--}}
									{{--System error--}}
									{{--<span class="m-badge m-badge--info m-badge--wide">--}}
												{{--pending--}}
											{{--</span>--}}
								{{--</a>--}}
								{{--<span class="m-list-timeline__time">--}}
											{{--2 hrs--}}
										{{--</span>--}}
							{{--</div>--}}
							{{--<div class="m-list-timeline__item">--}}
								{{--<span class="m-list-timeline__badge m-list-timeline__badge--state-info"></span>--}}
								{{--<a href="" class="m-list-timeline__text">--}}
									{{--Production server down--}}
								{{--</a>--}}
								{{--<span class="m-list-timeline__time">--}}
											{{--3 hrs--}}
										{{--</span>--}}
							{{--</div>--}}
						{{--</div>--}}
					{{--</div>--}}
					{{--<div class="m-list-timeline__group">--}}
						{{--<div class="m-list-timeline__heading">--}}
							{{--Server Logs--}}
						{{--</div>--}}
						{{--<div class="m-list-timeline__items">--}}
							{{--<div class="m-list-timeline__item">--}}
								{{--<span class="m-list-timeline__badge m-list-timeline__badge--state-success"></span>--}}
								{{--<a href="" class="m-list-timeline__text">--}}
									{{--Production server up--}}
								{{--</a>--}}
								{{--<span class="m-list-timeline__time">--}}
											{{--5 hrs--}}
										{{--</span>--}}
							{{--</div>--}}
							{{--<div class="m-list-timeline__item">--}}
								{{--<span class="m-list-timeline__badge m-list-timeline__badge--state-info"></span>--}}
								{{--<a href="" class="m-list-timeline__text">--}}
									{{--New order received--}}
								{{--</a>--}}
								{{--<span class="m-list-timeline__time">--}}
											{{--7 hrs--}}
										{{--</span>--}}
							{{--</div>--}}
							{{--<div class="m-list-timeline__item">--}}
								{{--<span class="m-list-timeline__badge m-list-timeline__badge--state-success"></span>--}}
								{{--<a href="" class="m-list-timeline__text">--}}
									{{--12 new users registered--}}
								{{--</a>--}}
								{{--<span class="m-list-timeline__time">--}}
											{{--Just now--}}
										{{--</span>--}}
							{{--</div>--}}
							{{--<div class="m-list-timeline__item">--}}
								{{--<span class="m-list-timeline__badge m-list-timeline__badge--state-info"></span>--}}
								{{--<a href="" class="m-list-timeline__text">--}}
									{{--System shutdown--}}
								{{--</a>--}}
								{{--<span class="m-list-timeline__time">--}}
											{{--11 mins--}}
										{{--</span>--}}
							{{--</div>--}}
							{{--<div class="m-list-timeline__item">--}}
								{{--<span class="m-list-timeline__badge m-list-timeline__badge--state-danger"></span>--}}
								{{--<a href="" class="m-list-timeline__text">--}}
									{{--New invoice received--}}
								{{--</a>--}}
								{{--<span class="m-list-timeline__time">--}}
											{{--20 mins--}}
										{{--</span>--}}
							{{--</div>--}}
							{{--<div class="m-list-timeline__item">--}}
								{{--<span class="m-list-timeline__badge m-list-timeline__badge--state-warning"></span>--}}
								{{--<a href="" class="m-list-timeline__text">--}}
									{{--Database overloaded 89%--}}
								{{--</a>--}}
								{{--<span class="m-list-timeline__time">--}}
											{{--1 hr--}}
										{{--</span>--}}
							{{--</div>--}}
							{{--<div class="m-list-timeline__item">--}}
								{{--<span class="m-list-timeline__badge m-list-timeline__badge--state-success"></span>--}}
								{{--<a href="" class="m-list-timeline__text">--}}
									{{--System error--}}
								{{--</a>--}}
								{{--<span class="m-list-timeline__time">--}}
											{{--2 hrs--}}
										{{--</span>--}}
							{{--</div>--}}
							{{--<div class="m-list-timeline__item">--}}
								{{--<span class="m-list-timeline__badge m-list-timeline__badge--state-info"></span>--}}
								{{--<a href="" class="m-list-timeline__text">--}}
									{{--Production server down--}}
								{{--</a>--}}
								{{--<span class="m-list-timeline__time">--}}
											{{--3 hrs--}}
										{{--</span>--}}
							{{--</div>--}}
							{{--<div class="m-list-timeline__item">--}}
								{{--<span class="m-list-timeline__badge m-list-timeline__badge--state-success"></span>--}}
								{{--<a href="" class="m-list-timeline__text">--}}
									{{--Production server up--}}
								{{--</a>--}}
								{{--<span class="m-list-timeline__time">--}}
											{{--5 hrs--}}
										{{--</span>--}}
							{{--</div>--}}
							{{--<div class="m-list-timeline__item">--}}
								{{--<span class="m-list-timeline__badge m-list-timeline__badge--state-info"></span>--}}
								{{--<a href="" class="m-list-timeline__text">--}}
									{{--New order received--}}
								{{--</a>--}}
								{{--<span class="m-list-timeline__time">--}}
											{{--1117 hrs--}}
										{{--</span>--}}
							{{--</div>--}}
						{{--</div>--}}
					{{--</div>--}}
				{{--</div>--}}
			{{--</div>--}}
		{{--</div>--}}
	{{--</div>--}}
{{--</div>--}}
<!-- end::Quick Sidebar -->
<!-- begin::Scroll Top -->
<div class="m-scroll-top m-scroll-top--skin-top" data-toggle="m-scroll-top" data-scroll-offset="500" data-scroll-speed="300">
	<i class="la la-arrow-up"></i>
</div>
<!-- end::Scroll Top -->
<!-- begin::Quick Nav -->
{{-- <ul class="m-nav-sticky" style="margin-top: 30px;">

	<li class="m-nav-sticky__item" data-toggle="m-tooltip" title="Purchase" data-placement="left">
		<a href="https://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes" target="_blank">
			<i class="la la-cart-arrow-down"></i>
		</a>
	</li>
	<li class="m-nav-sticky__item" data-toggle="m-tooltip" title="Documentation" data-placement="left">
		<a href="http://keenthemes.com/metronic/documentation.html" target="_blank">
			<i class="la la-code-fork"></i>
		</a>
	</li>
	<li class="m-nav-sticky__item" data-toggle="m-tooltip" title="Support" data-placement="left">
		<a href="http://keenthemes.com/forums/forum/support/metronic5/" target="_blank">
			<i class="la la-life-ring"></i>
		</a>
	</li>
</ul> --}}
<!-- begin::Quick Nav -->
<!--begin::Base Scripts -->
<script src="{{ asset('/metronic/theme/dist/html/default/assets/vendors/base/vendors.bundle.js') }}" type="text/javascript"></script>
<script src="{{ asset('/metronic/theme/dist/html/default/assets/demo/default/base/scripts.bundle.js') }}" type="text/javascript"></script>
<!--end::Base Scripts -->
<!--begin::Page Vendors -->
<script src="{{ asset('/metronic/theme/dist/html/default/assets/vendors/custom/fullcalendar/fullcalendar.bundle.js') }}" type="text/javascript"></script>
<!--end::Page Vendors -->
<!--begin::Page Snippets -->
<script src="{{ asset('/metronic/theme/dist/html/default/assets/app/js/dashboard.js') }}" type="text/javascript"></script>
<script src="{{asset('/plugins/datatables/datatables.all.min.js')}}" type="text/javascript"></script>

<script src="{{ asset('/metronic/theme/dist/html/default/assets/demo/default/custom/components/forms/validation/form-widgets.js') }}" type="text/javascript"></script>
<script src="{{ asset('/metronic/theme/dist/html/default/assets/demo/default/custom/components/forms/widgets/bootstrap-datepicker.js') }}" type="text/javascript"></script>

{{--<script>--}}
    {{--$.ajaxSetup({--}}
        {{--headers: {--}}
            {{--'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}
        {{--}--}}
    {{--});--}}
{{--</script>--}}
@yield('js')

@yield('datatablejs')
<!--end::Page Snippets -->
</body>
<!-- end::Body -->



<style>
.pagination li {
    padding: 0;
    border-radius: 50%;
    background: #f2f3f8;
    margin: 5px;
    height: 2.25rem;
    width: 2.25rem;
    position: relative;
    align-items: center;
    text-align: center;
    vertical-align: middle;
    font-size: 1rem;
    line-height: 1rem;
    font-weight: 400;
    justify-content: center;
    display: flex;
}
.pagination li.active{
    background: #716aca;
        color:white !important;
}
.pagination li.active a{
    color:white !important;
}

.pagination li.disabled,.pagination li.disabled a{
    cursor:none !important;
}

</style>
</html>
