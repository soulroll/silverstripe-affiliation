<div class="container-full page-background">
  <div class="container">
    <div class="page">
      <div class="row">
        <div class="col-lg-12">
          <% include Breadcrumbs %>
        </div>
      </div>
      <div class="row">
        <% if $Menu(2) %>
          <% include SideBar %>
        <% end_if %>
        <% if $Menu(2) %>
        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
        <% else %>
        <div class="col-lg-12 col-md-12 col-sm-12">
        <% end_if %>
          <h2>$Title</h2>
          <div class="row">
          <% loop $Children %>
            <div class="col-lg-4">
              <div class="product-card">
                <% if $Image %>
                <a href="$ProductLink">
                  $Image.Fit(320,320)
                </a>
                <% else %>
                <a href="$ProductLink">
                  <img src="https://via.placeholder.com/350x250">
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
  </div>
</div>
