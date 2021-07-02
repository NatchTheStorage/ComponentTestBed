<div class="accordion__container element__accordion_element <% if $Style %> $StyleVariant<% end_if %>">
    <div class="u-container">
        <% if $ShowTitle %>
            <div class="accordion_element__title" >
                <h1 class="h1">$Title</h1>
            </div>
        <% end_if %>
        <% if $Accordions %>
            <div class="accordion_element__list">
                <% loop $Accordions %>
                    <div class="accordion__container accordion_element__accordion">
                        <button class="accordion__top js-accordion-toggle"><h3 class='h3'>$Title</h3>
                            <img src="{$ThemeDir}/images/icons/arrow__down-green.svg" aria-hidden="true"></button>
                        <div class="accordion__text accordion_element__text">
                            $Content
                        </div>
                    </div>
                <% end_loop %>
            </div>
        <% end_if %>
    </div>
</div>