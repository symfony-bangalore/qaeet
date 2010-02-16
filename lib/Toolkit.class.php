<?php

/**
* 
*/
class Toolkit
{
  /**
   * extracts #marked tags from a string and returns these tags
   *
   * @return void
   * @author The Young Shepherd
   **/
  static public function extractTags($text)
  {
    $tags = array();
    preg_match_all('/\#(\w+)/', $text, $tags);
    $tags = isset($tags[1]) ? $tags[1] : array();
    $tags = array_map('strtolower', $tags);
    return array_count_values($tags);
  }

  /**
   * Applies syntax highlighting AND Markdown to a text
   *
   * @return highlighted text
   * @author The Young Shepherd
   **/
  static public function HTMLify($text)
  {
    // extract php code blocks and apply the php highlighter to it
    $tokens = token_get_all($text);

    $text = '';
    $code = '';    
    
    $state = 'text';
    $renderCode = false;
    foreach ($tokens as $token)
    {
      if (is_array($token))
      {
        switch ($token[0])
        {
          case T_OPEN_TAG:
            $state = 'code';
            $code = $token[1];
            break;
          case T_CLOSE_TAG:
            $code .= $token[1];
            $text .= highlight_string($code, true);
            $code = '';
            $state = 'text';
            break;          
          default:
            $$state .= $token[1];
        }
      }
      else
      {
        $$state .= $token;
      }
    }
    
    return Markdown($text);
  }
}
