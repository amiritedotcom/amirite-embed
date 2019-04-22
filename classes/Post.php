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
     *
     * @return string
     */
    public function render($linkUrl = null)
    {
        $url = ($linkUrl ?: $this->url).'?votePostId='.$this->id;

        return '<div class="amirite-embed">
            <a class="amirite-header" href="'.$url.'" target="_blank"  rel="external">
                <img src="/amirite-embed/amirite-white.svg" alt="Amirite" />
                <small>Cast your vote...</small>
            </a>
            <div class="amirite-post">
                <a class="amirite-post-text" target="_blank" href="'.$url.'" rel="external">'.$this->html.'</a>
                <p>
                    <a href="'.$url.'&vote=1" target="_blank" rel="external" class="amirite-vote-btn amirite-yya-btn">Yeah You Are</a>
                    <a href="'.$url.'&vote=-1" target="_blank"  rel="external" class="amirite-vote-btn amirite-nw-btn">No Way</a>
                </p>
            </div>
        </div>';
    }
}
