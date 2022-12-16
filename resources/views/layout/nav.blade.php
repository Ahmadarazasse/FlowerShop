<style>
    .size {
        height: 40px !important;
        margin-top: 10px !important;
        margin-right: 44px !important;
        border-radius: 50px !important;
    }

    .size::placeholder {
        color: black;
    }

    nav {
        margin: 20px;
        padding-right: 30px;

    }
</style>


<nav class="z-depth-0 white">
    <div class="nav-wrapper ">
        <a href="/" class="brand-logo black-text left"><span class="pink-text ">Fill</span> Flower <span
                style="font-size: 20px;">{{ session()->get('adminemail') != null ? 'ADMIN' : '' }}</span></a>

        @if (session()->get('adminemail') != null)
            <a href="{{ route('order.index') }}" class=" black-text" style="margin-left: 250px; font-size: 20px;">Orders</a>
        @endif

        <ul id="nav-mobile" class="right">
            <li>
                <div class="center row ">
                    <div class="col s12 ">
                        <div class="row " id="topbarsearch">
                            <form action="{{ route('flowers.index') }}" style="padding: 0; margin:0;" method="get">

                                <div class="input-field col s6 s12 ">
                                    <i class="pink-text material-icons prefix">search</i>
                                    <div style="width: 20px">

                                    </div>
                                    <input type="text" placeholder="search" name="search" id="autocomplete-input"
                                        class="autocomplete black-text grey size lighten-2 hide-on-small-only">

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </li>
            <li><a href="{{ route('carts.index') }}" class="pink-text "><i class="Medium material-icons">local_mall
                    </i></a></li>
            @if (session()->get('user_email') == null && session()->get('adminemail') == null)
                <li><a href="{{ route('users.index') }}" class=" btn-floating btn-large pink"><i
                            class="Medium material-icons">person</i></a>
                </li>
            @else
                <li><a href="{{ session()->get('user_email') != null ? route('users.index') : route('admin.index') }}"
                        class=" btn pink ">SIGN OUT</h1></a>
                </li>
            @endif
        </ul>
    </div>
</nav>
