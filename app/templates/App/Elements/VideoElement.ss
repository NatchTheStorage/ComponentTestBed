<div class="u-container">
    <div class="element__videoelement">
        <% if $VimeoLink || $YoutubeLink %>
            <div class="v-container">
                <% if $VimeoLink %>
                    <iframe class="video__iframe" src="https://player.vimeo.com/video/$VimeoLink" frameborder="0"
                            allow="fullscreen" allowfullscreen></iframe>
                <% else_if $YoutubeLink %>
                    <% include YoutubeVideo VideoLink=$returnParsedLink %>
                <% end_if %>
            </div>
        <% else_if $VideoFile %>
            <video class="video__block" src="$VideoFile.URL" controls></video>
        <% end_if %>
    </div>
</div>
</div>