<div class="container-full page-background">
  <div class="container">
    <div class="page">
      <div class="row">
        <% if $Menu(2) %>
          <% include SideBar %>
        <% end_if %>
        <% if $Menu(2) %>
        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
        <% else %>
        <div class="col-lg-12 col-md-12 col-sm-12">
        <% end_if %>
          <div class="row">
          <% loop $Children %>
            <div class="col-lg-4">
              <a href="$Link">
                <%-- $Image.Fit(320,320) --%>
                <img src="https://via.placeholder.com/350x250">
                <h2>$Title</h2>
              </a>
            </div>
          <% end_loop %>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
