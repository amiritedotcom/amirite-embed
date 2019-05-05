<?php

namespace AmiriteEmbed;

class Post
{
    /**
     * @var int
     */
    public $id;

    /**
     * @var string
     */
    public $html;

    /**
     * @var string
     */
    public $url;

    /**
     * @param array $data
     */
    public function __construct(array $data = [])
    {
        foreach ($data as $key => $value) {
            $this->{$key} = $value;
        }
    }

    /**
     * Return the HTML to display the post.
     *
     * @param string|null $linkUrl
     * @param string $linkAttributes Additional attributes to add to the <a> tags. %%URL%% will be replaced in the
     *     string with the link to the post.
     *
     * @return string
     */
    public function render($linkUrl = null, $linkAttributes = null)
    {
        $url = ($linkUrl ?: $this->url).'?votePostId='.$this->id;
        $upUrl = $url.'&vote=1';
        $downUrl = $url.'&vote=-1';

        if ($linkAttributes === null) {
            $linkAttributes = 'href="%%URL%%" target="_blank" rel="external"';
        }

        $urlAttributes = str_replace('%%URL%%', $url, $linkAttributes);
        $upUrlAttributes = str_replace('%%URL%%', $upUrl, $linkAttributes);
        $downUrlAttributes = str_replace('%%URL%%', $downUrl, $linkAttributes);

        return '<div class="amirite-embed">
            <a class="amirite-header" '.$urlAttributes.'>
                <img src="'.$this->getLogoSrc().'" alt="Amirite" />
                <small>Cast your vote...</small>
            </a>
            <div class="amirite-post">
                <a class="amirite-post-text" '.$urlAttributes.'>'.$this->html.'</a>
                <p>
                    <a '.$upUrlAttributes.' class="amirite-vote-btn amirite-yya-btn">Yeah You Are</a>
                    <a '.$downUrlAttributes.' class="amirite-vote-btn amirite-nw-btn">No Way</a>
                </p>
            </div>
        </div>';
    }

