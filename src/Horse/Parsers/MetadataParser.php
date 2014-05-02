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
        $elements = $this->extractElements($line);

        // 3. remove quotes
        $iterator = function($element)
        {
            return \str_replace(['\'', '"'], '', $element);
        };

        return \array_map($iterator, $elements);
    }

    /**
     * Extract an array of elements from the string.
     *
     * @param string $line
     * @return array
     */
    protected function extractElements($line)
    {
        $elements = [];
        $buffer   = '';
        $quote    = false;

        foreach (\str_split($line) as $character)
        {
            if (\in_array($character, ['\'', '"']))
            {
                $quote = ! $quote;

                continue;
            }

            if ((':' == $character) and ! $quote)
            {
                $elements[] = $buffer;

                $buffer = '';

                continue;
            }

            $buffer .= $character;
        }

        if ($buffer)
        {
            $elements[] = $buffer;
        }

        return $elements;
    }

}

