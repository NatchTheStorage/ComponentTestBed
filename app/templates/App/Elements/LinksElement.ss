<div class="element__links">
    <div class="u-container">
        <div class="links__container">
            <% loop $Links %>
                <div class="links__link">
                    <a href="$getLinkURL" $getTargetAttr title="$Title" class="c-button">$Title</a>
                </div>
            <% end_loop %>
        </div>
    </div>
</div>