<footer id="footer" class="footer dark-background">
    <div class="container footer-top">
        <div class="row gy-4">
            <div class="col-lg-4 col-md-6 footer-about">
                <a href="{{ route('mainwebsite.index') }}" class="logo d-flex align-items-center">
                    <span class="sitename">{{ __('general.project-name') }}</span>
                </a>
                <div class="footer-contact pt-3">
                    <p>ул.Улица д.1</p>
                    <p>Республика Беларусь, Гродно 230005</p>
                    <p class="mt-3"><strong>{{ __('general.phone') }}:</strong> <span>+375 (44) 000-00-00</span></p>
                    <p><strong>{{ __('general.email') }}:</strong> <span>example@animalsafe.com</span></p>
                </div>
                <div class="social-links d-flex mt-4">
                    <a href="">
                        <i class="bi bi-facebook"></i>
                    </a>
                    <a href="">
                        <i class="bi bi-instagram"></i>
                    </a>
                    <a href="">
                        <i class="bi bi-linkedin"></i>
                    </a>
                </div>
            </div>

            <div class="col-lg-2 col-md-3 footer-links">
                <h4>{{ __('mainwebsite.footer.company.company') }}</h4>
                <ul>
                    <li>
                        <a href="">{{ __('mainwebsite.footer.company.about-us') }}</a>
                    </li>
                    <li>
                        <a href="{{ route('mainwebsite.contacts') }}">{{ __('mainwebsite.footer.company.contacts') }}</a>
                    </li>
                    <li>
                        <a href="{{ route('mainwebsite.terms') }}">{{ __('mainwebsite.footer.company.terms') }}</a>
                    </li>
                    <li>
                        <a href="{{ route('mainwebsite.privacy-policy') }}">{{ __('mainwebsite.footer.company.privacy-policy') }}</a>
                    </li>
                </ul>
            </div>

            <div class="col-lg-4 col-md-12 footer-newsletter">
                <h4>{{ __('mainwebsite.footer.newsletter.our-newsletter') }}</h4>
                <p>{{ __('mainwebsite.footer.newsletter.text-area') }}</p>
                <form>
                    <div class="newsletter-form">
                        <input type="email" name="email">
                        <input type="submit" value="{{ __('mainwebsite.footer.button') }}">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="container copyright text-center mt-4">
        <p>&#9400 <?php echo date('Y'); ?> <strong class="px-1 sitename">{{ __('general.project-name') }}</strong> <span>{{ __('general.arr') }}</span></p>
    </div>

</footer>
