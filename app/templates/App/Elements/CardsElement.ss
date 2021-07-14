<div class="element__cardselement">
    <div class="u-container">
        <div class="cardselement-upper">
            <% if not $HideTitle %>
                <% if $Title %>
                    <h2 class="cardselement-title">
                        $Title
                    </h2>
                <% end_if %>
            <% end_if %>
            <% if $Content %>
                <div class="cardselement-text">
                    $Content
                </div>
            <% end_if %>
        </div>

        <div class="cardselement__cardscontainer">
            <% loop $Cards %>
                <div class="e-card">
                    <div class="e-card-upper">
                        <h3 class="e-card-title">
                            $Title
                        </h3>
                        <div class="e-card-subtitle">
                            $Subtitle
                        </div>
                        <% if $Content %>
                            <div class="e-card-text">
                                $Content
                            </div>
                        <% end_if %>
                        <% if $CardLink %>
                            <a class="e-card-readmore" href="">
                                Read more >
                            </a>
                        <% end_if %>
                    </div>
                    <div class="e-card-image">
                        $Image
                    </div>
                </div>
            <% end_loop %>
        </div>
    </div>
</div>