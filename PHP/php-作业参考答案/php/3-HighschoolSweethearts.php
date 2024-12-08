<?php
class HighSchoolSweetheart
{
    public function firstLetter(string $name): string
    {
        // throw new \BadFunctionCallException("Implement the function");
        return substr(trim($name), 0, 1);
    }
    public function initial(string $name): string
    {
        // throw new \BadFunctionCallException("Implement the function");
        return strtoupper($this->firstLetter($name)) . ".";
    }
    public function initials(string $name): string
    {
        // throw new \BadFunctionCallException("Implement the function");
        $results = explode(" ", $name);
        return $this->initial($results[0]) . " " . $this->initial($results[1]);
    }
    public function pair(string $sweetheart_a, string $sweetheart_b): string
    {
        // throw new \BadFunctionCallException("Implement the function");
        $result_a = $this->initials($sweetheart_a);
        $result_b = $this->initials($sweetheart_b);
        return <<<EOF
             ******       ******
           **      **   **      **
         **         ** **         **
        **            *            **
        **                         **
        **     $result_a  +  $result_b     **
         **                       **
           **                   **
             **               **
               **           **
                 **       **
                   **   **
                     ***
                      *
        EOF;
    }
}