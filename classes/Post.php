<?php

namespace AmiriteEmbed;

class Post
{
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
     * @return string
     */
    public function getAgreeUrl()
    {
        return $this->url.'?vote=1';
    }

    /**
     * @return string
     */
    public function getDisagreeUrl()
    {
        return $this->url.'?vote=-1';
    }

    /**
     * Return the HTML to display the post.
     *
     * @return string
     */
    public function render()
    {
        return '<div class="amirite-embed">
            <a class="amirite-header" href="'.$this->url.'" rel="external">
                <img src="../dist/amirite-white.svg" alt="Amirite" />
                <small>Cast your vote...</small>
            </a>
            <div class="amirite-post">
                <a class="amirite-post-text" href="'.$this->url.'" rel="external">'.$this->html.'</a>
                <p>
                    <a href="'.$this->getAgreeUrl().'" rel="external" class="amirite-vote-btn amirite-yya-btn">Yeah You Are</a>
                    <a href="'.$this->getDisagreeUrl().'" rel="external" class="amirite-vote-btn amirite-nw-btn">No Way</a>
                </p>
            </div>
        </div>';
    }
}
