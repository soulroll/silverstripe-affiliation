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
              <h3><a href="$Link" class="product-title">$Title</a></h3>
              <a href="#" class="btn btn-success product-button">Check it out</a>
            </div>
          </div>
        </div>
      <% end_loop %>
    </div>
  </div>
</div>


<div class="products">

  <div class="container">


  <ul class="nav nav-pills" id="myTab" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Latest</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Popular</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Recommended</a>
    </li>
  </ul>
  <div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">Latest</div>
    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">Popular</div>
    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">Recommended</div>
  </div>
 </div>

  <%--


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
