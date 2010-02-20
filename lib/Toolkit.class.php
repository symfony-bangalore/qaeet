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
    preg_match_all('/\s\#(\w+)/', $text, $tags);
    $tags = isset($tags[1]) ? $tags[1] : array();
    $tags = array_map('strtolower', $tags);
    return array_count_values($tags);
  }

  /**
   * Applies syntax highlighting AND Markdown to a text
   * XSS SAFE!
   *
   * @return highlighted text
   * @author The Young Shepherd
   **/
  static public function HTMLify($text)
  {
    // include Markdown
    require_once dirname(__FILE__).'/vendor/markdown/markdown.php';
    // include HTML purifier
    require_once dirname(__FILE__).'/vendor/htmlpurifier/HTMLPurifier.standalone.php';

    // this function is escape safe
    if ($text instanceof sfOutputEscaper)
    {
      $text = $test->getRawValue();
    }
    
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
    
    $dirty_html = Markdown($text);

    $purifier = new HTMLPurifier();
    return $purifier->purify($dirty_html);
  }
  
  /**
   * displays a diff for two texts
   *
   * @return void
   * @author The Young Shepherd
   **/
  static public function diff($old,$new) 
  {
    $dmp = new diff_match_patch();
    $d = $dmp->diff_main($old, $new);
    $dmp->diff_cleanupSemantic($d);
    return $dmp->diff_prettyHtml($d);
  }
}
