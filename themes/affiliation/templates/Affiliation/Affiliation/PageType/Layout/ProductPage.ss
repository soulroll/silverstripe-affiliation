<div class="container-full page-background">
  <div class="container">
    <div class="page">
      <div class="row">
        <div class="col-lg-12">
          <% include Breadcrumbs %>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-7 col-sm-12 col-xs-12">
              <div class="product-carousel-container">
                <div class="product-carousel">
                  <% if MainProductImage %>
                    $MainProductImage.ScaleWidth(540)
                  <% end_if %>
                  <% loop ProductImages %>
                    $Image.ScaleWidth(540)
                  <% end_loop %>
                </div>
                <% if ProductImages %>
                  <span class="product-carousel-arrow-left"></span>
                  <span class="product-carousel-arrow-right"></span>
                <% end_if %>
              </div>
              <% if ProductImages %>
              <div class="product-carousel-navigation">
                <% if MainProductImage %>
                  <div class="product-carousel-navigation-thumbnail">
                      $MainProductImage.Fit(150,150)
                  </div>
                <% end_if %>
                <% loop ProductImages %>
                  <div class="product-carousel-navigation-thumbnail">
                    $Image.Fit(150,150)
                  </div>
                <% end_loop %>
              </div>
              <% end_if %>
            </div>
            <div class="col-xl-5 offset-xl-1 col-md-5 col-sm-12 col-xs-12">
              <article>
                <h1 class="mb-3">$Title</h1>
                <h3>Description</h3>
                $Content
                <a href="#" class="btn btn-secondary">See on store</a>
              </article>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
