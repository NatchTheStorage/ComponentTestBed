<div class="element__statselement">
    <div class="u-container">
        <div class="statselement__list">
            <% loop $Stats %>
                <div class="statselement__stat">
                    <div class="stat__content">
                        <h2>$Description</h2>
                    </div>
                    <div class="stat__title">
                        <p>$Title</p>
                    </div>
                </div>
            <% end_loop %>
        </div>
    </div>
</div>