<div class="u-container">
    <div class="element__textimage <% if $ImageOnLeft %> image-on-left<% end_if %>">
        <div class="textimage__text">
            <% if $ShowTitle %>
                <h2 class="textimage__title">$Title</h2>
            <% end_if %>
            <div class="textimage__content">$Content</div>
            <% if $TextImageLink %>
                <div class="textimage__buttoncontainer">
                    <a href="$TextImageLink.getLinkURL" $TextImageLink.getTargetAttr title="$TextImageLink.Title"
                       class="c-button textimage__button">
                        $TextImageLink.Title
                    </a>
                </div>
            <% end_if %>
        </div>
        <div class="textimage__image">
            <% if $Image %>
                <img class="textimage__image__image" src="$Image.URL" alt="$Image.Title">
            <% else %>
                <% if $VideoLink %>
                    <% include Video VideoLink=$returnParsedLink %>
                <% end_if %>
            <% end_if %>
        </div>
    </div>
</div>