<?php namespace Horse\Parsers;

class MetadataParser {

    /**
     * Parse a single line.
     *
     * @param string $line
     * @return array
     */
    public function parse($line)
    {
        $elements = [];

        // 1. remove braces
        $line = \preg_replace('/[{}]/', '', $line);

        // 2. extract elements
        $elements = \explode(':', $line);

        // 3. remove quotes
        $iterator = function($element)
        {
            return \str_replace(['\'', '"'], '', $element);
        };

        return \array_map($iterator, $elements);
    }

}

