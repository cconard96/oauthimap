<?php

/**
 * -------------------------------------------------------------------------
 * OauthIMAP plugin for GLPI
 * -------------------------------------------------------------------------
 *
 * LICENSE
 *
 * This file is part of OauthIMAP.
 *
 * OauthIMAP is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * OauthIMAP is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with OauthIMAP. If not, see <http://www.gnu.org/licenses/>.
 * -------------------------------------------------------------------------
 * @copyright Copyright (C) 2020-2022 by OauthIMAP plugin team.
 * @license   GPLv2 https://www.gnu.org/licenses/gpl-2.0.html
 * @link      https://github.com/pluginsGLPI/oauthimap
 * -------------------------------------------------------------------------
 */

use GlpiPlugin\Oauthimap\MailCollectorFeature;

class PluginOauthimapHook
{
    /**
     * Handle post_item_form hook.
     *
     * @param array $params
     *
     * @return void
     */
    public static function postItemForm(array $params): void
    {

        $item = $params['item'];

        if (!is_object($item)) {
            return;
        }

        switch (get_class($item)) {
            case MailCollector::class:
                MailCollectorFeature::alterMailCollectorForm();
                break;
            case PluginOauthimapApplication::class:
                PluginOauthimapApplication::showFormExtra((int)$item->fields[PluginOauthimapApplication::getIndexName()]);
                break;
        }
    }
}
