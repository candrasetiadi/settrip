
<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('home') }}"><i class="icon-speedometer"></i> Dashboard 
                <!-- <span class="badge badge-info">NEW</span> -->
                </a>
            </li>

            <li class="nav-title">
                Master
            </li>
            <!-- <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-puzzle"></i> Components</a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link" href="components-buttons.html"><i class="icon-puzzle"></i> Buttons</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="components-social-buttons.html"><i class="icon-puzzle"></i> Social Buttons</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="components-cards.html"><i class="icon-puzzle"></i> Cards</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="components-forms.html"><i class="icon-puzzle"></i> Forms</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="components-modals.html"><i class="icon-puzzle"></i> Modals</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="components-switches.html"><i class="icon-puzzle"></i> Switches</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="components-tables.html"><i class="icon-puzzle"></i> Tables</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="components-tabs.html"><i class="icon-puzzle"></i> Tabs</a>
                    </li>
                </ul>
            </li> -->
            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-location-pin"></i> Destinations</a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('admin/destinationCategory') }}"><i class="icon-game-controller"></i> Category</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('admin/destinationType') }}"><i class="icon-game-controller"></i> Type</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('admin/destinationActivity') }}" target="_top"><i class="icon-location-pin"></i> Activity</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('admin/destinationFacility') }}"><i class="icon-game-controller"></i> Facility</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('admin/destinationEquipment') }}"><i class="icon-bag"></i> Equipment</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('admin/destination') }}" target="_top"><i class="icon-location-pin"></i> Destination</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('admin/destinationAttraction') }}" target="_top"><i class="icon-location-pin"></i> Attraction</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#"><i class="fa fa-cutlery"></i> Restaurants</a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('admin/restaurantCategory') }}" target="_top"><i class="icon-layers"></i> Categories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('admin/restaurant') }}" target="_top"><i class="fa fa-cutlery"></i> Resto</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('admin/restaurantMenu') }}" target="_top"><i class="icon-book-open"></i> Restaurant Menu</a>
                    </li>
                </ul>
            </li>            
            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-home"></i> Lodgings</a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('admin/lodgingType') }}" target="_top"><i class="icon-equalizer"></i> Type</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('admin/lodgingRoomType') }}" target="_top"><i class="icon-equalizer"></i> Room Type</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('admin/lodgingFacility') }}" target="_top"><i class="icon-game-controller"></i> Facility</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('admin/lodging') }}" target="_top"><i class="icon-home"></i> Lodging</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('admin/lodgingDetailRoom') }}" target="_top"><i class="icon-list"></i> Detail Room</a>
                    </li>
                </ul>
            </li>           
            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#"><i class="fa fa-car"></i> Transportations</a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('admin/transportationTypes') }}"><i class="icon-equalizer"></i> Type</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('admin/transportationFacility') }}"><i class="icon-game-controller"></i> Facilities</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('admin/transportation') }}"><i class="fa fa-subway"></i> Transportation</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#"><i class="fa fa-user-secret"></i> Guides</a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('admin/guideTalent') }}"><i class="fa fa-heart"></i> Talent</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('admin/guideLanguage') }}"><i class="fa fa-language"></i> Language</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('admin/guide') }}"><i class="fa fa-user-secret"></i> Guide</a>
                    </li>
                </ul>
            </li>
            <!-- <li class="nav-item">
                <a class="nav-link" href="{{ url('admin/trips') }}"><i class="icon-direction"></i> Trip</a>
            </li> -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('users') }}"><i class="icon-people"></i> Users</a>
            </li>
            <li class="divider"></li>
            <!-- <li class="nav-title">
                Extras
            </li>
            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-star"></i> Pages</a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link" href="pages-login.html" target="_top"><i class="icon-star"></i> Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pages-register.html" target="_top"><i class="icon-star"></i> Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pages-404.html" target="_top"><i class="icon-star"></i> Error 404</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pages-500.html" target="_top"><i class="icon-star"></i> Error 500</a>
                    </li>
                </ul>
            </li> -->
            <li class="nav-title">
                Trip
            </li>
            <li class="nav-item">
                <a class="nav-link" href=""><i class=""></i> Open Trip</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href=""><i class=""></i> Recommended</a>
            </li>
            <li class="divider"></li>
        </ul>
    </nav>
</div>