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
      <% include SilverStripe\\Blog\\MemberDetails %>
      <% if $PaginatedList.Exists %>
        <h2><%t SilverStripe\\Blog\\Model\\Blog.PostsByUser 'Posts by {firstname} {surname} for {title}' firstname=$CurrentProfile.FirstName surname=$CurrentProfile.Surname title=$Title %></h2>
      <% end_if %>
      <% loop $PaginatedList %>
        <% include SilverStripe\\Blog\\PostSummary %>
      <% end_loop %>
      $Form
      $CommentsForm
      <% with $PaginatedList %>
        <% include SilverStripe\\Blog\\Pagination %>
      <% end_with %>
      <% include SilverStripe\\Blog\\BlogSideBar %>
    </div>
  </div>
</div>
