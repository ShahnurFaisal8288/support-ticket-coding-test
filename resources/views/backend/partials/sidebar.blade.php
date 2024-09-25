
<style>
    .mdl-layout__drawer {
        width: 250px;
    }
    .mdl-navigation {
        display: flex;
        flex-direction: column;
        padding: 0;
    }
    .mdl-navigation__link {
        display: flex;
        align-items: center;
        color: #424242;
        text-decoration: none;
        padding: 16px;
        font-size: 14px;
    }
    .mdl-navigation__link i {
        margin-right: 32px;
    }
    .sub-navigation {
        display: block;
    }
    .sub-navigation > .mdl-navigation {
        display: none;
        /* padding-left: 20px; */
    }
    .sub-navigation.active > .mdl-navigation {
        display: block;
    }
    .sub-navigation .mdl-navigation__link {
        /* padding: 8px 16px; */
        
    }
    .mdl-layout-spacer {
        flex-grow: 1;
    }
    hr {
        width: 100%;
        border: none;
        border-top: 1px solid rgba(0,0,0,.12);
        margin: 8px 0;
    }
</style>
<div class="mdl-layout mdl-js-layout">
    <div class="mdl-layout__drawer">
        <header>darkboard</header>
        <div class="scroll__wrapper" id="scroll__wrapper">
            <div class="scroller" id="scroller">
                <div class="scroll__container" id="scroll__container">
                    <nav class="mdl-navigation">
                        <a class="mdl-navigation__link mdl-navigation__link--current" href="index.html">
                            <i class="material-icons" role="presentation">dashboard</i>
                            Dashboard
                        </a>
                        <div class="sub-navigation">
                            <a class="mdl-navigation__link" onclick="toggleSubMenu(this)">
                                <i class="material-icons">view_comfy</i>
                                Inventory
                                <i class="material-icons">keyboard_arrow_down</i>
                            </a>
                            <div class="mdl-navigation">
                                <a class="mdl-navigation__link" href="">Category</a>
                                <a class="mdl-navigation__link" href="{{asset('button')}}/ui-colors.html">Colors</a>
                                <a class="mdl-navigation__link" href="{{asset('button')}}/ui-form-components.html">Forms</a>
                                <a class="mdl-navigation__link" href="{{asset('button')}}/ui-icons.html">Icons</a>
                                <a class="mdl-navigation__link" href="{{asset('button')}}/ui-typography.html">Typography</a>
                                <a class="mdl-navigation__link" href="{{asset('button')}}/ui-tables.html">Tables</a>
                            </div>
                        </div>
                         <a class="mdl-navigation__link" href="ui-components.html">
                                <i class="material-icons">developer_board</i>
                                Components
                            </a>
                            <a class="mdl-navigation__link" href="forms.html">
                                <i class="material-icons" role="presentation">person</i>
                                Account
                            </a>
                            <a class="mdl-navigation__link" href="maps.html">
                                <i class="material-icons" role="presentation">map</i>
                                Maps
                            </a>
                            <a class="mdl-navigation__link" href="charts.html">
                                <i class="material-icons">multiline_chart</i>
                                Charts
                            </a>
                            <div class="sub-navigation">
                                <a class="mdl-navigation__link" onclick="toggleSubMenu(this)">
                                    <i class="material-icons">pages</i>
                                    Pages
                                    <i class="material-icons">keyboard_arrow_down</i>
                                </a>
                                <div class="mdl-navigation">
                                    <a class="mdl-navigation__link" href="login.html">Sign in</a>
                                    <a class="mdl-navigation__link" href="sign-up.html">Sign up</a>
                                    <a class="mdl-navigation__link" href="forgot-password.html">Forgot password</a>
                                    <a class="mdl-navigation__link" href="404.html">404</a>
                                </div>
                            </div>
                            <div class="mdl-layout-spacer"></div>
                            <hr>
                            <a class="mdl-navigation__link" href="https://github.com/CreativeIT/getmdl-dashboard">
                                <i class="material-icons" role="presentation">link</i>
                                GitHub
                            </a>
                        <!-- Rest of the navigation items... -->
                    </nav>
                </div>
            </div>
            <div class='scroller__bar' id="scroller__bar"></div>
        </div>
    </div>
    <main class="mdl-layout__content">
        <div class="page-content">
            <!-- Your page content goes here -->
        </div>
    </main>
</div>

<script>
    function toggleSubMenu(element) {
        const subNav = element.closest('.sub-navigation');
        subNav.classList.toggle('active');
        const arrow = element.querySelector('.material-icons:last-child');
        arrow.textContent = subNav.classList.contains('active') ? 'keyboard_arrow_up' : 'keyboard_arrow_down';
    }
</script>