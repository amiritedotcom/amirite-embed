Embed Amirite posts on a Website.

Rather than using an `<iframe>` which may not be supported (e.g. in a Cordova app) this has a PHP class to fetch a post and return its HTML. Some CSS is also provided here to style the post on the page.

## Install
    composer require --prefer-source amiritedotcom/amirite-embed:dev-master
    
## Update
Because I've been lazy and not used git tags to version this you can update with:

    composer clearcache; composer require --prefer-source amiritedotcom/amirite-embed:dev-master    
