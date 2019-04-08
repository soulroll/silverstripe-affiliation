<div class="products products-featured">
  <div class="container">
    <h2 class="products-heading">Popular gifts</h2>
    <div class="row">
      <% loop $FeaturedProducts %>
        <div class="col-lg-4 col-md-6 col-sm-12">
          <div class="product">
            <h3 class="product-card-title"><a href="$Link">$Title</a></h3>
            <div class="product-card">
              <a class="product-card-image" href="$Link">
              <% if $MainProductImage %>
                $MainProductImage
              <% else %>
                <span class="product-card-placeholder"></span>
              <% end_if %>
              </a>
              <div class="product-card-information">
                <a href="$Link" class="btn btn-success product-card-button">Check it out</a>
              </div>
            </div>
          </div>
        </div>
      <% end_loop %>
    </div>
  </div>
</div>
<div class="products">
  <div class="container">
    <h2 class="products-heading">Latest gifts</h2>
    <div class="row">
      <% loop $LatestDeals %>
        <div class="col-lg-4 col-md-6 col-sm-12">
          <h3 class="product-card-title"><a href="$Link">$Title</a></h3>
          <div class="product-card">
            <a class="product-card-image" href="$Link">
            <% if $MainProductImage %>
              $MainProductImage
            <% else %>
              <span class="product-card-placeholder"></span>
            <% end_if %>
            </a>
            <div class="product-card-information">
              <a href="$Link" class="btn btn-success product-card-button">Check it out</a>
            </div>
          </div>
        </div>
      <% end_loop %>
    </div>
  </div>
</div>
