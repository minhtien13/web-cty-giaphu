<footer class="footer">
    <div class="container">
      <div class="footer__main">
        <ul class="footer__main__list">
          <li class="footer__main__list-item">
            <div class="footer__main__list__war">
              <h3 class="footer__main__heading">giới thiệu</h3>
              <div class="footer__main__content">
                <img
                  src="/template/asset/images/gia-phu-architects.jpg"
                  alt=""
                  class="footer__main__logo"
                />
                <p class="footer__main__intro">
                 {{ $intro->description }}
                </p>
                <div class="footer__contact">
                  <ul class="footer__contact__list">
                    <li class="footer__contact__list-item">
                      <span class="footer__contact__icon">
                        <i class="fa-solid fa-phone"></i>
                      </span>
                      <a href="#"> {{ $contact->phone }}</a>
                    </li>
                    <li class="footer__contact__list-item">
                      <span class="footer__contact__icon">
                        <i class="fa-solid fa-envelope"></i>
                      </span>
                      <span>{{ $contact->email }}</span>
                    </li>
                    <li class="footer__contact__list-item">
                      <span class="footer__contact__icon">
                        <i class="fa-solid fa-location-dot"></i>
                      </span>
                        {{ $contact->address }}
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </li>
          <li class="footer__main__list-item">
            <div class="ooter__main__list__war">
              <h3 class="footer__main__heading">hổ trợ</h3>
              <div class="footer__main__support">
                <ul>
                  <li><a href="#">Chính sách hổ trợ</a></li>
                  <li><a href="#">Chính sách bảo mật</a></li>
                  <li><a href="#">Chính sách bảo hành</a></li>
                  <li><a href="#">hổ trợ tư vấn</a></li>
                </ul>
              </div>
            </div>
          </li>
          <li class="footer__main__list-item">
            <div class="ooter__main__list__war">
              <h3 class="footer__main__heading">kêt nối</h3>
              <div class="footer__main__connect">
                    @include('connects.list')
              </div>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </footer>
