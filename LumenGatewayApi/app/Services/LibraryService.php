<?php

namespace App\Services;

use App\Traits\ConsumesExternalService;

class LibraryService
{
    use ConsumesExternalService;

    /**
     * The base uri to be used to consume the libraries service
     * @var string
     */
    public $baseUri;

    /**
     * The secret to be used to consume the libraries service
     * @var string
     */
    public $secret;

    public function __construct()
    {
        $this->baseUri = config('services.libraries.base_uri');
        $this->secret = config('services.libraries.secret');

        if (empty($this->baseUri)) {
            throw new \RuntimeException('LIBRARIES_SERVICE_BASE_URL is not configured in .env file');
        }
    }

    public function obtainLibraries()
    {
        return $this->performRequest('GET', '/libraries');
    }

    public function createLibrary($data)
    {
        return $this->performRequest('POST', '/libraries', $data);
    }

    public function obtainLibrary($library)
    {
        return $this->performRequest('GET', "/libraries/{$library}");
    }

    public function editLibrary($data, $library)
    {
        return $this->performRequest('PUT', "/libraries/{$library}", $data);
    }

    public function deleteLibrary($library)
    {
        return $this->performRequest('DELETE', "/libraries/{$library}");
    }

}
