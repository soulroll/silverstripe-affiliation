<div class="container-full page-banner-background">
  <div class="container page-banner">
    <h1>
      <% if $ArchiveYear %>
        <%t SilverStripe\\Blog\\Model\\Blog.Archive 'Archive' %>:
        <% if $ArchiveDay %>
          $ArchiveDate.Nice
        <% else_if $ArchiveMonth %>
          $ArchiveDate.format('F, Y')
        <% else %>
          $ArchiveDate.format('Y')
        <% end_if %>
      <% else_if $CurrentTag %>
        <%t SilverStripe\\Blog\\Model\\Blog.Tag 'Tag' %>: $CurrentTag.Title
      <% else_if $CurrentCategory %>
        <%t SilverStripe\\Blog\\Model\\Blog.Category 'Category' %>: $CurrentCategory.Title
      <% else %>
        $Title
      <% end_if %>
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
          <% if $ElementalArea %>
            $ElementalArea
            $Content
          <% else %>
            $Content
          <% end_if %>
          <% if $PaginatedList.Exists %>
            <% loop $PaginatedList %>
              <% include SilverStripe\\Blog\\PostSummary %>
            <% end_loop %>
          <% else %>
            <p><%t SilverStripe\\Blog\\Model\\Blog.NoPosts 'There are no posts' %></p>
          <% end_if %>
        </div>
      </div>
    </div>
  </div>
</div>
