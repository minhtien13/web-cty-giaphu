<div class="search__overlay overlay search__main__js search__up__js pc-on-hide"></div>

<div class="search search__main__js pc-on-hide">
    <div class="header__bar pc-on-show--flex moblie-on-hide">
        <div class="container">
            <div class="header__bar__container">
                <h3 class="header__bar__heading">Công ty gia phú Architects</h3>

                <div class="header__bar__wrapper moblie-on-hide">
                    <ul class="header__bar__list">
                        <li class="header__bar__list-item">
                        <span>
                            <i class="fa-solid fa-location-dot"></i>
                        </span>
                        <span>
                            {{ $contact->address }}
                        </span>
                        </li>
                        <li class="header__bar__list-item">
                        <span>
                            <i class="fa-solid fa-phone"></i>
                        </span>
                        <span>{{ $contact->phone }} </span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="header__container">
        <a href="/" class="header__container__logo-link pc-on-show--flex moblie-on-hide">
            <img
            src="/template/asset/images/logo.jpg"
            alt="gia phú Architects"
            class="header__container__logo-ima"
            />
        </a>

        <div class="search__form">
            <form action="/" method="get">
            <input
                type="text"
                class="search__form-input"
                name="s"
                id="search"
                placeholder="Tìm kiểm"
            />
            <button class="search__form-btn btn">
                <i class="fa-solid fa-magnifying-glass"></i>
            </button>
            </form>

            <div class="search__dropdown pc-on-hide">
                <ul>
                    {{-- <li>
                    <a href="#"> sản phẩm 1 </a>
                    <button>
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                    </li>
                    <li>
                    <a href="#"> sản phẩm 2 </a>
                    <button>
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                    </li>
                    <li>
                    <a href="#"> sản phẩm 3. </a>
                    <button>
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                    </li> --}}
                </ul>
            </div>
        </div>

        <div
            class="header__container__right pc-on-show--flex moblie-on-hide"
        >
            <button class="header__container__btn btn search__up__js">
            <i class="fa-solid fa-magnifying-glass"></i>
            </button>
        </div>
        </div>
    </div>
</div>
