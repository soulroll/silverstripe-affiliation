<div class="post-summary <% if $FeaturedImage %>with-image<% end_if %>">
  <h3>
    <a href="$Link" title="<%t SilverStripe\\Blog\\Model\\Blog.ReadMoreAbout "Read more about '{title}'..." title=$Title %>">
      <% if $MenuTitle %>$MenuTitle
      <% else %>$Title<% end_if %>
    </a>
  </h3>
  <p>
    <% if $FeaturedImage %>
      <a href="$Link" class="post-summary-image-holder">
        <img class="post-summary-image" src="$FeaturedImage.Link">
      </a>
    <% end_if %>
    <% if $Summary %>
      $Summary
    <% else %>
      $Excerpt
    <% end_if %>
    <a href="$Link" class="post-summary-read-more">
      <%t SilverStripe\\Blog\\Model\\Blog.ReadMoreAbout "Read more about '{title}'..." title=$Title %>
    </a>
    <% include SilverStripe\\Blog\\EntryMeta %>
  </p>
</div>
