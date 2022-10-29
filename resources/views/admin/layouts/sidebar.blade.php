			<!-- Sidebar -->
            <div class="sidebar" id="sidebar">
                <div class="sidebar-inner slimscroll">
					<div id="sidebar-menu" class="sidebar-menu">
						<ul>
							<li class="menu-title"> 
								<span>Main</span>
							</li>
							<li> 
								<a href="#"><i class="fe fe-home"></i> <span>Dashboard</span></a>
							</li>

							@if (in_array('Slider', json_decode(Auth::guard('admin') -> user() -> role -> permissions)))
                            <li> 
								<a href="{{route('sliders.index')}}"><i class="fe fe-desktop"></i> <span>Slider</span></a>
							</li>
							@endif

							@if (in_array('counter', json_decode(Auth::guard('admin') -> user() -> role -> permissions)))
                            <li> 
								<a href="{{route('counter.index')}}"><i class="fe fe-desktop"></i> <span>Counter</span></a>
							</li>
							@endif

							@if (in_array('Testimonials', json_decode(Auth::guard('admin') -> user() -> role -> permissions)))
                            <li> 
								<a href="{{route('testimonials.index')}}"><i class="fe fe-commenting"></i> <span>Testimonials</span></a>
							</li>
							@endif

							@if (in_array('Expertise', json_decode(Auth::guard('admin') -> user() -> role -> permissions)))
                            <li> 
								<a href="#"><i class="fe fe-user"></i> <span>Expertise</span></a>
							</li>
							@endif

							@if (in_array('Clients', json_decode(Auth::guard('admin') -> user() -> role -> permissions)))
                            <li> 
								<a href="{{route('client.index')}}"><i class="fe fe-user"></i> <span>Our Clients</span></a>
							</li>
							@endif

							@if (in_array('Protfolio', json_decode(Auth::guard('admin') -> user() -> role -> permissions)))
                            <li> 
                                <li class="submenu">
                                    <a href="#"><i class="fe fe-beginner"></i> <span> Protfolio</span> <span class="menu-arrow"></span></a>
                                    <ul style="display: none;">
                                        <li><a href="{{route('portfolio.index')}}">Protfolio</a></li>
                                        <li><a href="{{route('category-portfolio.index')}}">Categories</a></li>
                                    </ul>
                                </li>
							</li>
							@endif

							@if (in_array('Team', json_decode(Auth::guard('admin') -> user() -> role -> permissions)))
                            <li> 
								<a href="#"><i class="fe fe-users"></i> <span>Our Team</span></a>
							</li>
							@endif
							@if (in_array('Posts', json_decode(Auth::guard('admin') -> user() -> role -> permissions)))
							<li class="submenu">
								<a href="#"><i class="fe fe-document"></i> <span> Posts</span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li><a href="{{route('show.all.post')}}">All Posts</a></li>
									<li><a href="{{route('category-post.index')}}">Categories</a></li>
									<li><a href="{{route('tag.index')}}">Tag</a></li>
								</ul>
							</li>
							@endif
							@if (in_array('Product', json_decode(Auth::guard('admin') -> user() -> role -> permissions)))
							<li class="submenu">
								<a href="#"><i class="fe fe-document"></i> <span> Product</span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li><a href="#">All Product</a></li>
									<li><a href="{{route('product-category.index')}}">Categories</a></li>
									<li><a href="{{route('product-tag.index')}}">Tag</a></li>
								</ul>
							</li>
							@endif
							@if (in_array('Admins', json_decode(Auth::guard('admin') -> user() -> role -> permissions)))
                            <li class="menu-title"> 
								<span>Admin Option</span>
							</li>
                            <li class="submenu">
								<a href="#"><i class="fe fe-check-verified"></i> <span> Admin User</span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li><a href="{{route('admin-user.index')}}">Users</a></li>
									<li><a href="{{route('role.index')}}">Role</a></li>
									<li><a href="{{route('permission.index')}}">Permission</a></li>
								</ul>
							</li>
							@endif

						</ul>
					</div>
                </div>
            </div>
			<!-- /Sidebar -->