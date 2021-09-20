<div class="element__index">
    <div class="index__links">
        <% loop $Index %>
            <div class="index__link-container">
                <a class="index__link" href="#$IDOnPage">$Title</a>
            </div>
        <% end_loop %>
    </div>
</div>