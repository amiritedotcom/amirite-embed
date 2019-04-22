<?php

namespace AmiriteEmbed;

use GuzzleHttp\Client;

class AmiriteClient
{
    /**
     * @var string
     */
    private $apiUrl = 'https://api.amirite.com/';

    /**
     * @var Client
     */
    private $guzzleClient;

    /**
     * @param Client $guzzleClient
     */
    public function __construct(Client $guzzleClient)
    {
        $this->guzzleClient = $guzzleClient;
    }

    /**
     * @param string $apiUrl
     */
    public function setApiUrl($apiUrl)
    {
        $this->apiUrl = $apiUrl;
    }

    /**
     * Get one random post from Amirite.
     *
     * @return Post|null
     */
    public function getPost()
    {
        $params = [
            'approved' => 1,
            'noImages' => 1,
            'noLinks' => 1,
            'perPage' => 1,
            'postType' => 'poll',
            'sort' => 'random',
            'timeFilter' => 'month',
            'votingType' => 'yya',
        ];

        $response = $this->get(
            'posts',
            $params
        );

        if (!empty($response->posts)) {
            $post = new Post($response->posts[0]);

            return $post;
        }

        return null;
    }

    /**
     * @param string $endpoint
     * @param array $params
     *
     * @return array
     */
    private function get($endpoint, $params)
    {
        $url = $this->apiUrl.$endpoint.'?'.http_build_query($params);

        $response = $this->guzzleClient->get($url);
        /*try {
            $response = $this->guzzleClient->get($url);
        } catch (\GuzzleHttp\Exception\ServerException $e) {
            print_r($e->getResponse()->getBody()->getContents());
        }*/

        return \GuzzleHttp\json_decode($response->getBody(), true);
    }
}
