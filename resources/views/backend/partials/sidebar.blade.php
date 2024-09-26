
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
        <header>Support Ticket</header>
        <div class="scroll__wrapper" id="scroll__wrapper">
            <div class="scroller" id="scroller">
                <div class="scroll__container" id="scroll__container">
                    <nav class="mdl-navigation">
                        <a class="mdl-navigation__link mdl-navigation__link--current" href="{{ route('ticket.index') }}">
                            <i class="material-icons" role="presentation">dashboard</i>
                            Dashboard
                        </a>
                        
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