    public function getLogoSrc()
    {
        return 'data:image/svg+xml,%3Csvg xmlns=\'http://www.w3.org/2000/svg\' width=\'1179\' height=\'274\' version=\'1\' viewBox=\'16 37 1179 274\'%3E%3Cpath fill=\'%23FBC02D\' d=\'M1176 79a91 91 0 0 0-50-24c-31-7-64-1-92 15-15 9-29 22-36 39-6 16-5 35 4 50 8 16 22 29 38 35 4 12 4 36 7 48 1 4 3-1 6 1l1-1 58 7h2c1 0 8-35 14-53 5-15 25-15 36-26 15-13 25-31 26-51 2-14-4-29-14-40z\'/%3E%3Cpath fill=\'%23261E1C\' stroke=\'%23261E1C\' stroke-width=\'9\' d=\'M1087 245c-1-9 1-72 4-75 4-3 9-3 12-4 10-6 19-20 16-34-2-10-10-23-20-25-18-2-45 22-40 39 4 9 44 1 25-1-9-1-16 11-19 0s19-39 36-31c14 7 15 32 5 42-7 6-19 7-22 14-3 6-6 63-5 72\'/%3E%3Cpath fill=\'%23FFF\' d=\'M1113 258l1-9c-8-3-17-3-25-6-10-2-20-2-30-2-8 0-16 1-22 7-4 3-6 9-7 14 12 6 26 6 39 6 17-1 36-6 52 2-8 5-18 3-27 2-12-2-24-3-36-2-6 2-12 6-13 13 16 5 33 1 49 1l9 2c-12 7-27 9-41 10l-18-1c2 2 4 5 7 6 8 1 17 3 25 1 11-2 22-6 31-12 4-2 5-6 5-10 8 0 16-5 17-13-4-5-10-9-16-9zm-37 3c-11-3-22 0-32-3 15-5 32-1 47 2l-15 1zm-21-12c16-2 34-2 49 6-16-4-33-6-49-6z\'/%3E%3Cg fill=\'%23FFF\' stroke=\'%23FFF\' stroke-width=\'12\'%3E%3Cpath d=\'M130 299c-9 0-14-6-14-20v-8l-4 6c-14 15-29 23-45 23-12 0-23-4-31-13-9-8-13-19-13-32 0-18 7-33 21-44 6-5 13-8 21-11a86 86 0 0 1 50 0v-24c0-13-2-23-8-29-5-7-11-10-17-10l-14 2c-4 1-7 4-10 6-6 7-10 14-11 23 1 5 0 9-3 10-2 2-5 3-8 3-8 0-12-5-11-16 0-11 6-22 17-31 11-10 24-15 38-15 21 0 35 11 43 32 2 7 4 15 4 24v24l-1 37v21c0 9 1 16 4 21l3 12c0 3-1 5-3 7l-8 2zm-15-51v-30c-6-2-14-3-24-3-13 0-24 3-33 9-4 4-8 8-10 12-3 5-4 11-4 19s3 13 8 18 12 8 22 8 21-7 33-21c4-3 7-7 8-12zM213 208v16l1 56c0 7-2 11-8 14l-6 1c-2 0-4-1-6-4-2-2-3-7-3-13a2658 2658 0 0 1 2-82l-2-54c0-5 1-9 3-11 3-3 6-5 9-5s6 2 9 4c3 3 4 6 4 9a260 260 0 0 0-2 19c9-16 20-26 32-31 4-2 9-2 14-2s9 1 13 3c5 2 8 5 12 9 4 5 7 12 9 21 13-22 28-33 45-33 18 0 30 11 36 33 2 8 3 18 3 29v28l2 65c0 5-1 8-3 11-3 2-5 4-8 4l-6-1-4-3c-3-3-4-6-4-10a299 299 0 0 0 2-32 848 848 0 0 0 1-71c0-8-2-16-6-23s-9-9-15-9-11 1-15 4c-5 2-9 6-12 11-6 9-10 22-12 36v16l2 67c0 5-2 8-4 11-3 2-6 4-9 4s-6-1-9-4c-2-2-3-5-3-10a361 361 0 0 0 2-34l1-33v-19l-1-12c0-12-2-22-6-28s-9-9-16-9c-6 0-11 1-16 4l-12 12c-7 10-11 22-14 36v10zM468 56c1 2 2 5 1 8a20 20 0 0 1-7 15c-3 3-7 4-10 4l-9-1-6-4c-4-3-5-8-5-14s1-10 4-13c5-4 10-6 15-6 8 0 14 3 17 11zm-9 131a836 836 0 0 0 0 101l-3 4c-3 3-5 4-8 4l-9-3c-3-2-4-7-3-14a672 672 0 0 0 1-133v-12l4-4c2-2 5-4 8-4s6 2 8 4c3 2 4 6 4 10l-2 47zM613 132c0 8-4 13-12 14-10 2-21 11-33 26a91 91 0 0 0-24 67l2 43c0 5-1 8-4 11-2 2-5 4-9 4-3 0-6-1-8-4-3-2-4-6-3-10a361 361 0 0 0 2-37 1550 1550 0 0 0 0-113c0-2 1-4 3-5 2-2 5-3 8-3s6 1 8 3 4 5 4 9a225 225 0 0 1-2 23l-3 25c6-15 15-30 27-43 12-14 23-21 33-21 4 0 7 1 9 3s2 5 2 8zM674 56l1 8a20 20 0 0 1-7 15c-3 3-7 4-11 4l-8-1-6-4c-4-3-6-8-6-14s2-10 5-13c5-4 10-6 15-6 8 0 14 3 17 11zm-10 131a836 836 0 0 0 1 101l-3 4c-3 3-6 4-9 4s-5-1-8-3-4-7-3-14a672 672 0 0 0 0-133l1-12 3-4c3-2 6-4 9-4s6 2 8 4c3 2 4 6 4 10l-3 47zM730 81c0-5 1-9 3-12 3-2 6-4 9-4s5 2 8 4c2 3 3 7 3 12-2 14-3 30-3 49a256 256 0 0 0 42-3c10 0 15 4 15 12 0 4-3 7-8 9l-6 1a232 232 0 0 0-16-1h-14l-11 1h-2c0 62 1 98 3 106 1 7 3 13 5 17 4 6 9 9 15 9 9 0 16-5 19-14 1-8 5-12 12-12 2 0 4 1 5 3 2 2 3 5 3 8l-3 12-9 11c-9 7-18 11-28 11-19 0-32-11-39-31-2-8-3-17-3-28v-91l-11 1c-4 0-8-1-10-4-3-2-4-5-4-8 0-2 1-5 4-7 2-2 6-3 11-3h10V81zM858 217c0 21 4 36 11 47 8 12 19 18 33 18 13 0 23-6 29-19 4-9 8-13 14-13l6 2c2 2 3 5 3 9-1 4-2 9-5 14-3 4-6 9-11 12-11 9-24 13-39 13-17 0-31-7-43-21a79 79 0 0 1-18-52c0-21 1-37 5-50 3-13 8-23 14-32 11-17 26-25 43-25 22 0 37 9 46 26 6 12 9 30 10 53 0 6-1 11-3 13-3 2-7 4-14 4l-81 1zm77-20c0-26-5-44-16-53-5-4-10-6-17-6-6 0-12 1-16 3l-11 10c-3 4-6 8-8 14a109 109 0 0 0-8 32l31 2 45-2z\'/%3E%3C/g%3E%3C/svg%3E';
    }
}
