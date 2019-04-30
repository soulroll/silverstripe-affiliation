<div class="container-full page-background product-category-holder-page">
  <div class="container">
    <div class="page">
      <h2>$Title</h2>
      <div class="row">
        <% loop $Children %>
          <div class="col-lg-4 col-md-6">
            <div class="product">
              <div class="product-card">
                <% if $Image %>
                <a class="product-card-image" href="$Link">
                  $Image.Fit(320,300)
                </a>
                <% else %>
                <a class="product-card-image" href="$Link">
                  <img src="https://via.placeholder.com/700x600">
                </a>
                <% end_if %>
                <div class="product-category-information">
                  <h3 class="product-category-title"><a href="$Link">$Title</a></h3>
                </div>
              </div>
            </div>
          </div>
        <% end_loop %>
      </div>
    </div>
  </div>
</div>
