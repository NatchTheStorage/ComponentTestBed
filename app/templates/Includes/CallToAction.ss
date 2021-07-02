<% if $CallToActionHeading %>
    <div class="page__calltoaction" style="background-image: url('{$CallToActionImage.URL}')">
        <div class="calltoaction__container">
            <div class="calltoaction__content">
                <div class="calltoaction__text">
                    <div class="calltoaction__title h1">$CallToActionHeading</div>
                    <div class="calltoaction__subtitle">$CallToActionSubHeader</div>
                </div>
                <div class="calltoaction__button">
                    <% include Link LinkItem=$CallToActionLink, ExtraClasses="calltoaction__link c-button" %>
                </div>
            </div>
        </div>
    </div>
<% end_if %>