<?php

function responseJson($status, $message, $data = null)
{

    if ($data == null) {
        $response =
            [
                'status' => $status,
                'message' => $message
            ];
    } else {
        $response =
            [
                'status' => $status,
                'message' => $message,
                'data' => $data
            ];
    }

    return response()->json($response);
}

