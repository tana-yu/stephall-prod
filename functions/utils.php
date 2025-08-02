<?php


/*
* img タグ
*/
if ( ! function_exists('tagImg'))
{
    function tagImg($file, $alt, $class = '', $id = '')
    {
        // idが指定されている場合だけid属性を出力
        $idAttr = $id ? ' id="' . esc_attr($id) . '"' : '';

        return '<img class="' . esc_attr($class) . '" src="' . get_template_directory_uri() . '/assets/images/' . esc_attr($file) . '" alt="' . esc_attr($alt) . '"' . $idAttr . '>';
    }
}
if ( ! function_exists('noImg'))
{
    function noImg($alt)
    {
        return '<img src="'.get_template_directory_uri().'/assets/images/no-image.webp"
                    alt="'.$alt.'">';
    }
}

function thumbImg($post, $size = 'thumbnail', $alt = '')
{
    if ( has_post_thumbnail($post->ID) )
    {
        return get_the_post_thumbnail($post->ID, $size);
    }
    
    return noImg($alt);
}
