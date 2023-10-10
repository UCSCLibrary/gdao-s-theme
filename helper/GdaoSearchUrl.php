<?php
namespace OmekaTheme\Helper;

use Laminas\View\Helper\AbstractHelper;

// Return a search URL given associative arrays of filters and limits
class GdaoSearchUrl extends AbstractHelper {

    public function __invoke($filters = [], $limits = []) {

        $query = array('q' => '');

        if ($filters) {
            $query['filters[match]'] = 'all';
            $i = 0;
            foreach($filters as $key => $value) {
                $query['filters[queries]['.$i.'][field]'] = $key;
                $query['filters[queries]['.$i.'][operator]'] = 'contains_any_word';
                $query['filters[queries]['.$i.'][term]'] = $value;
                $i++;
            }
        }

        if ($limits) {
            foreach($limits as $key => $value) {
                $query['limit['.$key.'][0]'] = $value;
            }
        }

        return $this->getView()->url('search-page-1',[], ['query' => $query]);
    }
}
