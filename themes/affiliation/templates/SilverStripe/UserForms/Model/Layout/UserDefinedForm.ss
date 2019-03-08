<div class="container-full page-background">
  <div class="container">
    <div class="page">
      <div class="row">
        <% if $UserformContactDetail || $Address || $Heading || $Sidebar %>
        <div class="col-md-12 col-lg-6">
        <% else %>
        <div class="col">
        <% end_if %>
          $Content
          $Form
          $PageComments
        </div>
        <% if $UserformContactDetail || $Address || $Heading || $Sidebar %>
        <div class="col-md-12 col-lg-5 offset-lg-1">
          <div class="contact-sidebar">
            <ul class="contact-sidebar-info<% if $Icons %> contact-sidebar-icons<% end_if %>">
              <% loop $UserformContactDetail %>
                <% if Type == Number %>
                <li class="contact-sidebar-phone">
                  <h4>$Label</h4>
                  $Number
                </li>
                <% else %>
                <li class="contact-sidebar-email">
                  <h4>$Label</h4>
                  <a href="mailto:$Email">$Email</a><br/>
                </li>
                <% end_if %>
              <% end_loop %>
              <% if $Address %>
              <li class="contact-sidebar-address">
                <h4>Address</h4>
                $Address<br/>
              </li>
              <% end_if %>
            </ul>
            <% if $Monday || $Tuesday || $Wednesday || $Thursday || $Friday || $Saturday || $Sunday %>
            <div class="contact-sidebar-opening-hours">
              <h4>Opening hours</h4>
              <div class="row">
                <div class="col">
                  <ul>
                    <% if $Monday %><li><strong>Monday</strong><br/>$Monday</li><% end_if %>
                    <% if $Tuesday %><li><strong>Tuesday</strong><br/>$Tuesday</li><% end_if %>
                    <% if $Wednesday %><li><strong>Wednesday</strong><br/>$Wednesday</li><% end_if %>
                    <% if $Thursday %><li><strong>Thursday</strong><br/>$Thursday</li><% end_if %>
                  </ul>
                </div>
                <div class="col">
                  <ul>
                    <% if $Friday %><li><strong>Friday</strong><br/>$Friday</li><% end_if %>
                    <% if $Saturday %><li><strong>Saturday</strong><br/>$Saturday</li><% end_if %>
                    <% if $Sunday %><li><strong>Sunday</strong><br/>$Sunday</li><% end_if %>
                  </ul>
                </div>
              </div>
            </div>
            <% end_if %>
            $Heading
            $Sidebar
          </div>
        </div>
        <% end_if %>
      </div>
    </div>
  </div>
</div>
