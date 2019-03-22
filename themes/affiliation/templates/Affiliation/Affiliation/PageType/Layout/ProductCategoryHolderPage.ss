<div class="container-full page-background">
  <div class="container">
    <div class="page">
      <h2>$Title</h2>
      <div class="row">
        <% loop $Children %>
          <div class="col-lg-4">
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
                <a class="product-title" href="$Link"><h3>$Title</h3></a>
              </div>
            </div>
          </div>
        <% end_loop %>
      </div>
    </div>
  </div>
</div>
