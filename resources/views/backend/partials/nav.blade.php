<header class="mdl-layout__header">
    <div class="mdl-layout__header-row">
        <div class="mdl-layout-spacer"></div>





        <div class="avatar-dropdown" id="icon">
            @php
                // Retrieve the authenticated user
                $user = Auth::user();
            @endphp
            @if ($user)
                <span>{{ $user->name }}</span>
            @else
                <span>Guest</span>
            @endif
        </div>
        <!-- Account dropdawn-->
        <ul class="mdl-menu mdl-list mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect mdl-shadow--2dp account-dropdown"
            for="icon">
            <li class="mdl-list__item mdl-list__item--two-line">
                <span class="mdl-list__item-primary-content">
                    <span>{{$user->name}}</span>
                    <span class="mdl-list__item-sub-title">{{ $user->email }}</span>
                </span>
            </li>
            <li class="list__item--border-top"></li>
            
            <a href="login.html">
                <li class="mdl-menu__item mdl-list__item">
                    <span class="mdl-list__item-primary-content">
                        <i class="material-icons mdl-list__item-icon text-color--secondary">exit_to_app</i>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </span>
                </li>
            </a>
        </ul>

        
    </div>
</header>
