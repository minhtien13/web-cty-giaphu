<div class="header__bar">
    <div class="container p-x-0">
      <div class="header__bar__container">
        <h3 class="header__bar__heading pc-on-show moblie-on-hide">
          Công ty gia phú Architects
        </h3>

        <div class="header__bar__mobile pc-on-hide moblie-on-show">
          <div class="header__bar__mobile__contact">
            <ul>
              <li>
                <span>
                  <i class="fa-solid fa-phone"></i>
                </span>
                <a href="#">0296.6279.379 </a>
              </li>
              <li>
                <span>
                  <i class="fa-solid fa-envelope"></i>
                </span>
                <span>giaphu@contact.com</span>
              </li>
            </ul>
          </div>
        </div>

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
              <span>{{ $contact->phone }}</span>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
