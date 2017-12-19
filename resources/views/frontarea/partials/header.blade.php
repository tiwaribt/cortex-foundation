<!-- Fixed navbar -->
<div id="navigation" class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ route('frontarea.home') }}"><b>{{ config('app.name') }}</b></a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li><a href="#home" class="smothscroll">Home</a></li>
                <li><a href="#desc" class="smothscroll">Description</a></li>
                <li><a href="#contact" class="smothScroll">Contact</a></li>
            </ul>

            <div class="navbar-right">
                {!! Menu::render('frontarea.header') !!}
            </div>
        </div><!--/.nav-collapse -->
    </div>
</div>
