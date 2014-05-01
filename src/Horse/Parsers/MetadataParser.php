<?php namespace Horse\Parsers;

class MetadataParser {

    /**
     * Parse multiple elements.
     *
     * @param string $line
     * @return array
     */
    public function parseMany($line)
    {
        $results = [];
        $buffer  = '';

        foreach (\str_split($line) as $character)
        {
            if ('{' == $character)
            {
                $buffer = $character;
            }
            elseif ('}' == $character)
            {
                $results[] = $this->parse($buffer.$character);
            }
            else
            {
                $buffer .= $character;
            }
        }

        return $results;
    }

    /**
     * Parse a single element.
     *
     * @param string $line
     * @return array
     */
    public function parse($line)
    {
        $elements = [];

        // 1. remove braces
        $line = \str_replace(['{', '}'], '', $line);

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

