<nav class="navbar">
    <label class="hamburger_buton" >
            <input type="checkbox" data-anijs='if:click,do:$toggleClass activa,to: .navbar__items;' />
            <span >
                <span ></span>
                <span ></span>
                <span ></span>
            </span>
    </label>

    <div class="navbar__logo">
        <p>LOGO</p>
    </div>

    <div class="navbar__items animate__animated activa " id='lo'>
        <a href="#">Inicio</a>
        <a href="#">Paginas Recientes</a>
        <a href="#">item</a>
        <a href="#">item</a>
    </div>

    <div class="navbar__user">
        <a href="">Usuario</a>
    </div>

</nav>