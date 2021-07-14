<div class="element__features">
    <div class="u-container">
        <% if $DisplayTitle %>
            <h1 class="element__title">$Title</h1>
        <% end_if %>
        <% if $Features %>
            <div class="features__list">
                <% loop $Features %>
                    <div class="element__feature <% if $Last %> last <% end_if %>">
                        <% if $Link %>
                            <div class="feature__img">
                                <a href="$Link.getLinkURL" $Link.getTargetAttr title="$Link.Title">
                                    $Image.Fill(170,170)
                                </a>
                            </div>
                        <% else %>
                            <div class="feature__img">
                                $Image.Fill(170,170)
                            </div>
                        <% end_if %>

                        <div class="feature__text">
                            <h3 class="feature__title">$Title</h3>
                            <% if $Content %>
                                <p class="feature__content">$Content</p>
                            <% end_if %>
                            <% if $Link %>
                                <div class="feature__readmore">
                                    <a href="$Link.getLinkURL" $Link.getTargetAttr title="$Link.Title">Read More
                                        <img src="{$ThemeDir}/images/icons/arrow__right-red.svg" class="feature__readmorearrow"
                                             alt="A red arrow facing right">
                                    </a>
                                </div>
                            <% end_if %>
                        </div>
                    </div>

                <% end_loop %>
            </div>
        <% end_if %>
    </div>
</div>