<?php

namespace Elasticsearch\Endpoints;

use Elasticsearch\Endpoints\AbstractEndpoint;
use Elasticsearch\Common\Exceptions;

/**
 * Class DeleteType
 *
 * @category Elasticsearch
 * @package Elasticsearch\Endpoints
 * @author   Andy Burton <andy@andyburton.co.uk>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elasticsearch.org
 */

class DeleteType extends AbstractEndpoint
{
    /**
     * @throws \Elasticsearch\Common\Exceptions\RuntimeException
     * @return string
     */
    protected function getURI()
    {
		
        if (isset($this->index) !== true) {
            throw new Exceptions\RuntimeException(
                'index is required for Delete'
            );
        }
		
        if (isset($this->type) !== true) {
            throw new Exceptions\RuntimeException(
                'type is required for Delete'
            );
        }

        return '/' . $this->index . '/' . $this->type;
		
    }


    /**
     * @return string[]
     */
    protected function getParamWhitelist()
    {
        return array(
            'consistency',
            'parent',
            'refresh',
            'replication',
            'routing',
            'timeout',
            'version',
            'version_type',
        );
    }


    /**
     * @return string
     */
    protected function getMethod()
    {
        return 'DELETE';
    }
}