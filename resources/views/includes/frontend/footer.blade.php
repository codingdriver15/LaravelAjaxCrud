<footer id="footer" class="section-bg">
    <div class="footer-top">
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <div class="row">
              <div class="col-sm-6">
                  @include('includes.frontend.footer.info')
                  @include('includes.frontend.footer.news_letter')
                </div>
                <div class="col-sm-6">
                  @include('includes.frontend.footer.links')
                </div>
            </div>
          </div>

          <div class="col-lg-6">
            @include('includes.frontend.footer.form')
          </div>
        </div>
      </div>
    </div>

    <div class="container">
      @include('includes.frontend.footer.copyright')
    </div>
  </footer>
