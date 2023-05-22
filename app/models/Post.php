<?php

class Post
{
    public static function all()
    {
        $url = "http://localhost/restful_php_api/api/post/read.php";
        $response = file_get_contents($url);
        return json_decode($response, true);
    }

    public static function find($id)
    {
        $url = "http://localhost/restful_php_api/api/post/show.php?id=$id";

        $response = file_get_contents($url);
        return json_decode($response, true);
    }

    public static function create($data)
    {
        $url = "http://localhost/restful_php_api/api/post/create.php";
        $options = array(
            'http' => array(
                'method'  => 'POST',
                'header'  => 'Content-Type: application/json',
                'content' => json_encode($data)
            )
        );
        $context = stream_context_create($options);
        $response = file_get_contents($url, false, $context);
        return json_decode($response, true);
    }

    public static function update($data)
    {
        $url = "http://localhost/restful_php_api/api/post/update.php";
        $options = array(
            'http' => array(
                'method'  => 'PUT',
                'header'  => 'Content-Type: application/json',
                'content' => json_encode($data)
            )
        );
        $context = stream_context_create($options);
        $response = file_get_contents($url, false, $context);
        return json_decode($response, true);
    }

    public static function delete($id)
    {
        $url = "http://localhost/restful_php_api/api/post/delete.php";
        $options = array(
            'http' => array(
                'method' => 'DELETE',
                'header' => 'Content-Type: application/json',
                'content' => json_encode($id)
            )
        );
        $context = stream_context_create($options);
        $result = file_get_contents($url, false, $context);
        
        // Trả về true nếu xóa thành công (HTTP status code 200-204), ngược lại trả về false
        return $result !== false && in_array(http_response_code(), array(200, 204));
    }
}
