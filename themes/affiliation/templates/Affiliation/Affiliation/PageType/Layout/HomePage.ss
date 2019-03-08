<div class="products products-featured">
  <div class="container">
    <h2>Popular gifts</h2>
    <div class="row">
      <% loop $FeaturedProducts %>
        <div class="col-lg-4 col-md-6 col-sm-12">
          <div class="product-card">
            <a class="product-card-link" href="$Link">
              <% if $MainProductImage %>
                $MainProductImage
              <% else %>
                <span class="product-img-home"></span>
              <% end_if %>
            </a>
            <div class="product-information">
              <h3><a href="$Link">$Title</a></h3>
            </div>
          </div>
        </div>
      <% end_loop %>
    </div>
  </div>
</div>
<div class="products">
  <div class="container">
    <h2>Latest gifts</h2>
    <div class="row">
      <% loop $LatestDeals %>
        <div class="col-lg-4 col-md-6 col-sm-12">
          <div class="product-card">
            <a href="$ProductLink">
              <% if $MainProductImage %>
                $MainProductImage
              <% else %>
                <span class="product-img-home"></span>
              <% end_if %>
            </a>
            <div class="product-information">
              <a class="product-title" href="$Link">$Title</a>
            </div>
          </div>
        </div>
      <% end_loop %>
    </div>
    <div class="row">
      <% loop $ClothingDeals %>
        <div class="col-lg-4 col-md-6 col-sm-12">
          <div class="product-card">
            <a href="$ProductLink">
              <% if $MainProductImage %>
                $MainProductImage
              <% else %>
                <span class="product-img-home"></span>
              <% end_if %>
            </a>
            <div class="product-information">
              <a class="product-title" href="$Link">$Title</a>
            </div>
          </div>
        </div>
      <% end_loop %>
    </div>
  </div>
</div>
