<div class="container-full page-banner-background">
  <div class="container page-banner">
    <h1>
      $Title
    </h1>
  </div>
</div>
<div class="container-full page-background">
  <div class="container">
    <div class="page">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <% if level(2) %>
            <% include Breadcrumbs %>
          <% end_if %>
          <% if $FeaturedImage %>
            <p class="post-image">$FeaturedImage.ScaleWidth(795)</p>
          <% end_if %>
          <% if $ElementalArea %>
            $ElementalArea
            $Content
          <% else %>
            $Content
          <% end_if %>
          <% include SilverStripe\\Blog\\EntryMeta %>
          $Form
          $CommentsForm
        </div>
      </div>
    </div>
  </div>
</div>
