<?php
namespace GloryKing\Handler;

use Illuminate\Pagination\Paginator;
use Library\ErrorMessage\ErrorMessage;

/**
 * 处理器基础类
 *
 * Class Handler
 * @package GloryKing\Handler
 * @author jiangxianli
 * @created_at 2017-04-20 15:32:38
 */
class Handler
{
    /**
     * Api接口输出
     *
     * @param array $response
     * @return array
     * @author jiangxianli
     * @created_at 2017-04-20 17:53:25
     */
    public static function apiResponse($response = [])
    {
        if (ErrorMessage::isError($response)) {
            return $response->formatError();
        }

        $data = [];
        if ($response && $response instanceof Paginator) {
            $data = [
                'total'        => $response->total(),
                'current_page' => $response->currentPage(),
                'per_page'     => $response->perPage(),
                'last_page'    => $response->lastPage(),
                'rows'         => $response->items()
            ];
        }

        return [
            'code' => 0,
            'data' => $data,
            'msg'  => ''
        ];
    }
}