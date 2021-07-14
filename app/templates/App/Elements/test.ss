<div class="bg-banner">
    <div id="about-us">
        <div class="container">
            <div class="content banner-text centre-align">
                <h1>The Faces of Black Sheep</h1>
                <h3>
                    We’re a small team of innovative designers and developers, who are passionate about our craft and keep pace with evolving technologies.
                </h3>
            </div>
        </div>
    </div>
</div>

<div class="bsc-person">
    <div class="person" style="background-image: url({$BaseHref}$ThemeDir/images/people/steph01.jpg);"></div>
    <div class="hoverstate" style="background-image: url({$BaseHref}$ThemeDir/images/people/steph02.jpg);"></div>
    <div class="overlay"></div>
    <div class="text">
        <p class="name">Steph Lane</p>
        <p class="title">she/her</p>
        <p class="title">Developer</p>
        <q></q>
    </div>
</div>

<div class="bsc-person">
    <div class="person" style="background-image: url({$BaseHref}$ThemeDir/images/people/alex01.jpg);"></div>
    <div class="hoverstate" style="background-image: url({$BaseHref}$ThemeDir/images/people/alex02.jpg);"></div>
    <div class="overlay"></div>
    <div class="text">
        <p class="name">Alex Simmons</p>
        <p class="title">Developer</p>
        <q></q>
    </div>
</div>

<div class="bsc-person">
    <div class="person" style="background-image: url({$BaseHref}$ThemeDir/images/people/nik01.jpg);"></div>
    <div class="hoverstate" style="background-image: url({$BaseHref}$ThemeDir/images/people/nik02.jpg);"></div>
    <div class="overlay"></div>
    <div class="text">
        <p class="name">Nik Gadermann</p>
        <p class="title">Developer</p>
        <q></q>
    </div>
</div>

<div class="bsc-person">
    <div class="person" style="background-image: url({$BaseHref}$ThemeDir/images/people/natch01.jpg);"></div>
    <div class="hoverstate" style="background-image: url({$BaseHref}$ThemeDir/images/people/natch02.jpg);"></div>
    <div class="overlay"></div>
    <div class="text">
        <p class="name">Natch Surana</p>
        <p class="title">Developer</p>
        <q></q>
    </div>
</div>

<div class="bsc-people">
    <div class="bsc-person">
        <div class="person" style="background-image: url({$BaseHref}$ThemeDir/images/people/bruno01.jpg);"></div>
        <div class="hoverstate" style="background-image: url({$BaseHref}$ThemeDir/images/people/bruno02.jpg);"></div>
        <div class="overlay"></div>
        <div class="text">
            <p class="name">Bruno Mendes</p>
            <p class="title">Senior designer</p>
<%--            <q>Obrigado. De nada.</q>--%>
            <q></q>
        </div>
    </div>

    <%-- --%>
    <div class="bsc-person">
        <div class="person" style="background-image: url({$BaseHref}$ThemeDir/images/people/chantelle01.jpg);"></div>
        <div class="hoverstate" style="background-image: url({$BaseHref}$ThemeDir/images/people/chantelle02.jpg);"></div>
        <div class="overlay"></div>
        <div class="text">
            <p class="name">Chantelle Pettigrew</p>
            <p class="title">Producer</p>
            <q></q>
        </div>
    </div>

    <div class="bsc-person">
        <div class="person" style="background-image: url({$BaseHref}$ThemeDir/images/people/joy01.jpg);"></div>
        <div class="hoverstate" style="background-image: url({$BaseHref}$ThemeDir/images/people/joy02.jpg);"></div>
        <div class="overlay"></div>
        <div class="text">
            <p class="name">Joy Pawley</p>
            <p class="title">Studio Manager</p>
            <q></q>
        </div>
    </div>

    <script src="{$BaseHref}$ThemeDir/javascript/instafeed.min.js"></script>
    <script type="text/javascript">
        var feed = new Instafeed({
            get: 'user',
            userId: 1835476130,
            accessToken: '1835476130.1677ed0.b9155fba5795497c950469459167a98a',
            resolution: 'standard_resolution',
            limit: 8,
            after: function() {
                $("#instafeed a").attr("target","_blank");
                // disable button if no more results to load
                if (!this.hasNext()) {
                    loadButton.attr('disabled', 'disabled');
                }
            }
        });
        feed.run();
    </script>
    <div class="instagram-feed" style="padding-bottom:0; clear: both;">
        <!-- <p style="text-align: center;"><a href="https://www.instagram.com/blacksheepcreativenz/">Follow the team on Instagram</a></p> -->
        <div id="instafeed" class="instafeed"> </div>
    </div>
</div>