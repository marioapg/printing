<div class="side-content-wrap">
    <div class="sidebar-left open rtl-ps-none" data-perfect-scrollbar data-suppress-scroll-x="true">
        <ul class="navigation-left">
            @if (auth()->user()->hasRole('user'))
                <li class="nav-item {{ request()->is('user/myjobs') || request()->is('user/myjobs/*') ? 'active' : '' }}" data-item="jobs">
                    <a class="nav-item-hold" href="{{ route('myjobs.index') }}">
                        <i class="nav-icon i-File-Clipboard-File--Text"></i>
                        <span class="nav-text">Trabajos</span>
                    </a>
                    <div class="triangle"></div>
                </li>
            @endif
            @if (auth()->user()->hasRole('gerente'))
                <li class="nav-item {{ request()->is('gerencia/jobs') || request()->is('gerencia/*') ? 'active' : '' }}" data-item="jobs">
                    <a class="nav-item-hold" href="{{ route('gerencejobs.index') }}">
                        <i class="nav-icon i-File-Clipboard-File--Text"></i>
                        <span class="nav-text">Trabajos</span>
                    </a>
                    <div class="triangle"></div>
                </li>
            @endif
            @if (auth()->user()->hasRole('admin-gerencia'))
                <li class="nav-item {{ request()->is('admingerencia/jobs') || request()->is('admingerencia/*') ? 'active' : '' }}" data-item="jobs">
                    <a class="nav-item-hold" href="{{ route('agerence.jobs.index') }}">
                        <i class="nav-icon i-File-Clipboard-File--Text"></i>
                        <span class="nav-text">Trabajos</span>
                    </a>
                    <div class="triangle"></div>
                </li>
            @endif
            @if (auth()->user()->hasRole('admin'))
                {{-- <li class="nav-item {{ request()->is('dashboard/*') ? 'active' : '' }}" data-item="dashboard">
                    <a class="nav-item-hold" href="#">
                        <i class="nav-icon i-Bar-Chart"></i>
                        <span class="nav-text">Dashboard</span>
                    </a>
                    <div class="triangle"></div>
                </li>
                <li class="nav-item {{ request()->is('uikits/*') ? 'active' : '' }}" data-item="uikits">
                    <a class="nav-item-hold" href="#">
                        <i class="nav-icon i-Library"></i>
                        <span class="nav-text">UI kits</span>
                    </a>
                    <div class="triangle"></div>
                </li>
                <li class="nav-item {{ request()->is('extrakits/*') ? 'active' : '' }}" data-item="extrakits">
                    <a class="nav-item-hold" href="#">
                        <i class="nav-icon i-Suitcase"></i>
                        <span class="nav-text">Extra kits</span>
                    </a>
                    <div class="triangle"></div>
                </li>
                <li class="nav-item {{ request()->is('apps/*') ? 'active' : '' }}" data-item="apps">
                    <a class="nav-item-hold" href="#">
                        <i class="nav-icon i-Computer-Secure"></i>
                        <span class="nav-text">Apps</span>
                    </a>
                    <div class="triangle"></div>
                </li> --}}
                <li class="nav-item {{ request()->is('home') || request()->is('jobs') || request()->is('jobs/*') ? 'active' : '' }}" data-item="jobs">
                    <a class="nav-item-hold" href="{{ route('jobs.index') }}">
                        <i class="nav-icon i-File-Clipboard-File--Text"></i>
                        <span class="nav-text">Trabajos</span>
                    </a>
                    <div class="triangle"></div>
                </li>

                {{-- <li class="nav-item {{ request()->is('widgets/*') ? 'active' : '' }}" data-item="widgets">
                    <a class="nav-item-hold" href="#">
                        <i class="nav-icon i-Windows-2"></i>
                        <span class="nav-text">widgets</span>
                    </a>
                    <div class="triangle"></div>
                </li>

                <li class="nav-item {{ request()->is('charts/*') ? 'active' : '' }}" data-item="charts">
                    <a class="nav-item-hold" href="#">
                        <i class="nav-icon i-File-Clipboard-File--Text"></i>
                        <span class="nav-text">Charts</span>
                    </a>
                    <div class="triangle"></div>
                </li>

                <li class="nav-item {{ request()->is('datatables/*') ? 'active' : '' }}">
                    <a class="nav-item-hold" href="#">
                        <i class="nav-icon i-File-Horizontal-Text"></i>
                        <span class="nav-text">Datatables</span>
                    </a>
                    <div class="triangle"></div>
                </li> --}}
                <li class="nav-item {{ request()->is('users') || request()->is('users/*') ? 'active' : '' }}" data-item="users">
                    <a class="nav-item-hold" href="{{ route('users.index') }}?type=user">
                        <i class="nav-icon i-Administrator"></i>
                        <span class="nav-text">Imprentas</span>
                    </a>
                    <div class="triangle"></div>
                </li>
                <li class="nav-item {{ request()->is('users') || request()->is('users/*') ? 'active' : '' }}" data-item="users">
                    <a class="nav-item-hold" href="{{ route('users.index') }}?type=admin-gerencia">
                        <i class="nav-icon i-Administrator"></i>
                        <span class="nav-text">Admin Gerencia</span>
                    </a>
                    <div class="triangle"></div>
                </li>
                <li class="nav-item {{ request()->is('users') || request()->is('users/*') ? 'active' : '' }}" data-item="users">
                    <a class="nav-item-hold" href="{{ route('users.index') }}?type=gerente">
                        <i class="nav-icon i-Administrator"></i>
                        <span class="nav-text">Gerentes</span>
                    </a>
                    <div class="triangle"></div>
                </li>
                <li class="nav-item {{ request()->is('users') || request()->is('users/*') ? 'active' : '' }}" data-item="users">
                    <a class="nav-item-hold" href="{{ route('users.index') }}?type=admin">
                        <i class="nav-icon i-Administrator"></i>
                        <span class="nav-text">Administradores</span>
                    </a>
                    <div class="triangle"></div>
                </li>
                {{-- <li class="nav-item {{ request()->is('others/*') ? 'active' : '' }}" data-item="others">
                    <a class="nav-item-hold" href="">
                        <i class="nav-icon i-Double-Tap"></i>
                        <span class="nav-text">Pages</span>
                    </a>
                    <div class="triangle"></div>
                </li>
                <li class="nav-item">
                    <a class="nav-item-hold" href="http://demos.ui-lib.com/gull-html-doc/" target="_blank">
                        <i class="nav-icon i-Safe-Box1"></i>
                        <span class="nav-text">Doc</span>
                    </a>
                    <div class="triangle"></div>
                </li> --}}
            @endif
        </ul>
    </div>
{{--
    <div class="sidebar-left-secondary rtl-ps-none" data-perfect-scrollbar data-suppress-scroll-x="true">
        <!-- Submenu Dashboards -->
        <ul class="childNav" data-parent="dashboard">
            <li class="nav-item ">
                <a class="{{ Route::currentRouteName()=='dashboard_version_1' ? 'open' : '' }}"
                    href="#">
                    <i class="nav-icon i-Clock-3"></i>
                    <span class="item-name">Version 1</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#"
                    class="{{ Route::currentRouteName()=='dashboard_version_2' ? 'open' : '' }}">
                    <i class="nav-icon i-Clock-4"></i>
                    <span class="item-name">Version 2</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="{{ Route::currentRouteName()=='dashboard_version_3' ? 'open' : '' }}"
                    href="#">
                    <i class="nav-icon i-Over-Time"></i>
                    <span class="item-name">Version 3</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="{{ Route::currentRouteName()=='dashboard_version_4' ? 'open' : '' }}"
                    href="#">
                    <i class="nav-icon i-Clock"></i>
                    <span class="item-name">Version 4</span>
                </a>
            </li>
        </ul>
        <ul class="childNav" data-parent="forms">

            <li class="nav-item">
                <a class="{{ Route::currentRouteName()=='forms-basic' ? 'open' : '' }}" href="#">
                    <i class="nav-icon i-File-Clipboard-Text--Image"></i>
                    <span class="item-name">Basic Elements</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="{{ Route::currentRouteName()=='basic-action-bar' ? 'open' : '' }}"
                    href="#">
                    <i class="nav-icon i-File-Clipboard-Text--Image"></i>
                    <span class="item-name">Basic action bar </span>
                </a>
            </li>
            <li class="nav-item">
                <a class="{{ Route::currentRouteName()=='form-layouts' ? 'open' : '' }}"
                    href="#">
                    <i class="nav-icon i-Split-Vertical"></i>
                    <span class="item-name">Form Layouts</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="{{ Route::currentRouteName()=='multi-column-forms' ? 'open' : '' }}"
                    href="#">
                    <i class="nav-icon i-Split-Vertical"></i>
                    <span class="item-name">Multi column forms</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="{{ Route::currentRouteName()=='form-input-group' ? 'open' : '' }}"
                    href="#">
                    <i class="nav-icon i-Receipt-4"></i>
                    <span class="item-name">Input Groups</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="{{ Route::currentRouteName()=='form-validation' ? 'open' : '' }}"
                    href="#">
                    <i class="nav-icon i-Close-Window"></i>
                    <span class="item-name">Form Validation</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="{{ Route::currentRouteName()=='smartWizard' ? 'open' : '' }}" href="#">
                    <i class="nav-icon i-Width-Window"></i>
                    <span class="item-name">Smart Wizard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="{{ Route::currentRouteName()=='tagInput' ? 'open' : '' }}" href="#">
                    <i class="nav-icon i-Tag-2"></i>
                    <span class="item-name">Tag Input</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="{{ Route::currentRouteName()=='form-editor' ? 'open' : '' }}" href="#">
                    <i class="nav-icon i-Pen-2"></i>
                    <span class="item-name">Rich Editor</span>
                </a>
            </li>
        </ul>
        <ul class="childNav" data-parent="widgets">
            <li class="nav-item">
                <a class="{{ Route::currentRouteName()=='widget-card' ? 'open' : '' }}" href="#">
                    <i class="nav-icon i-Receipt-4"></i>
                    <span class="item-name">widget card</span>
                </a>
            </li>
            <li class="nav-item">


                <a class="{{ Route::currentRouteName()=='widget-statistics' ? 'open' : '' }}"
                    href="#">
                    <i class="nav-icon i-Receipt-4"></i>
                    <span class="item-name">widget statistics</span>
                </a>
            </li>

            <li class="nav-item">


                <a class="{{ Route::currentRouteName()=='widget-list' ? 'open' : '' }}" href="#">
                    <i class="nav-icon i-Receipt-4"></i>
                    <span class="item-name">Widget List <span class="ml-2 badge badge-pill badge-danger">
                            New</span></span>
                </a>
            </li>

            <li class="nav-item">


                <a class="{{ Route::currentRouteName()=='widget-app' ? 'open' : '' }}" href="#">
                    <i class="nav-icon i-Receipt-4"></i>
                    <span class="item-name">Widget App <span class="ml-2 badge badge-pill badge-danger"> New</span>
                    </span>
                </a>
            </li>
            <li class="nav-item">


                <a class="{{ Route::currentRouteName()=='widget-weather-app' ? 'open' : '' }}"
                    href="#">
                    <i class="nav-icon i-Receipt-4"></i>
                    <span class="item-name"> Weather App <span class="ml-2 badge badge-pill badge-danger"> New</span>
                    </span>
                </a>
            </li>

        </ul>

        <ul class="childNav" data-parent="charts">
            <li class="nav-item">
                <a class="{{ Route::currentRouteName()=='echarts' ? 'open' : '' }}" href="#">
                    <i class="nav-icon i-File-Clipboard-Text--Image"></i>
                    <span class="item-name">echarts</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="{{ Route::currentRouteName()=='chartjs' ? 'open' : '' }}" href="#">
                    <i class="nav-icon i-File-Clipboard-Text--Image"></i>
                    <span class="item-name">ChartJs</span>
                </a>
            </li>
            <li class="nav-item dropdown-sidemenu">
                <a>
                    <i class="nav-icon i-File-Clipboard-Text--Image"></i>
                    <span class="item-name">Apex Charts</span>
                    <i class="dd-arrow i-Arrow-Down"></i>
                </a>
                <ul class="submenu">
                    <li><a class="{{ Route::currentRouteName()=='apexAreaCharts' ? 'open' : '' }}"
                            href="#">Area Charts</a></li>
                    <li><a class="{{ Route::currentRouteName()=='apexBarCharts' ? 'open' : '' }}"
                            href="#">Bar Charts</a></li>
                    <li><a class="{{ Route::currentRouteName()=='apexBubbleCharts' ? 'open' : '' }}"
                            href="#">Bubble Charts</a></li>
                    <li><a class="{{ Route::currentRouteName()=='apexColumnCharts' ? 'open' : '' }}"
                            href="#">Column Charts</a></li>
                    <li><a class="{{ Route::currentRouteName()=='apexCandleStickCharts' ? 'open' : '' }}"
                            href="#">CandleStick Charts</a></li>
                    <li><a class="{{ Route::currentRouteName()=='apexLineCharts' ? 'open' : '' }}"
                            href="#">Line Charts</a></li>
                    <li><a class="{{ Route::currentRouteName()=='apexMixCharts' ? 'open' : '' }}"
                            href="#">Mix Charts</a></li>
                    <li><a class="{{ Route::currentRouteName()=='apexPieDonutCharts' ? 'open' : '' }}"
                            href="#">PieDonut Charts</a></li>
                    <li><a class="{{ Route::currentRouteName()=='apexRadarCharts' ? 'open' : '' }}"
                            href="#">Radar Charts</a></li>
                    <li><a class="{{ Route::currentRouteName()=='apexRadialBarCharts' ? 'open' : '' }}"
                            href="#">RadialBar Charts</a></li>
                    <li><a class="{{ Route::currentRouteName()=='apexScatterCharts' ? 'open' : '' }}"
                            href="#">Scatter Charts</a></li>
                    <li><a class="{{ Route::currentRouteName()=='apexSparklineCharts' ? 'open' : '' }}"
                            href="#">Sparkline Charts</a></li>

                </ul>
            </li>





        </ul>

        <ul class="childNav" data-parent="apps">
            <li class="nav-item">
                <a class="{{ Route::currentRouteName()=='invoice' ? 'open' : '' }}" href="#">
                    <i class="nav-icon i-Add-File"></i>
                    <span class="item-name">Invoice</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="{{ Route::currentRouteName()=='inbox' ? 'open' : '' }}" href="#">
                    <i class="nav-icon i-Email"></i>
                    <span class="item-name">Inbox</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="{{ Route::currentRouteName()=='chat' ? 'open' : '' }}" href="#">
                    <i class="nav-icon i-Speach-Bubble-3"></i>
                    <span class="item-name">Chat</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="{{ Route::currentRouteName()=='calendar' ? 'open' : '' }}" href="#">
                    <i class="nav-icon i-Calendar-4"></i>
                    <span class="item-name">Calendar</span>
                </a>
            </li>
            <li class="nav-item dropdown-sidemenu">
                <a>
                    <i class="nav-icon i-Receipt"></i>
                    <span class="item-name">Task Manager <span
                            class=" ml-2 badge badge-pill badge-danger">New</span></span>
                    <i class="dd-arrow i-Arrow-Down"></i>
                </a>
                <ul class="submenu">
                    <li>
                        <a class="{{ Route::currentRouteName()=='task-manager' ? 'open' : '' }}"
                            href="#">
                            <i class="nav-icon i-Receipt"></i>
                            <span class="item-name">Task manager</span>
                        </a>
                    </li>
                    <li>
                        <a class="{{ Route::currentRouteName()=='task-manager-list' ? 'open' : '' }}"
                            href="#">
                            <i class="nav-icon i-Receipt-4"></i>
                            <span class="item-name">Task manager list</span>
                        </a>
                    </li>
                    <li>
                        <a class="{{ Route::currentRouteName()=='toDo' ? 'open' : '' }}" href="#">
                            <i class="nav-icon i-Receipt-4"></i>
                            <span class="item-name">Minimal ToDo</span>
                        </a>
                    </li>
                    <li></li>
                </ul>
            </li>

            <li class="nav-item dropdown-sidemenu">
                <a>
                    <i class="nav-icon i-Cash-Register"></i>
                    <span class="item-name">Ecommerce <span
                            class=" ml-2 badge badge-pill badge-danger">New</span></span>
                    <i class="dd-arrow i-Arrow-Down"></i>
                </a>
                <ul class="submenu">
                    <li>
                        <a class="{{ Route::currentRouteName()=='ecommerce-products' ? 'open' : '' }}"
                            href="#">
                            <i class="nav-icon i-Shop-2"></i>
                            <span class="item-name">Products</span>
                        </a>
                    </li>


                    <li>
                        <a class="{{ Route::currentRouteName()=='ecommerce-product-details' ? 'open' : '' }}"
                            href="#">
                            <i class="nav-icon i-Tag-2"></i>
                            <span class="item-name">Product Details</span>
                        </a>
                    </li>
                    <li>
                        <a class="{{ Route::currentRouteName()=='ecommerce-cart' ? 'open' : '' }}"
                            href="#">
                            <i class="nav-icon i-Add-Cart"></i>
                            <span class="item-name">Cart</span>
                        </a>
                    </li>

                    <li>
                        <a class="{{ Route::currentRouteName()=='ecommerce-checkout' ? 'open' : '' }}"
                            href="#">
                            <i class="nav-icon i-Cash-register-2"></i>
                            <span class="item-name">Checkout</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item dropdown-sidemenu">
                <a>
                    <i class="nav-icon i-Business-ManWoman"></i>
                    <span class="item-name">Contacts<span class=" ml-2 badge badge-pill badge-danger">New</span></span>
                    <i class="dd-arrow i-Arrow-Down"></i>
                </a>
                <ul class="submenu">

                    <li>
                        <a class="{{ Route::currentRouteName()=='contact-list-table' ? 'open' : '' }}"
                            href="#">
                            <i class="nav-icon i-Business-Mens"></i>
                            <span class="item-name">Contact Table
                                <span  class="ml-2 badge badge-pill badge-danger">New</span>
                            </span>
                        </a>
                    </li>
                    <li>
                        <a class="{{ Route::currentRouteName()=='contacts-lists' ? 'open' : '' }}"
                            href="#">
                            <i class="nav-icon i-Business-Mens"></i>
                            <span class="item-name">Contact Lists</span>
                        </a>
                    </li>
                    <li>
                        <a class="{{ Route::currentRouteName()=='contacts-grid' ? 'open' : '' }}"
                            href="#">
                            <i class="nav-icon i-Conference"></i>
                            <span class="item-name">Contact Grid</span>
                        </a>
                    </li>
                    <li>
                        <a class="{{ Route::currentRouteName()=='contact-details' ? 'open' : '' }}"
                            href="#">
                            <i class="nav-icon i-Find-User"></i>
                            <span class="item-name">Contact Details</span>
                        </a>
                    </li>



                </ul>
            </li>


        </ul>
        <ul class="childNav" data-parent="extrakits">

            <li class="nav-item">
                <a class="{{ Route::currentRouteName()=='dropDown' ? 'open' : '' }}" href="#">
                    <i class="nav-icon i-Arrow-Down-in-Circle"></i>
                    <span class="item-name">Dropdown</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="{{ Route::currentRouteName()=='imageCroper' ? 'open' : '' }}" href="#">
                    <i class="nav-icon i-Crop-2"></i>
                    <span class="item-name">Image Cropper</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="{{ Route::currentRouteName()=='loader' ? 'open' : '' }}" href="#">
                    <i class="nav-icon i-Loading-3"></i>
                    <span class="item-name">Loaders</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="{{ Route::currentRouteName()=='laddaButton' ? 'open' : '' }}" href="#">
                    <i class="nav-icon i-Loading-2"></i>
                    <span class="item-name">Ladda Buttons</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="{{ Route::currentRouteName()=='toastr' ? 'open' : '' }}" href="#">
                    <i class="nav-icon i-Bell"></i>
                    <span class="item-name">Toastr</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="{{ Route::currentRouteName()=='sweetAlert' ? 'open' : '' }}" href="#">
                    <i class="nav-icon i-Approved-Window"></i>
                    <span class="item-name">Sweet Alerts</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="{{ Route::currentRouteName()=='tour' ? 'open' : '' }}" href="#">
                    <i class="nav-icon i-Plane"></i>
                    <span class="item-name">User Tour</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="{{ Route::currentRouteName()=='upload' ? 'open' : '' }}" href="#">
                    <i class="nav-icon i-Data-Upload"></i>
                    <span class="item-name">Upload</span>
                </a>
            </li>
        </ul>
        <ul class="childNav" data-parent="uikits">
            <li class="nav-item">
                <a class="{{ Route::currentRouteName()=='alerts' ? 'open' : '' }}" href="#">
                    <i class="nav-icon i-Bell1"></i>
                    <span class="item-name">Alerts</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="{{ Route::currentRouteName()=='accordion' ? 'open' : '' }}" href="#">
                    <i class="nav-icon i-Split-Horizontal-2-Window"></i>
                    <span class="item-name">Accordion</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="{{ Route::currentRouteName()=='badges' ? 'open' : '' }}" href="#">
                    <i class="nav-icon i-Medal-2"></i>
                    <span class="item-name">Badges</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="{{ Route::currentRouteName()=='buttons' ? 'open' : '' }}" href="#">
                    <i class="nav-icon i-Cursor-Click"></i>
                    <span class="item-name">Buttons</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="{{ Route::currentRouteName()=='bootstrap-tab' ? 'open' : '' }}"
                    href="#">
                    <i class="nav-icon i-Cursor-Click"></i>
                    <span class="item-name">Bootstrap tab</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="{{ Route::currentRouteName()=='cards' ? 'open' : '' }}" href="#">
                    <i class="nav-icon i-Line-Chart-2"></i>
                    <span class="item-name">Cards</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="{{ Route::currentRouteName()=='cards-metrics' ? 'open' : '' }}"
                    href="#">
                    <i class="nav-icon i-ID-Card"></i>
                    <span class="item-name">Card Metrics</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="{{ Route::currentRouteName()=='carousel' ? 'open' : '' }}" href="#">
                    <i class="nav-icon i-Video-Photographer"></i>
                    <span class="item-name">Carousels</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="{{ Route::currentRouteName()=='collapsible' ? 'open' : '' }}" href="#">
                    <i class="nav-icon i-Video-Photographer"></i>
                    <span class="item-name">Collapsibles</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="{{ Route::currentRouteName()=='lists' ? 'open' : '' }}" href="#">
                    <i class="nav-icon i-Belt-3"></i>
                    <span class="item-name">Lists</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="{{ Route::currentRouteName()=='pagination' ? 'open' : '' }}" href="#">
                    <i class="nav-icon i-Arrow-Next"></i>
                    <span class="item-name">Paginations</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="{{ Route::currentRouteName()=='popover' ? 'open' : '' }}" href="#">
                    <i class="nav-icon i-Speach-Bubble-2"></i>
                    <span class="item-name">Popover</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="{{ Route::currentRouteName()=='progressbar' ? 'open' : '' }}" href="#">
                    <i class="nav-icon i-Loading"></i>
                    <span class="item-name">Progressbar</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="{{ Route::currentRouteName()=='tables' ? 'open' : '' }}" href="#">
                    <i class="nav-icon i-File-Horizontal-Text"></i>
                    <span class="item-name">Tables</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="{{ Route::currentRouteName()=='tabs' ? 'open' : '' }}" href="#">
                    <i class="nav-icon i-New-Tab"></i>
                    <span class="item-name">Tabs</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="{{ Route::currentRouteName()=='tooltip' ? 'open' : '' }}" href="#">
                    <i class="nav-icon i-Speach-Bubble-8"></i>
                    <span class="item-name">Tooltip</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="{{ Route::currentRouteName()=='typography' ? 'open' : '' }}" href="#">
                    <i class="nav-icon i-Letter-Open"></i>
                    <span class="item-name">Typography</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="{{ Route::currentRouteName()=='modals' ? 'open' : '' }}" href="#">
                    <i class="nav-icon i-Duplicate-Window"></i>
                    <span class="item-name">Modals</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="{{ Route::currentRouteName()=='NoUislider' ? 'open' : '' }}" href="#">
                    <i class="nav-icon i-Width-Window"></i>
                    <span class="item-name">Sliders</span>
                </a>
            </li>
        </ul>
        <ul class="childNav" data-parent="sessions">
            <li class="nav-item">
                <a href="#">
                    <i class="nav-icon i-Checked-User"></i>
                    <span class="item-name">Sign in</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#">
                    <i class="nav-icon i-Add-User"></i>
                    <span class="item-name">Sign up</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#">
                    <i class="nav-icon i-Find-User"></i>
                    <span class="item-name">Forgot</span>
                </a>
            </li>
        </ul>
        <ul class="childNav" data-parent="others">
            <li class="nav-item">
                <a href="#">
                    <i class="nav-icon i-Error-404-Window"></i>
                    <span class="item-name">Not Found</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="{{ Route::currentRouteName()=='pricing-table' ? 'open' : '' }}"
                    href="#">
                    <i class="nav-icon i-Billing"></i>
                    <span class="item-name">Pricing Table <span
                            class="ml-2 badge badge-pill badge-danger">New</span></span>
                </a>
            </li>

            <li class="nav-item">
                <a class="{{ Route::currentRouteName()=='search-result' ? 'open' : '' }}"
                    href="#">
                    <i class="nav-icon i-File-Search"></i>
                    <span class="item-name">Search Result <span class="badge badge-pill badge-danger">New</span></span>
                </a>
            </li>
            <li class="nav-item">
                <a class="{{ Route::currentRouteName()=='user-profile' ? 'open' : '' }}"
                    href="#">
                    <i class="nav-icon i-Male"></i>
                    <span class="item-name">User Profile</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="{{ Route::currentRouteName()=='faq' ? 'open' : '' }}" href="#" class="open">
                    <i class="nav-icon i-File-Horizontal"></i>
                    <span class="item-name">faq</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="{{ Route::currentRouteName()=='starter' ? 'open' : '' }}" href="#"
                    class="open">
                    <i class="nav-icon i-File-Horizontal"></i>
                    <span class="item-name">Blank Page</span>
                </a>
            </li>
        </ul>
    </div>
    --}}
    <div class="sidebar-overlay"></div>
</div>
<!--=============== Left side End ================-->
