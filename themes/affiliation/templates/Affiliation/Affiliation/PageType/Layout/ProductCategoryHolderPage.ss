<div class="container-full page-background product-category-holder-page">
  <div class="container">
    <div class="page">
      <h2>$Title</h2>
      <div class="row">
        <% loop $Children %>
          <div class="col-lg-4 col-md-6">
            <div class="product-card">
              <% if $Image %>
              <a href="$Link">
                $Image.Fit(320,300)
              </a>
              <% else %>
              <a href="$Link">
                <img src="https://via.placeholder.com/350x300">
              </a>
              <% end_if %>
              <div class="product-information">
                <h3><a class="product-title" href="$Link">$Title</a></h3>
              </div>
            </div>
          </div>
        <% end_loop %>
      </div>
    </div>
  </div>
</div>
