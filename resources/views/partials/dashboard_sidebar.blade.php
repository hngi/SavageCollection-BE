<div class="col-md-2 col-sm-1 hidden-xs display-table-cell v-align box" id="navigation">
    <div class="logo">
        <a><h2>SC</h2></a>
    </div>
    <div class="navi">
        <ul>
            <li class="{{ (request()->is('dashboard')) ? 'active' : '' }}">
                <a href="{{ url('/dashboard') }}"><i class="fa fa-home" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Home</span></a>
            </li>
            <li class="{{ (request()->is('new_upload')) ? 'active' : '' }}">
                <a href="{{ url('/new_upload') }}"><i class="fa fa-plus" aria-hidden="true"></i><span class="hidden-xs hidden-sm">New Upload</span></a>
            </li>
            <li class="{{ (request()->is('my_uploads')) ? 'active' : '' }}">
                <a href=" {{ url('/my_uploads')}} "><i class="fa fa-image" aria-hidden="true"></i><span class="hidden-xs hidden-sm">My Uploads</span></a>
            </li>
            <li>
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-sign-out" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Logout</span></a>
            </li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </ul>
    </div>
</div>
