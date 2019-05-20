@php
if(session()->has('permissions')){
$permissions = session()->all()['permissions'];

$current_route = Session::all()['current_route'];

if(!empty($permissions)){
    foreach($permissions as $permission){
        $permission_route = explode('.', $permission['name']);

		if($permission_route[0] !== 'pr_items'){
			if(isset($permission_route[1]))
			{
				if(in_array($permission_route[1], config('commonConfig.dashboard_routes.names'))){
					// $permission['display_name'] = $permission['display_name'].' '.$permission_route[0];
					$permission['display_name'] = $permission['display_name'];
					$routes_arr[$permission_route[0]][] = $permission;
				}
			}
		}
    }
}
}
// dd($routes_arr);

@endphp


<ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">

@foreach($routes_arr as $route_arr_key => $route_arr_value)
		<li class="m-menu__item  m-menu__item--submenu @if(in_array($current_route, array_pluck($route_arr_value, 'name'))) m-menu__item--open m-menu__item--expanded @endif" aria-haspopup="true"  data-menu-submenu-toggle="hover">
			<a  href="#" class="m-menu__link m-menu__toggle">
				<i class="m-menu__link-icon flaticon-layers"></i>
				<span class="m-menu__link-text">
					{{ ucwords(str_replace(['_','-','.'],' ',$route_arr_key)) }}
										</span>
				<i class="m-menu__ver-arrow la la-angle-right"></i>
			</a>
			<div class="m-menu__submenu">
				<span class="m-menu__arrow"></span>
				<ul class="m-menu__subnav">
				@foreach($route_arr_value as $route_arr)
					<li class="m-menu__item @if($route_arr['name'] == $current_route) m-menu__item--active @endif" aria-haspopup="true" >
						<a  href="{{ route($route_arr['name']) }}" class="m-menu__link ">
							<i class="m-menu__link-bullet m-menu__link-bullet--dot">
								<span></span>
							</i>
							<span class="m-menu__link-text">
								{{ ucwords(str_replace(['-','_'],' ',$route_arr['display_name'])) }}
							</span>
						</a>
					</li>
				@endforeach
				</ul>
			</div>
		</li>
@endforeach
</ul>

{{--@php--}}
{{--}}--}}
{{--@endphp--}}
