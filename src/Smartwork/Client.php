<?php

/*
 * This file is part of the mingyoung/dingtalk.
 *
 * (c) 张铭阳 <mingyoungcheung@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace EasyDingTalk\Smartwork;

use EasyDingTalk\Kernel\BaseClient;

class Client extends BaseClient
{
    /**
     * 获取员工花名册字段信息
     *
     * @param array|string $userid_list
     * @param array|string $field_filter_list
     *
     * @return mixed
     */
    public function listEmployee($userid_list, $field_filter_list)
    {
        $userid_list = is_array($userid_list) ? implode(',', $userid_list) : $userid_list;
        $field_filter_list = is_array($field_filter_list) ? implode(',', $field_filter_list) : $field_filter_list;
        $agentid = $this->app['config']['agent_id'];

        return $this->client->postJson('topapi/smartwork/hrm/employee/v2/list', compact('userid_list', 'field_filter_list', 'agentid'));
    }

    /**
     * 更新员工花名册
     *
     * @param array|string $param
     *
     * @return mixed
     */
    public function updateEmployee($param)
    {
        $agentid = $this->app['config']['agent_id'];

        return $this->client->postJson('topapi/smartwork/hrm/employee/v2/update', compact('param', 'agentid'));
    }

    /**
     * 更新员工花名册
     *
     * @param array|string $param
     *
     * @return mixed
     */
    public function getRosterMeta()
    {
        $agentid = $this->app['config']['agent_id'];

        return $this->client->postJson('topapi/smartwork/hrm/roster/meta/get', compact('agentid'));
    }
}
